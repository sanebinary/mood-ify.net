<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends CI_Model {
    private $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&";
    private $apiKey;
    public function getWeather()
    {
        $city = urlencode($this->input->get('city'));

        if (!isset($_GET["city"]) && !isset($_COOKIE["City"])) {
            redirect(base_url(""));
            die();
        } else if (isset($_GET["city"])) {
            setcookie("City", $city, time()+60*60*24*30,"/", "mood-ify.net"); 
            $result = $this->weatherByCity($city);
        } else {
            $result = $this->weatherByCity($_COOKIE["City"]);
        }

        return json_decode($result, true);
    }

    public function weatherByCity($city) {
        include 'weatherkeys.php';
        $this->apiKey = $openWeatherKey;
        $api = $this->url. "q=${city}&appid=". $this->apiKey;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        return $data;
    }
}

