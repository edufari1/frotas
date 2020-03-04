<?php 

Class Aplicacao{

	private $idaplicacao;
	private $descaplicacao;
	private $tipoaplicacao;

	public function setIdaplicacao($aplicacao){
		$this->idaplicacao = $aplicacao;
	}
	public function getIdaplicacao(){
		return $this->idaplicacao;
	}

	public function setDescaplicacao($descricao){
		$this->descaplicacao = $descricao;
	}
	public function getDescaplicacao(){
		return $this->descaplicacao;
	}

	public function setTipoaplicacao($tipo){
		$this->tipoaplicacao = $tipo;
	}
	public function getTipoaplicacao(){
		return $this->tipoaplicacao;
	}

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM aplicacoes WHERE idaplicacao = :IDAPLICACAO", array(
			':IDAPLICACAO'=>$id
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}else{
			return "Registro não encontrado.";
		}
	}

	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM aplicacoes ORDER BY descaplicacao");
	}

	public static function search($data){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM aplicacoes WHERE descaplicacao LIKE :APLICACAO ORDER BY descaplicacao",array(
			':APLICACAO'=>"%".$data."%"
		));
		if(count($results)>0){
			return $results;
		}else{
			return "Registro não encontrado";
		}
	}

	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_aplicacao_insert(:DESCAPLICACAO, :TIPOAPLICACAO)",array(
			':DESCAPLICACAO'=>$this->getDescaplicacao(),
			':TIPOAPLICACAO'=>$this->getTipoaplicacao()
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public function setData($data){
		$this->setIdaplicacao($data['idaplicacao']);
		$this->setDescaplicacao($data['descaplicacao']);
		$this->setTipoaplicacao($data['tipoaplicacao']);
	}

	public function update($aplicacao, $tipo){
		$sql = new Sql();

		$this->setDescaplicacao($aplicacao);
		$this->setTipoaplicacao($tipo);

		$sql->query("UPDATE aplicacoes SET descaplicacao = :APLICACAO, tipoaplicacao = :TIPO WHERE idaplicacao = :ID",array(
			':ID'=>$this->getIdaplicacao(),
			':APLICACAO'=>$this->getDescaplicacao(),
			':TIPO'=>$this->getTipoaplicacao()
		));

	}

	public function delete(){
		$sql = new Sql();
		$sql->query("DELETE FROM aplicacoes WHERE idaplicacao = :ID", array(
			':ID'=>$this->getIdaplicacao()
		));
		$this->setIdaplicacao(0);
		$this->setDescaplicacao("");
		$this->setTipoaplicacao(0);
	}

	public function __toString(){
		return json_encode(array(
			'idaplicacao'=>$this->getIdaplicacao(),
			'descaplicacao'=>$this->getDescaplicacao(),
			'tipoaplicacao'=>$this->getTipoaplicacao()
		));
	}

}

 ?>