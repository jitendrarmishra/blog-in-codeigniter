<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Redirect extends CI_Controller {

    public function index($method, $domain) {
        $redirect_url = 'http://www.' . $domain . '.example.com/index.php/Controller/' . $method;
        redirect($redirect_url, 'refresh');
    }

}
