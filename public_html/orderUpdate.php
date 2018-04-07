<?php
//include database class

include ('../pubblicita/config/config.php');
$controller=new Controller();

//get images id and generate ids array
$idArray=explode(",",$_POST['ids']);

// fino a qui tutto ok

//update images order
$controller->updateOrder($idArray);

?>
