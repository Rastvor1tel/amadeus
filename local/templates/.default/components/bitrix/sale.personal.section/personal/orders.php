<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc; ?>

<div class="cabinet__navbar-block dropdown">
    <a href="#" data-toggle="dropdown" class="cabinet__navbar-btn-block">
        <div class="container">
            <div class="cabinet__navbar-btn">
                <div class="cabinet__navbar-btn-hamb">
                    <div class="cabinet__navbar-btn-hamb-item  is--top"></div>
                    <div class="cabinet__navbar-btn-hamb-item  is--center"></div>
                    <div class="cabinet__navbar-btn-hamb-item  is--bottom"></div>
                </div>
                <div class="cabinet__navbar-btn-name">
                    Другие разделы
                </div>
            </div>
        </div>
    </a>
    <div class="cabinet__navbar-dropdown">
        <?
        $APPLICATION->IncludeComponent('dial:profile.info.small', '', [
            'PROFILE' => '/personal/profile/'
        ]);
        ?>
        <? $APPLICATION->IncludeComponent('bitrix:menu', 'lk_menu', []); ?>
        <div class="cabinet__navbar-btn">
            <a href="?logout=yes" class="btn__item  is--line">
                <span class="btn__name">Выход</span>
            </a>
        </div>
    </div>
</div>
<div class="content-block__container container  is--aside-cabinet  is--full">
    <div class="page-header__group  is--h1  is--grid">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', ''); ?>
        <div class="page-header__panel  is--h1  is--grid">
            <h1 class="page-header__heading  is--h1  is--grid"><?
                $APPLICATION->ShowTitle(false); ?></h1>
        </div>
        <? $APPLICATION->IncludeComponent('dial:profile.info.discount', ''); ?>
    </div>
    <div class="content-block__elem  is--cabinet">
        <?
        $APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_ORDERS"), $arResult['PATH_TO_ORDERS']);
        $APPLICATION->IncludeComponent(
            "bitrix:sale.personal.order.list",
            "",
            [
                "PATH_TO_DETAIL" => $arResult["PATH_TO_ORDER_DETAIL"],
                "PATH_TO_CANCEL" => $arResult["PATH_TO_ORDER_CANCEL"],
                "PATH_TO_CATALOG" => $arParams["PATH_TO_CATALOG"],
                "PATH_TO_COPY" => $arResult["PATH_TO_ORDER_COPY"],
                "PATH_TO_BASKET" => $arParams["PATH_TO_BASKET"],
                "PATH_TO_PAYMENT" => $arParams["PATH_TO_PAYMENT"],
                "SAVE_IN_SESSION" => "N",
                "ORDERS_PER_PAGE" => $arParams["ORDERS_PER_PAGE"],
                "SET_TITLE" => "Y",
                "ID" => $arResult["VARIABLES"]["ID"],
                "NAV_TEMPLATE" => $arParams["NAV_TEMPLATE"],
                "ACTIVE_DATE_FORMAT" => $arParams["ACTIVE_DATE_FORMAT"],
                "HISTORIC_STATUSES" => [
                    0 => "F",
                ],
                "ALLOW_INNER" => $arParams["ALLOW_INNER"],
                "ONLY_INNER_FULL" => $arParams["ONLY_INNER_FULL"],
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => "N",
                "DEFAULT_SORT" => "DATE_INSERT",
                "RESTRICT_CHANGE_PAYSYSTEM" => [
                    0 => "F",
                ],
                "REFRESH_PRICES" => "Y",
                "COMPONENT_TEMPLATE" => ".default"
            ],
            false
        );
        ?>
    </div>
</div>