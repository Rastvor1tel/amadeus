<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as BX__Loc;

BX__Loc::loadMessages(__FILE__);

$__frame = $this->createFrame('_' . md5(__FILE__), false)->begin('');//'Loading...'

//azbn_ed($arResult['PREVIEW_PICTURE']);

?>

<div class="card-item__card  is--catalog">	
	<a href="<?=AZBN__ROOT;?><?=$arResult['ITEM']['DETAIL_PAGE_URL'];?>" class="card-item__preview  is--catalog">
		<img src="<?=$arResult['PREVIEW_PICTURE'];?>" alt="<?=$arResult['ITEM']['NAME'];?>" class="img-responsive">
		<div class="card-item__bg  is--catalog">
			<div class="card-item__bg-view  is--catalog">Подробнее</div>
		</div>
	</a>	
	<div class="card-item__heading  is--catalog"><a href="<?=AZBN__ROOT;?><?=$arResult['ITEM']['DETAIL_PAGE_URL'];?>"><?=$arResult['ITEM']['NAME'];?></a></div>
	<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
	<!--
	<div class="card-item__elem  is--status  is--catalog">Новинка</div>
	<div class="card-item__elem  is--status  is--catalog">Скидка</div>
	<div class="card-item__elem  is--status  is--catalog">  </div>
	-->
</div>

<?

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();