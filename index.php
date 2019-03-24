<?php

require_once("config.php");

/*$sql = new Sql();

$usuarios = $sql->select("select * from tb_usuarios u order by u.idusuario");

echo json_encode($usuarios);

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
$lista2 = Usuario::search("Ra");
echo json_encode($lista2);
echo "<br/><br/>";

//Carregar um usuário Buscando pelo Login e Senha
$usuario2 = new Usuario();
$usuario2->login("Rafael", "felix15*");
echo $usuario2;
echo "<br/><br/>";

//Inserir um novo usuário através de uma procedure no banco de dados
$usuario3 = new Usuario("Yasmim", "123456");
$usuario3->insert();
echo $usuario3;
echo "<br/><br/>";

//Alterar um usuário no banco de dados
$usuario4 = new Usuario();
$usuario4->loadById(7);
$usuario4->update("Kauany", "789456");
echo $usuario4;
echo "<br/><br/>";
*/

//Deletar um usuário do banco de dados
$usuario5 = new Usuario();
$usuario5->loadById(13);
$usuario5->delete();
echo $usuario5;
echo "<br/><br/>";

?>