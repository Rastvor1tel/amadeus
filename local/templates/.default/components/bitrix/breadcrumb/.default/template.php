<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if (!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css)) {
    $strReturn .= '<link href="' . CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css") . '" type="text/css" rel="stylesheet" />' . "\n";
}

$strReturn .= '<div class="breadcrumb__block"><ul class="breadcrumb__list">';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    $nextRef = ($index < $itemSize - 2 && $arResult[$index + 1]["LINK"] <> "" ? ' itemref="bx_breadcrumb_' . ($index + 1) . '"' : '');
    $child = ($index > 0 ? ' itemprop="child"' : '');
    $arrow = ($index > 0 ? '<i class="fa fa-angle-right"></i>' : '');

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '
			<li class="breadcrumb__list-item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"' . $child . $nextRef . '>
				<a class="breadcrumb__list-link" href="' . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="url">' . $title . '</a>
			</li>';
    } else {
        $strReturn .= '
			<li class="breadcrumb__list-item is--active">
				<span class="breadcrumb__list-link">' . $title . '</span>
			</li>';
    }
}

$strReturn .= '</ul></div>';

return $strReturn;
?>