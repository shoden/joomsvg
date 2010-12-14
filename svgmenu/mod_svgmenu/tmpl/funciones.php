<?php


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

function button($id, $data, $size)
{
	echo '<object id="button-'. $id .' type="image/svg+xml" data="'. 
	  $data .'" height="'. $size .'%" width="'. $size .'%">
		<param name="wmode" value="transparent">
	  </object>';
 }
 
 function space($size)
{
	echo '<object type="image/svg+xml" data="modules/mod_svgmenu/images/blank.svg"
	    height="1%" width="'. $size .'%">
		<param name="src" value="blank.svg">
		<param name="wmode" value="transparent">
	  </object>';
 }



?>
