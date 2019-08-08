<?
use Bitrix\Main\Loader;
use Bitrix\Main\Diag\Debug;

$eventManager = \Bitrix\Main\EventManager::getInstance();

/*------new_site------*/

define("TEMPLATE_DIR", "/local/templates/amadeus");
define("GROUP_ID_OPT", [9]);

$eventManager->addEventHandler("main", "OnBeforeUserLogin", "OnBeforeUserLogin");
$eventManager->addEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegister");
$eventManager->addEventHandler("sale", "OnBeforeBasketAdd", "OnBeforeBasketAdd");
$eventManager->addEventHandler("sale", "OnOrderNewSendEmail","OnOrderNewSendEmail");

/*------helper for breadcrumb------*/
require_once(dirname(__FILE__) . '/classes/ComponentHelper.php');
function ShowNavChain($template = '.default') {
    global $APPLICATION;
    $APPLICATION->IncludeComponent('bitrix:breadcrumb', $template);
}

/*------end of helper for breadcrumb------*/

function getMinOffersPrice($offers) {
    $minPrice = 0;
    foreach ($offers as $key => $offer) {
        if ($offer['ITEM_PRICES'][0]['PRICE']) {
            if ($minPrice == 0 || $minPrice > $offer['ITEM_PRICES'][0]['PRICE']) {
                $minPrice = $offer['ITEM_PRICES'][0]['PRICE'];
            }
        }
    }
    return $minPrice;
}

// авторизация по Login и E-mail
function OnBeforeUserLogin(&$arFields) {
    if (isset($_POST['USER_LOGIN'])) {
        $e = strpos($_POST['USER_LOGIN'], "@");
        if ((int)$e > 0) {
            $filter = Array("EMAIL" => $_POST['USER_LOGIN']);
            $rsUsers = CUser::GetList($by = "id", $order = "desc", $filter);
            $res = $rsUsers->Fetch();
            $arFields["LOGIN"] = $res['LOGIN'];
        }
    }
}

// регистрация без Login и ConfirmPassword
function OnBeforeUserRegister(&$arFields) {
    if ($_POST['USER_TYPE'])
        $arFields["GROUP_ID"][] = $_POST['USER_TYPE'];
    $arFields["LOGIN"] = $arFields["EMAIL"];
    $arFields["CONFIRM_PASSWORD"] = $arFields["PASSWORD"];
}

// изменение провайдера цен
function OnBeforeBasketAdd(&$arFields) {
    $arFields['PRODUCT_PROVIDER_CLASS'] = "DialProductProvider";
}

// провайдер цен
Bitrix\Main\Loader::includeModule('catalog');
CBitrixComponent::includeComponentClass('dial:profile.info.discount');

class DialProductProvider extends CCatalogProductProvider {
    public static function GetProductData($params) {
        // стандартная обработка
        $result = parent::GetProductData($params);

        if(!$result['DISCOUNT_VALUE']) {
            // вычисляем модификатор цены
            $discount = new ProfileInfoDiscount;
            $discount = $discount->getDiscount();
            if ($discount)
                $modifier = 1 - $discount / 100;
            else
                $modifier = 1;
            $result['BASE_PRICE'] *= $modifier;
        }
        return $result;
    }
}

function OnOrderNewSendEmail($orderID, $eventName, $arFields) {
    $arOrder = CSaleOrder::GetByID($orderID);
    $userGroups = CUser::GetUserGroup($arOrder['USER_ID']);
    if (in_array(GROUP_ID_OPT, $userGroups)){
        $adminEventName = 'SALE_NEW_ORDER_OPT';
    }else{
        $adminEventName = 'SALE_NEW_ORDER_ROZN';
    }
    CEvent::Send($adminEventName, 's1', $arFields);
}
?>