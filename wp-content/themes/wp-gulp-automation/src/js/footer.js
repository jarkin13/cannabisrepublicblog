// ==== FOOTER ==== //

// A simple wrapper for all your custom jQuery that belongs in the footer
;(function($){
  $(function(){
    if( $('#home').val() !== undefined ) {
      var selectedStates = ['ak', 'az', 'ar', 'ca', 'ct', 'co', 'de', 'fl', 'hi', 'il', 'ma', 'md', 'me', 'mi', 'mn', 'mt', 'nv', 'nh', 'nj', 'nm', 'ny', 'nd', 'oh', 'or', 'pa', 'ri', 'vt', 'wa', 'wv'];
      var stateArr = {
        'alaska': 'Alaska',
        'arizona': 'Arizona',
        'arkansas': 'Arkansas',
        'california': 'California',
        'colorado': 'Colorado',
        'connecticut': 'Connecticut',
        'delaware': 'Delaware',
        'florida': 'Florida',
        'hawaii': 'Hawaii',
        'illinois': 'Illinois',
        'maine': 'Maine',
        'maryland': 'Maryland',
        'massachusetts': 'Massachusetts',
        'michigan': 'Michigan',
        'minnesota': 'Minnesota',
        'montana': 'Montana',
        'nevada': 'Nevada',
        'new-hampshire': 'New Hampshire',
        'new-jersey': 'New Jersey',
        'new-mexico': 'New Mexico',
        'new-york': 'New York',
        'north-dakota': 'North Dakota',
        'ohio': 'Ohio',
        'oregon': 'Oregon',
        'pennsylvania': 'Pennsylvania',
        'rhode-island': 'Rhode Island',
        'vermont': 'Vermont',
        'washington': 'Washington',
        'west-virginia': 'West Virginia'
      };

      jQuery(document).ready(function () {
        jQuery('#map').vectorMap({
          map: 'usa_en',
          enableZoom: false,
          backgroundColor: '#fff',
          showTooltip: true,
          hoverColor: null,
          selectedColor: '#2b5a22',
          color: '#fff',
          borderColor: '#000',
          selectedRegions: selectedStates,
          onRegionOver: function (event, code) {
          },
          onRegionClick: function(event, code, region){
            event.preventDefault();
            $.each( stateArr, function( key, value ) {
              if( region === value ) {
                location.href = '/category/state/' + key;
              }
            });
          }
        });
      });
    }
  });
}(jQuery));
