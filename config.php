<?php 

//método PDO que carrega as classes para require_once
spl_autoload_register(function($class_name){

	$filename ="class".DIRECTORY_SEPARATOR.$class_name.".php";

if (file_exists(($filename))){

require_once($filename);

}});

 ?>