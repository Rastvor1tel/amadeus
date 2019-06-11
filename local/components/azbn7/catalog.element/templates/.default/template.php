<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as BX__Loc;

BX__Loc::loadMessages(__FILE__);

$__frame = $this->createFrame('_' . md5(__FILE__), false)->begin('');//'Loading...'

//azbn_ed($arResult['PREVIEW_PICTURE']);

?>

<main class="content-block__panel  is--catalog-card">
	<div class="content-block__elem  is--left  is--catalog-card">
		<div class="content-block__container container  is--left  is--catalog-card">
			<div class="content-block__slick  is--slider  is--catalog-card" data-slider-slick="slick-catalog">
				<div class="content-block__slick-item  is--slider  is--catalog-card">
					<a href="<?=$arResult['DETAIL_PICTURE'];?>" class="content-block__preview  is--slider  is--catalog-card" data-fancybox="cat-gallery">
						<img src="<?=$arResult['DETAIL_PICTURE'];?>" class="img-responsive" alt="">
					</a>
				</div>
				<!--<div class="content-block__slick-item  is--slider  is--catalog-card">
					<a href="https://amadeus-family.ru/upload/iblock/77c/77c7df4d91099b5f8eb3c125f73c930e.jpg" class="content-block__preview  is--slider  is--catalog-card" data-fancybox="cat-gallery"><img src="https://amadeus-family.ru/upload/iblock/77c/77c7df4d91099b5f8eb3c125f73c930e.jpg" class="img-responsive" alt=""></a>
				</div>-->
			</div>
			<div class="content-block__slick  is--catalog-card" data-slider-slick="slick-catalog-nav">	
				<div class="content-block__slick-item  is--slider-nav  is--catalog-card">
					<div class="content-block__preview  is--slider-nav  is--catalog-card"><img src="<?=$arResult['DETAIL_PICTURE'];?>" class="img-responsive" alt=""></div>
				</div>
				<!--<div class="content-block__slick-item  is--slider-nav  is--catalog-card">
					<div class="content-block__preview  is--slider-nav  is--catalog-card"><img src="https://amadeus-family.ru/upload/iblock/77c/77c7df4d91099b5f8eb3c125f73c930e.jpg" class="img-responsive" alt=""></div>
				</div>-->
			</div>
		</div>
	</div>
	<div class="content-block__elem  is--right  is--catalog-card">
		<div class="content-block__container container  is--right  is--catalog-card">
			<div class="page-header__group  is--h1">	
				<div class="breadcrumb__block    ">
					<ul class="breadcrumb__list    ">
						<li class="breadcrumb__list-item">
							<a href="<?=AZBN__ROOT;?>/" class="breadcrumb__list-link">Главная</a>
						</li>		
						<li class="breadcrumb__list-item">
							<a href="<?=AZBN__ROOT;?><?=$arResult['SECTION']['SECTION_PAGE_URL'];?>" class="breadcrumb__list-link"><?=$arResult['SECTION']['NAME'];?></a>
						</li>
						<li class="breadcrumb__list-item  is--active">
							<span class="breadcrumb__list-link"><?=$arResult['ITEM']['NAME'];?></span>
						</li>
					</ul>
				</div>	
				<div class="page-header__panel  is--h1">
					<h1  class="page-header__heading  is--h1"><?=$arResult['ITEM']['NAME'];?></h1>		
				</div>
			</div>		
			<div class="content-block__elem  is--catalog-card">	
				<div class="card-item__card  is--catalog-page">		
					<form action="" class="card-item__elem  is--form  is--catalog-page">
						<div class="card-item__elem  is--color  is--catalog-page">
							<div class="card-item__elem  is--cost-heading  is--catalog-page">	
								Цена:
							</div>
							<div class="card-item__elem  is--cost-num  is--catalog-page">
								3 150 ₽
							</div>
						</div>
						<div class="card-item__elem  is--color  is--catalog-page">	
							<div class="card-item__elem  is--color-heading  is--catalog-page">	
								Цвет:
							</div>
							<div class="card-item__elem  is--color-list  is--catalog-page">
								<div class="form__item  is--catalog-page    ">
									<select     class="form__control form-control validate[  ]  is--select  is--catalog-page        " id="color[select]" name="f[select]">
										<option>Выберите цвет:</option><option>Красный</option><option>Синий</option><option>Вишневый ликер</option><option>Георгин + черный</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-item__elem  is--size  is--catalog-page">	
							<div class="card-item__elem  is--size-heading  is--catalog-page">	
								Размер:
							</div>
							<div class="card-item__elem  is--size-row  is--catalog-page">
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        " disabled name="size[38]" id="38">
											<div class="form__size-name    ">38</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[40]" id="40">
											<div class="form__size-name    ">40</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[42]" id="42">
											<div class="form__size-name    ">42</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[44]" id="44">
											<div class="form__size-name    ">44</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        " disabled name="size[44]" id="44">
											<div class="form__size-name    ">46</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[44]" id="44">
											<div class="form__size-name    ">48</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[44]" id="44">
											<div class="form__size-name    ">50</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
								<div class="card-item__elem  is--size-cols  is--catalog-page">
									<div class="form__size-block        " title="{{block_title}}">
										<label class="form__size    ">
											<input type="checkbox" class="form__size-input        "    name="size[44]" id="44">
											<div class="form__size-name    ">52</div>
											<button type="button" class="form__size-qty-btn  is--plus        " data-action="+">
												<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M6.9967 14a.6364.6364 0 0 0 .6388-.6385v-5.723h5.7257A.6365.6365 0 0 0 14 7a.6365.6365 0 0 0-.6388-.6385H7.6355V.6385A.6364.6364 0 0 0 6.9967 0c-.1739 0-.3378.0702-.4515.1839a.6226.6226 0 0 0-.184.4512v5.723H.6357c-.174 0-.3378.0703-.4515.184-.1171.117-.1873.274-.184.4512 0 .3544.2843.6385.6388.6385l5.719.0067v5.723c0 .3544.2843.6385.6388.6385z"/></svg>
											</button>	
											<input type="number" class="form__size-qty-input        " value="0">
											<button type="button" class="form__size-qty-btn  is--minus        " data-action="-">
												<svg width="14" height="2" xmlns="http://www.w3.org/2000/svg"><path d="M.6385 1.277A.6363.6363 0 0 1 0 .6385.6363.6363 0 0 1 .6385 0h5.723l1.2803.0033h5.7231a.6226.6226 0 0 1 .4512.1839c.1137.1137.1839.2775.1839.4513a.6363.6363 0 0 1-.6385.6385H.6385z"/></svg>			
											</button>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="card-item__elem  is--btn  is--catalog-page">
							<button type="button" class="btn-link__item    " data-toggle="modal" data-target="#modal-size">
								<span class="btn-link__name">Таблица размеров</span>
							</button>
						</div>
						<!--<div class="card-item__elem  is--qty  is--catalog-page">	
								<div class="card-item__elem  is--qty-heading  is--catalog-page">	
									Количество:
								</div>
								<div class="form__item  is--qty        ">
									<div class="form__qty            ">
										<button type="button" class="form__qty-btn            ">
											<svg viewBox="0 0 40 41" xmlns="http://www.w3.org/2000/svg"><path d="M40 20.1419C40 31.1876 31.0457 40.1419 20 40.1419C8.95431 40.1419 0 31.1876 0 20.1419C0 9.09618 8.95431 0.141876 20 0.141876C31.0457 0.141876 40 9.09618 40 20.1419Z" class="form__qty-btn-bg            "/><path d="M28.753 19.2632C29.2406 19.2632 29.6317 19.6543 29.6317 20.1419C29.6317 20.6296 29.2406 21.0206 28.753 21.0206L20.8771 21.0206L19.1152 21.016L11.2393 21.016C10.9955 21.0206 10.7747 20.9194 10.6183 20.763C10.4618 20.6066 10.3652 20.3811 10.3652 20.1419C10.3652 19.6543 10.7563 19.2632 11.2439 19.2632H28.753Z" class="form__qty-btn-icon            "/></svg>
										</button>	
										<input type="number" class="form__qty-input            " value="1">
										<button type="button" class="form__qty-btn            ">
											<svg viewBox="0 0 40 41" xmlns="http://www.w3.org/2000/svg"><path d="M40 20.1419C40 31.1876 31.0457 40.1419 20 40.1419C8.95431 40.1419 0 31.1876 0 20.1419C0 9.09618 8.95431 0.141876 20 0.141876C31.0457 0.141876 40 9.09618 40 20.1419Z" class="form__qty-btn-bg            "/><path d="M29.6317 20.1415C29.6317 19.6538 29.2406 19.2628 28.753 19.2628L20.8771 19.2628V11.3869C20.8771 10.8993 20.4861 10.5083 19.9984 10.5083C19.5108 10.5083 19.1198 10.8993 19.1198 11.3869V19.2628L11.2439 19.2628C10.7563 19.2628 10.3652 19.6538 10.3652 20.1415C10.3652 20.3807 10.4618 20.6061 10.6183 20.7625C10.7747 20.9189 10.9955 21.0202 11.2393 21.0156L19.1152 21.0156L19.1152 28.8914C19.1152 29.1306 19.2118 29.3561 19.3682 29.5125C19.5292 29.6735 19.7454 29.7701 19.9892 29.7655C20.4769 29.7655 20.8679 29.3745 20.8679 28.8868L20.8771 21.0202L28.753 21.0202C29.2406 21.0202 29.6317 20.6291 29.6317 20.1415Z" class="form__qty-btn-icon            "/></svg>			
										</button>
									</div>
								</div>
						</div>-->
						<div class="card-item__elem  is--cost  is--catalog-page">	
							<div class="card-item__row row  is--gutter  is--cost  is--catalog-page">	
								<div class="card-item__cols cols  is--cost  is--catalog-page">	
									<div class="card-item__elem  is--cost-heading  is--catalog-page">	
										Всего товаров:
									</div>
									<div class="card-item__elem  is--cost-num  is--catalog-page">
										3	
										<!-- 
										<div class="card-item__elem  is--cost-old  is--catalog-page">
											3 150 ₽	
										</div>	 -->
									</div>
								</div>
								<div class="card-item__cols cols  is--cost  is--catalog-page">	
									<div class="card-item__elem  is--cost-heading  is--catalog-page">	
										Итоговая стоимсоть:
									</div>
									<div class="card-item__elem  is--cost-num  is--catalog-page">
										3 150 ₽
									</div>
								</div>
								<div class="card-item__cols cols  is--cost-btn  is--catalog-page">
									<button type="button" class="btn__item    ">
										<span class="btn__name">В корзину</span>
									</button>	
								</div>
							</div>
						</div>
					</form>
					<div class="card-item__elem  is--note  is--catalog-page">	
						<div class="tabs__panel">
							<div class="tabs__nav-wrap    ">
								<ul class="tabs__nav    ">
									<li class="tabs__item     active">
										<a class="tabs__link    " href="#tabs-card1" data-toggle="tab"><span>Описание</span></a>
									</li>
									<li class="tabs__item    ">
										<a class="tabs__link    " href="#tabs-card2" data-toggle="tab"><span>Доставка и оплата</span></a>
									</li>
									<li class="tabs__item    ">
										<a class="tabs__link    " href="#tabs-card3" data-toggle="tab"><span>Возврат и гарантия</span></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="tabs__pane  text__block  active" id="tabs-card1">
							<p>Артикул: <b>Д-1552</b></p>
							<p>Состав: <b>30% шерсть, 70% пан</b></p>
							<p>Двуцветное платье, с&nbsp;декоративными кармашками. Оригинальность изделию придает планка с&nbsp;пуговицами. Модель стандартной длины до&nbsp;колена, круглый вырез.</p>
						</div>
						<div class="tabs__pane" id="tabs-card2">
							<p>Оплатить свой заказ вы&nbsp;можете одним из&nbsp;наиболее удобных вам способов:</p>
							<ul> 
								<li>переводом на&nbsp;наш расчетный счет;</li>
								<li>наличными при самовывозе (наложенный платеж).</li>
							</ul>
							<p>Подробнее смотрите на&nbsp;странице Условия сотрудничества</p>
						</div>
						<div class="tabs__pane" id="tabs-card3">
							<p>Товар с&nbsp;выявленным производственным дефектом принимается к&nbsp;обмену (в&nbsp;течение 2&nbsp;недель с&nbsp;момента оплаты). Требования к&nbsp;обмену продукции: товар должен быть предъявлен в&nbsp;чистом виде, он&nbsp;не&nbsp;должен быть использованным, должен быть сохранен товарный вид, все фабричные ярлыки, этикетки и&nbsp;комплектующие, а&nbsp;также документы, подтверждающие оплату продукции.</p>
							<p>Обмен продукции с&nbsp;производственным дефектом принимается строго в&nbsp;пределах сезона (модели сезона весна-лето&nbsp;— на&nbsp;модели этого&nbsp;же сезона, модели сезона осень-зима&nbsp;— на&nbsp;модели этого&nbsp;же сезона).</p>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</main>

<div class="content-block__panel  is--catalog-card-view  is--info-50">
	<div class="content-block__container container is--catalog-card-view">
		<div class="page-header__group  is--h2x  is--fw-500  align--center-notsmart">
			<div class="page-header__panel  is--h2x  is--fw-500  align--center-notsmart">
				<h2  class="page-header__heading  is--h2x  is--fw-500  align--center-notsmart">Вы смотрели:</h2>		
			</div>
		</div>		
		<div class="content-block__elem  is--catalog-card-view">	
			<div class="content-block__slick  is--catalog-card-view" data-slider-slick="slick-catalog-view">
				<div class="content-block__slick-item  is--catalog-card-view">	
					<div class="card-item__card  is--catalog">	
						<a href="/amadeus/catalog-card.html" class="card-item__preview  is--catalog">
							<img src="<?=SITE_TEMPLATE_PATH;?>/img/temp/card-catalog-lock.jpg" alt="Жакет" class="img-responsive">
							<div class="card-item__bg  is--catalog">
								<div class="card-item__bg-view  is--catalog">Подробнее</div>
							</div>
						</a>	
						<div class="card-item__heading  is--catalog"><a href="/amadeus/catalog-card.html">Жакет</a></div>
						<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
						<div class="card-item__elem  is--status  is--catalog">Новинка</div>
					</div>
				</div>
				<div class="content-block__slick-item  is--catalog-card-view">
					<div class="card-item__card  is--catalog">	
						<a href="/amadeus/catalog-card.html" class="card-item__preview  is--catalog">
							<img src="http://via.placeholder.com/500x690" alt="Жакет" class="img-responsive">
							<div class="card-item__bg  is--catalog">
								<div class="card-item__bg-view  is--catalog">Подробнее</div>
							</div>
						</a>	
						<div class="card-item__heading  is--catalog"><a href="/amadeus/catalog-card.html">Жакет</a></div>
						<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
						<div class="card-item__elem  is--status  is--catalog">Скидка</div>
					</div>
				</div>
				<div class="content-block__slick-item  is--catalog-card-view">
					<div class="card-item__card  is--catalog">	
						<a href="/amadeus/catalog-card.html" class="card-item__preview  is--catalog">
							<img src="<?=SITE_TEMPLATE_PATH;?>/img/temp/card-catalog-lock.jpg" alt="Жакет" class="img-responsive">
							<div class="card-item__bg  is--catalog">
								<div class="card-item__bg-view  is--catalog">Подробнее</div>
							</div>
						</a>	
						<div class="card-item__heading  is--catalog"><a href="/amadeus/catalog-card.html">Жакет</a></div>
						<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
						<div class="card-item__elem  is--status  is--catalog">Новинка</div>
					</div>
				</div>
				<div class="content-block__slick-item  is--catalog-card-view">
					<div class="card-item__card  is--catalog">	
						<a href="/amadeus/catalog-card.html" class="card-item__preview  is--catalog">
							<img src="http://via.placeholder.com/500x690" alt="Жакет" class="img-responsive">
							<div class="card-item__bg  is--catalog">
								<div class="card-item__bg-view  is--catalog">Подробнее</div>
							</div>
						</a>	
						<div class="card-item__heading  is--catalog"><a href="/amadeus/catalog-card.html">Жакет</a></div>
						<div class="card-item__elem  is--cost  is--catalog">Цена:&nbsp;&nbsp;<span>1 950 ₽</span></div>
						<div class="card-item__elem  is--status  is--catalog">Скидка</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<?

$__frame->end();

//Отменить композитное кеширование в любом месте страницы можно с помощью следующей инструкции:
//\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();