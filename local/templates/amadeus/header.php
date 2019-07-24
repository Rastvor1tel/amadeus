<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<?include_once($_SERVER['DOCUMENT_ROOT'].'/local/include/head.php');?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<?include_once($_SERVER['DOCUMENT_ROOT'].'/local/include/header.php');?>
<? if ($APPLICATION->GetCurPage() == '/'): ?>
<?if(CSite::InGroup(GROUP_ID_OPT)):?>
        <header class="header-block__block  is--wholesale">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "slider_opt",
                array(
                    "COMPONENT_TEMPLATE" => "slider_opt",
                    "IBLOCK_TYPE" => "slider",
                    "IBLOCK_ID" => "23",
                    "NEWS_COUNT" => "20",
                    "PARENT_SECTION" => "301",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => ""
                ),
                false
            );?>
        </header>
    <?else:?>
    <header class="header-block__block  is--retail" style="background-image: url(<?=TEMPLATE_DIR?>/img/temp/bg-index-header.jpg);">
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "slider_rozn",
            array(
                "COMPONENT_TEMPLATE" => "slider_rozn",
                "IBLOCK_TYPE" => "slider",
                "IBLOCK_ID" => "23",
                "NEWS_COUNT" => "20",
                "PARENT_SECTION" => "300",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "ID",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => ""
            ),
            false
        );?>
    </header>
<?endif;?>
<? elseif(explode('/', $APPLICATION->GetCurDir())[1] == 'catalog'): ?>
<main class="content-block__panel  is--aside-navbar  is--dark-bg">
<?else:?>
<main class="content-block__panel  is--aside-navbar  is--bg">
    <div class="content-block__container container  is--full">
        <div class="page-header__group  is--h1">
            <?$APPLICATION->IncludeComponent('bitrix:breadcrumb', '');?>
            <div class="page-header__panel  is--h1">
                <h1 class="page-header__heading  is--h1"><?$APPLICATION->ShowTitle(false)?></h1>
            </div>
        </div>
<? endif; ?>
