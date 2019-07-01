<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="content-block__elem">
    <div class="content-block__row row is--gutter-lg">
        <?foreach($arResult['ITEMS'] as $arItem):?>
            <div class="content-block__cols cols is--grid-3">
                <div class="card-item__card is--catalog">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="card-item__preview is--catalog">
                        <?
                        if ($arItem['PREVIEW_PICTURE']['SRC']) echo '<img src="'.$arItem['PREVIEW_PICTURE']['SRC'].'" alt="'.$arItem['NAME'].'" class="img-responsive">';
                        ?>
                        <div class="card-item__bg is--catalog">
                            <div class="card-item__bg-view is--catalog">Подробнее</div>
                        </div>
                    </a>
                    <div class="card-item__heading is--catalog">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                    </div>
                    <div class="card-item__elem is--cost is--catalog">Цена:&nbsp;&nbsp<span><?=$arItem['PRICE']?></span></div>
                    <?
                    if ($arItem['PROPERTIES']['NEWPRODUCT']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Новинка</div>';
                    if ($arItem['PROPERTIES']['SALELEADER']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Хит продаж</div>';
                    if ($arItem['PROPERTIES']['SPECIALOFFER']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Скидка</div>';
                    ?>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>

<?=$arResult['NAV_STRING']?>
