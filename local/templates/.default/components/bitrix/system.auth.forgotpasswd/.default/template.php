<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="content-block__elem  is--left  is--full-top  is--login">
    <div class="content-block__container container  is--login">
        <div class="page-header__group  is--h1">
            <div class="page-header__panel  is--h1">
                <h1  class="page-header__heading  is--h1">Восстановление пароля</h1>
            </div>
        </div>
        <?ShowMessage($arParams["~AUTH_RESULT"]);?>
        <div class="form__block  is--login"  >
            <div class="page-header__group  is--h3">
                <div class="page-header__panel  is--h3">
                    <h3  class="page-header__heading  is--h3">Введите e-mail для восстановления пароля</h3>
                </div>
            </div>
            <form lass="form__panel  is--login" data-validation method="post" action="<?= $arResult["AUTH_URL"] ?>" name="bform">
                <input type="hidden" name="AUTH_FORM" value="Y">
                <input type="hidden" name="TYPE" value="SEND_PWD">
                <input type="hidden" name="key" value="londonisthecapitalofgreatbritain">
                <input type="hidden" name="f[Форма: Введите e-mail для восстановления пароля]">
                <div class="form__row row  is--login">
                    <div class="form__cols cols  is--name  is--login">
                        <div class="form__item  is--login    ">
                            <input value="" type="text" class="form__control form-control validate[required]  is--login" name="USER_EMAIL" required placeholder="Email:">
                        </div>
                    </div>
                    <div class="form__cols cols  is--btn  is--login">
                        <input type="submit" name="send_account_info" value="Восстановить" class="btn__item">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-block__elem  is--right  is--login" style="background-image: url(<?=TEMPLATE_DIR?>/img/default/bg-login.png);">
    <a href="<?=$arResult['AUTH_AUTH_URL']?>" class="btn-round__item  is--login">
        <div class="btn-round__name">Вход</div>
        <div class="btn-round__icon">
            <svg class="icon-svg icon-arrow-enter" role="img">
                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#arrow-enter"></use>
            </svg>
        </div>
    </a>
</div>
