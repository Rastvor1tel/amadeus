<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="content-block__elem  is--left  is--full-top  is--login">
    <div class="content-block__container container  is--login">
        <div class="page-header__group  is--h1">
            <div class="page-header__panel  is--h1">
                <h1 class="page-header__heading  is--h1">Вход</h1>
            </div>
        </div>
        <div class="form__block  is--login">
            <div class="page-header__group  is--h3">
                <div class="page-header__panel  is--h3">
                    <h3 class="page-header__heading  is--h3">Войдите в личный кабинет, используя логин и пароль</h3>
                </div>
            </div>
            <?
            if ($arParams["~AUTH_RESULT"] || $arResult["ERROR_MESSAGE"]) {
                echo '<div class="page-header__panel">';
                ShowMessage($arParams["~AUTH_RESULT"]);
                ShowMessage($arResult["ERROR_MESSAGE"]);
                echo '</div>';
            }
            ?>
            <form class="form__panel  is--login" method="post" action="<?= $arResult["AUTH_URL"] ?>" name="form_auth" data-validation >
                <input type="hidden" name="AUTH_FORM" value="Y">
                <input type="hidden" name="TYPE" value="AUTH">
                <? foreach ($arResult["POST"] as $key => $value): ?>
                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                <? endforeach ?>
                <div class="form__row row  is--login">
                    <div class="form__cols cols  is--login">
                        <div class="form__item  is--login    ">
                            <input value="<?= htmlspecialchars($arResult["LAST_LOGIN"]); ?>" type="text" class="form__control form-control validate[required]  is--login" id="f_login[login]" name="USER_LOGIN"  placeholder="Email, логин или телефон:" required>
                        </div>
                    </div>
                    <div class="form__cols cols  is--login">
                        <div class="form__item  is--login  is--pass">
                            <input type="password" value="<?= htmlspecialchars($arResult["LAST_LOGIN"]); ?>" class="form__control form-control validate[required] is--login is--pass" id="f_login[tel]" name="USER_PASSWORD" placeholder="Пароль:" required>
                            <button type="button" class="form__btn-pass  is--view  is--active" title="Показать пароль"><svg class="icon-svg icon-pass-view" role="img">
                                    <use xlink:href="/amadeus/img/svg/sprite.svg#pass-view"></use>
                                </svg></button>
                            <button type="button" class="form__btn-pass  is--hide" title="Скрыть пароль"><svg class="icon-svg icon-pass-hide" role="img">
                                    <use xlink:href="/amadeus/img/svg/sprite.svg#pass-hide"></use>
                                </svg></button>
                        </div>
                    </div>
                    <div class="form__cols cols  is--btn  is--login">
                        <input type="submit" name="Login" value="Войти" class="btn__item ">
                    </div>
                    <div class="form__cols cols  is--btn  is--right  is--login">
                        <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" class="btn-link__item    ">
                            <span class="btn-link__name">Забыли пароль</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-block__elem  is--right  is--login" style="background-image: url(<?=TEMPLATE_DIR?>/img/default/bg-login.png);">
    <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" class="btn-round__item  is--login">
        <div class="btn-round__name">Регистрация</div>
        <div class="btn-round__icon">
            <svg class="icon-svg icon-arrow-enter" role="img">
                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#arrow-enter"></use>
            </svg>
        </div>
    </a>
</div>