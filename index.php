<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("select * from tb_usuarios u order by u.idusuario");

echo json_encode($usuarios);


?>