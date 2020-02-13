<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends  CI_Model {
    private $apiKey = "e93a77b66ee2a358a6b96616ec11c743";
    private $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&";
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        
    }
    public function getWeather()
    {
       
        $city = urlencode($this->input->post('city'));

        if (!isset($_POST["city"]) && !isset($_COOKIE["City"])) {
            redirect(base_url("search"));
            die();
        } else if (isset($_POST["city"])) {
            setcookie("City", $city, time()+60*60*24*30,"/", "mood-ify.net"); 
            $result = $this->weatherByCity($city);
        } else {
            $result = $this->weatherByCity($_COOKIE["City"]);
        }

        return json_decode($result, true);
    }

    public function weatherByCity($city) {
        $api = $this->url. "q=${city}&appid=". $this->apiKey;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        return $data;
    }

    public function weatherByGeolocation($lat, $lon) {
        $api = $this->url. "lat=${lat}&lon=${lon}&appid=". $this->apiKey;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        return $data;
    }
    
}

