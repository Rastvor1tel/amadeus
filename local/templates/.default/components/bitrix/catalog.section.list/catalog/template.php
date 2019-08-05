<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="aside__dropdown">
    <ul class="aside__nav">
        <?foreach($arResult['SECTIONS'] as $key => $arSection):?>
            <?if($arSection['SUBSECTIONS']):?>
                <li class="aside__nav-item dropdown<?=$arSection['CUR_SECTION']=='Y'?' open':'';?>">
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="aside__nav-link  dropdown-toggle" data-toggle="dropdown">
                        <span><?=$arSection['NAME']?></span>
                        <div class="aside__nav-icon">
                            <svg viewBox="0 0 11 7" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.331044 0.256714C0.741554 -0.112745 1.37384 -0.0794661 1.7433 0.331044L5.50001 4.50516L9.25671 0.331044C9.62617 -0.0794661 10.2585 -0.112745 10.669 0.256714C11.0795 0.626173 11.1128 1.25846 10.7433 1.66897L6.2433 6.66897C6.05366 6.87969 5.78349 7.00001 5.50001 7.00001C5.21652 7.00001 4.94636 6.87969 4.75671 6.66897L0.256714 1.66897C-0.112745 1.25846 -0.0794661 0.626173 0.331044 0.256714Z"/></svg>
                        </div>
                    </a>
                    <ul class="dropdown-menu  aside__nav-dropdown">
                        <?foreach($arSection['SUBSECTIONS'] as $subSection):?>
                            <li class="aside__nav-dropdown-item">
                                <a href="<?=$subSection['SECTION_PAGE_URL']?>" class="aside__nav-dropdown-link"><?=$subSection['NAME']?> <span><?=$subSection['ELEMENT_CNT']?></span></a>
                            </li>
                        <?endforeach;?>
                    </ul>
                </li>
            <?else:?>
                <li class="aside__nav-item">
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="aside__nav-link">
                        <span><?=$arSection['NAME']?></span>
                    </a>
                </li>
            <?endif;?>
        <?endforeach;?>
        <li class="aside__nav-item  is--divider"></li>
        <li class="aside__nav-item">
            <a class="aside__nav-link" href="/catalog/sale/">Товары со скидкой</a>
        </li>
        <li class="aside__nav-item">
            <a class="aside__nav-link" href="/catalog/hit/">Хиты продаж</a>
        </li>
        <li class="aside__nav-item">
            <a class="aside__nav-link" href="/catalog/new/">Новинки</a>
        </li>
    </ul>
</div>
