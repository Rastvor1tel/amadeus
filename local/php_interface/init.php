<?

use Bitrix\Main\Diag\Debug;

$eventManager = \Bitrix\Main\EventManager::getInstance();

define('AZBN__DIR', __DIR__ . '/azbn/', true);
define('AZBN__ROOT', '/_azbn7_', true);//$_SERVER["DOCUMENT_ROOT"]

if (file_exists(AZBN__DIR . 'functions.php')) {
    require_once(AZBN__DIR . 'constants.php');
    require_once(AZBN__DIR . 'functions.php');
    //require_once(AZBN__DIR . 'events.php');
}


/*------new_site------*/

define("TEMPLATE_DIR", "/local/templates/amadeus");

$eventManager->addEventHandler("main", "OnBeforeUserLogin", "OnBeforeUserLogin");
$eventManager->addEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegister");
$eventManager->addEventHandler("sale", "OnBeforeBasketAdd", "OnBeforeBasketAdd");

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
        if ($offer['CATALOG_PRICE_3'] || $offer['CATALOG_PRICE_4']) {
            if (CSite::InGroup([9])) {
                if ($minPrice == 0 || $minPrice > $offer['CATALOG_PRICE_3']) {
                    $minPrice = $offer['CATALOG_PRICE_3'];
                }
            } else {
                if ($minPrice == 0 || $minPrice > $offer['CATALOG_PRICE_4']) {
                    $minPrice = $offer['CATALOG_PRICE_4'];
                }
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

/*------end_of_new_site------*/

class exSite {
    public function _ShowH1() {
        global $APPLICATION;

        if (!($H1 = $APPLICATION->GetPageProperty("h1"))) {
            $H1 = $APPLICATION->GetTitle();
        }

        return $H1;
    }

    public function ShowH1() {
        global $APPLICATION;

        $APPLICATION->AddBufferContent(array("exSite", "_ShowH1"));
    }

    public function _ShowPropertyPage($tagName) {
        global $APPLICATION;

        $value = "";

        if (!empty($tagName)) {
            if (!($value = $APPLICATION->GetPageProperty($tagName))) {
                $value = "";
            }
        }

        return $value;
    }

    public function ShowPropertyPage($tagName) {
        global $APPLICATION;

        if (!empty($tagName)) {
            $APPLICATION->AddBufferContent(array("exSite", "_ShowPropertyPage"), $tagName);
        }

        return NULL;
    }
}

/* Минимальная/Максимальная стоимость товара */
AddEventHandler("catalog", "OnPriceAdd", array("exSetMinMaxProductPrice", "OnHandlerPrice"));
AddEventHandler("catalog", "OnPriceUpdate", array("exSetMinMaxProductPrice", "OnHandlerPrice"));

class exSetMinMaxProductPrice {
    public function GetIBlockID() {
        return 2;
    }

    public function GetMinPricePropCode() {
        return "MINIMUM_PRICE";
    }

    public function GetMaxPricePropCode() {
        return "MAXIMUM_PRICE";
    }

    public function OnHandlerPrice($ID, $arFields) {
        if (intval($arFields["PRODUCT_ID"]) > 0 &&
            CModule::IncludeModule("iblock")) {
            $IBlocks = exSetMinMaxProductPrice::GetIBlockID();

            if (intval($IBlocks) > 0) {
                $IBlocks = array($IBlocks);

                if (is_array($IbOffer = CCatalogSKU::GetInfoByProductIBlock(exSetMinMaxProductPrice::GetIBlockID()))) {
                    $IBlocks[] = $IbOffer["IBLOCK_ID"];
                }
                unset($IbOffer);


                if (is_array($arEl = CIBlockElement::GetList(array(),
                    array("ID" => $arFields["PRODUCT_ID"],
                        "IBLOCK_ID" => $IBlocks),
                    false,
                    false,
                    array("ID",
                        "IBLOCK_ID",
                        "PROPERTY_CML2_LINK"))->Fetch())) {

                    if (intval($arEl["PROPERTY_CML2_LINK_VALUE"]) <= 0) {
                        if (is_array($arPrice = CPrice::GetBasePrice($arEl["ID"]))) {
                            // MIN
                            if (is_array($arProp = CIBlockProperty::GetByID(exSetMinMaxProductPrice::GetMinPricePropCode(), $arEl["IBLOCK_ID"])->Fetch())) {
                                CIBlockElement::SetPropertyValueCode($arPrice["PRODUCT_ID"], $arProp["CODE"], $arPrice["PRICE"]);
                            }
                            //-

                            // MAX
                            if (is_array($arProp = CIBlockProperty::GetByID(exSetMinMaxProductPrice::GetMaxPricePropCode(), $arEl["IBLOCK_ID"])->Fetch())) {
                                CIBlockElement::SetPropertyValueCode($arPrice["PRODUCT_ID"], $arProp["CODE"], $arPrice["PRICE"]);
                            }
                            //-
                        }
                    } elseif (is_array($arIB = CCatalogSKU::GetInfoByOfferIBlock($arEl["IBLOCK_ID"])) &&
                        is_array($arEl = CIBlockElement::GetList(array(),
                            array("IBLOCK_ID" => $arIB["PRODUCT_IBLOCK_ID"],
                                "ID" => $arEl["PROPERTY_CML2_LINK_VALUE"]),
                            false,
                            false,
                            array("ID",
                                "IBLOCK_ID"))->Fetch()) &&
                        is_array($tPrice = CCatalogGroup::GetBaseGroup())) {

                        $MinPProp = CIBlockProperty::GetByID(exSetMinMaxProductPrice::GetMinPricePropCode(), $arEl["IBLOCK_ID"])->Fetch();
                        $MaxPProp = CIBlockProperty::GetByID(exSetMinMaxProductPrice::GetMaxPricePropCode(), $arEl["IBLOCK_ID"])->Fetch();

                        // MIN
                        if (is_array($MinPProp) &&
                            is_array($offers = CIBlockPriceTools::GetOffersArray($arEl["IBLOCK_ID"],
                                $arEl["ID"],
                                array("catalog_PRICE_" . $tPrice["ID"] => "ASC"),
                                array("ID", "IBLOCK_ID"),
                                array(),
                                1,
                                array($tPrice),
                                false
                            ))) {
                            $offers = array_shift($offers);
                            if (intval($offers["CATALOG_PRICE_" . $tPrice["ID"]]) > 0) {
                                CIBLockElement::SetPropertyValueCode($arEl["ID"],
                                    $MinPProp["CODE"],
                                    $offers["CATALOG_PRICE_" . $tPrice["ID"]]);
                            }
                        }
                        //-

                        // MAX
                        if (is_array($MaxPProp) &&
                            is_array($offers = CIBlockPriceTools::GetOffersArray($arEl["IBLOCK_ID"],
                                $arEl["ID"],
                                array("catalog_PRICE_" . $tPrice["ID"] => "DESC"),
                                array("ID", "IBLOCK_ID"),
                                array(),
                                1,
                                array($tPrice),
                                false
                            ))) {
                            $offers = array_shift($offers);
                            if (intval($offers["CATALOG_PRICE_" . $tPrice["ID"]]) > 0) {
                                CIBLockElement::SetPropertyValueCode($arEl["ID"],
                                    $MaxPProp["CODE"],
                                    $offers["CATALOG_PRICE_" . $tPrice["ID"]]);
                            }
                        }
                        //-
                    }

                }
            }
        }
    }
}

//-

/*Ограничение импорта 1С (пользователь 1CImportAgent [141])*/
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "exception1CImportAgent");
function exception1CImportAgent(&$arFields) {
    global $USER;

    $UserAgentLogin = '1CImportAgent';
    $IBlockCatalogID = 2;

    $arExFields = array(
        "NAME",
        "CODE",
        "SORT",
        "PREVIEW_PICTURE",
        "DETAIL_PICTURE",
        "PREVIEW_TEXT",
        "PREVIEW_TEXT_TYPE",
        "DETAIL_TEXT",
        "DETAIL_TEXT_TYPE",
        "IPROPERTY_TEMPLATES",
        //"SEARCHABLE_CONTENT"
    );

    $arExProperty = array(
        "MORE_PHOTO", "FILES"
    );


    if ($USER->GetLogin() == $UserAgentLogin &&
        $arFields["IBLOCK_ID"] == $IBlockCatalogID) {

        if (!empty($arExProperty)) {
            if (!is_array($_SESSION["arExPropertyID_" . $IBlockCatalogID])) {
                $_SESSION["arExPropertyID_" . $IBlockCatalogID] = array();

                foreach ($arExProperty as $code) {
                    if (is_array($arProp = CIBlockProperty::GetByID($code, $IBlockCatalogID)->Fetch())) {
                        $_SESSION["arExPropertyID_" . $IBlockCatalogID][] = $arProp["ID"];
                    }
                }
            }

            $arExProperty = $_SESSION["arExPropertyID_" . $IBlockCatalogID];
        }

        if (!empty($arExProperty)) {
            foreach ($arExProperty as $ID) {
                if (array_key_exists($ID, $arFields["PROPERTY_VALUES"])) {
                    unset($arFields["PROPERTY_VALUES"][$ID]);
                }
            }
        }

        if (!empty($arExFields)) {
            foreach ($arExFields as $ID) {
                if (array_key_exists($ID, $arFields)) {
                    unset($arFields[$ID]);
                }
            }
        }

    }
}

//-

// ПОЛОЖЕНИЕ ОБ ОБРАБОТКЕ ПЕРСОНАЛЬНЫХ ДАННЫХ
define("XULR_PERSONAL_DATA", "");
define("XCODE_PERSONAL_DATA", "UF_PERSONAL_DATA");
function SetXURLPersonalDataProp($text) {
    if (defined("XCODE_PERSONAL_DATA") &&
        !empty(XCODE_PERSONAL_DATA)) {
        $text = preg_replace(array("/(политике конфиденциальности)/i",
            "/(пользовательскому соглашению)/i"),
            array("<a href='/privacy/' target='_blank'>$1</a>",
                "<a href='/polzovatelskoe-soglashenie/' target='_blank'>$1</a>"),
            $text);
    }

    return $text;
}

AddEventHandler("main", "OnBeforeUserAdd", "OnBeforeUserAddXCODE");
function OnBeforeUserAddXCODE(&$arFields) {
    if (defined("XCODE_PERSONAL_DATA") &&
        !empty(XCODE_PERSONAL_DATA)) {
        if (intval($_REQUEST["PERSON_TYPE"]) > 0 &&
            CModule::IncludeModule("sale")) {
            if (is_array($arProp = CSaleOrderProps::GetList(array(),
                array("PERSON_TYPE_ID" => intval($_REQUEST["PERSON_TYPE"]),
                    "CODE" => XCODE_PERSONAL_DATA),
                false,
                false,
                array("ID"))->Fetch())) {
                if (array_key_exists("ORDER_PROP_" . $arProp["ID"], $_REQUEST)) {
                    $arFields[XCODE_PERSONAL_DATA] = (($_REQUEST["ORDER_PROP_" . $arProp["ID"]] == "Y") ? "Y" : "");
                }
            }
        }

        if (isset($arFields[XCODE_PERSONAL_DATA]) &&
            $arFields[XCODE_PERSONAL_DATA] != "Y") {
            $arFields[XCODE_PERSONAL_DATA] = "";
        }

    }
}

//--

/* AddEventHandler("main", "OnBeforeUserRegister", "checkGoogleCaptcha");
function checkGoogleCaptcha(&$arFields) {
	if(SITE_ID == 's2') {
		global $APPLICATION;
		if ($_POST['g-recaptcha-response']) {
			if($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=6LfPkUwUAAAAAE7EVh5FmUz05KlD1PPg4d8vZm0A&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['HTTP_X_REAL_IP']);
				$result = curl_exec($curl);
				curl_close($curl);
			}
			$result = json_decode($result, true);
			if ($result['success'] !== true) {
				$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
				return false;
			}
		} else {
			$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
			return false;
		}
	}
} */

AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");
function OnAfterUserRegisterHandler(&$arFields) {
    if ($arFields['RESULT_MESSAGE']['ID'] > 0) {
        $buyerType = 'Розничный покупатель';
        if ($arFields['RESULT_MESSAGE']['TYPE'] == 'OK' && isset($_POST['UF_WHOLESALE_BUYER'])) {
            $buyerType = 'Оптовый покупатель';
            $wholesaleUserNotify = 'В ближайшее время с Вами&nbsp;свяжется менеджер для подтверждения&nbsp; данных, после чего Вам будет предоставлен доступ к оптовым ценам.';
            $companyName = 'Название компании: ' . $_POST["WORK_COMPANY"];
            $phoneNumber = 'Телефон: ' . $_POST["WORK_PHONE"];

            $user = new CUser;
            $fields = Array(
                "WORK_COMPANY" => $_POST['WORK_COMPANY'],
                "WORK_PHONE" => $_POST['WORK_PHONE'],
                "UF_WHOLESALE_BUYER" => $_POST['UF_WHOLESALE_BUYER'],
            );
            $user->Update($arFields['RESULT_MESSAGE']['ID'], $fields);
        }

        $arRegFields = array(
            'LOGIN' => $_POST["USER_LOGIN"],
            'PASSWORD' => $_POST["USER_PASSWORD"],
            'NAME' => $_POST["USER_NAME"],
            'LAST_NAME' => $_POST["USER_LAST_NAME"],
            'BUYER_TYPE' => $buyerType,
            'WORK_COMPANY' => $companyName,
            'WORK_PHONE' => $phoneNumber,
            'WHOLESALE_USER_NOTIFY' => $wholesaleUserNotify,
            'USER_ID' => $arFields['RESULT_MESSAGE']['ID']
        );
        CEvent::Send("NEW_REGISTRATION", "s1", $arRegFields);
    }
}

AddEventHandler("main", "OnAfterUserUpdate", "OnAfterUserUpdateHandler");
function OnAfterUserUpdateHandler(&$arFields) {
    $findFlag = false;
    // Поиск нужной группы в массиве групп
    foreach ($arFields['GROUP_ID'] as $arGroup) {
        if ($arGroup['GROUP_ID'] == 9) {
            $findFlag = true;
            break;
        }
    }
    // Какой-то костыль
    $arFilter = Array("ID" => $arFields['ID']);
    $arSelect = Array("SELECT" => array("UF_USER_TYPE_CONFIRM"));
    $rsUsers = CUser::GetList(($by = "ID"), ($order = "desc"), $arFilter, $arSelect);
    if ($user = $rsUsers->GetNext()) {
        $arFields['UF_USER_TYPE_CONFIRM'] = $user['UF_USER_TYPE_CONFIRM'];
    }
    //
    if ($findFlag && !$arFields['UF_USER_TYPE_CONFIRM']) {
        $arRegFields = array(
            'EMAIL' => $arFields["EMAIL"],
            'FIO' => $arFields["LAST_NAME"] . ' ' . $arFields["NAME"],
        );
        CEvent::Send("USER_TYPE_CHANGE", "s1", $arRegFields);

        $user = new CUser;
        $user->Update($arFields['ID'], array("UF_USER_TYPE_CONFIRM" => 1));
    }
}

AddEventHandler("main", "OnAfterUserRegister", "OnUserPropsAfterRegisterHandler");
function OnUserPropsAfterRegisterHandler(&$arFields) {
    CModule::IncludeModule("sale");
    // создаём профиль
    //PERSON_TYPE_ID - идентификатор типа плательщика, для которого создаётся профиль
    $arProfileFields = array(
        "NAME" => "Профиль покупателя (" . $arFields['LOGIN'] . ')',
        "USER_ID" => $arFields['USER_ID'],
        "PERSON_TYPE_ID" => 1
    );
    $PROFILE_ID = CSaleOrderUserProps::Add($arProfileFields);

    //если профиль создан
    if ($PROFILE_ID) {
        //формируем массив свойств
        $PROPS = Array(
            array(
                "USER_PROPS_ID" => $PROFILE_ID,
                "ORDER_PROPS_ID" => 1,
                "NAME" => "Ф.И.О.",
                "VALUE" => $arFields['LAST_NAME'] . ' ' . $arFields['NAME'] . ' ' . $arFields['SECOND_NAME']
            ),
            array(
                "USER_PROPS_ID" => $PROFILE_ID,
                "ORDER_PROPS_ID" => 2,
                "NAME" => "E-Mail",
                "VALUE" => $_POST['USER_LOGIN']
            ),
            array(
                "USER_PROPS_ID" => $PROFILE_ID,
                "ORDER_PROPS_ID" => 3,
                "NAME" => "Телефон",
                "VALUE" => $_POST['WORK_PHONE']
            ),
            array(
                "USER_PROPS_ID" => $PROFILE_ID,
                "ORDER_PROPS_ID" => 8,
                "NAME" => "Компания",
                "VALUE" => $_POST['WORK_COMPANY']
            ),
        );
        //добавляем значения свойств к созданному ранее профилю
        foreach ($PROPS as $prop)
            CSaleOrderUserPropsValue::Add($prop);
    }
}

?>