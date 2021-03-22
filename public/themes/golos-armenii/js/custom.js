// $(document).ready(function () {
//     $(".collap-main-nav, .close-nav").on("click", function () {
//         $(".main-nav").toggleClass("main-nav-active");
//     }),
//         $(window).scroll(function () {
//             $(this).scrollTop() > 200 ? $(".icon-back-top").addClass("icon-back-top-active") : $(".icon-back-top").removeClass("icon-back-top-active");
//         }),
//         $(".icon-back-top").click(function () {
//             $("body,html").animate({ scrollTop: 0 }, "slow");
//         }),
//         $(".form-popup").fancybox({ maxWidth: 800, maxHeight: 600, fitToView: !1, width: "70%", height: "70%", autoSize: !1, closeClick: !1, openEffect: "none", closeEffect: "none" });


// });
// var fb_opts = { overlayShow: !0, hideOnOverlayClick: !0, showCloseButton: !0, margin: 20, centerOnScroll: !0, enableEscapeButton: !0, autoScale: !0 },
//     easy_fancybox_handler = function () {
//         var o =
//             'a[href*=".jpg"]:not(.nolightbox,li.nolightbox>a), area[href*=".jpg"]:not(.nolightbox), a[href*=".jpeg"]:not(.nolightbox,li.nolightbox>a), area[href*=".jpeg"]:not(.nolightbox), a[href*=".png"]:not(.nolightbox,li.nolightbox>a), area[href*=".png"]:not(.nolightbox)';
//         jQuery(o).addClass("fancybox image");
//         var a = jQuery("div.gallery");
//         a.each(function () {
//             jQuery(this)
//                 .find(o)
//                 .attr("rel", "gallery-" + a.index(this));
//         }),
//             jQuery("a.fancybox, area.fancybox, li.fancybox a").fancybox(
//                 jQuery.extend({}, fb_opts, {
//                     transitionIn: "elastic",
//                     easingIn: "easeOutBack",
//                     transitionOut: "elastic",
//                     easingOut: "easeInBack",
//                     opacity: !1,
//                     hideOnContentClick: !1,
//                     titleShow: !0,
//                     titlePosition: "over",
//                     titleFromAlt: !0,
//                     showNavArrows: !0,
//                     enableKeyboardNav: !0,
//                     cyclic: !1,
//                 })
//             ),
//             jQuery("a.fancybox-iframe, area.fancybox-iframe, li.fancybox-iframe a").fancybox(
//                 jQuery.extend({}, fb_opts, { type: "iframe", width: "70%", height: "90%", padding: 0, titleShow: !1, titlePosition: "float", titleFromAlt: !0, allowfullscreen: !1 })
//             );
//     },
//     easy_fancybox_auto = function () {
//         setTimeout(function () {
//             jQuery("#fancybox-auto").trigger("click");
//         }, 1e3);
//     };
// jQuery(document).on("ready post-load", function () {
//     jQuery('.nofancybox,a.pin-it-button,a[href*="pinterest.com/pin/create/button"]').addClass("nolightbox");
// }),
//     jQuery(document).on("ready post-load", easy_fancybox_handler),
//     jQuery(document).on("ready", easy_fancybox_auto);


var Cal = function(divId) {

  //Store div id
  this.divId = divId;

  // Days of week, starting on Sunday
  this.DaysOfWeek = [
    'Вс',
    'Пн',
    'Вт',
    'Ср',
    'Чт',
    'Пя',
    'Сб'
  ];

  // Months, stating on January
  this.Months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

  // Set the current month, year
  var d = new Date();

  this.currMonth = d.getMonth();
  this.currYear = d.getFullYear();
  this.currDay = d.getDate();

};

// Goes to next month
Cal.prototype.nextMonth = function() {
  if ( this.currMonth == 11 ) {
    this.currMonth = 0;
    this.currYear = this.currYear + 1;
  }
  else {
    this.currMonth = this.currMonth + 1;
  }
  this.showcurr();
};

// Goes to previous month
Cal.prototype.previousMonth = function() {
  if ( this.currMonth == 0 ) {
    this.currMonth = 11;
    this.currYear = this.currYear - 1;
  }
  else {
    this.currMonth = this.currMonth - 1;
  }
  this.showcurr();
};

// Show current month
Cal.prototype.showcurr = function() {
  this.showMonth(this.currYear, this.currMonth);
};

// Show month (year, month)
Cal.prototype.showMonth = function(y, m) {

  var d = new Date()
  // First day of the week in the selected month
  , firstDayOfMonth = new Date(y, m, 1).getDay()
  // Last day of the selected month
  , lastDateOfMonth =  new Date(y, m+1, 0).getDate()
  // Last day of the previous month
  , lastDayOfLastMonth = m == 0 ? new Date(y-1, 11, 0).getDate() : new Date(y, m, 0).getDate();


  var html = '<table>';

  // Write selected month and year
  html += '<thead><tr>';
  html += '<td colspan="7">' + this.Months[m] + ' ' + y + '</td>';
  html += '</tr></thead>';


  // Write the header of the days of the week
  html += '<tr class="days">';
  for(var i=0; i < this.DaysOfWeek.length;i++) {
    html += '<td>' + this.DaysOfWeek[i] + '</td>';
  }
  html += '</tr>';

  // Write the days
  var i=1;
  do {

    var dow = new Date(y, m, i).getDay();

    // If Sunday, start new row
    if ( dow == 0 ) {
      html += '<tr>';
    }
    // If not Sunday but first day of the month
    // it will write the last days from the previous month
    else if ( i == 1 ) {
      html += '<tr>';
      var k = lastDayOfLastMonth - firstDayOfMonth+1;
      for(var j=0; j < firstDayOfMonth; j++) {
        html += '<td class="not-current"><a href="/search?d='+k+'">' + k + '</a></td>';
        k++;
      }
    }

    // Write the current day in the loop
    var chk = new Date();
    var chkY = chk.getFullYear();
    var chkM = chk.getMonth();
    if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
      html += '<td class="today">' + i + '</td>';
    } else if(chkY > this.currYear || chkY == this.currYear && chkM > this.currMonth || chkY == this.currYear && chkM == this.currMonth && i > this.currDay ){
      html += '<td class="not-current">' + i + '</td>';
    } else {
      html += '<td class="normal"><a href="/search?d='+chk+'">' + i + '</a></td>';
    }
    // If Saturday, closes the row
    if ( dow == 6 ) {
      html += '</tr>';
    }
    // If not Saturday, but last day of the selected month
    // it will write the next few days from the next month
    else if ( i == lastDateOfMonth ) {
      var k=1;
      for(dow; dow < 6; dow++) {
        html += '<td class="not-current"><a href="/search?d='+k+'">' + k + '</a></td>';
        k++;
      }
    }

    i++;
  }while(i <= lastDateOfMonth);

  // Closes table
  html += '</table>';

  // Write HTML to the div
  document.getElementById(this.divId).innerHTML = html;
};

// On Load of the window
window.onload = function() {

  // Start calendar
  var c = new Cal("divCal");			
  c.showcurr();

  // Bind next and previous button clicks
  getId('btnNext').onclick = function() {
    c.nextMonth();
  };
  getId('btnPrev').onclick = function() {
    c.previousMonth();
  };
}

// Get element by id
function getId(id) {
  return document.getElementById(id);
}