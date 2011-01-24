<?php

include "conectar.php";  
include "funciones.php";  

$parentid = (isset($_POST['id'])) ? $_POST['id'] : 0;
$layer = (isset($_POST['layer'])) ? $_POST['layer'] : 1;
$pages = (isset($_POST['pages'])) ? $_POST['pages'] : 1;
$page = (isset($_POST['page'])) ? $_POST['page'] : 1;
$offset = ($page - 1) * 4;

// Params
$iconsize = 13;
$iconmargin = 2;
$iconwidth= 120;
$iconheight=120;
$iconfontsize=13;
$blink="http://oduja.cpmti.es";

$sql = "SELECT params FROM jos_modules WHERE module='mod_svgmenu';";
$result = mysql_query($sql, $conexion) or die(mysql_error());
if(mysql_num_rows($result)){
	$row = mysql_fetch_row($result);
	$iconsize = getParam("iconsize", $row[0]);
	$iconwidth = getParam("iconwidth", $row[0]);
	$iconheight = getParam("iconheight", $row[0]);
	$iconmargin = getParam("iconmargin", $row[0]);
	$iconfontsize = getParam("iconfontsize", $row[0]);
	$blink = getParam("baseurl", $row[0]);
}

$link="";
$icontype=0;
$id=30;

// Pages of the current level
$sql = "SELECT 1 FROM jos_menu WHERE menutype='svgmenu' AND parent = '".$parentid."' and published='1';";
$res = mysql_query($sql, $conexion) or die(mysql_error());
$pages = ceil(mysql_num_rows($res)/4);

// Items of the current level
$sql = "SELECT id, name, link, params FROM jos_menu WHERE menutype='svgmenu' AND parent = '".$parentid."' and published='1' ORDER BY ordering ASC LIMIT ". $offset .",4;";
$res = mysql_query($sql, $conexion) or die(mysql_error());
$num = mysql_num_rows($res);

// Buttons
$i=0;
if($num>0){
	// Up button
	$svg = "modules/mod_svgmenu/tmpl/svg.upbutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&t=" . "Arriba" . "&ts=" . $iconfontsize . "&l=" . $layer;

	if($layer==0)
		echo space($iconsize);
	else
		echo upbutton( $layer, "up", $svg, $iconsize);
		
	echo space($iconmargin);
	
	// Menu buttons
	while(($row = mysql_fetch_row($res)) && ($i<4)){
		$icontype = ($row[2]=="#") ? 0 : 1;
		$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=".$iconwidth."&h=".$iconheight."&c=".$colors[$i++]."&t=".$row[1]."&i=".getImage($row[3])."&ts=".$iconfontsize."&blink=".$blink."&link=".urlencode($row[2])."&y=".$icontype."&id=".$row[0]."&l=".($layer+1) . "&pages=". $pages;

		echo button($id++, $svg, $iconsize);
		echo space($iconmargin);
	}
	
	// Filling spaces
	for($i=$i; $i<4; $i++){
		echo space($iconsize); 
		echo space($iconmargin); 
	}
	
		// More button
	$svg = "modules/mod_svgmenu/tmpl/svg.morebutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&t=" . "Más" . "&ts=" . $iconfontsize
	     . "&l=". $layer . "&total=". $pages . "&current=" . $page
	     . "&id=" . $parentid;
	echo button( "more", $svg, $iconsize);
}
else
	echo "";
?>
