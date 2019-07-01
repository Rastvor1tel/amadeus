<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$templateData = array(
    'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/colors.css',
    'TEMPLATE_CLASS' => 'bx-' . $arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME'])) {
    $this->addExternalCss($templateData['TEMPLATE_THEME']);
}
?>
<div class="catalog-filter">
    <?if($arResult["ITEMS"][35]['VALUES']):?>
        <form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get" class="smartfilter">
            <? foreach ($arResult["HIDDEN"] as $arItem): ?>
                <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>" value="<? echo $arItem["HTML_VALUE"] ?>"/>
            <? endforeach; ?>
            <ul class="catalog-filter">
                <? foreach ($arResult["ITEMS"] as $key => $arItem) {
                    $key = $arItem["ENCODED_ID"];
                    if (isset($arItem["PRICE"])):
                        if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
                            continue;

                        $step_num = 4;
                        $step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
                        $prices = array();
                        if (Bitrix\Main\Loader::includeModule("currency")) {
                            for ($i = 0; $i < $step_num; $i++) {
                                $prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step * $i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
                            }
                            $prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
                        } else {
                            $precision = $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0;
                            for ($i = 0; $i < $step_num; $i++) {
                                $prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * $i, $precision, ".", "");
                            }
                            $prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
                        }
                        ?>
                        <li class="cabinet__filter-nav-item dropdown <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<? else: ?>col-lg-12<? endif ?> bx-filter-parameters-box bx-active">
                            <a href="#" class="dropdown-toggle cabinet__filter-nav-link" data-toggle="dropdown">
                                <div class="cabinet__filter-nav-text">
                                    Цена, ₽:
                                    <div class="cabinet__filter-nav-result"><?=$arItem["VALUES"]["MIN"]["HTML_VALUE"] ?> - <?=$arItem["VALUES"]["MAX"]["HTML_VALUE"] ?></div>
                                </div>
                                <div class="cabinet__filter-nav-caret">
                                    <svg class="icon-svg icon-navbar-dropdown" role="img">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#navbar-dropdown"></use>
                                    </svg>
                                </div>
                            </a>
                            <div class="cabinet__filter-nav-dropdown dropdown-menu" data-role="bx_filter_block">
                                <div class="form__item bx-filter-parameters-box-container">
                                    <div class="form__card-row">
                                        <div class="form__card-cols bx-filter-parameters-box-container-block">
                                            <div class="form__card bx-filter-input-container">
                                                <input class="min-price form__control form-control js-from is--xs" type="text" name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>" value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>" size="5" placeholder="От:"/>
                                            </div>
                                        </div>
                                        <div class="form__card-cols bx-filter-parameters-box-container-block">
                                            <div class="form__card bx-filter-input-container">
                                                <input class="max-price form__control form-control js-to is--xs" type="text" name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>" value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>" size="5" placeholder="До:"/>
                                            </div>
                                        </div>

                                        <div class="form__card-cols is--range">
                                            <input type="text" class="js-range-slider" data-min="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>" data-max="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>" data-from="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" data-to="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>" data-type="text" data-step="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="cabinet__filter-nav-dropdown-btn">
                                    <button type="submit" class="btn__item  is--xs" id="set_filter" name="set_filter">
                                        <span class="btn__name">Сохранить</span>
                                    </button>
                                </div>
                            </li>
                        <?endif;
                    }

                foreach ($arResult["ITEMS"] as $key => $arItem) {
                    if (empty($arItem["VALUES"])|| isset($arItem["PRICE"]))
                        continue;

                    if ($arItem["DISPLAY_TYPE"] == "A" && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
                        continue;
                    ?>
                    <li class="cabinet__filter-nav-item dropdown <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"): ?>col-sm-6 col-md-4<? else: ?>col-lg-12<? endif ?> bx-filter-parameters-box <?if ($arItem["DISPLAY_EXPANDED"] == "Y"): ?>bx-active<? endif ?>">
                        <a href="#" class="dropdown-toggle cabinet__filter-nav-link" data-toggle="dropdown">
                            <?
                            $value = ' - ';
                            foreach ($arItem["VALUES"] as $val => $ar) {
                                if($ar["CHECKED"]) {
                                    if ($value == ' - ')
                                        $value = $ar["VALUE"];
                                    else
                                        $value .= ', '.$ar["VALUE"];
                                }
                            }
                            ?>
                            <div class="cabinet__filter-nav-text">
                                Размер:
                                <div class="cabinet__filter-nav-result is--size"><?=$value?></div>
                            </div>
                            <div class="cabinet__filter-nav-caret">
                                <svg class="icon-svg icon-navbar-dropdown" role="img">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#navbar-dropdown"></use>
                                </svg>
                            </div>
                        </a>
                        <div class="cabinet__filter-nav-dropdown dropdown-menu" data-role="bx_filter_block">
                            <div class="pagination__block  is--size  is--filter bx-filter-parameters-box-container">
                                <? $arCur = current($arItem["VALUES"]); ?>
                                <ol class="pagination__list is--size is--filter">
                                    <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                        <?if (strlen($ar["VALUE"]) > 2) continue;?>
                                        <li class="pagination__item is--size is--filter<?=$ar["CHECKED"] ? ' is--active' : '' ?>">
                                            <label data-role="label_<?=$ar["CONTROL_ID"] ?>" class="pagination__link is--size is--filter bx-filter-param-label <?=$ar["DISABLED"] ? 'disabled' : '' ?>" for="<?=$ar["CONTROL_ID"] ?>">
                                                <input type="checkbox" value="<?=$ar["HTML_VALUE"] ?>" name="<?=$ar["CONTROL_NAME"] ?>" id="<?=$ar["CONTROL_ID"] ?>" <?=$ar["CHECKED"] ? 'checked="checked"' : '' ?>/>
                                                <span class="bx-filter-param-text" title="<?= $ar["VALUE"]; ?>">
                                                    <?= $ar["VALUE"]; ?>
                                                    <?if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):?>&nbsp;(<span data-role="count_<?= $ar["CONTROL_ID"] ?>"><?=$ar["ELEMENT_COUNT"]; ?></span>)<?endif; ?>
                                                </span>
                                            </label>
                                        </li>
                                    <? endforeach; ?>
                                </ol>
                            </div>
                            <div class="cabinet__filter-nav-dropdown-btn">
                                <button type="submit" class="btn__item  is--xs" id="set_filter" name="set_filter">
                                    <span class="btn__name">Сохранить</span>
                                </button>
                            </div>
                        </div>
                    </li>
                <?}?>
                <li class="cabinet__filter-nav-item  is--btn    ">
                    <button type="submit" class="btn-icon__btn is--reset" id="del_filter" name="del_filter">
                        <span class="btn-icon__item  is--reset">
                            <svg class="icon-svg icon-icon-reset" role="img">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#icon-reset"></use>
                            </svg>
                        </span>
                        <span class="btn-icon__name  is--reset">Сбросить фильтры</span>
                    </button>
                </li>
            </ul>
        </form>
    <?endif;?>
</div>