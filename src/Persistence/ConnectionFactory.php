<?php
namespace App\Persistence;
# for now connectionFactory serves just mysql connection
# todo: makes to serve any connection
class ConnectionFactory{

    private $_conn;
    private $_user = "root";
    private $_pass = "";
    private $_dbname = "sensordto";
    private $_host = "localhost";
    
    function __construct()
    {}

    public function getInstance()
    {
        try {
                if (!isset($this->_conn)){
                    $this->_conn = new \PDO("mysql:host=localhost;dbname=sensordto;charset=UTF8", "root", "");
                    return $this ->_conn;
                }else{
                    return $this->_conn;
                }
        } catch (\PDOException $e){
           $e->getMessage();
        }
    }
}
    
