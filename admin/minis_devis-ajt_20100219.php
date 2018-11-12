<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Devis - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	$requete = "SELECT * FROM devis_minis WHERE id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$civilite = stripslashes($row['civilite']);
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$portable = stripslashes($row['portable']);
	$mail = stripslashes($row['mail']);
	$langue = stripslashes($row['langue']);
	$langue_autre = stripslashes($row['langue_autre']);
	$nom_etab = stripslashes($row['nom_etab']);
	$adresse_etab = stripslashes($row['adresse_etab']);
	$adresse_etab2 = stripslashes($row['adresse_etab2']);
	$cp_etab = stripslashes($row['cp_etab']);
	$ville_etab = stripslashes($row['ville_etab']);
	$tel_etab = stripslashes($row['tel_etab']);
	$fax_etab = stripslashes($row['fax_etab']);
	$classe_etab = stripslashes($row['classe_etab']);
	$destination = stripslashes($row['destination']);
	$nb_adulte = stripslashes($row['nb_adulte']);
	$nb_eleve = stripslashes($row['nb_eleve']);
	$nb_nuitee = stripslashes($row['nb_nuitee']);
	$age = stripslashes($row['age']);
	$date_debut = stripslashes($row['date_debut']);
	$date_fin = stripslashes($row['date_fin']);
	$mode_voyage = stripslashes($row['mode_voyage']);
	$mode_voyage2 = stripslashes($row['mode_voyage2']);
	$trav = stripslashes($row['trav']);
	$message = stripslashes($row['message']);
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD align=right>Civilité :</TD><TD><b><?=$civilite?></b></TD></TR>
<TR><TD align=right>Nom :</TD><TD><b><?=$nom?></b></TD></TR>
<TR><TD align=right>Prénom :</TD><TD><b><?=$prenom?></b></TD></TR>
<TR><TD align=right>Adresse :</TD><TD><b><?=$adresse?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel?></b></TD></TR>
<TR><TD align=right>Portable :</TD><TD><b><?=$portable?></b></TD></TR>
<TR><TD align=right>Mail :</TD><TD><b><?=$mail?></b></TD></TR>
<TR><TD align=right>Langue :</TD><TD><b><?=$langue?></b></TD></TR>
<TR><TD align=right>Langue autre :</TD><TD><b><?=$langue_autre?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Nom établissement :</TD><TD><b><?=$nom_etab?></b></TD></TR>
<TR><TD align=right>Adresse :</TD><TD><b><?=$adresse_etab?></b></TD></TR>
<TR><TD align=right>Adresse 2 :</TD><TD><b><?=$adresse_etab2?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp_etab?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville_etab?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel_etab?></b></TD></TR>
<TR><TD align=right>Fax :</TD><TD><b><?=$fax_etab?></b></TD></TR>
<TR><TD align=right>Classe :</TD><TD><b><?=$classe_etab?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Destination :</TD><TD><b><?=$destination?></b></TD></TR>
<TR><TD align=right>Nb adulte :</TD><TD><b><?=$nb_adulte?></b></TD></TR>
<TR><TD align=right>Nb élève :</TD><TD><b><?=$nb_eleve?></b></TD></TR>
<TR><TD align=right>Nb nuitee :</TD><TD><b><?=$nb_nuitee?></b></TD></TR>
<TR><TD align=right>Age :</TD><TD><b><?=$age?></b></TD></TR>
<TR><TD align=right>Date de début :</TD><TD><b><?=$date_debut?></b></TD></TR>
<TR><TD align=right>Date de fin :</TD><TD><b><?=$date_fin?></b></TD></TR>
<TR><TD align=right>Mode voyage :</TD><TD><b><?=$mode_voyage?></b></TD></TR>
<TR><TD align=right>Mode voyage2 :</TD><TD><b><?=$mode_voyage2?></b></TD></TR>
<TR><TD align=right>Traversée maritime :</TD><TD><b><?=$trav?></b></TD></TR>
<TR><TD align=right valign="top">Message :</TD><TD><b><?=nl2br($message)?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><input type="button" value="Retour" onclick="history.back();" class="bouton"></TD></TR>
<!--<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>-->
</TABLE>
</form>


  		</td>
	</tr>
</table><br>