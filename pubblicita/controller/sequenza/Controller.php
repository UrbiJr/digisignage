<?php
class Controller{
    //database configuration
    private $dbHost     ="localhost";
    private $dbUsername ="amministratore";
    private $dbPassword ="DigitalSignage";
    private $dbName     ="pubblicita";
    private $imgTbl     ='Sequenze';
    
    function __construct(){
        if(!isset($this->controller)){
            // Connect to the database
            $conn=new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->controller=$conn;
            }
        }
    }
    
    function getRows(){
        $query=$this->controller->query("SELECT * FROM ".$this->imgTbl." ORDER BY nOrdine ASC");
        if($query->num_rows>0){
            while($row=$query->fetch_assoc()){
                $result[]=$row;
            }
        }else{
            $result=FALSE;
        }
        return $result;
    }
    
    function updateOrder($id_array){
        $count = 1;
        foreach ($id_array as $id){
            $update=$this->controller->query("UPDATE ".$this->imgTbl." SET nOrdine=$count WHERE id=$id");
            $count ++;    
        }
        return TRUE;
    }
}
?>
