<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="navbar__nav">
    <?foreach($arResult as $key => $arItem):?>
        <?if($arItem['IS_PARENT']):?>
            <?if($key == 1):?>
                <?if($_COOKIE['role'] == 'N'):?>
                <li class="navbar__nav-item dropdown is--full<?=$arItem['SELECTED']?' is--active':'';?>">
                    <span class="navbar__nav-link disabled"><?=$arItem['TEXT']?></span>
                </li>
                <?else:?>
                <li class="navbar__nav-item dropdown is--full<?=$arItem['SELECTED']?' is--active':'';?>">
                    <a href="<?=$arItem['LINK']?>" class="dropdown-toggle navbar__nav-link" data-toggle="dropdown">
                        <div class="navbar__nav-caret">
                            <svg class="icon-svg icon-navbar-dropdown" role="img">
                                <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#navbar-dropdown"></use>
                            </svg>
                        </div>
                        <?=$arItem['TEXT']?>
                    </a>
                    <div class="navbar__nav-dropdown dropdown-menu  is--full">
                        <div class="navbar__nav-dropdown-container container">
                            <div class="navbar__nav-dropdown-row  row  is--gutter">
                                <?foreach($arItem['ITEMS'] as $arSubItem):?>
                                    <div class="navbar__nav-dropdown-cols cols">
                                        <ul class="navbar__nav-dropdown-menu">
                                            <li class="navbar__nav-dropdown-heading">
                                                <a href="<?=$arSubItem['LINK']?>"><?=$arSubItem['TEXT']?></a>
                                            </li>
                                            <?foreach($arSubItem['ITEMS'] as $arSubSubItem):?>
                                                <li class="navbar__nav-dropdown-item">
                                                    <a href="<?=$arSubSubItem['LINK']?>" class="navbar__nav-dropdown-link"><span><?=$arSubSubItem['TEXT']?></span></a>
                                                </li>
                                            <?endforeach;?>
                                        </ul>
                                    </div>
                                <?endforeach;?>
                                <div class="navbar__nav-dropdown-cols cols">
                                    <ul class="navbar__nav-dropdown-menu">
                                        <li class="navbar__nav-dropdown-heading">
                                            <a href="/catalog/sale/">Товары со скидкой</a>
                                        </li>
                                        <li class="navbar__nav-dropdown-heading">
                                            <a href="/catalog/hit/">Хиты продаж</a>
                                        </li>
                                        <li class="navbar__nav-dropdown-heading">
                                            <a href="/catalog/new/">Новинки</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?endif;?>
            <?else:?>
                <li class="navbar__nav-item dropdown<?=$arItem['SELECTED']?' is--active':'';?>">
                    <a href="<?=$arItem["LINK"]?>" class="dropdown-toggle navbar__nav-link" data-toggle="dropdown">
                        <div class="navbar__nav-caret">
                            <svg class="icon-svg icon-navbar-dropdown" role="img">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#navbar-dropdown"></use>
                            </svg>
                        </div>
                        <?=$arItem["TEXT"]?>
                    </a>
                    <div class="navbar__nav-dropdown dropdown-menu">
                        <ul class="navbar__nav-dropdown-menu">
                            <?foreach($arItem['ITEMS'] as $arSubItem):?>
                                <li class="navbar__nav-dropdown-item    ">
                                    <a href="<?=$arSubItem['LINK']?>" class="navbar__nav-dropdown-link"><span><?=$arSubItem['TEXT']?></span></a>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                </li>
            <?endif;?>
        <?else:?>
            <li class="navbar__nav-item<?=$key==0?' is--index':'';?><?=$arItem['SELECTED']?' is--active':'';?>">
                <a href="<?=$arItem["LINK"]?>" class="navbar__nav-link"><span><?=$arItem["TEXT"]?></span></a>
            </li>
        <?endif;?>
    <?endforeach;?>
</ul>