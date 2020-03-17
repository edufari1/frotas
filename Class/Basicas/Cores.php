<?php 
//Classe cores utilizada tanto pelos veículos como por implementos
class Cores {

	private $idcores;
	private $descores;

	public function getIdcores(){
		return $this->idcores;
	}
	public function setIdcores($cores){
		$this->idcores = $cores;
	}

	public function getDescores(){
		return $this->descores;
	}
	public function setDescores($descores){
		$this->descores = $descores;
	}

	public function loadById($id){   //carrega apenas uma única descrição de cor com base no id

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM cores WHERE idcores = :ID", array(":ID"=>$id));

		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public static function getList(){    //lista todas as cores da tabela

		$sql = new Sql();
		return $resultado = $sql->select ("SELECT * FROM cores ORDER BY idcores");

	}

	public static function search($cor){   //carrega uma cor tomando por base a descrição ou parte dela

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM cores WHERE descores LIKE :SEARCH ORDER BY descores", array(
			':SEARCH'=>"%".$cor."%"	
		));
		if (count($results)>0){
			$this->setData($results);
		}else{
			return "Registro inexistente!";
		}
	}

	public function setData($data){     //esta função apenas faz os set's 

		$this->setIdcores($data['idcores']);
		$this->setDescores($data['descores']);
		}


	public function insert(){    //utilizada para fazer a gravação de um novo registro. Utiliza uma procedure gravada diretamente no banco chamada sp_cores_insert. Retorna o registro que foi gravado

		$sql = new Sql();

		$results = $sql->select("CALL sp_cores_insert(:COR)", array(
				':COR'=>$this->getDescores()			
		));
		if (count($results)>0){

			$this->setData($results[0]);	
		}
		

	}

	public function update($cor){   //atualiza a descrição da cor

		$this->setDescores($cor);

		$sql = new Sql();

		$sql->query("UPDATE cores SET descores = :COR WHERE idcores = :ID", array( 
			':COR'=>$this->getDescores(),
			':ID'=>$this->getIdcores()
		));
	}

	public function delete(){  //deleta um registro de cores com base no id

		$sql = new Sql();

		$sql->query("DELETE FROM cores WHERE idcores = :ID",array(
			':ID'=>$this->getIdcores()
		));

		$this->setIdcores(0);
		$this->setDescores("");
	}
	
	public function __toString(){    //quando for dado o comando echo no objeto, transforma-o em um json

		return json_encode(array(
			"idcores"=>$this->getIdcores(),
			"descores"=>$this->getDescores()
		));
	}

}



 ?>