var form_input = $(".city-find-form--input")
var title = $('.city-find-page-title');
var spotify_login = $('.city-find-page-connect');
var quotes = $('.deep-quotes');
var search_form = $('.city-find-form--wrapper');
var elems_to_move = [title, spotify_login, search_form, quotes];
var arr_length = elems_to_move.length;
var mapInit = 0;
var map;

$('#map').width(search_form.width())
$('#map').hide();

$(".city-find-form").bind("submit", moveElems);
form_input.bind("change", isEmpty);

function moveElems() {
    quotes.hide();
    if (!elems_to_move[0].hasClass('hide')) {
        for (i = 0; i < arr_length; i++) {
            elems_to_move[i].removeClass('show');
            elems_to_move[i].addClass('hide');
        }
    }
    geolocation = getGeo();
    if (typeof geolocation !== 'undefined') {
        setTimeout(() => { setupMap(geolocation); }, 500);
        form_input.on("keyup", isEmpty);
    }
    else {
        showError();
    }
}

function isEmpty() {
    if (form_input.val() == "") {
        for (i = 0; i < arr_length; i++) {
            elems_to_move[i].removeClass('hide');
            elems_to_move[i].addClass('show');
            $('#map').hide();
            $('.button').remove();
            $('.city-noplace').remove();
        }
        quotes.show();
    }
}

function getGeo() {
    var city = encodeURI(form_input.val());
    var endpoint = "mapbox.places";
    var access_token = "sk.eyJ1Ijoic2FuZWJpbmFyeSIsImEiOiJjazlza2dpM2kwMnNyM25wOHBqMGVvcjF2In0.g0fl1a2n9L5zD-v47UrpFA"
    url = "https://api.mapbox.com/geocoding/v5/" + endpoint + "/" + city + ".json" + "?limit=1&" + "access_token=" + access_token;
    resp = $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        async: false,
    });

    features = resp.responseJSON["features"]
    if (typeof features !== 'undefined' && features.length > 0) {
        geocord = features[0]["center"];
        return geocord;
    }
}

function setupMap(coords) {
    if (mapInit != 0) {
        map.remove();
    }
    $('.button').remove();
    $('.city-noplace').remove();
    $('#map').show();
    $('<form method="GET" action="/city/" class="button nav-link"><div class="bottom"></div><button class="top"><input type="hidden" id="geocode-latitude" name="latitude" value="' + coords[1] + '"><input id="geocode-longtitude" type="hidden" name="longtitude" value="' + coords[0] + '"><div class="label">Use this marker as your location</div><div class="button-border button-border-left"></div><div class="button-border button-border-top"></div><div class="button-border button-border-right"></div><div class="button-border button-border-bottom"></div></button></form>').insertAfter('#map');
    map = L.map('map', { attributionControl: false }).setView([coords[1], coords[0]], 10);
    var providers = {};

    providers['Mapbox'] = {
        title: 'X: ' + coords[0] + '<br>Y: ' + coords[1],
        layer: L.tileLayer('http://api.mapbox.com/styles/v1/{id}/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}', {
            maxZoom: 18,
            id: 'sanebinary/ck9z3qegj0g9f1ipbfiymo7i1',
            accessToken: 'sk.eyJ1Ijoic2FuZWJpbmFyeSIsImEiOiJjazlza2dpM2kwMnNyM25wOHBqMGVvcjF2In0.g0fl1a2n9L5zD-v47UrpFA'
        })
    };

    var Clouds = L.tileLayer('http://tile.openweathermap.org/map/clouds_new/{z}/{x}/{y}.png?appid=794cbeac3e3086e1977ab70e4c704c27', {
        maxZoom: 18,
        tileSize: 256,
    }),

        Temp = L.tileLayer('http://tile.openweathermap.org/map/temp_new/{z}/{x}/{y}.png?appid=794cbeac3e3086e1977ab70e4c704c27', {
            maxZoom: 18,
            tileSize: 256,
        }),

        Pressure = L.tileLayer('http://tile.openweathermap.org/map/pressure_new/{z}/{x}/{y}.png?appid=794cbeac3e3086e1977ab70e4c704c27', {
            maxZoom: 18,
            tileSize: 256,
        }),

        Wind = L.tileLayer('http://tile.openweathermap.org/map/wind_new/{z}/{x}/{y}.png?appid=794cbeac3e3086e1977ab70e4c704c27', {
            maxZoom: 18,
            tileSize: 256,
        }),

        Precipitation = L.tileLayer('http://tile.openweathermap.org/map/precipitation_new/{z}/{x}/{y}.png?appid=794cbeac3e3086e1977ab70e4c704c27', {
            maxZoom: 18,
            tileSize: 256,
        });

    var overlays = {
        "Clouds": Clouds, "Temperature": Temp, "Pressure": Pressure, "Wind": Wind, "Precipitation": Precipitation,
    };
    var layers = [];
    Clouds.addTo(map);
    L.control.layers(overlays, null, {
        collapsed: true
    }).addTo(map);

    var customMarker = L.icon({
        iconUrl: '../assets/imgs/icon15.svg',

        iconSize: [60, 50], // size of the icon
        iconAnchor: [30, 50],
        popupAnchor: [0, -50] // point from which the popup should open relative to the iconAnchor
    });

    var marker = L.marker([coords[1], coords[0]], { icon: customMarker }).addTo(map).bindPopup("You are here.");
    marker.openPopup();

    for (var providerId in providers) {
        layers.push(providers[providerId]);
    }

    L.control.iconLayers(layers).addTo(map);

    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        $('#geocode-latitude').val(e.latlng.lat.toFixed(3));
        $('#geocode-longtitude').val(e.latlng.lng.toFixed(3));
    });
    map.on('mousemove', function (e) {
        $(".leaflet-iconLayers-layerTitle").html('X: ' + e.latlng.lat.toFixed(3) + '<br>Y: ' + e.latlng.lng.toFixed(3));
    });
    mapInit += 1;
}

function showError() {
    if ($('.city-noplace').length) {
        console.log($('.city-noplace').length);
        $('#map').hide();
        $('.button').remove();
    }
    else {
        $('.city-noplace').remove();
        setTimeout(() => { $("<div class='city-noplace'>No such place exists!</div>").insertAfter($(".city-find-form--wrapper")); }, 300);
        $('#map').hide();
        $('.button').remove();
    }
}