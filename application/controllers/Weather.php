<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends  CI_Controller {
    public function getWeather()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $lat = $data['lat'];
        $lon = $data['lon'];

        $apiKey = "e93a77b66ee2a358a6b96616ec11c743";
        $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&";
        
        $api = "${url}lat=${lat}&lon=${lon}&appid=${apiKey}";
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
 
        echo $result;
    }

    
}