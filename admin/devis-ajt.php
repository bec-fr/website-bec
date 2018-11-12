<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Devis - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	mysql_query("UPDATE devis SET vu = '1' WHERE id = '".addslashes($_GET['id'])."'") or die(mysql_error());
	
	$requete = "SELECT d.*, fea.nom as destination, feat.nom as formule FROM devis d LEFT OUTER JOIN fiche_etudiant_adulte fea ON d.destination = fea.id LEFT OUTER JOIN fiche_etudiant_adulte_tarif feat ON d.formule = feat.id WHERE d.id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$nationalite = stripslashes($row['nationalite']);
	$datenaiss = parseDate($row['datenaiss']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$mail = stripslashes($row['mail']);
	$niveau = stripslashes($row['niveau']);
	$destination = stripslashes($row['destination']);
	$date = parseDate($row['date_debut']);
	$formule = stripslashes($row['formule']);
	$hebergement = stripslashes($row['hebergement']);
	$nb_sem = stripslashes($row['nb_sem']);
	$frais_adm = stripslashes($row['frais_adm']);
	$ass_assistance = stripslashes($row['ass_assistance']);
	$ass_annulation = stripslashes($row['ass_annulation']);
	$ass_interruption = stripslashes($row['ass_interruption']);
	$taux = stripslashes($row['taux']);
	$total = stripslashes($row['total']);
	$datetime = parseDate($row['datetime']);
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD align=right>Nom :</TD><TD><b><?=$nom?></b></TD></TR>
<TR><TD align=right>Prénom :</TD><TD><b><?=$prenom?></b></TD></TR>
<TR><TD align=right>Nationalite :</TD><TD><b><?=$nationalite?></b></TD></TR>
<TR><TD align=right>Adresse :</TD><TD><b><?=$adresse?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel?></b></TD></TR>
<TR><TD align=right>Mail :</TD><TD><b><?=$mail?></b></TD></TR>
<TR><TD align=right>Niveau :</TD><TD><b><?=$niveau?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Destination :</TD><TD><b><?=$destination?></b></TD></TR>
<TR><TD align=right>Formule :</TD><TD><b><?=$formule?></b></TD></TR>
<TR><TD align=right>Hébergement :</TD><TD><b><?=$hebergement?></b></TD></TR>
<TR><TD align=right>Nb semain :</TD><TD><b><?=$nb_sem?></b></TD></TR>
<TR><TD align=right>Date de début :</TD><TD><b><?=$date?></b></TD></TR>
<TR><TD align=right>Frais administratifs :</TD><TD><b><?=(($frais_adm=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Assurance Pack Multirisque :</TD><TD><b><?=(($ass_assistance=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Assurance annulation :</TD><TD><b><?=(($ass_annulation=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Assurance Medicale/Rapatriement :</TD><TD><b><?=(($ass_interruption=="1") ? "oui" : "non")?></b></TD></TR>
<TR><TD align=right>Taux :</TD><TD><b><?=$taux?></b></TD></TR>
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