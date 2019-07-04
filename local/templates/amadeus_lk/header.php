<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<?$APPLICATION->IncludeFile('/local/include/head.php');?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<?$APPLICATION->IncludeFile('/local/include/header.php');?>
<main class="content-block__panel  is--aside-cabinet">