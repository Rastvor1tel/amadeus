<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Личный кабинет | трикотажная фабрика \"Амадеус\" в Москве ");
$APPLICATION->SetTitle("Личный кабинет");
define("NEED_AUTH", true);
?>

<?$APPLICATION->IncludeComponent('bitrix:sale.personal.section', '', [])?>

<?
/*$APPLICATION->IncludeComponent('dial:profile.info', '', [
    'BASKET' => '/personal/cart/',
    'ORDERS' => '/personal/orders/',
    'PROFILE' => '/personal/profile/'
]);*/
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>