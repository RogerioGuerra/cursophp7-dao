<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

//________________getes e seters________________//
	public function getIdusuario(){
		return $this->idusuario;        //sem argumentos retorna o valor da propriedade na instância atual
	}

	public function setIdusuario($value){
		$this->idusuario = $value;        //atribui o valor informado
	}

//___________________________________________________
	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

//____________________________________________________

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

//______________________________________________________

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
//_______________________________________________________

 //carrega os dados do banco para o objeto, alimenta, com os dados do banco, os dados que caracterizam e fazem o próprio filho dessa Classe, instanciado.
	public function loadById($id){

	$sql = new Sql();//cria uma instancia de SQL que extends PDO com seus métodos

//em uma variável q é um SQL_filho atribui o q é desejado pelo código...no parametro da function

$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(    //array[0]
	":ID"=>$id
));
if (count($results) > 0){ //poderia ser if(isset($results[0]))   ........se existe
	$row = $results[0];

	$this->setIdusuario($row['idusuario']);
	$this->setDeslogin($row['deslogin']);
	$this->setDessenha($row['dessenha']);
	$this->setDtcadastro(new DateTime($row['dtcadastro']));
} 

}
/////////////////////////////////////////////////////
public static function getList(){

	$sql = new SQL();

	return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

}







public function __toString(){

	return json_encode(array(

		"idusuario"=>$this->getIdusuario(),
		"deslogin"=>$this->getDeslogin(),
		"dessenha"=>$this->getDessenha(),
		"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
	));



}


}




?>