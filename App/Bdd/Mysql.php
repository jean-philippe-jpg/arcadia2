<?php

namespace App\Bdd;

class Mysql
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    private static $instance = null;

    private function __construct( )
    {
       $config = require_once _ROOTPATH_ .'/config.php';

        if(isset($config['db_name'])){
            $this->db_name = $config['db_name'];

        };
         
         if(isset($config['db_user'])){
            $this->db_user = $config['db_user'];

         };
         
         if(isset($config['db_pass'])){
            $this->db_pass = $config['db_pass'];
         };
         
         if(isset($config['db_host'])){
            $this->db_host = $config['db_host'];
         };
        
    }

    public static function getInstance(): self
    {

        if(is_null(self::$instance)){
            self::$instance =  new Mysql();
            
        } 

            return self::$instance;
       

    } 
    public function getPDO(): \PDO
    {
        

        if(is_null($this->pdo)){
            $this->pdo = new \PDO("mysql:dbname={$this->db_name};host={$this->db_host}", $this->db_user, $this->db_pass);
        }
        return $this->pdo;
    }
       

}


