$(document).ready(function() {
	var map;
      function initialize() {
        var mapOptions = {
          zoom: 8,
          center: new google.maps.LatLng(37.476437,-122.155075),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
});