<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div class="content-block__panel  is--index-catalog  is--info-50">
    <div class="content-block__container container  is--index-catalog">
        <div class="page-header__group  is--h1  is--grid">
            <div class="page-header__panel  is--h1  is--grid">
                <h2  class="page-header__heading  is--h1  is--grid">Рекомендуем</h2>
            </div>
            <div class="tabs__panel  is--grid  is--xs-scroll">
                <div class="tabs__nav-wrap  is--grid  is--xs-scroll">
                    <ul class="tabs__nav  is--grid  is--xs-scroll">
                        <li class="tabs__item  is--grid  is--xs-scroll  active">
                            <button type="button" class="tabs__link  is--grid  is--xs-scroll" data-filter="new"><span>Новинки</span></button>
                        </li>
                        <li class="tabs__item  is--grid  is--xs-scroll">
                            <button class="tabs__link  is--grid  is--xs-scroll" data-filter="hit"><span>Хиты</span></button>
                        </li>
                        <li class="tabs__item  is--grid  is--xs-scroll">
                            <button class="tabs__link  is--grid  is--xs-scroll" data-filter="discounts"><span>Скидки</span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-block__slick  is--index-catalog"  data-slider-slick="slick-index-catalog">
            <?
            global $arrFilter;

            $componentParams = [
                "IBLOCK_TYPE" => $GLOBALS["IBLOCK_TYPE"],
                "IBLOCK_ID" => $GLOBALS["IBLOCK_ID"],
                "ELEMENT_SORT_FIELD" => $sort['SORT'],
                "ELEMENT_SORT_ORDER" => $sort['DIRECTION'],
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER2" => "asc",
                "PROPERTY_CODE" => array(
                    0 => "NEWPRODUCT",
                    1 => "SALELEADER",
                    2 => "SPECIALOFFER"
                ),
                "FILTER_NAME" => "arrFilter",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "SET_TITLE" => "N",
                "MESSAGE_404" => "",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "DISPLAY_COMPARE" => "N",
                "PAGE_ELEMENT_COUNT" => "12",
                "PRICE_CODE" => array(
                    0 => $GLOBALS["PRICE_TYPE"],
                ),
                "USE_PRICE_COUNT" => "N",
                "PRICE_VAT_INCLUDE" => "N",
                "USE_PRODUCT_QUANTITY" => "N",
                "ADD_PROPERTIES_TO_BASKET" => "N",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SHOW_ALL_WO_SECTION" => "Y",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "CONVERT_CURRENCY" => "N",
                "HIDE_NOT_AVAILABLE" => "Y",
                "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
            ];

            $arrFilter = [
                'PROPERTY_NEWPRODUCT_VALUE' => 'да',
                'PROPERTY_SALELEADER_VALUE' => '',
                'PROPERTY_SPECIALOFFER_VALUE' => '',
            ];
            $componentParams['ITEM_CLASS'] = 'is--new';
            $APPLICATION->IncludeComponent("bitrix:catalog.section", "index-products", $componentParams, false);

            $arrFilter = [
                'PROPERTY_NEWPRODUCT_VALUE' => '',
                'PROPERTY_SALELEADER_VALUE' => 'да',
                'PROPERTY_SPECIALOFFER_VALUE' => '',
            ];
            $componentParams['ITEM_CLASS'] = 'is--hit';
            $APPLICATION->IncludeComponent("bitrix:catalog.section", "index-products", $componentParams, false);

            $arrFilter = [
                'PROPERTY_NEWPRODUCT_VALUE' => '',
                'PROPERTY_SALELEADER_VALUE' => '',
                'PROPERTY_SPECIALOFFER_VALUE' => 'да',
            ];
            $componentParams['ITEM_CLASS'] = 'is--discounts';
            $APPLICATION->IncludeComponent("bitrix:catalog.section", "index-products", $componentParams, false);
            ?>
        </div>
    </div>
</div>
