<?php 

Class Modelos{

	private $idmodelos;
	private $descmodelos;
	private $marcas_idmarcas;

	public function setIdmodelos($idmodelos){
		 $this->idmodelos = $idmodelos;
	}
	public function getIdmodelos(){
		return $this->idmodelos;
	}

	public function setDescmodelos($descmodelos){
		$this->descmodelos = $descmodelos;
	}
	public function getDescmodelos(){
		return $this->descmodelos;
	}

	public function setMarcas_idmarcas($idmarcas){
		$this->marcas_idmarcas = $idmarcas;
	}
	public function getMarcas_idmarcas(){
		return $this->marcas_idmarcas;
	}


	public function loadById($idmodelos){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM modelos WHERE idmodelos = :IDMODELOS", array(
			':IDMODELOS'=>$idmodelos
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}else{
			return "Registro não encontrado";
		}
	}

	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM modelos ORDER BY descmodelos");
	}

	public function search($modelo){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM modelos WHERE descmodelos LIKE :SEARCH ORDER BY descmodelos", array(
			':SEARCH'=>"%".$modelo."%"
		));
		if(count($results)>0){
			return $results;
		}else{
			return "Registro não encontrado.";
		}
	}

	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_modelos_insert(:ID,:DESCMODELOS, :MARCAS)", array(
			':ID'=>$this->getIdmodelos(),
			':DESCMODELOS'=>$this->getDescmodelos(),
			':MARCAS'=>$this->getMarcas_idmarcas()
		));
		if (count($results)>0){
			$this->setData($results[0]);
		}

	}

	public function update($modelo,$marca){
		$this->setDescmodelos($modelo);
		$this->setMarcas_idmarcas($marca);
		$sql = new Sql();
		$sql->query("UPDATE modelos SET descmodelos = :MODELO, marcas_idmarcas=:MARCA WHERE idmodelos=:ID",array(
			':ID'=>$this->getIdmodelos(),
			':MODELO'=>$this->getDescmodelos(),
			':MARCA'=>$this->getMarcas_idmarcas()
		));
	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM modelos WHERE idmodelos = :ID", array(
			':ID'=>$this->getIdmodelos()
		));
		$this->setIdmodelos(0);
		$this->setDescmodelos("");
		$this->setMarcas_idmarcas(0);
	}

	public function __toString(){
		return json_encode(array(
			'idmodelos'=>$this->getIdmodelos(),
			'descmodelos'=>$this->getDescmodelos(),
			'marcas_idmarcas'=>$this->getMarcas_idmarcas()
		));

	}

	public function setData($data){
		$this->setIdmodelos($data['idmodelos']);
		$this->setDescmodelos($data['descmodelos']);
		$this->setMarcas_idmarcas($data['marcas_idmarcas']);
	}

}




 ?>