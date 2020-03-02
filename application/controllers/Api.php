<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller{
    public function authorization(){
        $client_id = "c9d1c2ad21274bf4b128f46a5345b30f";
        $client_secret = "05f35f8b7a304d02be7cccadaecae658";
    }
    public function index()
    {
        $this->load->view('authorization');
    }
}