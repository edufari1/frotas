<?php 

require_once ("config.php");
/*       
$implementos = new Implementos();
$implementos->loadById(4);
echo $implementos;



$complemento = new Complementos();
$complemento->loadById(11);
echo $complemento;

$complemento = Complementos::getList();

echo json_encode($complemento);

$complemento = Complementos::search("Carroceria");
echo json_encode($complemento);*/

$complemento = new Complementos();
$complemento->setIdcomplemento(5);
$complemento->setDescomplemento("Gaiola de Cana");
$complemento->setMarcomplemento(3);
$complemento->insert();
echo($complemento);


 ?>