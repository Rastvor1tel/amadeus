<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult['ITEMS']): ?>
    <div class="page-header__group  is--h1">
        <div class="page-header__panel  is--h1">
            <h2 class="page-header__heading  is--h1">Новым клиентам</h2>
        </div>
    </div>
    <div class="content-block__elem  is--xl  is--index-about">
        <h5 class="content-block__heading  is--index-about">Как легко начать у нас покупать, пошаговая инструкция:</h5>
        <div class="content-block__row row  is--gutter  is--index-about">
            <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                <div class="content-block__cols  cols  is--grid-3  is--index-about">
                    <div class="content-block__card  is--index-about">
                        <div class="content-block__card-item  is--num  is--index-about">0<?=$key+1?></div>
                        <?= $arItem['PREVIEW_TEXT'] ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>