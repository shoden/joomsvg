
top.ajax = ajax;

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
//function ajax(capa, id){
	
  //Llamada AJAX para crear carpeta
  var ajax=nuevoAjax();
  var capa=1;
  var id=65;
  
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
			  //alert(ajax.responseText);
			  //Separo los elementos que he enviado desde el php en un vector
			  var a = ajax.responseText.split('$');
			  
			  parent.document.getElementById("capa1").innerHTML=a[0] + " - " + a[1];
			  
			  /*
			  if (capa < 5){ 
			  
			    //relleno la capa correspondiente con la imagen enviada desde el php, aquí podría rellenar la capa con cualquier elemento HTML, otras capas, imágenes, texto, enlaces....
		        //document.getElementById("capa"+capa).innerHTML="<img src='img/"+elemento[0]+"' onclick='ajax("+siguiente_capa+","+elemento[1]+");'";
			    document.getElementById("capa1").innerHTML="eyyy";

			    //Muestro la nueva capa		
		     }
		     */
		}
     }
}

//Función para crear un objeto de tipo AJAX
function nuevoAjax()
{ 
	// Crea el objeto AJAX.
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
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
}
