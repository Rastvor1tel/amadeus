<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="container header-block__container  is--retail">
    <div class="header-block__panel  is--retail">
        <div class="header-block__inner  is--retail">
            <div class="header-block__heading-small  is--retail"><?=$arResult['DISPLAY_PROPERTIES']['SUBTITLE']['VALUE']?></div>
            <h1 class="header-block__heading  is--retail"><?=$arResult['DISPLAY_PROPERTIES']['TITLE']['VALUE']?></h1>
            <div class="header-block__btn  is--retail">
                <?foreach($arResult['DISPLAY_PROPERTIES']['BUTTONS']['VALUE'] as $key => $button):?>
                <a href="<?=$arResult['DISPLAY_PROPERTIES']['BUTTONS']['DESCRIPTION'][$key]?>" class="btn__item">
                    <span class="btn__name"><?=$button?></span>
                </a>
                <?endforeach;?>
            </div>
            <div class="header-block__soc  is--retail">
                <div class="social__block">
                    <div class="social__row row  is--header">
                        <?if(COption::GetOptionString('grain.customsettings','telegram')):?>
                            <div class="social__cols cols  is--header">
                                <a href="<?=COption::GetOptionString('grain.customsettings','telegram')?>" class="social__item  is--tg  is--header" target="_blank">
                                    <svg class="icon-svg icon-soc-tg" role="img">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-tg"></use>
                                    </svg>
                                </a>
                            </div>
                        <?endif;?>
                        <?if(COption::GetOptionString('grain.customsettings','viber')):?>
                            <div class="social__cols cols  is--header">
                                <a href="<?=COption::GetOptionString('grain.customsettings','viber')?>" class="social__item  is--viber  is--header" target="_blank">
                                    <svg class="icon-svg icon-soc-viber" role="img">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-viber"></use>
                                    </svg>
                                </a>
                            </div>
                        <?endif;?>
                        <?if(COption::GetOptionString('grain.customsettings','whatsapp')):?>
                            <div class="social__cols cols  is--header">
                                <a href="<?=COption::GetOptionString('grain.customsettings','whatsapp')?>" class="social__item  is--wa  is--header" target="_blank">
                                    <svg class="icon-svg icon-soc-wa" role="img">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-wa"></use>
                                    </svg>
                                </a>
                            </div>
                        <?endif;?>
                        <?if($GLOBALS["PHONE"]):?>
                            <div class="social__cols cols  is--tel  is--header">
                                <a href="tel:+<?=preg_replace("/[^0-9]/", '', $GLOBALS["PHONE"]);?>" class="social__tel   is--header">
                                    <?=$GLOBALS["PHONE"]?>
                                </a>
                            </div>
                        <?endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-block__slider-block  is--retail">
    <div class="header-block__slider  is--retail" data-slider-slick="slick-header">
        <?foreach($arResult['DISPLAY_PROPERTIES']['BANNERS']['FILE_VALUE'] as $arItem):?>
            <div class="header-block__slider-item">
                <img src="<?=$arItem['SRC']?>" class="img-responsive" alt="">
            </div>
        <?endforeach;?>
    </div>
</div>
