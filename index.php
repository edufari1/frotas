<?php 	
$core = 1;
require_once ("config.php");
/*
// pesquisa por um unico id
$cor = new Cores();

$cor->loadById($core);
echo $cor;*/

//lista toda a tabela

$cores = Cores::getList();
echo json_encode($cores);

 ?>