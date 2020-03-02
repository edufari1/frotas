 <?php 

//preciso refazer a tabela porque acredito que não tenha colocado auto increment no id                                                              



Class Complementos{

	private $idcomplemento;
	private $descomplemento;
	private $marcomplemento;

	public function getIdcomplemento(){
		return $this->idcomplemento;
	}

	public function setIdcomplemento($idcomplemento){
		$this->idcomplemento=$idcomplemento;
	}

	public function getDescomplemento(){
		return $this->descomplemento;
	}

	public function setDescomplemento($descomplemento){
		$this->descomplemento=$descomplemento;     
	}
	
	public function getMarcomplemento(){
		return $this->marcomplemento;
	}

	public function setMarcomplemento($marcomplemento){
		$this->marcomplemento = $marcomplemento;
	}

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM complemento WHERE idcomplemento = :ID",array(
			':ID'=>$id
		));
		if (count($results)>0){
			$this->setData($results[0]);
		}else{
			return "Registro não encontrado!";
		}
	}

	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM complemento ORDER BY descomplemento");
	}

	public static function search($complemento){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM complemento WHERE descomplemento LIKE :SEARCH ORDER BY descomplemento", array(
			':SEARCH'=>"%".$complemento."%"
		));
		if(count($results)>0){
			return $results;
		}else{
			return "Registro não encontrado.";
		}

	}

	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_complemento_insert(:DESCOMPLEMENTO,:MARCOMPLEMENTO)",array(
			':DESCOMPLEMENTO'=>$this->getDescomplemento(),
			':MARCOMPLEMENTO'=>$this->getMarcomplemento()
		));
		if(count($results)>0){
			$this->setData($results[0]);
		}
	}

	public function setData($data){
		$this->setIdcomplemento($data['idcomplemento']);
		$this->setDescomplemento($data['descomplemento']);
		$this->setMarcomplemento($data['marcomplemento']);
	}

	public function __toString(){
		return json_encode(array(
			"idcomplemento"=>$this->getIdcomplemento(),
			"descomplemento"=>$this->getDescomplemento(),
			"marcomplemento"=>$this->getMarcomplemento()
		));
	}


}// fim da clase complementos


 ?>