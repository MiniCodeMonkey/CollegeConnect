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

        infowindow = new google.maps.InfoWindow();
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    var height = $(window).height();
    height = height - 100;
    $('#map-canvas').height(height + 'px');

    $.get('/colleges', function (colleges) {
        $.each(colleges, function (index, college) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(college.latitude, college.longitude),
                map: map,
                title: college.name
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(
                    '<h4>' + college.name + '</h4>' +
                    '<p><a href="http://'+ college.website +'" class="btn">Go to website</a></p>' +
                    '<p><a href="/college/'+ college.id +'" class="btn btn-primary"><span class="icon-exchange"></span> Talk to an ambassador</a></p>' +
                    '<div class="clearfix"></div>'
                );
                infowindow.open(map, marker);
            });
        });
    });
});