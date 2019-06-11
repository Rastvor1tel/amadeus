$(".form__control[type='tel']").mask("+7 (999) 999-99-99",{placeholder:"+7 (___) ___-__-__"});
$("[data-validation]").validationEngine(
	'attach', {
		promptPosition : "bottomLeft",
		//scrollOffset: 200,		
		scroll: false
	}
); 
$(document.body).on('click', '.form__btn-pass', null, function(event){
	console.log(1);
	event.preventDefault();
	
	var btn = $(this);
	
	if(btn.hasClass('is--view')) {
		$(".form__btn-pass.is--view").removeClass("is--active");
		$(".form__btn-pass.is--hide").addClass("is--active");
		$(".form__control.is--pass").attr("type","text");
	}
	
	if(btn.hasClass('is--hide')) {
		$(".form__btn-pass.is--hide").removeClass("is--active");
		$(".form__btn-pass.is--view").addClass("is--active");
		$(".form__control.is--pass").attr("type","password");
	}
	
});

$(document.body).on('click', '.form__size-qty-btn', function() {
	console.log(1);
    var action = $(this).data('action')
    var input = $(this).siblings('input[type="number"]')
    var size = $(this).siblings('.form__size-input')
    var value = input.val()
    if(action == '-' && value > 0) value--
    else if(action == '+') value++
    input.val(value)
	if(value > 0) size.prop('checked', true) 
	else size.prop('checked', false)
})