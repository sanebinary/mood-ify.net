<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- The video -->

<head>
    <script src="../assets/script/weather.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/city.css">
</head>

<body>
    <video autoplay="" muted="" loop="" id="myVideo" disablepictureinpicture controlsList="nodownload">
        <source src="../assets/videos/D.mp4" type="video/mp4">
    </video>
    <div class="content">
        <div class="first_wrap">
            <a id="icon_backward"></a>
            <span id="city_name"><?php echo $city;?></span>
            <button id="reload" >Reroll</button>
        </div>
        <div class="weather-wrapper">
            <div class="weather-left">
                <span class="weather-wind">
                    <span id="wind-icon"></span>
                    <span id="wind-speed"><?php echo $windspeed;?></span>
                </span>
                <span class="weather-condition">
                    <span id="cloud-icon"></span>
                    <span id="weather-condition"><?php echo $condition;?></span>
                </span>
            </div>
            <div class="weather-temperature">
                <span id="temperature"><?php echo $temp;?></span>
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

    <!--<video autoplay muted loop id="myVideo">
        <source src="../assets/videos/D.mp4" type="video/mp4">
    </video>-->
</body>

</html>
