<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<div class="template-top">
    <div class="container">
        <? ShowMessage($arParams["~AUTH_RESULT"]); ?>
        <form method="post" action="<?= $arResult["AUTH_FORM"] ?>" name="bform">
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="CHANGE_PWD">

            <label class="text-label text-label_recolor">
                <input
                        value="<?= htmlspecialchars($arResult["LAST_LOGIN"]); ?>"
                        type="text"
                        class="text-input text-input_recolor jsInput"
                        name="USER_LOGIN"
                        required>
                <span class="text-placeholder text-placeholder_recolor jsLabel">Логин или E-mail</span>
            </label>
            <label class="text-label text-label_recolor">
                <input
                        value="<?= htmlspecialchars($arResult["USER_CHECKWORD"]); ?>"
                        type="text"
                        class="text-input text-input_recolor jsInput"
                        name="USER_CHECKWORD"
                        required>
                <span class="text-placeholder text-placeholder_recolor jsLabel">Пароль</span>
            </label>
            <label class="text-label text-label_recolor">
                <input
                        value="<?= htmlspecialchars($arResult["USER_PASSWORD"]); ?>"
                        type="text"
                        class="text-input text-input_recolor jsInput"
                        name="USER_PASSWORD"
                        required>
                <span class="text-placeholder text-placeholder_recolor jsLabel">Пароль</span>
            </label>
            <label class="text-label text-label_recolor">
                <input
                        value="<?= htmlspecialchars($arResult["USER_CONFIRM_PASSWORD"]); ?>"
                        type="text"
                        class="text-input text-input_recolor jsInput"
                        name="USER_CONFIRM_PASSWORD"
                        required>
                <span class="text-placeholder text-placeholder_recolor jsLabel">Пароль</span>
            </label>
            <input type="submit" name="change_pwd" value="Изменить пароль"
                   class="reviews__submit classic-button ticker__set ticker__hover ticker__timed">
                   class="reviews__submit classic-button ticker__set ticker__hover ticker__timed">
        </form>
    </div>
</div>