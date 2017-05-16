/**
 * Created by rgabriel on 11.05.2017.
 */

function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('contact-map-canvas'), {
        center: {lat: 46.523002, lng: 6.620261},
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);


    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.setTypes(['establishment']);

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);


        $('#gmaps-place-id').val(place.place_id);
        $('#gmaps-place-name').val(place.name);

        $('#gmaps-text-place-name').text(place.name);
        $('#gmaps-text-place-address').text(place.formatted_address);
        $('#gmaps-text-place-rating').removeClass().addClass("rating-system rating-"+place.rating);
        $('#gmaps-text-place-international_phone_number').text(place.international_phone_number);
        $('#gmaps-text-place-website').text(place.website);



        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.formatted_address);
        infowindow.open(map, marker);
    });


}

$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 25, // Creates a dropdown of 15 years to control year
        max: true
    });
});
