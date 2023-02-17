<?php
namespace App\Model;

// use PDO;    you can use different connection

use Medoo\Medoo;
use PDOException;


####################################################
#####  . it Can Be A Intefacee To More Robost.  ####
####################################################

class Connection extends Medoo {
     protected $connection;

     public function __construct() {
          try {
               $dns = $this->getConfig();
               $this->connection = new Medoo($dns);
               return $this;
             } catch(PDOException $e) {
               echo "Connection failed: " . $e->getMessage();
             }
     }


     private function getConfig() {
     //     $driver = "mysql:host=localhost;dbname=iran2";
         $config = [
          'type' => 'mysql',
          'host' => 'localhost',
          'database' => 'iran2',
          'username' => 'root',
          'password' => ''
         ];
         return $config;
     }


     public function getConnection(){
          return $this->connection;
     }
}