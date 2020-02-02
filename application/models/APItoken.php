<?php
class APIToken extends CI_Model
{
    private $token;

    private $scope;

    private $type;

    private $expires;

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