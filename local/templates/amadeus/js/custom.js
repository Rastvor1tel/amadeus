BX.ready(function () {
    BX.bindDelegate(document.body, 'click', {className: 'navbar__nav-top-item'}, function () {
        if(!this.classList.contains('is--active')) {
            var customerRole = this.getElementsByClassName('navbar__nav-top-link')[0].innerText.toLowerCase();
            BX.setCookie('customerRole', 'wrongRole', {expires: 3600});
        } else {
            BX.setCookie('customerRole', 'trueRole', {expires: 3600});
        }
    });

    BX.bindDelegate(document.body, 'mousedown', {className: 'navbar__nav-item'}, function () {
        if((!this.classList.contains('is--full')) && (BX.getCookie('customerRole') == 'wrongRole')) {
            var customerRole = this.getElementsByClassName('navbar__nav-top-link')[0].innerText.toLowerCase();
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