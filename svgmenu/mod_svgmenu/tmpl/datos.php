<?php

//Este archivo se llama mediante AJAX y se le pasa por post la variable id

include "conectar.php";  
include "funciones.php";  

$id = $_POST['id'];
$iconsize = $_POST['iconsize'];

//$iconwidth="";
//$icon

$sql = "SELECT id, params FROM jos_menu WHERE menutype='svgmenu' AND parent = '".$id."'";
$result = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_array($result);

parse_str($row[1], $a);
//echo utf8_encode($row[0])."$".$a['menu_image'];
/*
	$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&c=" . $colors[$i] . "&t=" . 
	     $items[$i]->name . "&i=" . $items[$i]->img . "&ts=" . 
	     $iconfontsize . "&blink=" . urlencode(JURI::base()) ."&link=" . 
	     urlencode($items[$i]->link) . "&y=" . $icontype . "&id=" . $i;
*/

	$id  = "01";	     
	$svg = "/modules/mod_svgmenu/tmpl/svg.menubutton.php?w=120&h=120&c=blue&t=Comunicación&i=world.svg&ts=16&blink=http%3A%2F%2F127.0.0.1%2F&link=%23&y=0&id=3";

	button($i, $svg, $iconsize);

?>
