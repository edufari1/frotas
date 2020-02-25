<?php 	

require_once ("config.php");

$sql = new Sql();

$cores = $sql->select("SELECT * FROM cores");

echo json_encode($cores);

 ?>