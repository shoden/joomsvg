function resolucion(){

  var ancho = $(window).width();
  var alto = $(window).height();
  
  if ((ancho / alto)>(16/9)){  //Es más ancho que alto  	
	  	
	alto_capa = alto - (alto*0.16);
	
	/*top_capa = (alto*0.02);*/
	top_capa = (0);
	
	ancho_capa = (alto_capa*(16/9)) - ((alto_capa*(16/9)) * 0); 
	/*left_capa = ((alto_capa*(16/9)) * 0.05);*/

	centrar_capa = (ancho - ancho_capa)/2;



	/*alto_capa = alto;
	ancho_capa = alto_capa*(16/9);*/

    document.getElementById('capa_fondo').style.height = alto_capa+"px";
    document.getElementById('capa_fondo').style.width = ancho_capa+"px";
    document.getElementById('capa_fondo').style.marginLeft = centrar_capa+"px"; 
    document.getElementById('capa_fondo').style.marginTop = top_capa+"0"; 
	   

  }
  
  
  
  
 else{ //Es más alto que ancho
  
	ancho_capa = ancho - (ancho*0.16);
	left_capa = (ancho*0.08);
	alto_capa = (ancho_capa/(16/9)) - ((ancho_capa/(16/9)) * 0); 
	/*top_capa = ((ancho_capa/(16/9)) * 0.02); */

	/*centrar_capa = (alto - alto_capa)/0.02;*/
	centrar_capa = (alto - alto_capa) * 0;
	
	
	
	

	/*ancho_capa = ancho;
	alto_capa = ancho_capa/(16/9);*/ 
	
    document.getElementById('capa_fondo').style.height = alto_capa+"px";
    document.getElementById('capa_fondo').style.width = ancho_capa+"px";
    document.getElementById('capa_fondo').style.marginLeft = left_capa+"px"; 
    document.getElementById('capa_fondo').style.marginTop = centrar_capa+"px";
  
  }

}






