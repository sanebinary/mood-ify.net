<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends  CI_Controller {
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
        $lat = $this->input->post("lat");
        $lon = $this->input->post('lon');
        $city = $this->input->post('city');

        if ($city === NULL && get_cookie("city") === NULL) {
            redirect(base_url("search"));
            die();
        }

        if ($city !== NULL) {
            set_cookie("city", $city, 604800, base_url());
            $result = $this->weatherByCity($city);
        } else {
            $result = $this->weatherByCity(get_cookie("city"));
        }
        
        echo ($result);
        
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

