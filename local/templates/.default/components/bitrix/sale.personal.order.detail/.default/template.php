<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
if (!empty($arResult["ERROR_MESSAGE"])) {
    ShowError($arResult["ERROR_MESSAGE"]);
    return;
}
?>

<div class="container">
    <div class="contacts__wrap">
        <div class="contacts__left">

            <div class="contacts__item">
                <div class="contacts__columns">
                    <div class="contacts__column">
                        <div class="contacts__column-title"></div>
                        <div class="contacts__column-item" datetime="<?= $arResult["DATE_INSERT_FORMATED"] ?>">
                            <b>Заказ №<?= $arResult["ACCOUNT_NUMBER"] ?> от <?= $arResult["DATE_INSERT_FORMATED"] ?></b>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contacts__item">
                <div class="contacts__columns">
                    <div class="contacts__column">
                        <div class="contacts__column-title">Текущий статус:</div>
                        <div class="contacts__column-item"><?= $arResult["STATUS"]["NAME"] ?>
                            (от <?= $arResult["DATE_STATUS_FORMATED"] ?>)
                        </div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Сумма заказа:</div>
                        <div class="contacts__column-item">
                            <?= $arResult["PRICE_FORMATED"] ?>
                            <? if (floatval($arResult["SUM_PAID"])): ?>
                                (из них оплачено: <?= $arResult["SUM_PAID_FORMATED"] ?>)
                            <? endif ?>
                        </div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Оплачен:</div>
                        <div class="contacts__column-item">
                            <?= ($arResult["PAYED"] == "Y" ? "Да " . $arResult["DATE_PAYED_FORMATED"] : "Нет") ?>
                            <?
                            foreach ($arResult['PAYMENT'] as $payment) { //p($payment);
                                if ($payment['PAY_SYSTEM']["IS_CASH"] !== "Y") {
                                    ?>
                                    <?= $payment['BUFFERED_OUTPUT'] ?>
                                    <?
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Отменен:</div>
                        <div class="contacts__column-item">
                            <?= ($arResult["CANCELED"] === "Y"
                                ? "Да (" . $arResult["DATE_CANCELED_FORMATED"] . ")"
                                : 'Нет <a class="button button--link button--dotted" href="' . $arResult["URL_TO_CANCEL"] . '">( Отменить )</a>'
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contacts__item">
                <span class="text-slider__name">Данные вашей учетной записи</span>
                <div class="contacts__columns">
                    <div class="contacts__column">
                        <div class="contacts__column-title">Пользователь:</div>
                        <div class="contacts__column-item"><?= $arResult["USER_LAST_NAME"] ?> <?= $arResult["USER_NAME"] ?></div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Логин:</div>
                        <div class="contacts__column-item"><?= $arResult["USER"]["LOGIN"] ?></div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">E-mail:</div>
                        <div class="contacts__column-item"><?= $arResult["USER"]["EMAIL"] ?></div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title"></div>
                        <div class="contacts__column-item"></div>
                    </div>
                </div>
            </div>

            <div class="contacts__item">
                <span class="text-slider__name">Параметры заказа</span>
                <div class="contacts__columns">
                    <? foreach ($arResult["ORDER_PROPS"] as $prop): ?>
                        <div class="contacts__column">
                            <div class="contacts__column-title"><?= $prop["NAME"] ?>:</div>
                            <div class="contacts__column-item"><?= $prop["VALUE"] ?></div>
                        </div>
                    <? endforeach ?>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Комментарии к заказу:</div>
                        <div class="contacts__column-item"><?= $arResult["USER_DESCRIPTION"] ?></div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title"></div>
                        <div class="contacts__column-item"></div>
                    </div>
                </div>
            </div>

            <div class="contacts__item">
                <span class="text-slider__name">Содержимое заказа:</span>
                <div class="contacts__columns">
                    <div class="contacts__column">
                        <div class="contacts__column-title">Наименование</div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Цена</div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Количество</div>
                    </div>
                    <div class="contacts__column">
                        <div class="contacts__column-title">Стоимость</div>
                    </div>
                </div>

            <? $productSum = 0; ?>
            <? foreach ($arResult["BASKET"] as $arItem): ?>
                <? $productSum += $arItem["PRICE"] * $arItem["QUANTITY"]; ?>
                    <div class="contacts__columns">

                        <div class="contacts__column">
                            <div class="contacts__column-item">
                                <? if($arItem["PICTURE"]["SRC"]): ?>
                                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                        <img src="<?= $arItem["PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>"
                                             title="<?= $arItem["NAME"] ?>">
                                    </a>
                                <? endif; ?>
                                <a class="text-slider__link corall-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                    <?= $arItem["NAME"] ?>
                                </a>
                            </div>
                        </div>

                        <div class="contacts__column">
                            <div class="contacts__column-item">
                                <del><? if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0): ?><?= $arItem["FULL_PRICE_FORMATED"] ?><? endif ?></del>
                                <?= $arItem["PRICE_FORMATED"] ?>
                            </div>
                        </div>

                        <div class="contacts__column">
                            <div class="contacts__column-item"><?= $arItem["QUANTITY"] ?></div>
                        </div>

                        <div class="contacts__column">
                            <div class="contacts__column-item"><?= SaleFormatCurrency($arItem["PRICE"] * $arItem["QUANTITY"],
                                    $arResult["CURRENCY"]) ?></div>
                        </div>

                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="contacts__wrap">
        <div class="contacts__left">
            <div class="contacts__item">
                <table class="order-detail__summ">
                    <tr>
                        <td>Товаров на:</td>
                        <td><?= SaleFormatCurrency($productSum, $arResult["CURRENCY"]) ?></td>
                    </tr>
                    <? if (strlen($arResult["PRICE_DELIVERY_FORMATED"])): ?>
                        <tr>
                            <td>Стоимость доставки:&nbsp;</td>
                            <td> <?= $arResult["PRICE_DELIVERY_FORMATED"] ?></td>
                        </tr>
                    <? endif ?>
                    <? foreach ($arResult["TAX_LIST"] as $tax): ?>
                        <tr>
                            <td><?= $tax["TAX_NAME"] ?>:</td>
                            <td><?= $tax["VALUE_MONEY_FORMATED"] ?></td>
                        </tr>
                    <? endforeach ?>
                    <? if (floatval($arResult["TAX_VALUE"])): ?>
                        <tr>
                            <td>Сумма налогов:</td>
                            <td><?= $arResult["TAX_VALUE_FORMATED"] ?></td>
                        </tr>
                    <? endif ?>
                    <? if (floatval($arResult["DISCOUNT_VALUE"])): ?>
                        <tr>
                            <td>Скидка:</td>
                            <td><?= $arResult["DISCOUNT_VALUE_FORMATED"] ?></td>
                        </tr>
                    <? endif ?>
                    <tr>
                        <td><b>Итого:</b></td>
                        <td><b><?= $arResult["PRICE_FORMATED"] ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <a class="text-slider__link corall-link" href="<?= $arResult["URL_TO_LIST"] ?>">← В список заказов</a>
</div>
