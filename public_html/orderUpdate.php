<?php
//include database class

$db=new Controller();

//get images id and generate ids array
$idArray=explode(",",$_POST['ids']);

//update images order
$db->updateOrder($idArray);
?>
