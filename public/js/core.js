$(document).ready(function() {
  	var map;
      function initialize() {
        var mapOptions = {
          zoom: 8,
          center: new google.maps.LatLng(37.583766,-123.563232),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

      var height = $(window).height();
      height = height - 100;
      $('#map-canvas').height(height + 'px');
});