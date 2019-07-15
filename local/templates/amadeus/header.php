<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<?$APPLICATION->IncludeFile('/local/include/head.php');?>
<body<?= $APPLICATION->GetCurPage() == '/' ? ' class="is--index-page"' : ''; ?>>
<?$APPLICATION->IncludeFile('/local/include/header.php');?>
<? if ($APPLICATION->GetCurPage() == '/'): ?>
    <header class="header-block__block  is--retail"
            style="background-image: url(/amadeus/img/temp/bg-index-header.jpg);">

        <div class="container header-block__container  is--retail">
            <div class="header-block__panel  is--retail">
                <div class="header-block__inner  is--retail">
                    <div class="header-block__heading-small  is--retail">Интернет-магазин</div>
                    <h1 class="header-block__heading  is--retail">Трикотажная одежда</h1>
                    <div class="header-block__btn  is--retail">
                        <a href="/catalog/" class="btn__item    ">
                            <span class="btn__name">Каталог</span>
                        </a>
                    </div>
                    <div class="header-block__soc  is--retail">
                        <div class="social__block">
                            <div class="social__row row  is--header">
                                <div class="social__cols cols  is--header">
                                    <a href="tg://resolve?domain=amadeusfamily" class="social__item  is--tg  is--header"
                                       target="_blank">
                                        <svg class="icon-svg icon-soc-tg" role="img">
                                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-tg"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="social__cols cols  is--header">
                                    <a href="viber://chat?number=79092258887"
                                       class="social__item  is--viber  is--header" target="_blank">
                                        <svg class="icon-svg icon-soc-viber" role="img">
                                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-viber"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="social__cols cols  is--header">
                                    <a href="https://wa.me/79092258887" class="social__item  is--wa  is--header"
                                       target="_blank">
                                        <svg class="icon-svg icon-soc-wa" role="img">
                                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-wa"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="social__cols cols  is--tel  is--header">
                                    <a href="tel:+79092258887" class="social__tel   is--header">+7 (909) 225-88-87</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-block__slider-block  is--retail">
            <div class="header-block__slider  is--retail" data-slider-slick="slick-header">
                <div class="header-block__slider-item"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/img/temp/header-slider-item1.png" class="img-responsive"
                            alt=""></div>
                <div class="header-block__slider-item"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/img/temp/header-slider-item2.png" class="img-responsive"
                            alt=""></div>
                <div class="header-block__slider-item"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/img/temp/header-slider-item3.png" class="img-responsive"
                            alt=""></div>
                <div class="header-block__slider-item"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/img/temp/header-slider-item4.png" class="img-responsive"
                            alt=""></div>
            </div>
        </div>
    </header>
<? elseif(explode('/', $APPLICATION->GetCurDir())[1] == 'catalog'): ?>
<main class="content-block__panel  is--aside-navbar  is--dark-bg">
<?else:?>
<main class="content-block__panel  is--aside-navbar  is--bg">
    <div class="content-block__container container  is--full">
        <div class="page-header__group  is--h1">
            <?$APPLICATION->IncludeComponent('bitrix:breadcrumb', '');?>
            <div class="page-header__panel  is--h1">
                <h1 class="page-header__heading  is--h1"><?$APPLICATION->ShowTitle(false)?></h1>
            </div>
        </div>
<? endif; ?>
