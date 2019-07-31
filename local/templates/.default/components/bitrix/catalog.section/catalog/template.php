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
                <?
                $APPLICATION->IncludeComponent('bitrix:catalog.item', 'catalog-product', [
                    'RESULT' => $arItem,
                    'PARAMS' => $arParams
                ]);
                ?>
            </div>
        <?endforeach;?>
    </div>
</div>

<?=$arResult['NAV_STRING']?>
