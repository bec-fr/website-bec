<?
include('../inc/fonctions.php'); 
session_start();
?>
<html>
<head>
<title>Administration - Connexion</title>
<style>
INPUT {
color:#171717;
font-size:9px;
font-family:Verdana;
}
SELECT {
color:#171717;
background-color:#FFFFFF;
font-size:9px;
font-family:Verdana;
}
</style>
</head>
<body bgcolor="white" bottommargin="0" leftmargin="0" marginheight="0" marginwidth="0" rightmargin="0" topmargin="0">
<table border="0" background="../adminImg/connect_fond_page.jpg" height="483" width="100%" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="top">
<!-- 1 -->
<table border="0" background="../adminImg/connect_fond.jpg" height="354" width="247" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="top">
<!-- 2 -->
<table border="0" width="100%">
	<tr>
		<td colspan="2" height="220">&nbsp;</td>
	</tr>
	<tr>
		<td width="50%">&nbsp;</td>
		<td align="left" valign="top">
		<!-- 3 -->
		<?
$mess="";
if (isset($_POST['login'])) {
  
  $login = bypass($_POST['login']);
  $passe = bypass($_POST['passe']);
  if ($login != "" && $passe != "") {
     if ($login == "becfrance" && $passe == "874Bec41") {
        $_SESSION['login'] = $login;
        echo "<script>document.location.href='admin.php';</script>";
     } else {
        echo "<script>alert('Erreur d\'identification.');</script>"; 
     }  
     } else {
        echo "<script>alert('Champ manquant.');</script>"; 
     }
}
?>
		<form name="log" action="index.php" method="POST">
		<table border="0" bgcolor="#006699" cellpadding="6" cellspacing="1" height="100">
  		<tr>
  		<td bgcolor="#D9E0E6" valign="top">
		<font color="red"><b><? echo $mess; ?></b></font>
		<font face="Arial" size="-2" color="#006699">
		Identifiant<br>
		<input type="text" name="login" size="15" maxlength="256"><br>
  		Mot de Passe<br>
		<input type="password" name="passe" size="15" maxlength="256"><br>
<div align="center">		<input type="image" src="../adminImg/valider.jpg">
</div>		</font>
		</td>
  		</tr>
  		</table>  
		</form>
		<!-- fin 3 -->
		</td>
	</tr>
</table>
<!-- fin 2 -->
</td>
</tr>
</table>
<!-- fin 1 -->

</td>
</tr>
</table>



</body>
</html>
