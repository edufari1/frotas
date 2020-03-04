<?php 
require_once 'config.php';
/*
$modelos = new Modelos();
$modelos->loadById(1);
echo $modelos;


$modelos = Modelos::getList();
echo json_encode($modelos);

$modelos = new Modelos();
$modelos = Modelos::search('lo3');
echo json_encode($modelos);

$modelos = new Modelos();
$modelos->setIdmodelos(6);
$modelos->setDescmodelos('Modelo 6');
$modelos->setMarcas_idmarcas(2);
$modelos->insert();
echo ($modelos);

$modelos = new Modelos();
$modelos->loadById(6);
$modelos->update('Modelo 06', 3);
echo $modelos;*/

$modelos = new Modelos();
$modelos->loadById(6);
$modelos->delete();
echo $modelos;

 ?>