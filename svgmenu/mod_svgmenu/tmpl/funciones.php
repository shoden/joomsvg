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



?>
