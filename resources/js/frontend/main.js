let deferredPrompt;
const addBtn = document.querySelector('.add-button');
addBtn.style.display = 'none';

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    // Update UI to notify the user they can add to home screen
    addBtn.style.display = 'block';

    addBtn.addEventListener('click', (e) => {
        // hide our user interface that shows our A2HS button
        addBtn.style.display = 'none';
        // Show the prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('User accepted the A2HS prompt');
            } else {
                console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
        });
    });
});

var btn = $('#back-to-top');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

$(document).ready(function(){
  $('.owl-carousel').each(function () {
    var $this = $(this),
        $items = ($this.data('items')) ? $this.data('items') : 1,
        $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
        $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
        $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
        $autoplay = ($this.data('autoplay')) ? $this.data('autoplay') : true,
        $space = ($this.data('space')) ? $this.data('space') : 30;


      $(this).owlCarousel({
        loop:$loop,
        items:$items,
        responsive:{
            0:{items: $this.data('xx-items') ? $this.data('xx-items') : 2},
            768:{items: $this.data('sm-items') ? $this.data('sm-items') : 3},
            992:{items: $items},
        },
        dots: $navdots,
        margin: $space,
        nav: $navarrow,
        navText: ["<i class='fas fa-angle-left fa-2x'></i>","<i class='fas fa-angle-right fa-2x'></i>"],
        autoplay: $autoplay,
        autoplayHoverPause: true
      });
  });
});

$(document).ready(function () {
  if ($("body")) {
    var c = void 0,
        u = void 0,
        e = [],
        n = $(".menu-kategorie-suche"),
        a = $(".menu-mahlzeit-suche-input"),
        l = $(".keine_produkte_gefunden"),
        t = $(".js-produkt-suche"),
        i = $(".js-menu-mahlzeit-loesche-suche"),
        o = { EXPANDED_CLASS: "expanded", TAB_KEY: 9, DELAY_TIME: 100 };
    t.bind("keyup", function (e) {
      e.preventDefault(), n.addClass(o.EXPANDED_CLASS), d(), s();
    }),
        i.bind("focusout", function (e) {
          e.preventDefault(), n.removeClass(o.EXPANDED_CLASS);
        });
    /*i.bind("click", function (e) {
        e.preventDefault(), ("" !== a.val() && !1 === window.app.services.mediaQueryService.respondTo(">=tablet-landscape")) || r(), a.val(""), d();
    }),*/
    $(".js-menu-mahlzeit-suche-expand").on("click", function () {
      n.is("." + o.EXPANDED_CLASS) || r(), s();
    }),
        l.find(".js-reset-produkt-filter").on("click", function () {
          a.val(""), d();
        });
  }
  function r() {
    n.toggleClass(o.EXPANDED_CLASS), n.is("." + o.EXPANDED_CLASS) && s();
  }
  function s() {
    a.focus();
  }

  function d() {
    var e = a.val();
    null !== c && window.clearTimeout(c);
    var n = 0;
    0 < e.length && (n = o.DELAY_TIME),
        window.setTimeout(
            function (e) {
              window.clearTimeout(c);
              var n = (function () {
                    if (!u) {
                      var e = {
                            shouldSort: !1,
                            threshold: 0.38,
                            location: 0,
                            distance: 350,
                            maxPatternLength: 32,
                            sortFn: function (e, n) {
                              return parseFloat(n.score) - parseFloat(e.score);
                            },
                            keys: [
                              {name: "name", weight: 0.9},
                              {name: "description", weight: 0.1},
                            ],
                          },
                          n = m(),
                          t = [];
                      n.each(function (e, n) {
                        var a = $(this);
                        t.push({
                          className: ".js-mahlzeiten-suche-" + n.id,
                          name: a.find(".speisekarte__mahlzeit-name").text().trim(),
                          description: a.find(".speisekarte__mahlzeit-beschreibung-zusaetzliche-information").text().trim()
                        });
                      }),
                          (u = new Fuse(t, e));
                    }
                    return u;
                  })(),
                  a = m(),
                  t = $(".speisekarte__mahlzeiten-gruppe");
              if ((l.hide(), 0 === e.length)) return a.show(), t.show(), !1;
              a.hide(), t.hide();
              var i = n.search(e);
              for (var o in i) {
                var r = $(i[o].className),
                    s = r.closest(".speisekarte__mahlzeiten-gruppe");
                r.show(), s.show();
              }
              0 === i.length && l.show();
            }.bind(null, e),
            n
        );
  }
  function m() {
    return 0 === e.length && (e = $('#ispeisekarte .speisekarte__mahlzeiten-gruppe[id!="0"] .js-mahlzeiten-container')), e;
  }
});

var _typeof =
    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
        ? function (e) {
          return typeof e;
        }
        : function (e) {
          return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
        };
$(document).ready(function () {
  if ($("body")) {
    var l = document.querySelector(".menu-kategorie-bar"),
        o = document.querySelector(".js-menu-kategorie-bar-sticky"),
        i = document.querySelector(".js-speisekarte-haupt-container"),
        n = "kategorie-scroll",
        r = new Swiper(".js-swiper", {slidesPerView: 'auto', freeMode: true, loop: false, watchOverflow: true, navigation: { nextEl: ".swipe-next" } });
    ($.fn.isInViewport = function () {
      var e = $(this).offset().top,
          t = e + $(this).outerHeight(),
          o = $(window).scrollTop(),
          i = o + $(window).height(),
          n = $(".menu-kategorie-bar-container"),
          r = 0 < n.length ? n.outerHeight() : 0,
          s = $(".smartbnr");
      return o + r + (0 < s.length ? s.outerHeight() : 0) < t && e < i;
    }),
        $(document).scroll(function () {
          a(), u();
        });
    function s(e) {
      if (e) {
        var t = e.getBoundingClientRect(),
            o = l ? l.getBoundingClientRect().height : 0,
            i = document.querySelector(".smartbnr"),
            n = i ? i.getBoundingClientRect().height : 0,
            r = (window.scrollY | window.pageYOffset) + t.top - o - n;
        window.scrollTo(0, r);
        var s = e.querySelector(".js-mahlzeit-item");
        s && s.focus();
      }
    }
    var e = document.querySelectorAll(".menu-kategorie-liste .swiper-slide");
    for (var t in e) {
      var c = e[t];
      "object" === (void 0 === c ? "undefined" : _typeof(c)) && c.addEventListener("click", function () {
        var e = this.dataset.category;
        if (e) {
          var t = null;
          "0" !== e && (t = document.getElementById(e)), (t = t || (t = document.querySelector(".menu-mahlzeiten-gruppe-beliebt")) || document.querySelector(".menu-speisekarte")), s(t), history.replaceState(null, null, $(this).attr("href"));
        }
      });
    }
    u(), a();
  }
  function a() {
    if (i && o && l) {
      var e = document.querySelector(".smartbnr"),
          t = e ? e.getBoundingClientRect().height : 0;
      o.getBoundingClientRect().top <= t ? i.classList.add(n) : i.classList.remove(n);
    }
  }
  function u() {
    var e = void 0;
    $(".speisekarte__mahlzeiten-gruppe").each(function () {
      $(this).isInViewport() && (void 0 === e || $(this).position().top < $(e).position().top) && (e = this);
    });
    var t = $(e).attr("anchor-id");
    if (void 0 === t) r.slides && r.slides.length && (r.slideTo(0), $(".swiper-slide").removeClass("slide-active"), $(".swiper-wrapper a:first-child").addClass("slide-active"));
    else {
      var o = $('a[href="#' + t + '"]');
      /*r.slideTo(o.index()),*/ $(".swiper-slide").removeClass("slide-active"), o.addClass("slide-active");
    }
  }
});