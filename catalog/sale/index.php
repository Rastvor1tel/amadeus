<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Товары со скидкой");
?><div class="aside__block is--catalog dropdown">
	 <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "catalog",
        Array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_ID" => $GLOBALS["IBLOCK_ID"],
            "IBLOCK_TYPE" => $GLOBALS["IBLOCK_TYPE"],
            "SHOW_PARENT_NAME" => "N",
            "VIEW_MODE" => "LIST"
        ),
    $component,
    Array(
        'HIDE_ICONS' => 'Y'
    )
    );?>
</div>
<div class="content-block__container container is--aside-navbar is--full">
	<div class="page-header__group is--h1 is--hidden-screen">
		 <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "",
        Array()
        );?>
		<div class="page-header__panel is--h1 is--hidden-screen">
			<h1 class="page-header__heading is--h1 is--hidden-screen"><? $APPLICATION->ShowTitle(false) ?></h1>
		</div>
	</div>
	<div class="content-block__elem is--xxs ">
		<div class="cabinet__filter-block ">
            <a href="#" class="cabinet__filter-btn-block">
                <div class="container">
                    <div class="cabinet__filter-btn">
                        <div class="cabinet__filter-btn-hamb">
                            <div class="cabinet__filter-btn-hamb-item is--top">
                            </div>
                            <div class="cabinet__filter-btn-hamb-item is--center">
                            </div>
                            <div class="cabinet__filter-btn-hamb-item is--bottom">
                            </div>
                        </div>
                        <div class="cabinet__filter-btn-name">
                             Фильтры каталога
                        </div>
                    </div>
                </div>
            </a>
			<div class="cabinet__filter-dropdown">
				 <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.smart.filter",
                    "site",
                    Array(
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "COMPONENT_TEMPLATE" => "site",
                        "CONVERT_CURRENCY" => "N",
                        "DISPLAY_ELEMENT_COUNT" => "Y",
                        "FILTER_NAME" => "arrFilter",
                        "FILTER_VIEW_MODE" => "horizontal",
                        "HIDE_NOT_AVAILABLE" => "N",
                        "IBLOCK_ID" => $GLOBALS["IBLOCK_ID"],
                        "IBLOCK_TYPE" => $GLOBALS["IBLOCK_TYPE"],
                        "PAGER_PARAMS_NAME" => "arrPager",
                        "PRICE_CODE" => array(
                            0 => $GLOBALS["PRICE_TYPE"],
                        ),
                        "SAVE_IN_SESSION" => "N",
                        "SECTION_CODE" => "",
                        "SECTION_DESCRIPTION" => "-",
                        "SECTION_ID" => "",
                        "SECTION_TITLE" => "-",
                        "SEF_MODE" => "N",
                        "TEMPLATE_THEME" => "blue",
                        "XML_EXPORT" => "N"
                    )
                );?>
				<ul class="cabinet__filter-nav">
					<li class="cabinet__filter-nav-item is--mla">
					<?$APPLICATION->IncludeComponent(
                        "dial:sort",
                        "",
                        Array(
                            "FIELDS" => ['price'=>'цене','popular'=>'популярности']
                        )
                    );?>
                    </li>
				</ul>
			</div>
		</div>
	</div>
<?
$sort = $APPLICATION->IncludeComponent('dial:sort.get', '', [
    'DEFAULT_SORT' => 'sort',
    'DEFAULT_DIRECTION' => 'asc'
]);

$arrFilter['PROPERTY_SPECIALOFFER_VALUE'] = 'да';

$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"catalog", 
	array(
		"IBLOCK_TYPE" => $GLOBALS["IBLOCK_TYPE"],
		"IBLOCK_ID" => $GLOBALS["IBLOCK_ID"],
        "ELEMENT_SORT_FIELD" => $sort['SORT'],
        "ELEMENT_SORT_ORDER" => $sort['DIRECTION'],
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "asc",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
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
	),
	false
);
?>
</div><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>