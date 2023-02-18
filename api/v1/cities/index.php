<?php 


use App\Services\CityServices;


$method = $_SERVER['REQUEST_METHOD'];

$allowed_methods = array(
     
     'GET'    => 'CityServices@getCity',
     'POST'   => 'CityServices@addCity',
     'DELETE' => 'CityServices@deleteCity',
     'PUT'    => 'CityServices@updateCity'
);

[$city,$method] = explode('@',$allowed_methods[$method]);


$city_obj = new CityServices();
$city_obj->$method();


