<?php

define('CACHE_ENABLE',0);
define('CACHE_DIR',__DIR__.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR);

$vendor = realpath('vendor/autoload.php');
include $vendor;

$entity_string = str_replace('/iranapi/api/','',$_SERVER['REQUEST_URI']);
$entity_api = explode("?",$entity_string);
if($entity_api[0] === 'cities'){
     include 'api/v1/cities/index.php';
}elseif($entity_api[0] === 'Province'){
     include 'api/v1/province/index.php';
}