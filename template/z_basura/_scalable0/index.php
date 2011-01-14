<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="templates/scalable0/css/estilos.css" />   
    <jdoc:include type="head" />
    <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />	
    <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/images/favicon.ico" /> 
    <script type="text/javascript" src="templates/scalable0/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="templates/scalable0/js/funciones.js"></script>		
  </head>
  <body onload="resolucion();" onresize="resolucion();">
    <div id="container" class="container" >
      <div id="fondoA" class="fondoA" >
        <div id="fondoB" class="fondoB" >
          <div id="capa_fondo" class="capa_fondo" >
            <div class="barra_superior" >
              <div class="logo">
              		<jdoc:include type="modules" name="logo" />
              </div>
              <div class="barra_title">
             	 Observatorio Dependencia Universidad de Ja&eacute;n
              </div>
            </div>
            <div class="volver1">
                 <jdoc:include type="modules" name="volver1" />
            </div>
            <div class="menu">
              	<jdoc:include type="modules" name="menu" />
            </div>
            <div class="volver2">
                <jdoc:include type="modules" name="volver2" />
            </div>
            <div class="mainheader">
            	<div class="spacer">
            	</div>
              	<jdoc:include type="modules" name="titulo" />
            </div>
            <div class="main">   
            
            	<div class="maininside">   
                	<div class="maininside2">           
             		 		<jdoc:include type="message" />
             	 			<jdoc:include type="component" />  
                 	</div> 	
                    
                </div> 	       
              	<jdoc:include type="modules" name="extramain" />
     
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
