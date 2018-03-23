<?php
//include database class
include_once 'Controller.php';
$db=new Controller();

//get images id and generate ids array
$idArray=explode(",",$_POST['ids']);

//update images order
$db->updateOrder($idArray);
?>
