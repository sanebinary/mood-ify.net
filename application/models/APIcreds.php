<?php
class APIcreds extends CI_Model
{
    public $api_url;
    private $client_id;
    private $client_secret;

    public function __construct()
    {
        include 'keys.php';
        $this->client_id = $clientId;
        $this->client_secret = $clientSecret;
    }

    public function setUrl($api_url){
        $this->api_url = $api_url;
    }

    public function getClientID(){
        return $this->client_id;
    }

    public function getClientSecret(){
        return $this->client_secret;
    }

    public function getUrl(){
        return $this->api_url;
    }
}
