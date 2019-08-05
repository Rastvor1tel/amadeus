<div class="container header-block__container  is--wholesale">
    <div class="header-block__panel  is--wholesale">
        <div class="header-block__inner  is--wholesale">
            <h1 class="header-block__heading  is--wholesale"><?=$arResult['DISPLAY_PROPERTIES']['TITLE']['VALUE']?></h1>
            <div class="header-block__heading-small  is--wholesale"><?=$arResult['DISPLAY_PROPERTIES']['SUBTITLE']['VALUE']?></div>
            <div class="header-block__btn  is--wholesale">
                <?foreach($arResult['DISPLAY_PROPERTIES']['BUTTONS']['VALUE'] as $key => $button):?>
                <a href="<?=$arResult['DISPLAY_PROPERTIES']['BUTTONS']['DESCRIPTION'][$key]?>" class="btn__item" <?=strpos($arResult['DISPLAY_PROPERTIES']['BUTTONS']['DESCRIPTION'][$key], '#modal')+1 == 1?' data-toggle="modal" data-target="'.$arResult['DISPLAY_PROPERTIES']['BUTTONS']['DESCRIPTION'][$key].'"':'';?>>
                    <span class="btn__name"><?=$button?></span>
                </a><br>
                <?endforeach;?>
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
        <?foreach($arResult['DISPLAY_PROPERTIES']['BANNERS']['FILE_VALUE'] as $arItem):?>
            <picture class="header-block__slider-item  is--wholesale">
                <source media="(min-width: 451px)" srcset="<?=$arItem['SRC']?>">
                <img src="<?=$arItem['SRC']?>" class="img-responsive" alt="" class="img-responsive">
            </picture>
        <?endforeach;?>
    </div>
</div>