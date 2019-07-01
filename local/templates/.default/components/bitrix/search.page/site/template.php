<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $searchQuery;
$searchQuery = $arResult["REQUEST"]["~QUERY"];
?>
<div class="content-block__elem">
    <?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
        ?>
        <div class="search-language-guess">
            <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </div><br /><?
    endif;?>
    <form action="" class="form__item is--search" method="get">
        <div class="form__search">
            <input type="text" name="q" value="<?=$arResult["REQUEST"]["~QUERY"]?>" size="40" class="form__search-input" placeholder="Поиск по каталогу">
            <button type="submit" class="form__search-btn    ">
                <svg class="icon-svg icon-icon-search" role="img">
                    <use xlink:href="<?=TEMPLATE_DIR?>/img/svg/sprite.svg#icon-search"></use>
                </svg>
            </button>
        </div>
    </form>
</div>
