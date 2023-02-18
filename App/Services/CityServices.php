<?php
namespace App\Services;
use App\Model\City\City;
use App\Utilities\Cache\Cache;
use App\Utilities\Response\Response;

class CityServices extends City
{



      public function getCity(){
          Cache::start();    

          #check if  province is valid and pagination 
          if(!isset($_REQUEST['province_id']) && !is_numeric($_REQUEST['province_id']))
                die('Province ID not valid'); 

          $data = array (
                    'province_id' => (int)($_REQUEST['province_id'])
          );
          
          if(isset($_REQUEST['page']) && \is_numeric((int)($_REQUEST['page'])))
             $data['page'] = $_REQUEST['page'];

          if(isset($_REQUEST['pagesize']) && \is_numeric((int)($_REQUEST['pagesize'])))
             $data['pagesize'] = $_REQUEST['pagesize'];

          $reuslt = $this->connection->select('city','*',$data);


          if(empty($reuslt))
             Response::responseAndDie($reuslt,Response::HTTP_NOT_FOUND);
          echo Response::response($reuslt,Response::HTTP_OK);
          Cache::end();
          die();
     }

     public function addCity(){
        
          $data = \json_decode(file_get_contents('php://input'),true);
          #check if  province is valid and pagination 
          if(!isset($data['province_id']) && !is_numeric($data['province_id']))
                die('Province ID not valid'); 
          $data = array (
                    'province_id' => (int)($data['province_id']),
                    'name' => $data['name']
          );
          $reuslt = $this->connection->insert('city',$data);
          Response::responseAndDie($reuslt,Response::HTTP_OK);
          die();

     }
   
     public function deleteCity(){
         #check if  province is valid and pagination 
         if(!isset($_REQUEST['id']) && !is_numeric($_REQUEST['id']))
               die('Province ID not valid'); 
         $data = array (
                  'id' => (int)($_REQUEST['id'])
         );
         \var_dump($data);
         $reuslt = $this->connection->delete('city',$data);
         \var_dump($reuslt->rowCount());
         exit();
         if(empty($reuslt))
            Response::responseAndDie($reuslt,Response::HTTP_NOT_FOUND);
         echo Response::response($reuslt,Response::HTTP_OK);
         die();

     }
   
     public function updateCity(){
        
              #check if  province is valid and pagination 
         if(!isset($_REQUEST['id']) && !is_numeric($_REQUEST['id']))
         die('Province ID not valid'); 
         $data = array (
                  'id' => (int)($_REQUEST['id'])
         );
         \var_dump($data);
         $reuslt = $this->connection->delete('city',$data);
         if(empty($reuslt))
            Response::responseAndDie($reuslt,Response::HTTP_NOT_FOUND);
         echo Response::response($reuslt,Response::HTTP_OK);
         die();

     }
   
   
     
}