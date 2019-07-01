<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

$documentRoot = Main\Application::getDocumentRoot();



$arParams['USE_PRICE_ANIMATION'] = isset($arParams['USE_PRICE_ANIMATION']) && $arParams['USE_PRICE_ANIMATION'] === 'N' ? 'N' : 'Y';
$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

\CJSCore::Init(array('fx', 'popup', 'ajax'));

$this->addExternalJs($templateFolder . '/js/mustache.js');
$this->addExternalJs($templateFolder . '/js/action-pool.js');
$this->addExternalJs($templateFolder . '/js/filter.js');
$this->addExternalJs($templateFolder . '/js/component.js');

$mobileColumns = isset($arParams['COLUMNS_LIST_MOBILE'])
    ? $arParams['COLUMNS_LIST_MOBILE']
    : $arParams['COLUMNS_LIST'];
$mobileColumns = array_fill_keys($mobileColumns, true);

$jsTemplates = new Main\IO\Directory($documentRoot . $templateFolder . '/js-templates');

foreach ($jsTemplates->getChildren() as $jsTemplate) {
    include($jsTemplate->getPath());
}

$displayModeClass = $arParams['DISPLAY_MODE'] === 'compact' ? ' basket-items-list-wrapper-compact' : '';

if (empty($arResult['ERROR_MESSAGE'])) {

    if ($arResult['BASKET_ITEM_MAX_COUNT_EXCEEDED']) {
        ?>
        <div id="basket-item-message">
            <?= Loc::getMessage('SBB_BASKET_ITEM_MAX_COUNT_EXCEEDED', array('#PATH#' => $arParams['PATH_TO_BASKET'])) ?>
        </div>
        <?
    }
    ?>
    <div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="opacity: 0;">
        <?
        if (
            $arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
            && in_array('top', $arParams['TOTAL_BLOCK_DISPLAY'])
        ) {
            ?>
            <div class="row">
                <div class="col-xs-12" data-entity="basket-total-block"></div>
            </div>
            <?
        }
        ?>
        <div class="content-block__elem">
            <div class="cabinet__basket-block">
                <table class="basket-items-list-table cabinet__basket-table" id="basket-item-table">
                    <thead>
                    <tr>
                        <th>Фото</th>
                        <th class="is--left">Описание</th>
                        <th><?=CSite::InGroup(GROUP_ID_OPT)?'Размерный ряд':'Размер';?></th>
                        <th>Цвет</th>
                        <th class="is--left">Кол-во</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
        <?
        if (
            $arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
            && in_array('bottom', $arParams['TOTAL_BLOCK_DISPLAY'])
        ) {
            ?>
            <div class="row">
                <div class="col-xs-12" data-entity="basket-total-block"></div>
            </div>
            <?
        }
        ?>
    </div>
    <?
    if (!empty($arResult['CURRENCIES']) && Main\Loader::includeModule('currency')) {
        CJSCore::Init('currency');

        ?>
        <script>
            BX.Currency.setCurrencies(<?=CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true)?>);
        </script>
        <?
    }

    $signer = new \Bitrix\Main\Security\Sign\Signer;
    $signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
    $messages = Loc::loadLanguageFile(__FILE__);
    ?>
    <script>
        BX.message(<?=CUtil::PhpToJSObject($messages)?>);
        BX.Sale.BasketComponent.init({
            result: <?=CUtil::PhpToJSObject($arResult, false, false, true)?>,
            params: <?=CUtil::PhpToJSObject($arParams)?>,
            template: '<?=CUtil::JSEscape($signedTemplate)?>',
            signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
            siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
            ajaxUrl: '<?=CUtil::JSEscape($component->getPath() . '/ajax.php')?>',
            templateFolder: '<?=CUtil::JSEscape($templateFolder)?>'
        });
    </script>
<?
} elseif ($arResult['EMPTY_BASKET']) {
    include(Main\Application::getDocumentRoot() . $templateFolder . '/empty.php');
} else {
    ShowError($arResult['ERROR_MESSAGE']);
}
?>
</div>
</div>