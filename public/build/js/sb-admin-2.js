function unhideBody() {
  var bodyElems = document.getElementsByTagName("body");
  bodyElems[0].style.visibility = "visible";
  $("#overlay").fadeOut();
}
(function($) {
  "use strict"; // Start of use strict
 // alert(document.cookie);
// var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)flag\s*\=\s*([^;]*).*$)|^.*$/, "$1");
// var toggle_flag = Number(cookieValue);
// if( toggle_flag === 1){
//  $("body").toggleClass("sidebar-toggled");
//  $(".sidebar").toggleClass("toggled");
//  $('#sidebarToggle').hide();
//  $('#viewless').show();
// } 
// else {
//  $("body").toggleClass("");
//  $(".sidebar").toggleClass("");
//  $('#viewless').hide();
// }

//  // Toggle the side navigation
//  $("#sidebarToggle").on('click',function(e) {
//   $("body").toggleClass("sidebar-toggled");
// $(".sidebar").toggleClass("toggled");
// $('#sidebarToggle').hide();
// $('#viewless').show();
// document.cookie = 'flag=1; path=/';
// var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)flag\s*\=\s*([^;]*).*$)|^.*$/, "$1");
// if ($(".sidebar").hasClass("toggled")) {
//   $('.sidebar .collapse').collapse('hide');
// };
//  });

//  $('#viewless').click(function(){
//   $("body").toggleClass("sidebar-toggled");
// $(".sidebar").toggleClass("toggled");
//   $('#sidebarToggle').show();
//   $('#viewless').hide();
//   document.cookie = 'flag=2; path=/';
//   var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)flag\s*\=\s*([^;]*).*$)|^.*$/, "$1");
// });

//   // Toggle the side navigation
//   $(" #sidebarToggleTop").on('click', function(e) {
//     $("body").toggleClass("sidebar-toggled");
//     $(".sidebar").toggleClass("toggled");
//   if ($(".sidebar").hasClass("toggled")) {
//     $('.sidebar .collapse').collapse('hide');
//   };
//   });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      document.cookie = 'flag=1; path=/';
      $('.sidebar .collapse').collapse('hide');
      // if ($(".sidebar").hasClass("toggled")) {
      //   $('.sidebar .collapse').collapse('hide');
      // };
      $("#sidebarToggleTop").on('click',function(e) {
        $(".sidebar").toggleClass("toggled ");

       });
    };
  });

  if ($(window).width() < 768) {
    document.cookie = 'flag=1; path=/';
    $('.sidebar .collapse').collapse('hide');
    // if ($(".sidebar").hasClass("toggled")) {
    //   $('.sidebar .collapse').collapse('hide');
    // };
    // $("#sidebarToggleTop").on('click',function(e) {
    //   $(".sidebar").toggleClass("toggled");
    //  });
  }

//   if ($(window).width() < 400) {
//     document.cookie = 'flag=2; path=/';
//    $('.sidebar .collapse').collapse('hide');
//   //  if ($(".sidebar").hasClass("toggled")) {
//   //    $('.sidebar .collapse').collapse('hide');
//   //  };
//    $("#sidebarToggleTop").on('click',function(e) {
//      $(".sidebar").toggleClass("toggled");
//     });
//  };

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });
})(jQuery); // End of use strict

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('clock').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

function dateRangeFormat(param){
  let curDate = new Date();
  curDate.setDate(curDate.getDate() + param ); // Set now + 30 days as the new date
  let dd = String(curDate.getDate()).padStart(2, '0');
  let mm = String(curDate.getMonth() + 1).padStart(2, '0'); //January is 0!
  let yyyy = curDate.getFullYear();
  return curDate = yyyy + '-' + mm + '-' + dd ;
}

function dateFormatddmmyyyy(param){

  let curDate = new Date(param);
  let dd = String(curDate.getDate()).padStart(2, '0');
  let mm = String(curDate.getMonth() + 1).padStart(2, '0'); //January is 0!
  let yyyy = String(curDate.getFullYear() + 543);
  console.log(dd + '-' + mm + '-' + yyyy)
  return curDate = dd + '-' + mm + '-' + yyyy ;
}