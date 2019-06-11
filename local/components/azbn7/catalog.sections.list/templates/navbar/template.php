<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as BX__Loc;

BX__Loc::loadMessages(__FILE__);

$__frame = $this->createFrame('_' . md5(__FILE__), false)->begin('');//'Loading...'

//azbn_ed($arParams);

if(count($arResult['SECTIONS'][0])) {
	foreach($arResult['SECTIONS'][0] as $item) {

		// AZBN__ROOT $item['SECTION_PAGE_URL']
	?>

	<div class="navbar__nav-dropdown-cols cols">				
		<ul class="navbar__nav-dropdown-menu">					
			<li class="navbar__nav-dropdown-heading">
				<a href="<?=$item['SECTION_PAGE_URL'];?>"><?=$item['NAME'];?></a>
			</li>
			<?
			if(count($arResult['SECTIONS'][$item['ID']])) {
				foreach($arResult['SECTIONS'][$item['ID']] as $_item) {
			?>
			<li class="navbar__nav-dropdown-item    ">
				<a href="<?=$_item['SECTION_PAGE_URL'];?>" class="navbar__nav-dropdown-link"><span><?=$_item['NAME'];?></span></a>  
			</li>
			<?
				}
			}
			?>
		</ul>
	</div>

	<?
	}
}

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();