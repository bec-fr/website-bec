<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Avoir / réduc - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['code'])){
   $code = $_POST['code'];
   $mini = $_POST['mini'];
   $avoir = $_POST['avoir'];
   $pourc = $_POST['pourc'];
   $date_debut = $_POST['a1']."-".$_POST['m1']."-".$_POST['j1'];
   $date_fin = $_POST['a2']."-".$_POST['m2']."-".$_POST['j2'];
   $rid_fiche = $_POST['rid_fiche'];
   
   if(isset($_GET['id'])){
     $id = $_GET['id'];
	 $requete = 'UPDATE avoir SET date_debut="'.addslashes($date_debut).'", date_fin="'.addslashes($date_fin).'", pourc="'.addslashes($pourc).'", prix_mini="'.addslashes($mini).'", avoir="'.addslashes($avoir).'", code="'.addslashes($code).'", rid_fiche="'.addslashes($rid_fiche).'" WHERE id_avoir = "'.addslashes($_GET['id']).'"';
     mysql_query($requete) or die(mysql_error());
   }else{
     $sql = "INSERT INTO avoir (code, avoir, pourc, prix_mini, date_debut, date_fin, rid_fiche) VALUES ('".addslashes($code)."', '".addslashes($avoir)."', '".addslashes($pourc)."', '".addslashes($mini)."', '".addslashes($date_debut)."', '".addslashes($date_fin)."', '".addslashes($rid_fiche)."')";
     mysql_query($sql) or die(mysql_error());
	 $id = mysql_insert_id();
  }
  
  echo "<script>document.location.href='admin.php?action=avoir';</script>";
}else{ 
   $avoir = "";
   $code = "";
   $pourc = "";
   $mini = "";
   $date_debut = explode("-",date("Y-m-d"));
   $date_fin = explode("-",date("Y-m-d"));
   $rid_fiche = "";
   
   if (isset($_GET['id'])){
     $requete = "SELECT * FROM avoir WHERE id_avoir = '".addslashes($_GET['id'])."'";
     $result = mysql_query($requete) or die(mysql_error());
  	 $row = mysql_fetch_array($result);
	 
	   $mini = 	stripslashes($row['prix_mini']);	
	   $avoir = stripslashes($row['avoir']);
	   $pourc = stripslashes($row['pourc']);	   
	   $code = stripslashes($row['code']);
	   $date_debut = explode("-",$row['date_debut']);
	   $date_fin = explode("-",$row['date_fin']);
	   $rid_fiche = stripslashes($row['rid_fiche']);
    }
}
?>

  <FORM name="news" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu>  
  <TR><TD align=right>Code :</TD><TD><INPUT TYPE="text" size="50" name="code" maxlength="50" value="<?=$code?>"></TD></TR> 
  <TR><TD align=right>Avoir :</TD><TD><INPUT TYPE="text" size="10" name="avoir" maxlength="10" value="<?=$avoir?>"> €</TD></TR>   
  <TR><TD align=right>Réduction :</TD><TD><INPUT TYPE="text" size="10" name="pourc" maxlength="10" value="<?=$pourc?>"> %</TD></TR>
  <TR><TD align=right>Montant minimum :</TD><TD><INPUT TYPE="text" size="10" name="mini" maxlength="10" value="<?=$mini?>"> €</TD></TR>   
  <TR><TD align=right>Date début :</TD><TD>
  <select name="j1"><?=sel_date("jour",$date_debut[2])?></select>
  <select name="m1"><?=sel_date("mois",$date_debut[1])?></select>
  <select name="a1"><?=sel_date("annee",$date_debut[0],1980)?></select>
  </TD></TR>
  <TR><TD align=right>Date fin :</TD><TD>
  <select name="j2"><?=sel_date("jour",$date_fin[2])?></select>
  <select name="m2"><?=sel_date("mois",$date_fin[1])?></select>
  <select name="a2"><?=sel_date("annee",$date_fin[0],1980)?></select>
  </TD></TR>
  <tr><td height="10"></td></tr>
  <TR><TD align=right>Séjour :</TD><TD><select name="rid_fiche"><option value="">- - -</option>
<?
$query = "SELECT * FROM  fiche_junior ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $rid_fiche)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
  <tr><td height="10"></td></tr>
  <TR><TD></TD><TD><INPUT TYPE=submit value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?>></TD></TR>
  </TABLE>
  </form>
  
  
  		</td>
	</tr>
</table><br>