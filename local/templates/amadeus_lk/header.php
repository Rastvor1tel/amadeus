<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/globals.php'); ?>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/head.php'); ?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<? include_once($_SERVER['DOCUMENT_ROOT'] . '/local/include/header.php'); ?>
<main class="content-block__panel  is--aside-cabinet">