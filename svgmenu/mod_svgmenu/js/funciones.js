function hola(id) {
  
  var cadena = "Hola mundo! " + id;
  alert (cadena);
}

//var W3CDOM = (document.createElement && document.getElementsByTagName);
//window.onload   = init;
function init(evt) {
	Resize();
}
      
function SVGscale(scale) {
  window.SVGsetDimension(120*scale,120*scale);
  window.SVGsetScale(scale,scale);
   
  if (!W3CDOM) return;
  var box   = document.getElementById('svgid');
  box.width   = 120*scale;
  box.height  = 120*scale;
}

function Resize() {
  var w = $(window).width();
  var h = $(window).height();

  var x = ((w/h) < (16/9)) ? w : h;
  
 //document.getElementById('debug').innerHTML = w + 'x' + h + '=' + x;
  
  SVGscale(x/480);
}

//window.onresize=Resize;

var vector=new Array();
var vector2=new Array();


//Función que recorre el array "vector" de javascript para comprobar que se ha rellenado desde el PHP, y lo muestra con un alert
function prueba(){
  
  var cadena = "";

  for (var i=0;i<vector.length-1;i++){
 
  cadena = cadena + vector[i] + " ";
  
  }

  alert (cadena);

}

//Función que se llama cada vez que se pulsa una de las imágenes y rellena y pone visible la siguiente capa
function ajax(capa, id){
	
  //Llamada AJAX para crear carpeta
  var ajax=nuevoAjax();
  
  // Abro la conexion, envio cabeceras correspondientes al uso de POST y envio los datos con el metodo send del objeto AJAX al php datos.php
  ajax.open("POST", "datos.php", true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
  //envio la variable id por post
  ajax.send("id="+id);  
  
  ajax.onreadystatechange=function()
	{
	  if (ajax.readyState==4)
		{	
			  
			  siguiente_capa= capa+1;
			  
			  //Separo los elementos que he enviado desde el php en un vector
			  elemento = ajax.responseText.split("$");			 
			  
			  if (capa < 5){ 
			  
			    //relleno la capa correspondiente con la imagen enviada desde el php, aquí podría rellenar la capa con cualquier elemento HTML, otras capas, imágenes, texto, enlaces....
		        document.getElementById("capa"+capa).innerHTML="<img src='img/"+elemento[0]+"' onclick='ajax("+siguiente_capa+","+elemento[1]+");'";
			  
			    //Muestro la nueva capa
			    document.getElementById("capa"+capa).style.visibility="visible";
		
		     }
		}
     }
}

/***********************************/
/**      FUNCION OBJETO AJAX      **/
/***********************************/

//Función para crear un objeto de tipo AJAX
function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{
		try
		{ 
			// Creacion del objet AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
}
