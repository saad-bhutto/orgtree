! function(a) {
    a.fn.dcAccordion = function(b) {
        function c(b, c) {
            var d = a.cookie(b);
            if (null != d) {
                var f = d.split(",");
                a.each(f, function(b, d) {
                    var f = a("li:eq(" + d + ")", c);
                    a("> a", f).addClass(e.classActive);
                    var g = f.parents("li");
                    a("> a", g).addClass(e.classActive)
                })
            }
        }

        function d(b, c) {
            var d = [];
            a("li a." + e.classActive, c).each(function(b) {
                var e = a(this).parent("li"),
                    f = a("li", c).index(e);
                d.push(f)
            }), a.cookie(b, d, {
                path: "/"
            })
        }
        var e = {
                classParent: "dcjq-parent",
                classActive: "active",
                classArrow: "dcjq-icon",
                classCount: "dcjq-count",
                classExpand: "dcjq-current-parent",
                eventType: "click",
                hoverDelay: 300,
                menuClose: !0,
                autoClose: !0,
                autoExpand: !1,
                speed: "slow",
                saveState: !0,
                disableLink: !0,
                showCount: !1,
                cookie: "dcjq-accordion"
            },
            b = a.extend(e, b);
        this.each(function(b) {
            function f() {
                $arrow = '<span class="' + e.classArrow + '"></span>';
                var b = e.classParent + "-li";
                a("> ul", m).show(), a("li", m).each(function() {
                    a("> ul", this).length > 0 && (a(this).addClass(b), a("> a", this).addClass(e.classParent).append($arrow))
                }), a("> ul", m).hide(), 1 == e.showCount && a("li." + b, m).each(function() {
                    if (1 == e.disableLink) var b = parseInt(a("ul a:not(." + e.classParent + ")", this).length);
                    else var b = parseInt(a("ul a", this).length);
                    a("> a", this).append(' <span class="' + e.classCount + '">(' + b + ")</span>")
                })
            }

            function g() {
                $activeLi = a(this).parent("li"), $parentsLi = $activeLi.parents("li"), $parentsUl = $activeLi.parents("ul"), 1 == e.autoClose && k($parentsLi, $parentsUl), a("> ul", $activeLi).is(":visible") ? (a("ul", $activeLi).slideUp(e.speed), a("a", $activeLi).removeClass(e.classActive)) : (a(this).siblings("ul").slideToggle(e.speed), a("> a", $activeLi).addClass(e.classActive)), 1 == e.saveState && d(e.cookie, m)
            }

            function h() {}

            function i() {}

            function j() {
                1 == e.menuClose && (a("ul", m).slideUp(e.speed), a("a", m).removeClass(e.classActive), d(e.cookie, m))
            }

            function k(b, c) {
                a("ul", m).not(c).slideUp(e.speed), a("a", m).removeClass(e.classActive), a("> a", b).addClass(e.classActive)
            }

            function l() {
                a("ul", m).hide(), $allActiveLi = a("a." + e.classActive, m), $allActiveLi.siblings("ul").show()
            }
            var m = this;
            if (f(), 1 == e.saveState && c(e.cookie, m), 1 == e.autoExpand && a("li." + e.classExpand + " > a").addClass(e.classActive), l(), "hover" == e.eventType) {
                var n = {
                    sensitivity: 2,
                    interval: e.hoverDelay,
                    over: g,
                    timeout: e.hoverDelay,
                    out: h
                };
                a("li a", m).hoverIntent(n);
                var o = {
                    sensitivity: 2,
                    interval: 1e3,
                    over: i,
                    timeout: 1e3,
                    out: j
                };
                a(m).hoverIntent(o), 1 == e.disableLink && a("li a", m).click(function(b) {
                    a(this).siblings("ul").length > 0 && b.preventDefault()
                })
            } else a("li a", m).click(function(b) {
                $activeLi = a(this).parent("li"), $parentsLi = $activeLi.parents("li"), $parentsUl = $activeLi.parents("ul"), 1 == e.disableLink && a(this).siblings("ul").length > 0 && b.preventDefault(), 1 == e.autoClose && k($parentsLi, $parentsUl), a("> ul", $activeLi).is(":visible") ? (a("ul", $activeLi).slideUp(e.speed), a("a", $activeLi).removeClass(e.classActive)) : (a(this).siblings("ul").slideToggle(e.speed), a("> a", $activeLi).addClass(e.classActive)), 1 == e.saveState && d(e.cookie, m)
            })
        })
    }
}(jQuery),
function(a) {
    a.fn.hoverIntent = function(b, c) {
        var d = {
            sensitivity: 7,
            interval: 100,
            timeout: 0
        };
        d = a.extend(d, c ? {
            over: b,
            out: c
        } : b);
        var e, f, g, h, i = function(a) {
                e = a.pageX, f = a.pageY
            },
            j = function(b, c) {
                return c.hoverIntent_t = clearTimeout(c.hoverIntent_t), Math.abs(g - e) + Math.abs(h - f) < d.sensitivity ? (a(c).unbind("mousemove", i), c.hoverIntent_s = 1, d.over.apply(c, [b])) : (g = e, h = f, c.hoverIntent_t = setTimeout(function() {
                    j(b, c)
                }, d.interval), void 0)
            },
            k = function(a, b) {
                return b.hoverIntent_t = clearTimeout(b.hoverIntent_t), b.hoverIntent_s = 0, d.out.apply(b, [a])
            },
            l = function(b) {
                for (var c = ("mouseover" == b.type ? b.fromElement : b.toElement) || b.relatedTarget; c && c != this;) try {
                    c = c.parentNode
                } catch (b) {
                    c = this
                }
                if (c == this) return !1;
                var e = jQuery.extend({}, b),
                    f = this;
                f.hoverIntent_t && (f.hoverIntent_t = clearTimeout(f.hoverIntent_t)), "mouseover" == b.type ? (g = e.pageX, h = e.pageY, a(f).bind("mousemove", i), 1 != f.hoverIntent_s && (f.hoverIntent_t = setTimeout(function() {
                    j(e, f)
                }, d.interval))) : (a(f).unbind("mousemove", i), 1 == f.hoverIntent_s && (f.hoverIntent_t = setTimeout(function() {
                    k(e, f)
                }, d.timeout)))
            };
        return this.mouseover(l).mouseout(l)
    }
}(jQuery), jQuery.cookie = function(a, b, c) {
    if ("undefined" == typeof b) {
        var d = null;
        if (document.cookie && "" != document.cookie)
            for (var e = document.cookie.split(";"), f = 0; f < e.length; f++) {
                var g = jQuery.trim(e[f]);
                if (g.substring(0, a.length + 1) == a + "=") {
                    d = decodeURIComponent(g.substring(a.length + 1));
                    break
                }
            }
        return d
    }
    c = c || {}, null === b && (b = "", c.expires = -1);
    var h = "";
    if (c.expires && ("number" == typeof c.expires || c.expires.toUTCString)) {
        var i;
        "number" == typeof c.expires ? (i = new Date, i.setTime(i.getTime() + 24 * c.expires * 60 * 60 * 1e3)) : i = c.expires, h = "; expires=" + i.toUTCString()
    }
    var j = c.path ? "; path=" + c.path : "",
        k = c.domain ? "; domain=" + c.domain : "",
        l = c.secure ? "; secure" : "";
    document.cookie = [a, "=", encodeURIComponent(b), h, j, k, l].join("")
};
var App = function() {
    var a, b, c, d, e, f, g, h = function() {
            a = jQuery("html"), b = jQuery("body"), c = jQuery(".content-wrapper"), d = jQuery(".nav-container"), e = jQuery(".view-wrapper"), f = jQuery(".header-container"), g = jQuery(".main-content"), jQuery('[data-toggle="tooltip"]').tooltip(), jQuery('[data-toggle="popover"]').popover(), jQuery(".sidebar-income-sparkline").sparkline([5, 8, 6, 7, 9, 8, 6, 7, 4, 7, 8, 7, 5, 8, 7, 6], {
                type: "bar",
                height: "30",
                barWidth: 8,
                barSpacing: 2,
                barColor: "#f81302"
            }), jQuery(".sidebar-stats-sparkline").sparkline([526, 97], {
                type: "pie",
                width: "125",
                height: "125",
                sliceColors: ["#f81302", "#fff"],
                borderWidth: 0,
                borderColor: "#f81302"
            })
        },
        i = function() {
            jQuery("[data-toggle-class]").click(function(a) {
                var b = jQuery(this);
                a.preventDefault();
                var c = b.data("toggle-class").split(","),
                    d = b.data("target") && b.data("target").split(",") || new Array(b),
                    e = 0;
                jQuery.each(c, function(a, b) {
                    var c = d[d.length && e];
                    jQuery(c).toggleClass(b), e++
                })
            })
        },
        j = function() {
            jQuery("#navigation-items").dcAccordion({
                speed: "fast"
            })
        },
        k = function() {
            var a, b, c, d, e, f;
            a = $("#fixed-header-cb").val(), b = $("#collapsed-sidebar-cb").val(), c = $("#fixed-sidebar-cb").val(), d = $("#fixed-footer-cb").val(), e = $("#show-avatar-cb").val(), jQuery("#fixed-header-cb").change(function() {
                jQuery(".content-wrapper").toggleClass(a)
            }), jQuery("#collapsed-sidebar-cb").change(function() {
                jQuery(".content-wrapper").toggleClass(b)
            }), jQuery(".toggle-collapsed-sidebar").click(function() {
                jQuery(".content-wrapper").toggleClass(b)
            }), jQuery("#fixed-sidebar-cb").change(function() {
                jQuery(".content-wrapper").toggleClass(c)
            }), jQuery("#fixed-footer-cb").change(function() {
                jQuery(".content-wrapper").toggleClass(d)
            }), jQuery("#show-avatar-cb").change(function() {
                jQuery(".content-wrapper").toggleClass(e)
            })
        },
        l = function() {
            $("input.input_field").focus(function() {
                $(this).parent().addClass("input--filled"), $(this).parent().addClass("" !== $(this).val() ? "input--filled" : "input--filled")
            }).blur(function() {
                "" !== $(this).val() ? $(this).parent().addClass("input--filled") : $(this).parent().removeClass("input--filled")
            })
        };
    return {
        init: function() {
            h(), i(), j(), k(), l()
        }
    }
}();
jQuery(function() {
    App.init()
});




var uiNotifications = function() {
    var a = function() {
        function a() {
            return b
        }
        var b, c = -1,
            d = 0,
            e = function() {
                var a = ["My name is Inigo Montoya. You killed my father. Prepare to die!", '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>', "Are you the six fingered man?", "Inconceivable!", "I do not think that means what you think it means.", "Have fun storming the castle!"];
                return c++, c === a.length && (c = 0), a[c]
            },
            f = function(a) {
                return a = a ? a : "Clear itself?", a += '<br /><br /><button type="button" class="btn clear">Yes</button>'
            };
        $("#showtoast").click(function() {
            var a = $("#toastTypeGroup input:radio:checked").val(),
                c = $("#message").val(),
                g = $("#title").val() || "",
                h = $("#showDuration"),
                i = $("#hideDuration"),
                j = $("#timeOut"),
                k = $("#extendedTimeOut"),
                l = $("#showEasing"),
                m = $("#hideEasing"),
                n = $("#showMethod"),
                o = $("#hideMethod"),
                p = d++,
                q = $("#addClear").prop("checked");
            toastr.options = {
                closeButton: $("#closeButton").prop("checked"),
                debug: $("#debugInfo").prop("checked"),
                newestOnTop: $("#newestOnTop").prop("checked"),
                progressBar: $("#progressBar").prop("checked"),
                positionClass: $("#positionGroup input:radio:checked").val() || "toast-top-right",
                preventDuplicates: $("#preventDuplicates").prop("checked"),
                onclick: null
            }, $("#addBehaviorOnToastClick").prop("checked") && (toastr.options.onclick = function() {
                alert("You can perform some custom action after a toast goes away")
            }), h.val().length && (toastr.options.showDuration = h.val()), i.val().length && (toastr.options.hideDuration = i.val()), j.val().length && (toastr.options.timeOut = q ? 0 : j.val()), k.val().length && (toastr.options.extendedTimeOut = q ? 0 : k.val()), l.val().length && (toastr.options.showEasing = l.val()), m.val().length && (toastr.options.hideEasing = m.val()), n.val().length && (toastr.options.showMethod = n.val()), o.val().length && (toastr.options.hideMethod = o.val()), q && (c = f(c), toastr.options.tapToDismiss = !1), c || (c = e()), $("#toastrOptions").text('Command: toastr["' + a + '"]("' + c + (g ? '", "' + g : "") + '")\n\ntoastr.options = ' + JSON.stringify(toastr.options, null, 2));
            var r = toastr[a](c, g);
            b = r, "undefined" != typeof r && (r.find("#okBtn").length && r.delegate("#okBtn", "click", function() {
                alert("you clicked me. i was toast #" + p + ". goodbye!"), r.remove()
            }), r.find("#surpriseBtn").length && r.delegate("#surpriseBtn", "click", function() {
                alert("Surprise! you clicked me. i was toast #" + p + ". You could perform an action here.")
            }), r.find(".clear").length && r.delegate(".clear", "click", function() {
                toastr.clear(r, {
                    force: !0
                })
            }))
        }), $("#clearlasttoast").click(function() {
            toastr.clear(a())
        }), $("#cleartoasts").click(function() {
            toastr.clear()
        })
    };
    return {
        init: function() {
            a()
        }
    }
}();
jQuery(function() {
    uiNotifications.init()
});