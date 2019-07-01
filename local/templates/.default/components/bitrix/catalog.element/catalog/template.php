<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<div class="content-block__elem  is--left  is--catalog-card">
    <div class="content-block__container container  is--left  is--catalog-card">
        <div class="content-block__slick  is--slider  is--catalog-card" data-slider-slick="slick-catalog">
            <?foreach($arResult['GALLERY'] as $arPicture):?>
                <div class="content-block__slick-item  is--slider  is--catalog-card">
                    <a href="<?=$arPicture['ORIGINAL_SRC']?>" class="content-block__preview  is--slider  is--catalog-card" data-fancybox="cat-gallery">
                        <img src="<?=$arPicture['MIDDLE_SRC']?>" class="img-responsive" alt="">
                    </a>
                </div>
            <?endforeach;?>
        </div>
        <div class="content-block__slick  is--catalog-card" data-slider-slick="slick-catalog-nav">
            <?foreach($arResult['GALLERY'] as $arPicture):?>
                <div class="content-block__slick-item  is--slider-nav  is--catalog-card">
                    <div class="content-block__preview  is--slider-nav  is--catalog-card">
                        <img src="<?=$arPicture['SMALL_SRC']?>" class="img-responsive" alt="">
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<div class="content-block__elem  is--right  is--catalog-card">
    <div class="content-block__container container  is--right  is--catalog-card">
        <div class="page-header__group  is--h1">
            <?
            $helper = new PHPInterface\ComponentHelper($component);
            $helper->deferredCall('ShowNavChain', array('.default'));
            ?>
            <div class="page-header__panel  is--h1">
                <h1  class="page-header__heading  is--h1"><?=$arResult['NAME']?></h1>
            </div>
        </div>
        <div class="content-block__elem  is--catalog-card">
            <div class="card-item__card  is--catalog-page">
                <form action="" class="card-item__elem  is--form  is--catalog-page">
                    <div class="card-item__elem  is--color  is--catalog-page">
                        <div class="card-item__elem  is--cost-heading  is--catalog-page">
                            Цена:
                        </div>
                        <div id="productPrice" class="card-item__elem  is--cost-num  is--catalog-page"><?=$arResult['PRICE']?></div>
                    </div>
                    <div class="card-item__elem  is--color  is--catalog-page">
                        <div class="card-item__elem  is--color-heading  is--catalog-page">
                            Цвет:
                        </div>
                        <div class="card-item__elem  is--color-list  is--catalog-page">
                            <div class="form__item  is--catalog-page    ">
                                <select class="form__control color-list__select form-control validate[  ]  is--select  is--catalog-page        " id="color[select]" name="f[select]">
                                    <option>Выберите цвет:</option>
                                    <?foreach($arResult['COLORS'] as $key => $arColor) echo '<option data-price="'.$arColor['PRICE'].'" value="'.$key.'">'.$arColor['VALUE'].'</option>';?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="sizeList" class="card-item__elem is--size is--catalog-page"></div>
                    <div class="card-item__elem  is--btn  is--catalog-page">
                        <button type="button" class="btn-link__item" data-toggle="modal" data-target="#modal-size">
                            <span class="btn-link__name">Таблица размеров</span>
                        </button>
                    </div>
                    <div class="card-item__elem  is--cost  is--catalog-page">
                        <div class="card-item__row row  is--gutter  is--cost  is--catalog-page">
                            <div class="card-item__cols cols  is--cost  is--catalog-page">
                                <div class="card-item__elem  is--cost-heading  is--catalog-page">
                                    Всего товаров:
                                </div>
                                <div id="productsQuantity" class="card-item__elem  is--cost-num  is--catalog-page">0</div>
                            </div>
                            <div class="card-item__cols cols  is--cost  is--catalog-page">
                                <div class="card-item__elem  is--cost-heading  is--catalog-page">
                                    Итоговая стоимсоть:
                                </div>
                                <div id="offerPrice" class="card-item__elem  is--cost-num  is--catalog-page">0 ₽</div>
                            </div>
                            <div class="card-item__cols cols  is--cost-btn  is--catalog-page">
                                <button type="button" class="btn__item buyBtn">
                                    <span class="btn__name">В корзину</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-item__elem  is--note  is--catalog-page">
                    <div class="tabs__panel">
                        <div class="tabs__nav-wrap    ">
                            <ul class="tabs__nav    ">
                                <li class="tabs__item     active">
                                    <a class="tabs__link    " href="#tabs-card1" data-toggle="tab"><span>Описание</span></a>
                                </li>
                                <li class="tabs__item    ">
                                    <a class="tabs__link    " href="#tabs-card2" data-toggle="tab"><span>Доставка и оплата</span></a>
                                </li>
                                <li class="tabs__item    ">
                                    <a class="tabs__link    " href="#tabs-card3" data-toggle="tab"><span>Возврат и гарантия</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tabs__pane  text__block  active" id="tabs-card1">
                        <?
                        if ($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])
                            echo '<p>Артикул: <b>'.$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'].'</b></p>';
                        if ($arResult['PROPERTIES']['SOSTAV']['VALUE'])
                            echo '<p>Состав: <b>'.$arResult['PROPERTIES']['SOSTAV']['VALUE'].'</b></p>';
                        echo $arResult['DETAIL_TEXT'];
                        ?>
                    </div>
                    <div class="tabs__pane" id="tabs-card2">
                        <?$APPLICATION->IncludeComponent('bitrix:main.include', '', ['AREA_FILE_SHOW' => 'file', 'PATH' => '/include/delivery.php']);?>
                    </div>
                    <div class="tabs__pane" id="tabs-card3">
                        <?$APPLICATION->IncludeComponent('bitrix:main.include', '', ['AREA_FILE_SHOW' => 'file', 'PATH' => '/include/refund.php']);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        BX.message({
            templateFolder:'<?=$templateFolder?>',
            productID: '<?=$arResult['ID']?>',
            iblockID: '<?=$arResult['CATALOG']['ID']?>'
        });
    </script>
<?
$helper->saveCache();
?>