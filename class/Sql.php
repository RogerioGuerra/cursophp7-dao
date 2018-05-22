<?php 
					
class Sql extends PDO {

private $conn;

//construtor que  gera uma conexão já na criação de uma nova instância
public function __construct(){

	//a setinha equivale ao ponto em java

$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

}


private function setParams($statement, $parameters = array()){

foreach ($parameters as $key => $value) {

	$this->setParam($statement, $key, $value);
	# code...
}
																								
}


private function setParam($statement, $key, $value){

$statement->bindParam($key, $value);

}

//para executar os comandos..
public function query($rawQuery, $params = array()){

$stmt = $this->conn->prepare($rawQuery);
	
$this->setParams($stmt, $params);

$stmt->execute();

return $stmt;
	# code...
}


public function select($rawQuery, $params = array()):array{

$stmt = $this->query($rawQuery, $params);


 return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

}

 ?>