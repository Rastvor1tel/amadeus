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

	<div class="footer__navbar-cols cols">
		<div class="footer__navbar-heading"><?=$item['NAME'];?></div>

		<?
		if(count($arResult['SECTIONS'][$item['ID']])) {
			$items_arr = array_chunk($arResult['SECTIONS'][$item['ID']], 5);
			?>

		<div class="footer__navbar-inner-row row">
			<?
			foreach($items_arr as $items) {
			?>
			<div class="footer__navbar-inner-cols cols">
				<ul class="footer__navbar-nav">
			<?
				foreach($items as $_item) {
				?>
				<li class="footer__navbar-inner-item">
					<a href="<?=$_item['SECTION_PAGE_URL'];?>" class="footer__navbar-inner-link">
						<?=$_item['NAME'];?>
					</a>
				</li>
				<?
				}
			?>
				</ul>
			</div>
			<?
			}
			?>
		</div>

			<?
		}
		?>
	</div>

	<?
	}
}

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();