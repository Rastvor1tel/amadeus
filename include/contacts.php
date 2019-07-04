<div class="content-block__container container is--full">
    <div class="content-block__elem">
        <div class="content-block__row row  is--gutter">
            <div class="content-block__cols cols is--cols-screen-5  is--cols-12">
                <div class="content-block__elem">
                    <div class="continfo__block  is--contacts">
                        <h4 class="continfo__heading  is--contacts">Склад интернет-магазина Amadeus</h4>
                        <div class="continfo__row row  is--contacts">
                            <div class="continfo__cols cols  is--address  is--contacts">
                                <a href="#map-2gis" class="continfo__item   is--contacts scrollto" data-office data-coord="<?=COption::GetOptionString('grain.customsettings','coordinates')?>" data-scrollto-diff="-82">
                                        <span class="continfo__item-icon  is--contacts">
                                            <svg class="icon-svg icon-contacts-address" role="img">
                                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-address"></use>
                                            </svg>
                                        </span>
                                    <span class="continfo__item-name  is--contacts"><?=COption::GetOptionString('grain.customsettings','adress')?></span>
                                </a>
                            </div>
                            <div class="continfo__cols cols  is--contacts">
                                <a href="tel:+<?=preg_replace("/[^0-9]/", '', COption::GetOptionString('grain.customsettings','phone'));?>" class="continfo__item   is--contacts">
                                        <span class="continfo__item-icon  is--contacts">
                                            <svg class="icon-svg icon-contacts-tel" role="img">
                                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-tel"></use>
                                            </svg>
                                        </span>
                                    <span class="continfo__item-name  is--contacts"><?=COption::GetOptionString('grain.customsettings','phone')?></span>
                                </a>
                            </div>
                            <div class="continfo__cols cols  is--contacts">
                                <div class="continfo__item   is--contacts">
                                        <span class="continfo__item-icon  is--contacts">
                                            <svg class="icon-svg icon-contacts-clock" role="img">
                                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-clock"></use>
                                            </svg>
                                        </span>
                                    <span class="continfo__item-name  is--contacts"><?=COption::GetOptionString('grain.customsettings','workingtime')?></span>
                                </div>
                            </div>
                            <div class="continfo__cols cols  is--contacts">
                                <div class="continfo__item   is--contacts">
                                        <span class="continfo__item-icon  is--contacts">
                                            <svg class="icon-svg icon-contacts-user" role="img">
                                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-user"></use>
                                            </svg>
                                        </span>
                                    <span class="continfo__item-name  is--contacts"><?=COption::GetOptionString('grain.customsettings','name')?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-block__elem">
                    <div class="social__block">
                        <h5 class="social__heading  is--contact">Мы в социальных сетях:</h5>
                        <div class="social__row row  is--contact">
                            <?if(COption::GetOptionString('grain.customsettings','vk')):?>
                                <div class="social__cols cols  is--contact">
                                    <a href="<?=COption::GetOptionString('grain.customsettings','vk')?>" class="social__item  is--vk  is--contact"
                                       target="_blank">
                                        <svg class="icon-svg icon-soc-vk" role="img">
                                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#soc-vk"></use>
                                        </svg>
                                    </a>
                                </div>
                            <?endif;?>
                            <?if(COption::GetOptionString('grain.customsettings','vk')):?>
                                <div class="social__cols cols  is--contact">
                                    <a href="<?=COption::GetOptionString('grain.customsettings','ok')?>" class="social__item  is--ok  is--contact" target="_blank">
                                        <svg class="icon-svg icon-soc-ok" role="img">
                                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#soc-ok"></use>
                                        </svg>
                                    </a>
                                </div>
                            <?endif;?>
                            <?if(COption::GetOptionString('grain.customsettings','vk')):?>
                                <div class="social__cols cols  is--contact">
                                    <a href="<?=COption::GetOptionString('grain.customsettings','youtube')?>" class="social__item  is--yb  is--contact" target="_blank">
                                        <svg class="icon-svg icon-soc-yb" role="img">
                                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#soc-yb"></use>
                                        </svg>
                                    </a>
                                </div>
                            <?endif;?>
                            <?if(COption::GetOptionString('grain.customsettings','facebook')):?>
                                <div class="social__cols cols  is--contact">
                                    <a href="<?=COption::GetOptionString('grain.customsettings','facebook')?>" class="social__item  is--fb  is--contact" target="_blank"><svg class="icon-svg icon-soc-fb" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-fb"></use>
                                        </svg></a>
                                </div>
                            <?endif;?>
                            <?if(COption::GetOptionString('grain.customsettings','instagram')):?>
                                <div class="social__cols cols  is--contact">
                                    <a href="<?=COption::GetOptionString('grain.customsettings','instagram')?>" class="social__item  is--inst  is--contact" target="_blank"><svg class="icon-svg icon-soc-inst" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-inst"></use>
                                        </svg></a>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-block__cols cols is--cols-screen-7  is--cols-12">
                <div class="map__block" id="map-2gis" data-map='{"center" : [<?=COption::GetOptionString('grain.customsettings','coordinates')?>],"zoom" : 18, "placemarks" : [{"coord" : [<?=COption::GetOptionString('grain.customsettings','coordinates')?>], "heading": "Склад интернет-магазина Amadeus"}]}' ></div>
            </div>
        </div>
    </div>
</div>