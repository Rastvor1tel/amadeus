"use strict";

function fecss_ScreenJS() {
    var s = this;
    s.screen = {w: 0, h: 0, type: "xs", orientation: "portrait"}, s.__resizefunctions = {
        xs: {
            default: [],
            portrait: [],
            landscape: []
        },
        sm: {default: [], portrait: [], landscape: []},
        md: {default: [], portrait: [], landscape: []},
        "md-h": {default: [], portrait: [], landscape: []},
        lg: {default: [], portrait: [], landscape: []},
        xl: {default: [], portrait: [], landscape: []},
        device: {default: [], portrait: [], landscape: []},
        deviceLg: {default: [], portrait: [], landscape: []},
        pc: {default: [], portrait: [], landscape: []},
        screenLG: {default: [], portrait: [], landscape: []},
        xxl: {default: [], portrait: [], landscape: []}
    }, s.isXS = function () {
        return s.screen.w < 768
    }, s.isSM = function () {
        return 767 < s.screen.w && s.screen.w < 1025
    }, s.isMD = function () {
        return 1024 < s.screen.w && s.screen.w < 1200
    }, s.isMDH = function () {
        return 1024 < s.screen.w && s.screen.w < 1281 && 909 < s.screen.h
    }, s.deviceLg = function () {
        return s.screen.w < 1200
    }, s.isLG = function () {
        return 1199 < s.screen.w && s.screen.w < 1400
    }, s.isXL = function () {
        return 1399 < s.screen.w && s.screen.w < 1681
    }, s.isXXL = function () {
        return 1680 < s.screen.w
    }, s.device = function () {
        return s.screen.w < 1010
    }, s.screenLG = function () {
        return 1199 < s.screen.w
    }, s.pc = function () {
        return 1024 < s.screen.w
    }, s.screenIs = function () {
        var t = "noname";
        return s.isXS() ? t = "xs" : s.isSM() ? t = "sm" : s.isMD() ? t = "md" : s.isMDH() ? t = "md-h" : s.isLG() ? t = "lg" : s.isXL() ? t = "xl" : s.isXXL() ? t = "xxl" : s.device() ? t = "device" : s.pc() ? t = "pc" : s.deviceLg() && (t = "deviceLg"), t
    }, s.isPortrait = function () {
        return s.screen.h > s.screen.w
    }, s.isLandscape = function () {
        return s.screen.w > s.screen.h
    }, s.orientationIs = function () {
        var t = "noname";
        return s.isPortrait() ? t = "portrait" : s.isLandscape() && (t = "landscape"), t
    }, s.is = function (t) {
        return t == s.screenIs() || t == s.orientationIs()
    }, s.onResize = function (t, e) {
        if (t.type) {
            var i = s.__resizefunctions[t.type];
            t.orientation ? i[t.orientation].push(e) : i.default.push(e)
        }
    }, s.resizeCall = function (t) {
        if (t.type) {
            if (s.__resizefunctions[t.type].default) for (var e = 0; e < s.__resizefunctions[t.type].default.length; e++) (0, s.__resizefunctions[t.type].default[e])(t);
            if (s.__resizefunctions[t.type][t.orientation]) for (e = 0; e < s.__resizefunctions[t.type][t.orientation].length; e++) (0, s.__resizefunctions[t.type][t.orientation][e])(t)
        }
    }, s.setScreen = function () {
        return s.screen.w = $(window).outerWidth(!0), s.screen.h = $(window).outerHeight(!0), s.screen.type = s.screenIs(), s.screen.orientation = s.orientationIs(), s.resizeCall(s.screen), console.log(s.screen), s.screen
    }
}

window.onerror = function (t, e, i, s, o) {
    console.log("Error FECSS: " + e + ":" + i + ":" + s + ": " + JSON.stringify(t) + "\n" + JSON.stringify(o))
} + function (s) {
    s.fn.emulateTransitionEnd = function (t) {
        var e = !1, i = this;
        s(this).one("bsTransitionEnd", function () {
            e = !0
        });
        return setTimeout(function () {
            e || s(i).trigger(s.support.transition.end)
        }, t), this
    }, s(function () {
        s.support.transition = function () {
            var t = document.createElement("bootstrap"), e = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
            for (var i in e) if (void 0 !== t.style[i]) return {end: e[i]};
            return !1
        }(), s.support.transition && (s.event.special.bsTransitionEnd = {
            bindType: s.support.transition.end,
            delegateType: s.support.transition.end,
            handle: function (t) {
                if (s(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
            }
        })
    })
}(jQuery), function (a) {
    var r = function (t, e) {
        this.$element = a(t), this.options = a.extend({}, r.DEFAULTS, e), this.$trigger = a('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
    };

    function o(t) {
        var e, i = t.attr("data-target") || (e = t.attr("href")) && e.replace(/.*(?=#[^\s]+$)/, "");
        return a(i)
    }

    function l(s) {
        return this.each(function () {
            var t = a(this), e = t.data("bs.collapse"),
                i = a.extend({}, r.DEFAULTS, t.data(), "object" == typeof s && s);
            !e && i.toggle && /show|hide/.test(s) && (i.toggle = !1), e || t.data("bs.collapse", e = new r(this, i)), "string" == typeof s && e[s]()
        })
    }

    r.VERSION = "3.3.7", r.TRANSITION_DURATION = 350, r.DEFAULTS = {toggle: !0}, r.prototype.dimension = function () {
        return this.$element.hasClass("width") ? "width" : "height"
    }, r.prototype.show = function () {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var t, e = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
            if (!(e && e.length && (t = e.data("bs.collapse")) && t.transitioning)) {
                var i = a.Event("show.bs.collapse");
                if (this.$element.trigger(i), !i.isDefaultPrevented()) {
                    e && e.length && (l.call(e, "hide"), t || e.data("bs.collapse", null));
                    var s = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[s](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                    var o = function () {
                        this.$element.removeClass("collapsing").addClass("collapse in")[s](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                    };
                    if (!a.support.transition) return o.call(this);
                    var n = a.camelCase(["scroll", s].join("-"));
                    this.$element.one("bsTransitionEnd", a.proxy(o, this)).emulateTransitionEnd(r.TRANSITION_DURATION)[s](this.$element[0][n])
                }
            }
        }
    }, r.prototype.hide = function () {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var t = a.Event("hide.bs.collapse");
            if (this.$element.trigger(t), !t.isDefaultPrevented()) {
                var e = this.dimension();
                this.$element[e](this.$element[e]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                var i = function () {
                    this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                if (!a.support.transition) return i.call(this);
                this.$element[e](0).one("bsTransitionEnd", a.proxy(i, this)).emulateTransitionEnd(r.TRANSITION_DURATION)
            }
        }
    }, r.prototype.toggle = function () {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    }, r.prototype.getParent = function () {
        return a(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(a.proxy(function (t, e) {
            var i = a(e);
            this.addAriaAndCollapsedClass(o(i), i)
        }, this)).end()
    }, r.prototype.addAriaAndCollapsedClass = function (t, e) {
        var i = t.hasClass("in");
        t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
    };
    var t = a.fn.collapse;
    a.fn.collapse = l, a.fn.collapse.Constructor = r, a.fn.collapse.noConflict = function () {
        return a.fn.collapse = t, this
    }, a(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (t) {
        var e = a(this);
        e.attr("data-target") || t.preventDefault();
        var i = o(e), s = i.data("bs.collapse") ? "toggle" : e.data();
        l.call(i, s)
    })
}(jQuery), function (a) {
    var r = '[data-toggle="dropdown"]', s = function (t) {
        a(t).on("click.bs.dropdown", this.toggle)
    };

    function l(t) {
        var e = t.attr("data-target");
        e || (e = (e = t.attr("href")) && /#[A-Za-z]/.test(e) && e.replace(/.*(?=#[^\s]*$)/, ""));
        var i = e && a(e);
        return i && i.length ? i : t.parent()
    }

    function n(s) {
        s && 3 === s.which || (a(".dropdown-backdrop").remove(), a(r).each(function () {
            var t = a(this), e = l(t), i = {relatedTarget: this};
            e.hasClass("open") && (s && "click" == s.type && /input|textarea/i.test(s.target.tagName) && a.contains(e[0], s.target) || (e.trigger(s = a.Event("hide.bs.dropdown", i)), s.isDefaultPrevented() || (t.attr("aria-expanded", "false"), e.removeClass("open").trigger(a.Event("hidden.bs.dropdown", i)))))
        }))
    }

    s.VERSION = "3.3.7", s.prototype.toggle = function (t) {
        var e = a(this);
        if (!e.is(".disabled, :disabled")) {
            var i = l(e), s = i.hasClass("open");
            if (n(), !s) {
                "ontouchstart" in document.documentElement && !i.closest(".navbar-nav").length && a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click", n);
                var o = {relatedTarget: this};
                if (i.trigger(t = a.Event("show.bs.dropdown", o)), t.isDefaultPrevented()) return;
                e.trigger("focus").attr("aria-expanded", "true"), i.toggleClass("open").trigger(a.Event("shown.bs.dropdown", o))
            }
            return !1
        }
    }, s.prototype.keydown = function (t) {
        if (/(38|40|27|32)/.test(t.which) && !/input|textarea/i.test(t.target.tagName)) {
            var e = a(this);
            if (t.preventDefault(), t.stopPropagation(), !e.is(".disabled, :disabled")) {
                var i = l(e), s = i.hasClass("open");
                if (!s && 27 != t.which || s && 27 == t.which) return 27 == t.which && i.find(r).trigger("focus"), e.trigger("click");
                var o = i.find(".dropdown-menu li:not(.disabled):visible a");
                if (o.length) {
                    var n = o.index(t.target);
                    38 == t.which && 0 < n && n--, 40 == t.which && n < o.length - 1 && n++, ~n || (n = 0), o.eq(n).trigger("focus")
                }
            }
        }
    };
    var t = a.fn.dropdown;
    a.fn.dropdown = function (i) {
        return this.each(function () {
            var t = a(this), e = t.data("bs.dropdown");
            e || t.data("bs.dropdown", e = new s(this)), "string" == typeof i && e[i].call(t)
        })
    }, a.fn.dropdown.Constructor = s, a.fn.dropdown.noConflict = function () {
        return a.fn.dropdown = t, this
    }, a(document).on("click.bs.dropdown.data-api", n).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
        t.stopPropagation()
    }).on("click.bs.dropdown.data-api", r, s.prototype.toggle).on("keydown.bs.dropdown.data-api", r, s.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", s.prototype.keydown)
}(jQuery), function (n) {
    var a = function (t, e) {
        this.options = e, this.$body = n(document.body), this.$element = n(t), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, n.proxy(function () {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };

    function r(s, o) {
        return this.each(function () {
            var t = n(this), e = t.data("bs.modal"), i = n.extend({}, a.DEFAULTS, t.data(), "object" == typeof s && s);
            e || t.data("bs.modal", e = new a(this, i)), "string" == typeof s ? e[s](o) : i.show && e.show(o)
        })
    }

    a.VERSION = "3.3.7", a.TRANSITION_DURATION = 300, a.BACKDROP_TRANSITION_DURATION = 150, a.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, a.prototype.toggle = function (t) {
        return this.isShown ? this.hide() : this.show(t)
    }, a.prototype.show = function (i) {
        var s = this, t = n.Event("show.bs.modal", {relatedTarget: i});
        this.$element.trigger(t), this.isShown || t.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', n.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
            s.$element.one("mouseup.dismiss.bs.modal", function (t) {
                n(t.target).is(s.$element) && (s.ignoreBackdropClick = !0)
            })
        }), this.backdrop(function () {
            var t = n.support.transition && s.$element.hasClass("fade");
            s.$element.parent().length || s.$element.appendTo(s.$body), s.$element.show().scrollTop(0), s.adjustDialog(), t && s.$element[0].offsetWidth, s.$element.addClass("in"), s.enforceFocus();
            var e = n.Event("shown.bs.modal", {relatedTarget: i});
            t ? s.$dialog.one("bsTransitionEnd", function () {
                s.$element.trigger("focus").trigger(e)
            }).emulateTransitionEnd(a.TRANSITION_DURATION) : s.$element.trigger("focus").trigger(e)
        }))
    }, a.prototype.hide = function (t) {
        t && t.preventDefault(), t = n.Event("hide.bs.modal"), this.$element.trigger(t), this.isShown && !t.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), n(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), n.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", n.proxy(this.hideModal, this)).emulateTransitionEnd(a.TRANSITION_DURATION) : this.hideModal())
    }, a.prototype.enforceFocus = function () {
        n(document).off("focusin.bs.modal").on("focusin.bs.modal", n.proxy(function (t) {
            document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
        }, this))
    }, a.prototype.escape = function () {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", n.proxy(function (t) {
            27 == t.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }, a.prototype.resize = function () {
        this.isShown ? n(window).on("resize.bs.modal", n.proxy(this.handleUpdate, this)) : n(window).off("resize.bs.modal")
    }, a.prototype.hideModal = function () {
        var t = this;
        this.$element.hide(), this.backdrop(function () {
            t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
        })
    }, a.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, a.prototype.backdrop = function (t) {
        var e = this, i = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var s = n.support.transition && i;
            if (this.$backdrop = n(document.createElement("div")).addClass("modal-backdrop " + i).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", n.proxy(function (t) {
                this.ignoreBackdropClick ? this.ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())
            }, this)), s && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !t) return;
            s ? this.$backdrop.one("bsTransitionEnd", t).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : t()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var o = function () {
                e.removeBackdrop(), t && t()
            };
            n.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", o).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : o()
        } else t && t()
    }, a.prototype.handleUpdate = function () {
        this.adjustDialog()
    }, a.prototype.adjustDialog = function () {
        var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
        })
    }, a.prototype.resetAdjustments = function () {
        this.$element.css({paddingLeft: "", paddingRight: ""})
    }, a.prototype.checkScrollbar = function () {
        var t = window.innerWidth;
        if (!t) {
            var e = document.documentElement.getBoundingClientRect();
            t = e.right - Math.abs(e.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
    }, a.prototype.setScrollbar = function () {
        var t = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
    }, a.prototype.resetScrollbar = function () {
        this.$body.css("padding-right", this.originalBodyPad)
    }, a.prototype.measureScrollbar = function () {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure", this.$body.append(t);
        var e = t.offsetWidth - t.clientWidth;
        return this.$body[0].removeChild(t), e
    };
    var t = n.fn.modal;
    n.fn.modal = r, n.fn.modal.Constructor = a, n.fn.modal.noConflict = function () {
        return n.fn.modal = t, this
    }, n(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (t) {
        var e = n(this), i = e.attr("href"), s = n(e.attr("data-target") || i && i.replace(/.*(?=#[^\s]+$)/, "")),
            o = s.data("bs.modal") ? "toggle" : n.extend({remote: !/#/.test(i) && i}, s.data(), e.data());
        e.is("a") && t.preventDefault(), s.one("show.bs.modal", function (t) {
            t.isDefaultPrevented() || s.one("hidden.bs.modal", function () {
                e.is(":visible") && e.trigger("focus")
            })
        }), r.call(s, o, this)
    })
}(jQuery), function (r) {
    var a = function (t) {
        this.element = r(t)
    };

    function e(i) {
        return this.each(function () {
            var t = r(this), e = t.data("bs.tab");
            e || t.data("bs.tab", e = new a(this)), "string" == typeof i && e[i]()
        })
    }

    a.VERSION = "3.3.7", a.TRANSITION_DURATION = 150, a.prototype.show = function () {
        var t = this.element, e = t.closest("ul:not(.dropdown-menu)"), i = t.data("target");
        if (i || (i = (i = t.attr("href")) && i.replace(/.*(?=#[^\s]*$)/, "")), !t.parent("li").hasClass("active")) {
            var s = e.find(".active:last a"), o = r.Event("hide.bs.tab", {relatedTarget: t[0]}),
                n = r.Event("show.bs.tab", {relatedTarget: s[0]});
            if (s.trigger(o), t.trigger(n), !n.isDefaultPrevented() && !o.isDefaultPrevented()) {
                var a = r(i);
                this.activate(t.closest("li"), e), this.activate(a, a.parent(), function () {
                    s.trigger({type: "hidden.bs.tab", relatedTarget: t[0]}), t.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: s[0]
                    })
                })
            }
        }
    }, a.prototype.activate = function (t, e, i) {
        var s = e.find("> .active"),
            o = i && r.support.transition && (s.length && s.hasClass("fade") || !!e.find("> .fade").length);

        function n() {
            s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), t.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), o ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade"), t.parent(".dropdown-menu").length && t.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), i && i()
        }

        s.length && o ? s.one("bsTransitionEnd", n).emulateTransitionEnd(a.TRANSITION_DURATION) : n(), s.removeClass("in")
    };
    var t = r.fn.tab;
    r.fn.tab = e, r.fn.tab.Constructor = a, r.fn.tab.noConflict = function () {
        return r.fn.tab = t, this
    };
    var i = function (t) {
        t.preventDefault(), e.call(r(this), "show")
    };
    r(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', i).on("click.bs.tab.data-api", '[data-toggle="pill"]', i), r('[data-toggle="tab-dropdown"]').on("click.bs.tab.data-api", i)
}(jQuery), function (m, g, v, b) {
    if (!v) return;
    var t, o = {
        speed: 330,
        loop: !0,
        opacity: "auto",
        margin: [44, 0],
        gutter: 30,
        infobar: !0,
        buttons: !0,
        slideShow: !0,
        fullScreen: !0,
        thumbs: !0,
        closeBtn: !0,
        smallBtn: "auto",
        image: {preload: "auto", protect: !1},
        ajax: {settings: {data: {fancybox: !0}}},
        iframe: {
            tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
            preload: !0,
            scrolling: "no",
            css: {}
        },
        baseClass: "",
        slideClass: "",
        baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-controls"><div class="fancybox-infobar"><div class="fancybox-infobar__body"><span class="js-fancybox-index"></span>&nbsp;/&nbsp;<span class="js-fancybox-count"></span></div></div><div class="fancybox-buttons"><button data-fancybox-close class="fancybox-button fancybox-button--close" title="Close (Esc)"></button></div></div><div class="fancybox-slider-wrap"><button data-fancybox-next class="fancybox-button fancybox-button--right" title="Next"></button><button data-fancybox-previous class="fancybox-button fancybox-button--left" title="Previous"></button><div class="fancybox-slider"></div></div><div class="fancybox-caption-wrap"><div class="fancybox-caption"></div></div></div>',
        spinnerTpl: '<div class="fancybox-loading"></div>',
        errorTpl: '<div class="fancybox-error"><p>The requested content cannot be loaded. <br /> Please try again later.<p></div>',
        closeTpl: '<button data-fancybox-close class="fancybox-close-small"></button>',
        parentEl: "body",
        touch: !0,
        keyboard: !0,
        focus: !0,
        closeClickOutside: !0,
        beforeLoad: v.noop,
        afterLoad: v.noop,
        beforeMove: v.noop,
        afterMove: v.noop,
        onComplete: v.noop,
        onInit: v.noop,
        beforeClose: v.noop,
        afterClose: v.noop,
        onActivate: v.noop,
        onDeactivate: v.noop
    }, d = v(m), n = v(g), a = 0, s = function (t) {
        return t && t.hasOwnProperty && t instanceof v
    }, _ = m.requestAnimationFrame || m.webkitRequestAnimationFrame || m.mozRequestAnimationFrame || function (t) {
        m.setTimeout(t, 1e3 / 60)
    }, r = function (t, e, i) {
        var s = this;
        s.opts = v.extend(!0, {index: i}, o, e || {}), s.id = s.opts.id || ++a, s.group = [], s.currIndex = parseInt(s.opts.index, 10) || 0, s.prevIndex = null, s.prevPos = null, s.currPos = 0, s.firstRun = null, s.createGroup(t), s.group.length && (s.$lastFocus = v(g.activeElement).blur(), s.slides = {}, s.init(t))
    };

    function e(t) {
        var e = t.currentTarget, i = t.data ? t.data.options : {}, s = t.data ? t.data.items : [], o = "", n = 0;
        t.preventDefault(), t.stopPropagation(), v(e).attr("data-fancybox") && (o = v(e).data("fancybox")), o ? n = (s = s.length ? s.filter('[data-fancybox="' + o + '"]') : v("[data-fancybox=" + o + "]")).index(e) : s = [e], v.fancybox.open(s, i, n)
    }

    v.extend(r.prototype, {
        init: function () {
            var t, e, i = this, s = !1;
            i.scrollTop = n.scrollTop(), i.scrollLeft = n.scrollLeft(), v.fancybox.getInstance() || (t = v("body").width(), v("html").addClass("fancybox-enabled"), v.fancybox.isTouch ? (v.each(i.group, function (t, e) {
                if ("image" !== e.type && "iframe" !== e.type) return !(s = !0)
            }), s && v("body").css({
                position: "fixed",
                width: t,
                top: -1 * i.scrollTop
            })) : 1 < (t = v("body").width() - t) && v('<style id="fancybox-noscroll" type="text/css">').html(".compensate-for-scrollbar, .fancybox-enabled body { margin-right: " + t + "px; }").appendTo("head")), e = v(i.opts.baseTpl).attr("id", "fancybox-container-" + i.id).data("FancyBox", i).addClass(i.opts.baseClass).hide().prependTo(i.opts.parentEl), i.$refs = {
                container: e,
                bg: e.find(".fancybox-bg"),
                controls: e.find(".fancybox-controls"),
                buttons: e.find(".fancybox-buttons"),
                slider_wrap: e.find(".fancybox-slider-wrap"),
                slider: e.find(".fancybox-slider"),
                caption: e.find(".fancybox-caption")
            }, i.trigger("onInit"), i.activate(), i.current || i.jumpTo(i.currIndex)
        }, createGroup: function (t) {
            var c = this, e = v.makeArray(t);
            v.each(e, function (t, e) {
                var i, s, o, n, a = {}, r = {}, l = [];
                v.isPlainObject(e) ? r = (a = e).opts || {} : "object" === v.type(e) && v(e).length ? (r = "options" in (l = (i = v(e)).data()) ? l.options : {}, r = "object" === v.type(r) ? r : {}, a.type = "type" in l ? l.type : r.type, a.src = "src" in l ? l.src : r.src || i.attr("href"), r.width = "width" in l ? l.width : r.width, r.height = "height" in l ? l.height : r.height, r.thumb = "thumb" in l ? l.thumb : r.thumb, r.selector = "selector" in l ? l.selector : r.selector, "srcset" in l && (r.image = {srcset: l.srcset}), r.$orig = i) : a = {
                    type: "html",
                    content: e + ""
                }, a.opts = v.extend(!0, {}, c.opts, r), s = a.type, o = a.src || "", s || (a.content ? s = "html" : o.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i) ? s = "image" : o.match(/\.(pdf)((\?|#).*)?$/i) ? s = "pdf" : "#" === o.charAt(0) && (s = "inline"), a.type = s), a.index = c.group.length, a.opts.$orig && !a.opts.$orig.length && delete a.opts.$orig, !a.opts.$thumb && a.opts.$orig && (a.opts.$thumb = a.opts.$orig.find("img:first")), a.opts.$thumb && !a.opts.$thumb.length && delete a.opts.$thumb, "function" === v.type(a.opts.caption) ? a.opts.caption = a.opts.caption.apply(e, [c, a]) : "caption" in l ? a.opts.caption = l.caption : r.$orig && (a.opts.caption = i.attr("title")), a.opts.caption = a.opts.caption === b ? "" : a.opts.caption + "", "ajax" === s && 1 < (n = o.split(/\s+/, 2)).length && (a.src = n.shift(), a.opts.selector = n.shift()), "auto" == a.opts.smallBtn && (-1 < v.inArray(s, ["html", "inline", "ajax"]) ? (a.opts.buttons = !1, a.opts.smallBtn = !0) : a.opts.smallBtn = !1), "pdf" === s && (a.type = "iframe", a.opts.closeBtn = !0, a.opts.smallBtn = !1, a.opts.iframe.preload = !1), a.opts.modal && v.extend(!0, a.opts, {
                    infobar: 0,
                    buttons: 0,
                    keyboard: 0,
                    slideShow: 0,
                    fullScreen: 0,
                    closeClickOutside: 0
                }), c.group.push(a)
            })
        }, addEvents: function () {
            var s = this;
            s.removeEvents(), s.$refs.container.on("click.fb-close", "[data-fancybox-close]", function (t) {
                t.stopPropagation(), t.preventDefault(), s.close(t)
            }).on("click.fb-previous", "[data-fancybox-previous]", function (t) {
                t.stopPropagation(), t.preventDefault(), s.previous()
            }).on("click.fb-next", "[data-fancybox-next]", function (t) {
                t.stopPropagation(), t.preventDefault(), s.next()
            }), v(m).on("orientationchange.fb resize.fb", function (t) {
                _(function () {
                    t && t.originalEvent && "resize" === t.originalEvent.type ? s.update() : (s.$refs.slider_wrap.hide(), _(function () {
                        s.$refs.slider_wrap.show(), s.update()
                    }))
                })
            }), n.on("focusin.fb", function (t) {
                var e = v.fancybox ? v.fancybox.getInstance() : null;
                !e || v(t.target).hasClass("fancybox-container") || v.contains(e.$refs.container[0], t.target) || (t.stopPropagation(), e.focus(), d.scrollTop(s.scrollTop).scrollLeft(s.scrollLeft))
            }), n.on("keydown.fb", function (t) {
                var e = s.current, i = t.keyCode || t.which;
                if (e && e.opts.keyboard && !v(t.target).is("input") && !v(t.target).is("textarea")) {
                    if (8 === i || 27 === i) return t.preventDefault(), void s.close(t);
                    switch (i) {
                        case 37:
                        case 38:
                            t.preventDefault(), s.previous();
                            break;
                        case 39:
                        case 40:
                            t.preventDefault(), s.next();
                            break;
                        case 80:
                        case 32:
                            t.preventDefault(), s.SlideShow && (t.preventDefault(), s.SlideShow.toggle());
                            break;
                        case 70:
                            s.FullScreen && (t.preventDefault(), s.FullScreen.toggle());
                            break;
                        case 71:
                            s.Thumbs && (t.preventDefault(), s.Thumbs.toggle())
                    }
                }
            })
        }, removeEvents: function () {
            d.off("scroll.fb resize.fb orientationchange.fb"), n.off("keydown.fb focusin.fb click.fb-close"), this.$refs.container.off("click.fb-close click.fb-previous click.fb-next")
        }, previous: function (t) {
            this.jumpTo(this.currIndex - 1, t)
        }, next: function (t) {
            this.jumpTo(this.currIndex + 1, t)
        }, jumpTo: function (t, e) {
            var i, s, o, n, a = this;
            if (i = a.firstRun = null === a.firstRun, s = o = t = parseInt(t, 10), n = !!a.current && a.current.opts.loop, !a.isAnimating && (s != a.currIndex || i)) {
                if (1 < a.group.length && n) s = (s %= a.group.length) < 0 ? a.group.length + s : s, 2 == a.group.length ? o = t - a.currIndex + a.currPos : (o = s - a.currIndex + a.currPos, Math.abs(a.currPos - (o + a.group.length)) < Math.abs(a.currPos - o) ? o += a.group.length : Math.abs(a.currPos - (o - a.group.length)) < Math.abs(a.currPos - o) && (o -= a.group.length)); else if (!a.group[s]) return void a.update(!1, !1, e);
                a.current && (a.current.$slide.removeClass("fancybox-slide--current fancybox-slide--complete"), a.updateSlide(a.current, !0)), a.prevIndex = a.currIndex, a.prevPos = a.currPos, a.currIndex = s, a.currPos = o, a.current = a.createSlide(o), 1 < a.group.length && ((a.opts.loop || 0 <= o - 1) && a.createSlide(o - 1), (a.opts.loop || o + 1 < a.group.length) && a.createSlide(o + 1)), a.current.isMoved = !1, a.current.isComplete = !1, e = parseInt(e === b ? 1.5 * a.current.opts.speed : e, 10), a.trigger("beforeMove"), a.updateControls(), i && (a.current.$slide.addClass("fancybox-slide--current"), a.$refs.container.show(), _(function () {
                    a.$refs.bg.css("transition-duration", a.current.opts.speed + "ms"), a.$refs.container.addClass("fancybox-container--ready")
                })), a.update(!0, !1, i ? 0 : e, function () {
                    a.afterMove()
                }), a.loadSlide(a.current), i && a.current.$ghost || a.preload()
            }
        }, createSlide: function (t) {
            var e, i, s, o = this;
            if (i = (i = t % o.group.length) < 0 ? o.group.length + i : i, !o.slides[t] && o.group[i]) {
                if (o.opts.loop && 2 < o.group.length) for (var n in o.slides) if (o.slides[n].index === i) return (s = o.slides[n]).pos = t, o.slides[t] = s, delete o.slides[n], o.updateSlide(s), s;
                e = v('<div class="fancybox-slide"></div>').appendTo(o.$refs.slider), o.slides[t] = v.extend(!0, {}, o.group[i], {
                    pos: t,
                    $slide: e,
                    isMoved: !1,
                    isLoaded: !1
                })
            }
            return o.slides[t]
        }, zoomInOut: function (e, t, i) {
            var s, o, n, a, r, l = this, c = l.current, d = c.$placeholder, h = c.opts.opacity, p = c.opts.$thumb,
                u = p ? p.offset() : 0, f = c.$slide.offset();
            return !!(d && c.isMoved && u && (a = p, "function" == typeof v && a instanceof v && (a = a[0]), 0 < (r = a.getBoundingClientRect()).bottom && 0 < r.right && r.left < (m.innerWidth || g.documentElement.clientWidth) && r.top < (m.innerHeight || g.documentElement.clientHeight))) && (!("In" === e && !l.firstRun) && (v.fancybox.stop(d), l.isAnimating = !0, s = {
                top: u.top - f.top + parseFloat(p.css("border-top-width") || 0),
                left: u.left - f.left + parseFloat(p.css("border-left-width") || 0),
                width: p.width(),
                height: p.height(),
                scaleX: 1,
                scaleY: 1
            }, "auto" == h && (h = .1 < Math.abs(c.width / c.height - s.width / s.height)), "In" === e ? (o = s, (n = l.getFitPos(c)).scaleX = n.width / o.width, n.scaleY = n.height / o.height, h && (o.opacity = .1, n.opacity = 1)) : (o = v.fancybox.getTranslate(d), n = s, c.$ghost && (c.$ghost.show(), c.$image && c.$image.remove()), o.scaleX = o.width / n.width, o.scaleY = o.height / n.height, o.width = n.width, o.height = n.height, h && (n.opacity = 0)), l.updateCursor(n.width, n.height), delete n.width, delete n.height, v.fancybox.setTranslate(d, o), d.show(), l.trigger("beforeZoom" + e), d.css("transition", "all " + t + "ms"), v.fancybox.setTranslate(d, n), setTimeout(function () {
                var t;
                d.css("transition", "none"), (t = v.fancybox.getTranslate(d)).scaleX = 1, t.scaleY = 1, v.fancybox.setTranslate(d, t), l.trigger("afterZoom" + e), i.apply(l), l.isAnimating = !1
            }, t), !0))
        }, canPan: function () {
            var t = this.current, e = t.$placeholder, i = !1;
            return e && (i = this.getFitPos(t), i = 1 < Math.abs(e.width() - i.width) || 1 < Math.abs(e.height() - i.height)), i
        }, isScaledDown: function () {
            var t = this.current, e = t.$placeholder, i = !1;
            return e && (i = (i = v.fancybox.getTranslate(e)).width < t.width || i.height < t.height), i
        }, scaleToActual: function (t, e, i) {
            var s, o, n, a, r, l = this, c = l.current, d = c.$placeholder, h = parseInt(c.$slide.width(), 10),
                p = parseInt(c.$slide.height(), 10), u = c.width, f = c.height;
            d && (l.isAnimating = !0, t = t === b ? .5 * h : t, e = e === b ? .5 * p : e, a = u / (s = v.fancybox.getTranslate(d)).width, r = f / s.height, o = .5 * h - .5 * u, n = .5 * p - .5 * f, h < u && (0 < (o = s.left * a - (t * a - t)) && (o = 0), o < h - u && (o = h - u)), p < f && (0 < (n = s.top * r - (e * r - e)) && (n = 0), n < p - f && (n = p - f)), l.updateCursor(u, f), v.fancybox.animate(d, null, {
                top: n,
                left: o,
                scaleX: a,
                scaleY: r
            }, i || c.opts.speed, function () {
                l.isAnimating = !1
            }))
        }, scaleToFit: function (t) {
            var e, i = this, s = i.current, o = s.$placeholder;
            o && (i.isAnimating = !0, e = i.getFitPos(s), i.updateCursor(e.width, e.height), v.fancybox.animate(o, null, {
                top: e.top,
                left: e.left,
                scaleX: e.width / o.width(),
                scaleY: e.height / o.height()
            }, t || s.opts.speed, function () {
                i.isAnimating = !1
            }))
        }, getFitPos: function (t) {
            var e, i, s, o, n, a = t.$placeholder || t.$content, r = t.width, l = t.height, c = t.opts.margin;
            return !(!a || !a.length || !r && !l) && ("number" === v.type(c) && (c = [c, c]), 2 == c.length && (c = [c[0], c[1], c[0], c[1]]), d.width() < 800 && (c = [0, 0, 0, 0]), e = parseInt(t.$slide.width(), 10) - (c[1] + c[3]), i = parseInt(t.$slide.height(), 10) - (c[0] + c[2]), s = Math.min(1, e / r, i / l), o = Math.floor(s * r), n = Math.floor(s * l), {
                top: Math.floor(.5 * (i - n)) + c[0],
                left: Math.floor(.5 * (e - o)) + c[3],
                width: o,
                height: n
            })
        }, update: function (t, i, e, s) {
            var o, n = this;
            !0 !== n.isAnimating && n.current && (o = n.current.pos * Math.floor(n.current.$slide.width()) * -1 - n.current.pos * n.current.opts.gutter, e = parseInt(e, 10) || 0, v.fancybox.stop(n.$refs.slider), !1 === t ? n.updateSlide(n.current, i) : v.each(n.slides, function (t, e) {
                n.updateSlide(e, i)
            }), e ? v.fancybox.animate(n.$refs.slider, null, {top: 0, left: o}, e, function () {
                n.current.isMoved = !0, "function" === v.type(s) && s.apply(n)
            }) : (v.fancybox.setTranslate(n.$refs.slider, {
                top: 0,
                left: o
            }), n.current.isMoved = !0, "function" === v.type(s) && s.apply(n)))
        }, updateSlide: function (t, e) {
            var i, s = this, o = t.$placeholder;
            (t = t || s.current) && !s.isClosing && ((i = t.pos * Math.floor(t.$slide.width()) + t.pos * t.opts.gutter) !== t.leftPos && (v.fancybox.setTranslate(t.$slide, {
                top: 0,
                left: i
            }), t.leftPos = i), !1 !== e && o && (v.fancybox.setTranslate(o, s.getFitPos(t)), t.pos === s.currPos && s.updateCursor()), t.$slide.trigger("refresh"), s.trigger("onUpdate", t))
        }, updateCursor: function (t, e) {
            var i = this,
                s = i.$refs.container.removeClass("fancybox-controls--canzoomIn fancybox-controls--canzoomOut fancybox-controls--canGrab");
            !i.isClosing && i.opts.touch && ((t !== b && e !== b ? t < i.current.width && e < i.current.height : i.isScaledDown()) ? s.addClass("fancybox-controls--canzoomIn") : i.group.length < 2 ? s.addClass("fancybox-controls--canzoomOut") : s.addClass("fancybox-controls--canGrab"))
        }, loadSlide: function (i) {
            var t, e, s, o = this;
            if (i && !i.isLoaded && !i.isLoading) {
                switch (i.isLoading = !0, o.trigger("beforeLoad", i), t = i.type, (e = i.$slide).off("refresh").trigger("onReset").addClass("fancybox-slide--" + (t || "unknown")).addClass(i.opts.slideClass), t) {
                    case"image":
                        o.setImage(i);
                        break;
                    case"iframe":
                        o.setIframe(i);
                        break;
                    case"html":
                        o.setContent(i, i.content);
                        break;
                    case"inline":
                        v(i.src).length ? o.setContent(i, v(i.src)) : o.setError(i);
                        break;
                    case"ajax":
                        o.showLoading(i), s = v.ajax(v.extend({}, i.opts.ajax.settings, {
                            url: i.src,
                            success: function (t, e) {
                                "success" === e && o.setContent(i, t)
                            },
                            error: function (t, e) {
                                t && "abort" !== e && o.setError(i)
                            }
                        })), e.one("onReset", function () {
                            s.abort()
                        });
                        break;
                    default:
                        o.setError(i)
                }
                return !0
            }
        }, setImage: function (t) {
            var e, i, s, o, n = this, a = t.opts.image.srcset;
            if (!t.isLoaded || t.hasError) {
                if (a) {
                    s = m.devicePixelRatio || 1, o = m.innerWidth * s, (i = a.split(",").map(function (t) {
                        var s = {};
                        return t.trim().split(/\s+/).forEach(function (t, e) {
                            var i = parseInt(t.substring(0, t.length - 1), 10);
                            if (0 === e) return s.url = t;
                            i && (s.value = i, s.postfix = t[t.length - 1])
                        }), s
                    })).sort(function (t, e) {
                        return t.value - e.value
                    });
                    for (var r = 0; r < i.length; r++) {
                        var l = i[r];
                        if ("w" === l.postfix && l.value >= o || "x" === l.postfix && l.value >= s) {
                            e = l;
                            break
                        }
                    }
                    !e && i.length && (e = i[i.length - 1]), e && (t.src = e.url, t.width && t.height && "w" == e.postfix && (t.height = t.width / t.height * e.value, t.width = e.value))
                }
                t.$placeholder = v('<div class="fancybox-placeholder"></div>').hide().appendTo(t.$slide), !1 !== t.opts.preload && t.opts.width && t.opts.height && (t.opts.thumb || t.opts.$thumb) ? (t.width = t.opts.width, t.height = t.opts.height, t.$ghost = v("<img />").one("load error", function () {
                    n.isClosing || (v("<img/>")[0].src = t.src, n.revealImage(t, function () {
                        n.setBigImage(t), n.firstRun && t.index === n.currIndex && n.preload()
                    }))
                }).addClass("fancybox-image").appendTo(t.$placeholder).attr("src", t.opts.thumb || t.opts.$thumb.attr("src"))) : n.setBigImage(t)
            } else n.afterLoad(t)
        }, setBigImage: function (t) {
            var e = this, i = v("<img />");
            t.$image = i.one("error", function () {
                e.setError(t)
            }).one("load", function () {
                clearTimeout(t.timouts), t.timouts = null, e.isClosing || (t.width = this.naturalWidth, t.height = this.naturalHeight, t.opts.image.srcset && i.attr("sizes", "100vw").attr("srcset", t.opts.image.srcset), e.afterLoad(t), t.$ghost && (t.timouts = setTimeout(function () {
                    t.$ghost.hide()
                }, 350)))
            }).addClass("fancybox-image").attr("src", t.src).appendTo(t.$placeholder), i[0].complete ? i.trigger("load") : i[0].error ? i.trigger("error") : t.timouts = setTimeout(function () {
                i[0].complete || t.hasError || e.showLoading(t)
            }, 150), t.opts.image.protect && v('<div class="fancybox-spaceball"></div>').appendTo(t.$placeholder).on("contextmenu.fb", function (t) {
                return 2 == t.button && t.preventDefault(), !0
            })
        }, revealImage: function (t, e) {
            var i = this;
            e = e || v.noop, "image" !== t.type || t.hasError || !0 === t.isRevealed ? e.apply(i) : (t.isRevealed = !0, t.pos === i.currPos && i.zoomInOut("In", t.opts.speed, e) || (t.$ghost && !t.isLoaded && i.updateSlide(t, !0), t.pos === i.currPos ? v.fancybox.animate(t.$placeholder, {opacity: 0}, {opacity: 1}, 300, e) : t.$placeholder.show(), e.apply(i)))
        }, setIframe: function (n) {
            var a, e = this, r = n.opts.iframe, t = n.$slide;
            n.$content = v('<div class="fancybox-content"></div>').css(r.css).appendTo(t), a = v(r.tpl.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", v.fancybox.isTouch ? "auto" : r.scrolling).appendTo(n.$content), r.preload ? (n.$content.addClass("fancybox-tmp"), e.showLoading(n), a.on("load.fb error.fb", function (t) {
                this.isReady = 1, n.$slide.trigger("refresh"), e.afterLoad(n)
            }), t.on("refresh.fb", function () {
                var t, e, i, s, o = n.$content;
                if (1 === a[0].isReady) {
                    try {
                        t = a.contents().find("body")
                    } catch (t) {
                    }
                    t && t.length && (r.css.width === b || r.css.height === b) && (e = a[0].contentWindow.document.documentElement.scrollWidth, i = Math.ceil(t.outerWidth(!0) + (o.width() - e)), s = Math.ceil(t.outerHeight(!0)), o.css({
                        width: r.css.width === b ? i + (o.outerWidth() - o.innerWidth()) : r.css.width,
                        height: r.css.height === b ? s + (o.outerHeight() - o.innerHeight()) : r.css.height
                    })), o.removeClass("fancybox-tmp")
                }
            })) : this.afterLoad(n), a.attr("src", n.src), n.opts.smallBtn && n.$content.prepend(n.opts.closeTpl), t.one("onReset", function () {
                try {
                    v(this).find("iframe").hide().attr("src", "//about:blank")
                } catch (t) {
                }
                v(this).empty(), n.isLoaded = !1
            })
        }, setContent: function (e, i) {
            this.isClosing || (this.hideLoading(e), e.$slide.empty(), s(i) && i.parent().length ? (i.data("placeholder") && i.parents(".fancybox-slide").trigger("onReset"), i.data({placeholder: v("<div></div>").hide().insertAfter(i)}).css("display", "inline-block")) : ("string" === v.type(i) && 3 === (i = v("<div>").append(i).contents())[0].nodeType && (i = v("<div>").html(i)), e.opts.selector && (i = v("<div>").html(i).find(e.opts.selector))), e.$slide.one("onReset", function () {
                var t = s(i) ? i.data("placeholder") : 0;
                t && (i.hide().replaceAll(t), i.data("placeholder", null)), e.hasError || (v(this).empty(), e.isLoaded = !1)
            }), e.$content = v(i).appendTo(e.$slide), !0 === e.opts.smallBtn && e.$content.find(".fancybox-close-small").remove().end().eq(0).append(e.opts.closeTpl), this.afterLoad(e))
        }, setError: function (t) {
            t.hasError = !0, this.setContent(t, t.opts.errorTpl)
        }, showLoading: function (t) {
            (t = t || this.current) && !t.$spinner && (t.$spinner = v(this.opts.spinnerTpl).appendTo(t.$slide))
        }, hideLoading: function (t) {
            (t = t || this.current) && t.$spinner && (t.$spinner.remove(), delete t.$spinner)
        }, afterMove: function () {
            var i = this, t = i.current, s = {};
            t && (t.$slide.siblings().trigger("onReset"), v.each(i.slides, function (t, e) {
                e.pos >= i.currPos - 1 && e.pos <= i.currPos + 1 ? s[e.pos] = e : e && e.$slide.remove()
            }), i.slides = s, i.trigger("afterMove"), t.isLoaded && i.complete())
        }, afterLoad: function (t) {
            var e = this;
            e.isClosing || (t.isLoading = !1, t.isLoaded = !0, e.trigger("afterLoad", t), e.hideLoading(t), t.$ghost || e.updateSlide(t, !0), t.index === e.currIndex && t.isMoved ? e.complete() : t.$ghost || e.revealImage(t))
        }, complete: function () {
            var t = this, e = t.current;
            t.revealImage(e, function () {
                e.isComplete = !0, e.$slide.addClass("fancybox-slide--complete"), t.updateCursor(), t.trigger("onComplete"), e.opts.focus && "image" !== e.type && "iframe" !== e.type && t.focus()
            })
        }, preload: function () {
            var t, e, i = this;
            i.group.length < 2 || (t = i.slides[i.currPos + 1], e = i.slides[i.currPos - 1], t && "image" === t.type && i.loadSlide(t), e && "image" === e.type && i.loadSlide(e))
        }, focus: function () {
            var t, e = this.current;
            (t = e && e.isComplete ? e.$slide.find('button,:input,[tabindex],a:not(".disabled")').filter(":visible:first") : null) && t.length || (t = this.$refs.container), t.focus(), this.$refs.slider_wrap.scrollLeft(0), e && e.$slide.scrollTop(0)
        }, activate: function () {
            var e = this;
            v(".fancybox-container").each(function () {
                var t = v(this).data("FancyBox");
                t && t.uid !== e.uid && !t.isClosing && t.trigger("onDeactivate")
            }), e.current && (0 < e.$refs.container.index() && e.$refs.container.prependTo(g.body), e.updateControls()), e.trigger("onActivate"), e.addEvents()
        }, close: function (t) {
            var e = this, i = e.current, s = i.opts.speed, o = v.proxy(function () {
                e.cleanUp(t)
            }, this);
            return !e.isAnimating && !e.isClosing && (!1 === e.trigger("beforeClose", t) ? (v.fancybox.stop(e.$refs.slider), void _(function () {
                e.update(!0, !0, 150)
            })) : (e.isClosing = !0, i.timouts && clearTimeout(i.timouts), !0 !== t && v.fancybox.stop(e.$refs.slider), e.$refs.container.removeClass("fancybox-container--active").addClass("fancybox-container--closing"), i.$slide.removeClass("fancybox-slide--complete").siblings().remove(), i.isMoved || i.$slide.css("overflow", "visible"), e.removeEvents(), e.hideLoading(i), e.hideControls(), e.updateCursor(), e.$refs.bg.css("transition-duration", s + "ms"), this.$refs.container.removeClass("fancybox-container--ready"), void (!0 === t ? setTimeout(o, s) : e.zoomInOut("Out", s, o) || v.fancybox.animate(e.$refs.container, null, {opacity: 0}, s, "easeInSine", o))))
        }, cleanUp: function (t) {
            var e, i = this;
            i.$refs.slider.children().trigger("onReset"), i.$refs.container.empty().remove(), i.trigger("afterClose", t), i.current = null, (e = v.fancybox.getInstance()) ? e.activate() : (v("html").removeClass("fancybox-enabled"), v("body").removeAttr("style"), d.scrollTop(i.scrollTop).scrollLeft(i.scrollLeft), v("#fancybox-noscroll").remove()), i.$lastFocus && i.$lastFocus.focus()
        }, trigger: function (t, e) {
            var i, s = Array.prototype.slice.call(arguments, 1), o = e && e.opts ? e : this.current;
            if (o ? s.unshift(o) : o = this, s.unshift(this), v.isFunction(o.opts[t]) && (i = o.opts[t].apply(o, s)), !1 === i) return i;
            "afterClose" === t ? v(g).trigger(t + ".fb", s) : this.$refs.container.trigger(t + ".fb", s)
        }, toggleControls: function (t) {
            this.isHiddenControls ? this.updateControls(t) : this.hideControls()
        }, hideControls: function () {
            this.isHiddenControls = !0, this.$refs.container.removeClass("fancybox-show-controls"), this.$refs.container.removeClass("fancybox-show-caption")
        }, updateControls: function (t) {
            var e = this, i = e.$refs.container, s = e.$refs.caption, o = e.current, n = o.index, a = o.opts,
                r = a.caption;
            this.isHiddenControls && !0 !== t || (this.isHiddenControls = !1, i.addClass("fancybox-show-controls").toggleClass("fancybox-show-infobar", !!a.infobar && 1 < e.group.length).toggleClass("fancybox-show-buttons", !!a.buttons).toggleClass("fancybox-is-modal", !!a.modal), v(".fancybox-button--left", i).toggleClass("fancybox-button--disabled", !a.loop && n <= 0), v(".fancybox-button--right", i).toggleClass("fancybox-button--disabled", !a.loop && n >= e.group.length - 1), v(".fancybox-button--play", i).toggle(!!(a.slideShow && 1 < e.group.length)), v(".fancybox-button--close", i).toggle(!!a.closeBtn), v(".js-fancybox-count", i).html(e.group.length), v(".js-fancybox-index", i).html(n + 1), o.$slide.trigger("refresh"), s && s.empty(), r && r.length ? (s.html(r), this.$refs.container.addClass("fancybox-show-caption "), e.$caption = s) : this.$refs.container.removeClass("fancybox-show-caption"))
        }
    }), v.fancybox = {
        version: "{fancybox-version}",
        defaults: o,
        getInstance: function (t) {
            var e = v('.fancybox-container:not(".fancybox-container--closing"):first').data("FancyBox"),
                i = Array.prototype.slice.call(arguments, 1);
            return e instanceof r && ("string" === v.type(t) ? e[t].apply(e, i) : "function" === v.type(t) && t.apply(e, i), e)
        },
        open: function (t, e, i) {
            return new r(t, e, i)
        },
        close: function (t) {
            var e = this.getInstance();
            e && (e.close(), !0 === t && this.close())
        },
        isTouch: g.createTouch !== b && /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent),
        use3d: (t = g.createElement("div"), m.getComputedStyle(t).getPropertyValue("transform") && !(g.documentMode && g.documentMode <= 11)),
        getTranslate: function (t) {
            var e, i;
            return !(!t || !t.length) && (e = t.get(0).getBoundingClientRect(), {
                top: (i = (i = (i = t.eq(0).css("transform")) && -1 !== i.indexOf("matrix") ? (i = (i = i.split("(")[1]).split(")")[0]).split(",") : []).length ? (i = 10 < i.length ? [i[13], i[12], i[0], i[5]] : [i[5], i[4], i[0], i[3]]).map(parseFloat) : [0, 0, 1, 1])[0],
                left: i[1],
                scaleX: i[2],
                scaleY: i[3],
                opacity: parseFloat(t.css("opacity")),
                width: e.width,
                height: e.height
            })
        },
        setTranslate: function (t, e) {
            var i = "", s = {};
            if (t && e) return e.left === b && e.top === b || (i = (e.left === b ? t.position().top : e.left) + "px, " + (e.top === b ? t.position().top : e.top) + "px", i = this.use3d ? "translate3d(" + i + ", 0px)" : "translate(" + i + ")"), e.scaleX !== b && e.scaleY !== b && (i = (i.length ? i + " " : "") + "scale(" + e.scaleX + ", " + e.scaleY + ")"), i.length && (s.transform = i), e.opacity !== b && (s.opacity = e.opacity), e.width !== b && (s.width = e.width), e.height !== b && (s.height = e.height), t.css(s)
        },
        easing: {
            easeOutCubic: function (t, e, i, s) {
                return i * ((t = t / s - 1) * t * t + 1) + e
            }, easeInCubic: function (t, e, i, s) {
                return i * (t /= s) * t * t + e
            }, easeOutSine: function (t, e, i, s) {
                return i * Math.sin(t / s * (Math.PI / 2)) + e
            }, easeInSine: function (t, e, i, s) {
                return -i * Math.cos(t / s * (Math.PI / 2)) + i + e
            }
        },
        stop: function (t) {
            t.removeData("animateID")
        },
        animate: function (i, s, o, n, a, t) {
            var r, l, c, d = this, h = null, p = 0, u = function () {
                o.scaleX !== b && o.scaleY !== b && s && s.width !== b && s.height !== b && (o.width = s.width * o.scaleX, o.height = s.height * o.scaleY, o.scaleX = 1, o.scaleY = 1), d.setTranslate(i, o), t()
            }, f = function (t) {
                if (r = [], l = 0, i.length && i.data("animateID") === c) if (t = t || Date.now(), h && (l = t - h), h = t, n <= (p += l)) u(); else {
                    for (var e in o) o.hasOwnProperty(e) && s[e] !== b && (s[e] == o[e] ? r[e] = o[e] : r[e] = d.easing[a](p, s[e], o[e] - s[e], n));
                    d.setTranslate(i, r), _(f)
                }
            };
            d.animateID = c = d.animateID === b ? 1 : d.animateID + 1, i.data("animateID", c), t === b && "function" == v.type(a) && (t = a, a = b), a || (a = "easeOutCubic"), t = t || v.noop, s ? this.setTranslate(i, s) : s = this.getTranslate(i), n ? (i.show(), _(f)) : u()
        }
    }, v.fn.fancybox = function (t) {
        return this.off("click.fb-start").on("click.fb-start", {items: this, options: t || {}}, e), this
    }, v(g).on("click.fb-start", "[data-fancybox]", e)
}(window, document, window.jQuery), function (f, t, m) {
    var g = f.requestAnimationFrame || f.webkitRequestAnimationFrame || f.mozRequestAnimationFrame || function (t) {
        f.setTimeout(t, 1e3 / 60)
    }, r = function (t) {
        var e = [];
        for (var i in t = (t = t.originalEvent || t || f.e).touches && t.touches.length ? t.touches : t.changedTouches && t.changedTouches.length ? t.changedTouches : [t]) t[i].pageX ? e.push({
            x: t[i].pageX,
            y: t[i].pageY
        }) : t[i].clientX && e.push({x: t[i].clientX, y: t[i].clientY});
        return e
    }, v = function (t, e, i) {
        return e && t ? "x" === i ? t.x - e.x : "y" === i ? t.y - e.y : Math.sqrt(Math.pow(t.x - e.x, 2) + Math.pow(t.y - e.y, 2)) : 0
    }, n = function (t) {
        return t.is("a") || t.is("button") || t.is("input") || t.is("select") || t.is("textarea") || m.isFunction(t.get(0).onclick)
    }, i = function (t) {
        var e = this;
        e.instance = t, e.$wrap = t.$refs.slider_wrap, e.$slider = t.$refs.slider, e.$container = t.$refs.container, e.destroy(), e.$wrap.on("touchstart.fb mousedown.fb", m.proxy(e, "ontouchstart"))
    };
    i.prototype.destroy = function () {
        this.$wrap.off("touchstart.fb mousedown.fb touchmove.fb mousemove.fb touchend.fb touchcancel.fb mouseup.fb mouseleave.fb")
    }, i.prototype.ontouchstart = function (t) {
        var e = this, i = m(t.target), s = e.instance.current, o = s.$content || s.$placeholder;
        return e.startPoints = r(t), e.$target = i, e.$content = o, e.canvasWidth = Math.round(s.$slide[0].clientWidth), e.canvasHeight = Math.round(s.$slide[0].clientHeight), (e.startEvent = t).originalEvent.clientX > e.canvasWidth + s.$slide.offset().left || (n(i) || n(i.parent()) || function (t) {
            for (var e, i, s, o, n, a = !1; e = t.get(0), i = f.getComputedStyle(e)["overflow-y"], s = f.getComputedStyle(e)["overflow-x"], o = ("scroll" === i || "auto" === i) && e.scrollHeight > e.clientHeight, n = ("scroll" === s || "auto" === s) && e.scrollWidth > e.clientWidth, !(a = o || n) && (t = t.parent()).length && !t.hasClass("fancybox-slider") && !t.is("body");) ;
            return a
        }(i) ? void 0 : s.opts.touch ? void (t.originalEvent && 2 == t.originalEvent.button || (t.stopPropagation(), t.preventDefault(), !s || e.instance.isAnimating || e.instance.isClosing || !e.startPoints || 1 < e.startPoints.length && !s.isMoved || (e.$wrap.off("touchmove.fb mousemove.fb", m.proxy(e, "ontouchmove")), e.$wrap.off("touchend.fb touchcancel.fb mouseup.fb mouseleave.fb", m.proxy(e, "ontouchend")), e.$wrap.on("touchend.fb touchcancel.fb mouseup.fb mouseleave.fb", m.proxy(e, "ontouchend")), e.$wrap.on("touchmove.fb mousemove.fb", m.proxy(e, "ontouchmove")), e.startTime = (new Date).getTime(), e.distanceX = e.distanceY = e.distance = 0, e.canTap = !1, e.isPanning = !1, e.isSwiping = !1, e.isZooming = !1, e.sliderStartPos = m.fancybox.getTranslate(e.$slider), e.contentStartPos = m.fancybox.getTranslate(e.$content), e.contentLastPos = null, 1 !== e.startPoints.length || e.isZooming || (e.canTap = s.isMoved, "image" === s.type && (e.contentStartPos.width > e.canvasWidth + 1 || e.contentStartPos.height > e.canvasHeight + 1) ? (m.fancybox.stop(e.$content), e.isPanning = !0) : (m.fancybox.stop(e.$slider), e.isSwiping = !0), e.$container.addClass("fancybox-controls--isGrabbing")), 2 === e.startPoints.length && s.isMoved && !s.hasError && "image" === s.type && (s.isLoaded || s.$ghost) && (e.isZooming = !0, e.isSwiping = !1, e.isPanning = !1, m.fancybox.stop(e.$content), e.centerPointStartX = .5 * (e.startPoints[0].x + e.startPoints[1].x) - m(f).scrollLeft(), e.centerPointStartY = .5 * (e.startPoints[0].y + e.startPoints[1].y) - m(f).scrollTop(), e.percentageOfImageAtPinchPointX = (e.centerPointStartX - e.contentStartPos.left) / e.contentStartPos.width, e.percentageOfImageAtPinchPointY = (e.centerPointStartY - e.contentStartPos.top) / e.contentStartPos.height, e.startDistanceBetweenFingers = v(e.startPoints[0], e.startPoints[1]))))) : (e.endPoints = e.startPoints, e.ontap()))
    }, i.prototype.ontouchmove = function (t) {
        var e = this;
        t.preventDefault(), e.newPoints = r(t), e.newPoints && e.newPoints.length && (e.distanceX = v(e.newPoints[0], e.startPoints[0], "x"), e.distanceY = v(e.newPoints[0], e.startPoints[0], "y"), e.distance = v(e.newPoints[0], e.startPoints[0]), 0 < e.distance && (e.isSwiping ? e.onSwipe() : e.isPanning ? e.onPan() : e.isZooming && e.onZoom()))
    }, i.prototype.onSwipe = function () {
        var t, e = this, i = e.isSwiping, s = e.sliderStartPos.left;
        !0 === i ? 10 < Math.abs(e.distance) && (e.instance.group.length < 2 ? e.isSwiping = "y" : !e.instance.current.isMoved || !1 === e.instance.opts.touch.vertical || "auto" === e.instance.opts.touch.vertical && 800 < m(f).width() ? e.isSwiping = "x" : (t = Math.abs(180 * Math.atan2(e.distanceY, e.distanceX) / Math.PI), e.isSwiping = 45 < t && t < 135 ? "y" : "x"), e.canTap = !1, e.instance.current.isMoved = !1, e.startPoints = e.newPoints) : ("x" == i && (!e.instance.current.opts.loop && 0 === e.instance.current.index && 0 < e.distanceX ? s += Math.pow(e.distanceX, .8) : !e.instance.current.opts.loop && e.instance.current.index === e.instance.group.length - 1 && e.distanceX < 0 ? s -= Math.pow(-e.distanceX, .8) : s += e.distanceX), e.sliderLastPos = {
            top: "x" == i ? 0 : e.sliderStartPos.top + e.distanceY,
            left: s
        }, g(function () {
            m.fancybox.setTranslate(e.$slider, e.sliderLastPos)
        }))
    }, i.prototype.onPan = function () {
        var t, e, i, s = this;
        s.canTap = !1, t = s.contentStartPos.width > s.canvasWidth ? s.contentStartPos.left + s.distanceX : s.contentStartPos.left, e = s.contentStartPos.top + s.distanceY, (i = s.limitMovement(t, e, s.contentStartPos.width, s.contentStartPos.height)).scaleX = s.contentStartPos.scaleX, i.scaleY = s.contentStartPos.scaleY, s.contentLastPos = i, g(function () {
            m.fancybox.setTranslate(s.$content, s.contentLastPos)
        })
    }, i.prototype.limitMovement = function (t, e, i, s) {
        var o, n, a, r, l = this, c = l.canvasWidth, d = l.canvasHeight, h = l.contentStartPos.left,
            p = l.contentStartPos.top, u = l.distanceX, f = l.distanceY;
        return o = Math.max(0, .5 * c - .5 * i), n = Math.max(0, .5 * d - .5 * s), a = Math.min(c - i, .5 * c - .5 * i), r = Math.min(d - s, .5 * d - .5 * s), c < i && (0 < u && o < t && (t = o - 1 + Math.pow(-o + h + u, .8) || 0), u < 0 && t < a && (t = a + 1 - Math.pow(a - h - u, .8) || 0)), d < s && (0 < f && n < e && (e = n - 1 + Math.pow(-n + p + f, .8) || 0), f < 0 && e < r && (e = r + 1 - Math.pow(r - p - f, .8) || 0)), {
            top: e,
            left: t
        }
    }, i.prototype.limitPosition = function (t, e, i, s) {
        var o = this.canvasWidth, n = this.canvasHeight;
        return t = o < i ? (t = 0 < t ? 0 : t) < o - i ? o - i : t : Math.max(0, o / 2 - i / 2), {
            top: e = n < s ? (e = 0 < e ? 0 : e) < n - s ? n - s : e : Math.max(0, n / 2 - s / 2),
            left: t
        }
    }, i.prototype.onZoom = function () {
        var t = this, e = t.contentStartPos.width, i = t.contentStartPos.height, s = t.contentStartPos.left,
            o = t.contentStartPos.top, n = v(t.newPoints[0], t.newPoints[1]) / t.startDistanceBetweenFingers,
            a = Math.floor(e * n), r = Math.floor(i * n), l = (e - a) * t.percentageOfImageAtPinchPointX,
            c = (i - r) * t.percentageOfImageAtPinchPointY,
            d = (t.newPoints[0].x + t.newPoints[1].x) / 2 - m(f).scrollLeft(),
            h = (t.newPoints[0].y + t.newPoints[1].y) / 2 - m(f).scrollTop(), p = d - t.centerPointStartX, u = {
                top: o + (c + (h - t.centerPointStartY)),
                left: s + (l + p),
                scaleX: t.contentStartPos.scaleX * n,
                scaleY: t.contentStartPos.scaleY * n
            };
        t.canTap = !1, t.newWidth = a, t.newHeight = r, t.contentLastPos = u, g(function () {
            m.fancybox.setTranslate(t.$content, t.contentLastPos)
        })
    }, i.prototype.ontouchend = function (t) {
        var e = this, i = e.instance.current, s = Math.max((new Date).getTime() - e.startTime, 1), o = e.isSwiping,
            n = e.isPanning, a = e.isZooming;
        if (e.endPoints = r(t), e.$container.removeClass("fancybox-controls--isGrabbing"), e.$wrap.off("touchmove.fb mousemove.fb", m.proxy(this, "ontouchmove")), e.$wrap.off("touchend.fb touchcancel.fb mouseup.fb mouseleave.fb", m.proxy(this, "ontouchend")), e.isSwiping = !1, e.isPanning = !1, e.isZooming = !1, e.canTap) return e.ontap();
        e.velocityX = e.distanceX / s * .5, e.velocityY = e.distanceY / s * .5, e.speed = i.opts.speed || 330, e.speedX = Math.max(.75 * e.speed, Math.min(1.5 * e.speed, 1 / Math.abs(e.velocityX) * e.speed)), e.speedY = Math.max(.75 * e.speed, Math.min(1.5 * e.speed, 1 / Math.abs(e.velocityY) * e.speed)), n ? e.endPanning() : a ? e.endZooming() : e.endSwiping(o)
    }, i.prototype.endSwiping = function (t) {
        var e = this;
        "y" == t && 50 < Math.abs(e.distanceY) ? (m.fancybox.animate(e.$slider, null, {
            top: e.sliderStartPos.top + e.distanceY + 150 * e.velocityY,
            left: e.sliderStartPos.left,
            opacity: 0
        }, e.speedY), e.instance.close(!0)) : "x" == t && 50 < e.distanceX ? e.instance.previous(e.speedX) : "x" == t && e.distanceX < -50 ? e.instance.next(e.speedX) : e.instance.update(!1, !0, 150)
    }, i.prototype.endPanning = function () {
        var t, e, i, s = this;
        s.contentLastPos && (t = s.contentLastPos.left + s.velocityX * s.speed * 2, e = s.contentLastPos.top + s.velocityY * s.speed * 2, (i = s.limitPosition(t, e, s.contentStartPos.width, s.contentStartPos.height)).width = s.contentStartPos.width, i.height = s.contentStartPos.height, m.fancybox.animate(s.$content, null, i, s.speed, "easeOutSine"))
    }, i.prototype.endZooming = function () {
        var t, e, i, s, o = this, n = o.instance.current, a = o.newWidth, r = o.newHeight;
        o.contentLastPos && (t = o.contentLastPos.left, s = {
            top: e = o.contentLastPos.top,
            left: t,
            width: a,
            height: r,
            scaleX: 1,
            scaleY: 1
        }, m.fancybox.setTranslate(o.$content, s), a < o.canvasWidth && r < o.canvasHeight ? o.instance.scaleToFit(150) : a > n.width || r > n.height ? o.instance.scaleToActual(o.centerPointStartX, o.centerPointStartY, 150) : (i = o.limitPosition(t, e, a, r), m.fancybox.animate(o.$content, null, i, o.speed, "easeOutSine")))
    }, i.prototype.ontap = function () {
        var t = this, e = t.instance, i = e.current, s = t.endPoints[0].x, o = t.endPoints[0].y;
        if (s -= t.$wrap.offset().left, o -= t.$wrap.offset().top, e.SlideShow && e.SlideShow.isActive && e.SlideShow.stop(), !m.fancybox.isTouch) return i.opts.closeClickOutside && t.$target.is(".fancybox-slide") ? void e.close(t.startEvent) : void ("image" == i.type && i.isMoved && (e.canPan() ? e.scaleToFit() : e.isScaledDown() ? e.scaleToActual(s, o) : e.group.length < 2 && e.close(t.startEvent)));
        if (t.tapped) {
            if (clearTimeout(t.tapped), t.tapped = null, 50 < Math.abs(s - t.x) || 50 < Math.abs(o - t.y) || !i.isMoved) return this;
            "image" == i.type && (i.isLoaded || i.$ghost) && (e.canPan() ? e.scaleToFit() : e.isScaledDown() && e.scaleToActual(s, o))
        } else t.x = s, t.y = o, t.tapped = setTimeout(function () {
            t.tapped = null, e.toggleControls(!0)
        }, 300);
        return this
    }, m(t).on("onActivate.fb", function (t, e) {
        e && !e.Guestures && (e.Guestures = new i(e))
    }), m(t).on("beforeClose.fb", function (t, e) {
        e && e.Guestures && e.Guestures.destroy()
    })
}(window, document, window.jQuery), function (u) {
    var f = function (i, t, e) {
        if (i) return e = e || "", "object" === u.type(e) && (e = u.param(e, !0)), u.each(t, function (t, e) {
            i = i.replace("$" + t, e || "")
        }), e.length && (i += (0 < i.indexOf("?") ? "&" : "?") + e), i
    }, i = {
        youtube: {
            matcher: /(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i,
            params: {autoplay: 1, autohide: 1, fs: 1, rel: 0, hd: 1, wmode: "transparent", enablejsapi: 1, html5: 1},
            paramPlace: 8,
            type: "iframe",
            url: "//www.youtube.com/embed/$4",
            thumb: "//img.youtube.com/vi/$4/hqdefault.jpg"
        },
        vimeo: {
            matcher: /^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/,
            params: {autoplay: 1, hd: 1, show_title: 1, show_byline: 1, show_portrait: 0, fullscreen: 1, api: 1},
            paramPlace: 3,
            type: "iframe",
            url: "//player.vimeo.com/video/$2"
        },
        metacafe: {
            matcher: /metacafe.com\/watch\/(\d+)\/(.*)?/,
            type: "iframe",
            url: "//www.metacafe.com/embed/$1/?ap=1"
        },
        dailymotion: {
            matcher: /dailymotion.com\/video\/(.*)\/?(.*)/,
            params: {additionalInfos: 0, autoStart: 1},
            type: "iframe",
            url: "//www.dailymotion.com/embed/video/$1"
        },
        vine: {matcher: /vine.co\/v\/([a-zA-Z0-9\?\=\-]+)/, type: "iframe", url: "//vine.co/v/$1/embed/simple"},
        instagram: {
            matcher: /(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,
            type: "image",
            url: "//$1/p/$2/media/?size=l"
        },
        google_maps: {
            matcher: /(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i,
            type: "iframe",
            url: function (t) {
                return "//maps.google." + t[2] + "/?ll=" + (t[9] ? t[9] + "&z=" + Math.floor(t[10]) + (t[12] ? t[12].replace(/^\//, "&") : "") : t[12]) + "&output=" + (t[12] && 0 < t[12].indexOf("layer=c") ? "svembed" : "embed")
            }
        }
    };
    u(document).on("onInit.fb", function (t, e) {
        u.each(e.group, function (t, o) {
            var n, a, r, l, c, d, h = o.src || "", p = !1;
            o.type || (u.each(i, function (t, e) {
                if (a = h.match(e.matcher), c = {}, d = t, a) {
                    if (p = e.type, e.paramPlace && a[e.paramPlace]) {
                        "?" == (l = a[e.paramPlace])[0] && (l = l.substring(1)), l = l.split("&");
                        for (var i = 0; i < l.length; ++i) {
                            var s = l[i].split("=", 2);
                            2 == s.length && (c[s[0]] = decodeURIComponent(s[1].replace(/\+/g, " ")))
                        }
                    }
                    return r = u.extend(!0, {}, e.params, o.opts[t], c), h = "function" === u.type(e.url) ? e.url.call(this, a, r, o) : f(e.url, a, r), n = "function" === u.type(e.thumb) ? e.thumb.call(this, a, r, o) : f(e.thumb, a), "vimeo" === d && (h = h.replace("&%23", "#")), !1
                }
            }), p ? (o.src = h, o.type = p, o.opts.thumb || o.opts.$thumb && o.opts.$thumb.length || (o.opts.thumb = n), "iframe" === p && (u.extend(!0, o.opts, {
                iframe: {
                    preload: !1,
                    scrolling: "no"
                }, smallBtn: !1, closeBtn: !0, fullScreen: !1, slideShow: !1
            }), o.opts.slideClass += " fancybox-slide--video")) : o.type = "iframe")
        })
    })
}(window.jQuery);
var screenJS = new fecss_ScreenJS;
$(window).on("resize", function () {
    screenJS.setScreen()
}), function (e) {
    var i = jQuery.fn.addClass, s = jQuery.fn.removeClass, o = jQuery.fn.toggleClass;
    e.fn.addClass = function () {
        var t = i.apply(this, arguments);
        return e(this).trigger("changeClass", ["add"]), t
    }, e.fn.removeClass = function () {
        var t = s.apply(this, arguments);
        return e(this).trigger("changeClass", ["remove"]), t
    }, e.fn.toggleClass = function () {
        var t = o.apply(this, arguments);
        return e(this).trigger("changeClass", ["toggle"]), t
    }
}(jQuery);
var CMS__TPL_PATH = "/wp-content/themes/azbn7theme", Azbn7__API__Request = function (t, e) {
    return $.ajax({
        url: "/api/", type: "POST", dataType: "json", data: t, success: e, error: function (t, e, i) {
            console.warn(e)
        }
    }), this
};
$(function () {
    $("form.azbn7__api__form").on("submit", function (t) {
        t.preventDefault()
    }).on("jqv.form.result", function (t, e) {
        if (t.preventDefault(), e) ; else {
            var i = $(this), s = i.clone(), o = i.attr("data-method") || "formsave",
                n = i.attr("data-message") || "#modal-message";
            s.append($("<input/>", {
                type: "hidden",
                name: "method",
                value: o
            })), new Azbn7__API__Request(s.serialize(), function (t) {
                s.trigger("reset").empty().remove(), i.trigger("reset"), i.closest(".modal").modal("hide"), $(n).modal()
            })
        }
    })
}), function ($) {
    var k = {
        init: function (t) {
            return this.data("jqv") && null != this.data("jqv") || (t = k._saveOptions(this, t), $(document).on("click", ".formError", function () {
                $(this).fadeOut(150, function () {
                    $(this).closest(".formError").remove()
                })
            })), this
        },
        attach: function (t) {
            var e, i = this;
            return (e = t ? k._saveOptions(i, t) : i.data("jqv")).validateAttribute = i.find("[data-validation-engine*=validate]").length ? "data-validation-engine" : "class", e.binded && (i.on(e.validationEventTrigger, "[" + e.validateAttribute + "*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)", k._onFieldEvent), i.on("click", "[" + e.validateAttribute + "*=validate][type=checkbox],[" + e.validateAttribute + "*=validate][type=radio]", k._onFieldEvent), i.on(e.validationEventTrigger, "[" + e.validateAttribute + "*=validate][class*=datepicker]", {delay: 300}, k._onFieldEvent)), e.autoPositionUpdate && $(window).bind("resize", {
                noAnimation: !0,
                formElem: i
            }, k.updatePromptsPosition), i.on("click", "a[data-validation-engine-skip], a[class*='validate-skip'], button[data-validation-engine-skip], button[class*='validate-skip'], input[data-validation-engine-skip], input[class*='validate-skip']", k._submitButtonClick), i.removeData("jqv_submitButton"), i.on("submit", k._onSubmitEvent), this
        },
        detach: function () {
            var t = this, e = t.data("jqv");
            return t.off(e.validationEventTrigger, "[" + e.validateAttribute + "*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)", k._onFieldEvent), t.off("click", "[" + e.validateAttribute + "*=validate][type=checkbox],[" + e.validateAttribute + "*=validate][type=radio]", k._onFieldEvent), t.off(e.validationEventTrigger, "[" + e.validateAttribute + "*=validate][class*=datepicker]", k._onFieldEvent), t.off("submit", k._onSubmitEvent), t.removeData("jqv"), t.off("click", "a[data-validation-engine-skip], a[class*='validate-skip'], button[data-validation-engine-skip], button[class*='validate-skip'], input[data-validation-engine-skip], input[class*='validate-skip']", k._submitButtonClick), t.removeData("jqv_submitButton"), e.autoPositionUpdate && $(window).off("resize", k.updatePromptsPosition), this
        },
        validate: function (t) {
            var e, i = $(this), s = null;
            if (i.is("form") || i.hasClass("validationEngineContainer")) {
                if (i.hasClass("validating")) return !1;
                i.addClass("validating"), e = t ? k._saveOptions(i, t) : i.data("jqv"), s = k._validateFields(this), setTimeout(function () {
                    i.removeClass("validating")
                }, 100), s && e.onSuccess ? e.onSuccess() : !s && e.onFailure && e.onFailure()
            } else {
                if (!i.is("form") && !i.hasClass("validationEngineContainer")) {
                    var o = i.closest("form, .validationEngineContainer");
                    return e = o.data("jqv") ? o.data("jqv") : $.validationEngine.defaults, (s = k._validateField(i, e)) && e.onFieldSuccess ? e.onFieldSuccess() : e.onFieldFailure && 0 < e.InvalidFields.length && e.onFieldFailure(), !s
                }
                i.removeClass("validating")
            }
            return e.onValidationComplete ? !!e.onValidationComplete(o, s) : s
        },
        updatePromptsPosition: function (t) {
            if (t && this == window) var s = t.data.formElem,
                o = t.data.noAnimation; else s = $(this.closest("form, .validationEngineContainer"));
            var n = s.data("jqv");
            return n || (n = k._saveOptions(s, n)), s.find("[" + n.validateAttribute + "*=validate]").not(":disabled").each(function () {
                var t = $(this);
                n.prettySelect && t.is(":hidden") && (t = s.find("#" + n.usePrefix + t.attr("id") + n.useSuffix));
                var e = k._getPrompt(t), i = $(e).find(".formErrorContent").html();
                e && k._updatePrompt(t, $(e), i, void 0, !1, n, o)
            }), this
        },
        showPrompt: function (t, e, i, s) {
            var o = this.closest("form, .validationEngineContainer").data("jqv");
            return o || (o = k._saveOptions(this, o)), i && (o.promptPosition = i), o.showArrow = 1 == s, k._showPrompt(this, t, e, !1, o), this
        },
        hide: function () {
            var t = $(this).closest("form, .validationEngineContainer"), e = t.data("jqv");
            e || (e = k._saveOptions(t, e));
            var i, s = e && e.fadeDuration ? e.fadeDuration : .3;
            return i = t.is("form") || t.hasClass("validationEngineContainer") ? "parentForm" + k._getClassName($(t).attr("id")) : k._getClassName($(t).attr("id")) + "formError", $("." + i).fadeTo(s, 0, function () {
                $(this).closest(".formError").remove()
            }), this
        },
        hideAll: function () {
            var t = this.data("jqv"), e = t ? t.fadeDuration : 300;
            return $(".formError").fadeTo(e, 0, function () {
                $(this).closest(".formError").remove()
            }), this
        },
        _onFieldEvent: function (t) {
            var e = $(this), i = e.closest("form, .validationEngineContainer"), s = i.data("jqv");
            s || (s = k._saveOptions(i, s)), s.eventTrigger = "field", 1 == s.notEmpty ? 0 < e.val().length && window.setTimeout(function () {
                k._validateField(e, s)
            }, t.data ? t.data.delay : 0) : window.setTimeout(function () {
                k._validateField(e, s)
            }, t.data ? t.data.delay : 0)
        },
        _onSubmitEvent: function () {
            var t = $(this), e = t.data("jqv");
            if (t.data("jqv_submitButton")) {
                var i = $("#" + t.data("jqv_submitButton"));
                if (i && 0 < i.length && (i.hasClass("validate-skip") || "true" == i.attr("data-validation-engine-skip"))) return !0
            }
            e.eventTrigger = "submit";
            var s = k._validateFields(t);
            return s && e.ajaxFormValidation ? (k._validateFormWithAjax(t, e), !1) : e.onValidationComplete ? !!e.onValidationComplete(t, s) : s
        },
        _checkAjaxStatus: function (t) {
            var i = !0;
            return $.each(t.ajaxValidCache, function (t, e) {
                if (!e) return i = !1
            }), i
        },
        _checkAjaxFieldStatus: function (t, e) {
            return 1 == e.ajaxValidCache[t]
        },
        _validateFields: function (i) {
            var s = i.data("jqv"), o = !1;
            i.trigger("jqv.form.validating");
            var n = null;
            if (i.find("[" + s.validateAttribute + "*=validate]").not(":disabled").each(function () {
                var t = $(this), e = [];
                if ($.inArray(t.attr("name"), e) < 0) {
                    if ((o |= k._validateField(t, s)) && null == n && (n = t.is(":hidden") && s.prettySelect ? t = i.find("#" + s.usePrefix + k._jqSelector(t.attr("id")) + s.useSuffix) : (t.data("jqv-prompt-at") instanceof jQuery ? t = t.data("jqv-prompt-at") : t.data("jqv-prompt-at") && (t = $(t.data("jqv-prompt-at"))), t)), s.doNotShowAllErrosOnSubmit) return !1;
                    if (e.push(t.attr("name")), 1 == s.showOneMessage && o) return !1
                }
            }), i.trigger("jqv.form.result", [o]), o) {
                if (s.scroll) {
                    var t = n.offset().top, e = n.offset().left, a = s.promptPosition;
                    if ("string" == typeof a && -1 != a.indexOf(":") && (a = a.substring(0, a.indexOf(":"))), "bottomRight" != a && "bottomLeft" != a) {
                        var r = k._getPrompt(n);
                        r && (t = r.offset().top)
                    }
                    if (s.scrollOffset && (t -= s.scrollOffset), s.isOverflown) {
                        var l = $(s.overflownDIV);
                        if (!l.length) return !1;
                        t += l.scrollTop() + -parseInt(l.offset().top) - 5, $(s.overflownDIV).filter(":not(:animated)").animate({scrollTop: t}, 1100, function () {
                            s.focusFirstField && n.focus()
                        })
                    } else $("html, body").animate({scrollTop: t}, 1100, function () {
                        s.focusFirstField && n.focus()
                    }), $("html, body").animate({scrollLeft: e}, 1100)
                } else s.focusFirstField && n.focus();
                return !1
            }
            return !0
        },
        _validateFormWithAjax: function (l, c) {
            var t = l.serialize(), e = c.ajaxFormValidationMethod ? c.ajaxFormValidationMethod : "GET",
                i = c.ajaxFormValidationURL ? c.ajaxFormValidationURL : l.attr("action"),
                d = c.dataType ? c.dataType : "json";
            $.ajax({
                type: e,
                url: i,
                cache: !1,
                dataType: d,
                data: t,
                form: l,
                methods: k,
                options: c,
                beforeSend: function () {
                    return c.onBeforeAjaxFormValidation(l, c)
                },
                error: function (t, e) {
                    c.onFailure ? c.onFailure(t, e) : k._ajaxError(t, e)
                },
                success: function (t) {
                    if ("json" == d && !0 !== t) {
                        for (var e = !1, i = 0; i < t.length; i++) {
                            var s = t[i], o = s[0], n = $($("#" + o)[0]);
                            if (1 == n.length) {
                                var a, r = s[2];
                                if (1 == s[1]) "" != r && r ? (c.allrules[r] && (a = c.allrules[r].alertTextOk) && (r = a), c.showPrompts && k._showPrompt(n, r, "pass", !1, c, !0)) : k._closePrompt(n); else e |= !0, c.allrules[r] && (a = c.allrules[r].alertText) && (r = a), c.showPrompts && k._showPrompt(n, r, "", !1, c, !0)
                            }
                        }
                        c.onAjaxFormComplete(!e, l, t, c)
                    } else c.onAjaxFormComplete(!0, l, t, c)
                }
            })
        },
        _validateField: function (t, e, i) {
            if (t.attr("id") || (t.attr("id", "form-validation-field-" + $.validationEngine.fieldIdCounter), ++$.validationEngine.fieldIdCounter), t.hasClass(e.ignoreFieldsWithClass)) return !1;
            if (!e.validateNonVisibleFields && (t.is(":hidden") && !e.prettySelect || t.parent().is(":hidden"))) return !1;
            var s = t.attr(e.validateAttribute), o = /validate\[(.*)\]/.exec(s);
            if (!o) return !1;
            var n = o[1], a = n.split(/\[|,|\]/), r = t.attr("name"), l = "", c = "", d = !1, h = !1;
            e.isError = !1, e.showArrow = 1 == e.showArrow, 0 < e.maxErrorsPerField && (h = !0);
            for (var p = $(t.closest("form, .validationEngineContainer")), u = 0; u < a.length; u++) a[u] = a[u].toString().replace(" ", ""), "" === a[u] && delete a[u];
            for (var f = u = 0; u < a.length; u++) {
                if (h && f >= e.maxErrorsPerField) {
                    if (!d) {
                        var m = $.inArray("required", a);
                        d = -1 != m && u <= m
                    }
                    break
                }
                var g = void 0;
                switch (a[u]) {
                    case"required":
                        d = !0, g = k._getErrorMessage(p, t, a[u], a, u, e, k._required);
                        break;
                    case"custom":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._custom);
                        break;
                    case"groupRequired":
                        var v = "[" + e.validateAttribute + "*=" + a[u + 1] + "]", b = p.find(v).eq(0);
                        b[0] != t[0] && (k._validateField(b, e, i), e.showArrow = !0), (g = k._getErrorMessage(p, t, a[u], a, u, e, k._groupRequired)) && (d = !0), e.showArrow = !1;
                        break;
                    case"ajax":
                        (g = k._ajax(t, a, u, e)) && (c = "load");
                        break;
                    case"minSize":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._minSize);
                        break;
                    case"maxSize":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._maxSize);
                        break;
                    case"min":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._min);
                        break;
                    case"max":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._max);
                        break;
                    case"past":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._past);
                        break;
                    case"future":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._future);
                        break;
                    case"dateRange":
                        v = "[" + e.validateAttribute + "*=" + a[u + 1] + "]", e.firstOfGroup = p.find(v).eq(0), e.secondOfGroup = p.find(v).eq(1), (e.firstOfGroup[0].value || e.secondOfGroup[0].value) && (g = k._getErrorMessage(p, t, a[u], a, u, e, k._dateRange)), g && (d = !0), e.showArrow = !1;
                        break;
                    case"dateTimeRange":
                        v = "[" + e.validateAttribute + "*=" + a[u + 1] + "]", e.firstOfGroup = p.find(v).eq(0), e.secondOfGroup = p.find(v).eq(1), (e.firstOfGroup[0].value || e.secondOfGroup[0].value) && (g = k._getErrorMessage(p, t, a[u], a, u, e, k._dateTimeRange)), g && (d = !0), e.showArrow = !1;
                        break;
                    case"maxCheckbox":
                        t = $(p.find("input[name='" + r + "']")), g = k._getErrorMessage(p, t, a[u], a, u, e, k._maxCheckbox);
                        break;
                    case"minCheckbox":
                        t = $(p.find("input[name='" + r + "']")), g = k._getErrorMessage(p, t, a[u], a, u, e, k._minCheckbox);
                        break;
                    case"equals":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._equals);
                        break;
                    case"funcCall":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._funcCall);
                        break;
                    case"creditCard":
                        g = k._getErrorMessage(p, t, a[u], a, u, e, k._creditCard);
                        break;
                    case"condRequired":
                        void 0 !== (g = k._getErrorMessage(p, t, a[u], a, u, e, k._condRequired)) && (d = !0);
                        break;
                    case"funcCallRequired":
                        void 0 !== (g = k._getErrorMessage(p, t, a[u], a, u, e, k._funcCallRequired)) && (d = !0)
                }
                var _ = !1;
                if ("object" == typeof g) switch (g.status) {
                    case"_break":
                        _ = !0;
                        break;
                    case"_error":
                        g = g.message;
                        break;
                    case"_error_no_prompt":
                        return !0
                }
                if (0 == u && 0 == n.indexOf("funcCallRequired") && void 0 !== g && ("" != l && (l += "<br/>"), l += g, f++, _ = e.isError = !0), _) break;
                "string" == typeof g && ("" != l && (l += "<br/>"), l += g, e.isError = !0, f++)
            }
            !d && !t.val() && t.val().length < 1 && $.inArray("equals", a) < 0 && (e.isError = !1);
            var y = t.prop("type"), w = t.data("promptPosition") || e.promptPosition;
            ("radio" == y || "checkbox" == y) && 1 < p.find("input[name='" + r + "']").length && (t = $("inline" === w ? p.find("input[name='" + r + "'][type!=hidden]:last") : p.find("input[name='" + r + "'][type!=hidden]:first")), e.showArrow = e.showArrowOnRadioAndCheckbox), t.is(":hidden") && e.prettySelect && (t = p.find("#" + e.usePrefix + k._jqSelector(t.attr("id")) + e.useSuffix)), e.isError && e.showPrompts ? k._showPrompt(t, l, c, !1, e) : k._closePrompt(t), t.trigger("jqv.field.result", [t, e.isError, l]);
            var x = $.inArray(t[0], e.InvalidFields);
            return -1 == x ? e.isError && e.InvalidFields.push(t[0]) : e.isError || e.InvalidFields.splice(x, 1), k._handleStatusCssClasses(t, e), e.isError && e.onFieldFailure && e.onFieldFailure(t), !e.isError && e.onFieldSuccess && e.onFieldSuccess(t), e.isError
        },
        _handleStatusCssClasses: function (t, e) {
            e.addSuccessCssClassToField && t.removeClass(e.addSuccessCssClassToField), e.addFailureCssClassToField && t.removeClass(e.addFailureCssClassToField), e.addSuccessCssClassToField && !e.isError && t.addClass(e.addSuccessCssClassToField), e.addFailureCssClassToField && e.isError && t.addClass(e.addFailureCssClassToField)
        },
        _getErrorMessage: function (t, e, i, s, o, n, a) {
            var r = jQuery.inArray(i, s);
            "custom" !== i && "funcCall" !== i && "funcCallRequired" !== i || (i = i + "[" + s[r + 1] + "]", delete s[r]);
            var l, c = i,
                d = (e.attr("data-validation-engine") ? e.attr("data-validation-engine") : e.attr("class")).split(" ");
            if (null != (l = "future" == i || "past" == i || "maxCheckbox" == i || "minCheckbox" == i ? a(t, e, s, o, n) : a(e, s, o, n))) {
                var h = k._getCustomErrorMessage($(e), d, c, n);
                h && (l = h)
            }
            return l
        },
        _getCustomErrorMessage: function (t, e, i, s) {
            var o = !1, n = /^custom\[.*\]$/.test(i) ? k._validityProp.custom : k._validityProp[i];
            if (null != n && null != (o = t.attr("data-errormessage-" + n))) return o;
            if (null != (o = t.attr("data-errormessage"))) return o;
            var a = "#" + t.attr("id");
            if (void 0 !== s.custom_error_messages[a] && void 0 !== s.custom_error_messages[a][i]) o = s.custom_error_messages[a][i].message; else if (0 < e.length) for (var r = 0; r < e.length && 0 < e.length; r++) {
                var l = "." + e[r];
                if (void 0 !== s.custom_error_messages[l] && void 0 !== s.custom_error_messages[l][i]) {
                    o = s.custom_error_messages[l][i].message;
                    break
                }
            }
            return o || void 0 === s.custom_error_messages[i] || void 0 === s.custom_error_messages[i].message || (o = s.custom_error_messages[i].message), o
        },
        _validityProp: {
            required: "value-missing",
            custom: "custom-error",
            groupRequired: "value-missing",
            ajax: "custom-error",
            minSize: "range-underflow",
            maxSize: "range-overflow",
            min: "range-underflow",
            max: "range-overflow",
            past: "type-mismatch",
            future: "type-mismatch",
            dateRange: "type-mismatch",
            dateTimeRange: "type-mismatch",
            maxCheckbox: "range-overflow",
            minCheckbox: "range-underflow",
            equals: "pattern-mismatch",
            funcCall: "custom-error",
            funcCallRequired: "custom-error",
            creditCard: "pattern-mismatch",
            condRequired: "value-missing"
        },
        _required: function (t, e, i, s, o) {
            switch (t.prop("type")) {
                case"radio":
                case"checkbox":
                    if (o) {
                        if (!t.prop("checked")) return s.allrules[e[i]].alertTextCheckboxMultiple;
                        break
                    }
                    var n = t.closest("form, .validationEngineContainer"), a = t.attr("name");
                    if (0 == n.find("input[name='" + a + "']:checked").length) return 1 == n.find("input[name='" + a + "']:visible").length ? s.allrules[e[i]].alertTextCheckboxe : s.allrules[e[i]].alertTextCheckboxMultiple;
                    break;
                case"text":
                case"password":
                case"textarea":
                case"file":
                case"select-one":
                case"select-multiple":
                default:
                    var r = $.trim(t.val()), l = $.trim(t.attr("data-validation-placeholder")),
                        c = $.trim(t.attr("placeholder"));
                    if (!r || l && r == l || c && r == c) return s.allrules[e[i]].alertText
            }
        },
        _groupRequired: function (t, e, i, s) {
            var o = "[" + s.validateAttribute + "*=" + e[i + 1] + "]", n = !1;
            if (t.closest("form, .validationEngineContainer").find(o).each(function () {
                if (!k._required($(this), e, i, s)) return !(n = !0)
            }), !n) return s.allrules[e[i]].alertText
        },
        _custom: function (t, e, i, s) {
            var o, n = e[i + 1], a = s.allrules[n];
            if (a) if (a.regex) {
                var r = a.regex;
                if (!r) return void alert("jqv:custom regex not found - " + n);
                if (!new RegExp(r).test(t.val())) return s.allrules[n].alertText
            } else {
                if (!a.func) return void alert("jqv:custom type not allowed " + n);
                if ("function" != typeof (o = a.func)) return void alert("jqv:custom parameter 'function' is no function - " + n);
                if (!o(t, e, i, s)) return s.allrules[n].alertText
            } else alert("jqv:custom rule not found - " + n)
        },
        _funcCall: function (t, e, i, s) {
            var o, n = e[i + 1];
            if (-1 < n.indexOf(".")) {
                for (var a = n.split("."), r = window; a.length;) r = r[a.shift()];
                o = r
            } else o = window[n] || s.customFunctions[n];
            if ("function" == typeof o) return o(t, e, i, s)
        },
        _funcCallRequired: function (t, e, i, s) {
            return k._funcCall(t, e, i, s)
        },
        _equals: function (t, e, i, s) {
            var o = e[i + 1];
            if (t.val() != $("#" + o).val()) return s.allrules.equals.alertText
        },
        _maxSize: function (t, e, i, s) {
            var o = e[i + 1];
            if (o < t.val().length) {
                var n = s.allrules.maxSize;
                return n.alertText + o + n.alertText2
            }
        },
        _minSize: function (t, e, i, s) {
            var o = e[i + 1];
            if (t.val().length < o) {
                var n = s.allrules.minSize;
                return n.alertText + o + n.alertText2
            }
        },
        _min: function (t, e, i, s) {
            var o = parseFloat(e[i + 1]);
            if (parseFloat(t.val()) < o) {
                var n = s.allrules.min;
                return n.alertText2 ? n.alertText + o + n.alertText2 : n.alertText + o
            }
        },
        _max: function (t, e, i, s) {
            var o = parseFloat(e[i + 1]);
            if (o < parseFloat(t.val())) {
                var n = s.allrules.max;
                return n.alertText2 ? n.alertText + o + n.alertText2 : n.alertText + o
            }
        },
        _past: function (t, e, i, s, o) {
            var n, a = i[s + 1], r = $(t.find("*[name='" + a.replace(/^#+/, "") + "']"));
            if ("now" == a.toLowerCase()) n = new Date; else if (null != r.val()) {
                if (r.is(":disabled")) return;
                n = k._parseDate(r.val())
            } else n = k._parseDate(a);
            if (n < k._parseDate(e.val())) {
                var l = o.allrules.past;
                return l.alertText2 ? l.alertText + k._dateToString(n) + l.alertText2 : l.alertText + k._dateToString(n)
            }
        },
        _future: function (t, e, i, s, o) {
            var n, a = i[s + 1], r = $(t.find("*[name='" + a.replace(/^#+/, "") + "']"));
            if ("now" == a.toLowerCase()) n = new Date; else if (null != r.val()) {
                if (r.is(":disabled")) return;
                n = k._parseDate(r.val())
            } else n = k._parseDate(a);
            if (k._parseDate(e.val()) < n) {
                var l = o.allrules.future;
                return l.alertText2 ? l.alertText + k._dateToString(n) + l.alertText2 : l.alertText + k._dateToString(n)
            }
        },
        _isDate: function (t) {
            return new RegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/).test(t)
        },
        _isDateTime: function (t) {
            return new RegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/).test(t)
        },
        _dateCompare: function (t, e) {
            return new Date(t.toString()) < new Date(e.toString())
        },
        _dateRange: function (t, e, i, s) {
            return !s.firstOfGroup[0].value && s.secondOfGroup[0].value || s.firstOfGroup[0].value && !s.secondOfGroup[0].value ? s.allrules[e[i]].alertText + s.allrules[e[i]].alertText2 : k._isDate(s.firstOfGroup[0].value) && k._isDate(s.secondOfGroup[0].value) && k._dateCompare(s.firstOfGroup[0].value, s.secondOfGroup[0].value) ? void 0 : s.allrules[e[i]].alertText + s.allrules[e[i]].alertText2
        },
        _dateTimeRange: function (t, e, i, s) {
            return !s.firstOfGroup[0].value && s.secondOfGroup[0].value || s.firstOfGroup[0].value && !s.secondOfGroup[0].value ? s.allrules[e[i]].alertText + s.allrules[e[i]].alertText2 : k._isDateTime(s.firstOfGroup[0].value) && k._isDateTime(s.secondOfGroup[0].value) && k._dateCompare(s.firstOfGroup[0].value, s.secondOfGroup[0].value) ? void 0 : s.allrules[e[i]].alertText + s.allrules[e[i]].alertText2
        },
        _maxCheckbox: function (t, e, i, s, o) {
            var n = i[s + 1], a = e.attr("name");
            if (n < t.find("input[name='" + a + "']:checked").length) return o.showArrow = !1, o.allrules.maxCheckbox.alertText2 ? o.allrules.maxCheckbox.alertText + " " + n + " " + o.allrules.maxCheckbox.alertText2 : o.allrules.maxCheckbox.alertText
        },
        _minCheckbox: function (t, e, i, s, o) {
            var n = i[s + 1], a = e.attr("name");
            if (t.find("input[name='" + a + "']:checked").length < n) return o.showArrow = !1, o.allrules.minCheckbox.alertText + " " + n + " " + o.allrules.minCheckbox.alertText2
        },
        _creditCard: function (t, e, i, s) {
            var o = !1, n = t.val().replace(/ +/g, "").replace(/-+/g, ""), a = n.length;
            if (14 <= a && a <= 16 && 0 < parseInt(n)) {
                for (var r, l = 0, c = (i = a - 1, 1), d = new String; r = parseInt(n.charAt(i)), d += c++ % 2 == 0 ? 2 * r : r, 0 <= --i;) ;
                for (i = 0; i < d.length; i++) l += parseInt(d.charAt(i));
                o = l % 10 == 0
            }
            if (!o) return s.allrules.creditCard.alertText
        },
        _ajax: function (a, t, e, r) {
            var i = t[e + 1], l = r.allrules[i], s = l.extraData, o = l.extraDataDynamic,
                n = {fieldId: a.attr("id"), fieldValue: a.val()};
            if ("object" == typeof s) $.extend(n, s); else if ("string" == typeof s) {
                var c = s.split("&");
                for (e = 0; e < c.length; e++) {
                    var d = c[e].split("=");
                    d[0] && d[0] && (n[d[0]] = d[1])
                }
            }
            if (o) {
                var h = String(o).split(",");
                for (e = 0; e < h.length; e++) {
                    var p = h[e];
                    if ($(p).length) {
                        var u = a.closest("form, .validationEngineContainer").find(p).val();
                        p.replace("#", ""), escape(u), n[p.replace("#", "")] = u
                    }
                }
            }
            if ("field" == r.eventTrigger && delete r.ajaxValidCache[a.attr("id")], !r.isError && !k._checkAjaxFieldStatus(a.attr("id"), r)) return $.ajax({
                type: r.ajaxFormValidationMethod,
                url: l.url,
                cache: !1,
                dataType: "json",
                data: n,
                field: a,
                rule: l,
                methods: k,
                options: r,
                beforeSend: function () {
                },
                error: function (t, e) {
                    r.onFailure ? r.onFailure(t, e) : k._ajaxError(t, e)
                },
                success: function (t) {
                    var e = t[0], i = $("#" + e).eq(0);
                    if (1 == i.length) {
                        var s, o = t[1], n = t[2];
                        if (o) r.ajaxValidCache[e] = !0, n ? r.allrules[n] && (s = r.allrules[n].alertTextOk) && (n = s) : n = l.alertTextOk, r.showPrompts && (n ? k._showPrompt(i, n, "pass", !0, r) : k._closePrompt(i)), "submit" == r.eventTrigger && a.closest("form").submit(); else r.ajaxValidCache[e] = !1, r.isError = !0, n ? r.allrules[n] && (s = r.allrules[n].alertText) && (n = s) : n = l.alertText, r.showPrompts && k._showPrompt(i, n, "", !0, r)
                    }
                    i.trigger("jqv.field.result", [i, r.isError, n])
                }
            }), l.alertTextLoad
        },
        _ajaxError: function (t, e) {
            0 == t.status && null == e ? alert("The page is not served from a server! ajax call failed") : "undefined" != typeof console && console.log("Ajax error: " + t.status + " " + e)
        },
        _dateToString: function (t) {
            return t.getFullYear() + "-" + (t.getMonth() + 1) + "-" + t.getDate()
        },
        _parseDate: function (t) {
            var e = t.split("-");
            return e == t && (e = t.split("/")), e == t ? (e = t.split("."), new Date(e[2], e[1] - 1, e[0])) : new Date(e[0], e[1] - 1, e[2])
        },
        _showPrompt: function (t, e, i, s, o, n) {
            t.data("jqv-prompt-at") instanceof jQuery ? t = t.data("jqv-prompt-at") : t.data("jqv-prompt-at") && (t = $(t.data("jqv-prompt-at")));
            var a = k._getPrompt(t);
            n && (a = !1), $.trim(e) && (a ? k._updatePrompt(t, a, e, i, s, o) : k._buildPrompt(t, e, i, s, o))
        },
        _buildPrompt: function (t, e, i, s, o) {
            var n = $("<div>");
            switch (n.addClass(k._getClassName(t.attr("id")) + "formError"), n.addClass("parentForm" + k._getClassName(t.closest("form, .validationEngineContainer").attr("id"))), n.addClass("formError"), i) {
                case"pass":
                    n.addClass("greenPopup");
                    break;
                case"load":
                    n.addClass("blackPopup")
            }
            s && n.addClass("ajaxed"), $("<div>").addClass("formErrorContent").html(e).appendTo(n);
            var a = t.data("promptPosition") || o.promptPosition;
            if (o.showArrow) {
                var r = $("<div>").addClass("formErrorArrow");
                switch ("string" == typeof a && -1 != (d = a.indexOf(":")) && (a = a.substring(0, d)), a) {
                    case"bottomLeft":
                    case"bottomRight":
                        n.find(".formErrorContent").before(r), r.addClass("formErrorArrowBottom");
                        break;
                    case"topLeft":
                    case"topRight":
                        r.html('<div class="line10">\x3c!-- --\x3e</div><div class="line9">\x3c!-- --\x3e</div><div class="line8">\x3c!-- --\x3e</div><div class="line7">\x3c!-- --\x3e</div><div class="line6">\x3c!-- --\x3e</div><div class="line5">\x3c!-- --\x3e</div><div class="line4">\x3c!-- --\x3e</div><div class="line3">\x3c!-- --\x3e</div><div class="line2">\x3c!-- --\x3e</div><div class="line1">\x3c!-- --\x3e</div>'), n.append(r)
                }
            }
            o.addPromptClass && n.addClass(o.addPromptClass);
            var l = t.attr("data-required-class");
            if (void 0 !== l) n.addClass(l); else if (o.prettySelect && $("#" + t.attr("id")).next().is("select")) {
                var c = $("#" + t.attr("id").substr(o.usePrefix.length).substring(o.useSuffix.length)).attr("data-required-class");
                void 0 !== c && n.addClass(c)
            }
            n.css({opacity: 0}), "inline" === a ? (n.addClass("inline"), void 0 !== t.attr("data-prompt-target") && 0 < $("#" + t.attr("data-prompt-target")).length ? n.appendTo($("#" + t.attr("data-prompt-target"))) : t.after(n)) : t.before(n);
            var d = k._calculatePosition(t, n, o);
            return $("body").hasClass("rtl") ? n.css({
                position: "inline" === a ? "relative" : "absolute",
                top: d.callerTopPosition,
                left: "initial",
                right: d.callerleftPosition,
                marginTop: d.marginTopSize,
                opacity: 0
            }).data("callerField", t) : n.css({
                position: "inline" === a ? "relative" : "absolute",
                top: d.callerTopPosition,
                left: d.callerleftPosition,
                right: "initial",
                marginTop: d.marginTopSize,
                opacity: 0
            }).data("callerField", t), o.autoHidePrompt && setTimeout(function () {
                n.animate({opacity: 0}, function () {
                    n.closest(".formError").remove()
                })
            }, o.autoHideDelay), n.animate({opacity: .87})
        },
        _updatePrompt: function (t, e, i, s, o, n, a) {
            if (e) {
                void 0 !== s && ("pass" == s ? e.addClass("greenPopup") : e.removeClass("greenPopup"), "load" == s ? e.addClass("blackPopup") : e.removeClass("blackPopup")), o ? e.addClass("ajaxed") : e.removeClass("ajaxed"), e.find(".formErrorContent").html(i);
                var r = k._calculatePosition(t, e, n);
                if ($("body").hasClass("rtl")) var l = {
                    top: r.callerTopPosition,
                    left: "initial",
                    right: r.callerleftPosition,
                    marginTop: r.marginTopSize,
                    opacity: .87
                }; else l = {
                    top: r.callerTopPosition,
                    left: r.callerleftPosition,
                    right: "initial",
                    marginTop: r.marginTopSize,
                    opacity: .87
                };
                e.css({opacity: 0, display: "block"}), a ? e.css(l) : e.animate(l)
            }
        },
        _closePrompt: function (t) {
            var e = k._getPrompt(t);
            e && e.fadeTo("fast", 0, function () {
                e.closest(".formError").remove()
            })
        },
        closePrompt: function (t) {
            return k._closePrompt(t)
        },
        _getPrompt: function (t) {
            var e = $(t).closest("form, .validationEngineContainer").attr("id"),
                i = k._getClassName(t.attr("id")) + "formError",
                s = $("." + k._escapeExpression(i) + ".parentForm" + k._getClassName(e))[0];
            if (s) return $(s)
        },
        _escapeExpression: function (t) {
            return t.replace(/([#;&,\.\+\*\~':"\!\^$\[\]\(\)=>\|])/g, "\\$1")
        },
        isRTL: function (t) {
            var e = $(document), i = $("body"),
                s = t && t.hasClass("rtl") || t && "rtl" === (t.attr("dir") || "").toLowerCase() || e.hasClass("rtl") || "rtl" === (e.attr("dir") || "").toLowerCase() || i.hasClass("rtl") || "rtl" === (i.attr("dir") || "").toLowerCase();
            return Boolean(s)
        },
        _calculatePosition: function (t, e, i) {
            var s, o, n, a = t.width(), r = t.position().left, l = t.position().top;
            t.height(), s = o = 0, n = -e.height();
            var c = t.data("promptPosition") || i.promptPosition, d = "", h = "", p = 0, u = 0;
            switch ("string" == typeof c && -1 != c.indexOf(":") && (d = c.substring(c.indexOf(":") + 1), c = c.substring(0, c.indexOf(":")), -1 != d.indexOf(",") && (h = d.substring(d.indexOf(",") + 1), d = d.substring(0, d.indexOf(",")), u = parseInt(h), isNaN(u) && (u = 0)), p = parseInt(d), isNaN(d) && (d = 0)), c) {
                default:
                case"topRight":
                    o += r + a - 27, s += l;
                    break;
                case"topLeft":
                    s += l, o += r;
                    break;
                case"centerRight":
                    s = l + 4, n = 0, o = r + t.outerWidth(!0) + 5;
                    break;
                case"centerLeft":
                    o = r - (e.width() + 2), s = l + 4, n = 0;
                    break;
                case"bottomLeft":
                    s = l + t.height() + 5, n = 0, o = r;
                    break;
                case"bottomRight":
                    o = r + a - 27, s = l + t.height() + 5, n = 0;
                    break;
                case"inline":
                    n = s = o = 0
            }
            return {callerTopPosition: (s += u) + "px", callerleftPosition: (o += p) + "px", marginTopSize: n + "px"}
        },
        _saveOptions: function (t, e) {
            if ($.validationEngineLanguage) var i = $.validationEngineLanguage.allRules; else $.error("jQuery.validationEngine rules are not loaded, plz add localization files to the page");
            $.validationEngine.defaults.allrules = i;
            var s = $.extend(!0, {}, $.validationEngine.defaults, e);
            return t.data("jqv", s), s
        },
        _getClassName: function (t) {
            if (t) return t.replace(/:/g, "_").replace(/\./g, "_")
        },
        _jqSelector: function (t) {
            return t.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g, "\\$1")
        },
        _condRequired: function (t, e, i, s) {
            var o, n;
            for (o = i + 1; o < e.length; o++) if ((n = jQuery("#" + e[o]).first()).length && null == k._required(n, ["required"], 0, s, !0)) return k._required(t, ["required"], 0, s)
        },
        _submitButtonClick: function (t) {
            var e = $(this);
            e.closest("form, .validationEngineContainer").data("jqv_submitButton", e.attr("id"))
        }
    };
    $.fn.validationEngine = function (t) {
        var e = $(this);
        return e[0] ? "string" == typeof t && "_" != t.charAt(0) && k[t] ? ("showPrompt" != t && "hide" != t && "hideAll" != t && k.init.apply(e), k[t].apply(e, Array.prototype.slice.call(arguments, 1))) : "object" != typeof t && t ? void $.error("Method " + t + " does not exist in jQuery.validationEngine") : (k.init.apply(e, arguments), k.attach.apply(e)) : e
    }, $.validationEngine = {
        fieldIdCounter: 0,
        defaults: {
            validationEventTrigger: "blur",
            scroll: !0,
            focusFirstField: !0,
            showPrompts: !0,
            validateNonVisibleFields: !1,
            ignoreFieldsWithClass: "ignoreMe",
            promptPosition: "topRight",
            bindMethod: "bind",
            inlineAjax: !1,
            ajaxFormValidation: !1,
            ajaxFormValidationURL: !1,
            ajaxFormValidationMethod: "get",
            onAjaxFormComplete: $.noop,
            onBeforeAjaxFormValidation: $.noop,
            onValidationComplete: !1,
            doNotShowAllErrosOnSubmit: !1,
            custom_error_messages: {},
            binded: !0,
            notEmpty: !1,
            showArrow: !0,
            showArrowOnRadioAndCheckbox: !1,
            isError: !1,
            maxErrorsPerField: !1,
            ajaxValidCache: {},
            autoPositionUpdate: !1,
            InvalidFields: [],
            onFieldSuccess: !1,
            onFieldFailure: !1,
            onSuccess: !1,
            onFailure: !1,
            validateAttribute: "class",
            addSuccessCssClassToField: "",
            addFailureCssClassToField: "",
            autoHidePrompt: !1,
            autoHideDelay: 1e4,
            fadeDuration: 300,
            prettySelect: !1,
            addPromptClass: "",
            usePrefix: "",
            useSuffix: "",
            showOneMessage: !1
        }
    }, $(function () {
        $.validationEngine.defaults.promptPosition = k.isRTL() ? "topLeft" : "topRight"
    })
}(jQuery), function (t) {
    t.fn.validationEngineLanguage = function () {
    }, t.validationEngineLanguage = {
        newLang: function () {
            t.validationEngineLanguage.allRules = {
                required: {
                    regex: "none",
                    alertText: "* Необходимо заполнить",
                    alertTextCheckboxMultiple: "* Вы должны выбрать вариант",
                    alertTextCheckboxe: "* Необходимо отметить"
                },
                requiredInFunction: {
                    func: function (t, e, i, s) {
                        return "test" == t.val()
                    }, alertText: "* Значением поля должно быть test"
                },
                minSize: {regex: "none", alertText: "* Пароль должен состоять минимум из  ", alertText2: " символов"},
                maxSize: {regex: "none", alertText: "* Максимум ", alertText2: " символа(ов)"},
                groupRequired: {regex: "none", alertText: "* Вы должны заполнить одно из следующих полей"},
                min: {regex: "none", alertText: "* Минимальное значение "},
                max: {regex: "none", alertText: "* Максимальное значение "},
                past: {regex: "none", alertText: "* Дата до "},
                future: {regex: "none", alertText: "* Дата от "},
                maxCheckbox: {regex: "none", alertText: "* Нельзя выбрать столько вариантов"},
                minCheckbox: {regex: "none", alertText: "* Пожалуйста, выберите ", alertText2: " опцию(ии)"},
                equals: {regex: "none", alertText: "* Пароли не совпадают, повторите попытку!"},
                creditCard: {regex: "none", alertText: "* Неверный номер кредитной карты"},
                phone: {
                    regex: /^([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9 \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)$/,
                    alertText: "* Неправильный формат телефона"
                },
                email: {
                    regex: /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    alertText: "* Неверный формат email"
                },
                integer: {regex: /^[\-\+]?\d+$/, alertText: "* Не целое число"},
                number: {
                    regex: /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    alertText: "* Неправильное число с плавающей точкой"
                },
                date: {
                    regex: /^(0[1-9]|[12][0-9]|3[01])[ \.](0[1-9]|1[012])[ \.](19|20)\d{2}$/,
                    alertText: "* Неправильная дата (должно быть в ДД.MM.ГГГГ формате)"
                },
                dateUTF: {
                    regex: /^(19|20)\d{2}[ \.-](0[1-9]|1[012])[ \.-](0[1-9]|[12][0-9]|3[01])$/,
                    alertText: "* Неправильная дата (должно быть в ГГГГ.ММ.ДД формате)"
                },
                datetime: {
                    regex: /^(0[1-9]|[12][0-9]|3[01])[ \.-](0[1-9]|1[012])[ \.-](19|20)\d{2}[ \.-](([0,1][0-9])|(2[0-3])):[0-5][0-9]$/,
                    alertText: "* Неправильная дата (должно быть в ДД.MM.ГГГГ ЧЧ:ММ формате)"
                },
                time: {
                    regex: /^(([0,1][0-9])|(2[0-3])):[0-5][0-9]$/,
                    alertText: "* Неправильное время (должно быть в ЧЧ:ММ формате)"
                },
                ipv4: {
                    regex: /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    alertText: "* Неправильный IP-адрес"
                },
                url: {
                    regex: /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    alertText: "* Неправильный URL"
                },
                onlyNumberSp: {regex: /^[0-9\ ]+$/, alertText: "* Только числа"},
                onlyLetterSp: {regex: /^[a-zA-Z\u0400-\u04FF\ \']+$/, alertText: "* Только буквы"},
                onlyLetterNumber: {regex: /^[0-9a-zA-Z\u0400-\u04FF]+$/, alertText: "* Запрещены специальные символы"},
                ajaxUserCall: {
                    url: "ajaxValidateFieldUser",
                    extraData: "name=eric",
                    alertText: "* Этот пользователь уже занят",
                    alertTextLoad: "* Проверка, подождите..."
                },
                ajaxNameCall: {
                    url: "ajaxValidateFieldName",
                    alertText: "* Это имя уже занято",
                    alertTextOk: "* Это имя доступно",
                    alertTextLoad: "* Проверка, подождите..."
                },
                validate2fields: {alertText: "* Пожалуйста, введите HELLO"}
            }
        }
    }, t.validationEngineLanguage.newLang()
}(jQuery), function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require("jquery") : jQuery)
}(function (k) {
    var s, t = navigator.userAgent, C = /iphone/i.test(t), o = /chrome/i.test(t), T = /android/i.test(t);
    k.mask = {
        definitions: {9: "[0-9]", a: "[A-Za-z]", "*": "[A-Za-z0-9]"},
        autoclear: !0,
        dataName: "rawMaskFn",
        placeholder: "_"
    }, k.fn.extend({
        caret: function (t, e) {
            var i;
            if (0 !== this.length && !this.is(":hidden")) return "number" == typeof t ? (e = "number" == typeof e ? e : t, this.each(function () {
                this.setSelectionRange ? this.setSelectionRange(t, e) : this.createTextRange && ((i = this.createTextRange()).collapse(!0), i.moveEnd("character", e), i.moveStart("character", t), i.select())
            })) : (this[0].setSelectionRange ? (t = this[0].selectionStart, e = this[0].selectionEnd) : document.selection && document.selection.createRange && (i = document.selection.createRange(), t = 0 - i.duplicate().moveStart("character", -1e5), e = t + i.text.length), {
                begin: t,
                end: e
            })
        }, unmask: function () {
            return this.trigger("unmask")
        }, mask: function (e, v) {
            var i, b, _, y, w, x, $;
            if (!e && 0 < this.length) {
                var t = k(this[0]).data(k.mask.dataName);
                return t ? t() : void 0
            }
            return v = k.extend({
                autoclear: k.mask.autoclear,
                placeholder: k.mask.placeholder,
                completed: null
            }, v), i = k.mask.definitions, b = [], _ = x = e.length, y = null, k.each(e.split(""), function (t, e) {
                "?" == e ? (x--, _ = t) : i[e] ? (b.push(new RegExp(i[e])), null === y && (y = b.length - 1), t < _ && (w = b.length - 1)) : b.push(null)
            }), this.trigger("unmask").each(function () {
                function a() {
                    if (v.completed) {
                        for (var t = y; t <= w; t++) if (b[t] && f[t] === r(t)) return;
                        v.completed.call(u)
                    }
                }

                function r(t) {
                    return v.placeholder.charAt(t < v.placeholder.length ? t : 0)
                }

                function l(t) {
                    for (; ++t < x && !b[t];) ;
                    return t
                }

                function c(t, e) {
                    var i, s;
                    if (!(t < 0)) {
                        for (i = t, s = l(e); i < x; i++) if (b[i]) {
                            if (!(s < x && b[i].test(f[s]))) break;
                            f[i] = f[s], f[s] = r(s), s = l(s)
                        }
                        h(), u.caret(Math.max(y, t))
                    }
                }

                function n() {
                    p(), u.val() != g && u.change()
                }

                function d(t, e) {
                    var i;
                    for (i = t; i < e && i < x; i++) b[i] && (f[i] = r(i))
                }

                function h() {
                    u.val(f.join(""))
                }

                function p(t) {
                    var e, i, s, o = u.val(), n = -1;
                    for (s = e = 0; e < x; e++) if (b[e]) {
                        for (f[e] = r(e); s++ < o.length;) if (i = o.charAt(s - 1), b[e].test(i)) {
                            f[e] = i, n = e;
                            break
                        }
                        if (s > o.length) {
                            d(e + 1, x);
                            break
                        }
                    } else f[e] === o.charAt(s) && s++, e < _ && (n = e);
                    return t ? h() : n + 1 < _ ? v.autoclear || f.join("") === m ? (u.val() && u.val(""), d(0, x)) : h() : (h(), u.val(u.val().substring(0, n + 1))), _ ? e : y
                }

                var u = k(this), f = k.map(e.split(""), function (t, e) {
                    return "?" != t ? i[t] ? r(e) : t : void 0
                }), m = f.join(""), g = u.val();
                u.data(k.mask.dataName, function () {
                    return k.map(f, function (t, e) {
                        return b[e] && t != r(e) ? t : null
                    }).join("")
                }), u.one("unmask", function () {
                    u.off(".mask").removeData(k.mask.dataName)
                }).on("focus.mask", function () {
                    var t;
                    u.prop("readonly") || (clearTimeout(s), g = u.val(), t = p(), s = setTimeout(function () {
                        u.get(0) === document.activeElement && (h(), t == e.replace("?", "").length ? u.caret(0, t) : u.caret(t))
                    }, 10))
                }).on("blur.mask", n).on("keydown.mask", function (t) {
                    if (!u.prop("readonly")) {
                        var e, i, s, o = t.which || t.keyCode;
                        $ = u.val(), 8 === o || 46 === o || C && 127 === o ? (i = (e = u.caret()).begin, (s = e.end) - i == 0 && (i = 46 !== o ? function (t) {
                            for (; 0 <= --t && !b[t];) ;
                            return t
                        }(i) : s = l(i - 1), s = 46 === o ? l(s) : s), d(i, s), c(i, s - 1), t.preventDefault()) : 13 === o ? n.call(this, t) : 27 === o && (u.val(g), u.caret(0, p()), t.preventDefault())
                    }
                }).on("keypress.mask", function (t) {
                    if (!u.prop("readonly")) {
                        var n, e, i, s = t.which || t.keyCode, o = u.caret();
                        t.ctrlKey || t.altKey || t.metaKey || s < 32 || !s || 13 === s || (o.end - o.begin != 0 && (d(o.begin, o.end), c(o.begin, o.end - 1)), (n = l(o.begin - 1)) < x && (e = String.fromCharCode(s), b[n].test(e)) && (function (t) {
                            var e, i, s, o;
                            for (i = r(e = n); e < x; e++) if (b[e]) {
                                if (s = l(e), o = f[e], f[e] = i, !(s < x && b[s].test(o))) break;
                                i = o
                            }
                        }(), f[n] = e, h(), i = l(n), T ? setTimeout(function () {
                            k.proxy(k.fn.caret, u, i)()
                        }, 0) : u.caret(i), o.begin <= w && a()), t.preventDefault())
                    }
                }).on("input.mask paste.mask", function () {
                    u.prop("readonly") || setTimeout(function () {
                        var t = p(!0);
                        u.caret(t), a()
                    }, 0)
                }), o && T && u.off("input.mask").on("input.mask", function () {
                    var t = u.val(), e = u.caret();
                    if ($ && $.length && $.length > t.length) {
                        for (p(!0); 0 < e.begin && !b[e.begin - 1];) e.begin--;
                        if (0 === e.begin) for (; e.begin < y && !b[e.begin];) e.begin++;
                        u.caret(e.begin, e.begin)
                    } else {
                        for (p(!0); e.begin < x && !b[e.begin];) e.begin++;
                        u.caret(e.begin, e.begin)
                    }
                    a()
                }), p()
            })
        }
    })
});
var twoGis_map_container = "map-2gis", twoGis_cont = $("#" + twoGis_map_container);
CMS__TPL_PATH = "/local/templates/amadeus";
if (twoGis_cont.length) {
    var map, twoGis_map_data = JSON.parse(twoGis_cont.attr("data-map") || "{}"), mapCoord = twoGis_map_data.center,
        mapZoom = twoGis_map_data.zoom, placeholderCoord = twoGis_map_data.placemarks.coord,
        iconUrl = CMS__TPL_PATH + "/img/svg/icon-map.svg", iconRetinaUrl = CMS__TPL_PATH + "/img/svg/icon-map.svg",
        iconSize = [70, 90], iconAnchor = [35, 90];
    DG.then(function () {
        map = DG.map(twoGis_map_container, {
            center: mapCoord,
            zoom: mapZoom,
            scrollWheelZoom: !1,
            fullscreenControl: !1
        });
        var t = DG.icon({
            iconUrl: iconUrl,
            iconRetinaUrl: iconRetinaUrl,
            iconSize: iconSize,
            iconAnchor: iconAnchor,
            popupAnchor: [0, 0]
        });
        if (twoGis_map_data.placemarks.length) for (var e = 0; e < twoGis_map_data.placemarks.length; e++) {
            var i = '<div class="map__popup-heading">' + twoGis_map_data.placemarks[e].heading + "</div>",
                s = DG.popup({className: "map__popup"}).setContent(i);
            DG.marker(twoGis_map_data.placemarks[e].coord, {icon: t}).addTo(map).bindPopup(s)
        }
    }), $(document.body).on("click.azbn7", "[data-office]", null, function (t) {
        t.preventDefault();
        var e = $(this).attr("data-coord").split(",");
        console.dir(e);
        var i = parseFloat((e[0] || "").trim()), s = parseFloat((e[1] || "").trim());
        $("[data-office]").removeClass("is--active"), $(this).addClass("is--active"), map.setView([i, s])
    })
}
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], function (t) {
        return e(t, document, window, navigator)
    }) : "object" == typeof exports ? e(require("jquery"), document, window, navigator) : e(jQuery, document, window, navigator)
}(function (l, c, d, t, h) {
    var e, i, s = 0,
        o = (i = /msie\s\d+/i, 0 < (e = t.userAgent).search(i) && i.exec(e).toString().split(" ")[1] < 9 && (l("html").addClass("lt-ie9"), !0));
    Function.prototype.bind || (Function.prototype.bind = function (s) {
        var o = this, n = [].slice;
        if ("function" != typeof o) throw new TypeError;
        var a = n.call(arguments, 1), r = function () {
            if (this instanceof r) {
                var t = function () {
                };
                t.prototype = o.prototype;
                var e = new t, i = o.apply(e, a.concat(n.call(arguments)));
                return Object(i) === i ? i : e
            }
            return o.apply(s, a.concat(n.call(arguments)))
        };
        return r
    }), Array.prototype.indexOf || (Array.prototype.indexOf = function (t, e) {
        var i;
        if (null == this) throw new TypeError('"this" is null or not defined');
        var s = Object(this), o = s.length >>> 0;
        if (0 === o) return -1;
        var n = +e || 0;
        if (Math.abs(n) === 1 / 0 && (n = 0), o <= n) return -1;
        for (i = Math.max(0 <= n ? n : o - Math.abs(n), 0); i < o;) {
            if (i in s && s[i] === t) return i;
            i++
        }
        return -1
    });
    var n = function (t, e, i) {
        this.VERSION = "2.2.0", this.input = t, this.plugin_count = i, this.current_plugin = 0, this.calc_count = 0, this.update_tm = 0, this.old_from = 0, this.old_to = 0, this.old_min_interval = null, this.raf_id = null, this.dragging = !1, this.force_redraw = !1, this.no_diapason = !1, this.has_tab_index = !0, this.is_key = !1, this.is_update = !1, this.is_start = !0, this.is_finish = !1, this.is_active = !1, this.is_resize = !1, this.is_click = !1, e = e || {}, this.$cache = {
            win: l(d),
            body: l(c.body),
            input: l(t),
            cont: null,
            rs: null,
            min: null,
            max: null,
            from: null,
            to: null,
            single: null,
            bar: null,
            line: null,
            s_single: null,
            s_from: null,
            s_to: null,
            shad_single: null,
            shad_from: null,
            shad_to: null,
            edge: null,
            grid: null,
            grid_labels: []
        }, this.coords = {
            x_gap: 0,
            x_pointer: 0,
            w_rs: 0,
            w_rs_old: 0,
            w_handle: 0,
            p_gap: 0,
            p_gap_left: 0,
            p_gap_right: 0,
            p_step: 0,
            p_pointer: 0,
            p_handle: 0,
            p_single_fake: 0,
            p_single_real: 0,
            p_from_fake: 0,
            p_from_real: 0,
            p_to_fake: 0,
            p_to_real: 0,
            p_bar_x: 0,
            p_bar_w: 0,
            grid_gap: 0,
            big_num: 0,
            big: [],
            big_w: [],
            big_p: [],
            big_x: []
        }, this.labels = {
            w_min: 0,
            w_max: 0,
            w_from: 0,
            w_to: 0,
            w_single: 0,
            p_min: 0,
            p_max: 0,
            p_from_fake: 0,
            p_from_left: 0,
            p_to_fake: 0,
            p_to_left: 0,
            p_single_fake: 0,
            p_single_left: 0
        };
        var s, o, n, a = this.$cache.input, r = a.prop("value");
        for (n in s = {
            type: "single",
            min: 10,
            max: 100,
            from: null,
            to: null,
            step: 1,
            min_interval: 0,
            max_interval: 0,
            drag_interval: !1,
            values: [],
            p_values: [],
            from_fixed: !1,
            from_min: null,
            from_max: null,
            from_shadow: !1,
            to_fixed: !1,
            to_min: null,
            to_max: null,
            to_shadow: !1,
            prettify_enabled: !0,
            prettify_separator: " ",
            prettify: null,
            force_edges: !1,
            keyboard: !0,
            grid: !1,
            grid_margin: !0,
            grid_num: 4,
            grid_snap: !1,
            hide_min_max: !1,
            hide_from_to: !1,
            prefix: "",
            postfix: "",
            max_postfix: "",
            decorate_both: !0,
            values_separator: " — ",
            input_values_separator: ";",
            disable: !1,
            block: !1,
            extra_classes: "",
            scope: null,
            onStart: null,
            onChange: null,
            onFinish: null,
            onUpdate: null
        }, "INPUT" !== a[0].nodeName && console && console.warn && console.warn("Base element should be <input>!", a[0]), (o = {
            type: a.data("type"),
            min: a.data("min"),
            max: a.data("max"),
            from: a.data("from"),
            to: a.data("to"),
            step: a.data("step"),
            min_interval: a.data("minInterval"),
            max_interval: a.data("maxInterval"),
            drag_interval: a.data("dragInterval"),
            values: a.data("values"),
            from_fixed: a.data("fromFixed"),
            from_min: a.data("fromMin"),
            from_max: a.data("fromMax"),
            from_shadow: a.data("fromShadow"),
            to_fixed: a.data("toFixed"),
            to_min: a.data("toMin"),
            to_max: a.data("toMax"),
            to_shadow: a.data("toShadow"),
            prettify_enabled: a.data("prettifyEnabled"),
            prettify_separator: a.data("prettifySeparator"),
            force_edges: a.data("forceEdges"),
            keyboard: a.data("keyboard"),
            grid: a.data("grid"),
            grid_margin: a.data("gridMargin"),
            grid_num: a.data("gridNum"),
            grid_snap: a.data("gridSnap"),
            hide_min_max: a.data("hideMinMax"),
            hide_from_to: a.data("hideFromTo"),
            prefix: a.data("prefix"),
            postfix: a.data("postfix"),
            max_postfix: a.data("maxPostfix"),
            decorate_both: a.data("decorateBoth"),
            values_separator: a.data("valuesSeparator"),
            input_values_separator: a.data("inputValuesSeparator"),
            disable: a.data("disable"),
            block: a.data("block"),
            extra_classes: a.data("extraClasses")
        }).values = o.values && o.values.split(","), o) o.hasOwnProperty(n) && (o[n] !== h && "" !== o[n] || delete o[n]);
        r !== h && "" !== r && ((r = r.split(o.input_values_separator || e.input_values_separator || ";"))[0] && r[0] == +r[0] && (r[0] = +r[0]), r[1] && r[1] == +r[1] && (r[1] = +r[1]), e && e.values && e.values.length ? (s.from = r[0] && e.values.indexOf(r[0]), s.to = r[1] && e.values.indexOf(r[1])) : (s.from = r[0] && +r[0], s.to = r[1] && +r[1])), l.extend(s, e), l.extend(s, o), this.options = s, this.update_check = {}, this.validate(), this.result = {
            input: this.$cache.input,
            slider: null,
            min: this.options.min,
            max: this.options.max,
            from: this.options.from,
            from_percent: 0,
            from_value: null,
            to: this.options.to,
            to_percent: 0,
            to_value: null
        }, this.init()
    };
    n.prototype = {
        init: function (t) {
            this.no_diapason = !1, this.coords.p_step = this.convertToPercent(this.options.step, !0), this.target = "base", this.toggleInput(), this.append(), this.setMinMax(), t ? (this.force_redraw = !0, this.calc(!0), this.callOnUpdate()) : (this.force_redraw = !0, this.calc(!0), this.callOnStart()), this.updateScene()
        }, append: function () {
            var t = '<span class="irs js-irs-' + this.plugin_count + " " + this.options.extra_classes + '"></span>';
            this.$cache.input.before(t), this.$cache.input.prop("readonly", !0), this.$cache.cont = this.$cache.input.prev(), this.result.slider = this.$cache.cont, this.$cache.cont.html('<span class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span><span class="irs-bar"></span>'), this.$cache.rs = this.$cache.cont.find(".irs"), this.$cache.min = this.$cache.cont.find(".irs-min"), this.$cache.max = this.$cache.cont.find(".irs-max"), this.$cache.from = this.$cache.cont.find(".irs-from"), this.$cache.to = this.$cache.cont.find(".irs-to"), this.$cache.single = this.$cache.cont.find(".irs-single"), this.$cache.bar = this.$cache.cont.find(".irs-bar"), this.$cache.line = this.$cache.cont.find(".irs-line"), this.$cache.grid = this.$cache.cont.find(".irs-grid"), "single" === this.options.type ? (this.$cache.cont.append('<span class="irs-bar-edge"></span><span class="irs-shadow shadow-single"></span><span class="irs-slider single"></span>'), this.$cache.edge = this.$cache.cont.find(".irs-bar-edge"), this.$cache.s_single = this.$cache.cont.find(".single"), this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.shad_single = this.$cache.cont.find(".shadow-single")) : (this.$cache.cont.append('<span class="irs-shadow shadow-from"></span><span class="irs-shadow shadow-to"></span><span class="irs-slider from"></span><span class="irs-slider to"></span>'), this.$cache.s_from = this.$cache.cont.find(".from"), this.$cache.s_to = this.$cache.cont.find(".to"), this.$cache.shad_from = this.$cache.cont.find(".shadow-from"), this.$cache.shad_to = this.$cache.cont.find(".shadow-to"), this.setTopHandler()), this.options.hide_from_to && (this.$cache.from[0].style.display = "none", this.$cache.to[0].style.display = "none", this.$cache.single[0].style.display = "none"), this.appendGrid(), this.options.disable ? (this.appendDisableMask(), this.$cache.input[0].disabled = !0) : (this.$cache.input[0].disabled = !1, this.removeDisableMask(), this.bindEvents()), this.options.disable || (this.options.block ? this.appendDisableMask() : this.removeDisableMask()), this.options.drag_interval && (this.$cache.bar[0].style.cursor = "ew-resize")
        }, setTopHandler: function () {
            var t = this.options.min, e = this.options.max, i = this.options.from, s = this.options.to;
            t < i && s === e ? this.$cache.s_from.addClass("type_last") : s < e && this.$cache.s_to.addClass("type_last")
        }, changeLevel: function (t) {
            switch (t) {
                case"single":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_single_fake), this.$cache.s_single.addClass("state_hover");
                    break;
                case"from":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_from_fake), this.$cache.s_from.addClass("state_hover"), this.$cache.s_from.addClass("type_last"), this.$cache.s_to.removeClass("type_last");
                    break;
                case"to":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_to_fake), this.$cache.s_to.addClass("state_hover"), this.$cache.s_to.addClass("type_last"), this.$cache.s_from.removeClass("type_last");
                    break;
                case"both":
                    this.coords.p_gap_left = this.toFixed(this.coords.p_pointer - this.coords.p_from_fake), this.coords.p_gap_right = this.toFixed(this.coords.p_to_fake - this.coords.p_pointer), this.$cache.s_to.removeClass("type_last"), this.$cache.s_from.removeClass("type_last")
            }
        }, appendDisableMask: function () {
            this.$cache.cont.append('<span class="irs-disable-mask"></span>'), this.$cache.cont.addClass("irs-disabled")
        }, removeDisableMask: function () {
            this.$cache.cont.remove(".irs-disable-mask"), this.$cache.cont.removeClass("irs-disabled")
        }, remove: function () {
            this.$cache.cont.remove(), this.$cache.cont = null, this.$cache.line.off("keydown.irs_" + this.plugin_count), this.$cache.body.off("touchmove.irs_" + this.plugin_count), this.$cache.body.off("mousemove.irs_" + this.plugin_count), this.$cache.win.off("touchend.irs_" + this.plugin_count), this.$cache.win.off("mouseup.irs_" + this.plugin_count), o && (this.$cache.body.off("mouseup.irs_" + this.plugin_count), this.$cache.body.off("mouseleave.irs_" + this.plugin_count)), this.$cache.grid_labels = [], this.coords.big = [], this.coords.big_w = [], this.coords.big_p = [], this.coords.big_x = [], cancelAnimationFrame(this.raf_id)
        }, bindEvents: function () {
            this.no_diapason || (this.$cache.body.on("touchmove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.body.on("mousemove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.win.on("touchend.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.win.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.line.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.line.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.line.on("focus.irs_" + this.plugin_count, this.pointerFocus.bind(this)), this.options.drag_interval && "double" === this.options.type ? (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "both")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "both"))) : (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), "single" === this.options.type ? (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.shad_single.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.edge.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_single.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))) : (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), this.options.keyboard && this.$cache.line.on("keydown.irs_" + this.plugin_count, this.key.bind(this, "keyboard")), o && (this.$cache.body.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.body.on("mouseleave.irs_" + this.plugin_count, this.pointerUp.bind(this))))
        }, pointerFocus: function (t) {
            var e, i;
            this.target || (e = (i = "single" === this.options.type ? this.$cache.single : this.$cache.from).offset().left, e += i.width() / 2 - 1, this.pointerClick("single", {
                preventDefault: function () {
                }, pageX: e
            }))
        }, pointerMove: function (t) {
            if (this.dragging) {
                var e = t.pageX || t.originalEvent.touches && t.originalEvent.touches[0].pageX;
                this.coords.x_pointer = e - this.coords.x_gap, this.calc()
            }
        }, pointerUp: function (t) {
            this.current_plugin === this.plugin_count && this.is_active && (this.is_active = !1, this.$cache.cont.find(".state_hover").removeClass("state_hover"), this.force_redraw = !0, o && l("*").prop("unselectable", !1), this.updateScene(), this.restoreOriginalMinInterval(), (l.contains(this.$cache.cont[0], t.target) || this.dragging) && this.callOnFinish(), this.dragging = !1)
        }, pointerDown: function (t, e) {
            e.preventDefault();
            var i = e.pageX || e.originalEvent.touches && e.originalEvent.touches[0].pageX;
            2 !== e.button && ("both" === t && this.setTempMinInterval(), t || (t = this.target || "from"), this.current_plugin = this.plugin_count, this.target = t, this.is_active = !0, this.dragging = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = i - this.coords.x_gap, this.calcPointerPercent(), this.changeLevel(t), o && l("*").prop("unselectable", !0), this.$cache.line.trigger("focus"), this.updateScene())
        }, pointerClick: function (t, e) {
            e.preventDefault();
            var i = e.pageX || e.originalEvent.touches && e.originalEvent.touches[0].pageX;
            2 !== e.button && (this.current_plugin = this.plugin_count, this.target = t, this.is_click = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = +(i - this.coords.x_gap).toFixed(), this.force_redraw = !0, this.calc(), this.$cache.line.trigger("focus"))
        }, key: function (t, e) {
            if (!(this.current_plugin !== this.plugin_count || e.altKey || e.ctrlKey || e.shiftKey || e.metaKey)) {
                switch (e.which) {
                    case 83:
                    case 65:
                    case 40:
                    case 37:
                        e.preventDefault(), this.moveByKey(!1);
                        break;
                    case 87:
                    case 68:
                    case 38:
                    case 39:
                        e.preventDefault(), this.moveByKey(!0)
                }
                return !0
            }
        }, moveByKey: function (t) {
            var e = this.coords.p_pointer, i = (this.options.max - this.options.min) / 100;
            i = this.options.step / i, t ? e += i : e -= i, this.coords.x_pointer = this.toFixed(this.coords.w_rs / 100 * e), this.is_key = !0, this.calc()
        }, setMinMax: function () {
            if (this.options) {
                if (this.options.hide_min_max) return this.$cache.min[0].style.display = "none", void (this.$cache.max[0].style.display = "none");
                if (this.options.values.length) this.$cache.min.html(this.decorate(this.options.p_values[this.options.min])), this.$cache.max.html(this.decorate(this.options.p_values[this.options.max])); else {
                    var t = this._prettify(this.options.min), e = this._prettify(this.options.max);
                    this.result.min_pretty = t, this.result.max_pretty = e, this.$cache.min.html(this.decorate(t, this.options.min)), this.$cache.max.html(this.decorate(e, this.options.max))
                }
                this.labels.w_min = this.$cache.min.outerWidth(!1), this.labels.w_max = this.$cache.max.outerWidth(!1)
            }
        }, setTempMinInterval: function () {
            var t = this.result.to - this.result.from;
            null === this.old_min_interval && (this.old_min_interval = this.options.min_interval), this.options.min_interval = t
        }, restoreOriginalMinInterval: function () {
            null !== this.old_min_interval && (this.options.min_interval = this.old_min_interval, this.old_min_interval = null)
        }, calc: function (t) {
            if (this.options && (this.calc_count++, (10 === this.calc_count || t) && (this.calc_count = 0, this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.calcHandlePercent()), this.coords.w_rs)) {
                this.calcPointerPercent();
                var e = this.getHandleX();
                switch ("both" === this.target && (this.coords.p_gap = 0, e = this.getHandleX()), "click" === this.target && (this.coords.p_gap = this.coords.p_handle / 2, e = this.getHandleX(), this.options.drag_interval ? this.target = "both_one" : this.target = this.chooseHandle(e)), this.target) {
                    case"base":
                        var i = (this.options.max - this.options.min) / 100,
                            s = (this.result.from - this.options.min) / i, o = (this.result.to - this.options.min) / i;
                        this.coords.p_single_real = this.toFixed(s), this.coords.p_from_real = this.toFixed(s), this.coords.p_to_real = this.toFixed(o), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real), this.target = null;
                        break;
                    case"single":
                        if (this.options.from_fixed) break;
                        this.coords.p_single_real = this.convertToRealPercent(e), this.coords.p_single_real = this.calcWithStep(this.coords.p_single_real), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real);
                        break;
                    case"from":
                        if (this.options.from_fixed) break;
                        this.coords.p_from_real = this.convertToRealPercent(e), this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real), this.coords.p_from_real > this.coords.p_to_real && (this.coords.p_from_real = this.coords.p_to_real), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_real = this.checkMaxInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real);
                        break;
                    case"to":
                        if (this.options.to_fixed) break;
                        this.coords.p_to_real = this.convertToRealPercent(e), this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real), this.coords.p_to_real < this.coords.p_from_real && (this.coords.p_to_real = this.coords.p_from_real), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_real = this.checkMaxInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                        break;
                    case"both":
                        if (this.options.from_fixed || this.options.to_fixed) break;
                        e = this.toFixed(e + .001 * this.coords.p_handle), this.coords.p_from_real = this.convertToRealPercent(e) - this.coords.p_gap_left, this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_real = this.convertToRealPercent(e) + this.coords.p_gap_right, this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                        break;
                    case"both_one":
                        if (this.options.from_fixed || this.options.to_fixed) break;
                        var n = this.convertToRealPercent(e), a = this.result.from_percent,
                            r = this.result.to_percent - a, l = r / 2, c = n - l, d = n + l;
                        c < 0 && (d = (c = 0) + r), 100 < d && (c = (d = 100) - r), this.coords.p_from_real = this.calcWithStep(c), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_real = this.calcWithStep(d), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real)
                }
                "single" === this.options.type ? (this.coords.p_bar_x = this.coords.p_handle / 2, this.coords.p_bar_w = this.coords.p_single_fake, this.result.from_percent = this.coords.p_single_real, this.result.from = this.convertToValue(this.coords.p_single_real), this.result.from_pretty = this._prettify(this.result.from), this.options.values.length && (this.result.from_value = this.options.values[this.result.from])) : (this.coords.p_bar_x = this.toFixed(this.coords.p_from_fake + this.coords.p_handle / 2), this.coords.p_bar_w = this.toFixed(this.coords.p_to_fake - this.coords.p_from_fake), this.result.from_percent = this.coords.p_from_real, this.result.from = this.convertToValue(this.coords.p_from_real), this.result.from_pretty = this._prettify(this.result.from), this.result.to_percent = this.coords.p_to_real, this.result.to = this.convertToValue(this.coords.p_to_real), this.result.to_pretty = this._prettify(this.result.to), this.options.values.length && (this.result.from_value = this.options.values[this.result.from], this.result.to_value = this.options.values[this.result.to])), this.calcMinMax(), this.calcLabels()
            }
        }, calcPointerPercent: function () {
            this.coords.w_rs ? (this.coords.x_pointer < 0 || isNaN(this.coords.x_pointer) ? this.coords.x_pointer = 0 : this.coords.x_pointer > this.coords.w_rs && (this.coords.x_pointer = this.coords.w_rs), this.coords.p_pointer = this.toFixed(this.coords.x_pointer / this.coords.w_rs * 100)) : this.coords.p_pointer = 0
        }, convertToRealPercent: function (t) {
            return t / (100 - this.coords.p_handle) * 100
        }, convertToFakePercent: function (t) {
            return t / 100 * (100 - this.coords.p_handle)
        }, getHandleX: function () {
            var t = 100 - this.coords.p_handle, e = this.toFixed(this.coords.p_pointer - this.coords.p_gap);
            return e < 0 ? e = 0 : t < e && (e = t), e
        }, calcHandlePercent: function () {
            "single" === this.options.type ? this.coords.w_handle = this.$cache.s_single.outerWidth(!1) : this.coords.w_handle = this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100)
        }, chooseHandle: function (t) {
            return "single" === this.options.type ? "single" : this.coords.p_from_real + (this.coords.p_to_real - this.coords.p_from_real) / 2 <= t ? this.options.to_fixed ? "from" : "to" : this.options.from_fixed ? "to" : "from"
        }, calcMinMax: function () {
            this.coords.w_rs && (this.labels.p_min = this.labels.w_min / this.coords.w_rs * 100, this.labels.p_max = this.labels.w_max / this.coords.w_rs * 100)
        }, calcLabels: function () {
            this.coords.w_rs && !this.options.hide_from_to && ("single" === this.options.type ? (this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = this.coords.p_single_fake + this.coords.p_handle / 2 - this.labels.p_single_fake / 2) : (this.labels.w_from = this.$cache.from.outerWidth(!1), this.labels.p_from_fake = this.labels.w_from / this.coords.w_rs * 100, this.labels.p_from_left = this.coords.p_from_fake + this.coords.p_handle / 2 - this.labels.p_from_fake / 2, this.labels.p_from_left = this.toFixed(this.labels.p_from_left), this.labels.p_from_left = this.checkEdges(this.labels.p_from_left, this.labels.p_from_fake), this.labels.w_to = this.$cache.to.outerWidth(!1), this.labels.p_to_fake = this.labels.w_to / this.coords.w_rs * 100, this.labels.p_to_left = this.coords.p_to_fake + this.coords.p_handle / 2 - this.labels.p_to_fake / 2, this.labels.p_to_left = this.toFixed(this.labels.p_to_left), this.labels.p_to_left = this.checkEdges(this.labels.p_to_left, this.labels.p_to_fake), this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = (this.labels.p_from_left + this.labels.p_to_left + this.labels.p_to_fake) / 2 - this.labels.p_single_fake / 2, this.labels.p_single_left = this.toFixed(this.labels.p_single_left)), this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single_fake))
        }, updateScene: function () {
            this.raf_id && (cancelAnimationFrame(this.raf_id), this.raf_id = null), clearTimeout(this.update_tm), this.update_tm = null, this.options && (this.drawHandles(), this.is_active ? this.raf_id = requestAnimationFrame(this.updateScene.bind(this)) : this.update_tm = setTimeout(this.updateScene.bind(this), 300))
        }, drawHandles: function () {
            this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && (this.coords.w_rs !== this.coords.w_rs_old && (this.target = "base", this.is_resize = !0), (this.coords.w_rs !== this.coords.w_rs_old || this.force_redraw) && (this.setMinMax(), this.calc(!0), this.drawLabels(), this.options.grid && (this.calcGridMargin(), this.calcGridLabels()), this.force_redraw = !0, this.coords.w_rs_old = this.coords.w_rs, this.drawShadow()), this.coords.w_rs && (this.dragging || this.force_redraw || this.is_key) && ((this.old_from !== this.result.from || this.old_to !== this.result.to || this.force_redraw || this.is_key) && (this.drawLabels(), this.$cache.bar[0].style.left = this.coords.p_bar_x + "%", this.$cache.bar[0].style.width = this.coords.p_bar_w + "%", "single" === this.options.type ? this.$cache.s_single[0].style.left = this.coords.p_single_fake + "%" : (this.$cache.s_from[0].style.left = this.coords.p_from_fake + "%", this.$cache.s_to[0].style.left = this.coords.p_to_fake + "%", (this.old_from !== this.result.from || this.force_redraw) && (this.$cache.from[0].style.left = this.labels.p_from_left + "%"), (this.old_to !== this.result.to || this.force_redraw) && (this.$cache.to[0].style.left = this.labels.p_to_left + "%")), this.$cache.single[0].style.left = this.labels.p_single_left + "%", this.writeToInput(), this.old_from === this.result.from && this.old_to === this.result.to || this.is_start || (this.$cache.input.trigger("change"), this.$cache.input.trigger("input")), this.old_from = this.result.from, this.old_to = this.result.to, this.is_resize || this.is_update || this.is_start || this.is_finish || this.callOnChange(), (this.is_key || this.is_click) && (this.is_key = !1, this.is_click = !1, this.callOnFinish()), this.is_update = !1, this.is_resize = !1, this.is_finish = !1), this.is_start = !1, this.is_key = !1, this.is_click = !1, this.force_redraw = !1))
        }, drawLabels: function () {
            if (this.options) {
                var t, e, i, s, o, n = this.options.values.length, a = this.options.p_values;
                if (!this.options.hide_from_to) if ("single" === this.options.type) t = n ? this.decorate(a[this.result.from]) : (s = this._prettify(this.result.from), this.decorate(s, this.result.from)), this.$cache.single.html(t), this.calcLabels(), this.labels.p_single_left < this.labels.p_min + 1 ? this.$cache.min[0].style.visibility = "hidden" : this.$cache.min[0].style.visibility = "visible", this.labels.p_single_left + this.labels.p_single_fake > 100 - this.labels.p_max - 1 ? this.$cache.max[0].style.visibility = "hidden" : this.$cache.max[0].style.visibility = "visible"; else {
                    i = n ? (this.options.decorate_both ? (t = this.decorate(a[this.result.from]), t += this.options.values_separator, t += this.decorate(a[this.result.to])) : t = this.decorate(a[this.result.from] + this.options.values_separator + a[this.result.to]), e = this.decorate(a[this.result.from]), this.decorate(a[this.result.to])) : (s = this._prettify(this.result.from), o = this._prettify(this.result.to), this.options.decorate_both ? (t = this.decorate(s, this.result.from), t += this.options.values_separator, t += this.decorate(o, this.result.to)) : t = this.decorate(s + this.options.values_separator + o, this.result.to), e = this.decorate(s, this.result.from), this.decorate(o, this.result.to)), this.$cache.single.html(t), this.$cache.from.html(e), this.$cache.to.html(i), this.calcLabels();
                    var r = Math.min(this.labels.p_single_left, this.labels.p_from_left),
                        l = this.labels.p_single_left + this.labels.p_single_fake,
                        c = this.labels.p_to_left + this.labels.p_to_fake, d = Math.max(l, c);
                    this.labels.p_from_left + this.labels.p_from_fake >= this.labels.p_to_left ? (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", d = this.result.from === this.result.to ? ("from" === this.target ? this.$cache.from[0].style.visibility = "visible" : "to" === this.target ? this.$cache.to[0].style.visibility = "visible" : this.target || (this.$cache.from[0].style.visibility = "visible"), this.$cache.single[0].style.visibility = "hidden", c) : (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", Math.max(l, c))) : (this.$cache.from[0].style.visibility = "visible", this.$cache.to[0].style.visibility = "visible", this.$cache.single[0].style.visibility = "hidden"), r < this.labels.p_min + 1 ? this.$cache.min[0].style.visibility = "hidden" : this.$cache.min[0].style.visibility = "visible", d > 100 - this.labels.p_max - 1 ? this.$cache.max[0].style.visibility = "hidden" : this.$cache.max[0].style.visibility = "visible"
                }
            }
        }, drawShadow: function () {
            var t, e, i, s, o = this.options, n = this.$cache, a = "number" == typeof o.from_min && !isNaN(o.from_min),
                r = "number" == typeof o.from_max && !isNaN(o.from_max),
                l = "number" == typeof o.to_min && !isNaN(o.to_min),
                c = "number" == typeof o.to_max && !isNaN(o.to_max);
            "single" === o.type ? o.from_shadow && (a || r) ? (t = this.convertToPercent(a ? o.from_min : o.min), e = this.convertToPercent(r ? o.from_max : o.max) - t, t = this.toFixed(t - this.coords.p_handle / 100 * t), e = this.toFixed(e - this.coords.p_handle / 100 * e), t += this.coords.p_handle / 2, n.shad_single[0].style.display = "block", n.shad_single[0].style.left = t + "%", n.shad_single[0].style.width = e + "%") : n.shad_single[0].style.display = "none" : (o.from_shadow && (a || r) ? (t = this.convertToPercent(a ? o.from_min : o.min), e = this.convertToPercent(r ? o.from_max : o.max) - t, t = this.toFixed(t - this.coords.p_handle / 100 * t), e = this.toFixed(e - this.coords.p_handle / 100 * e), t += this.coords.p_handle / 2, n.shad_from[0].style.display = "block", n.shad_from[0].style.left = t + "%", n.shad_from[0].style.width = e + "%") : n.shad_from[0].style.display = "none", o.to_shadow && (l || c) ? (i = this.convertToPercent(l ? o.to_min : o.min), s = this.convertToPercent(c ? o.to_max : o.max) - i, i = this.toFixed(i - this.coords.p_handle / 100 * i), s = this.toFixed(s - this.coords.p_handle / 100 * s), i += this.coords.p_handle / 2, n.shad_to[0].style.display = "block", n.shad_to[0].style.left = i + "%", n.shad_to[0].style.width = s + "%") : n.shad_to[0].style.display = "none")
        }, writeToInput: function () {
            "single" === this.options.type ? (this.options.values.length ? this.$cache.input.prop("value", this.result.from_value) : this.$cache.input.prop("value", this.result.from), this.$cache.input.data("from", this.result.from)) : (this.options.values.length ? this.$cache.input.prop("value", this.result.from_value + this.options.input_values_separator + this.result.to_value) : this.$cache.input.prop("value", this.result.from + this.options.input_values_separator + this.result.to), this.$cache.input.data("from", this.result.from), this.$cache.input.data("to", this.result.to))
        }, callOnStart: function () {
            this.writeToInput(), this.options.onStart && "function" == typeof this.options.onStart && (this.options.scope ? this.options.onStart.call(this.options.scope, this.result) : this.options.onStart(this.result))
        }, callOnChange: function () {
            this.writeToInput(), this.options.onChange && "function" == typeof this.options.onChange && (this.options.scope ? this.options.onChange.call(this.options.scope, this.result) : this.options.onChange(this.result))
        }, callOnFinish: function () {
            this.writeToInput(), this.options.onFinish && "function" == typeof this.options.onFinish && (this.options.scope ? this.options.onFinish.call(this.options.scope, this.result) : this.options.onFinish(this.result))
        }, callOnUpdate: function () {
            this.writeToInput(), this.options.onUpdate && "function" == typeof this.options.onUpdate && (this.options.scope ? this.options.onUpdate.call(this.options.scope, this.result) : this.options.onUpdate(this.result))
        }, toggleInput: function () {
            this.$cache.input.toggleClass("irs-hidden-input"), this.has_tab_index ? this.$cache.input.prop("tabindex", -1) : this.$cache.input.removeProp("tabindex"), this.has_tab_index = !this.has_tab_index
        }, convertToPercent: function (t, e) {
            var i, s = this.options.max - this.options.min, o = s / 100;
            return s ? (i = (e ? t : t - this.options.min) / o, this.toFixed(i)) : (this.no_diapason = !0, 0)
        }, convertToValue: function (t) {
            var e, i, s = this.options.min, o = this.options.max, n = s.toString().split(".")[1],
                a = o.toString().split(".")[1], r = 0, l = 0;
            if (0 === t) return this.options.min;
            if (100 === t) return this.options.max;
            n && (r = e = n.length), a && (r = i = a.length), e && i && (r = i <= e ? e : i), s < 0 && (s = +(s + (l = Math.abs(s))).toFixed(r), o = +(o + l).toFixed(r));
            var c, d = (o - s) / 100 * t + s, h = this.options.step.toString().split(".")[1];
            return d = h ? +d.toFixed(h.length) : (d /= this.options.step, +(d *= this.options.step).toFixed(0)), l && (d -= l), (c = h ? +d.toFixed(h.length) : this.toFixed(d)) < this.options.min ? c = this.options.min : c > this.options.max && (c = this.options.max), c
        }, calcWithStep: function (t) {
            var e = Math.round(t / this.coords.p_step) * this.coords.p_step;
            return 100 < e && (e = 100), 100 === t && (e = 100), this.toFixed(e)
        }, checkMinInterval: function (t, e, i) {
            var s, o, n = this.options;
            return n.min_interval ? (s = this.convertToValue(t), o = this.convertToValue(e), "from" === i ? o - s < n.min_interval && (s = o - n.min_interval) : s - o < n.min_interval && (s = o + n.min_interval), this.convertToPercent(s)) : t
        }, checkMaxInterval: function (t, e, i) {
            var s, o, n = this.options;
            return n.max_interval ? (s = this.convertToValue(t), o = this.convertToValue(e), "from" === i ? o - s > n.max_interval && (s = o - n.max_interval) : s - o > n.max_interval && (s = o + n.max_interval), this.convertToPercent(s)) : t
        }, checkDiapason: function (t, e, i) {
            var s = this.convertToValue(t), o = this.options;
            return "number" != typeof e && (e = o.min), "number" != typeof i && (i = o.max), s < e && (s = e), i < s && (s = i), this.convertToPercent(s)
        }, toFixed: function (t) {
            return +(t = t.toFixed(20))
        }, _prettify: function (t) {
            return this.options.prettify_enabled ? this.options.prettify && "function" == typeof this.options.prettify ? this.options.prettify(t) : this.prettify(t) : t
        }, prettify: function (t) {
            return t.toString().replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + this.options.prettify_separator)
        }, checkEdges: function (t, e) {
            return this.options.force_edges && (t < 0 ? t = 0 : 100 - e < t && (t = 100 - e)), this.toFixed(t)
        }, validate: function () {
            var t, e, i = this.options, s = this.result, o = i.values, n = o.length;
            if ("string" == typeof i.min && (i.min = +i.min), "string" == typeof i.max && (i.max = +i.max), "string" == typeof i.from && (i.from = +i.from), "string" == typeof i.to && (i.to = +i.to), "string" == typeof i.step && (i.step = +i.step), "string" == typeof i.from_min && (i.from_min = +i.from_min), "string" == typeof i.from_max && (i.from_max = +i.from_max), "string" == typeof i.to_min && (i.to_min = +i.to_min), "string" == typeof i.to_max && (i.to_max = +i.to_max), "string" == typeof i.grid_num && (i.grid_num = +i.grid_num), i.max < i.min && (i.max = i.min), n) for (i.p_values = [], i.min = 0, i.max = n - 1, i.step = 1, i.grid_num = i.max, i.grid_snap = !0, e = 0; e < n; e++) t = +o[e], t = isNaN(t) ? o[e] : (o[e] = t, this._prettify(t)), i.p_values.push(t);
            ("number" != typeof i.from || isNaN(i.from)) && (i.from = i.min), ("number" != typeof i.to || isNaN(i.to)) && (i.to = i.max), "single" === i.type ? (i.from < i.min && (i.from = i.min), i.from > i.max && (i.from = i.max)) : (i.from < i.min && (i.from = i.min), i.from > i.max && (i.from = i.max), i.to < i.min && (i.to = i.min), i.to > i.max && (i.to = i.max), this.update_check.from && (this.update_check.from !== i.from && i.from > i.to && (i.from = i.to), this.update_check.to !== i.to && i.to < i.from && (i.to = i.from)), i.from > i.to && (i.from = i.to), i.to < i.from && (i.to = i.from)), ("number" != typeof i.step || isNaN(i.step) || !i.step || i.step < 0) && (i.step = 1), "number" == typeof i.from_min && i.from < i.from_min && (i.from = i.from_min), "number" == typeof i.from_max && i.from > i.from_max && (i.from = i.from_max), "number" == typeof i.to_min && i.to < i.to_min && (i.to = i.to_min), "number" == typeof i.to_max && i.from > i.to_max && (i.to = i.to_max), s && (s.min !== i.min && (s.min = i.min), s.max !== i.max && (s.max = i.max), (s.from < s.min || s.from > s.max) && (s.from = i.from), (s.to < s.min || s.to > s.max) && (s.to = i.to)), ("number" != typeof i.min_interval || isNaN(i.min_interval) || !i.min_interval || i.min_interval < 0) && (i.min_interval = 0), ("number" != typeof i.max_interval || isNaN(i.max_interval) || !i.max_interval || i.max_interval < 0) && (i.max_interval = 0), i.min_interval && i.min_interval > i.max - i.min && (i.min_interval = i.max - i.min), i.max_interval && i.max_interval > i.max - i.min && (i.max_interval = i.max - i.min)
        }, decorate: function (t, e) {
            var i = "", s = this.options;
            return s.prefix && (i += s.prefix), i += t, s.max_postfix && (s.values.length && t === s.p_values[s.max] ? (i += s.max_postfix, s.postfix && (i += " ")) : e === s.max && (i += s.max_postfix, s.postfix && (i += " "))), s.postfix && (i += s.postfix), i
        }, updateFrom: function () {
            this.result.from = this.options.from, this.result.from_percent = this.convertToPercent(this.result.from), this.result.from_pretty = this._prettify(this.result.from), this.options.values && (this.result.from_value = this.options.values[this.result.from])
        }, updateTo: function () {
            this.result.to = this.options.to, this.result.to_percent = this.convertToPercent(this.result.to), this.result.to_pretty = this._prettify(this.result.to), this.options.values && (this.result.to_value = this.options.values[this.result.to])
        }, updateResult: function () {
            this.result.min = this.options.min, this.result.max = this.options.max, this.updateFrom(), this.updateTo()
        }, appendGrid: function () {
            if (this.options.grid) {
                var t, e, i, s, o, n, a = this.options, r = a.max - a.min, l = a.grid_num, c = 0, d = 4, h = "";
                for (this.calcGridMargin(), n = a.grid_snap ? 50 < r ? (l = 50 / a.step, this.toFixed(a.step / .5)) : (l = r / a.step, this.toFixed(a.step / (r / 100))) : this.toFixed(100 / l), 4 < l && (d = 3), 7 < l && (d = 2), 14 < l && (d = 1), 28 < l && (d = 0), t = 0; t < l + 1; t++) {
                    for (i = d, 100 < (c = this.toFixed(n * t)) && (c = 100), s = ((this.coords.big[t] = c) - n * (t - 1)) / (i + 1), e = 1; e <= i && 0 !== c; e++) h += '<span class="irs-grid-pol small" style="left: ' + this.toFixed(c - s * e) + '%"></span>';
                    h += '<span class="irs-grid-pol" style="left: ' + c + '%"></span>', o = this.convertToValue(c), h += '<span class="irs-grid-text js-grid-text-' + t + '" style="left: ' + c + '%">' + (o = a.values.length ? a.p_values[o] : this._prettify(o)) + "</span>"
                }
                this.coords.big_num = Math.ceil(l + 1), this.$cache.cont.addClass("irs-with-grid"), this.$cache.grid.html(h), this.cacheGridLabels()
            }
        }, cacheGridLabels: function () {
            var t, e, i = this.coords.big_num;
            for (e = 0; e < i; e++) t = this.$cache.grid.find(".js-grid-text-" + e), this.$cache.grid_labels.push(t);
            this.calcGridLabels()
        }, calcGridLabels: function () {
            var t, e, i = [], s = [], o = this.coords.big_num;
            for (t = 0; t < o; t++) this.coords.big_w[t] = this.$cache.grid_labels[t].outerWidth(!1), this.coords.big_p[t] = this.toFixed(this.coords.big_w[t] / this.coords.w_rs * 100), this.coords.big_x[t] = this.toFixed(this.coords.big_p[t] / 2), i[t] = this.toFixed(this.coords.big[t] - this.coords.big_x[t]), s[t] = this.toFixed(i[t] + this.coords.big_p[t]);
            for (this.options.force_edges && (i[0] < -this.coords.grid_gap && (i[0] = -this.coords.grid_gap, s[0] = this.toFixed(i[0] + this.coords.big_p[0]), this.coords.big_x[0] = this.coords.grid_gap), s[o - 1] > 100 + this.coords.grid_gap && (s[o - 1] = 100 + this.coords.grid_gap, i[o - 1] = this.toFixed(s[o - 1] - this.coords.big_p[o - 1]), this.coords.big_x[o - 1] = this.toFixed(this.coords.big_p[o - 1] - this.coords.grid_gap))), this.calcGridCollision(2, i, s), this.calcGridCollision(4, i, s), t = 0; t < o; t++) e = this.$cache.grid_labels[t][0], this.coords.big_x[t] !== Number.POSITIVE_INFINITY && (e.style.marginLeft = -this.coords.big_x[t] + "%")
        }, calcGridCollision: function (t, e, i) {
            var s, o, n, a = this.coords.big_num;
            for (s = 0; s < a && !(a <= (o = s + t / 2)); s += t) n = this.$cache.grid_labels[o][0], i[s] <= e[o] ? n.style.visibility = "visible" : n.style.visibility = "hidden"
        }, calcGridMargin: function () {
            this.options.grid_margin && (this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && ("single" === this.options.type ? this.coords.w_handle = this.$cache.s_single.outerWidth(!1) : this.coords.w_handle = this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100), this.coords.grid_gap = this.toFixed(this.coords.p_handle / 2 - .1), this.$cache.grid[0].style.width = this.toFixed(100 - this.coords.p_handle) + "%", this.$cache.grid[0].style.left = this.coords.grid_gap + "%"))
        }, update: function (t) {
            this.input && (this.is_update = !0, this.options.from = this.result.from, this.options.to = this.result.to, this.update_check.from = this.result.from, this.update_check.to = this.result.to, this.options = l.extend(this.options, t), this.validate(), this.updateResult(t), this.toggleInput(), this.remove(), this.init(!0))
        }, reset: function () {
            this.input && (this.updateResult(), this.update())
        }, destroy: function () {
            this.input && (this.toggleInput(), this.$cache.input.prop("readonly", !1), l.data(this.input, "ionRangeSlider", null), this.remove(), this.input = null, this.options = null)
        }
    }, l.fn.ionRangeSlider = function (t) {
        return this.each(function () {
            l.data(this, "ionRangeSlider") || l.data(this, "ionRangeSlider", new n(this, t, s++))
        })
    }, function () {
        for (var n = 0, t = ["ms", "moz", "webkit", "o"], e = 0; e < t.length && !d.requestAnimationFrame; ++e) d.requestAnimationFrame = d[t[e] + "RequestAnimationFrame"], d.cancelAnimationFrame = d[t[e] + "CancelAnimationFrame"] || d[t[e] + "CancelRequestAnimationFrame"];
        d.requestAnimationFrame || (d.requestAnimationFrame = function (t, e) {
            var i = (new Date).getTime(), s = Math.max(0, 16 - (i - n)), o = d.setTimeout(function () {
                t(i + s)
            }, s);
            return n = i + s, o
        }), d.cancelAnimationFrame || (d.cancelAnimationFrame = function (t) {
            clearTimeout(t)
        })
    }()
}), window.matchMedia || (window.matchMedia = function () {
    var e = window.styleMedia || window.media;
    if (!e) {
        var i, s = document.createElement("style"), t = document.getElementsByTagName("script")[0];
        s.type = "text/css", s.id = "matchmediajs-test", t.parentNode.insertBefore(s, t), i = "getComputedStyle" in window && window.getComputedStyle(s, null) || s.currentStyle, e = {
            matchMedium: function (t) {
                var e = "@media " + t + "{ #matchmediajs-test { width: 1px; } }";
                return s.styleSheet ? s.styleSheet.cssText = e : s.textContent = e, "1px" === i.width
            }
        }
    }
    return function (t) {
        return {matches: e.matchMedium(t || "all"), media: t || "all"}
    }
}()), function (i, a) {
    function s(t) {
        for (var e, i, s, o, n, a, r = 0, l = (e = (t = t || {}).elements || h.getAllElements()).length; r < l; r++) if (s = (i = e[r]).nodeName.toUpperCase(), a = n = o = void 0, i[h.ns] || (i[h.ns] = {}), t.reevaluate || !i[h.ns].evaluated) {
            if ("PICTURE" === s) {
                if (h.removeVideoShim(i), !1 === (o = h.getMatch(i))) continue;
                a = i.getElementsByTagName("img")[0]
            } else o = void 0, a = i;
            a && (a[h.ns] || (a[h.ns] = {}), a.srcset && ("PICTURE" === s || a.getAttribute("sizes")) && h.dodgeSrcset(a), o ? (n = h.processSourceSet(o), h.applyBestCandidate(n, a)) : (n = h.processSourceSet(a), (void 0 === a.srcset || a.getAttribute("sizes") && a[h.ns].srcset) && h.applyBestCandidate(n, a)), i[h.ns].evaluated = !0)
        }
    }

    if (!i.HTMLPictureElement) {
        a.createElement("picture");
        var h = {ns: "picturefill"};
        h.srcsetSupported = void 0 !== (new i.Image).srcset, h.trim = function (t) {
            return t.trim ? t.trim() : t.replace(/^\s+|\s+$/g, "")
        }, h.endsWith = function (t, e) {
            return t.endsWith ? t.endsWith(e) : -1 !== t.indexOf(e, t.length - e.length)
        }, h.matchesMedia = function (t) {
            return i.matchMedia && i.matchMedia(t).matches
        }, h.getDpr = function () {
            return i.devicePixelRatio || 1
        }, h.getWidthFromLength = function (t) {
            return t = (t = t && 0 < parseFloat(t) ? t : "100vw").replace("vw", "%"), h.lengthEl || (h.lengthEl = a.createElement("div"), a.documentElement.insertBefore(h.lengthEl, a.documentElement.firstChild)), h.lengthEl.style.cssText = "position: absolute; left: 0; width: " + t + ";", h.lengthEl.offsetWidth
        }, h.types = {}, h.types["image/jpeg"] = !0, h.types["image/gif"] = !0, h.types["image/png"] = !0, h.types["image/svg+xml"] = a.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"), h.types["image/webp"] = function () {
            var t = new i.Image, e = "image/webp";
            t.onerror = function () {
                h.types[e] = !1, s()
            }, t.onload = function () {
                h.types[e] = 1 === t.width, s()
            }, t.src = "data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA="
        }, h.verifyTypeSupport = function (t) {
            var e = t.getAttribute("type");
            return null === e || "" === e || ("function" == typeof h.types[e] ? (h.types[e](), "pending") : h.types[e])
        }, h.parseSize = function (t) {
            var e = /(\([^)]+\))?\s*(.+)/g.exec(t);
            return {media: e && e[1], length: e && e[2]}
        }, h.findWidthFromSourceSize = function (t) {
            for (var e, i = h.trim(t).split(/\s*,\s*/), s = 0, o = i.length; s < o; s++) {
                var n = i[s], a = h.parseSize(n), r = a.length, l = a.media;
                if (r && (!l || h.matchesMedia(l))) {
                    e = r;
                    break
                }
            }
            return h.getWidthFromLength(e)
        }, h.getCandidatesFromSourceSet = function (t, e) {
            for (var i = h.trim(t).split(/,\s+/), s = e ? h.findWidthFromSourceSize(e) : "100%", o = [], n = 0, a = i.length; n < a; n++) {
                var r, l = i[n].split(/\s+/), c = l[1];
                !c || "w" !== c.slice(-1) && "x" !== c.slice(-1) || (c = c.slice(0, -1)), r = e ? parseFloat(parseInt(c, 10) / s) : c ? parseFloat(c, 10) : 1;
                var d = {url: l[0], resolution: r};
                o.push(d)
            }
            return o
        }, h.dodgeSrcset = function (t) {
            t.srcset && (t[h.ns].srcset = t.srcset, t.removeAttribute("srcset"))
        }, h.processSourceSet = function (t) {
            var e = t.getAttribute("srcset"), i = t.getAttribute("sizes"), s = [];
            return "IMG" === t.nodeName.toUpperCase() && t[h.ns] && t[h.ns].srcset && (e = t[h.ns].srcset), e && (s = h.getCandidatesFromSourceSet(e, i)), s
        }, h.applyBestCandidate = function (t, e) {
            var i, s, o;
            t.sort(h.ascendingSort), o = t[(s = t.length) - 1];
            for (var n = 0; n < s; n++) if ((i = t[n]).resolution >= h.getDpr()) {
                o = i;
                break
            }
            h.endsWith(e.src, o.url) || (e.src = o.url, e.currentSrc = e.src)
        }, h.ascendingSort = function (t, e) {
            return t.resolution - e.resolution
        }, h.removeVideoShim = function (t) {
            var e = t.getElementsByTagName("video");
            if (e.length) {
                for (var i = e[0], s = i.getElementsByTagName("source"); s.length;) t.insertBefore(s[0], i);
                i.parentNode.removeChild(i)
            }
        }, h.getAllElements = function () {
            for (var t = a.getElementsByTagName("picture"), e = [], i = a.getElementsByTagName("img"), s = 0, o = t.length + i.length; s < o; s++) if (s < t.length) e[s] = t[s]; else {
                var n = i[s - t.length];
                "PICTURE" !== n.parentNode.nodeName.toUpperCase() && (h.srcsetSupported && n.getAttribute("sizes") || null !== n.getAttribute("srcset")) && e.push(n)
            }
            return e
        }, h.getMatch = function (t) {
            for (var e, i = t.childNodes, s = 0, o = i.length; s < o; s++) {
                var n = i[s];
                if (1 === n.nodeType) {
                    if ("IMG" === n.nodeName.toUpperCase()) return e;
                    if ("SOURCE" === n.nodeName.toUpperCase()) {
                        var a = n.getAttribute("media");
                        if (n.getAttribute("srcset") && (!a || h.matchesMedia(a))) {
                            var r = h.verifyTypeSupport(n);
                            if (!0 === r) {
                                e = n;
                                break
                            }
                            if ("pending" === r) return !1
                        }
                    }
                }
            }
            return e
        }, function () {
            s();
            var t, e = setInterval(function () {
                return i.picturefill(), /^loaded|^i|^c/.test(a.readyState) ? void clearInterval(e) : void 0
            }, 250);
            i.addEventListener && i.addEventListener("resize", function () {
                i.clearTimeout(t), t = i.setTimeout(function () {
                    s({reevaluate: !0})
                }, 60)
            }, !1)
        }(), s._ = h, "object" == typeof module && "object" == typeof module.exports ? module.exports = s : "object" == typeof define && define.amd ? define(function () {
            return s
        }) : "object" == typeof i && (i.picturefill = s)
    }
}(this, this.document), function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function (c) {
    var o, a = window.Slick || {};
    o = 0, (a = function (t, e) {
        var i, s = this;
        s.defaults = {
            accessibility: !0,
            adaptiveHeight: !1,
            appendArrows: c(t),
            appendDots: c(t),
            arrows: !0,
            asNavFor: null,
            prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
            autoplay: !1,
            autoplaySpeed: 3e3,
            centerMode: !1,
            centerPadding: "50px",
            cssEase: "ease",
            customPaging: function (t, e) {
                return c('<button type="button" data-role="none" role="button" tabindex="0" />').text(e + 1)
            },
            dots: !1,
            dotsClass: "slick-dots",
            draggable: !0,
            easing: "linear",
            edgeFriction: .35,
            fade: !1,
            focusOnSelect: !1,
            infinite: !0,
            initialSlide: 0,
            lazyLoad: "ondemand",
            mobileFirst: !1,
            pauseOnHover: !0,
            pauseOnFocus: !0,
            pauseOnDotsHover: !1,
            respondTo: "window",
            responsive: null,
            rows: 1,
            rtl: !1,
            slide: "",
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            swipe: !0,
            swipeToSlide: !1,
            touchMove: !0,
            touchThreshold: 5,
            useCSS: !0,
            useTransform: !0,
            variableWidth: !1,
            vertical: !1,
            verticalSwiping: !1,
            waitForAnimate: !0,
            zIndex: 1e3
        }, s.initials = {
            animating: !1,
            dragging: !1,
            autoPlayTimer: null,
            currentDirection: 0,
            currentLeft: null,
            currentSlide: 0,
            direction: 1,
            $dots: null,
            listWidth: null,
            listHeight: null,
            loadIndex: 0,
            $nextArrow: null,
            $prevArrow: null,
            slideCount: null,
            slideWidth: null,
            $slideTrack: null,
            $slides: null,
            sliding: !1,
            slideOffset: 0,
            swipeLeft: null,
            $list: null,
            touchObject: {},
            transformsEnabled: !1,
            unslicked: !1
        }, c.extend(s, s.initials), s.activeBreakpoint = null, s.animType = null, s.animProp = null, s.breakpoints = [], s.breakpointSettings = [], s.cssTransitions = !1, s.focussed = !1, s.interrupted = !1, s.hidden = "hidden", s.paused = !0, s.positionProp = null, s.respondTo = null, s.rowCount = 1, s.shouldClick = !0, s.$slider = c(t), s.$slidesCache = null, s.transformType = null, s.transitionType = null, s.visibilityChange = "visibilitychange", s.windowWidth = 0, s.windowTimer = null, i = c(t).data("slick") || {}, s.options = c.extend({}, s.defaults, e, i), s.currentSlide = s.options.initialSlide, s.originalSettings = s.options, void 0 !== document.mozHidden ? (s.hidden = "mozHidden", s.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (s.hidden = "webkitHidden", s.visibilityChange = "webkitvisibilitychange"), s.autoPlay = c.proxy(s.autoPlay, s), s.autoPlayClear = c.proxy(s.autoPlayClear, s), s.autoPlayIterator = c.proxy(s.autoPlayIterator, s), s.changeSlide = c.proxy(s.changeSlide, s), s.clickHandler = c.proxy(s.clickHandler, s), s.selectHandler = c.proxy(s.selectHandler, s), s.setPosition = c.proxy(s.setPosition, s), s.swipeHandler = c.proxy(s.swipeHandler, s), s.dragHandler = c.proxy(s.dragHandler, s), s.keyHandler = c.proxy(s.keyHandler, s), s.instanceUid = o++, s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, s.registerBreakpoints(), s.init(!0)
    }).prototype.activateADA = function () {
        this.$slideTrack.find(".slick-active").attr({"aria-hidden": "false"}).find("a, input, button, select").attr({tabindex: "0"})
    }, a.prototype.addSlide = a.prototype.slickAdd = function (t, e, i) {
        var s = this;
        if ("boolean" == typeof e) i = e, e = null; else if (e < 0 || e >= s.slideCount) return !1;
        s.unload(), "number" == typeof e ? 0 === e && 0 === s.$slides.length ? c(t).appendTo(s.$slideTrack) : i ? c(t).insertBefore(s.$slides.eq(e)) : c(t).insertAfter(s.$slides.eq(e)) : !0 === i ? c(t).prependTo(s.$slideTrack) : c(t).appendTo(s.$slideTrack), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides.each(function (t, e) {
            c(e).attr("data-slick-index", t)
        }), s.$slidesCache = s.$slides, s.reinit()
    }, a.prototype.animateHeight = function () {
        var t = this;
        if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
            var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
            t.$list.animate({height: e}, t.options.speed)
        }
    }, a.prototype.animateSlide = function (t, e) {
        var i = {}, s = this;
        s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical && (t = -t), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s.$slideTrack.animate({left: t}, s.options.speed, s.options.easing, e) : s.$slideTrack.animate({top: t}, s.options.speed, s.options.easing, e) : !1 === s.cssTransitions ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft), c({animStart: s.currentLeft}).animate({animStart: t}, {
            duration: s.options.speed,
            easing: s.options.easing,
            step: function (t) {
                t = Math.ceil(t), !1 === s.options.vertical ? i[s.animType] = "translate(" + t + "px, 0px)" : i[s.animType] = "translate(0px," + t + "px)", s.$slideTrack.css(i)
            },
            complete: function () {
                e && e.call()
            }
        })) : (s.applyTransition(), t = Math.ceil(t), !1 === s.options.vertical ? i[s.animType] = "translate3d(" + t + "px, 0px, 0px)" : i[s.animType] = "translate3d(0px," + t + "px, 0px)", s.$slideTrack.css(i), e && setTimeout(function () {
            s.disableTransition(), e.call()
        }, s.options.speed))
    }, a.prototype.getNavTarget = function () {
        var t = this.options.asNavFor;
        return t && null !== t && (t = c(t).not(this.$slider)), t
    }, a.prototype.asNavFor = function (e) {
        var t = this.getNavTarget();
        null !== t && "object" == typeof t && t.each(function () {
            var t = c(this).slick("getSlick");
            t.unslicked || t.slideHandler(e, !0)
        })
    }, a.prototype.applyTransition = function (t) {
        var e = this, i = {};
        !1 === e.options.fade ? i[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : i[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e.options.fade ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
    }, a.prototype.autoPlay = function () {
        var t = this;
        t.autoPlayClear(), t.slideCount > t.options.slidesToShow && (t.autoPlayTimer = setInterval(t.autoPlayIterator, t.options.autoplaySpeed))
    }, a.prototype.autoPlayClear = function () {
        this.autoPlayTimer && clearInterval(this.autoPlayTimer)
    }, a.prototype.autoPlayIterator = function () {
        var t = this, e = t.currentSlide + t.options.slidesToScroll;
        t.paused || t.interrupted || t.focussed || (!1 === t.options.infinite && (1 === t.direction && t.currentSlide + 1 === t.slideCount - 1 ? t.direction = 0 : 0 === t.direction && (e = t.currentSlide - t.options.slidesToScroll, t.currentSlide - 1 == 0 && (t.direction = 1))), t.slideHandler(e))
    }, a.prototype.buildArrows = function () {
        var t = this;
        !0 === t.options.arrows && (t.$prevArrow = c(t.options.prevArrow).addClass("slick-arrow"), t.$nextArrow = c(t.options.nextArrow).addClass("slick-arrow"), t.slideCount > t.options.slidesToShow ? (t.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.prependTo(t.options.appendArrows), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.appendTo(t.options.appendArrows), !0 !== t.options.infinite && t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : t.$prevArrow.add(t.$nextArrow).addClass("slick-hidden").attr({
            "aria-disabled": "true",
            tabindex: "-1"
        }))
    }, a.prototype.buildDots = function () {
        var t, e, i = this;
        if (!0 === i.options.dots && i.slideCount > i.options.slidesToShow) {
            for (i.$slider.addClass("slick-dotted"), e = c("<ul />").addClass(i.options.dotsClass), t = 0; t <= i.getDotCount(); t += 1) e.append(c("<li />").append(i.options.customPaging.call(this, i, t)));
            i.$dots = e.appendTo(i.options.appendDots), i.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
        }
    }, a.prototype.buildOut = function () {
        var t = this;
        t.$slides = t.$slider.children(t.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), t.slideCount = t.$slides.length, t.$slides.each(function (t, e) {
            c(e).attr("data-slick-index", t).data("originalStyling", c(e).attr("style") || "")
        }), t.$slider.addClass("slick-slider"), t.$slideTrack = 0 === t.slideCount ? c('<div class="slick-track"/>').appendTo(t.$slider) : t.$slides.wrapAll('<div class="slick-track"/>').parent(), t.$list = t.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(), t.$slideTrack.css("opacity", 0), !0 !== t.options.centerMode && !0 !== t.options.swipeToSlide || (t.options.slidesToScroll = 1), c("img[data-lazy]", t.$slider).not("[src]").addClass("slick-loading"), t.setupInfinite(), t.buildArrows(), t.buildDots(), t.updateDots(), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), !0 === t.options.draggable && t.$list.addClass("draggable")
    }, a.prototype.buildRows = function () {
        var t, e, i, s, o, n, a, r = this;
        if (s = document.createDocumentFragment(), n = r.$slider.children(), 1 < r.options.rows) {
            for (a = r.options.slidesPerRow * r.options.rows, o = Math.ceil(n.length / a), t = 0; t < o; t++) {
                var l = document.createElement("div");
                for (e = 0; e < r.options.rows; e++) {
                    var c = document.createElement("div");
                    for (i = 0; i < r.options.slidesPerRow; i++) {
                        var d = t * a + (e * r.options.slidesPerRow + i);
                        n.get(d) && c.appendChild(n.get(d))
                    }
                    l.appendChild(c)
                }
                s.appendChild(l)
            }
            r.$slider.empty().append(s), r.$slider.children().children().children().css({
                width: 100 / r.options.slidesPerRow + "%",
                display: "inline-block"
            })
        }
    }, a.prototype.checkResponsive = function (t, e) {
        var i, s, o, n = this, a = !1, r = n.$slider.width(), l = window.innerWidth || c(window).width();
        if ("window" === n.respondTo ? o = l : "slider" === n.respondTo ? o = r : "min" === n.respondTo && (o = Math.min(l, r)), n.options.responsive && n.options.responsive.length && null !== n.options.responsive) {
            for (i in s = null, n.breakpoints) n.breakpoints.hasOwnProperty(i) && (!1 === n.originalSettings.mobileFirst ? o < n.breakpoints[i] && (s = n.breakpoints[i]) : o > n.breakpoints[i] && (s = n.breakpoints[i]));
            null !== s ? null !== n.activeBreakpoint ? (s !== n.activeBreakpoint || e) && (n.activeBreakpoint = s, "unslick" === n.breakpointSettings[s] ? n.unslick(s) : (n.options = c.extend({}, n.originalSettings, n.breakpointSettings[s]), !0 === t && (n.currentSlide = n.options.initialSlide), n.refresh(t)), a = s) : (n.activeBreakpoint = s, "unslick" === n.breakpointSettings[s] ? n.unslick(s) : (n.options = c.extend({}, n.originalSettings, n.breakpointSettings[s]), !0 === t && (n.currentSlide = n.options.initialSlide), n.refresh(t)), a = s) : null !== n.activeBreakpoint && (n.activeBreakpoint = null, n.options = n.originalSettings, !0 === t && (n.currentSlide = n.options.initialSlide), n.refresh(t), a = s), t || !1 === a || n.$slider.trigger("breakpoint", [n, a])
        }
    }, a.prototype.changeSlide = function (t, e) {
        var i, s, o = this, n = c(t.currentTarget);
        switch (n.is("a") && t.preventDefault(), n.is("li") || (n = n.closest("li")), i = o.slideCount % o.options.slidesToScroll != 0 ? 0 : (o.slideCount - o.currentSlide) % o.options.slidesToScroll, t.data.message) {
            case"previous":
                s = 0 === i ? o.options.slidesToScroll : o.options.slidesToShow - i, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide - s, !1, e);
                break;
            case"next":
                s = 0 === i ? o.options.slidesToScroll : i, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide + s, !1, e);
                break;
            case"index":
                var a = 0 === t.data.index ? 0 : t.data.index || n.index() * o.options.slidesToScroll;
                o.slideHandler(o.checkNavigable(a), !1, e), n.children().trigger("focus");
                break;
            default:
                return
        }
    }, a.prototype.checkNavigable = function (t) {
        var e, i;
        if (i = 0, t > (e = this.getNavigableIndexes())[e.length - 1]) t = e[e.length - 1]; else for (var s in e) {
            if (t < e[s]) {
                t = i;
                break
            }
            i = e[s]
        }
        return t
    }, a.prototype.cleanUpEvents = function () {
        var t = this;
        t.options.dots && null !== t.$dots && c("li", t.$dots).off("click.slick", t.changeSlide).off("mouseenter.slick", c.proxy(t.interrupt, t, !0)).off("mouseleave.slick", c.proxy(t.interrupt, t, !1)), t.$slider.off("focus.slick blur.slick"), !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow && t.$prevArrow.off("click.slick", t.changeSlide), t.$nextArrow && t.$nextArrow.off("click.slick", t.changeSlide)), t.$list.off("touchstart.slick mousedown.slick", t.swipeHandler), t.$list.off("touchmove.slick mousemove.slick", t.swipeHandler), t.$list.off("touchend.slick mouseup.slick", t.swipeHandler), t.$list.off("touchcancel.slick mouseleave.slick", t.swipeHandler), t.$list.off("click.slick", t.clickHandler), c(document).off(t.visibilityChange, t.visibility), t.cleanUpSlideEvents(), !0 === t.options.accessibility && t.$list.off("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && c(t.$slideTrack).children().off("click.slick", t.selectHandler), c(window).off("orientationchange.slick.slick-" + t.instanceUid, t.orientationChange), c(window).off("resize.slick.slick-" + t.instanceUid, t.resize), c("[draggable!=true]", t.$slideTrack).off("dragstart", t.preventDefault), c(window).off("load.slick.slick-" + t.instanceUid, t.setPosition), c(document).off("ready.slick.slick-" + t.instanceUid, t.setPosition)
    }, a.prototype.cleanUpSlideEvents = function () {
        var t = this;
        t.$list.off("mouseenter.slick", c.proxy(t.interrupt, t, !0)), t.$list.off("mouseleave.slick", c.proxy(t.interrupt, t, !1))
    }, a.prototype.cleanUpRows = function () {
        var t;
        1 < this.options.rows && ((t = this.$slides.children().children()).removeAttr("style"), this.$slider.empty().append(t))
    }, a.prototype.clickHandler = function (t) {
        !1 === this.shouldClick && (t.stopImmediatePropagation(), t.stopPropagation(), t.preventDefault())
    }, a.prototype.destroy = function (t) {
        var e = this;
        e.autoPlayClear(), e.touchObject = {}, e.cleanUpEvents(), c(".slick-cloned", e.$slider).detach(), e.$dots && e.$dots.remove(), e.$prevArrow && e.$prevArrow.length && (e.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove()), e.$nextArrow && e.$nextArrow.length && (e.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove()), e.$slides && (e.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
            c(this).attr("style", c(this).data("originalStyling"))
        }), e.$slideTrack.children(this.options.slide).detach(), e.$slideTrack.detach(), e.$list.detach(), e.$slider.append(e.$slides)), e.cleanUpRows(), e.$slider.removeClass("slick-slider"), e.$slider.removeClass("slick-initialized"), e.$slider.removeClass("slick-dotted"), e.unslicked = !0, t || e.$slider.trigger("destroy", [e])
    }, a.prototype.disableTransition = function (t) {
        var e = {};
        e[this.transitionType] = "", !1 === this.options.fade ? this.$slideTrack.css(e) : this.$slides.eq(t).css(e)
    }, a.prototype.fadeSlide = function (t, e) {
        var i = this;
        !1 === i.cssTransitions ? (i.$slides.eq(t).css({zIndex: i.options.zIndex}), i.$slides.eq(t).animate({opacity: 1}, i.options.speed, i.options.easing, e)) : (i.applyTransition(t), i.$slides.eq(t).css({
            opacity: 1,
            zIndex: i.options.zIndex
        }), e && setTimeout(function () {
            i.disableTransition(t), e.call()
        }, i.options.speed))
    }, a.prototype.fadeSlideOut = function (t) {
        var e = this;
        !1 === e.cssTransitions ? e.$slides.eq(t).animate({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }, e.options.speed, e.options.easing) : (e.applyTransition(t), e.$slides.eq(t).css({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }))
    }, a.prototype.filterSlides = a.prototype.slickFilter = function (t) {
        var e = this;
        null !== t && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(t).appendTo(e.$slideTrack), e.reinit())
    }, a.prototype.focusHandler = function () {
        var i = this;
        i.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function (t) {
            t.stopImmediatePropagation();
            var e = c(this);
            setTimeout(function () {
                i.options.pauseOnFocus && (i.focussed = e.is(":focus"), i.autoPlay())
            }, 0)
        })
    }, a.prototype.getCurrent = a.prototype.slickCurrentSlide = function () {
        return this.currentSlide
    }, a.prototype.getDotCount = function () {
        var t = this, e = 0, i = 0, s = 0;
        if (!0 === t.options.infinite) for (; e < t.slideCount;) ++s, e = i + t.options.slidesToScroll, i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow; else if (!0 === t.options.centerMode) s = t.slideCount; else if (t.options.asNavFor) for (; e < t.slideCount;) ++s, e = i + t.options.slidesToScroll, i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow; else s = 1 + Math.ceil((t.slideCount - t.options.slidesToShow) / t.options.slidesToScroll);
        return s - 1
    }, a.prototype.getLeft = function (t) {
        var e, i, s, o = this, n = 0;
        return o.slideOffset = 0, i = o.$slides.first().outerHeight(!0), !0 === o.options.infinite ? (o.slideCount > o.options.slidesToShow && (o.slideOffset = o.slideWidth * o.options.slidesToShow * -1, n = i * o.options.slidesToShow * -1), o.slideCount % o.options.slidesToScroll != 0 && t + o.options.slidesToScroll > o.slideCount && o.slideCount > o.options.slidesToShow && (n = t > o.slideCount ? (o.slideOffset = (o.options.slidesToShow - (t - o.slideCount)) * o.slideWidth * -1, (o.options.slidesToShow - (t - o.slideCount)) * i * -1) : (o.slideOffset = o.slideCount % o.options.slidesToScroll * o.slideWidth * -1, o.slideCount % o.options.slidesToScroll * i * -1))) : t + o.options.slidesToShow > o.slideCount && (o.slideOffset = (t + o.options.slidesToShow - o.slideCount) * o.slideWidth, n = (t + o.options.slidesToShow - o.slideCount) * i), o.slideCount <= o.options.slidesToShow && (n = o.slideOffset = 0), !0 === o.options.centerMode && !0 === o.options.infinite ? o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2) - o.slideWidth : !0 === o.options.centerMode && (o.slideOffset = 0, o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2)), e = !1 === o.options.vertical ? t * o.slideWidth * -1 + o.slideOffset : t * i * -1 + n, !0 === o.options.variableWidth && (s = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow), e = !0 === o.options.rtl ? s[0] ? -1 * (o.$slideTrack.width() - s[0].offsetLeft - s.width()) : 0 : s[0] ? -1 * s[0].offsetLeft : 0, !0 === o.options.centerMode && (s = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow + 1), e = !0 === o.options.rtl ? s[0] ? -1 * (o.$slideTrack.width() - s[0].offsetLeft - s.width()) : 0 : s[0] ? -1 * s[0].offsetLeft : 0, e += (o.$list.width() - s.outerWidth()) / 2)), e
    }, a.prototype.getOption = a.prototype.slickGetOption = function (t) {
        return this.options[t]
    }, a.prototype.getNavigableIndexes = function () {
        var t, e = this, i = 0, s = 0, o = [];
        for (t = !1 === e.options.infinite ? e.slideCount : (i = -1 * e.options.slidesToScroll, s = -1 * e.options.slidesToScroll, 2 * e.slideCount); i < t;) o.push(i), i = s + e.options.slidesToScroll, s += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        return o
    }, a.prototype.getSlick = function () {
        return this
    }, a.prototype.getSlideCount = function () {
        var i, s, o = this;
        return s = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each(function (t, e) {
            if (e.offsetLeft - s + c(e).outerWidth() / 2 > -1 * o.swipeLeft) return i = e, !1
        }), Math.abs(c(i).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll
    }, a.prototype.goTo = a.prototype.slickGoTo = function (t, e) {
        this.changeSlide({data: {message: "index", index: parseInt(t)}}, e)
    }, a.prototype.init = function (t) {
        var e = this;
        c(e.$slider).hasClass("slick-initialized") || (c(e.$slider).addClass("slick-initialized"), e.buildRows(), e.buildOut(), e.setProps(), e.startLoad(), e.loadSlider(), e.initializeEvents(), e.updateArrows(), e.updateDots(), e.checkResponsive(!0), e.focusHandler()), t && e.$slider.trigger("init", [e]), !0 === e.options.accessibility && e.initADA(), e.options.autoplay && (e.paused = !1, e.autoPlay())
    }, a.prototype.initADA = function () {
        var e = this;
        e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({tabindex: "-1"}), e.$slideTrack.attr("role", "listbox"), e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
            c(this).attr({role: "option", "aria-describedby": "slick-slide" + e.instanceUid + t})
        }), null !== e.$dots && e.$dots.attr("role", "tablist").find("li").each(function (t) {
            c(this).attr({
                role: "presentation",
                "aria-selected": "false",
                "aria-controls": "navigation" + e.instanceUid + t,
                id: "slick-slide" + e.instanceUid + t
            })
        }).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"), e.activateADA()
    }, a.prototype.initArrowEvents = function () {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.off("click.slick").on("click.slick", {message: "previous"}, t.changeSlide), t.$nextArrow.off("click.slick").on("click.slick", {message: "next"}, t.changeSlide))
    }, a.prototype.initDotEvents = function () {
        var t = this;
        !0 === t.options.dots && t.slideCount > t.options.slidesToShow && c("li", t.$dots).on("click.slick", {message: "index"}, t.changeSlide), !0 === t.options.dots && !0 === t.options.pauseOnDotsHover && c("li", t.$dots).on("mouseenter.slick", c.proxy(t.interrupt, t, !0)).on("mouseleave.slick", c.proxy(t.interrupt, t, !1))
    }, a.prototype.initSlideEvents = function () {
        var t = this;
        t.options.pauseOnHover && (t.$list.on("mouseenter.slick", c.proxy(t.interrupt, t, !0)), t.$list.on("mouseleave.slick", c.proxy(t.interrupt, t, !1)))
    }, a.prototype.initializeEvents = function () {
        var t = this;
        t.initArrowEvents(), t.initDotEvents(), t.initSlideEvents(), t.$list.on("touchstart.slick mousedown.slick", {action: "start"}, t.swipeHandler), t.$list.on("touchmove.slick mousemove.slick", {action: "move"}, t.swipeHandler), t.$list.on("touchend.slick mouseup.slick", {action: "end"}, t.swipeHandler), t.$list.on("touchcancel.slick mouseleave.slick", {action: "end"}, t.swipeHandler), t.$list.on("click.slick", t.clickHandler), c(document).on(t.visibilityChange, c.proxy(t.visibility, t)), !0 === t.options.accessibility && t.$list.on("keydown.slick", t.keyHandler), !0 === t.options.focusOnSelect && c(t.$slideTrack).children().on("click.slick", t.selectHandler), c(window).on("orientationchange.slick.slick-" + t.instanceUid, c.proxy(t.orientationChange, t)), c(window).on("resize.slick.slick-" + t.instanceUid, c.proxy(t.resize, t)), c("[draggable!=true]", t.$slideTrack).on("dragstart", t.preventDefault), c(window).on("load.slick.slick-" + t.instanceUid, t.setPosition), c(document).on("ready.slick.slick-" + t.instanceUid, t.setPosition)
    }, a.prototype.initUI = function () {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.show(), t.$nextArrow.show()), !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.show()
    }, a.prototype.keyHandler = function (t) {
        var e = this;
        t.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === t.keyCode && !0 === e.options.accessibility ? e.changeSlide({data: {message: !0 === e.options.rtl ? "next" : "previous"}}) : 39 === t.keyCode && !0 === e.options.accessibility && e.changeSlide({data: {message: !0 === e.options.rtl ? "previous" : "next"}}))
    }, a.prototype.lazyLoad = function () {
        var t, e, s = this;

        function i(t) {
            c("img[data-lazy]", t).each(function () {
                var t = c(this), e = c(this).attr("data-lazy"), i = document.createElement("img");
                i.onload = function () {
                    t.animate({opacity: 0}, 100, function () {
                        t.attr("src", e).animate({opacity: 1}, 200, function () {
                            t.removeAttr("data-lazy").removeClass("slick-loading")
                        }), s.$slider.trigger("lazyLoaded", [s, t, e])
                    })
                }, i.onerror = function () {
                    t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), s.$slider.trigger("lazyLoadError", [s, t, e])
                }, i.src = e
            })
        }

        !0 === s.options.centerMode ? e = !0 === s.options.infinite ? (t = s.currentSlide + (s.options.slidesToShow / 2 + 1)) + s.options.slidesToShow + 2 : (t = Math.max(0, s.currentSlide - (s.options.slidesToShow / 2 + 1)), s.options.slidesToShow / 2 + 1 + 2 + s.currentSlide) : (t = s.options.infinite ? s.options.slidesToShow + s.currentSlide : s.currentSlide, e = Math.ceil(t + s.options.slidesToShow), !0 === s.options.fade && (0 < t && t--, e <= s.slideCount && e++)), i(s.$slider.find(".slick-slide").slice(t, e)), s.slideCount <= s.options.slidesToShow ? i(s.$slider.find(".slick-slide")) : s.currentSlide >= s.slideCount - s.options.slidesToShow ? i(s.$slider.find(".slick-cloned").slice(0, s.options.slidesToShow)) : 0 === s.currentSlide && i(s.$slider.find(".slick-cloned").slice(-1 * s.options.slidesToShow))
    }, a.prototype.loadSlider = function () {
        var t = this;
        t.setPosition(), t.$slideTrack.css({opacity: 1}), t.$slider.removeClass("slick-loading"), t.initUI(), "progressive" === t.options.lazyLoad && t.progressiveLazyLoad()
    }, a.prototype.next = a.prototype.slickNext = function () {
        this.changeSlide({data: {message: "next"}})
    }, a.prototype.orientationChange = function () {
        this.checkResponsive(), this.setPosition()
    }, a.prototype.pause = a.prototype.slickPause = function () {
        this.autoPlayClear(), this.paused = !0
    }, a.prototype.play = a.prototype.slickPlay = function () {
        var t = this;
        t.autoPlay(), t.options.autoplay = !0, t.paused = !1, t.focussed = !1, t.interrupted = !1
    }, a.prototype.postSlide = function (t) {
        var e = this;
        e.unslicked || (e.$slider.trigger("afterChange", [e, t]), e.animating = !1, e.setPosition(), e.swipeLeft = null, e.options.autoplay && e.autoPlay(), !0 === e.options.accessibility && e.initADA())
    }, a.prototype.prev = a.prototype.slickPrev = function () {
        this.changeSlide({data: {message: "previous"}})
    }, a.prototype.preventDefault = function (t) {
        t.preventDefault()
    }, a.prototype.progressiveLazyLoad = function (t) {
        t = t || 1;
        var e, i, s, o = this, n = c("img[data-lazy]", o.$slider);
        n.length ? (e = n.first(), i = e.attr("data-lazy"), (s = document.createElement("img")).onload = function () {
            e.attr("src", i).removeAttr("data-lazy").removeClass("slick-loading"), !0 === o.options.adaptiveHeight && o.setPosition(), o.$slider.trigger("lazyLoaded", [o, e, i]), o.progressiveLazyLoad()
        }, s.onerror = function () {
            t < 3 ? setTimeout(function () {
                o.progressiveLazyLoad(t + 1)
            }, 500) : (e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), o.$slider.trigger("lazyLoadError", [o, e, i]), o.progressiveLazyLoad())
        }, s.src = i) : o.$slider.trigger("allImagesLoaded", [o])
    }, a.prototype.refresh = function (t) {
        var e, i, s = this;
        i = s.slideCount - s.options.slidesToShow, !s.options.infinite && s.currentSlide > i && (s.currentSlide = i), s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0), e = s.currentSlide, s.destroy(!0), c.extend(s, s.initials, {currentSlide: e}), s.init(), t || s.changeSlide({
            data: {
                message: "index",
                index: e
            }
        }, !1)
    }, a.prototype.registerBreakpoints = function () {
        var t, e, i, s = this, o = s.options.responsive || null;
        if ("array" === c.type(o) && o.length) {
            for (t in s.respondTo = s.options.respondTo || "window", o) if (i = s.breakpoints.length - 1, e = o[t].breakpoint, o.hasOwnProperty(t)) {
                for (; 0 <= i;) s.breakpoints[i] && s.breakpoints[i] === e && s.breakpoints.splice(i, 1), i--;
                s.breakpoints.push(e), s.breakpointSettings[e] = o[t].settings
            }
            s.breakpoints.sort(function (t, e) {
                return s.options.mobileFirst ? t - e : e - t
            })
        }
    }, a.prototype.reinit = function () {
        var t = this;
        t.$slides = t.$slideTrack.children(t.options.slide).addClass("slick-slide"), t.slideCount = t.$slides.length, t.currentSlide >= t.slideCount && 0 !== t.currentSlide && (t.currentSlide = t.currentSlide - t.options.slidesToScroll), t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0), t.registerBreakpoints(), t.setProps(), t.setupInfinite(), t.buildArrows(), t.updateArrows(), t.initArrowEvents(), t.buildDots(), t.updateDots(), t.initDotEvents(), t.cleanUpSlideEvents(), t.initSlideEvents(), t.checkResponsive(!1, !0), !0 === t.options.focusOnSelect && c(t.$slideTrack).children().on("click.slick", t.selectHandler), t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0), t.setPosition(), t.focusHandler(), t.paused = !t.options.autoplay, t.autoPlay(), t.$slider.trigger("reInit", [t])
    }, a.prototype.resize = function () {
        var t = this;
        c(window).width() !== t.windowWidth && (clearTimeout(t.windowDelay), t.windowDelay = window.setTimeout(function () {
            t.windowWidth = c(window).width(), t.checkResponsive(), t.unslicked || t.setPosition()
        }, 50))
    }, a.prototype.removeSlide = a.prototype.slickRemove = function (t, e, i) {
        var s = this;
        if (t = "boolean" == typeof t ? !0 === (e = t) ? 0 : s.slideCount - 1 : !0 === e ? --t : t, s.slideCount < 1 || t < 0 || t > s.slideCount - 1) return !1;
        s.unload(), !0 === i ? s.$slideTrack.children().remove() : s.$slideTrack.children(this.options.slide).eq(t).remove(), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slidesCache = s.$slides, s.reinit()
    }, a.prototype.setCSS = function (t) {
        var e, i, s = this, o = {};
        !0 === s.options.rtl && (t = -t), e = "left" == s.positionProp ? Math.ceil(t) + "px" : "0px", i = "top" == s.positionProp ? Math.ceil(t) + "px" : "0px", o[s.positionProp] = t, !1 === s.transformsEnabled || (!(o = {}) === s.cssTransitions ? o[s.animType] = "translate(" + e + ", " + i + ")" : o[s.animType] = "translate3d(" + e + ", " + i + ", 0px)"), s.$slideTrack.css(o)
    }, a.prototype.setDimensions = function () {
        var t = this;
        !1 === t.options.vertical ? !0 === t.options.centerMode && t.$list.css({padding: "0px " + t.options.centerPadding}) : (t.$list.height(t.$slides.first().outerHeight(!0) * t.options.slidesToShow), !0 === t.options.centerMode && t.$list.css({padding: t.options.centerPadding + " 0px"})), t.listWidth = t.$list.width(), t.listHeight = t.$list.height(), !1 === t.options.vertical && !1 === t.options.variableWidth ? (t.slideWidth = Math.ceil(t.listWidth / t.options.slidesToShow), t.$slideTrack.width(Math.ceil(t.slideWidth * t.$slideTrack.children(".slick-slide").length))) : !0 === t.options.variableWidth ? t.$slideTrack.width(5e3 * t.slideCount) : (t.slideWidth = Math.ceil(t.listWidth), t.$slideTrack.height(Math.ceil(t.$slides.first().outerHeight(!0) * t.$slideTrack.children(".slick-slide").length)));
        var e = t.$slides.first().outerWidth(!0) - t.$slides.first().width();
        !1 === t.options.variableWidth && t.$slideTrack.children(".slick-slide").width(t.slideWidth - e)
    }, a.prototype.setFade = function () {
        var i, s = this;
        s.$slides.each(function (t, e) {
            i = s.slideWidth * t * -1, !0 === s.options.rtl ? c(e).css({
                position: "relative",
                right: i,
                top: 0,
                zIndex: s.options.zIndex - 2,
                opacity: 0
            }) : c(e).css({position: "relative", left: i, top: 0, zIndex: s.options.zIndex - 2, opacity: 0})
        }), s.$slides.eq(s.currentSlide).css({zIndex: s.options.zIndex - 1, opacity: 1})
    }, a.prototype.setHeight = function () {
        var t = this;
        if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
            var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
            t.$list.css("height", e)
        }
    }, a.prototype.setOption = a.prototype.slickSetOption = function () {
        var t, e, i, s, o, n = this, a = !1;
        if ("object" === c.type(arguments[0]) ? (i = arguments[0], a = arguments[1], o = "multiple") : "string" === c.type(arguments[0]) && (i = arguments[0], s = arguments[1], a = arguments[2], "responsive" === arguments[0] && "array" === c.type(arguments[1]) ? o = "responsive" : void 0 !== arguments[1] && (o = "single")), "single" === o) n.options[i] = s; else if ("multiple" === o) c.each(i, function (t, e) {
            n.options[t] = e
        }); else if ("responsive" === o) for (e in s) if ("array" !== c.type(n.options.responsive)) n.options.responsive = [s[e]]; else {
            for (t = n.options.responsive.length - 1; 0 <= t;) n.options.responsive[t].breakpoint === s[e].breakpoint && n.options.responsive.splice(t, 1), t--;
            n.options.responsive.push(s[e])
        }
        a && (n.unload(), n.reinit())
    }, a.prototype.setPosition = function () {
        var t = this;
        t.setDimensions(), t.setHeight(), !1 === t.options.fade ? t.setCSS(t.getLeft(t.currentSlide)) : t.setFade(), t.$slider.trigger("setPosition", [t])
    }, a.prototype.setProps = function () {
        var t = this, e = document.body.style;
        t.positionProp = !0 === t.options.vertical ? "top" : "left", "top" === t.positionProp ? t.$slider.addClass("slick-vertical") : t.$slider.removeClass("slick-vertical"), void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === t.options.useCSS && (t.cssTransitions = !0), t.options.fade && ("number" == typeof t.options.zIndex ? t.options.zIndex < 3 && (t.options.zIndex = 3) : t.options.zIndex = t.defaults.zIndex), void 0 !== e.OTransform && (t.animType = "OTransform", t.transformType = "-o-transform", t.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)), void 0 !== e.MozTransform && (t.animType = "MozTransform", t.transformType = "-moz-transform", t.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (t.animType = !1)), void 0 !== e.webkitTransform && (t.animType = "webkitTransform", t.transformType = "-webkit-transform", t.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)), void 0 !== e.msTransform && (t.animType = "msTransform", t.transformType = "-ms-transform", t.transitionType = "msTransition", void 0 === e.msTransform && (t.animType = !1)), void 0 !== e.transform && !1 !== t.animType && (t.animType = "transform", t.transformType = "transform", t.transitionType = "transition"), t.transformsEnabled = t.options.useTransform && null !== t.animType && !1 !== t.animType
    }, a.prototype.setSlideClasses = function (t) {
        var e, i, s, o, n = this;
        i = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), n.$slides.eq(t).addClass("slick-current"), !0 === n.options.centerMode ? (e = Math.floor(n.options.slidesToShow / 2), !0 === n.options.infinite && (e <= t && t <= n.slideCount - 1 - e ? n.$slides.slice(t - e, t + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (s = n.options.slidesToShow + t, i.slice(s - e + 1, s + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === t ? i.eq(i.length - 1 - n.options.slidesToShow).addClass("slick-center") : t === n.slideCount - 1 && i.eq(n.options.slidesToShow).addClass("slick-center")), n.$slides.eq(t).addClass("slick-center")) : 0 <= t && t <= n.slideCount - n.options.slidesToShow ? n.$slides.slice(t, t + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : i.length <= n.options.slidesToShow ? i.addClass("slick-active").attr("aria-hidden", "false") : (o = n.slideCount % n.options.slidesToShow, s = !0 === n.options.infinite ? n.options.slidesToShow + t : t, n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - t < n.options.slidesToShow ? i.slice(s - (n.options.slidesToShow - o), s + o).addClass("slick-active").attr("aria-hidden", "false") : i.slice(s, s + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" === n.options.lazyLoad && n.lazyLoad()
    }, a.prototype.setupInfinite = function () {
        var t, e, i, s = this;
        if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && (e = null, s.slideCount > s.options.slidesToShow)) {
            for (i = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, t = s.slideCount; t > s.slideCount - i; t -= 1) e = t - 1, c(s.$slides[e]).clone(!0).attr("id", "").attr("data-slick-index", e - s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");
            for (t = 0; t < i; t += 1) e = t, c(s.$slides[e]).clone(!0).attr("id", "").attr("data-slick-index", e + s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");
            s.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
                c(this).attr("id", "")
            })
        }
    }, a.prototype.interrupt = function (t) {
        t || this.autoPlay(), this.interrupted = t
    }, a.prototype.selectHandler = function (t) {
        var e = this, i = c(t.target).is(".slick-slide") ? c(t.target) : c(t.target).parents(".slick-slide"),
            s = parseInt(i.attr("data-slick-index"));
        if (s || (s = 0), e.slideCount <= e.options.slidesToShow) return e.setSlideClasses(s), void e.asNavFor(s);
        e.slideHandler(s)
    }, a.prototype.slideHandler = function (t, e, i) {
        var s, o, n, a, r, l, c = this;
        if (e = e || !1, (!0 !== c.animating || !0 !== c.options.waitForAnimate) && !(!0 === c.options.fade && c.currentSlide === t || c.slideCount <= c.options.slidesToShow)) if (!1 === e && c.asNavFor(t), s = t, r = c.getLeft(s), a = c.getLeft(c.currentSlide), c.currentLeft = null === c.swipeLeft ? a : c.swipeLeft, !1 === c.options.infinite && !1 === c.options.centerMode && (t < 0 || t > c.getDotCount() * c.options.slidesToScroll)) !1 === c.options.fade && (s = c.currentSlide, !0 !== i ? c.animateSlide(a, function () {
            c.postSlide(s)
        }) : c.postSlide(s)); else if (!1 === c.options.infinite && !0 === c.options.centerMode && (t < 0 || t > c.slideCount - c.options.slidesToScroll)) !1 === c.options.fade && (s = c.currentSlide, !0 !== i ? c.animateSlide(a, function () {
            c.postSlide(s)
        }) : c.postSlide(s)); else {
            if (c.options.autoplay && clearInterval(c.autoPlayTimer), o = s < 0 ? c.slideCount % c.options.slidesToScroll != 0 ? c.slideCount - c.slideCount % c.options.slidesToScroll : c.slideCount + s : s >= c.slideCount ? c.slideCount % c.options.slidesToScroll != 0 ? 0 : s - c.slideCount : s, c.animating = !0, c.$slider.trigger("beforeChange", [c, c.currentSlide, o]), n = c.currentSlide, c.currentSlide = o, c.setSlideClasses(c.currentSlide), c.options.asNavFor && (l = (l = c.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(c.currentSlide), c.updateDots(), c.updateArrows(), !0 === c.options.fade) return !0 !== i ? (c.fadeSlideOut(n), c.fadeSlide(o, function () {
                c.postSlide(o)
            })) : c.postSlide(o), void c.animateHeight();
            !0 !== i ? c.animateSlide(r, function () {
                c.postSlide(o)
            }) : c.postSlide(o)
        }
    }, a.prototype.startLoad = function () {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.hide(), t.$nextArrow.hide()), !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.hide(), t.$slider.addClass("slick-loading")
    }, a.prototype.swipeDirection = function () {
        var t, e, i, s, o = this;
        return t = o.touchObject.startX - o.touchObject.curX, e = o.touchObject.startY - o.touchObject.curY, i = Math.atan2(e, t), (s = Math.round(180 * i / Math.PI)) < 0 && (s = 360 - Math.abs(s)), s <= 45 && 0 <= s ? !1 === o.options.rtl ? "left" : "right" : s <= 360 && 315 <= s ? !1 === o.options.rtl ? "left" : "right" : 135 <= s && s <= 225 ? !1 === o.options.rtl ? "right" : "left" : !0 === o.options.verticalSwiping ? 35 <= s && s <= 135 ? "down" : "up" : "vertical"
    }, a.prototype.swipeEnd = function (t) {
        var e, i, s = this;
        if (s.dragging = !1, s.interrupted = !1, s.shouldClick = !(10 < s.touchObject.swipeLength), void 0 === s.touchObject.curX) return !1;
        if (!0 === s.touchObject.edgeHit && s.$slider.trigger("edge", [s, s.swipeDirection()]), s.touchObject.swipeLength >= s.touchObject.minSwipe) {
            switch (i = s.swipeDirection()) {
                case"left":
                case"down":
                    e = s.options.swipeToSlide ? s.checkNavigable(s.currentSlide + s.getSlideCount()) : s.currentSlide + s.getSlideCount(), s.currentDirection = 0;
                    break;
                case"right":
                case"up":
                    e = s.options.swipeToSlide ? s.checkNavigable(s.currentSlide - s.getSlideCount()) : s.currentSlide - s.getSlideCount(), s.currentDirection = 1
            }
            "vertical" != i && (s.slideHandler(e), s.touchObject = {}, s.$slider.trigger("swipe", [s, i]))
        } else s.touchObject.startX !== s.touchObject.curX && (s.slideHandler(s.currentSlide), s.touchObject = {})
    }, a.prototype.swipeHandler = function (t) {
        var e = this;
        if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== t.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = t.originalEvent && void 0 !== t.originalEvent.touches ? t.originalEvent.touches.length : 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), t.data.action) {
            case"start":
                e.swipeStart(t);
                break;
            case"move":
                e.swipeMove(t);
                break;
            case"end":
                e.swipeEnd(t)
        }
    }, a.prototype.swipeMove = function (t) {
        var e, i, s, o, n, a = this;
        return n = void 0 !== t.originalEvent ? t.originalEvent.touches : null, !(!a.dragging || n && 1 !== n.length) && (e = a.getLeft(a.currentSlide), a.touchObject.curX = void 0 !== n ? n[0].pageX : t.clientX, a.touchObject.curY = void 0 !== n ? n[0].pageY : t.clientY, a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curX - a.touchObject.startX, 2))), !0 === a.options.verticalSwiping && (a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curY - a.touchObject.startY, 2)))), "vertical" !== (i = a.swipeDirection()) ? (void 0 !== t.originalEvent && 4 < a.touchObject.swipeLength && t.preventDefault(), o = (!1 === a.options.rtl ? 1 : -1) * (a.touchObject.curX > a.touchObject.startX ? 1 : -1), !0 === a.options.verticalSwiping && (o = a.touchObject.curY > a.touchObject.startY ? 1 : -1), s = a.touchObject.swipeLength, (a.touchObject.edgeHit = !1) === a.options.infinite && (0 === a.currentSlide && "right" === i || a.currentSlide >= a.getDotCount() && "left" === i) && (s = a.touchObject.swipeLength * a.options.edgeFriction, a.touchObject.edgeHit = !0), !1 === a.options.vertical ? a.swipeLeft = e + s * o : a.swipeLeft = e + s * (a.$list.height() / a.listWidth) * o, !0 === a.options.verticalSwiping && (a.swipeLeft = e + s * o), !0 !== a.options.fade && !1 !== a.options.touchMove && (!0 === a.animating ? (a.swipeLeft = null, !1) : void a.setCSS(a.swipeLeft))) : void 0)
    }, a.prototype.swipeStart = function (t) {
        var e, i = this;
        if (i.interrupted = !0, 1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow) return !(i.touchObject = {});
        void 0 !== t.originalEvent && void 0 !== t.originalEvent.touches && (e = t.originalEvent.touches[0]), i.touchObject.startX = i.touchObject.curX = void 0 !== e ? e.pageX : t.clientX, i.touchObject.startY = i.touchObject.curY = void 0 !== e ? e.pageY : t.clientY, i.dragging = !0
    }, a.prototype.unfilterSlides = a.prototype.slickUnfilter = function () {
        var t = this;
        null !== t.$slidesCache && (t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.appendTo(t.$slideTrack), t.reinit())
    }, a.prototype.unload = function () {
        var t = this;
        c(".slick-cloned", t.$slider).remove(), t.$dots && t.$dots.remove(), t.$prevArrow && t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove(), t.$nextArrow && t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove(), t.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    }, a.prototype.unslick = function (t) {
        this.$slider.trigger("unslick", [this, t]), this.destroy()
    }, a.prototype.updateArrows = function () {
        var t = this;
        Math.floor(t.options.slidesToShow / 2), !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && !t.options.infinite && (t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === t.currentSlide ? (t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - t.options.slidesToShow && !1 === t.options.centerMode ? (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - 1 && !0 === t.options.centerMode && (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
    }, a.prototype.updateDots = function () {
        var t = this;
        null !== t.$dots && (t.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), t.$dots.find("li").eq(Math.floor(t.currentSlide / t.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
    }, a.prototype.visibility = function () {
        this.options.autoplay && (document[this.hidden] ? this.interrupted = !0 : this.interrupted = !1)
    }, c.fn.slick = function () {
        var t, e, i = this, s = arguments[0], o = Array.prototype.slice.call(arguments, 1), n = i.length;
        for (t = 0; t < n; t++) if ("object" == typeof s || void 0 === s ? i[t].slick = new a(i[t], s) : e = i[t].slick[s].apply(i[t].slick, o), void 0 !== e) return e;
        return i
    }
}), function () {
    var s, e, i, l, o, n = function (t, e) {
        return function () {
            return t.apply(e, arguments)
        }
    }, a = [].indexOf || function (t) {
        for (var e = 0, i = this.length; e < i; e++) if (e in this && this[e] === t) return e;
        return -1
    };
    e = function () {
        function t() {
        }

        return t.prototype.extend = function (t, e) {
            var i, s;
            for (i in e) s = e[i], null == t[i] && (t[i] = s);
            return t
        }, t.prototype.isMobile = function (t) {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(t)
        }, t.prototype.createEvent = function (t, e, i, s) {
            var o;
            return null == e && (e = !1), null == i && (i = !1), null == s && (s = null), null != document.createEvent ? (o = document.createEvent("CustomEvent")).initCustomEvent(t, e, i, s) : null != document.createEventObject ? (o = document.createEventObject()).eventType = t : o.eventName = t, o
        }, t.prototype.emitEvent = function (t, e) {
            return null != t.dispatchEvent ? t.dispatchEvent(e) : e in (null != t) ? t[e]() : "on" + e in (null != t) ? t["on" + e]() : void 0
        }, t.prototype.addEvent = function (t, e, i) {
            return null != t.addEventListener ? t.addEventListener(e, i, !1) : null != t.attachEvent ? t.attachEvent("on" + e, i) : t[e] = i
        }, t.prototype.removeEvent = function (t, e, i) {
            return null != t.removeEventListener ? t.removeEventListener(e, i, !1) : null != t.detachEvent ? t.detachEvent("on" + e, i) : delete t[e]
        }, t.prototype.innerHeight = function () {
            return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
        }, t
    }(), i = this.WeakMap || this.MozWeakMap || (i = function () {
        function t() {
            this.keys = [], this.values = []
        }

        return t.prototype.get = function (t) {
            var e, i, s, o;
            for (e = i = 0, s = (o = this.keys).length; i < s; e = ++i) if (o[e] === t) return this.values[e]
        }, t.prototype.set = function (t, e) {
            var i, s, o, n;
            for (i = s = 0, o = (n = this.keys).length; s < o; i = ++s) if (n[i] === t) return void (this.values[i] = e);
            return this.keys.push(t), this.values.push(e)
        }, t
    }()), s = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (s = function () {
        function t() {
            "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
        }

        return t.notSupported = !0, t.prototype.observe = function () {
        }, t
    }()), l = this.getComputedStyle || function (i, t) {
        return this.getPropertyValue = function (t) {
            var e;
            return "float" === t && (t = "styleFloat"), o.test(t) && t.replace(o, function (t, e) {
                return e.toUpperCase()
            }), (null != (e = i.currentStyle) ? e[t] : void 0) || null
        }, this
    }, o = /(\-([a-z]){1})/g, this.WOW = function () {
        function t(t) {
            null == t && (t = {}), this.scrollCallback = n(this.scrollCallback, this), this.scrollHandler = n(this.scrollHandler, this), this.resetAnimation = n(this.resetAnimation, this), this.start = n(this.start, this), this.scrolled = !0, this.config = this.util().extend(t, this.defaults), null != t.scrollContainer && (this.config.scrollContainer = document.querySelector(t.scrollContainer)), this.animationNameCache = new i, this.wowEvent = this.util().createEvent(this.config.boxClass)
        }

        return t.prototype.defaults = {
            boxClass: "wow",
            animateClass: "animated",
            offset: 0,
            mobile: !1,
            live: !0,
            callback: null,
            scrollContainer: null
        }, t.prototype.init = function () {
            var t;
            return this.element = window.document.documentElement, "interactive" === (t = document.readyState) || "complete" === t ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
        }, t.prototype.start = function () {
            var o, t, e, i, a;
            if (this.stopped = !1, this.boxes = function () {
                var t, e, i, s;
                for (s = [], t = 0, e = (i = this.element.querySelectorAll("." + this.config.boxClass)).length; t < e; t++) o = i[t], s.push(o);
                return s
            }.call(this), this.all = function () {
                var t, e, i, s;
                for (s = [], t = 0, e = (i = this.boxes).length; t < e; t++) o = i[t], s.push(o);
                return s
            }.call(this), this.boxes.length) if (this.disabled()) this.resetStyle(); else for (t = 0, e = (i = this.boxes).length; t < e; t++) o = i[t], this.applyStyle(o, !0);
            if (this.disabled() || (this.util().addEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live) return new s((a = this, function (t) {
                var e, i, o, n, s;
                for (s = [], e = 0, i = t.length; e < i; e++) n = t[e], s.push(function () {
                    var t, e, i, s;
                    for (s = [], t = 0, e = (i = n.addedNodes || []).length; t < e; t++) o = i[t], s.push(this.doSync(o));
                    return s
                }.call(a));
                return s
            })).observe(document.body, {childList: !0, subtree: !0})
        }, t.prototype.stop = function () {
            if (this.stopped = !0, this.util().removeEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval) return clearInterval(this.interval)
        }, t.prototype.sync = function (t) {
            if (s.notSupported) return this.doSync(this.element)
        }, t.prototype.doSync = function (t) {
            var e, i, s, o, n;
            if (null == t && (t = this.element), 1 === t.nodeType) {
                for (n = [], i = 0, s = (o = (t = t.parentNode || t).querySelectorAll("." + this.config.boxClass)).length; i < s; i++) e = o[i], a.call(this.all, e) < 0 ? (this.boxes.push(e), this.all.push(e), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(e, !0), n.push(this.scrolled = !0)) : n.push(void 0);
                return n
            }
        }, t.prototype.show = function (t) {
            return this.applyStyle(t), t.className = t.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(t), this.util().emitEvent(t, this.wowEvent), this.util().addEvent(t, "animationend", this.resetAnimation), this.util().addEvent(t, "oanimationend", this.resetAnimation), this.util().addEvent(t, "webkitAnimationEnd", this.resetAnimation), this.util().addEvent(t, "MSAnimationEnd", this.resetAnimation), t
        }, t.prototype.applyStyle = function (t, e) {
            var i, s, o, n;
            return s = t.getAttribute("data-wow-duration"), i = t.getAttribute("data-wow-delay"), o = t.getAttribute("data-wow-iteration"), this.animate((n = this, function () {
                return n.customStyle(t, e, s, i, o)
            }))
        }, t.prototype.animate = "requestAnimationFrame" in window ? function (t) {
            return window.requestAnimationFrame(t)
        } : function (t) {
            return t()
        }, t.prototype.resetStyle = function () {
            var t, e, i, s, o;
            for (o = [], e = 0, i = (s = this.boxes).length; e < i; e++) t = s[e], o.push(t.style.visibility = "visible");
            return o
        }, t.prototype.resetAnimation = function (t) {
            var e;
            if (0 <= t.type.toLowerCase().indexOf("animationend")) return (e = t.target || t.srcElement).className = e.className.replace(this.config.animateClass, "").trim()
        }, t.prototype.customStyle = function (t, e, i, s, o) {
            return e && this.cacheAnimationName(t), t.style.visibility = e ? "hidden" : "visible", i && this.vendorSet(t.style, {animationDuration: i}), s && this.vendorSet(t.style, {animationDelay: s}), o && this.vendorSet(t.style, {animationIterationCount: o}), this.vendorSet(t.style, {animationName: e ? "none" : this.cachedAnimationName(t)}), t
        }, t.prototype.vendors = ["moz", "webkit"], t.prototype.vendorSet = function (o, t) {
            var n, e, a, r;
            for (n in e = [], t) a = t[n], o["" + n] = a, e.push(function () {
                var t, e, i, s;
                for (s = [], t = 0, e = (i = this.vendors).length; t < e; t++) r = i[t], s.push(o["" + r + n.charAt(0).toUpperCase() + n.substr(1)] = a);
                return s
            }.call(this));
            return e
        }, t.prototype.vendorCSS = function (t, e) {
            var i, s, o, n, a, r;
            for (n = (a = l(t)).getPropertyCSSValue(e), i = 0, s = (o = this.vendors).length; i < s; i++) r = o[i], n = n || a.getPropertyCSSValue("-" + r + "-" + e);
            return n
        }, t.prototype.animationName = function (e) {
            var i;
            try {
                i = this.vendorCSS(e, "animation-name").cssText
            } catch (t) {
                i = l(e).getPropertyValue("animation-name")
            }
            return "none" === i ? "" : i
        }, t.prototype.cacheAnimationName = function (t) {
            return this.animationNameCache.set(t, this.animationName(t))
        }, t.prototype.cachedAnimationName = function (t) {
            return this.animationNameCache.get(t)
        }, t.prototype.scrollHandler = function () {
            return this.scrolled = !0
        }, t.prototype.scrollCallback = function () {
            var o;
            if (this.scrolled && (this.scrolled = !1, this.boxes = function () {
                var t, e, i, s;
                for (s = [], t = 0, e = (i = this.boxes).length; t < e; t++) (o = i[t]) && (this.isVisible(o) ? this.show(o) : s.push(o));
                return s
            }.call(this), !this.boxes.length && !this.config.live)) return this.stop()
        }, t.prototype.offsetTop = function (t) {
            for (var e; void 0 === t.offsetTop;) t = t.parentNode;
            for (e = t.offsetTop; t = t.offsetParent;) e += t.offsetTop;
            return e
        }, t.prototype.isVisible = function (t) {
            var e, i, s, o, n;
            return i = t.getAttribute("data-wow-offset") || this.config.offset, o = (n = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset) + Math.min(this.element.clientHeight, this.util().innerHeight()) - i, e = (s = this.offsetTop(t)) + t.clientHeight, s <= o && n <= e
        }, t.prototype.util = function () {
            return null != this._util ? this._util : this._util = new e
        }, t.prototype.disabled = function () {
            return !this.config.mobile && this.util().isMobile(navigator.userAgent)
        }, t
    }()
}.call(this), $(function () {
    $(document.body).on("fecss.default", null, {}, function (t) {
        console.log("body trigger:fecss.default")
    }), $(document.body).on("fecss.init", null, {}, function (t) {
        console.log("body trigger:fecss.init");
        var e = (new Date).getTime();
        $(document.body).attr("data-created_at", e)
    }), $(document.body).on("fecss.window.unload", null, {}, function (t, e) {
        console.log("body trigger:fecss.window.unload: " + JSON.stringify(e))
    }), $(document.body).on("fecss.ajax.success", null, {}, function (t) {
        console.log("body trigger:fecss.ajax.success")
    }), $(document.body).on("fecss.keydown", null, {}, function (t, e) {
        console.log("body trigger:fecss.keydown: " + JSON.stringify(e))
    }), $(document.body).on("DOMSubtreeModified", null, {}, function (t, e) {
    }), $(document.body).on("wheel mousewheel DOMMouseScroll MozMousePixelScroll", function (t) {
        -t.originalEvent.deltaY || t.originalEvent.detail || t.originalEvent.wheelDelta
    }), $(document.body).on("changeClass", null, {}, function (t, e) {
        $(function () {
        })
    }), $(function () {
        var t = "noname-browser", e = navigator.userAgent.toLowerCase();
        -1 != e.indexOf("msie") && (t = "msie"), -1 != e.indexOf("trident") && (t = "msie"), -1 != e.indexOf("konqueror") && (t = "konqueror"), -1 != e.indexOf("firefox") && (t = "firefox"), -1 != e.indexOf("safari") && (t = "safari"), -1 != e.indexOf("chrome") && (t = "chrome"), -1 != e.indexOf("chromium") && (t = "chromium"), -1 != e.indexOf("opera") && (t = "opera"), -1 != e.indexOf("yabrowser") && (t = "yabrowser"), $("html").eq(0).addClass(t)
    }), $(function () {
        $(document.body).on("keydown", function (t) {
            $(document.body).trigger("fecss.keydown", [{
                alt: t.altKey,
                ctrl: t.ctrlKey,
                shift: t.shiftKey,
                meta: t.metaKey,
                key: t.which,
                liter: String.fromCharCode(t.which)
            }])
        })
    }), $(function () {
    }), $(document.body).on("click.fecss.scrollto", ".scrollto", {}, function (t) {
        t.preventDefault(), console.log("body trigger:click.fecss.scrollto");
        var e = $(this), i = $(e.attr("href")).eq(0), s = parseInt(e.attr("data-scrollto-diff")) || 0,
            o = parseInt(e.attr("data-scrollto-speed")) || 777;
        $("html, body").animate({scrollTop: i.offset().top + s}, o), $('[data-scrollto="nav-item"]').removeClass("is--active"), e.parent().addClass("is--active")
    }), $(document.body).on("click", '[data-scrollto="navbar"].is--open .scrollto', {}, function (t) {
        (screenJS.isXS() || screenJS.isSM() || screenJS.isMD()) && (t.preventDefault(), $('[data-scrollto="humb"]').trigger("click"))
    });
    var t = window.location.pathname;
    $('.aside__nav a[href="' + t + '"]').parent().addClass("is--active"), $('.aside__dropdown [data-toggle="dropdown"]').on("click", function (t) {
        t.preventDefault(), t.stopPropagation(), $(this).parent().siblings().removeClass("open"), $(this).parent().toggleClass("open")
    }), $(".aside__nav").closest("body").addClass("is--aside-navbar");
    t = window.location.pathname;
    $('.cabinet__navbar-nav a[href="' + t + '"]').parent().addClass("is--active"), $(".cabinet__navbar-block").closest("body").addClass("is--aside-cabinet"), $(".cabinet__basket-total-bar").closest("body").addClass("is--basket-bar"), screenJS.isXS() && $(".cabinet__order-body").removeAttr("id"), $(".cabinet__filter-nav-item.dropdown").on("click", ".cabinet__filter-nav-dropdown", function (t) {
        t.preventDefault(), t.stopPropagation()
    }), $(".cabinet__filter-btn-block").on("click", function (t) {
        $(this).closest(".cabinet__filter-block").toggleClass("open")
    }), $(".card-item__btn.is--catalog-page").on("click", function (t) {
        $(this).toggleClass("is--active")
    }), $(".form__control[type='tel']").mask("+7 (999) 999-99-99", {placeholder: "+7 (___) ___-__-__"}), $("[data-validation]").validationEngine("attach", {
        promptPosition: "bottomLeft",
        scroll: !1
    }), $(document.body).on("click", ".form__btn-pass", null, function (t) {
        t.preventDefault();
        var e = $(this);
        e.hasClass("is--view") && ($(".form__btn-pass.is--view").removeClass("is--active"), $(".form__btn-pass.is--hide").addClass("is--active"), $(".form__control.is--pass").attr("type", "text")), e.hasClass("is--hide") && ($(".form__btn-pass.is--hide").removeClass("is--active"), $(".form__btn-pass.is--view").addClass("is--active"), $(".form__control.is--pass").attr("type", "password"))
    }), $("img").addClass("img-responsive");
    var e = $(".navbar__hamburger-card"), i = e.data("toggle-nav"), s = e.data("body"), o = e.data("collapse-nav");
    e.on("click", function () {
        $(s).toggleClass("is--open-navbar"), $(i).toggleClass("is--open"), $(o).toggleClass("is--open"), $(this).toggleClass("is--active")
    }), $(document.body).on("click", function (t) {
        0 == $(t.target).closest(".navbar__block").length && ($(s).removeClass("is--open-navbar"), $(i).removeClass("is--open"), $(o).removeClass("is--open"), e.removeClass("is--active"))
    });
    t = window.location.pathname;
    $('.navbar__nav a[href="' + t + '"]').parent().addClass("is--active"), $('.navbar-aside__nav a[href="' + t + '"]').parent().addClass("is--active"), $('.tabs__nav a[href="' + t + '"]').parent().addClass("is--active"), $('[data-azbn-toggle="dropdown"]').on("click", function (t) {
        $(".azbn-dropdown").toggleClass("open")
    }), $('.navbar-aside__dropdown [data-toggle="dropdown"]').on("click", function (t) {
        t.preventDefault(), t.stopPropagation(), $(this).parent().siblings().removeClass("open"), $(this).parent().toggleClass("open")
    }), $(".azbn__search-dropdown").on("shown.bs.dropdown", function (t) {
        $(".azbn__search-input").focus()
    });
    var n, a, r = $(".js-range-slider"), l = $(".js-from"), c = $(".js-to"), d = function () {
        l.prop("value", n), c.prop("value", a)
    }, h = function () {
        range.update({from: n, to: a})
    };
    r.ionRangeSlider({
        step: 1, onChange: function (t) {
            n = t.from, a = t.to, d()
        }, onFinish: function (t) {
            n = t.from, a = t.to, d()
        }
    }), l.on("change", function () {
        (n = +$(this).prop("value")) < min && (n = min), a < n && (n = a), d(), h()
    }), c.on("change", function () {
        (a = +$(this).prop("value")) > max && (a = max), a < n && (a = n), d(), h()
    }), $(document.body).on("click.fecss.scrollto", ".scrollto", {}, function (t) {
        t.preventDefault(), console.log("body trigger:click.fecss.scrollto");
        var e = $(this), i = $(e.attr("href")).eq(0), s = parseInt(e.attr("data-scrollto-diff")) || 0,
            o = parseInt(e.attr("data-scrollto-speed")) || 777;
        $("html, body").animate({scrollTop: i.offset().top + s}, o), $(".navbar__nav .navbar__nav-item").removeClass("is--active"), e.parent().addClass("is--active")
    }), $(document.body).on("click", ".navbar__collapse.is--open .navbar__nav-link.scrollto", {}, function (t) {
        (screenJS.isXS() || screenJS.isSM() || screenJS.isMD()) && (t.preventDefault(), $(".navbar__hamburger-btn").trigger("click"))
    }), $(function () {
        var t = $('[data-slider-slick="slick-header"]'), e = $('[data-slider-slick="slick-gallery"]'),
            i = $('[data-slider-slick="slick-index-catalog"]'), s = $('[data-slider-slick="slick-catalog"]'),
            o = $('[data-slider-slick="slick-catalog-view"]'), n = $('[data-slider-slick="slick-catalog-nav"]'),
            a = "/local/templates/amadeus",
            r = '<button type="button" class="slick-btn  is--prev"><span class="sr-only">Предыдущий слайд</span><svg class="icon-svg icon-icon-prev" role="img"><use xlink:href="' + a + '/img/svg/sprite.svg#icon-prev"></use></svg></button>',
            l = '<button type="button" class="slick-btn  is--next"><span class="sr-only">Следующий слайд</span><svg class="icon-svg icon-icon-next" role="img"><use xlink:href="' + a + '/img/svg/sprite.svg#icon-next"></use></svg></button>';
        $(".slick-cloned .content-block__preview").removeAttr("data-fancybox"), t.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: !0,
            arrows: !1,
            dots: !0,
            autoplay: !0,
            autoplaySpeed: 4e3,
            prevArrow: r,
            nextArrow: l,
            fade: !0
        }), i.slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: !0,
            dots: !1,
            infinite: !0,
            prevArrow: r,
            nextArrow: l,
            responsive: [{breakpoint: 1025, settings: {slidesToShow: 3, slidesToScroll: 3}}, {
                breakpoint: 768,
                settings: {slidesToShow: 2, slidesToScroll: 2}
            }, {breakpoint: 565, settings: {slidesToShow: 1, slidesToScroll: 1}}]
        });
        var c = $(".tabs__link");
        c.on("click", function () {
            var t = $(this), e = t.data("filter");
            i.slick("slickUnfilter"), "new" == e ? (i.slick("slickFilter", ".is--new"), c.parent().removeClass("active"), t.parent().addClass("active")) : "hit" == e ? (i.slick("slickFilter", ".is--hit"), c.parent().removeClass("active"), t.parent().addClass("active")) : "discounts" == e && (i.slick("slickFilter", ".is--discounts"), c.parent().removeClass("active"), t.parent().addClass("active"))
        }), i.slick("slickFilter", ".is--new"), o.slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: !0,
            dots: !1,
            infinite: !0,
            prevArrow: r,
            nextArrow: l,
            responsive: [{breakpoint: 1025, settings: {slidesToShow: 3, slidesToScroll: 3}}, {
                breakpoint: 768,
                settings: {slidesToShow: 2, slidesToScroll: 2}
            }, {breakpoint: 565, settings: {slidesToShow: 1, slidesToScroll: 1}}]
        }), e.slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: !0,
            dots: !0,
            infinite: !0,
            prevArrow: r,
            nextArrow: l,
            responsive: [{breakpoint: 1600, settings: {slidesToShow: 3, slidesToScroll: 3}}, {
                breakpoint: 768,
                settings: {arrows: !1, slidesToShow: 1, slidesToScroll: 1}
            }]
        }), s.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !0,
            prevArrow: r,
            nextArrow: l,
            fade: !0,
            asNavFor: n
        }), n.slick({slidesToShow: 5, slidesToScroll: 1, arrows: !1, dots: !1, asNavFor: s, focusOnSelect: !0})
    }), $(".text__block table").addClass("table table-bordered"), $(".text__block ol").addClass("is--counts"), $(".text__block ul").addClass("is--styled"), $(".text__block .table.table-bordered").wrap('<div class="table-responsive"></div>'), $(window).on("resize", function (t) {
        $(function () {
            var t = 767, e = 992, i = 991, s = 1200, o = 360, n = 769, a = 768, r = 961, l = "window-width",
                c = "window-height", d = $(window).outerWidth(!0), h = $(window).outerHeight(!0),
                p = $("html body").eq(0);
            d < 768 && (p.hasClass("window-width-sm") && p.removeClass("window-width-sm"), p.hasClass("window-width-md") && p.removeClass("window-width-md"), p.hasClass("window-width-lg") && p.removeClass("window-width-lg"), l = "window-width-xs"), t < d && d < e && (p.hasClass("window-width-xs") && p.removeClass("window-width-xs"), p.hasClass("window-width-md") && p.removeClass("window-width-md"), p.hasClass("window-width-lg") && p.removeClass("window-width-lg"), l = "window-width-sm"), i < d && d < s && (p.hasClass("window-width-xs") && p.removeClass("window-width-xs"), p.hasClass("window-width-sm") && p.removeClass("window-width-sm"), p.hasClass("window-width-lg") && p.removeClass("window-width-lg"), l = "window-width-md"), 1199 < d && (p.hasClass("window-width-xs") && p.removeClass("window-width-xs"), p.hasClass("window-width-sm") && p.removeClass("window-width-sm"), p.hasClass("window-width-md") && p.removeClass("window-width-md"), l = "window-width-lg"), h < 361 && (p.hasClass("window-height-sm") && p.removeClass("window-height-sm"), p.hasClass("window-height-md") && p.removeClass("window-height-md"), p.hasClass("window-height-lg") && p.removeClass("window-height-lg"), c = "window-height-xs"), o < h && h < n && (p.hasClass("window-height-xs") && p.removeClass("window-height-xs"), p.hasClass("window-height-md") && p.removeClass("window-height-md"), p.hasClass("window-height-lg") && p.removeClass("window-height-lg"), c = "window-height-sm"), a < h && h < r && (p.hasClass("window-height-xs") && p.removeClass("window-height-xs"), p.hasClass("window-height-sm") && p.removeClass("window-height-sm"), p.hasClass("window-height-lg") && p.removeClass("window-height-lg"), c = "window-height-md"), 960 < h && (p.hasClass("window-height-xs") && p.removeClass("window-height-xs"), p.hasClass("window-height-sm") && p.removeClass("window-height-sm"), p.hasClass("window-height-md") && p.removeClass("window-height-md"), c = "window-height-lg"), $("html body").eq(0).addClass(l).addClass(c)
        })
    }).trigger("resize"), $(window).on("scroll", function (t) {
        var e = $(document).scrollTop(), i = $(".navbar__block.is--scroll");
        i.hasClass("opacity") ? e <= 200 && i.removeClass("opacity") : 200 < e && i.addClass("opacity"), i.hasClass("fixed") ? e <= 400 && i.removeClass("fixed") : 400 < e && i.addClass("fixed"), i.hasClass("scroll-navbar") ? e <= 500 && i.removeClass("scroll-navbar") : 500 < e && i.addClass("scroll-navbar")
    }).trigger("scroll"), window.onbeforeunload = function (t) {
        $("body").trigger("fecss.window.unload", [t])
    }, $(document.body).trigger("fecss.init")
});