<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as BX__Loc;

BX__Loc::loadMessages(__FILE__);

$__frame = $this->createFrame('_' . md5(__FILE__), false)->begin('');//'Loading...'

//azbn_ed($arParams);

?>

<main class="content-block__panel  is--aside-navbar  is--dark-bg">
	<div class="aside__block  is--catalog dropdown">
		<a href="#" data-toggle="dropdown" class="aside__btn-block">
			<div class="container">
				<div class="aside__btn">
					<div class="aside__btn-hamb">
						<div class="aside__btn-hamb-item  is--top"></div>
						<div class="aside__btn-hamb-item  is--center"></div>
						<div class="aside__btn-hamb-item  is--bottom"></div>
					</div>
					<div class="aside__btn-name">
						Категории каталога
					</div>
				</div>		
			</div>		
		</a>
		<div class="aside__dropdown">
			<ul class="aside__nav">
				
				<?
				$APPLICATION->IncludeComponent(
					AZBN__NS . ':' . 'catalog.sections.list',
					'sidebar',
					Array(
						'IBLOCK_ID' => 2,
					)
				);
				?>
				
				<li class="aside__nav-item  is--divider"></li>
				<li class="aside__nav-item">
					<a class="aside__nav-link" href="#">Товары со скидкой</a>
				</li>
				<li class="aside__nav-item">
					<a class="aside__nav-link" href="#">Хиты продаж</a>
				</li>
				<li class="aside__nav-item">
					<a class="aside__nav-link" href="#">Новинки</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="content-block__container container  is--aside-navbar  is--full">
		<div class="page-header__group  is--h1  is--hidden-screen">				
			<div class="breadcrumb__block    ">
				<ul class="breadcrumb__list    ">
					<li class="breadcrumb__list-item">
						<a href="<?=AZBN__ROOT;?>/amadeus/" class="breadcrumb__list-link">Главная</a>
					</li>
					<li class="breadcrumb__list-item is--active">
						<span class="breadcrumb__list-link">Каталог</span>
					</li>
				</ul>
			</div>		
			<div class="page-header__panel  is--h1  is--hidden-screen">
				<h1  class="page-header__heading  is--h1  is--hidden-screen">Каталог</h1>
			</div>
		</div>
		
		<?
		/*
		<div class="content-block__elem  is--xxs    ">
			<div class="cabinet__filter-block    ">
				<a href="#" class="cabinet__filter-btn-block">
					<div class="container">
						<div class="cabinet__filter-btn">
							<div class="cabinet__filter-btn-hamb">
								<div class="cabinet__filter-btn-hamb-item  is--top"></div>
								<div class="cabinet__filter-btn-hamb-item  is--center"></div>
								<div class="cabinet__filter-btn-hamb-item  is--bottom"></div>
							</div>
							<div class="cabinet__filter-btn-name">
								Фильтры каталога
							</div>
						</div>		
					</div>		
				</a>
				<div class="cabinet__filter-dropdown    ">
					<ul class="cabinet__filter-nav    ">
						<li class="cabinet__filter-nav-item dropdown    ">
							<a href="#" class="dropdown-toggle cabinet__filter-nav-link" data-toggle="dropdown">
								<div class="cabinet__filter-nav-text">
									Цена, ₽:
									<div class="cabinet__filter-nav-result">
										650 - 11 250
									</div>
								</div>
								<div class="cabinet__filter-nav-caret">
									<svg class="icon-svg icon-navbar-dropdown" role="img">
										<use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg/sprite.svg#navbar-dropdown"></use>
									</svg>
								</div>
							</a>
							<div class="cabinet__filter-nav-dropdown dropdown-menu">
								<div class="form__item        ">
									<div class="form__card-row        ">
										<div class="form__card-cols        ">
											<div class="form__card        ">
												<input type="double" class="form__control form-control  js-from          is--xs" id="fr[area_from]" name="f[От:]" placeholder="От:">
											</div>
										</div>
										<div class="form__card-cols        ">
											<div class="form__card        ">
												<input type="double" class="form__control form-control  js-to          is--xs" id="fr[area_to]" name="f[До:]" placeholder="До:">
											</div>
										</div>
										<div class="form__card-cols  is--range        ">
											<input type="text" class="js-range-slider" 
												data-min=" 0" 
												data-max="10000"
												data-from="1000"
												data-to="9000"
												data-type="double"
												data-step="50">
										</div>
									</div>
								</div>
								<div class="cabinet__filter-nav-dropdown-btn">
									<button type="button" class="btn__item  is--xs">
										<span class="btn__name">Сохранить</span>
									</button>
								</div>
							</div>		
						</li>
						<li class="cabinet__filter-nav-item dropdown    ">
							<a href="#" class="dropdown-toggle cabinet__filter-nav-link" data-toggle="dropdown">
								<div class="cabinet__filter-nav-text">
									Размер:
									<div class="cabinet__filter-nav-result  is--size">
										40, 42
									</div>
								</div>
								<div class="cabinet__filter-nav-caret">
									<svg class="icon-svg icon-navbar-dropdown" role="img">
										<use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg/sprite.svg#navbar-dropdown"></use>
									</svg>
								</div>
							</a>
							<div class="cabinet__filter-nav-dropdown dropdown-menu">
								<div class="pagination__block  is--size  is--filter">
									<ol class="pagination__list  is--size  is--filter">			
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>38</span></a>
										</li>	
										<li class="pagination__item  is--active  is--size  is--filter">
											<button type="button" class="pagination__link  is--active  is--size  is--filter"><span>40</span></a>
										</li>
										<li class="pagination__item  is--active  is--size  is--filter">
											<button type="button" class="pagination__link  is--active  is--size  is--filter"><span>42</span></a>
										</li>
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>44</span></a>
										</li>		
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>46</span></a>
										</li>	
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>48</span></a>
										</li>	
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>50</span></a>
										</li>
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>52</span></a>
										</li>
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>54</span></a>
										</li>		
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>56</span></a>
										</li>	
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>58</span></a>
										</li>	
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>60</span></a>
										</li>
										<li class="pagination__item  is--size  is--filter">
											<button type="button" class="pagination__link  is--size  is--filter"><span>62</span></a>
										</li>
									</ol>
								</div> 
								<div class="cabinet__filter-nav-dropdown-btn">
									<button type="button" class="btn__item  is--xs">
										<span class="btn__name">Сохранить</span>
									</button>
								</div>
							</div>		
						</li>
						<li class="cabinet__filter-nav-item  is--btn    ">
							<button type="button" class="btn-icon__btn  is--reset">	
								<span class="btn-icon__item  is--reset"><svg class="icon-svg icon-icon-reset" role="img">
									<use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg/sprite.svg#icon-reset"></use>
								</svg></span>
								<span class="btn-icon__name  is--reset">Сбросить фильтры</span>
							</button>		
						</li>
						<li class="cabinet__filter-nav-item  is--mla   ">
							<div class="cabinet__filter-nav-link">
								<div class="cabinet__filter-nav-text">
									Сортировать по:
									<div class="cabinet__filter-nav-result  is--btn">
										<button type="button" class="cabinet__filter-nav-sort  is--active">цене <div class="cabinet__filter-nav-sort-icon"><svg class="icon-svg icon-icon-sort" role="img">
											<use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg/sprite.svg#icon-sort"></use>
										</svg></div></button>
										<button type="button" class="cabinet__filter-nav-sort is--desc">попурярности <div class="cabinet__filter-nav-sort-icon"><svg class="icon-svg icon-icon-sort" role="img">
											<use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg/sprite.svg#icon-sort"></use>
										</svg></div></button>
									</div>
								</div>
							</div>	
						</li>
					</ul>
				</div> 
			</div> 
		</div>
		*/
		?>
		
		<?
		if(count($arResult['ITEMS'])) {
		?>
		<div class="content-block__elem    ">
			<div class="content-block__row row  is--gutter-lg    ">
				
				<?
				foreach($arResult['ITEMS'] as $item) {
				?>
				<div class="content-block__cols cols      is--grid-3">	
					<?
					$APPLICATION->IncludeComponent(
						AZBN__NS . ':' . 'catalog.element',
						'in_list',
						Array(
							'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
							'ITEM' => $item,
						)
					);
					/*
					<div class="card-item__card  is--catalog">	
						<a href="<?=AZBN__ROOT;?>/amadeus/catalog-card.html" class="card-item__preview  is--catalog">
							<img src="<?=SITE_TEMPLATE_PATH;?>/img/temp/card-catalog-lock.jpg" alt="Жакет" class="img-responsive">
							<div class="card-item__bg  is--catalog">
								<div class="card-item__bg-view  is--catalog">Подробнее</div>
							</div>
						</a>	
						<div class="card-item__heading  is--catalog"><a href="<?=AZBN__ROOT;?>/amadeus/catalog-card.html">Жакет</a></div>
						<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
						<!--
						<div class="card-item__elem  is--status  is--catalog">Новинка</div>
						<div class="card-item__elem  is--status  is--catalog">Скидка</div>
						<div class="card-item__elem  is--status  is--catalog">  </div>
						-->
					</div>
					*/
					?>
				</div>
				<?
				}
				?>
				
			</div>
		</div>
		<div class="content-block__elem    ">
			
			<?
			
			$APPLICATION->IncludeComponent(
				AZBN__NS . ':' . 'pagination',
				'',
				Array(
					
				)
			);
			
			/*
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
			*/
			?>
			
		</div>
		<?
		}
		?>
		
	</div>
</main>

<?

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();