<?php 

require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);

//_______________________________________________________________________________

//$root = new Usuario();

//nesse loadById já existe uma instância de SQL na classe usuario
//$root->loadById(8);

//echo $root;

//_____________________________________________________________________________

//$teste = array("fruta=>figo", "legume=>tomate");
//echo json_encode($teste);
/* pelo que eu pude perceber ao desdobrar este código
ao solicitar duas vezes o comando json_encode 
a função não retorna corretamente como em uma única chamada
pelo menos no chrome*/

//_________________________________________________________________________________

//carregga uma lista de usuarios buscando pelo login

//$search = Usuario::search("ji");
//echo json_encode($search);

//_________________________________________________________________________________

//carrega um usuario usando o login e a senha

$usuario = new Usuario();
$usuario->login("jimmy", "Rock");
echo $usuario;
// echo $usuario->login("jimmy", "ok");// imprime uma Exception
?>