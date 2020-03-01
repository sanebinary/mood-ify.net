<?php
class SpotifyRequest extends CI_Model
{
    public function requestToken($client_id, $client_secret, $api_url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,           $api_url );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,           1 );
        curl_setopt($curl, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $result=curl_exec($curl);
        return $result;
    }

    public function requestRecommendation($endpoint, $seeds, $token){
        $curl = curl_init();
        $recom_url = $endpoint. '?'. $seeds;
        curl_setopt($curl, CURLOPT_URL,           $recom_url );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Authorization: Bearer '.$token));
        $result=curl_exec($curl);
        return $result;
    }
}
