// ==== HEADER ==== //

// A simple wrapper for all your custom jQuery that belongs in the header
;(function($){
  $(function(){
    $(document).ready(function() {
      $(".cannabis-states").select2({
        placeholder: 'select state',
        width: '100%'
      }).on('select2:select', function(){
          /*switch($(this).val())
          {
              case 'CT':
                  location.href = 'http://www.alabama.com';
                  break;
              case 'WY':
                  location.href = 'http://www.wyoming.com';
                  break;
          }*/
          console.log(val());

        });
      $(".cannabis-states").select2("val", " ");

      $(window).resize(function() {
        $('#share-sidebar').height($('#post-content').height() - $('#share-sidebar').offset().top);
      });
      $(window).resize();
    });

    $(window).click(function() {
      $('.cannabis-states').select2('close');
    });

    $('.dropdown').click(function(event){
        event.stopPropagation();
    });
  });
}(jQuery));
