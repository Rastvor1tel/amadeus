<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?

    use Bitrix\Main\Page\Asset;

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
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<nav class="navbar__block  is--scroll<?= $APPLICATION->GetCurPage() == '/' ? ' is--index' : ''; ?>"
     data-scrollto="navbar">
    <? $APPLICATION->ShowPanel(); ?>
    <div class="navbar__inner">
        <div class="navbar__header">
            <div class="navbar__container container  is--header">
                <div class="navbar__header-row row  is--gap-xs">
                    <div class="navbar__header-cols cols  is--logotip">
                        <a class="navbar__logotip" href="<?= TEMPLATE_DIR ?>/">
                            <svg class="icon-svg icon-logotip" role="img">
                                <use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#logotip"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="navbar__header-cols cols  is--icon">
                        <div class="navbar__icon-wrap">
                            <a href="/personal/basket/" class="navbar__icon  is--basket">
                                <svg class="icon-svg icon-icon-basket" role="img">
                                    <use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#icon-basket"></use>
                                </svg>
                                <span class="navbar__icon-bage">20</span>
                            </a>
                            <a href="<?= TEMPLATE_DIR ?>/login.html" class="navbar__icon  is--login">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4333 11.7766C10.454 11.7766 10.4747 11.7766 10.4996 11.7766C10.5079 11.7766 10.5161 11.7766 10.5244 11.7766C10.5369 11.7766 10.5534 11.7766 10.5658 11.7766C11.7793 11.7559 12.7609 11.3293 13.4857 10.5134C15.0802 8.71589 14.8152 5.6345 14.7862 5.34045C14.6826 3.13295 13.6389 2.07683 12.7775 1.58397C12.1355 1.21537 11.3859 1.01657 10.5493 1H10.5203C10.5161 1 10.5079 1 10.5037 1H10.4789C10.0191 1 9.11627 1.07455 8.25067 1.56741C7.38092 2.06026 6.32066 3.11638 6.21712 5.34045C6.18813 5.6345 5.92307 8.71589 7.5176 10.5134C8.23824 11.3293 9.21981 11.7559 10.4333 11.7766ZM7.32294 5.44399C7.32294 5.43156 7.32708 5.41914 7.32708 5.41085C7.46376 2.44129 9.57185 2.12239 10.4747 2.12239H10.4913C10.4996 2.12239 10.512 2.12239 10.5244 2.12239C11.6427 2.14724 13.5437 2.60282 13.6721 5.41085C13.6721 5.42328 13.6721 5.4357 13.6762 5.44399C13.6804 5.47298 13.9703 8.2893 12.6532 9.77201C12.1314 10.3601 11.4356 10.65 10.5203 10.6583C10.512 10.6583 10.5079 10.6583 10.4996 10.6583C10.4913 10.6583 10.4872 10.6583 10.4789 10.6583C9.56771 10.65 8.86777 10.3601 8.35007 9.77201C7.03717 8.29758 7.3188 5.46884 7.32294 5.44399Z M19.0108 16.8874C19.0108 16.8832 19.0108 16.8791 19.0108 16.8749C19.0108 16.8418 19.0067 16.8087 19.0067 16.7714C18.9818 15.9514 18.928 14.0338 17.1305 13.4208C17.1181 13.4167 17.1015 13.4125 17.0891 13.4084C15.2212 12.9321 13.6681 11.8553 13.6515 11.8428C13.3989 11.6647 13.051 11.7269 12.8729 11.9795C12.6948 12.2322 12.7569 12.5801 13.0096 12.7581C13.08 12.8078 14.7284 13.9551 16.7909 14.4852C17.7559 14.829 17.8636 15.8602 17.8926 16.8045C17.8926 16.8418 17.8926 16.8749 17.8967 16.9081C17.9008 17.2808 17.876 17.8565 17.8097 18.1878C17.1388 18.5689 14.5089 19.8859 10.508 19.8859C6.52379 19.8859 3.87729 18.5647 3.2022 18.1837C3.13593 17.8524 3.10694 17.2767 3.11523 16.9039C3.11523 16.8708 3.11937 16.8377 3.11937 16.8004C3.14836 15.8561 3.25604 14.8248 4.22104 14.4811C6.28357 13.9509 7.93194 12.7996 8.00235 12.754C8.25499 12.5759 8.31711 12.228 8.13902 11.9754C7.96093 11.7227 7.61304 11.6606 7.3604 11.8387C7.34383 11.8511 5.799 12.928 3.92284 13.4042C3.90628 13.4084 3.89385 13.4125 3.88143 13.4167C2.08396 14.0338 2.03012 15.9514 2.00527 16.7673C2.00527 16.8045 2.00527 16.8377 2.00113 16.8708C2.00113 16.8749 2.00113 16.8791 2.00113 16.8832C1.99699 17.0986 1.99284 18.2044 2.21235 18.7594C2.25377 18.8671 2.32832 18.9582 2.42772 19.0203C2.55196 19.1031 5.5298 21 10.5122 21C15.4946 21 18.4724 19.099 18.5966 19.0203C18.6919 18.9582 18.7706 18.8671 18.812 18.7594C19.0191 18.2086 19.0149 17.1027 19.0108 16.8874Z"/>
                                    <g class="navbar__icon-autoriz">
                                        <circle cx="15.0117" cy="16" r="7" fill="#9BA655"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M18.6469 13.2567C19.0848 13.6262 19.1203 14.2585 18.7262 14.669L14.8862 18.669C14.6872 18.8762 14.4051 18.9962 14.1077 18.9999C13.8103 19.0037 13.5248 18.8909 13.32 18.6887L11.2933 16.6888C10.8876 16.2883 10.9049 15.6554 11.332 15.275C11.7591 14.8946 12.4343 14.9109 12.84 15.3113L14.0722 16.5272L17.1405 13.331C17.5346 12.9205 18.209 12.8873 18.6469 13.2567Z"
                                              fill="white"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="navbar__header-cols cols  is--hamburger">
                        <div class="navbar__hamburger">
                            <button class="navbar__hamburger-card" data-scrollto="humb" data-toggle="collapse"
                                    data-target="#bs-navbar-collapse" aria-expanded="false"
                                    data-toggle-nav=".navbar-site" data-body="html"
                                    data-collapse-nav=".navbar__collapse">
                                    <span class="navbar__hamburger-card-inner">
                                        <span class="navbar__hamburger-card-line  is--left"></span>
                                        <span class="navbar__hamburger-card-line  is--center"></span>
                                        <span class="navbar__hamburger-card-line  is--right"></span>
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar__collapse">
            <div class="navbar__collapse-inner">
                <div class="navbar__collapse-top">
                    <div class="navbar__container  container  is--collapse">
                        <div class="row navbar__collapse-row  is--jcsb">
                            <div class="navbar__collapse-cols cols">
                                <ul class="navbar__nav-top">
                                    <li class="navbar__nav-top-item<?= !CSite::InGroup(GROUP_ID_OPT) ? ' is--active' : ''; ?>">
                                        <span class="navbar__nav-top-link">Розничный покупатель</span>
                                    </li>
                                    <li class="navbar__nav-top-item<?= CSite::InGroup(GROUP_ID_OPT) ? ' is--active' : ''; ?>">
                                        <span class="navbar__nav-top-link">Оптовый покупатель</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar__collapse-cols cols">
                                <form action="<?= TEMPLATE_DIR ?>/search.html" class="navbar__search-form">
                                    <input type="text" placeholder="Поиск" class="navbar__search-input">
                                    <button type="submit" class="navbar__search-btn">
                                        <svg class="icon-svg icon-icon-search" role="img">
                                            <use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#icon-search"></use>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar__collapse-bottom">
                    <div class="navbar__container  container  is--collapse">
                        <div class="row navbar__collapse-row">
                            <div class="navbar__collapse-cols cols  is--left">
                                <a class="navbar__logotip" href="/">
                                    <svg class="icon-svg icon-logotip" role="img">
                                        <use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#logotip"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="navbar__collapse-cols cols  is--center">
                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "topmenu",
                                    [
                                        "ROOT_MENU_TYPE" => "top",
                                        "MENU_CACHE_TYPE" => "A",
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "MENU_CACHE_GET_VARS" => [],
                                        "MAX_LEVEL" => "3",
                                        "CHILD_MENU_TYPE" => "left",
                                        "USE_EXT" => "Y",
                                        "DELAY" => "N",
                                        "ALLOW_MULTI_SELECT" => "N"
                                    ],
                                    false
                                );
                                ?>
                            </div>
                            <div class="navbar__collapse-cols cols  is--right-center">
                                <a href="tel:+79092258887" class="continfo__item   is--navbar  is--noicon">
                                    <span class="continfo__item-name  is--navbar  is--noicon">+7 (909) 225-88-87</span>
                                </a>
                            </div>
                            <div class="navbar__collapse-cols cols  is--right">
                                <div class="navbar__icon-wrap">
                                    <?
                                    $APPLICATION->IncludeComponent(
                                        "bitrix:sale.basket.basket.line",
                                        "site",
                                        array(
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                            "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                            "SHOW_NUM_PRODUCTS" => "Y",
                                            "SHOW_TOTAL_PRICE" => "Y",
                                            "SHOW_EMPTY_VALUES" => "Y",
                                            "SHOW_PERSONAL_LINK" => "Y",
                                            "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                            "SHOW_AUTHOR" => "N",
                                            "PATH_TO_AUTHORIZE" => "",
                                            "SHOW_REGISTRATION" => "Y",
                                            "PATH_TO_REGISTER" => SITE_DIR."login/",
                                            "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                            "SHOW_PRODUCTS" => "N",
                                            "POSITION_FIXED" => "N",
                                            "HIDE_ON_BASKET_PAGES" => "N"
                                        ),
                                        false
                                    );?>
                                    <a href="/personal/" class="navbar__icon  is--login">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.4333 11.7766C10.454 11.7766 10.4747 11.7766 10.4996 11.7766C10.5079 11.7766 10.5161 11.7766 10.5244 11.7766C10.5369 11.7766 10.5534 11.7766 10.5658 11.7766C11.7793 11.7559 12.7609 11.3293 13.4857 10.5134C15.0802 8.71589 14.8152 5.6345 14.7862 5.34045C14.6826 3.13295 13.6389 2.07683 12.7775 1.58397C12.1355 1.21537 11.3859 1.01657 10.5493 1H10.5203C10.5161 1 10.5079 1 10.5037 1H10.4789C10.0191 1 9.11627 1.07455 8.25067 1.56741C7.38092 2.06026 6.32066 3.11638 6.21712 5.34045C6.18813 5.6345 5.92307 8.71589 7.5176 10.5134C8.23824 11.3293 9.21981 11.7559 10.4333 11.7766ZM7.32294 5.44399C7.32294 5.43156 7.32708 5.41914 7.32708 5.41085C7.46376 2.44129 9.57185 2.12239 10.4747 2.12239H10.4913C10.4996 2.12239 10.512 2.12239 10.5244 2.12239C11.6427 2.14724 13.5437 2.60282 13.6721 5.41085C13.6721 5.42328 13.6721 5.4357 13.6762 5.44399C13.6804 5.47298 13.9703 8.2893 12.6532 9.77201C12.1314 10.3601 11.4356 10.65 10.5203 10.6583C10.512 10.6583 10.5079 10.6583 10.4996 10.6583C10.4913 10.6583 10.4872 10.6583 10.4789 10.6583C9.56771 10.65 8.86777 10.3601 8.35007 9.77201C7.03717 8.29758 7.3188 5.46884 7.32294 5.44399Z M19.0108 16.8874C19.0108 16.8832 19.0108 16.8791 19.0108 16.8749C19.0108 16.8418 19.0067 16.8087 19.0067 16.7714C18.9818 15.9514 18.928 14.0338 17.1305 13.4208C17.1181 13.4167 17.1015 13.4125 17.0891 13.4084C15.2212 12.9321 13.6681 11.8553 13.6515 11.8428C13.3989 11.6647 13.051 11.7269 12.8729 11.9795C12.6948 12.2322 12.7569 12.5801 13.0096 12.7581C13.08 12.8078 14.7284 13.9551 16.7909 14.4852C17.7559 14.829 17.8636 15.8602 17.8926 16.8045C17.8926 16.8418 17.8926 16.8749 17.8967 16.9081C17.9008 17.2808 17.876 17.8565 17.8097 18.1878C17.1388 18.5689 14.5089 19.8859 10.508 19.8859C6.52379 19.8859 3.87729 18.5647 3.2022 18.1837C3.13593 17.8524 3.10694 17.2767 3.11523 16.9039C3.11523 16.8708 3.11937 16.8377 3.11937 16.8004C3.14836 15.8561 3.25604 14.8248 4.22104 14.4811C6.28357 13.9509 7.93194 12.7996 8.00235 12.754C8.25499 12.5759 8.31711 12.228 8.13902 11.9754C7.96093 11.7227 7.61304 11.6606 7.3604 11.8387C7.34383 11.8511 5.799 12.928 3.92284 13.4042C3.90628 13.4084 3.89385 13.4125 3.88143 13.4167C2.08396 14.0338 2.03012 15.9514 2.00527 16.7673C2.00527 16.8045 2.00527 16.8377 2.00113 16.8708C2.00113 16.8749 2.00113 16.8791 2.00113 16.8832C1.99699 17.0986 1.99284 18.2044 2.21235 18.7594C2.25377 18.8671 2.32832 18.9582 2.42772 19.0203C2.55196 19.1031 5.5298 21 10.5122 21C15.4946 21 18.4724 19.099 18.5966 19.0203C18.6919 18.9582 18.7706 18.8671 18.812 18.7594C19.0191 18.2086 19.0149 17.1027 19.0108 16.8874Z"/>
                                            <g class="navbar__icon-autoriz">
                                                <circle cx="15.0117" cy="16" r="7" fill="#9BA655"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M18.6469 13.2567C19.0848 13.6262 19.1203 14.2585 18.7262 14.669L14.8862 18.669C14.6872 18.8762 14.4051 18.9962 14.1077 18.9999C13.8103 19.0037 13.5248 18.8909 13.32 18.6887L11.2933 16.6888C10.8876 16.2883 10.9049 15.6554 11.332 15.275C11.7591 14.8946 12.4343 14.9109 12.84 15.3113L14.0722 16.5272L17.1405 13.331C17.5346 12.9205 18.209 12.8873 18.6469 13.2567Z"
                                                      fill="white"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<main class="content-block__panel  is--aside-cabinet">