<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Newsletter - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$groupe = $_POST['groupe'];
	
	if(isset($_GET['id'])){          
		$requete = "UPDATE mailing SET mail='".addslashes($email)."', groupe='".addslashes($groupe)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
	}else{   
		$requete = "INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($email)."', '".addslashes($groupe)."')";
		mysql_query($requete) or die(mysql_error());
	}
	
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=newsletter';</script>";
	}
}else{
	$email = "";
	$groupe = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM mailing WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$email = htmlentities(stripslashes($row['mail']));
		$groupe = stripslashes($row['groupe']);
	}
}
?>
  
  <FORM name="form" METHOD="POST">
  <TABLE BORDER=0 class=contenu>
  <TR><TD align=right>Email :</TD><TD><INPUT TYPE="text" size="50" name="email" maxlength="250" value="<?=$email?>"></TD></TR>
  <TR><TD align=right>Groupe :</TD><TD><select name="groupe">
  <?
  $query = "SELECT * FROM mailing_groupe ORDER BY nom";
  $exec = mysql_query($query) or die(mysql_error());
  while($data = mysql_fetch_assoc($exec))
  {
  	echo "<option value='".$data["id"]."'";
	if($groupe == $data["id"])
		echo " selected";
	echo ">".stripslashes($data["nom"])."</option>";
  }
  ?>
  </select></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <tr><td></td><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>
  
  
		</td>
	</tr>
</table><br>