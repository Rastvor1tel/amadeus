<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<a href="<?=$arParams['PATH_TO_BASKET']?>" class="navbar__icon  is--basket">
    <svg class="icon-svg icon-icon-basket" role="img">
        <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#icon-basket"></use>
    </svg>
    <span id="headerBasketCount" class="navbar__icon-bage"><?=$arResult['NUM_PRODUCTS']?></span>
</a>
