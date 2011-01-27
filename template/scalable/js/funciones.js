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






