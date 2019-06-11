//humb
var url = window.location.pathname;
//var url = window.location.href;
$('.aside__nav a[href="'+url+'"]').parent().addClass('is--active');
$('.aside__dropdown [data-toggle="dropdown"]').on('click', function(e) {
	e.preventDefault();
	e.stopPropagation();
	$(this).parent().siblings().removeClass('open');
	$(this).parent().toggleClass('open');
});
$('.aside__nav').closest('body').addClass('is--aside-navbar');