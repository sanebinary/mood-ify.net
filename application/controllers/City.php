<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SpotifyRequest');
        $this->load->model('SpotifyToken');
        $this->load->model('SpotifyRecom');
        $this->load->model('Weather');
        $this->load->helper('url');
    }

    public function SpotifyToken()
    {
        //return an array(clientid, clientsecret, URL)
        $creds = $this->SpotifyToken->setCreds()->getCreds();
        //send a request for a token to the API 
        $request = $this->SpotifyRequest->requestToken($creds[0], $creds[1], $creds[2]);
        //get the token from the json response
        $token = $this->SpotifyToken->sepToken($request)->getToken();
        return $token;
    }

    public function getRecommendation()
    {
        //get weather data
        $weather = $this->Weather->getWeather();
        $seedlist = array("Rain" => 'rainy', "Clouds" => 'sunny', "Drizzle" => 'rainy', "Snow" => 'windy',"Clear"=>"windy");
        $endpoint = "https://api.spotify.com/v1/recommendations";

        $data["city"] = $weather["name"];
        $data["windspeed"] = $weather["wind"]["speed"];
        $data["condition"] = $weather["weather"][0]["main"];
        $data["temp"] = $weather["main"]["temp"];

        $weaCondition = $seedlist[$data["condition"]];
        $seed = $this->SpotifyRecom->$weaCondition();
        $limit = $seed["limit"];
        $data['limit'] = $limit;

        //combine all seeds stuff into url links
        $seed = http_build_query($seed);
        $seed = preg_replace('/%5B[0-9]+%5D/simU', '', $seed);

        //request to spotify API then  json format
        $response = json_decode($this->SpotifyRequest->requestRecommendation($endpoint, $seed, $this->SpotifyToken()), TRUE);

        //Spotify Data
        $artists = [];
        $tracks = [];
        $image_urls = [];
        $album_names = [];
        $track_links = [];
        for ($i = 0; $i < $limit; $i++) {
            array_push($artists, $response['tracks'][$i]['artists'][0]['name']);
            array_push($tracks, $response['tracks'][$i]['name']);
            array_push($image_urls, $response['tracks'][$i]['album']['images'][1]['url']);
            array_push($album_names, $response['tracks'][$i]['album']['name']);
            array_push($track_links, $response['tracks'][$i]['album']['external_urls']['spotify']);
        }
        $data['artists'] = $artists;
        $data['tracks'] = $tracks;
        $data['images'] = $image_urls;
        $data['albums'] = $album_names;
        $data['links'] = $track_links; 
        return $data;
    }


    public function index()
    {
        $this->load->view('city', $this->getRecommendation());
    }
}
