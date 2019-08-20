<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$formAttributes = 'class="form__panel" data-validation';
$arResult['FORM_HEADER'] = str_replace('<form', '<form ' . $formAttributes . '', $arResult['FORM_HEADER']);
?>