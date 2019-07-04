<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$curKey = 0;
$result = [];

foreach ($arResult as $key => $arItem) {
    if($arItem['DEPTH_LEVEL'] == 1) {
        $result[$key] = $arItem;
        if ($arItem['IS_PARENT']) {
            $curKey = $key;
        }
    } else {
        $result[$curKey]['ITEMS'][$key] = $arItem;
    }
}

$arResult = $result;

foreach ($arResult as &$arItem) {
    if ($arItem['IS_PARENT']) {
        $curKey = 0;
        $result = [];
        foreach ($arItem['ITEMS'] as $key => $subItem) {
            if($subItem['DEPTH_LEVEL'] == 2) {
                $result[$key] = $subItem;
                if ($subItem['IS_PARENT']) {
                    $curKey = $key;
                }
            } else {
                $result[$curKey]['ITEMS'][$key] = $subItem;
            }
        }
        $arItem['ITEMS'] = $result;
    }
}
?>