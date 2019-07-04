<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
    use Bitrix\Main\Page\Asset;
    use Bitrix\Main\Localization\Loc;

    Loc::loadMessages(__FILE__);
    CJSCore::Init(['ajax']);

    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width">');
    Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    Asset::getInstance()->addString('<meta name="msapplication-config" content="' . TEMPLATE_DIR . '/favicon/browserconfig.xml">');
    Asset::getInstance()->addString('<meta name="apple-mobile-web-app-title" content="amadeus-family.ru">');
    Asset::getInstance()->addString('<meta name="application-name" content="amadeus-family.ru">');
    Asset::getInstance()->addString('<meta name="msapplication-TileColor" content="#ffffff">');
    Asset::getInstance()->addString('<meta name="theme-color" content="#ffffff">');
    Asset::getInstance()->addString('<link rel="apple-touch-icon" sizes="180x180" href="' . TEMPLATE_DIR . '/favicon/apple-touch-icon.png">');
    Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="32x32" href="' . TEMPLATE_DIR . '/favicon/favicon-32x32.png">');
    Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="16x16" href="' . TEMPLATE_DIR . '/favicon/favicon-16x16.png">');
    Asset::getInstance()->addString('<link rel="manifest" href="' . TEMPLATE_DIR . '/favicon/site.webmanifest">');
    Asset::getInstance()->addString('<link rel="mask-icon" href="' . TEMPLATE_DIR . '/favicon/safari-pinned-tab.svg" color="#E31E24">');
    Asset::getInstance()->addString('<link rel="shortcut icon" href="' . TEMPLATE_DIR . '/favicon/favicon.ico">');

    Asset::getInstance()->addCss(TEMPLATE_DIR . '/css/site.css');
    Asset::getInstance()->addCss(TEMPLATE_DIR . '/css/custom.css');
    Asset::getInstance()->addJs(TEMPLATE_DIR . '/js/jquery-3.2.1.min.js');
    Asset::getInstance()->addJs(TEMPLATE_DIR . '/js/document-ready.js');
    Asset::getInstance()->addJs(TEMPLATE_DIR . '/js/svg4everybody.min.js');

    $APPLICATION->ShowHead();
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        svg4everybody();
        document.createElement("picture");
    </script>
</head>