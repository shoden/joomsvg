<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="templates/scalable1/css/estilos.css" />   
    <jdoc:include type="head" />
    <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />	
    <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/images/favicon.ico" /> 
    <script type="text/javascript" src="templates/scalable2/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="templates/scalable2/js/funciones.js"></script>		
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
                            <div class="barra_mod1">
                         			<jdoc:include type="modules" name="barra_mod1" />
                            </div> 
                            <div class="barra_mod2">
                            		<jdoc:include type="modules" name="barra_mod2" />
                            </div>
                    	</div>
                    	<div class="volver">
                         			<jdoc:include type="modules" name="volver" />
                    	</div>
                    	<div class="main">       
                         			<jdoc:include type="message" />
									<jdoc:include type="component" />   	              
                      	</div>
            		</div>
      	    	</div>
			</div>
		</div>
	</body>
</html>