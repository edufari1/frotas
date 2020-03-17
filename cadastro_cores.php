<?php 	
require_once ("config.php");
$opcao = $_POST['acao'];
$nova_cor = $_POST['desc'];
$codigo = $_POST['codigo'];
//var_dump($opcao);

function tipo_botao($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}


switch (tipo_botao('btn1', 'btn2', 'btn3', 'btn4', 'btn5', 'btn6')) {
    case 'btn1':
	//Insere uma nova cor na tabela

	if(!is_null($nova_cor) AND ($nova_cor!=""))
	{
	$cor = new Cores();
	$cor->setDescores($nova_cor);
	$cor->insert();
	}
	header("Location: cadcores.php");
	break;


    case 'btn2':
    if(($codigo!="") AND ($nova_cor!="")){
    	//header("Location: teste2.php");
		$cor = new Cores();
		$cor->loadById($codigo);
		$cor->update($nova_cor);
	}
	header("Location: cadcores.php");
	break;

    case 'btn3':
	//deleta o registro de cores com base no id
	$cor = new Cores();
	$cor->loadById($codigo);
	$cor->delete();
	header("Location: cadcores.php");/*
	echo $cor;*/
	break;

	case 'btn4':
	$cor = new Cores();
	$cor->loadById($codigo);
	//header("Location: cadcores.php");
	echo $cor;
	break;

	case 'btn5':
	//carrega uma lista de cores pela descrição
	$search = Cores::search($nova_cor);
	/*header("Location: cadcores.php");*/
	echo json_encode($search);
	break;

    default:
        echo "Formulario D";
        //no action sent
}
?>