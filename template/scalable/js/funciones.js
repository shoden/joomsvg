var loaded = 0;
var currentLevel = 0;

function svgLoaded()
{
  loaded = loaded + 1;
  if(loaded==11){
    document.getElementById("capa"+currentLevel).style.visibility = "visible";
   // alert("nivel " + currentLevel + " preparado");
    loaded=0;
  }
}

function resolucion()
{
  var ancho = $(window).width();
  var alto = $(window).height();

  if((ancho/alto)>(16/9)){  // Es más ancho que alto  	
    alto_capa = alto - (alto*0.16);
    top_capa = (0);
    ancho_capa = (alto_capa*(16/9)) - ((alto_capa*(16/9)) * 0.08);
    centrar_capa = (ancho - ancho_capa)/2;
    document.getElementById('body').style.fontSize = ((parseInt(ancho_capa/3))+("%"));
    document.getElementById('capa_fondo').style.height = alto_capa+"px";
    document.getElementById('capa_fondo').style.width = ancho_capa+"px";
    document.getElementById('capa_fondo').style.marginLeft = centrar_capa+"px"; 
    document.getElementById('capa_fondo').style.marginTop = top_capa+"0"; 
  }
  else { // Es más alto que ancho
    ancho_capa = ancho - (ancho*0.16);
    left_capa = (ancho*0.08);
    alto_capa = (ancho_capa/(16/9)) - ((ancho_capa/(16/9)) * 0); 
    centrar_capa = (alto - alto_capa) * 0;
    document.getElementById('body').style.fontSize = ((parseInt(ancho_capa/3))+("%"));
    document.getElementById('capa_fondo').style.height = alto_capa+"px";
    document.getElementById('capa_fondo').style.width = ancho_capa+"px";
    document.getElementById('capa_fondo').style.marginLeft = left_capa+"px"; 
    document.getElementById('capa_fondo').style.marginTop = centrar_capa+"px";
  }
}

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

function magia()
{
  new Effect.Opacity('pego', { from: 1.0, to: 0.2, duration: 0.5 });
 // $('pego').fade({ duration: 3.0, from: 0, to: 1 });
}

function inicio()
{
  resolucion();

  // Check Safari mode
  BrowserDetect.init();
  if(BrowserDetect.browser == "Safari"){
    document.getElementById("mainstyle").href = "templates/scalable/css/safari.css";
    document.getElementById("container").style.display = "inline";

    paintBG( document.getElementById('button-up') );  
    paintBG( document.getElementById('button-0') );
    paintBG( document.getElementById('button-1') );
    paintBG( document.getElementById('button-2') );
    paintBG( document.getElementById('button-3') );
    paintBG( document.getElementById('button-more') );
    paintBG( document.getElementById('space-up') );  
    paintBG( document.getElementById('space-0') );
    paintBG( document.getElementById('space-1') );
    paintBG( document.getElementById('space-2') );
    paintBG( document.getElementById('space-3') );  
    
   }
   else
    document.getElementById("container").style.display = "inline";
}

function paintBG(svgElement)
{
  var embed = svgElement;
  try {
    svgdoc = embed.getSVGDocument();
  }
  catch(exception) {
    //alert('The GetSVGDocument interface is not supported');
  }
  
    if (svgdoc && svgdoc.defaultView)  // try the W3C standard way first
    svgwin = svgdoc.defaultView;
  else if (embed.window)
    svgwin = embed.window;
  else try {
    svgwin = embed.getWindow();
  }
  catch(exception) {
    alert('The DocumentView interface is not supported\r\n' +
          'Non-W3C methods of obtaining "window" also failed');
  }
  svgwin.changeBg();
}

