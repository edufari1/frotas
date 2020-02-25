<?php 
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

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM cores WHERE idcores = :ID", array(":ID"=>$id));

		if(count($results)>0){
			$row = $results[0];

			$this->setIdcores($row['idcores']);
			$this->setDescores($row['descores']);
		}


	}
	
	public function __toString(){

		return json_encode(array(
			"idcores"=>$this->getIdcores(),
			"descores"=>$this->getDescores()
		));
	}

}



 ?>