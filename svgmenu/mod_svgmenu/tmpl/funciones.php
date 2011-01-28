<?php

// Button colours
$colors = array();
$colors[0]  = "red";
$colors[1]  = "yellow";
$colors[2]  = "green";
$colors[3]  = "blue";

//Función PHP qe rellena el array "vector" de javascript con los elementos del menú cuyo padre tiene id=0
function lista($id)
{
	include "conectar.php"; 		
	
	$sql = "SELECT nombre FROM elemento WHERE padre='".$id."'";
	$result = mysql_query($sql, $conexion) or die(mysql_error());
	$filas = mysql_num_rows($result);
	
    $i=0;
  
    while ($row = mysql_fetch_array($result)){
	
		//Forma de rellenar una variable de javascript desde PHP, en este caso el array "vector"
		echo "\nvector[$i] = '".utf8_encode($row['nombre'])."';";
        $i++;
    }

}

/**
 * Generate a SVG button
 * @param int $id button ID
 * @param string $data SVG generator code
 * @param int $size button size
 * @return string SVG button code
 */
function button($id, $data, $size)
{
	return '<embed id="button-'. $id .'" type="image/svg+xml" src="'. 
	  $data .'" height="'. $size .'%" width="'. $size .'%">
		<param name="wmode" value="transparent">
	  </embed>
	  ';
 }
 
function upbutton($layer, $id, $data, $size)
{
	return '<embed id="up-'. $layer .'" type="image/svg+xml" src="'. 
	  $data .'" height="'. $size .'%" width="'. $size .'%">
		<param name="wmode" value="transparent">
	  </embed>
	  ';
 }
 
/**
 * Generate a SVG blank space
 * @param int $size space size
 * @return string SVG space code
 */ 
 function space($size, $id, $data)
{
	return '<embed type="image/svg+xml" src="'.$data.'" id="'.$id.'"
	    height="1%" width="'. $size .'%">
		<param name="wmode" value="transparent">
	  </embed>
	  ';
 }
 
function getImage($string)
{
	$a = explode("\n",$string);
	$b = preg_grep("/^menu_image=[a-zA-Z0-9._-]+/", $a);
	
	$img ="";
	foreach($b as $c)
		$img = preg_replace("/menu_image=([a-zA-Z0-9._-]+)/", "$1", $c);

	return $img;
}

function getParam($param, $string)
{
	$a = explode("\n",$string);
	$b = preg_grep("/^".$param."=[a-zA-Z0-9._-]+/", $a);
	
	$p ="";
	foreach($b as $c)
		$p = preg_replace("/".$param."=([a-zA-Z0-9._-]+)/", "$1", $c);

	return $p;
}



?>
