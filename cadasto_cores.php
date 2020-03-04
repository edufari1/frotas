<?php 	
require_once ("config.php");
$opcao = $_POST['acao'];
$nova_cor = $_POST['cor'];
$codigo = $_POST['codigo'];



switch ($opcao){

	case '1':
	//Insere uma nova cor na tabela
	$cor = new Cores();
	$cor->setDescores($nova_cor);
	$cor->insert();
	header("Location: cadcores.php");
	break;

	case '2':
	//carrega uma lista de cores pela descrição
	$search = Cores::search($nova_cor);
	/*header("Location: cadcores.php");*/
	echo json_encode($search);
	break;

	case '3':
	// pesquisa por um unico id
//echo "id: ".$codigo." açao ".$opcao." cor: ".$nova_cor;
//die();
	$cor = new Cores();
	$cor->loadById($codigo);
	/*header("Location: cadcores.php");*/
	echo $cor;
	break;

	case '4':
	//atuaaliza um registro de cores com base no id
	$cor = new Cores();
	$cor->loadById($codigo);
	$cor->update($nova_cor);
	header("Location: cadcores.php");/*
	echo $cor;*/
	break;

	case '5':
	//deleta o registro de cores com base no id
	$cor = new Cores();
	$cor->loadById($codigo);
	$cor->delete();
	header("Location: cadcores.php");/*
	echo $cor;*/
	break;



}






/*lista toda a tabela
$cores = Cores::getList();
echo json_encode($cores);*/









 ?>