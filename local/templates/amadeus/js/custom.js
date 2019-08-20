BX.ready(function () {


    BX.bindDelegate(document.body, 'click', {className: 'navbar__nav-top-item'}, function () {
        var role = $(this).find('.navbar__nav-top-link').data('role'),
            cookieParams = {expires: 3600, path: '/'};
        BX.setCookie('roleValue', role, cookieParams);
        if (!this.classList.contains('current')) {
            BX.setCookie('role', 'N', cookieParams);
        } else {
            BX.setCookie('role', 'Y', cookieParams);
        }
    });

    BX.bindDelegate(document.body, 'click', {className: 'navbar__nav-link'}, function () {
        if (this.classList.contains('disabled')) {
            var customerRole = document.querySelector('.navbar__nav-top-item.enabled').textContent.toLowerCase();

            var content = BX.create(
                'div',
                {
                    'props': {
                        className: 'basketNotify__text'
                    },
                    text: 'Пожалуйста, авторизуйтесь как ' + customerRole + ' для доступа к этому разделу!'
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
                    }),
                    new BX.PopupWindowButton({
                        text: "Зарегистрироваться",
                        className: "basketNotify__basket",
                        events: {
                            click: function () {
                                window.location.href = '/personal/?register=yes';
                            }
                        }
                    })
                ]
            });
            popup.show();
            return false;
        }
    });
});