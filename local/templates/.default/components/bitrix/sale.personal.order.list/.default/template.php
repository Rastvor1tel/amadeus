<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?
if (!empty($arResult["ERRORS"]["FATAL"])) {
    foreach ($arResult["ERRORS"]["FATAL"] as $error) {
        ShowError($error);
    }
    return;
}
if (!empty($arResult["ERRORS"]["NONFATAL"])) {
    foreach ($arResult["ERRORS"]["NONFATAL"] as $error) {
        ShowError($error);
    }
}
?>
<? if (!empty($arResult["ORDERS"])): ?>
    <div class="container container_full">
        <div class="contacts__wrap">
            <div class="contacts__left">

                <div class="contacts__item">
                    <div class="contacts__columns">
                        <div class="contacts__column">
                            <div class="contacts__column-title">Номер заказа</div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__column-title">Дата заказа</div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__column-title">Вид доставки</div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__column-title">Вид оплаты</div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__column-title">Сумма</div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__column-title"></div>
                            <div class="contacts__column-item"></div>
                        </div>
                    </div>
                </div>
                <? foreach ($arResult["ORDERS"] as $order): ?>

                    <div class="contacts__item">
                        <div class="contacts__columns">
                            <div class="contacts__column">
                                <div class="contacts__column-item"><b>№<?= $order["ORDER"]["ACCOUNT_NUMBER"] ?></b></div>
                            </div>
                            <div class="contacts__column">
                                <time class="contacts__column-item" datetime="<?= $order["ORDER"]["DATE_INSERT_FORMATED"] ?>">
                                    <?= $order["ORDER"]["DATE_INSERT_FORMATED"] ?>
                                </time>
                            </div>
                            <div class="contacts__column">
                                <div class="contacts__column-item"><?= $order["SHIPMENT"][0]["DELIVERY_NAME"] ?></div>
                            </div>
                            <div class="contacts__column">
                                <div class="contacts__column-item"><?= $order["PAYMENT"][0]["PAY_SYSTEM_NAME"] ?></div>
                            </div>
                            <div class="contacts__column">
                                <div class="contacts__column-item"><?= $order["ORDER"]["FORMATED_PRICE"] ?></div>
                            </div>
                            <div class="contacts__column">
                                <div class="contacts__column-item">
                                    <a class="text-slider__link corall-link" href="<?= $order["ORDER"]["URL_TO_DETAIL"] ?>">
                                        Подробнее о заказе
                                    </a>
                                    <a class="text-slider__link corall-link" href="<?= $order["ORDER"]["URL_TO_COPY"] ?>">
                                        Повторить заказ
                                    </a>
                                    <? if ($order['ORDER']['CAN_CANCEL'] === 'Y'): ?>
                                        <a class="text-slider__link corall-link" href="<?= $order["ORDER"]["URL_TO_CANCEL"] ?>">
                                            Отменить заказ
                                        </a>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <? endforeach ?>
            </div>
        </div>
        <?= $arResult["NAV_STRING"] ?>
    </div>
<? else: ?>
    <? ShowError("Заказы не найдены.") ?>
<? endif ?>