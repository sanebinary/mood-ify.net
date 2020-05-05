<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/leaflet-openweathermap.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/leaflet.css">


    <title>Moodify Search Page</title>
</head>

<body>

    <div class="city-find-page--wrapper">
        <div class="city-find-page-title"><a id="mood" href="<?php echo base_url()?>">Moodify</a><a
                id="city-find-page-title--dot">.</a></div>
        <span class="city-find-page-connect">Connect to <a id="sitename">Spotify</a></span>
        <div class="city-find-form--wrapper">
            <form class="city-find-form" method="GET" action="" target="dummy">
                <input autocomplete="off" spellcheck="false" class="city-find-form--input" type="text"
                    placeholder="search places" name="city" required>
            </form>
        </div>
        <p class="deep-quotes">Find your city<a class="dot">.</a> Check your weather<a class="dot">.</a> Listen to our
            music<a class="dot">.</a></p>
    </div>
    <iframe name="dummy" style="display:none;"></iframe>
    <div id="map"></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/script/homepage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
    <script type="text/javascript" src="../assets/script/leaflet-src.js"></script>
    <script type="text/javascript" src="../assets/script/leaflet-owm.js"></script>
    <script type="text/javascript" src="../assets/script/iconLayer.js"></script>


    <script>
        var providers = {};

        providers['Mapbox'] = {
            title: 'Mapbox',
            layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'sk.eyJ1Ijoic2FuZWJpbmFyeSIsImEiOiJjazlza2dpM2kwMnNyM25wOHBqMGVvcjF2In0.g0fl1a2n9L5zD-v47UrpFA'
            })
        };
    </script>
    <script>
        var map = L.map('map').setView([10, 108], 10);
        var Temp = L.tileLayer('http://maps.openweathermap.org/maps/2.0/weather/TA2/{z}/{x}/{y}?date=1527811200&opacity=0.9&fill_bound=true&appid={api_key}', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://owm.io">VANE</a>',
            api_key : '794cbeac3e3086e1977ab70e4c704c27',
        });
        var owm = new L.OWMLayer({ key: '794cbeac3e3086e1977ab70e4c704c27' });
        map.addLayer(owm);
        Temp.addTo(map);
        var overlays = { "Temp": Temp };
        L.control.layers(overlays, null, { collapsed: false }).addTo(map);
        var layers = [];
        for (var providerId in providers) {
            layers.push(providers[providerId]);
        }

        L.control.iconLayers(layers).addTo(map);
    </script>

    <!--<script type="text/javascript" src="../assets/script/Spotify.js"></script>-->
</body>