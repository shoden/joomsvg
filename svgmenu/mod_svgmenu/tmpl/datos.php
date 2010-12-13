<?php

//Este archivo se llama mediante AJAX y se le pasa por post la variable id

include "conectar.php";  

$id = $_POST['id'];
$sql = "SELECT id, params FROM jos_menu WHERE menutype='svgmenu' AND parent = '".$id."'";
$result = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_array($result);

parse_str($row[1], $a);
echo utf8_encode($row[0])."$".$a['menu_image'];


?>
