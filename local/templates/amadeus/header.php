<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/globals.php'); ?>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/head.php'); ?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/header.php'); ?>
<? if ($APPLICATION->GetCurPage() == '/'): ?>
    <? if ($_COOKIE['roleValue'] == 'rozn'): ?>
        <header class="header-block__block  is--retail" style="background-image: url(<?= TEMPLATE_DIR ?>/img/temp/bg-index-header.jpg);">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "slider-rozn",
                [
                    "IBLOCK_TYPE" => "slider",
                    "IBLOCK_ID" => "23",
                    "ELEMENT_ID" => "846429",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "PROPERTY_CODE" => array(
                        0 => "BANNERS",
                        1 => "BUTTONS",
                        2 => "TITLE",
                        3 => "SUBTITLE"
                    ),
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                ],
                false
            ); ?>
        </header>
    <? elseif ($_COOKIE['roleValue'] == 'opt'): ?>
        <header class="header-block__block  is--wholesale">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "slider-opt",
                [
                    "IBLOCK_TYPE" => "slider",
                    "IBLOCK_ID" => "23",
                    "ELEMENT_ID" => "846430",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "PROPERTY_CODE" => array(
                        0 => "BANNERS",
                        1 => "BUTTONS",
                        2 => "TITLE",
                        3 => "SUBTITLE"
                    ),
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                ],
                false
            ); ?>
        </header>
    <? else: ?>
        <? if (CSite::InGroup(GROUP_ID_OPT)): ?>
            <header class="header-block__block  is--wholesale">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.detail",
                    "slider-opt",
                    [
                        "IBLOCK_TYPE" => "slider",
                        "IBLOCK_ID" => "23",
                        "ELEMENT_ID" => "846430",
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "ID",
                        "SORT_ORDER2" => "DESC",
                        "PROPERTY_CODE" => array(
                            0 => "BANNERS",
                            1 => "BUTTONS",
                            2 => "TITLE",
                            3 => "SUBTITLE"
                        ),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                    ],
                    false
                ); ?>
            </header>
        <? else: ?>
            <header class="header-block__block  is--retail" style="background-image: url(<?= TEMPLATE_DIR ?>/img/temp/bg-index-header.jpg);">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.detail",
                    "slider-rozn",
                    [
                        "IBLOCK_TYPE" => "slider",
                        "IBLOCK_ID" => "23",
                        "ELEMENT_ID" => "846429",
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "ID",
                        "SORT_ORDER2" => "DESC",
                        "PROPERTY_CODE" => array(
                            0 => "BANNERS",
                            1 => "BUTTONS",
                            2 => "TITLE",
                            3 => "SUBTITLE"
                        ),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                    ],
                    false
                ); ?>
            </header>
        <? endif; ?>
    <? endif; ?>
<? elseif (explode('/', $APPLICATION->GetCurDir())[1] == 'catalog'): ?>
<main class="content-block__panel  is--aside-navbar  is--dark-bg">
<? elseif (defined('ERROR_404') && ERROR_404=='Y') : ?>
<main class="content-block__panel  is--aside-navbar  is--bg">
<? else: ?>
    <main class="content-block__panel  is--aside-navbar  is--bg">
        <div class="content-block__container container  is--full">
            <div class="page-header__group  is--h1">
                <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', ''); ?>
                <div class="page-header__panel  is--h1">
                    <h1 class="page-header__heading  is--h1"><? $APPLICATION->ShowTitle(false) ?></h1>
                </div>
            </div>
<? endif; ?>
