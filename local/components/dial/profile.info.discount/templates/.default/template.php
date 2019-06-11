<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?if ($arResult['DISCOUNT'] && $USER->IsAuthorized()):?>
    <div class="cabinet__sale-block  is--grid">
        <div class="cabinet__sale-num">
            <span>-<?=$arResult['DISCOUNT']?></span>%
        </div>
        <div class="cabinet__sale-heading">
            Персональная<br> скидка
        </div>
    </div>
<?endif;?>