function number_format(c, a, b, e) {
    c = (c + "").replace(/[^0-9+\-Ee.]/g, "");
    c = isFinite(+c) ? +c : 0;
    a = isFinite(+a) ? Math.abs(a) : 0;
    e = "undefined" === typeof e ? "," : e;
    b = "undefined" === typeof b ? "." : b;
    var d = "";
    d = function(a, b) {
        var d = Math.pow(10, b);
        return "" + (Math.round(a * d) / d).toFixed(b);
    };
    d = (a ? d(c, a) : "" + Math.round(c)).split(".");
    3 < d[0].length && (d[0] = d[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, e));
    (d[1] || "").length < a && (d[1] = d[1] || "", d[1] += Array(a - d[1].length + 1).join("0"));
    return d.join(b);
}

BX.ready(function() {
    BX.bindDelegate(
        document.body, 'change', {className: 'color-list__select'},
        function () {
            var price = $(this).find(':selected').data('price'),
                formatedPrice = number_format(price, 0, ',',' ') + ' ₽',
                data = {
                    type: 'sizeList',
                    iblockID: BX.message('iblockID'),
                    productID: BX.message('productID'),
                    colorID: this.value
                };
            BX.ajax({
                url: BX.message('templateFolder') + '/ajax.php',
                data: data,
                method: 'POST',
                dataType: 'html',
                onsuccess: function(response){
                    BX.adjust(BX('sizeList'), {html: response});
                    BX.adjust(BX('productPrice'), {html: formatedPrice, attrs: {'data-price': price}});
                }
            });
        }
    );
    BX.bindDelegate(
        document.body, 'click', {className: 'buyBtn'},
        function() {
            var quantity = $('#productsQuantity').text();
            if(quantity > 0) {
                var data = {
                    type: 'ADD2BASKET',
                    products: []
                };

                $('.card-item__elem.sizeBlock.active').each(function(){
                    var productData = {
                        id: $(this).data('id'),
                        quantity: $(this).find('.form__size-qty-input').val()
                    };
                    data.products.push(productData);
                });
                BX.ajax.loadJSON(
                    BX.message('templateFolder') + '/ajax.php',
                    data,
                    function (response) {
                        var responseObj = BX.parseJSON(response);
                        var content = BX.create(
                            'div',
                            {
                                'props': {
                                    className: 'basketNotify__text'
                                },
                                text: 'Товар успешно добавлен в корзину'
                            }
                        );
                        var popup = BX.PopupWindowManager.create("basketNotify", null, {
                            content: content,
                            closeIcon: {right: "20px", top: "10px"},
                            autoHide: true,
                            overlay: {
                                backgroundColor: '#000', opacity: '60'
                            },
                            buttons: [
                                new BX.PopupWindowButton({
                                    text: "Продолжить покупки",
                                    className: "basketNotify__proceed",
                                    events: {
                                        click: function () {
                                            this.popupWindow.close();
                                        }
                                    }
                                }),
                                new BX.PopupWindowButton({
                                    text: "Перейти в корзину",
                                    className: "basketNotify__basket",
                                    events: {
                                        click: function () {
                                            window.location.href = '/personal/cart/';
                                        }
                                    }
                                })
                            ]
                        });
                        popup.show();
                        BX.adjust(BX('headerBasketCount'), {html: responseObj.basket_count});
                    }
                )
            } else {
                var content = BX.create(
                    'div',
                    {
                        'props': {
                            className: 'basketNotify__text'
                        },
                        text: 'Не выбрано ни одного товара'
                    }
                );
                var popup = BX.PopupWindowManager.create("basketNotify", null, {
                    content: content,
                    closeIcon: {right: "20px", top: "10px"},
                    autoHide: true,
                    overlay: {
                        backgroundColor: '#000', opacity: '60'
                    },
                    buttons: [
                        new BX.PopupWindowButton({
                            text: "Закрыть",
                            className: "basketNotify__proceed",
                            events: {
                                click: function () {
                                    this.popupWindow.close();
                                }
                            }
                        })
                    ]
                });
                popup.show();
            }
        }
    );
    BX.bindDelegate(
        document.body, 'click', {className: 'form__size-qty-btn'},
        function () {
            var action = $(this).data('action'),
                input = $(this).siblings('input[type="number"]'),
                size = $(this).siblings('.form__size-input'),
                sizeBlock = $(this).parents('.sizeBlock');
                quantity = parseInt($('#productsQuantity').html());
                price = parseInt($('#productPrice').data('price'));
                value = input.val();
            if(action == '-' && value > 0) {
                value--;
                quantity--;
            } else {
                if (action == '+') {
                    value++;
                    quantity++;
                }
            }
            if (value <= input.attr('max')) {
                var formattedPrice = number_format(price * quantity, 0, ',', ' ') + ' ₽';
                $('#productsQuantity').html(quantity);
                $('#offerPrice').html(formattedPrice);
                input.val(value)
                if (value > 0) {
                    size.prop('checked', true);
                    sizeBlock.addClass('active');
                } else {
                    size.prop('checked', false);
                    sizeBlock.removeClass('active');
                }
            }
        }
    );
    BX.bindDelegate(
        document.body, 'input', {className: 'form__size-qty-input'},
        function () {
            var value = $(this).val(),
                max = $(this).attr('max');
            console.log(value + '/' + max);
            if (value > max) $(this).val(max);
        }
    );
});