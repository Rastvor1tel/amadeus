<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?if($USER->IsAuthorized()):?>
<div class="cabinet__navbar-userbar">
    <div class="cabinet__userbar-block">
        <div class="cabinet__userbar-preview">
            <img src="<?=$arResult['IMAGE']?$arResult['IMAGE']:TEMPLATE_DIR.'/img/temp/card-lock.jpg';?>" class="img-responsive" alt="">
            <a href="<?=$arResult['LINK']?>" class="cabinet__userbar-btn">
                <button type="button" class="btn-icon__item  is--dark  is--xs" title="Редактировать">
                    <svg class="icon-svg icon-icon-edit" role="img">
                        <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#icon-edit"></use>
                    </svg>
                </button>
            </a>
        </div>
        <div class="cabinet__userbar-group">
            <div class="cabinet__userbar-heading"><a href="<?=$arResult['LINK']?>"><?=$arResult['NAME']?></a></div>
            <?if($arResult['EMAIL']):?>
                <div class="cabinet__userbar-contacts">
                    <div class="cabinet__userbar-icon"><svg class="icon-svg icon-contacts-email" role="img">
                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-email"></use>
                        </svg></div>
                    <span><?=$arResult['EMAIL']?></span>
                </div>
            <?endif;?>
            <?if($arResult['PHONE']):?>
                <div class="cabinet__userbar-contacts">
                    <div class="cabinet__userbar-icon"><svg class="icon-svg icon-contacts-tel" role="img">
                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#contacts-tel"></use>
                        </svg></div>
                    <span><?=$arResult['PHONE']?></span>
                </div>
            <?endif;?>
            <?
            CModule::IncludeModule('logictim.balls');
            $userBonus = cHelper::UserBallance($arResult['ID']);
            ?>
            <?if($userBonus):?>
                <span class="cabinet__userbar-contacts">
                    <span>Количество бонусов:&nbsp;</span><span><?=$userBonus?></span>
                </div>
            <?endif;?>
        </div>
    </div>
</div>
<?endif;?>