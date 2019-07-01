<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>
<?if($arResult['ITEMS']):?>
    <div class="content-block__panel  is--catalog-card-view  is--info-50">
        <div class="content-block__container container is--catalog-card-view">
            <div class="page-header__group  is--h2x  is--fw-500  align--center-notsmart">
                <div class="page-header__panel  is--h2x  is--fw-500  align--center-notsmart">
                    <h2  class="page-header__heading  is--h2x  is--fw-500  align--center-notsmart">Вы смотрели:</h2>
                </div>
            </div>
            <div class="content-block__elem  is--catalog-card-view">
                <div class="content-block__slick  is--catalog-card-view" data-slider-slick="slick-catalog-view">
                    <?foreach($arResult['ITEMS'] as $arItem):?>
                        <div class="content-block__slick-item  is--catalog-card-view">
                            <div class="card-item__card  is--catalog">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="card-item__preview  is--catalog">
                                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" class="img-responsive">
                                    <div class="card-item__bg  is--catalog">
                                        <div class="card-item__bg-view  is--catalog">Подробнее</div>
                                    </div>
                                </a>
                                <div class="card-item__heading  is--catalog"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
                                <div class="card-item__elem  is--cost  is--catalog">Цена: <span><?=$arItem['PRICE']?></span></div>
                                <?
                                if ($arItem['PROPERTIES']['NEWPRODUCT']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Новинка</div>';
                                if ($arItem['PROPERTIES']['SALELEADER']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Хит продаж</div>';
                                if ($arItem['PROPERTIES']['SPECIALOFFER']['VALUE']) echo '<div class="card-item__elem is--status is--catalog">Скидка</div>';
                                ?>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
<?endif;?>