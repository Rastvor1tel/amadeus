BX.ready(function () {
    BX.bindDelegate(document.body, 'click', {className: 'navbar__nav-top-item'}, function () {
        var role = $(this).find('.navbar__nav-top-link').data('role');
        BX.setCookie('roleValue', role, {expires: 3600});
        if(!this.classList.contains('current')) {
            BX.setCookie('role', 'N', {expires: 3600});
        } else {
            BX.setCookie('role', 'Y', {expires: 3600});
        }
    });

    BX.bindDelegate(document.body, 'click', {className: 'navbar__nav-link'}, function () {
        if(this.classList.contains('disabled')) {
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
                    })
                ]
            });
            popup.show();
            return false;
        }
    });
});