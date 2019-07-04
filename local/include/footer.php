<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<footer class="footer__block">
    <div class="footer__inner">
        <div class="footer__container container">
            <div class="footer__navbar">
                <div class="footer__navbar-row row">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottommenu",
                        [
                            "ROOT_MENU_TYPE" => "bottom",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => [],
                            "MAX_LEVEL" => "1",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ],
                        false
                    );
                    ?>
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "catalogmenu",
                        [
                            "ROOT_MENU_TYPE" => "catalog",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => [],
                            "MAX_LEVEL" => "1",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ],
                        false
                    );
                    ?>
                </div>
            </div>
            <div class="footer__info">
                <div class="footer__row row  is--base">
                    <div class="footer__cols cols  is--copyright">
                        &copy; Amadeus 2016 - 2018. Все права защищены.
                    </div>
                    <div class="footer__cols cols  is--soc">
                        <div class="social__block">
                            <div class="social__row row  is--footer">
                                <div class="social__cols cols  is--footer">
                                    <a href="https://vk.com/amadeus_family" class="social__item  is--vk  is--footer" target="_blank"><svg class="icon-svg icon-soc-vk" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-vk"></use>
                                        </svg></a>
                                </div>
                                <div class="social__cols cols  is--footer">
                                    <a href="https://ok.ru/group/53717223997527" class="social__item  is--ok  is--footer" target="_blank"><svg class="icon-svg icon-soc-ok" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-ok"></use>
                                        </svg></a>
                                </div>
                                <div class="social__cols cols  is--footer">
                                    <a href="https://www.facebook.com/" class="social__item  is--fb  is--footer" target="_blank"><svg class="icon-svg icon-soc-fb" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-fb"></use>
                                        </svg></a>
                                </div>
                                <div class="social__cols cols  is--footer">
                                    <a href="https://www.instagram.com/amadeus_family/" class="social__item  is--inst  is--footer" target="_blank"><svg class="icon-svg icon-soc-inst" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-inst"></use>
                                        </svg></a>
                                </div>
                                <div class="social__cols cols  is--footer">
                                    <a href="https://www.youtube.com/channel/UCqfZcP6JV8cmDVl98FnGu1Q/" class="social__item  is--yb  is--footer" target="_blank"><svg class="icon-svg icon-soc-yb" role="img">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#soc-yb"></use>
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__cols cols  is--tel   is--footer">
                        <a href="tel:+79092258887" class="continfo__item   is--footer">
                            <span class="continfo__item-name  is--footer">+7 (909) 225-88-87</span>
                        </a>
                    </div>
                    <div class="footer__cols cols  is--btn">
                        <button type="button" class="btn__item  is--sm" data-toggle="modal" data-target="#modal-call">
                            <span class="btn__name">Обратный звонок</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>