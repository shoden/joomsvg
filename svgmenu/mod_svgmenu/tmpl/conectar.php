<?php
// Conecto con MySQL

$conexion = mysql_connect("localhost", "joomla", "joomlajaen");
if(!$conexion)
 die("No se pudo conectar a la base de datos.");
 
mysql_select_db("joomla_jaen", $conexion);

?>
