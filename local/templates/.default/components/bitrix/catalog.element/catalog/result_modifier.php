<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arResult['PRICE'] = CCurrencyLang::CurrencyFormat(getMinOffersPrice($arResult['OFFERS']), 'RUB');

$srcFile = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width'=>490, 'height'=>745), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$smallFile = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width'=>113, 'height'=>170), BX_RESIZE_IMAGE_PROPORTIONAL, true);

$arResult['GALLERY'][] = [
    'ORIGINAL_SRC' => $arResult['DETAIL_PICTURE']['SRC'],
    'MIDDLE_SRC' => $srcFile['src'],
    'SMALL_SRC' => $smallFile['src']
];

$arColors = [];
foreach($arResult['OFFERS'] as $arOffer) {
    $arColor = $arOffer['DISPLAY_PROPERTIES']['COLOR_REF'];
    if ($arColor['VALUE']) {
        $price = $arOffer['CATALOG_PRICE_'.$GLOBALS["PRICE_ID"]];
        $arColors[] = [
            'VALUE' => $arColor['VALUE'],
            'NAME' => $arColor['DISPLAY_VALUE'],
            'PRICE' => $price
        ];
    }
}
$arResult['COLORS'] = $arColors;

foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $arPicture) {
    $origFile = CFile::GetPath($arPicture);
    $srcFile = CFile::ResizeImageGet($arPicture, array('width'=>490, 'height'=>745), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $smallFile = CFile::ResizeImageGet($arPicture, array('width'=>113, 'height'=>170), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['GALLERY'][] = [
        'ORIGINAL_SRC' => $origFile,
        'MIDDLE_SRC' => $srcFile['src'],
        'SMALL_SRC' => $smallFile['src']
    ];
}