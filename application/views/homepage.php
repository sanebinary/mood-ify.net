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
    <link rel="stylesheet" type="text/css" href="../assets/css/leaflet.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/homepage.css">


    <title>Moodify Search Page</title>
</head>

<body>

    <div class="city-find-page--wrapper">
        <div class="city-find-page-title"><a id="mood" href="<?php echo base_url() ?>">Moodify</a><a id="city-find-page-title--dot">.</a></div>
        <span class="city-find-page-connect">Connect to <a id="sitename">Spotify</a></span>
        <div class="city-find-form--wrapper">
            <form class="city-find-form" method="GET" action="" target="dummy">
                <input autocomplete="off" spellcheck="false" class="city-find-form--input" type="text" placeholder="> places" name="city" required>\
                <div class="search-icon"><a></a> Search</div>
            </form>
        </div>
        <p class="deep-quotes">Find your city<a class="dot">.</a> Check your weather<a class="dot">.</a> Listen to our
            music<a class="dot">.</a></p>
        <div id="map"></div>
    </div>
    <iframe name="dummy" style="display:none;"></iframe>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
    <script type="text/javascript" src="../assets/script/leaflet-src.js"></script>
    <script type="text/javascript" src="../assets/script/leaflet-owm.js"></script>
    <script type="text/javascript" src="../assets/script/iconLayers.js"></script>
    <script type="text/javascript" src="../assets/script/homepage.js"></script>
    <script type="text/javascript" src="../assets/script/Spotify.js"></script>
</body>