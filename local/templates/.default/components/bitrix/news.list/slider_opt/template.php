<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="container header-block__container  is--wholesale">
    <div class="header-block__panel  is--wholesale">
        <div class="header-block__inner  is--wholesale">
            <h1 class="header-block__heading  is--wholesale"><?=$arResult['SLIDER']['TITLE']?></h1>
            <div class="header-block__heading-small  is--wholesale"><?=$arResult['SLIDER']['SUBTITLE']?></div>
            <div class="header-block__btn  is--wholesale">
                <a href="<?=$arResult['SLIDER']['LINK']?>" class="btn__item" data-toggle="modal" data-target="#modal-call">
                    <span class="btn__name"><?=$arResult['SLIDER']['BUTTON_TEXT']?></span>
                </a>
            </div>
            <div class="header-block__soc  is--wholesale">
                <div class="social__block">
                    <div class="social__row row  is--wholesale">
                        <?if(COption::GetOptionString('grain.customsettings','telegram')):?>
                        <div class="social__cols cols  is--wholesale">
                            <a href="<?=COption::GetOptionString('grain.customsettings','telegram')?>" class="social__item  is--tg  is--wholesale" target="_blank">
                                <svg class="icon-svg icon-soc-tg" role="img">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-tg"></use>
                                </svg>
                            </a>
                        </div>
                        <?endif;?>
                        <?if(COption::GetOptionString('grain.customsettings','viber')):?>
                        <div class="social__cols cols  is--wholesale">
                            <a href="<?=COption::GetOptionString('grain.customsettings','viber')?>" class="social__item  is--viber  is--wholesale" target="_blank">
                                <svg class="icon-svg icon-soc-viber" role="img">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-viber"></use>
                                </svg>
                            </a>
                        </div>
                        <?endif;?>
                        <?if(COption::GetOptionString('grain.customsettings','whatsapp')):?>
                        <div class="social__cols cols  is--wholesale">
                            <a href="<?=COption::GetOptionString('grain.customsettings','whatsapp')?>" class="social__item  is--wa  is--wholesale" target="_blank">
                                <svg class="icon-svg icon-soc-wa" role="img">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#soc-wa"></use>
                                </svg>
                            </a>
                        </div>
                        <?endif;?>
                        <?if($GLOBALS["PHONE"]):?>
                        <div class="social__cols cols  is--tel  is--wholesale">
                            <a href="tel:+<?=preg_replace("/[^0-9]/", '', $GLOBALS["PHONE"]);?>" class="social__tel   is--wholesale">
                                <?=$GLOBALS["PHONE"];?>
                            </a>
                        </div>
                        <?endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-block__slider-block  is--wholesale">
    <div class="header-block__slider  is--wholesale" data-slider-slick="slick-header">
        <?foreach($arResult['ITEMS'] as $arItem):?>
        <picture class="header-block__slider-item  is--wholesale">
            <source media="(min-width: 451px)" srcset="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="img-responsive" alt="" class="img-responsive">
        </picture>
        <?endforeach;?>
    </div>
</div>