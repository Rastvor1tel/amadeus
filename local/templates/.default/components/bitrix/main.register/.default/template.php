<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 * @global CUser $USER
 * @global CMain $APPLICATION
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

<? if ($USER->IsAuthorized()): ?>
	<?
	LocalRedirect('/personal/');
	?>
	<p class="header__item-title"><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

<? else: ?>
	<div class="content-block__elem  is--left  is--full-top  is--login  is--signup">
		<div class="content-block__container container  is--login  is--signup">
			<div class="page-header__group  is--h1">
				<div class="page-header__panel  is--h1">
					<h1 class="page-header__heading  is--h1">Регистрация</h1>
				</div>
			</div>
			<div class="form__block  is--signup">
				<?
				if (count($arResult["ERRORS"]) > 0) {
					foreach ($arResult["ERRORS"] as $key => $error) {
						$modifyError = explode('<br>', $error);
						$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $modifyError[0]);
					}
					ShowError(implode("<br />", $arResult["ERRORS"]));
				} elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y") {
					echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT");
				}
				?>
				<form class="form__panel  is--signup" data-validation method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform" enctype="multipart/form-data">
					<? if ($arResult["BACKURL"] <> ''): ?>
						<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
					<? endif; ?>
					<div class="form__row row is--signup">
						<div class="form__cols cols is--signup">
							<div class="form__item is--switch  is--signup">
								<label class="form__switch is--signup">
									<input type="radio" class="form__switch-input  is--signup   validate[required]" name="USER_TYPE" id="f_signup[retail]" value="5">
									<svg class="form__switch-icon is--signup" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
										<circle class="form__switch-icon-border  is--signup" cx="14" cy="14" r="13.5"/>
										<circle class="form__switch-icon-bg  is--signup" cx="14" cy="14" r="11"/>
										<path class="form__switch-icon-check  is--signup" fill-rule="evenodd" clip-rule="evenodd" d="M17.669 11.2567C18.0795 11.6262 18.1128 12.2584 17.7433 12.669L14.1433 16.669C13.9568 16.8762 13.6922 16.9961 13.4135 16.9999C13.1347 17.0037 12.867 16.8909 12.675 16.6887L10.775 14.6887C10.3946 14.2883 10.4108 13.6554 10.8113 13.275C11.2117 12.8946 11.8446 12.9108 12.225 13.3112L13.3802 14.5272L16.2567 11.331C16.6262 10.9205 17.2585 10.8872 17.669 11.2567Z"/>
									</svg>
									<div class="form__switch-label  is--signup">Розничный покупатель</div>
								</label>
							</div>
						</div>
						<div class="form__cols cols  is--signup">
							<div class="form__item  is--switch  is--signup">
								<label class="form__switch  is--signup">
									<input type="radio" class="form__switch-input is--signup validate[required]" name="USER_TYPE" id="f_signup[wholesale]" value="9">
									<svg class="form__switch-icon is--signup" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
										<circle class="form__switch-icon-border  is--signup" cx="14" cy="14" r="13.5"/>
										<circle class="form__switch-icon-bg  is--signup" cx="14" cy="14" r="11"/>
										<path class="form__switch-icon-check  is--signup" fill-rule="evenodd" clip-rule="evenodd" d="M17.669 11.2567C18.0795 11.6262 18.1128 12.2584 17.7433 12.669L14.1433 16.669C13.9568 16.8762 13.6922 16.9961 13.4135 16.9999C13.1347 17.0037 12.867 16.8909 12.675 16.6887L10.775 14.6887C10.3946 14.2883 10.4108 13.6554 10.8113 13.275C11.2117 12.8946 11.8446 12.9108 12.225 13.3112L13.3802 14.5272L16.2567 11.331C16.6262 10.9205 17.2585 10.8872 17.669 11.2567Z"/>
									</svg>
									<div class="form__switch-label  is--signup">Оптовый покупатель</div>
								</label>
							</div>
						</div>
						<div class="form__cols cols  is--signup">
							<div class="form__item  is--signup    ">
								<input type="text" name="REGISTER[EMAIL]" class="form__control form-control validate[required] is--signup" value="" placeholder="Email">
							</div>
						</div>
						<div class="form__cols cols  is--tel  is--signup">
							<div class="form__item  is--signup  is--pass">
								<input value="" type="password" class="form__control form-control validate[required] is--signup is--pass" name="REGISTER[CONFIRM_PASSWORD]" required="" autocomplete="off" placeholder="Пароль:">
								<button type="button" class="form__btn-pass  is--view  is--active" title="Показать пароль">
									<svg class="icon-svg icon-pass-view" role="img">
										<use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#pass-view"></use>
									</svg>
								</button>
								<button type="button" class="form__btn-pass  is--hide" title="Скрыть пароль">
									<svg class="icon-svg icon-pass-hide" role="img">
										<use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#pass-hide"></use>
									</svg>
								</button>
							</div>
						</div>
						<label class="hide-field">
							<input size="30" type="text" name="REGISTER[LOGIN]" value="login" class="text-input" placeholder="Логин (мин. 3 символа):*">
						</label>
						<label class="hide-field">
							<input size="30" type="password" name="REGISTER[PASSWORD]" value="password" autocomplete="off" class="text-input" placeholder="Подтверждение пароля">
						</label>
						<div class="form__cols cols  is--btn  is--signup">
							<input type="submit" name="register_submit_button" value="Зарегистрироваться" class="btn__item">
						</div>
						<div class="form__cols cols  is--agreement  is--signup">
							<div class="form__item  is--agreement  is--signup">
								<input type="hidden" name="f[Согласие на обработку персональных данных]" value="Да">
								<div class="form__text  is--agreement  is--signup">
									Нажимая на кнопку «Зарегистрироваться» вы соглашаетесть с правилами обработки
									<a href='/policy/' target='_blank'>персональных данных</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="content-block__elem  is--right  is--login  is--signup"
		style="background-image: url(<?= TEMPLATE_DIR ?>/img/default/bg-signup.png);">
		<a href="/personal/" class="btn-round__item  is--login  is--signup">
			<div class="btn-round__name">Вход</div>
			<div class="btn-round__icon  is--invers">
				<svg class="icon-svg icon-arrow-enter" role="img">
					<use xlink:href="<?= TEMPLATE_DIR ?>/img/svg/sprite.svg#arrow-enter"></use>
				</svg>
			</div>
		</a>
	</div>
<? endif ?>
