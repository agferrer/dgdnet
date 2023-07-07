<?php ob_start ();
ini_set("session.gc_maxlifetime","14400");
session_start();
git branch -M main

?>
<!--<%@ LANGUAGE="VBSCRIPT" %>-->
<html>
<head>
<title>SisDGD</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/whmcs.css" rel="stylesheet">
<script src="js/whmcs.js"></script>

<script language="JavaScript" type="text/JavaScript">
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<script LANGUAJE="JavaScript">
function validar(frm)
    {
  var resultado1 = frm.Login.value.length >0;
  var resultado2 = frm.Pass.value.length >0;

  document.getElementById('error1').style.visibility = (resultado1) ? 'hidden':'visible';
  document.getElementById('cursor').style.borderColor = (resultado1) ? 'black':'red';
  document.getElementById('cursor').style.color = (resultado1) ? 'black':'red';

  document.getElementById('error2').style.visibility = (resultado2) ? 'hidden':'visible';
  document.getElementById('idcontrasena').style.borderColor = (resultado2) ? 'black':'red';
  document.getElementById('idcontrasena').style.color = (resultado2) ? 'black':'red';

  return  (resultado1 && resultado2);
}
</script>

<?php include('conexionindra.php');
$mysqli = Conectarse();
if (!isset($Login))
{
$_SESSION["logeado"]=0;
?>

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
              <h1>Sistema de Gesti�n de la Direcci�n General de Oficinas de Pasaportes</h1>
            </div>
        </div>
<div align="center">
<fieldset style="width:1000px">
<table width="1000px" class="zebra-striped">
<form ACTION="" METHOD="get" NAME="SEGURIDAD" onSubmit="return validar(this)">
<TBODY>
<tr>
<td height="218" colspan="4" align="center" valign="top" ><div align="center"><img src="imagenes/srehor.jpg" width="500" height="400"></div></td></tr>
<tr>
<td>Usuario:&nbsp;
<input type="text" name="Login" maxlength="50" id="cursor" style="border-width: 2px; border-style: solid; border-color: black"></td>

<td><div align="center">Contrase�a:&nbsp;
<input type="password" name="Pass" maxlength="50" id="idcontrasena"  style="border-width: 2px; border-style: solid; border-color: black"></td>
<td><input type="submit" value="ENTRAR" class='btn primary'  NAME="BtnENTRA" style="WIDTH: 90px; HEIGHT: 22px"></td></tr>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif" id="error1" style="visibility:hidden">*Introduce el Usuario Asignado</font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif" id="error2" style="visibility:hidden">*Introduce la Contrase�a Asignada</font></td>
</tr>
</TBODY>
</form>
 </table>
 </fieldset>
   </div>
</div>
</div>
</div>
<?php
}
else
{
  if ($mysqli->multi_query("select id,cta_nombre,cta_apellidopaterno,cta_apellidomaterno,cta_direccion,cta_login,pass,nivel,activo,b.nombre,
  b.nombre_mayus from seguridad, delegaciones b where cta_login = '$Login' and pass = '$Pass' and cta_direccion = b.id_delegacion;")) {
    do {
        if ($result = $mysqli->store_result()) {
           while ($row = $result->fetch_row()) {
	    $_SESSION["cta_nombre"]=$row[1];
	    $_SESSION["cta_apellidopaternow"]=$row[2];
		$_SESSION["cta_apellidomaternow"]=$row[3];
		$_SESSION["cta_direccionw"]=$row[4];
		$_SESSION["loginw"]=$row[5];
		$_SESSION["passw"]=$row[6];
		$_SESSION["nivelw"]=$row[7];
		$_SESSION["activow"]=$row[8];
		$_SESSION["usuariow"]=$row[1] . " " . $row[2] . " " . $row[3];
		$_SESSION["direccionw"]=$row[9];
		$_SESSION["direccionmw"]=$row[10];
		$_SESSION["logeado"]=1;
		header( "HTTP/1.1 301 Moved Permanently" );
		header("Location: directorio.php");
		exit ();
            }
            $result->close();
        }
     } while ($mysqli->next_result());
}
else {
    printf("<br />First Error: %s\n", $mysqli->error);
}
$mysqli->close();
    if (!isset($row[1]))
    {
?>


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
              <h2>Puede que tu Usuario y contrase�a sean incorrectos o que tu cuenta se encuentre desactivada, verifica tu informaci�n</h2>
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
}
?>
<div class="footerdivider">
    <div class="fill"></div>
</div>
<div class="whmcscontainer">
    <div class="footer">
					<div id="copyright">Desarrollado en 2010, Derechos reservados Direcci�n General de Delegaciones</div>
		</div>
	<div class="clear"></div>
    </div>
</div>
</div>
</body>
</html>
