<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><div class="authPage">
	<p>Регистрация прошла успешно. Для продолжения работы перейдите в <a href="/personal/">личный кабинет</a>.</p>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>