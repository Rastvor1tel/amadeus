<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Личный кабинет | трикотажная фабрика \"Амадеус\" в Москве ");
$APPLICATION->SetTitle("Личный кабинет");
?>

    <div class="cabinet__navbar-block dropdown">
        <a href="#" data-toggle="dropdown" class="cabinet__navbar-btn-block">
            <div class="container">
                <div class="cabinet__navbar-btn">
                    <div class="cabinet__navbar-btn-hamb">
                        <div class="cabinet__navbar-btn-hamb-item  is--top"></div>
                        <div class="cabinet__navbar-btn-hamb-item  is--center"></div>
                        <div class="cabinet__navbar-btn-hamb-item  is--bottom"></div>
                    </div>
                    <div class="cabinet__navbar-btn-name">
                        Другие разделы
                    </div>
                </div>
            </div>
        </a>
        <div class="cabinet__navbar-dropdown">
            <div class="cabinet__navbar-userbar">
                <div class="cabinet__userbar-block">
                    <div class="cabinet__userbar-preview">
                        <img src="<?=TEMPLATE_DIR?>/img/temp/card-lock.jpg" class="img-responsive" alt="">
                        <div class="cabinet__userbar-btn">
                            <button type="button" class="btn-icon__item  is--dark  is--xs" title="Редактировать"><svg class="icon-svg icon-icon-edit" role="img">
                                    <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#icon-edit"></use>
                                </svg></button>
                        </div>
                    </div>
                    <div class="cabinet__userbar-group">
                        <div class="cabinet__userbar-heading"><a href="/amadeus/profile.html">Ирина Лаптева</a></div>
                        <div class="cabinet__userbar-contacts">
                            <div class="cabinet__userbar-icon"><svg class="icon-svg icon-contacts-email" role="img">
                                    <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-email"></use>
                                </svg></div>
                            <span>Irina@mail.ru</span>
                        </div>
                        <div class="cabinet__userbar-contacts">
                            <div class="cabinet__userbar-icon"><svg class="icon-svg icon-contacts-tel" role="img">
                                    <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-tel"></use>
                                </svg></div>
                            <span>+7 (960) 855-25-55</span>
                        </div>
                    </div>
                </div>
            </div>
            <?
            $APPLICATION->IncludeComponent('bitrix:menu', 'lk_menu', []);
            ?>
            <div class="cabinet__navbar-btn">
                <a href="/amadeus/" class="btn__item  is--line">
                    <span class="btn__name">Выход</span>
                </a>
            </div>
        </div>
    </div>
    <div class="content-block__container container  is--aside-cabinet  is--full">
        <div class="page-header__group  is--h1  is--grid">
            <div class="breadcrumb__block      is--grid">
                <ul class="breadcrumb__list      is--grid">
                    <li class="breadcrumb__list-item">
                        <a href="/amadeus/" class="breadcrumb__list-link">Главная</a>
                    </li>
                    <li class="breadcrumb__list-item is--active">
                        <span class="breadcrumb__list-link">Личный кабинет</span>
                    </li>
                </ul>
            </div>
            <div class="page-header__panel  is--h1  is--grid">
                <h1 class="page-header__heading  is--h1  is--grid">Личный кабинет</h1>
            </div>
            <div class="cabinet__sale-block  is--grid">
                <div class="cabinet__sale-num">
                    <span>-30</span>%
                </div>
                <div class="cabinet__sale-heading">
                    Персональная<br> скидка
                </div>
            </div>
        </div>
        <div class="content-block__elem  is--cabinet">
            <div class="content-block__row row  is--gutter  is--cabinet">
                <div class="content-block__cols cols  is--cabinet">
                    <a href="/amadeus/basket.html" class="cabinet__card-item">
                        <div class="cabinet__card-preview">
                            <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-basket.jpg" srcset="/amadeus/img/temp/card-cabinet-basket-2x.jpg 2x" class="img-responsive" alt="">
                        </div>
                        <div class="cabinet__card-group">
                            <div class="cabinet__card-heading">Моя<br> корзина</div>
                            <div class="cabinet__card-heading-small">2 товара</div>
                            <div class="cabinet__card-cost"><span>3 150</span>&nbsp;₽</div>
                        </div>
                        <div class="cabinet__card-arrow">
                            <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
                        </div>
                    </a>
                </div>
                <div class="content-block__cols cols  is--cabinet">
                    <a href="/amadeus/order.html" class="cabinet__card-item">
                        <div class="cabinet__card-preview">
                            <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-order.jpg" srcset="/amadeus/img/temp/card-cabinet-order-2x.jpg 2x" class="img-responsive" alt="">
                        </div>
                        <div class="cabinet__card-group">
                            <div class="cabinet__card-heading">Мои<br> заказы</div>
                            <div class="cabinet__card-heading-small">1 заказ</div>
                            <div class="cabinet__card-cost"><span>9 150</span>&nbsp;₽</div>
                        </div>
                        <div class="cabinet__card-arrow">
                            <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
                        </div>
                    </a>
                </div>
                <div class="content-block__cols cols  is--cabinet">
                    <a href="/amadeus/profile.html" class="cabinet__card-item">
                        <div class="cabinet__card-preview">
                            <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-profile.jpg" srcset="/amadeus/img/temp/card-cabinet-profile-2x.jpg 2x" class="img-responsive" alt="">
                        </div>
                        <div class="cabinet__card-group">
                            <div class="cabinet__card-heading  is--contacts">Профиль</div>
                            <div class="cabinet__card-fio">Ирина Лаптева</div>
                            <div class="cabinet__card-contacts">
                                <div class="cabinet__card-contacts-icon"><svg class="icon-svg icon-contacts-email" role="img">
                                        <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-email"></use>
                                    </svg></div>
                                <span>Irina@mail.ru</span>
                            </div>
                            <div class="cabinet__card-contacts">
                                <div class="cabinet__card-contacts-icon"><svg class="icon-svg icon-contacts-tel" role="img">
                                        <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-tel"></use>
                                    </svg></div>
                                <span>+7 (960) 855-25-55</span>
                            </div>
                        </div>
                        <div class="cabinet__card-arrow">
                            <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>