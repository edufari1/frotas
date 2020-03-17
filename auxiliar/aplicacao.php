<?php 	

require_once 'config.php';
/*
$aplicacao = new Aplicacao();
$aplicacao->loadById(1);
echo $aplicacao;


$aplicacao = Aplicacao::getList();
echo json_encode($aplicacao);


$aplicacao = Aplicacao::search('Frac');
echo json_encode($aplicacao);

$aplicacao = new Aplicacao();
$aplicacao->setDescaplicacao('Cana de acucar in natura');
$aplicacao->setTipoaplicacao(3);
$aplicacao->insert();
echo $aplicacao;

$aplicacao = new Aplicacao();
$aplicacao->loadById(6);
$aplicacao->update('Carrega vinhoto', 2);
echo $aplicacao;*/

$aplicacao = new Aplicacao();
$aplicacao->loadById(6);
$aplicacao->delete();
echo $aplicacao;

 ?>