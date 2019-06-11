var url = window.location.pathname;
//var url = window.location.href;
$('.cabinet__navbar-nav a[href="'+url+'"]').parent().addClass('is--active');
$('.cabinet__navbar-block').closest('body').addClass('is--aside-cabinet');
$('.cabinet__basket-total-bar').closest('body').addClass('is--basket-bar');
/*$(".cabinet__delivery-card").on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
	$(this).toggleClass('is--active');
});	
$(".cabinet__delivery-transport").on('click', function(e) {
	$(this).toggleClass('is--active');
});	
*/
if(screenJS.isXS()) {
	$('.cabinet__order-body').removeAttr('id');
}	
$('.cabinet__filter-nav-item.dropdown').on('click', '.cabinet__filter-nav-dropdown', function(e) {
    e.preventDefault();
    e.stopPropagation(); 
});
$('.cabinet__filter-btn-block').on('click', function(e) {
	$(this).closest('.cabinet__filter-block').toggleClass('open');
});	