<?php 	
$core = "Vermelho Intenso";
require_once ("config.php");
/*
// pesquisa por um unico id
$cor = new Cores();
$cor->loadById($core);
echo $cor;
*/
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

//atuaaliza um registro de cores com base no id
$cor = new Cores();
$cor->loadById(5);
$cor->update("Azul e Cinza");
echo $cor;/*

//deleta o registro de cores com base no id
$cor = new Cores();
$cor->loadById(7);
$cor->delete();
echo $cor;
*/

 ?>