<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SpotifyTokenTest extends TestCase{
    public function testTokenDecodability(){
        $obj = new SpotifyToken();
        $malformedtokenJSON = "asfdfsadfasdfjlkasiroqwerkqwerkl";
        $this->expectExceptionMessage('Could not decode token');
        $callfunc = $obj->sepToken($malformedtokenJSON);
    }
    public function testTokenFormatFail(){
        $obj = new SpotifyToken();
        //JSON lack scope key so invalid
        $invalidJSON = '{
            "access_token": "NgCXRK...MzYjw",
            "token_type": "Bearer",
            "expires_in": 3600,
            "refresh_token": "NgAagA...Um_SHo"
         }';
        $this->expectExceptionMessage('Invalid/Malformed Json Response');
        $callfunc = $obj->sepToken($invalidJSON);
    }
    public function testTokenFormatSuccess(){
        $obj = new SpotifyToken();
        $validJSON = '{
            "access_token": "NgCXRK...MzYjw",
            "token_type": "Bearer",
            "expires_in": 3600,
            "scope": "user-read-private user-read-email",
            "refresh_token": "NgAagA...Um_SHo"
        }';
        $callfunc = $obj->sepToken($validJSON);
        $this->assertInstanceOf(SpotifyToken::class, $callfunc);
    }
}