<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="form__block">
    <div class="page-header__group  is--h2  is--fw-500  align--center">
        <div class="page-header__panel  is--h2  is--fw-500  align--center">
            <h4 class="page-header__heading  is--h2  is--fw-500  align--center"><span>Обратный звонок</span></h4>
            <div class="page-header__heading-small  is--h2  is--fw-500  align--center">Мы перезвоним вам в ближайшее время</div>
        </div>
    </div>
    <?if ($arResult["isFormNote"] != "Y"):?>
        <? if ($arResult["isFormErrors"] == "Y") echo $arResult["FORM_ERRORS_TEXT"]; ?>
        <?= $arResult["FORM_HEADER"] ?>
        <div class="form__row row">
            <div class="form__cols cols is--name">
                <div class="form__item is--name">
                    <input type="text" class="form__control form-control validate[required, custom[onlyLetterSp]]" name="form_text_22" value="" size="0" placeholder="Имя*"/>
                </div>
            </div>
            <div class="form__cols cols is--tel">
                <div class="form__item is--tel">
                    <input type="tel" class="form__control form-control validate[required, custom[phone]]" name="form_text_23" value="" size="0" placeholder="Номер телефона*"/>
                </div>
            </div>
            <div class="form__cols cols  is--btn">
                <input class="btn__item" type="submit" name="web_form_submit" value="Отправить"/>
            </div>
            <div class="form__cols cols  is--agreement">
                <div class="form__item  is--agreement">
                    <div class="form__text  is--agreement">
                        <?= $arResult['FORM_DESCRIPTION'] ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $arResult["FORM_FOOTER"] ?>
    <?endif;?>
</div>