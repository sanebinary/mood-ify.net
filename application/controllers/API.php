<?php
class API extends CI_Controller
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

    
}
