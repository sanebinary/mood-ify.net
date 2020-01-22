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
            <span id="city_name"></span>
            <button id="reload" >Reroll</button>
        </div>
        <div class="weather-wrapper">
            <div class="weather-left">
                <span class="weather-wind">
                    <span id="wind-icon"></span>
                    <span id="wind-speed"></span>
                </span>
                <span class="weather-condition">
                    <span id="cloud-icon"></span>
                    <span id="weather-condition"></span>
                </span>
            </div>
            <div class="weather-temperature">
                <span id="temperature"></span>
            </div>
        </div>
        <div class="recommended-songs--wrapper">
            <a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e02e9a7b06c3fb656b09c650237" alt="Anthology Of Icelandic Choir Music"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Sofdu unga astin min (Sweetly Sleeep)</div>
                    <div class="song-listing--artist">Anonymous</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e02bff4e45d80be2067673528e0" alt="Wagner: Tristan und Isolde"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Tristan und Isolde, WWV 90: Act I: Prelude</div>
                    <div class="song-listing--artist">Richard Wagner</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e0256823623de63e06019d08fdb" alt="Massenet: Orchestral Suites Nos. 1- 3 / Herodiade"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Suite No. 1, Op. 13: III. Nocturne</div>
                    <div class="song-listing--artist">Jules Massenet</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e02a875c3ec944b4f164ab5c350" alt="Slime Season 3"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Digits</div>
                    <div class="song-listing--artist">Young Thug</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e02e71dd15fc5bdefd5bff70452" alt="Coloring Book"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Juke Jam (feat. Justin Bieber &amp; Towkio)</div>
                    <div class="song-listing--artist">Chance the Rapper</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e021b31dd44ad8ff2599c3670bd" alt="Prokofiev: Chout Suite (The) / The Steel Dance Suite / The Love of 3 Oranges Suite"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">The Love for Three Oranges Suite, Op. 33bis: IV. Scherzo</div>
                    <div class="song-listing--artist">Sergei Prokofiev</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/534c44b97dd3eeddced22d7b24a35e1a2827374d" alt="Black Panther The Album Music From And Inspired By"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">All The Stars (with SZA)</div>
                    <div class="song-listing--artist">Kendrick Lamar</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e02644c510e8d4c02ae69028297" alt="Future &amp; Juice WRLD Present... WRLD ON DRUGS"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Hard Work Pays Off</div>
                    <div class="song-listing--artist">Future</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/ab67616d00001e028530d893c99f2774a8b11cb9" alt="Beethoven : Piano Concertos Nos 1 - 5"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Beethoven: Piano Concerto No. 5 in E-Flat Major, Op. 73, "Emperor": II. Adagio un poco mosso</div>
                    <div class="song-listing--artist">Ludwig van Beethoven</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/75320c7e2f66fc58949a392f2b5c641f090e3cc5" alt="Brahms: Hungarian Dances"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Hungarian Dance No. 5 in G Minor, WoO 1 No. 5 (Orch. Schmeling)</div>
                    <div class="song-listing--artist">Johannes Brahms</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/6ddd55d9dead9104632b4f6e6cd315898f4c7377" alt="STAY DANGEROUS"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">HANDGUN (feat. A$AP Rocky)</div>
                    <div class="song-listing--artist">YG</div>
                </div>
            </a><a class="song-listing--item">
                <div class="song-listing--item-album-img"><img src="https://i.scdn.co/image/2be43ebfc4ff5edda8b294924b667589b80098c4" alt="Maurizio Pollini - Schumann Complete Recordings"></div>
                <div class="song-listing--info-wrapper">
                    <div class="song-listing--trackname">Arabeske in C, Op.18</div>
                    <div class="song-listing--artist">Robert Schumann</div>
                </div>
            </a></div>
    </div>
    </div>
    <div id="second-background">
    </div>

    <!--<video autoplay muted loop id="myVideo">
        <source src="../assets/videos/D.mp4" type="video/mp4">
    </video>-->
</body>

</html>