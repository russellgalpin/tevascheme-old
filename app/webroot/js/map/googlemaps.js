//Google Map API
var map
var markers = []

// after the geojson is loaded, iterate through the map data to create markers
// and add the pop up (info) windows
function loadMarkers() {
    console.log('creating markers')
    var infoWindow = new google.maps.InfoWindow()
    geojson_url = '../../js/map/locations.geojson'
    $.getJSON(geojson_url, function(result) {
        // Post select to url.
        data = result['features']
        $.each(data, function(key, val) {
        var point = new google.maps.LatLng(
                parseFloat(val['geometry']['coordinates'][1]),
                parseFloat(val['geometry']['coordinates'][0]));
        var titleText = val['properties']['Centre']
        var addressText = val['properties']['Address']
        var cityText = val['properties']['City']
        var postcodeText = val['properties']['Postal Code']
        var marker = new google.maps.Marker({
            position: point,
            title: titleText,
            map: map,
            icon: {
            url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
            },
            properties: val['properties']
            });

        var markerInfo = "<div><h2>" + titleText + "</h2>" + "<p>" + addressText + "<br />" + cityText + "<br />" + postcodeText + "</p>" + "</div>"


        marker.addListener('click', function() {
                infoWindow.close()
                infoWindow.setContent(markerInfo)
                infoWindow.open(map, marker)
            });
        markers.push(marker)
        });
    });
}

function initMap() {
    map_options = {
        zoom: 6,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: {lat: 54.559322, lng: -4.174804}
    }
    
    map_document = document.getElementById('map')
    map = new google.maps.Map(map_document,map_options);
    loadMarkers()
}