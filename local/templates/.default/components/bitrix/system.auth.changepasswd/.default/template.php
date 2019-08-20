<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<div class="content-block__elem  is--left  is--full-top  is--login">
    <div class="content-block__container container  is--login">
        <div class="page-header__group  is--h1">
            <div class="page-header__panel  is--h1">
                <h1 class="page-header__heading  is--h1">Восстановление пароля</h1>
            </div>
        </div>
        <div class="form__block  is--login">
            <? ShowMessage($arParams["~AUTH_RESULT"]); ?>
            <form method="post" action="<?= $arResult["AUTH_FORM"] ?>" name="bform">
                <input type="hidden" name="AUTH_FORM" value="Y">
                <input type="hidden" name="TYPE" value="CHANGE_PWD">
                <div class="form__cols cols">
                    <label class="text-label text-label_recolor">
                        <input value="<?= htmlspecialchars($arResult["LAST_LOGIN"]); ?>" type="text" class="form__control form-control text-input text-input_recolor jsInput" name="USER_LOGIN" required>
                        <span class="text-placeholder text-placeholder_recolor jsLabel">Логин или E-mail</span>
                    </label>
                </div>
                <div class="hide-field">
                    <label class="text-label text-label_recolor">
                        <input value="<?= htmlspecialchars($arResult["USER_CHECKWORD"]); ?>" type="text" class="form__control form-control text-input text-input_recolor jsInput" name="USER_CHECKWORD" required>
                        <span class="text-placeholder text-placeholder_recolor jsLabel"></span>
                    </label>
                </div>
                <div class="form__cols cols">
                    <label class="text-label text-label_recolor">
                        <input value="<?= htmlspecialchars($arResult["USER_PASSWORD"]); ?>" type="text" class="form__control form-control text-input text-input_recolor jsInput" name="USER_PASSWORD" required>
                        <span class="text-placeholder text-placeholder_recolor jsLabel">Пароль</span>
                    </label>
                </div>
                <div class="form__cols cols">
                    <label class="text-label text-label_recolor">
                        <input value="<?= htmlspecialchars($arResult["USER_CONFIRM_PASSWORD"]); ?>" type="text" class="form__control form-control text-input text-input_recolor jsInput" name="USER_CONFIRM_PASSWORD" required>
                        <span class="text-placeholder text-placeholder_recolor jsLabel">Повторите пароль</span>
                    </label>
                </div>
                <div class="form__cols cols">
                    <input type="submit" name="change_pwd" value="Изменить пароль" class="btn__item reviews__submit classic-button ticker__set ticker__hover ticker__timed">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-block__elem  is--right  is--login" style="background-image: url(/local/templates/amadeus/img/default/bg-login.png);">
    <a href="/personal/?login=yes" class="btn-round__item  is--login">
        <div class="btn-round__name">Вход</div>
        <div class="btn-round__icon">
            <svg class="icon-svg icon-arrow-enter" role="img">
                <use xlink:href="/local/templates/amadeus/img/svg/sprite.svg#arrow-enter"></use>
            </svg>
        </div>
    </a>
</div>