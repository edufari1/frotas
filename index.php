<?php 	
$core = "Vermelho Intenso";
require_once ("config.php");
/*
// pesquisa por um unico id
$cor = new Cores();
$cor->loadById($core);
echo $cor;

//lista toda a tabela
$cores = Cores::getList();
echo json_encode($cores);

//carrega uma lista de cores pela descrição
//$search = Cores::search($core);
//echo json_encode($search);

//Insere uma nova cor na tabela
$cor = new Cores();
$cor->setDescores($core);
$cor->insert();
echo $cor;*/

$cor = new Cores();

$cor->loadById(4);
$cor->update("Branco e Cinza");
echo $cor;

 ?>