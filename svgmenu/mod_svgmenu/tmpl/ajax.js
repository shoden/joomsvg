// BrowserDetect.browser = Browser name
// BrowserDetect.version = Browser version
// BrowserDetect.OS      = Operating system
var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};

top.ajax = ajax;



// Función que se llama cada vez que se pulsa una de las imágenes
// y genera la siguiente capa del menú

function ajax(id, layer,pages,page)
{
  //alert( "id:" + id + "\nlayer:" + layer + "\npages:" + pages + "\npage:" + page);

  // Navegador
  BrowserDetect.init();
  
  // Llamada AJAX
  var ajax=nuevoAjax();
  ajax.open("POST", "datos.php", true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax.send("id="+id+"&layer="+layer+"&pages="+pages+"&page="+page+"&browser="+BrowserDetect.browser);    
 // ajax.send("id="+id+"&layer="+layer+"&pages="+pages+"&page="+page+"&browser="+"Safari");    
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
	
  for(i=layer;i<4;i++){
		parent.document.getElementById("capa"+i).style.visibility = "hidden";
		parent.document.getElementById("capa"+i).style.height = "0px";
  }
  
  if(layer==1){
    parent.document.getElementById("main").style.visibility = "visible";
    parent.document.getElementById("mainheader").style.visibility = "visible";
  }
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
 // alert("layer: " + layer);
  parent.document.getElementById("capa"+layer).style.height = "";
  parent.document.getElementById("capa"+layer).style.visibility = "visible";
 
  new Effect.Opacity("capa"+layer, { duration: 1.0, transition:
      Effect.Transitions.linear, from: 0, to: 1});
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
