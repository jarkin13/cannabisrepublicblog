// ==== HEADER ==== //

// A simple wrapper for all your custom jQuery that belongs in the header
;(function($){
  $(function(){
    $(window).scroll(function () {
        // set distance user needs to scroll before we start fadeIn
        if ( $(this).scrollTop() > 5 && $(this).scrollTop() < $(this).height() * 0.81) {
          $('.navbar').fadeOut();
        } else {
          $('.navbar').fadeIn();
        }
        if ( $(this).scrollTop() > $(this).height() * 0.8) {
          $('.navbar').addClass('default-style');
        } else {
          $('.navbar').removeClass('default-style');
        }
    });
  });
}(jQuery));
