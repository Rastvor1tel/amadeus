<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule('iblock');
Loader::includeModule('highloadblock');
Loader::includeModule('catalog');
Loader::includeModule('sale');

function sizeSort($a, $b) {
    if ($a['PROPERTIES']['SIZES_CLOTHES']['VALUE'] == $b['PROPERTIES']['SIZES_CLOTHES']['VALUE']) {
        return 0;
    }
    return ($a['PROPERTIES']['SIZES_CLOTHES']['VALUE'] < $b['PROPERTIES']['SIZES_CLOTHES']['VALUE']) ? -1 : 1;
}

$request = Context::getCurrent()->getRequest();

$type = $request->get('type');

if ($type == 'ADD2BASKET') {
    $products = $request->get('products');
    $error = false;
    foreach ($products as $product) {
        $basketID = Add2BasketByProductID((int)$product['id'], (int)$product['quantity'], [], []);
        if (!$basketID)
            $error = true;
    }
    $basketCount = 0;
    $dbBasketItems = CSaleBasket::GetList(
        [],
        ["FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"],
        false,
        false,
        ["ID", "QUANTITY"]
    );
    while ($arItems = $dbBasketItems->Fetch()) {
        $basketCount += $arItems['QUANTITY'];
    }
    $response = [
        'basket_count' => $basketCount
    ];
    if ($error) $response['error'] = 'Y';
    $response = Bitrix\Main\Web\Json::encode($response);
    echo $response;
}

if ($type == 'sizeList') {
    $iblockID = $request->get('iblockID');
    $productID = $request->get('productID');
    $colorID = $request->get('colorID');
    $catalogGroup = CPrice::GetBasePrice($productID);
    $arOffers = CCatalogSKU::getOffersList($productID, $iblockID, ['PROPERTY_COLOR_REF' => $colorID], ['*', 'CATALOG_GROUP_' . $catalogGroup['CATALOG_GROUP_ID']], ['CODE' => ['SIZES_CLOTHES']]);
    $arOffers = $arOffers[$productID];

    $hlblock = HighloadBlockTable::getById(6)->fetch();
    $entity = HighloadBlockTable::compileEntity($hlblock);
    $entityClass = $entity->getDataClass();

    usort($arOffers, "sizeSort");
    ?>
    <div class="card-item__elem  is--size-heading  is--catalog-page">
        Размер:
    </div>
    <div class="card-item__elem  is--size-row  is--catalog-page">
        <? foreach ($arOffers as $arOffer): ?>
            <?
            $hlSize = $entityClass::getList(['select' => ['*'], 'filter' => ['UF_XML_ID' => $arOffer['PROPERTIES']['SIZES_CLOTHES']['VALUE']]])->fetch();

            if (!$arOffer['PROPERTIES']['SIZES_CLOTHES']['VALUE']) continue;
            ?>
            <div class="card-item__elem  is--size-cols  is--catalog-page sizeBlock" data-id="<?= $arOffer['ID'] ?>">
                <div class="form__size-block<?=CSite::InGroup(GROUP_ID_OPT)?' is--lg':'';?>" title="<?= $arOffer['PROPERTIES']['SIZES_CLOTHES']['VALUE'] ?>">
                    <label class="form__size">
                        <input type="checkbox" class="form__size-input" <?/*= $arOffer['CATALOG_AVAILABLE'] != 'Y' ? 'disabled ' : ''; */?>name="size[<?= $arOffer['ID'] ?>]" id="<?= $arOffer['ID'] ?>">
                        <div class="form__size-name"><?= $hlSize['UF_NAME'] ?></div>
                        <button type="button" class="form__size-qty-btn  is--plus" data-action="+">
                            <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/>
                            </svg>
                        </button>
                        <input type="number" class="form__size-qty-input" max="10000<?/*= $arOffer['CATALOG_QUANTITY'] */?>" value="0">
                        <button type="button" class="form__size-qty-btn  is--minus" data-action="-">
                            <svg width="14" height="2" xmlns="http://www.w3.org/2000/svg">
                                <path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/>
                            </svg>
                        </button>
                    </label>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <?
}
?>