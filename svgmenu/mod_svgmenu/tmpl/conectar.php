<?php
// Conecto con MySQL

$conexion = mysql_connect("SERVIDOR", "USUARIO", "CLAVE");
mysql_select_db("BASE_DE_DATOS", $conexion);

?>
