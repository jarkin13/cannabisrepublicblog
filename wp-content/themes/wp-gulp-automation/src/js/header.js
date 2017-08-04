// ==== HEADER ==== //

// A simple wrapper for all your custom jQuery that belongs in the header
;(function($){
  $(function(){
    if( $('#single').val() !== undefined ) {
      $(window).resize(function() {
        $('#share-sidebar').height($('#post-content').height() - $('#share-sidebar').offset().top);
        $('#most-popular-sidebar').height($('#post-content').height() - $('#most-popular-sidebar').offset().top);
      });
      $(window).resize();
    };

    if( $('#home').val() !== undefined ) {
      $(".cannabis-states").select2({
        placeholder: 'select state',
        width: '100%'
      }).on('select2:select', function(e){
        location.href = $(this).val();
      });
      $(".cannabis-states").select2("val", " ");

      $(window).click(function() {
        $('.cannabis-states').select2('close');
      });

      $('.dropdown').click(function(event){
          event.stopPropagation();
      });
    };
  });
}(jQuery));
