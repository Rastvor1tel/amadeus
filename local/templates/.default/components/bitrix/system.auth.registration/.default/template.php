<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? ShowMessage($arParams["~AUTH_RESULT"]); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:main.register",
    "",
    [
        "AUTH" => "Y",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "REQUIRED_FIELDS" => ["EMAIL", "PERSONAL_BIRTHDAY", "PERSONAL_MOBILE", "PERSONAL_CITY"],
        "SET_TITLE" => "Y",
        "SHOW_FIELDS" => [
            "EMAIL",
        ],
        "SUCCESS_PAGE" => "",
        "USER_PROPERTY" => [],
        "USE_BACKURL" => "Y"
    ]
); ?>