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
