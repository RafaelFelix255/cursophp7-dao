<?php

require_once("config.php");

/*$sql = new Sql();

$usuarios = $sql->select("select * from tb_usuarios u order by u.idusuario");

echo json_encode($usuarios);*/

//Carregar um único usuário
$usuario = new Usuario();
$usuario->loadById(1);
echo $usuario;
echo "<br/><br/>";

//Carregar uma lista de usuário
$lista = Usuario::getList();
echo json_encode($lista);
echo "<br/><br/>";

//Carregar uma lista de usuário Buscando pelo Login
$search = Usuario::search("Ra");
echo json_encode($search);
echo "<br/><br/>";

//Carregar um usuário Buscando pelo Login e Senha
$login = new Usuario();
$login->login("Rafael", "felix15**");

echo $login;

?>