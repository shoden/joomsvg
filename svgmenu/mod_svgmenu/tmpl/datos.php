<?php

include "conectar.php";  
include "funciones.php";  

$parentid = (isset($_POST['id'])) ? $_POST['id'] : 0;
$layer = (isset($_POST['layer'])) ? $_POST['layer'] : 1;

// Params
$iconsize = 13;
$iconmargin = 2;
$iconwidth= 120;
$iconheight=120;
$iconfontsize=13;

$sql = "SELECT params FROM jos_modules WHERE module='mod_svgmenu';";
$result = mysql_query($sql, $conexion) or die(mysql_error());
if(mysql_num_rows($result)){
	$row = mysql_fetch_row($result);
	$iconsize = getParam("iconsize", $row[0]);
	$iconwidth = getParam("iconwidth", $row[0]);
	$iconheight = getParam("iconheight", $row[0]);
	$iconmargin = getParam("iconmargin", $row[0]);
	$iconfontsize = getParam("iconfontsize", $row[0]);
}

$blink="http://192.168.1.101/~juan/oduja/web/";
$link="";
$icontype=0;
$id=30;

$sql = "SELECT id, name, link, params FROM jos_menu WHERE menutype='svgmenu' AND parent = '".$parentid."' and published='1' ORDER BY ordering ASC;";
$res = mysql_query($sql, $conexion) or die(mysql_error());
$num = mysql_num_rows($res);

// Buttons
$i=0;
if($num>0){
	// Up button
	echo space($iconsize); 
	echo space($iconmargin);
	
	// Menu buttons
	while(($row = mysql_fetch_row($res)) && ($i<4)){
		$icontype = ($row[2]=="#") ? 0 : 1;
		$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=".$iconwidth."&h=".$iconheight."&c=".$colors[$i++]."&t=".$row[1]."&i=".getImage($row[3])."&ts=".$iconfontsize."&blink=".$blink."&link=".urlencode($row[2])."&y=".$icontype."&id=".$row[0]."&l=".($layer+1);

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
	     . "&h=" . $iconheight . "&t=" . "Más" . "&ts=" . 
	     $iconfontsize; //. "&link=" . $items[$i]->link	
	echo button( "more", $svg, $iconsize);
}
else
	echo "";

//parse_str($row[1], $a);

//echo utf8_encode($row[0])."$".$a['menu_image'];
/*
	$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&c=" . $colors[$i] . "&t=" . 
	     "Hola" . "&i=" . "world.svg" . "&ts=" . 
	     $iconfontsize . "&blink=" . urlencode($blink) ."&link=" . 
	     urlencode($link) . "&y=" . $icontype . "&id=" . $i+10;
	     */
	   //echo $svg;
	//$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=120&h=120&c=blue&t=Comunicación&i=world.svg&ts=13&blink=http%3A%2F%2F127.0.0.1%2F&link=%23&y=0&id=3";

	//echo button($id+10, $svg, $iconsize);
	/*
	$more = "modules/mod_svgmenu/tmpl/svg.morebutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&t=" . "Más" . "&ts=" . 
	     $iconfontsize; //. "&link=" . $items[$i]->link	
*/
	//echo button( "more", $more, $iconsize);
	
	//$iconsize=15;
	//$iconmargin=1;
	/*
	echo button(10, $svg, $iconsize);/* . 
		   space($iconmargin) .
	       button(11, $svg, $iconsize) .
		   space($iconmargin) .
	       button(12, $svg, $iconsize) . 
		   space($iconmargin) .
	       button(13, $svg, $iconsize);
	      // button( "more", $more, $iconsize);
	*/
	
	//	$my = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=" . 12. "&h=" . 12 . "&t=" . "Ms" . "&ts=" . 12; //. "&link=" . $items[$i]->link	
	//echo button(65, $my, 12);

	//echo "<object id=\"button-0 type=\"image/svg+xml\" data=\"modules/mod_svgmenu/tmpl/svg.menubutton.php?w=120&h=120&c=red&t=Proyectos&i=bibliography.svg&ts=13&blink=http%3A%2F%2Flocalhost%2F%7Ejuan%2Foduja%2Fweb%2F&link=%23&y=0&id=0\" height=\"12%\" width=\"12%\"><param name=\"wmode\" value=\"transparent\"></object>";

?>
