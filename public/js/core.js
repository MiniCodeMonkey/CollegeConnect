var map;
var infowindow;

$(document).ready(function() {

    function initialize() {
        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(37.583766,-123.563232),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        infowindow = new google.maps.InfoWindow({
            content: contentString
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Uluru</h2>'+
        '<div id="bodyContent">'+
        '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
        'sandstone rock formation in the southern part of the '+
        'Northern Territory, central Australia. It lies 335 km (208 mi) '+
        'south west of the nearest large town, Alice Springs; 450 km '+
        '(280 mi) by road. Kata Tjuta and Uluru are the two major '+
        'features of the Uluru - Kata Tjuta National Park. Uluru is '+
        'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
        'Aboriginal people of the area. It has many springs, waterholes, '+
        'rock caves and ancient paintings. Uluru is listed as a World '+
        'Heritage Site.</p>'+
        '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
        'http://en.wikipedia.org/w/index.php?title=Uluru</a> (last visited June 22, 2009).</p>'+
        '</div>'+
        '</div>';

    var height = $(window).height();
    height = height - 100;
    $('#map-canvas').height(height + 'px');

    $.get('/colleges', function (colleges) {
        $.each(colleges, function (index, college) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(college.latitude, college.longitude),
                map: map,
                title: college.name,
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
        });
    });
});