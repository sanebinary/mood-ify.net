<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SpotifyRequestTest extends TestCase
{
    //Test if a proper request is successful
    public function testRequestToken()
    {
        function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        include 'keys.php';
        $this->client_id = $clientId;
        $this->client_secret = $clientSecret;
        $this->tokenURL = "https://accounts.spotify.com/api/token";
        $request = new SpotifyRequest();
        $token = $request->requestToken($this->client_id, $this->client_secret, $this->tokenURL);
        $tokenSuccess = isJson($token);
        $this->assertEquals($tokenSuccess, TRUE);
    }

    //Test if Exception is thrown when API key is invalid
    public function testRequestTokenInvalidClientKey(){
        $clientIdFalse = "fdsaklfasdlf";
        $clientSecretFalse = "fasdfasdfjks";
        $request = new SpotifyRequest();
        $this->expectExceptionMessage('Format invalid: API keys');
        $token = $request->requestToken($clientIdFalse, $clientSecretFalse, "https://accounts.spotify.com/api/token");
    }

    //Test if Exception is thrown if request could not be completed
    public function testRequestTokenFail(){
        include 'keys.php';
        $this->client_id = $clientId;
        $this->client_secret = $clientSecret;
        $this->tokenURL = "https://iasdpotify.com"; //post to wrong url
        $request = new SpotifyRequest();
        $this->expectExceptionMessage('Could not complete the request');
        $token = $request->requestToken($this->client_id, $this->client_secret, $this->tokenURL);
    }
}
