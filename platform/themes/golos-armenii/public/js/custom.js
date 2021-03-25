!(function (a) {
    "use strict";
    function i(a, i) {
        a.hasClass(i) || a.addClass(i);
    }
    function t(a, i) {
        a.hasClass(i) && a.removeClass(i);
    }
    a(document).ready(function () {
        var e, n;
            (function () {
                var i = 0,
                    e = a(".page-header"),
                    n = e.data("sticky"),
                    o = e.data("sticky-checkpoint"),
                    s = a(".navigation"),
                    l = a(".page-searchbox"),
                    c = a(".navigation-toggle");
                e.length > 0 &&
                    1 == n &&
                    a(window).scroll(function () {
                        var n = a(this).scrollTop();
                        i > n
                            ? 0 == n
                                ? e.removeClass("header--sticky header--sticky-unpin header--sticky-pin")
                                : n > o && (e.removeClass("header--sticky-unpin").addClass("header--sticky header--sticky-pin"), t(s, "navigation--mobile--active"), t(c, "navigation-toggle--active"))
                            : n > o && (e.addClass("header--sticky-unpin").removeClass("header--sticky-pin"), l.removeClass("is__active"), t(s, "navigation--mobile--active"), t(c, "navigation-toggle--active")),
                            (i = n);
                    });
            })(),
            (e = a(".navigation-toggle")),
            (n = a(".navigation")),
            e.length > 0 &&
                e.on("click", function () {
                    var e = a(this);
                    e.hasClass("navigation-toggle--active") ? (e.removeClass("navigation-toggle--active"), t(n, "navigation--mobile--active")) : (e.addClass("navigation-toggle--active"), i(n, "navigation--mobile--active"));
                }),
            a(".navigation--mobile").find(".menu-item-has-children"),
            a("body").on("click", ".navigation--mobile .menu-item-has-children a .toggle-icon", function (i) {
                i.preventDefault(), console.log(!0);
                var t = a(this).closest("li").children(".sub-menu");
                a(this).closest("li").toggleClass("menu-item--active"),
                    a(this).closest("li").siblings().removeClass("menu-item--active"),
                    t.toggleClass("sub-menu--active"),
                    a(this).closest("li").siblings().children(".sub-menu").removeClass("sub-menu--active");
            }),
            (function () {
                var i = 0,
                    t = a("#back2top");
                a(window).scroll(function () {
                    var e = a(window).scrollTop();
                    e > i && e > 500 ? t.addClass("active") : t.removeClass("active"), (i = e);
                }),
                    t.on("click", function () {
                        a("html, body").animate({ scrollTop: "0px" }, 800);
                    });
            })();
    }),
        a(window).on("load", function () {}),
        a(window).on("load resize", function () {
            var e, n, o;
            (n = (e = a(".page-header")).data("responsive")),
                (o = a(".navigation-toggle")),
                n > a(window).innerWidth() ? (i(e.find(".navigation"), "navigation--mobile"), o.show()) : (o.hide(), t(e.find(".navigation"), "navigation--mobile"));
        }),
        a(window).on("resize", function () {});

	$('#dom-id').dateRangePicker({
		autoClose: true,
		separator: '|',
		singleDate : false,
		showShortcuts: false,
		language: 'ru',
		customArrowPrevSymbol: '<div id="btnPrev"></div>',
		customArrowNextSymbol: '<div id="btnNext"></div>',
		singleMonth: true,
		inline:true,
		showTopbar: false,
		container: '#date-range12-container',
		alwaysOpen:true,
		}).bind('datepicker-change',function(event,obj)
		{
		// alert(obj['value']);
		setTimeout(function(){window.location.href = '/search?s='+obj['value']; }, 500);
		
		
			/* This event will be triggered when second date is selected */
			console.log(obj['value']);
			// obj will be something like this:
			// {
			// 		date1: (Date object of the earlier date),
			// 		date2: (Date object of the later date),
			//	 	value: "2013-06-05 to 2013-06-07"
			// }
		});

})(jQuery);



