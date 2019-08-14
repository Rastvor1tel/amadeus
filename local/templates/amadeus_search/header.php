<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/globals.php'); ?>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/head.php'); ?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/header.php'); ?>
<main class="content-block__panel  is--aside-cabinet">
    <div class="content-block__container container is--default-page-xs is--full">
        <div class="page-header__group  is--h1">
            <?$APPLICATION->IncludeComponent('bitrix:breadcrumb', '');?>
            <div class="page-header__panel  is--h1">
                <h1 class="page-header__heading  is--h1"><?$APPLICATION->ShowTitle(false)?></h1>
            </div>
        </div>