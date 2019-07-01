<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?
if (!empty($arResult["ERROR_MESSAGE"])) {
    ShowError($arResult["ERROR_MESSAGE"]);
    return;
}
?>

<div class="container">
    <div class="catalog__wrap" style="margin: 0">
        <form method="post" action="<?= POST_FORM_ACTION_URI ?>" class="personal__form">
            <?= bitrix_sessid_post() ?>
            <input type="hidden" name="CANCEL" value="Y">
            <input type="hidden" name="ID" value="<?= $arResult["ID"] ?>">

            <div class="input__wrap">
                <p>Вы уверены, что хотите отменить
                    <a class="button button--link button--dotted"
                       href="<?= $arResult["URL_TO_DETAIL"] ?>">заказ
                        №<?= $arResult["ACCOUNT_NUMBER"] ?></a>?<br>
                    <b>Отмена заказа необратима.</b>
                </p>
            </div>
            <div class="input__wrap">
                <p>Укажите, пожалуйста, причину отмены заказа:</p>
                <label for="" class="popup__label classic-label">
                    <textarea name="REASON_CANCELED" class="popup__input classic-input"></textarea>
                </label>
            </div>
            <br>
            <br>
            <input type="submit" class="footer__callback common-button" name="action" value="Отменить заказ">
        </form>
    </div>
</div>
<a class="text-slider__link corall-link" href="<?= $arResult["URL_TO_LIST"] ?>">← В список заказов</a>