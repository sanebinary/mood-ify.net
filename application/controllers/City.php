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
        $this->load->model('Weather');
        $this->load->helper('url');
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
        //get weather data
        $weather = $this->Weather->getWeather();
        
        if ($weather["cod"] == 200) {
            $data["city"] = $weather["name"];
            $data["windspeed"] = $weather["wind"]["speed"];
            $data["condition"] = $weather["weather"][0]["main"];
            $data["temp"]= $weather["main"]["temp"];
        }
        else {
            redirect("/search");
            die();
        }

        //set endpoint url and get seeds from model
        $seedlist = array("Rain" => 'sunny', "Clouds" =>'sunny', "Drizzle" => 'sunny',"Snow" => 'sunny');
        $endpoint = "https://api.spotify.com/v1/recommendations";
        $weaCondition =$seedlist[$data["condition"]];
        $seed = $this->SpotifyRecom->$weaCondition();
        $limit = $seed["limit"];
        $data['limit'] = $limit;

        //format variable into url standard
        $seed = http_build_query($seed);
        $seed = preg_replace('/%5B[0-9]+%5D/simU', '', $seed);

        //turn response to json format
        $request = json_decode($this->APIrequest->requestRecommendation($endpoint, $seed, $this->token()),TRUE);
        
        //
        $artists = [];
        $tracks = [];
        $image_urls = [];
        $album_names = [];
        for ($i = 0; $i < $limit; $i++){
            array_push($artists,$request['tracks'][$i]['artists'][0]['name']);
            array_push($tracks, $request['tracks'][$i]['name']);
            array_push($image_urls, $request['tracks'][$i]['album']['images'][1]['url']);
            array_push($album_names, $request['tracks'][$i]['album']['name']);
        }
        $data['artists'] = $artists;
        $data['tracks'] = $tracks;
        $data['images'] = $image_urls;
        $data['albums'] = $album_names;
        return $data;
    } 


    public function index()
    {
        $this->load->view('city', $this->getRecommendation());
    }
}
