$(function(){
    $('body').on('click', '.form__card-cols.is--range', function(){
        var container = $(this).parents('.cabinet__filter-nav-item'),
            minPrice = container.find('.min-price.form__control').val(),
            maxPrice = container.find('.max-price.form__control').val(),
            result = '';
        if (minPrice == '') minPrice = 0;
        if (maxPrice == '') maxPrice = 0;
        result = minPrice + ' - ' + maxPrice;
        console.log(1);
        container.find('.cabinet__filter-nav-result').text(result);
        return false;
    });
    $('body').on('click', '.pagination__link.is--size.is--filter', function(){
        var container = $(this).parents('.cabinet__filter-nav-item'),
            input = $(this).find('input'),
            result = '';
        if (input.is(":checked"))
            $(this).find('input').attr('checked', false);
        else
            $(this).find('input').attr('checked', true);
        $(this).toggleClass('is--active');
        $(this).parents('.pagination__item.is--size.is--filter').toggleClass('is--active');
        $('.pagination__link.is--size.is--filter').each(function(){
            if ($(this).find('input').is(":checked")) {
                if (result == '')
                    result = parseInt($(this).find('.bx-filter-param-text').text());
                else
                    result += ', ' + parseInt($(this).find('.bx-filter-param-text').text());
            }
        });
        container.find('.cabinet__filter-nav-result').text(result);
        return false;
    });
});