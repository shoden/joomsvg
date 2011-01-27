function resolucion()
{
  var ancho = $(window).width();
  var alto = $(window).height();
  var texto = '20px';

  if((ancho/alto)>(16/9)){  // Es más ancho que alto  	
    texto = ancho-1024;
    document.body.style.fontSize = ((texto)+("%"));
    alto_capa = alto - (alto*0.16);
    top_capa = (0);
    ancho_capa = (alto_capa*(16/9)) - ((alto_capa*(16/9)) * 0.08);
    centrar_capa = (ancho - ancho_capa)/2;
    
    document.getElementById('capa_fondo').style.height = alto_capa+"px";
    document.getElementById('capa_fondo').style.width = ancho_capa+"px";
    document.getElementById('capa_fondo').style.marginLeft = centrar_capa+"px"; 
    document.getElementById('capa_fondo').style.marginTop = top_capa+"0"; 
  }
  else { // Es más alto que ancho
    texto = ancho-1024;
    document.body.style.fontSize = ((texto)+("%"));
    ancho_capa = ancho - (ancho*0.16);
    left_capa = (ancho*0.08);
    alto_capa = (ancho_capa/(16/9)) - ((ancho_capa/(16/9)) * 0); 
    centrar_capa = (alto - alto_capa) * 0;

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

function inicio(){
  BrowserDetect.init();

  if(BrowserDetect.browser == "Safari")
    document.getElementById("mainstyle").href = "templates/scalable/css/safari.css";
  
  resolucion();
}
