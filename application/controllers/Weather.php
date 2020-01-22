<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends  CI_Controller {
    public function getWeather()
    {
        $apiKey = "e93a77b66ee2a358a6b96616ec11c743";
        $url = "http://api.openweathermap.org/data/2.5/forecast?";
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');

        $api = "${url}lat=${lat}&lon=${lon}&appid=${apiKey}";
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;
    }

    
}