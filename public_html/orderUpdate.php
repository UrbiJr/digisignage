<?php
//include database class

$controller=new Controller();

//get images id and generate ids array
$idArray=explode(",",$_POST['ids']);

//update images order
$controller->updateOrder($idArray);
?>
