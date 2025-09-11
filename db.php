<?php
class db{
protected $connection;

function setconnection(){
    try{
        $this->connection=new PDO("mysql:host=localhost; dbname=home_bedding_store_management_system","root","");
        // echo " Connection Done";

    }catch(PDOException $e){
        echo "Error";

    }
}

}
