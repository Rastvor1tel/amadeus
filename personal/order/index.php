<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Оформление заказа | трикотажная фабрика \"Амадеус\" в Москве");
$APPLICATION->SetTitle("Оформление заказа");
?><?$APPLICATION->IncludeComponent(
	"elegance-it:sale.order.ajax",
	"AmadeusOrderAjax",
	Array(
		"ALLOW_AUTO_REGISTER" => "Y",
		"ALLOW_NEW_PROFILE" => "N",
		"COMPONENT_TEMPLATE" => "AmadeusOrderAjax",
		"COUNT_DELIVERY_TAX" => "N",
		"DELIVERY_NO_AJAX" => "Y",
		"DELIVERY_NO_SESSION" => "Y",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"DISABLE_BASKET_REDIRECT" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"PATH_TO_AUTH" => "/auth/",
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_PERSONAL" => "/personal/",
		"PAY_FROM_ACCOUNT" => "N",
		"PRODUCT_COLUMNS" => array(),
		"PROP_1" => array("8","9","10","11","12","13","14","15","16","17"),
		"SEND_NEW_USER_NOTIFY" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "N",
		"TEMPLATE_LOCATION" => "popup",
		"USE_PREPAYMENT" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>