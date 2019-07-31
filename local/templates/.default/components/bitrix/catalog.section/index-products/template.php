<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?foreach($arResult['ITEMS'] as $arItem):?>
    <div class="content-block__slick-item  is--index-catalog <?=$arParams['ITEM_CLASS']?>">
        <?
        $APPLICATION->IncludeComponent('bitrix:catalog.item', 'catalog-product', [
            'RESULT' => $arItem,
            'PARAMS' => $arParams
        ]);
        ?>
    </div>
<?endforeach;?>