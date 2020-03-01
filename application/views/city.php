<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/city.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/reloadbutton.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/backbutton.css">
</head>

<body>
    <div class="content">
        <div class="first_wrap">
            <a id="icon_backward" href="/"></a>
            <span id="city_name"><?php echo $city; ?></span>
            <!--<button id="button">Reroll</button>-->
            <a href="." class="button nav-link">

                <div class="bottom"></div>

                <div class="top">

                    <div class="label">Reload</div>

                    <div class="button-border button-border-left"></div>
                    <div class="button-border button-border-top"></div>
                    <div class="button-border button-border-right"></div>
                    <div class="button-border button-border-bottom"></div>

                </div>

            </a>
        </div>
        <div class="weather-wrapper">
            <div class="weather-left">
                <span class="weather-wind">
                    <span id="wind-icon"></span>
                    <span id="wind-speed"><?php echo $windspeed; ?> m/s</span>
                </span>
                <span class="weather-condition">
                    <span id="cloud-icon"></span>
                    <span id="weather-condition"><?php echo $condition; ?></span>
                </span>
            </div>
            <div class="weather-temperature">
                <span id="temperature"><?php echo $temp; ?>°C</span>
            </div>
        </div>
        <div class="recommended-songs--wrapper">
            <?php $x = 0;
            while ($x < $limit) { ?>
                <a class="song-listing--item">
                    <div class="song-listing--item-album-img">
                        <img src="<?php echo $images[$x]; ?>" alt="<?php echo $albums[$x]; ?>">
                    </div>
                    <div class="song-listing--info-wrapper">
                        <div class="song-listing--trackname">
                            <?php echo $tracks[$x]; ?>
                        </div>
                        <div class="song-listing--artist">
                            <?php echo $artists[$x]; ?>
                        </div>
                    </div>
                </a>
            <?php $x++;
            } ?>
        </div>
    </div>
    </div>

</body>

</html>