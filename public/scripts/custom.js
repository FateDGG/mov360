$(document).ready(function() {
    var windowHeight = $(window).height();
    var bodyHeight = $('body').height();
    var footerHeight = $('.footer').outerHeight();
  
    if (bodyHeight + footerHeight < windowHeight) {
      $('.footer').css({
        'position': 'fixed',
        'bottom': 0
      });
    }
  });