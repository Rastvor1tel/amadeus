<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 4 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left' => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right' => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<script id="basket-item-template" type="text/html">
    <tr class="basket-items-list-item-container{{#SHOW_RESTORE}} basket-items-list-item-container-expend{{/SHOW_RESTORE}}" id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
        {{#SHOW_RESTORE}}
        <td class="basket-items-list-item-notification" colspan="<?=$restoreColSpan?>">
            <div class="basket-items-list-item-notification-inner basket-items-list-item-notification-removed" id="basket-item-height-aligner-{{ID}}">
                <div class="basket-items-list-item-removed-container">
                    <div>
                        <?=Loc::getMessage('SBB_GOOD_CAP')?> <strong>{{NAME}}</strong> <?=Loc::getMessage('SBB_BASKET_ITEM_DELETED')?>.
                    </div>
                    <div class="basket-items-list-item-removed-block">
                        <a href="javascript:void(0)" data-entity="basket-item-restore-button">
                            <?=Loc::getMessage('SBB_BASKET_ITEM_RESTORE')?>
                        </a>
                        <span class="basket-items-list-item-clear-btn" data-entity="basket-item-close-restore-button"></span>
                    </div>
                </div>
            </div>
        </td>
        {{/SHOW_RESTORE}}
        {{^SHOW_RESTORE}}
        <td class="cabinet__basket-cols  is--preview">
            {{#DETAIL_PAGE_URL}}
            <a href="{{DETAIL_PAGE_URL}}" class="cabinet__basket-preview basket-item-image-link">
            {{/DETAIL_PAGE_URL}}
            <img class="basket-item-image img-responsive" alt="{{NAME}}" src="{{{IMAGE_URL}}}{{^IMAGE_URL}}<?=$templateFolder?>/images/no_photo.png{{/IMAGE_URL}}">
                <?
                if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
                {
                    ?>
                    {{#DISCOUNT_PRICE_PERCENT}}
                    <div class="basket-item-label-ring basket-item-label-small <?=$discountPositionClass?>">
                        -{{DISCOUNT_PRICE_PERCENT_FORMATED}}
                    </div>
                    {{/DISCOUNT_PRICE_PERCENT}}
                    <?
                }
                ?>
            {{#DETAIL_PAGE_URL}}
            </a>
            {{/DETAIL_PAGE_URL}}
        </td>
        <td class="cabinet__basket-cols  is--heading  is--left">
            <div class="cabinet__basket-heading">
                {{#DETAIL_PAGE_URL}}
                <a href="{{DETAIL_PAGE_URL}}">
                {{/DETAIL_PAGE_URL}}
                    {{NAME}}
                {{#DETAIL_PAGE_URL}}
                </a>
                {{/DETAIL_PAGE_URL}}
            </div>
            <div class="cabinet__basket-heading-small">Артикул: <span>{{ARTICLE}}</span></div>
        </td>
        <td class="cabinet__basket-cols<?=CSite::InGroup(GROUP_ID_OPT)?' is--left':'';?>" data-heading="Размер:">
            <?if(CSite::InGroup(GROUP_ID_OPT)):?>
                <div class="cabinet__basket-size">{{SIZE}}</div>
                <div class="cabinet__basket-size-small">упаковка {{OPT_NAME}}</div>
            <?else:?>
                <div class="form__item is--xs">
                    <span class="form__control">{{SIZE}}</span>
                </div>
            <?endif;?>
        </td>
        <td class="cabinet__basket-cols" data-heading="Цвет:">
            <?if(CSite::InGroup(GROUP_ID_OPT)):?>
            <div class="cabinet__basket-color">{{COLOR}}</div>
            <?else:?>
            <div class="form__item is--xs">
                <span class="form__control">{{COLOR}}</span>
            </div>
            <?endif;?>
        </td>
        <td class="cabinet__basket-cols  is--qty" data-heading="Кол-во">
            <div class="form__item  is--qty is--xs">
                <div class="form__qty is--xs" data-entity="basket-item-quantity-block">
                    <button type="button" class="form__qty-btn is--xs basket-item-amount-btn-minus" data-entity="basket-item-quantity-minus">
                        <svg viewBox="0 0 40 41" xmlns="http://www.w3.org/2000/svg">
                            <path d="M40 20.1419C40 31.1876 31.0457 40.1419 20 40.1419C8.95431 40.1419 0 31.1876 0 20.1419C0 9.09618 8.95431 0.141876 20 0.141876C31.0457 0.141876 40 9.09618 40 20.1419Z"
                                  class="form__qty-btn-bg  is--xs        "/>
                            <path d="M28.753 19.2632C29.2406 19.2632 29.6317 19.6543 29.6317 20.1419C29.6317 20.6296 29.2406 21.0206 28.753 21.0206L20.8771 21.0206L19.1152 21.016L11.2393 21.016C10.9955 21.0206 10.7747 20.9194 10.6183 20.763C10.4618 20.6066 10.3652 20.3811 10.3652 20.1419C10.3652 19.6543 10.7563 19.2632 11.2439 19.2632H28.753Z"
                                  class="form__qty-btn-icon  is--xs"/>
                        </svg>
                    </button>
                    <input type="number" class="form__qty-input is--xs basket-item-amount-filed" value="{{QUANTITY}}" data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field" id="basket-item-quantity-{{ID}}">
                    <button type="button" class="form__qty-btn is--xs basket-item-amount-btn-plus" data-entity="basket-item-quantity-plus">
                        <svg viewBox="0 0 40 41" xmlns="http://www.w3.org/2000/svg">
                            <path d="M40 20.1419C40 31.1876 31.0457 40.1419 20 40.1419C8.95431 40.1419 0 31.1876 0 20.1419C0 9.09618 8.95431 0.141876 20 0.141876C31.0457 0.141876 40 9.09618 40 20.1419Z"
                                  class="form__qty-btn-bg  is--xs        "/>
                            <path d="M29.6317 20.1415C29.6317 19.6538 29.2406 19.2628 28.753 19.2628L20.8771 19.2628V11.3869C20.8771 10.8993 20.4861 10.5083 19.9984 10.5083C19.5108 10.5083 19.1198 10.8993 19.1198 11.3869V19.2628L11.2439 19.2628C10.7563 19.2628 10.3652 19.6538 10.3652 20.1415C10.3652 20.3807 10.4618 20.6061 10.6183 20.7625C10.7747 20.9189 10.9955 21.0202 11.2393 21.0156L19.1152 21.0156L19.1152 28.8914C19.1152 29.1306 19.2118 29.3561 19.3682 29.5125C19.5292 29.6735 19.7454 29.7701 19.9892 29.7655C20.4769 29.7655 20.8679 29.3745 20.8679 28.8868L20.8771 21.0202L28.753 21.0202C29.2406 21.0202 29.6317 20.6291 29.6317 20.1415Z"
                                  class="form__qty-btn-icon  is--xs        "/>
                        </svg>
                    </button>
                </div>
            </div>
        </td>
        <td class="cabinet__basket-cols" data-heading="Цена:">
            <div class="cabinet__basket-cost basket-item-price-current-text">
                {{{SUM_PRICE_FORMATED}}}
            </div>
        </td>
        <td class="cabinet__basket-cols  is--btn  is--right basket-items-list-item-remove hidden-xs">
            <button type="button" class="btn-icon__item  is--light is--dib" title="Удалить">
                <svg class="icon-svg icon-icon-del basket-item-actions-remove" data-entity="basket-item-delete" role="img">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg/sprite.svg#icon-del"></use>
                </svg>
            </button>
        </td>
        {{/SHOW_RESTORE}}
    </tr>
</script>