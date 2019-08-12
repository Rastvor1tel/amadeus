<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
CJSCore::Init(['2gis']);
?>
<?
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", [
    "AREA_FILE_SHOW" => "file",
    "PATH" => "/include/contacts.php",
    "EDIT_TEMPLATE" => ""
],
    false,
    ['HIDE_ICONS' => 'Y']
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>