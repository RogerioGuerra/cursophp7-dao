<?php 

require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);
/////////////////////////////////////////////////////////////////////////////////
//$root = new Usuario();

//nesse loadById já existe uma instância de SQL na classe usuario
//$root->loadById(8);

//echo $root;

///////////////////////////////////////////////////////////////////////////////////

//$teste = array("fruta=>figo", "legume=>tomate");
//echo json_encode($teste);
/* pelo que eu pude perceber ao desdobrar este código
ao solicitar duas vezes o comando json_encode 
a função não retorna corretamente como em uma única chamada
pelo menos no chrome*/

$lista = Usuario::getList();      //chamada de método estático não precisa de instância da classe

echo json_encode($lista);




?>