<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Option - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	mysql_query("UPDATE devis_junior SET vu = '1' WHERE id = '".addslashes($_GET['id'])."'") or die(mysql_error());
	
	$requete = "SELECT d.*, fj.nom as destination FROM devis_junior d LEFT OUTER JOIN fiche_junior fj ON d.destination = fj.id WHERE d.id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$datenaiss = parseDate($row['datenaiss']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$mail = stripslashes($row['mail']);
	$destination = stripslashes($row['destination']);
	$date = stripslashes($row['date']);
	$preacheminement = stripslashes($row['preacheminement']);
	$preacheminement_ville = stripslashes($row['preacheminement_ville']);
	$accueil_paris = stripslashes($row['accueil_paris']);
	$gare = stripslashes($row['gare']);
	$ass_annulation = stripslashes($row['ass_annulation']);
	$ass_interruption = stripslashes($row['ass_interruption']);
	$total = stripslashes($row['total']);
	$datetime = parseDate($row['datetime']);
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD align=right>Nom :</TD><TD><b><?=$nom?></b></TD></TR>
<TR><TD align=right>Prénom :</TD><TD><b><?=$prenom?></b></TD></TR>
<TR><TD align=right>Adresse :</TD><TD><b><?=$adresse?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel?></b></TD></TR>
<TR><TD align=right>Mail :</TD><TD><b><?=$mail?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Destination :</TD><TD><b><?=$destination?></b></TD></TR>
<TR><TD align=right>Date :</TD><TD><b><?=$date?></b></TD></TR>
<TR><TD align=right>Préacheminement :</TD><TD><b><?=(($preacheminement=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Préacheminement ville :</TD><TD><b><?=$preacheminement_ville?></b></TD></TR>
<TR><TD align=right>Accueil Paris :</TD><TD><b><?=(($accueil_paris=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Gare :</TD><TD><b><?=$gare?></b></TD></TR>
<TR><TD align=right>Assurance annulation :</TD><TD><b><?=(($ass_annulation=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Pack multirisques :</TD><TD><b><?=(($ass_interruption=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Total :</TD><TD><b><?=parsePrix($total)?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Date demande :</TD><TD><b><?=$datetime?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><input type="button" value="Retour" onclick="history.back();" class="bouton"></TD></TR>
<!--<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>-->
</TABLE>
</form>


  		</td>
	</tr>
</table><br>