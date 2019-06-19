<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?if($USER->IsAuthorized()):?>
<div class="content-block__row row  is--gutter  is--cabinet">
    <div class="content-block__cols cols  is--cabinet">
        <a href="<?=$arResult['BASKET']['LINK']?>" class="cabinet__card-item">
            <div class="cabinet__card-preview">
                <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-basket.jpg" srcset="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-basket-2x.jpg 2x" class="img-responsive" alt="">
            </div>
            <div class="cabinet__card-group">
                <div class="cabinet__card-heading">Моя<br> корзина</div>
                <div class="cabinet__card-heading-small">Товаров: <?=$arResult['BASKET']['QUANTITY']?></div>
                <div class="cabinet__card-cost"><span><?=$arResult['BASKET']['TOTAL_PRICE_FORMATTED']?></span>&nbsp;₽</div>
            </div>
            <div class="cabinet__card-arrow">
                <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
            </div>
        </a>
    </div>
    <div class="content-block__cols cols  is--cabinet">
        <a href="<?=$arResult['ORDERS']['LINK']?>" class="cabinet__card-item">
            <div class="cabinet__card-preview">
                <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-order.jpg" srcset="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-order-2x.jpg 2x" class="img-responsive" alt="">
            </div>
            <div class="cabinet__card-group">
                <div class="cabinet__card-heading">Мои<br> заказы</div>
                <div class="cabinet__card-heading-small">Заказов: <?=$arResult['ORDERS']['QUANTITY']?></div>
                <div class="cabinet__card-cost"><span><?=$arResult['ORDERS']['TOTAL_PRICE_FORMATTED']?></span>&nbsp;₽</div>
            </div>
            <div class="cabinet__card-arrow">
                <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
            </div>
        </a>
    </div>
    <div class="content-block__cols cols  is--cabinet">
        <a href="<?=$arResult['USER']['LINK']?>" class="cabinet__card-item">
            <div class="cabinet__card-preview">
                <img src="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-profile.jpg" srcset="<?=TEMPLATE_DIR?>/img/temp/card-cabinet-profile-2x.jpg 2x" class="img-responsive" alt="">
            </div>
            <div class="cabinet__card-group">
                <div class="cabinet__card-heading  is--contacts">Профиль</div>
                <div class="cabinet__card-fio"><?=$arResult['USER']['NAME']?></div>
                <?if($arResult['USER']['EMAIL']):?>
                    <div class="cabinet__card-contacts">
                        <div class="cabinet__card-contacts-icon"><svg class="icon-svg icon-contacts-email" role="img">
                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-email"></use>
                            </svg></div>
                        <span><?=$arResult['USER']['EMAIL']?></span>
                    </div>
                <?endif;?>
                <?if($arResult['USER']['PHONE']):?>
                    <div class="cabinet__card-contacts">
                        <div class="cabinet__card-contacts-icon"><svg class="icon-svg icon-contacts-tel" role="img">
                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-tel"></use>
                            </svg></div>
                        <span><?=$arResult['USER']['PHONE']?></span>
                    </div>
                <?endif;?>
            </div>
            <div class="cabinet__card-arrow">
                <svg width="47" height="23" viewBox="0 0 47 23" xmlns="http://www.w3.org/2000/svg"><circle cx="35.5" cy="11.5" r="11.5" class="cabinet__card-arrow-circle"></circle><path d="M34.3432 4.2983L40.7083 10.781C41.0972 11.1784 41.0972 11.8214 40.7084 12.2188L40.7071 12.2202L34.3432 18.7017C33.9526 19.0994 33.3195 19.0994 32.9289 18.7017C32.5384 18.304 32.5384 17.6591 32.9289 17.2614L37.5858 12.5185L1 12.5185C0.447716 12.5185 0 12.0625 0 11.5C0 10.9375 0.447717 10.4815 1 10.4815L37.5858 10.4815L32.9289 5.73864C32.5384 5.34091 32.5384 4.69604 32.9289 4.2983C32.9778 4.24859 33.0304 4.20508 33.0858 4.1678C33.3631 3.98136 33.7114 3.95028 34.0123 4.07458C34.1327 4.12429 34.2455 4.19887 34.3432 4.2983Z" class="cabinet__card-arrow-path"></path></svg>
            </div>
        </a>
    </div>
</div>
<?endif;?>