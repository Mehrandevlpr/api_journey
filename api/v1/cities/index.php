<?php 


use App\Services\CityServices;


$method = $_SERVER['REQUEST_METHOD'];
$allowed_methods = array(
     
     'GET'    => 'CityService@getCity',
     'POST'   => 'CityService@addCity',
     'DELETE' => 'CityService@deleteCity',
     'PUT'    => 'CityService@updateCity'
);

[$city,$method] = explode('@',$allowed_methods[$method]);


$city_obj = new CityServices();
$city_obj->$method();


