<?

use Bitrix\Main\Loader;
use Bitrix\Main\Diag\Debug;

$eventManager = \Bitrix\Main\EventManager::getInstance();

/*------new_site------*/

define("TEMPLATE_DIR", "/local/templates/amadeus");
define("GROUP_ID_OPT", [9]);

$eventManager->addEventHandler("main", "OnBeforeUserLogin", "OnBeforeUserLogin");
$eventManager->addEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegister");
$eventManager->addEventHandler("sale", "OnBeforeBasketAdd", "OnBeforeBasketAdd");
$eventManager->addEventHandler("sale", "OnOrderNewSendEmail", "OnOrderNewSendEmail");
$eventManager->addEventHandler("catalog", "OnSuccessCatalogImport1C", "importOffersPrice");
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementUpdate", "elementOffersPrice");
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementAdd", "elementOffersPrice");

/*------helper for breadcrumb------*/
require_once(dirname(__FILE__) . '/classes/ComponentHelper.php');
function ShowNavChain($template = '.default') {
    global $APPLICATION;
    $APPLICATION->IncludeComponent('bitrix:breadcrumb', $template);
}

/*------end of helper for breadcrumb------*/

function getMinOffersPrice($offers) {
    $minPrice = 0;
    foreach ($offers as $key => $offer) {
        if ($offer['ITEM_PRICES'][0]['PRICE']) {
            if ($minPrice == 0 || $minPrice > $offer['ITEM_PRICES'][0]['PRICE']) {
                $minPrice = $offer['ITEM_PRICES'][0]['PRICE'];
            }
        }
    }
    return $minPrice;
}

// авторизация по Login и E-mail
function OnBeforeUserLogin(&$arFields) {
    if (isset($_POST['USER_LOGIN'])) {
        $e = strpos($_POST['USER_LOGIN'], "@");
        if ((int)$e > 0) {
            $filter = Array("EMAIL" => $_POST['USER_LOGIN']);
            $rsUsers = CUser::GetList($by = "id", $order = "desc", $filter);
            $res = $rsUsers->Fetch();
            $arFields["LOGIN"] = $res['LOGIN'];
        }
    }
}

// регистрация без Login и ConfirmPassword
function OnBeforeUserRegister(&$arFields) {
    if ($_POST['USER_TYPE'])
        $arFields["GROUP_ID"][] = $_POST['USER_TYPE'];
    $arFields["LOGIN"] = $arFields["EMAIL"];
    $arFields["CONFIRM_PASSWORD"] = $arFields["PASSWORD"];
}

// изменение провайдера цен
function OnBeforeBasketAdd(&$arFields) {
    $arFields['PRODUCT_PROVIDER_CLASS'] = "DialProductProvider";
}

// провайдер цен
Bitrix\Main\Loader::includeModule('catalog');
CBitrixComponent::includeComponentClass('dial:profile.info.discount');

class DialProductProvider extends CCatalogProductProvider {
    public static function GetProductData($params) {
        // стандартная обработка
        $result = parent::GetProductData($params);

        if (!$result['DISCOUNT_VALUE']) {
            // вычисляем модификатор цены
            $discount = new ProfileInfoDiscount;
            $discount = $discount->getDiscount();
            if ($discount)
                $modifier = 1 - $discount / 100;
            else
                $modifier = 1;
            $result['BASE_PRICE'] *= $modifier;
        }
        return $result;
    }
}

function OnOrderNewSendEmail($orderID, $eventName, $arFields) {
    $arOrder = CSaleOrder::GetByID($orderID);
    $userGroups = CUser::GetUserGroup($arOrder['USER_ID']);
    if (in_array(GROUP_ID_OPT, $userGroups)) {
        $adminEventName = 'SALE_NEW_ORDER_OPT';
    } else {
        $adminEventName = 'SALE_NEW_ORDER_ROZN';
    }
    CEvent::Send($adminEventName, 's1', $arFields);
}

function importOffersPrice () {
    CModule::IncludeModule('iblock');
    CModule::IncludeModule('catalog');
    $IBLOCK_IDs = [28, 36];
    $PRICE_TYPE = 5;

    foreach($IBLOCK_IDs as $IBLOCK_ID) {
        $arSelect = ["ID", "NAME", "DATE_ACTIVE_FROM"];
        $arFilter = ["IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y"];
        $res = CIBlockElement::GetList(['ID', "NAME"], $arFilter, false, ["nPageSize" => 5000], $arSelect);

        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $MIN_PRICE = get_offer_min_price($IBLOCK_ID, $arFields['ID'], $PRICE_TYPE);
            $MAX_PRICE = get_offer_max_price($IBLOCK_ID, $arFields['ID'], $PRICE_TYPE);
            CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, ['MINIMUM_PRICE' => $MIN_PRICE]);
            CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, ['MAXIMUM_PRICE' => $MAX_PRICE]);
        }
    }
}

function elementOffersPrice($arFields) {
    if ($arFields["ID"] > 0) {
        $IBLOCK_ID = $arFields['IBLOCK_ID'];
        $PRICE_TYPE = 5; //$PRICE_TYPE = $arFields['IBLOCK_ID'] == 28 ? 3 : 4;
        $MIN_PRICE = get_offer_min_price($IBLOCK_ID, $arFields['ID'], $PRICE_TYPE);
        $MAX_PRICE = get_offer_max_price($IBLOCK_ID, $arFields['ID'], $PRICE_TYPE);
        CIBlockElement::SetPropertyValuesEx($arFields['ID'], $IBLOCK_ID, ['MINIMUM_PRICE' => $MIN_PRICE]);
        CIBlockElement::SetPropertyValuesEx($arFields['ID'], $IBLOCK_ID, ['MAXIMUM_PRICE' => $MAX_PRICE]);
    }
}

function get_offer_min_price($IBLOCK_ID, $item_id, $PRICE_TYPE) {
    $ret = 0;
    $arInfo = CCatalogSKU::GetInfoByProductIBlock($IBLOCK_ID);
    if (is_array($arInfo)) {
        $res = CIBlockElement::GetList(["PRICE" => "asc"], ['IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'ACTIVE' => 'Y', 'PROPERTY_' . $arInfo['SKU_PROPERTY_ID'] => $item_id], false, false, ['ID', 'NAME'])->GetNext();
        if ($res) {
            $ret = GetCatalogProductPrice($res["ID"], $PRICE_TYPE);
            if ($ret['PRICE']) {
                $ret = $ret['PRICE'];
            }
        }
    }
    return $ret;
}

function get_offer_max_price($IBLOCK_ID, $item_id, $PRICE_TYPE) {
    $ret = 0;
    $arInfo = CCatalogSKU::GetInfoByProductIBlock($IBLOCK_ID);
    if (is_array($arInfo)) {
        $res = CIBlockElement::GetList(["PRICE" => "desc"], ['IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'ACTIVE' => 'Y', 'PROPERTY_' . $arInfo['SKU_PROPERTY_ID'] => $item_id], false, false, ['ID', 'NAME'])->GetNext();
        if ($res) {
            $ret = GetCatalogProductPrice($res["ID"], $PRICE_TYPE);
            if ($ret['PRICE']) {
                $ret = $ret['PRICE'];
            }
        }
    }
    return $ret;
}

?>