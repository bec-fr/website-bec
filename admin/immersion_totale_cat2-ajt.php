<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Sous-cat�gorie - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a �t� envoy�
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$rid_cat = $_POST['rid_cat'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE immersion_totale_cat2 SET nom='".addslashes($nom)."', rid_cat='".addslashes($rid_cat)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO immersion_totale_cat2 (nom, rid_cat) VALUES ('".addslashes($nom)."', '".addslashes($rid_cat)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=immersion_totale_cat2';</script>";
}else{ 
	$id = "";
	$nom = "";
	$rid_cat = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM immersion_totale_cat2 WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$rid_cat = stripslashes($row['rid_cat']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Cat�gorie :</TD><TD><select name="rid_cat"><option value="">- - -</option>
  <?
  $query = "SELECT * FROM immersion_totale_cat ORDER BY nom";
  $exec = mysql_query($query) or die(mysql_error());
  while($data = mysql_fetch_assoc($exec)){
	  echo "<option value='".$data["id"]."'";
	  if($data["id"] == $rid_cat)
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