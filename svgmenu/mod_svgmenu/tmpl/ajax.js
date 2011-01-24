top.ajax = ajax;

// Función que se llama cada vez que se pulsa una de las imágenes
// y genera la siguiente capa del menú
function ajax(id, layer,pages,page)
{
  //alert( "id:" + id + "\nlayer:" + layer + "\npages:" + pages + "\npage:" + page);

  // Llamada AJAX
  var ajax=nuevoAjax();
  ajax.open("POST", "datos.php", true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax.send("id="+id+"&layer="+layer+"&pages="+pages+"&page="+page);    
  ajax.onreadystatechange=function()
	{
	  if (ajax.readyState==4){	
      if(ajax.responseText != ""){
			  parent.document.getElementById("mainheader").style.visibility = "hidden";
			  parent.document.getElementById("main").style.visibility = "hidden";
			  parent.document.getElementById("capa"+layer).style.visibility = "hidden";
			  parent.document.getElementById("capa"+layer).innerHTML=ajax.responseText;

			  for(i=layer+1;i<=4&&layer<3;i++)
			     parent.document.getElementById("capa"+i).style.visibility = "hidden";
		  }
		}
  }
}

function upLevel(layer)
{
	parent.document.getElementById("capa"+(layer-1)).style.visibility = "visible";
	
  for(i=layer;i<4;i++)
		parent.document.getElementById("capa"+i).style.visibility = "hidden";
}

function moreLevel(id, layer, pages, page)
{
	//alert(id + "," + layer + "," + pages + "," + page);
	
  for(i=layer+1;i<4;i++)
		parent.document.getElementById("capa"+i).style.visibility = "hidden";
	
  showpage = (page<pages) ? page+1 : 1;
	ajax(id, layer, pages, showpage);
}

function showLevel(layer)
{
  //alert("layer: " + layer);
  parent.document.getElementById("capa"+layer).style.visibility = "visible";
}

// Función para crear un objeto de tipo AJAX
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
	if(!xmlhttp && typeof XMLHttpRequest!="undefined") 
    xmlhttp=new XMLHttpRequest(); 

	return xmlhttp; 
}
