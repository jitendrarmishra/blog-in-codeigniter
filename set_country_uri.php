<?php
// function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
    }
    // return $result;
// }

$ci_directory = '/cheryls/';
//countries
$countries = array('IN','FR','AU');

//default country
 $country = $result['country'];


foreach( $countries as $c )
{
    if(strpos($_SERVER['REQUEST_URI'], $ci_directory.$c)===0)
    {
        //Store country founded
        $country = $c;

        //Delete country from URI, codeigniter will don't know is exists !
         $_SERVER['REQUEST_URI'] = substr_replace($_SERVER['REQUEST_URI'], '', strpos($_SERVER['REQUEST_URI'], '/'.$c)+1, strlen($c)+1);

    }
}

//Add the country in URI, for site_url() function
 $assign_to_config['index_page'] = $country."/";

//store country founded, to be able access it in your app
define('COUNTRY', $country);