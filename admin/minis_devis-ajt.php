<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Devis - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	mysql_query("UPDATE devis_minis SET vu = '1' WHERE id = '".addslashes($_GET['id'])."'") or die(mysql_error());
	
	$requete = "SELECT d.*, fm.nom as destination FROM devis_minis d LEFT OUTER JOIN fiche_minis fm ON d.destination = fm.id WHERE d.id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$id = $_GET['id'];
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$tel_etab = stripslashes($row['tel_etab']);
	$mail = stripslashes($row['mail']);
	$nom_etab = stripslashes($row['nom_etab']);
	$classe_etab = stripslashes($row['classe_etab']);
	$destination = stripslashes($row['destination']);
	$nb_adulte = stripslashes($row['nb_adulte']);
	$nb_eleve = stripslashes($row['nb_eleve']);
	$nb_eleve2 = stripslashes($row['nb_eleve2']);
	$nb_eleve3 = stripslashes($row['nb_eleve3']);
	$nb_pc = stripslashes($row['nb_pc']);
	$date_debut = parseDate($row['date_debut']);
	$depart_nuit = stripslashes($row['depart_nuit']);
	$date_fin = parseDate($row['date_fin']);
	$retour_nuit = stripslashes($row['retour_nuit']);
	$mode_voyage = stripslashes($row['mode_voyage']);
	$mode_voyage2 = stripslashes($row['mode_voyage2']);
	$trav = stripslashes($row['trav']);
	$assurance = stripslashes($row['assurance']);
	$ass_comp = stripslashes($row['ass_complement']);
	$message = stripslashes($row['message']);
	$date_ca = stripslashes($row['date_ca']);
	$datetime = parseDate($row['datetime']);
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD width="250" align=right>Nom du professeur :</TD><TD><b><?=$nom?></b></TD></TR>
<TR><TD align=right>Prénom :</TD><TD><b><?=$prenom?></b></TD></TR>
<TR><TD align=right>Nom établissement :</TD><TD><b><?=$nom_etab?></b></TD></TR>
<TR><TD align=right>Adresse établissement :</TD><TD><b><?=$adresse?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville?></b></TD></TR>
<TR><TD align=right>Tél établissement :</TD><TD><b><?=$tel_etab?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel?></b></TD></TR>
<TR><TD align=right>Mail :</TD><TD><b><?=$mail?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Destination :</TD><TD><b><?=$destination?></b></TD></TR>
<TR><TD align=right>Classe concernée :</TD><TD><b><?=$classe_etab?></b></TD></TR>
<TR><TD align=right>Nb encadrants :</TD><TD><b><?=$nb_adulte?></b></TD></TR>
<TR><TD align=right>Nb élèves moins 16 ans :</TD><TD><b><?=$nb_eleve?></b></TD></TR>
<TR><TD align=right>Nb élèves 16-18 ans:</TD><TD><b><?=$nb_eleve2?></b></TD></TR>
<TR><TD align=right>Nb élèves plus de 18 ans:</TD><TD><b><?=$nb_eleve3?></b></TD></TR>
<TR><TD align=right>Nb PC :</TD><TD><b><?=$nb_pc?></b></TD></TR>
<TR><TD align=right>Date de départ :</TD><TD><b><?=$date_debut?></b></TD></TR>
<TR><TD align=right>Départ de nuit :</TD><TD><b><?php
if ($depart_nuit == "1") {
    echo "oui";   
} else {
    echo "non";
}
?></b></TD></TR>
<TR><TD align=right>Date de retour :</TD><TD><b><?=$date_fin?></b></TD></TR>
<TR><TD align=right>Retour de nuit :</TD><TD><b><?php
if ($retour_nuit == "1") {
    echo "oui";   
} else {
    echo "non";
}
?></b></TD></TR>
<TR><TD align=right>Mode voyage :</TD><TD><b><?=$mode_voyage?> (<?=$mode_voyage2?>)</b></TD></TR>
<TR><TD align=right>Traversée maritime :</TD><TD><b><?=$trav?></b></TD></TR>
<TR><TD align=right>Assurance:</TD><TD><b><?=$assurance?></b></TD></TR>
<TR><TD align=right>Annulation totale groupe :</TD><TD><b><?=$ass_comp?></b></TD></TR>
<TR><TD align=right>Date CA :</TD><TD><b><?=$date_ca?></b></TD></TR>
<TR><TD align=right valign="top">Message :</TD><TD><b><?=nl2br($message)?></b></TD></TR>
<TR><TD align=right>Programme :</TD><TD><b><?=((file_exists("../imagesUp/devis_minis/".$id.".doc")) ? "<a href='../imagesUp/devis_minis/".$id.".doc' target='_blank'>ouvrir</a>" : ((file_exists("../imagesUp/devis_minis/".$id.".pdf")) ? "<a href='../imagesUp/devis_minis/".$id.".pdf' target='_blank'>ouvrir</a>" : ""))?></b></TD></TR>
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