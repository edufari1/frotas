<?php 	
$cor = 1;
require_once ("config.php");

$cores = new Cores();

$cores->loadById($cor);
echo $cores;

 ?>