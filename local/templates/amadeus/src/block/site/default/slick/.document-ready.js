'use strict';
$(function() { 
	var header = $('[data-slider-slick="slick-header"]');	
	var gallery = $('[data-slider-slick="slick-gallery"]');	
	var index_catalog = $('[data-slider-slick="slick-index-catalog"]');	
	var catalog = $('[data-slider-slick="slick-catalog"]');	
	var catalog_view = $('[data-slider-slick="slick-catalog-view"]');	
	var catalog_nav = $('[data-slider-slick="slick-catalog-nav"]');	
	//var CMS__TPL_PATH = '/wp-content/themes/azbn7theme';  
	var CMS__TPL_PATH = '/local/templates/amadeus';
	//var CMS__TPL_PATH = '';  
	//local
	var prevArrow = '<button type="button" class="slick-btn  is--prev"><span class="sr-only">Предыдущий слайд</span><svg class="icon-svg icon-icon-prev" role="img"><use xlink:href="'+ CMS__TPL_PATH +'/img/svg/sprite.svg#icon-prev"></use></svg></button>';
	var nextArrow = '<button type="button" class="slick-btn  is--next"><span class="sr-only">Следующий слайд</span><svg class="icon-svg icon-icon-next" role="img"><use xlink:href="'+ CMS__TPL_PATH +'/img/svg/sprite.svg#icon-next"></use></svg></button>';	
	
	$('.slick-cloned .content-block__preview').removeAttr('data-fancybox');

	header.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		dots: true,
		autoplay: true,
  		autoplaySpeed: 4000,
		prevArrow: prevArrow,
		nextArrow: nextArrow,
		fade: true 
	});
	index_catalog.slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: true,
		dots: false,
		infinite: true,
		prevArrow: prevArrow,
		nextArrow: nextArrow,
		responsive: [
		    {
				breakpoint: 1025,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
		    },
		    {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				}
		    },
		    {
				breakpoint: 565,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
		    }
		]
	});
	var tabs = $(".tabs__link");
	tabs.on('click', function(){
	    var elem = $(this);
	    var filter = elem.data('filter');
	    index_catalog.slick('slickUnfilter');
	    if(filter == 'new'){
			index_catalog.slick('slickFilter','.is--new');
	    	tabs.parent().removeClass('active');
			elem.parent().addClass('active');
	    }
	    else if(filter == 'hit'){
	     	index_catalog.slick('slickFilter','.is--hit');
	    	tabs.parent().removeClass('active');
			elem.parent().addClass('active');
	    }
	    else if(filter == 'discounts'){
	     	index_catalog.slick('slickFilter','.is--discounts');
	    	tabs.parent().removeClass('active');
			elem.parent().addClass('active');
	    }   
 	});
	index_catalog.slick('slickFilter','.is--new');


	catalog_view.slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: true,
		dots: false,
		infinite: true,
		prevArrow: prevArrow,
		nextArrow: nextArrow,
		responsive: [
		    {
				breakpoint: 1025,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
		    },
		    {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				}
		    },
		    {
				breakpoint: 565,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
		    }
		]
	});
	gallery.slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: true,
		dots: true,
		infinite: true,
		prevArrow: prevArrow,
		nextArrow: nextArrow,
		responsive: [
		    {
				breakpoint: 1600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
		    },
		    {
				breakpoint: 768,
				settings: {
					arrows: false,
					//dots: false,
					slidesToShow: 1,
					slidesToScroll: 1,
				}
		    }
		]
	});
	catalog.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: prevArrow,
		nextArrow: nextArrow,
		fade: true,
		asNavFor: catalog_nav,
		/*responsive: [
		    {
				breakpoint: 1025,
				settings: {
					arrows: false, 
				}
		    },
		]*/
	});
	catalog_nav.slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		asNavFor: catalog,
		//centerMode: true,
		focusOnSelect: true,
		/*responsive: [
		    {
				breakpoint: 1600,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
				}
		    },
		    {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
		    }
		]*/
	});
}); 