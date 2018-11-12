<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Ville - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$pays = $_POST['pays'];
	$afficher = $_POST['afficher'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE minis_ville SET nom='".addslashes($nom)."', pays='".addslashes($pays)."',afficher='".addslashes($afficher)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO minis_ville (nom, pays,afficher) VALUES ('".addslashes($nom)."', '".addslashes($pays)."', '".addslashes($afficher)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=minis_ville';</script>";
}else{ 
	$id = "";
	$nom = "";
	$pays = "";
	$afficher = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM minis_ville WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$pays = stripslashes($row['pays']);
		$afficher = stripslashes($row['afficher']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align="right">Afficher :</TD><TD><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</TD></TR>
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Pays :</TD><TD><select name="pays"><option value="- - -"></option>
  <?
  $query = "SELECT * FROM minis_pays ORDER BY nom";
  $exec = mysql_query($query) or die(mysql_error());
  while($data = mysql_fetch_assoc($exec)){
	  echo "<option value='".$data["id"]."'";
	  if($data["id"] == $pays)
	  	echo " selected";
	  echo ">".stripslashes($data["nom"])."</option>";
  }
  ?>
  </select></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>