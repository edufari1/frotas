<?php 
require_once 'config.php';
/*
//carrega um registro baseado no id
$marca = new Marcas();
$marca->loadById(22);
echo $marca;

//lista todas as marcas da tabela
$marca = Marcas::getList();
echo json_encode($marca);


//	carrega registro baseado na descrição ou parte dela
$marca = new Marcas();
$resultado=Marcas::search("Volk");
echo json_encode($resultado);

// grava um registro no arquivo de marcas
$marca = new Marcas();
$marca->setDescmarcas("Volvo").
$marca->insert();
echo $marca;

//atualiza marca 
$marca = new Marcas();
$marca->loadById(2);
$marca->update("Iveco");
echo $marca;*/

//deleta registro de marcas com base no id
$marca = new Marcas();
$marca->loadById(4);
$marca->delete();
echo $marca;
?>