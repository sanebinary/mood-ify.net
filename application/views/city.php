<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- The video -->

<head>
    <script src="https://kit.fontawesome.com/3fd3eae269.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/city.css"/>
</head>

<body>
    <video autoplay="" muted="" loop="" id="myVideo" disablepictureinpicture controlsList="nodownload">
        <source src="<?php echo base_url('assets/videos/rain.mp4');?>" type="video/mp4">
    </video>
    <div class="content">
        <div class="first_wrap">
            <a id="icon_backward"><i class="fas fa-backward"></i></a>
            <span id="city_name">Ho Chi Minh City</span>
            <button id="reload">Reroll</button>
        </div>
        <div class="weather-wrapper">
            <div class="weather-left">
                <span class="weather-wind">
                    <span id="wind-icon"></span>
                    4.6m/s
                </span>
                <span class="weather-condition">
                    <span id="cloud-icon"></span>
                    light rain
                </span>
            </div>
            <div class="weather-temperature">
                <span id="temperature">14.0°C</span>
            </div>
        </div>
        <div class="recommended-songs--wrapper">
            <?php $x = 0; while ($x < $limit){?>
                <a class="song-listing--item">
                    <div class="song-listing--item-album-img">
                        <img src="<?php echo $images[$x];?>" alt="<?php echo $albums[$x];?>">
                    </div>
                    <div class="song-listing--info-wrapper">
                        <div class="song-listing--trackname">
                            <?php echo $tracks[$x];?>
                        </div>
                        <div class="song-listing--artist">
                            <?php echo $artists[$x];?>
                        </div>
                    </div>
                </a>
            <?php $x++;} ?>
        </div>
    </div>
    </div>
    <div id="second-background">
    </div>
</html>