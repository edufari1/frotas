<?php 

Class Marcas{

	private $idmarcas;
	private $descmarcas;

	public function getIdmarcas(){
		return $this->idmarcas;
	}

	public function setIdmarcas($idmarcas){
		$this->idmarcas = $idmarcas;
	}

	public function getDescmarcas(){
		return $this->descmarcas;
	}

	public function setDescmarcas($descmarcas){
		$this->descmarcas=$descmarcas;
	}

	public function setData($data){

		$this->setIdmarcas($data['idmarcas']);
		$this->setDescmarcas($data['descmarcas']);
	}

	public function loadById($id){    //carrega uma única descrição de marca com base no id

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM marcas WHERE idmarcas = :ID",array(
			':ID'=>$id
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM marcas ORDER BY descmarcas");

	}

	public function __toString(){
		return json_encode(array(
			"idmarcas"=>$this->getIdmarcas(),
			"descmarcas"=>$this->getDescmarcas()
		));
	}

	public static function search($marca){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM marcas WHERE descmarcas LIKE :MARCA ORDER BY descmarcas", array(
			':MARCA'=>"%".$marca."%"
		));
		if(count($results)>0){
			return $results;
		}else{
			return "Registro inexistente";
		}
	}

	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_marcas_insert(:MARCA)", array(
			':MARCA'=>$this->getDescmarcas()
		));
		if(count($results)>0)
		{
			$this->setData($results[0]);	
		}
	}

	public function update($marca){

		$this->setDescmarcas($marca);

		$sql = new Sql();

		$sql->query("UPDATE marcas SET descmarcas = :MARCA WHERE idmarcas = :ID", array(
			':MARCA'=>$this->getDescmarcas(),
			':ID'=>$this->getIdmarcas()
		));
	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM marcas WHERE idmarcas = :ID", array(
			':ID'=>$this->getIdmarcas()
		));
		$this->setIdmarcas(0);
		$this->setDescmarcas("");

	}

}//fim da classe
 ?>