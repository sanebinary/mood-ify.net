<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../assets/css/searchpage.css">
    <link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Moodify Search Page</title>
</head>
<body>
    <div class="topnav">
        <h2>Connect To <a id="Spotify">Spotify</a></h2>
        <form method="POST" action="/city">
        <input list ="city" type="text" placeholder="Search Place" name="city">
        <datalist class="demo_dropdown" id="city">
            <option value="Ho Chi Minh City"> Ho Chi Minh City, Viet Nam</option>
            <option value="Cu Chi">Ho Chi Minh City, Viet Nam</option>
            <option value="Nha Be">Ho Chi Minh City, Viet Nam</option>
            <option value="Can gio">Ho Chi Minh City, Viet Nam</option>
        </datalist>
        </form>
    </div>  
    <video autoplay muted loop id="myVideo">
        <source src="../assets/videos/D.mp4" type="video/mp4">
    </video>
</body>
</html>