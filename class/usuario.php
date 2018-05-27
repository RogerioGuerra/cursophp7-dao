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

 //carrega os dados do banco para o objeto, alimenta, com os dados do banco, os dados que caracterizam e fazem o próprio filho dessa Classe, instanciado ao usar a função.
	public function loadById($id){

	$sql = new Sql();//cria uma instancia de SQL que extends PDO com seus métodos

//em uma variável q é um SQL_filho atribui o q é desejado pelo código...no parametro da function

$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(    //array[0]
	":ID"=>$id
));
if (count($results) > 0){ //poderia ser if(isset($results[0]))   ........se existe



	$this->setData($results[0]);
} 

}
//_____________________________________________________________

public static function getList(){

	$sql = new SQL();

	return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

}

//______________________________________________________________

public static function search($login){

	$sql = new SQL();
	return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(':SEARCH'=> "%".$login."%"));

}
//__________________________________________________________________

public function login($login, $password){

	$sql = new Sql();//cria uma instancia de SQL que extends PDO com seus métodos

//em uma variável q é um SQL_filho atribui o q é desejado pelo código...no parametro da function

	$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha =:PASSWORD", array(    
		":LOGIN"=>$login,
		":PASSWORD"=>$password
	));


	if (count($results) > 0){   
	

	$this->setData($results[0]);

	} else {

		throw new Exception("Login e/ou senha inválidos.");
	}




}

public function setData($data){
	
	$this->setIdusuario($data['idusuario']);
	$this->setDeslogin($data['deslogin']);
	$this->setDessenha($data['dessenha']);
	$this->setDtcadastro(new DateTime($data['dtcadastro']));

}





public function insert(){
	$sql = new Sql();
	$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
		':LOGIN'=>$this->getDeslogin(),
		':PASSWORD'=>$this->getDessenha()
	));

if (count($results) > 0){


	$this->setData($results[0]);
}

}

public function update($login, $password){

	$this->setDeslogin($login);
	$this->setDessenha($password);

$sql = new Sql();

$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
	':LOGIN'=>$this->getDeslogin(),
	':PASSWORD'=>$this->getDessenha(),
	':ID'=>$this->getIdusuario()

));


}



public function __construct($login = "", $password = ""){

$this->setDeslogin($login);
$this->setDessenha($password);


}

public function delete(){


$sql = new Sql();

$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(

':ID'=>$this->getIdusuario()

));

$this->setIdusuario(0);
$this->setDeslogin("");
$this->setDessenha("");
$this->setDtcadastro(new DateTime());

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