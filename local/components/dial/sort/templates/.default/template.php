<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?if($arResult['ITEMS']):?>
    <div class="cabinet__filter-nav-link">
        <div class="cabinet__filter-nav-text">
            Сортировать по:
            <div class="cabinet__filter-nav-result  is--btn">
                <?foreach($arResult['ITEMS'] as $arItem):?>
                <a href="<?=$arItem['QUERY_STRING']?>" class="cabinet__filter-nav-sort<?=$arItem['DIRECTION']=='DESC'?' is--desc':'';?><?=$arItem['ACTIVE']=='Y'?' is--active':'';?>">
                    <?=$arItem['NAME']?>
                    <div class="cabinet__filter-nav-sort-icon">
                        <svg class="icon-svg icon-icon-sort" role="img">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon-sort"></use>
                        </svg>
                    </div>
                </a>
                <?endforeach;?>
            </div>
        </div>
    </div>
<?endif;?>