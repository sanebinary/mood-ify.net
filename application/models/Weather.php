<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather extends CI_Model
{
    private $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&";
    private $apiKey;
    public function getWeather()
    {
        $lat = urlencode($this->input->get('latitude'));
        $lon = urlencode($this->input->get('longtitude'));

        if (!isset($_GET["latitude"]) && !isset($_COOKIE["latitude"])) {
            if (!isset($_GET["longtitude"]) && !isset($_COOKIE["longtitude"])) {
                redirect(base_url(""));
                die();
            }
        } else if (isset($_GET["latitude"])) {
            if (isset($_GET["longtitude"])) {
                setcookie("Latitude", $lat, time() + 60 * 60 * 24 * 30, "/", "mood-ify.net");
                setcookie("Longtitude", $lon, time() + 60 * 60 * 24 * 30, "/", "mood-ify.net");
                $result = $this->weatherByCity($lat, $lon);
            }
        } else {
            $result = $this->weatherByCity($_COOKIE["Latitude"], $_COOKIE["Longtitude"]);
        }

        return json_decode($result, true);
    }

    public function weatherByCity($lat, $lon)
    {
        include 'weatherkeys.php';
        $this->apiKey = $openWeatherKey;
        $api = $this->url . "lat=${lat}&lon=${lon}&appid=" . $this->apiKey;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        return $data;
    }
}
