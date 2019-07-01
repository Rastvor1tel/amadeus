<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
    <div class="cabinet__basket-total-bar">
        <div class="cabinet__basket-row  row  is--aic  is--jcsb  is--gap-xs   is--gutter    ">
            <div class="cabinet__basket-cols cols  is--empty    ">
                <button type="button" class="btn-icon__btn  is--primary  is--basket">
                    <span class="btn-icon__item  is--primary  is--basket">
                        <svg class="icon-svg icon-icon-del" role="img">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#icon-del"></use>
                        </svg>
                    </span>
                    <a href="?BASKET_CLEAR=Y" class="btn-icon__name  is--primary  is--basket">Очистить корзину</a>
                </button>
            </div>
            <div class="cabinet__basket-cols cols  is--total    ">
                <div class="cabinet__basket-row row  is--aic  is--gutter is--gap-device-xs    ">
                    <div class="cabinet__basket-cols cols  is--total-heading    ">
                        <div class="cabinet__basket-total-heading">Итого:
                        </div>
                    </div>
                    <div class="cabinet__basket-cols cols  is--total-qty">
                        <div class="cabinet__basket-total-qty">{{QUANTITY}}
                            <small>шт.</small>
                        </div>
                    </div>
                    <div class="cabinet__basket-cols cols  is--total-cost">
                        <div class="cabinet__basket-total-cost basket-coupon-block-total-price-current" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
                    </div>
                </div>
            </div>
            <div class="cabinet__basket-cols cols  is--bay">
                <button class="btn__item  is--basket btn btn-lg btn-default basket-btn-checkout{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}" data-entity="basket-checkout-button">
                    <?= Loc::getMessage('SBB_ORDER') ?>
                </button>
            </div>
        </div>
    </div>
</script>