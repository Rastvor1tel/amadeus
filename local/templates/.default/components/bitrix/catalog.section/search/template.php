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
<div class="content-block__elem    ">
    <h5 class="content-block__heading  is--ttu  color--warning">Результаты поиска:</h5>
    <?foreach($arResult['ITEMS'] as $arItem):?>
    <div class="card-item__card  is--search">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="card-item__preview  is--search">
            <?if ($arItem['PREVIEW_PICTURE']['SRC']) echo '<img src="'.$arItem['PREVIEW_PICTURE']['SRC'].'" alt="'.$arItem['NAME'].'" class="img-responsive">'; ?>
            <div class="card-item__bg  is--search">
                <div class="card-item__bg-view  is--search">
                    <div class="card-item__bg-icon  is--search">
                        <svg class="icon-svg icon-icon-add" role="img">
                            <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#icon-add"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        <div class="card-item__elem-group  is--search">
            <h4 class="card-item__heading  is--search">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['~NAME']?></a>
            </h4>
            <div class="card-item__note  is--search"><?=$arItem['~DETAIL_TEXT']?></div>
        </div>
    </div>
    <?endforeach;?>
</div>

<?=$arResult['NAV_STRING']?>
