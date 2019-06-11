<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as BX__Loc;

BX__Loc::loadMessages(__FILE__);

$__frame = $this->createFrame('_' . md5(__FILE__), false)->begin('');//'Loading...'

//azbn_ed($arParams);

if(is_array($arResult['ITEMS']) && count($arResult['ITEMS'])) {
?>

<main class="content-block__panel  is--bg">
	<div class="content-block__container container  is--full">
		<div class="page-header__group  is--h1  is--grid">				
			<div class="breadcrumb__block      is--grid">
				<ul class="breadcrumb__list      is--grid">
					<li class="breadcrumb__list-item">
						<a href="<?=AZBN__ROOT;?>" class="breadcrumb__list-link">Главная</a>
					</li>
					<li class="breadcrumb__list-item is--active">
						<span class="breadcrumb__list-link"><?=$arResult['IBLOCK']['NAME'];?></span>
					</li>
				</ul>
			</div>		
			<div class="page-header__panel  is--h1  is--grid">
				<h1  class="page-header__heading  is--h1  is--grid"><?=$arResult['SECTION']['NAME'];?></h1>		
			</div>
			
			<?
			if(count($arResult['SECTIONS'])) {
			?>
			<div class="tabs__panel  is--grid  is--xs-scroll">
				<div class="tabs__nav-wrap  is--grid  is--xs-scroll">
					<ul class="tabs__nav  is--grid  is--xs-scroll">
						<?
						foreach($arResult['SECTIONS'] as $item) {
						?>
						<li class="tabs__item  is--grid  is--xs-scroll <?if($item['ID'] == $arResult['SECTION']['ID']){?>is--active<?}?> ">
							<a class="tabs__link  is--grid  is--xs-scroll" href="<?=AZBN__ROOT;?><?=$item['SECTION_PAGE_URL'];?>"><span><?=$item['NAME'];?></span></a>
						</li>
						<?
						}
						?>
					</ul>
				</div>
			</div>
			<?
			}
			?>
			
		</div>	
		<div class="content-block__elem    ">
			<div class="content-block__row row  is--gutter    ">
				
				<?
				foreach($arResult['ITEMS'] as $item) {
					//echo \CIBlock::GetAdminElementEditLink($item["IBLOCK_ID"], $item["ID"], array("find_section_section" => $item["IBLOCK_SECTION_ID"], 'WF' => 'Y'));
					//echo $arResult['IBLOCK']['DETAIL_PAGE_URL'];//\CIBlock::ReplaceDetailUrl($arResult['IBLOCK']['DETAIL_PAGE_URL'], $arResult['IBLOCK'], true, false);;
					//$item['DATE_CREATE']->format('Y-m-d');
					//echo $item['NAME'] . '<br />';
					
					//PREVIEW_PICTURE
					//DETAIL_PAGE_URL
					
					//$item['DATE_CREATE']->format('Y-m-d')
					
					$img_full = \CFile::GetPath($item['PREVIEW_PICTURE']);
				?>
				
				<div class="content-block__cols cols      is--grid-4">
					<article class="card-item__card  is--news">	
						<a href="<?=AZBN__ROOT;?><?=$item['DETAIL_PAGE_URL'];?>" class="card-item__preview  is--news">
							<img src="<?=$img_full;?>" alt="<?=$item['NAME'];?>" class="img-responsive" >
							<div class="card-item__bg  is--news">
								<div class="card-item__bg-view  is--news">Подробнее</div>
							</div>
						</a>
						<time class="card-item__date  is--news" datetime="<?=$item['DATE_CREATE'];?>"><?=$item['DATE_CREATE'];?></time>	
						<h4 class="card-item__heading  is--news"><a href="<?=AZBN__ROOT;?><?=$item['DETAIL_PAGE_URL'];?>"><?=$item['NAME'];?></a></h4>
					</article>
				</div>
				
				<?
				}
				?>
				
			</div>
		</div>
		
		<?
		if($arParams['PAGINATION']['COUNT_FULL'] > $arParams['PAGINATION']['COUNT']) {
		?>
		<div class="content-block__elem    ">
			<div class="pagination__block  is--center">
				<ol class="pagination__list  is--center">		
					<li class="pagination__item  is--center">
						<a href="#" class="pagination__link  is--center"><span>1 </span></a>
					</li>	
					<li class="pagination__item  is--active  is--center">
						<a href="#" class="pagination__link  is--active  is--center"><span>2 </span></a>
					</li>
					<li class="pagination__item  is--center">
						<a href="#" class="pagination__link  is--center"><span>3 </span></a>
					</li>
					<li class="pagination__item  is--center">
						<a href="#" class="pagination__link  is--center"><span>...</span></a>
					</li>		
					<li class="pagination__item  is--center">
						<a href="#" class="pagination__link  is--center"><span>10</span></a>
					</li>
				</ol>
			</div> 
		</div>
		<?
		}
		?>
		
	</div>
</main>

<?
}

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();