<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('APIcreds');
        $this->load->model('APIrequest');
        $this->load->model('APItoken');
        $this->load->model('SpotifyRecom');
    }

    public function token()
    {
        $creds = $this->APIcreds;

        $creds->setUrl('https://accounts.spotify.com/api/token');
        $tokenUrl = $creds->getUrl();
        $clientId = $creds->getClientID();
        $clientSecret = $creds->getClientSecret();
       
        //send a request for a token to the API 
        $request = $this->APIrequest->requestToken($clientId,$clientSecret, $tokenUrl);

        //get the token from the json response
        $token = $this->APItoken->sepToken($request)->getToken();
        return $token;
    }

    public function getRecommendation(){
        $endpoint = "https://api.spotify.com/v1/recommendations";
        $seed = $this->SpotifyRecom->sunny();
        $seed = http_build_query($seed);
        $seed = preg_replace('/%5B[0-9]+%5D/simU', '', $seed);
        $request = $this->APIrequest->requestRecommendation($endpoint, $seed, $this->token());
    } 
}
