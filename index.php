<?php 

require_once("config.php");

/*
lista
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

//_______________________________________________________________________________

/*
loadById

$root = new Usuario();

nesse loadById já existe uma instância de SQL na classe usuario
$root->loadById(8);

echo $root;*/

//_____________________________________________________________________________

//$teste = array("fruta=>figo", "legume=>tomate");
//echo json_encode($teste);
/* pelo que eu pude perceber ao desdobrar este código
ao solicitar duas vezes o comando json_encode 
a função não retorna corretamente como em uma única chamada
pelo menos no chrome*/

//_________________________________________________________________________________

/*carregga uma lista de usuarios buscando pelo login

$search = Usuario::search("ji");
echo json_encode($search);*/

//_________________________________________________________________________________

/*carrega um usuario usando o login e a senha

$usuario->login("jimmy", "Rock");
echo $usuario;
 echo $usuario->login("jimmy", "Rock");*/

//_____________________________________________________________

     

/* 
insert
esse código abaixo inseriu um novo aluno porém o retorno __toString gerou um erro:
e não imprimiu senão o que segue:
Fatal error: Method Usuario::__toString() must not throw an exception, caught Error: Call to a member function format() on null in C:\xampp\htdocs\DAO\index.php on line 0
não achei erro no código ou solução na internet
*/


/*$aluno = new Usuario("aluno", "@alunO");

$aluno->insert();

echo $aluno;  */

//______________________________________________________________

/*
update

$usuario  = new Usuario();

$usuario->loadById(8);
$usuario->update("professor", "testeprofessor");
echo $usuario;*/

//____________________________________________________________

/*
delete
$usuario = new Usuario();
$usuario->loadById(9);
$usuario->delete();

echo $usuario;*/


?>