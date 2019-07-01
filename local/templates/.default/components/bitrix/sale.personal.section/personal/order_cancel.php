<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

if ($arParams['SHOW_ORDER_PAGE'] !== 'Y') {
    LocalRedirect($arParams['SEF_FOLDER']);
}

if (strlen($arParams["MAIN_CHAIN_NAME"]) > 0) {
    $APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}
$APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_ORDERS"), $arResult['PATH_TO_ORDERS']);
$APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_ORDER_DETAIL", ["#ID#" => $arResult["VARIABLES"]["ID"]])); ?>

<div class="catalog-section__wrap">
    <div class="catalog-section__aside">
        <div class="filter__body">
            <div class="filter__wrapper">
                <div class="filter__item">
                    <? if ($USER->IsAuthorized()):
                        $APPLICATION->IncludeFile('/local/templates/.default/components/bitrix/sale.personal.section/personal/menu.php',
                            [], ['MODE' => 'php']);
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-section__list">
        <div class="catalog-section__wrapper">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:sale.personal.order.cancel",
            "",
            [
                "PATH_TO_LIST"   => $arResult["PATH_TO_ORDERS"],
                "PATH_TO_DETAIL" => $arResult["PATH_TO_ORDER_DETAIL"],
                "SET_TITLE"      => $arParams["SET_TITLE"],
                "ID"             => $arResult["VARIABLES"]["ID"],
            ],
            $component
        );
        ?>

        </div>
    </div>
</div>
