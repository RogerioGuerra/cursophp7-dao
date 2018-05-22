<?php 

require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);

$root = new Usuario();

//nesse loadById já existe uma instância de SQL na classe usuario
$root->loadById(4);

echo $root;

 ?>