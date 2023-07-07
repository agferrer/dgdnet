<? session_start(); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/whmcs.css" rel="stylesheet">
<script src="js/whmcs.js"></script>
<!--<%Response.Buffer = True%>-->
<html>
<head>
<title>Sistema para la gestion de tiempos y movimientos</title>
</head>
 <?php if (($_SESSION["logeado"]==1)and($_SESSION["activow"]==1)){ ?>

   	    <frameset rows="200,*" framespacing="0" frameborder="0">
        <frame name="titular"  scrolling="no" FRAMEBORDER="0" noresize src="encabeza.php">
        <frame scrolling="auto" NAME="derecho" noresize FRAMEBORDER="0" src="registro.php">
		<body>
		</body>
        </frameset>
        </frameset><noframes></noframes>
     <? }else{ ?>
	   <div id="whmcsheader">
    <div class="whmcscontainer">
        <div id="whmcstxtlogo"></div>
        <div id="whmcsimglogo"></div>
    </div>
</div>
	<div class="topbar">
	  <div class="fill">
		<div class="whmcscontainer">

		</div>
	  </div>
	</div>
	<div class="whmcscontainer">
    	<div class="contentpadded">
        <div class="page-header">
            <div class="styled_title">
              <h2>Usuario y contrase&ntilde;a desactivados</h2>
            </div>
        </div>
<div align="center">
<fieldset style="width:1100px">
<form action="index.php" name="Inicio" >

<input type="submit" name="regresar" value="Intentar nuevamente" class="btn primary">
<form>
</fieldset>
</div>

	 <?php
	}
?>
<div class="footerdivider">
    <div class="fill"></div>
</div>
<div class="whmcscontainer">
    <div class="footer">
					<div id="copyright">Desarrollado en 2010, Derechos reservados Direcci&oacute;n General de Delegaciones</div>
		</div>
	<div class="clear"></div>
    </div>
</div>
</div>
</html>
