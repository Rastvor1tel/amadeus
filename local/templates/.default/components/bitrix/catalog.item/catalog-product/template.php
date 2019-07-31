<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div class="card-item__card  is--catalog">
    <a href="<?=$arResult['DETAIL_PAGE_URL']?>" class="card-item__preview  is--catalog">
        <?if ($arResult['PREVIEW_PICTURE']['SRC']) echo '<img src="'.$arResult['PREVIEW_PICTURE']['SRC'].'" alt="'.$arResult['NAME'].'" class="img-responsive">';?>
        <div class="card-item__bg  is--catalog">
            <div class="card-item__bg-view  is--catalog">Подробнее</div>
        </div>
    </a>
    <div class="card-item__heading  is--catalog">
        <a href="<?=$arResult['DETAIL_PAGE_URL']?>"><?=$arResult['NAME']?></a>
    </div>
    <div class="card-item__elem  is--cost  is--catalog">Цена: <span><?=$arResult['PRICE']?></span></div>
    <div class="card-item__elem is--status is--catalog">
    <?
    if ($arResult['PROPERTIES']['NEWPRODUCT']['VALUE']) echo '<div>Новинка</div>';
    if ($arResult['PROPERTIES']['SALELEADER']['VALUE']) echo '<div>Хит продаж</div>';
    if ($arResult['PROPERTIES']['SPECIALOFFER']['VALUE']) echo '<div>Скидка</div>';
    ?>
    </div>
</div>
