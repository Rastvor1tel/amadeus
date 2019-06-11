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

	<li class="aside__nav-item dropdown"><!-- open -->
		<a href="#<?=$item['SECTION_PAGE_URL'];?>" class="aside__nav-link  dropdown-toggle" data-toggle="dropdown">
			<span><?=$item['NAME'];?></span>
			<div class="aside__nav-icon">
				<svg viewBox="0 0 11 7" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.331044 0.256714C0.741554 -0.112745 1.37384 -0.0794661 1.7433 0.331044L5.50001 4.50516L9.25671 0.331044C9.62617 -0.0794661 10.2585 -0.112745 10.669 0.256714C11.0795 0.626173 11.1128 1.25846 10.7433 1.66897L6.2433 6.66897C6.05366 6.87969 5.78349 7.00001 5.50001 7.00001C5.21652 7.00001 4.94636 6.87969 4.75671 6.66897L0.256714 1.66897C-0.112745 1.25846 -0.0794661 0.626173 0.331044 0.256714Z"/></svg>
			</div>
		</a>
		<?
		if(count($arResult['SECTIONS'][$item['ID']])) {
			?>
		<ul class="dropdown-menu  aside__nav-dropdown">
			<?
			foreach($arResult['SECTIONS'][$item['ID']] as $_item) {
		?>
			<li class="aside__nav-dropdown-item">
				<a href="<?=$_item['SECTION_PAGE_URL'];?>" class="aside__nav-dropdown-link"><?=$_item['NAME'];?><!-- <span>28</span>--></a>
			</li>
		<?
			}
			?>
		</ul>
			<?
		}
		?>
	</li>

	<?
	}
}

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();