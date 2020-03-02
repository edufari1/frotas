<?php 

Class Implementos{

	private $idimplementos;
	private $descimplementos;

	public function setIdimplementos($idimplementos){
		$this->idimplementos = $idimplementos;
	}

	public function getIdimplementos(){
		return $this->idimplementos;
	}

	public function setDescimplementos($descimplementos){
		$this->descimplementos = $descimplementos;
	}

	public function getDescimplementos(){
		return $this->descimplementos;
	}

	public function setData($data)
	{
		$this->setIdimplementos($data['idimplementos']);
		$this->setDescimplementos($data['descimplementos']);
	}

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM implementos WHERE idimplementos = :ID", array(
			':ID'=>$id
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public static function getList(){    //lista todas as cores da tabela

		$sql = new Sql();
		return $sql->select ("SELECT * FROM implementos ORDER BY idimplementos");

	}

	public function __toString(){
		return json_encode(array(
			"idimplementos"=>$this->getIdimplementos(),
			"descimplementos"=>$this->getDescimplementos()
		));
	}

	public static function search($implemento){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM implementos WHERE descimplementos LIKE :SEARCH ORDER BY descimplementos",array(
			':SEARCH'=>"%".$implemento."%"
		));
		if (count($results)>0){
			return $results;
		}else{
			return "Resgistro não encontrado.";
		}
	}

	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_implementos_insert(:IMPLEMENTO)", array(
			':IMPLEMENTO'=>$this->getDescimplementos()
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public function update($implemento){

		$sql = new Sql();
		$sql->query("UPDATE implementos SET descimplementos=:IMPLEMENTOS WHERE idimplementos = :ID", array(
			':IMPLEMENTOS'=>$this->getDescimplementos(),
			':ID'=>$this->getIdimplementos()
		));
	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM impelementos WHERE idimplementos = :ID", array(
			':ID'=>$this->getIdimplementos()
		));
		$this->setIdimplementos(0);
		$this->setDescimplementos("");
	}
} //final da classe

 ?>