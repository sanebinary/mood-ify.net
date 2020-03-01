<?php
class SpotifyToken extends CI_Model
{
    private $token;
    private $scope;
    private $type;
    private $expires;
    private $tokenURL;
    private $client_id;
    private $client_secret;

    public function setCreds(){
        include 'keys.php';
        $this->client_id = $clientId;
        $this->client_secret = $clientSecret;
        $this->tokenURL = "https://accounts.spotify.com/api/token";
        return $this;
    }

    public function sepToken($tokenJson)
    {
        $token = json_decode($tokenJson, true);
        $this->token = $token['access_token'];
        $this->scope = $token['scope'];
        $this->type = $token['token_type'];
        $date = new DateTime('+' .$token['expires_in'] . ' seconds');
        $this->expires = $date;
        return $this;
    }

    public function getCreds()
    {
        return array($this->client_id,$this->client_secret,$this->tokenURL);
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getExpires()
    {
        return $this->expires;
    }
}