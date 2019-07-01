<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="cabinet__navbar-nav">
        <?foreach ($arResult as $arItem):?>
            <li class="cabinet__navbar-nav-item<?=$arItem['SELECTED']?' is--active':'';?>">
                <a class="cabinet__navbar-nav-link" href="<?=$arItem['LINK']?>">
                    <div class="cabinet__navbar-nav-icon"><svg class="icon-svg icon-cabinet-home" role="img">
                            <use xlink:href=="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#cabinet-home"></use>
                        </svg></div>
                    <span><?=$arItem['TEXT']?></span>
                </a>
            </li>
        <?endforeach;?>
    </ul>
<?endif;?>
