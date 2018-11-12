<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Devis - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	$requete = "SELECT * FROM devis_junior WHERE id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$datenaiss = parseDate($row['datenaiss']);
	$nationalite = stripslashes($row['nationalite']);
	$sexe = stripslashes($row['sexe']);
	$classe = stripslashes($row['classe']);
	$nom_parent = stripslashes($row['nom_parent']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$portable = stripslashes($row['portable']);
	$mail = stripslashes($row['mail']);
	$destination = stripslashes($row['destination']);
	$formule = stripslashes($row['formule']);
	$message = stripslashes($row['message']);
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD align=right>Nom :</TD><TD><b><?=$nom?></b></TD></TR>
<TR><TD align=right>Prénom :</TD><TD><b><?=$prenom?></b></TD></TR>
<TR><TD align=right>Date de naissance :</TD><TD><b><?=$datenaiss?></b></TD></TR>
<TR><TD align=right>Nationalité :</TD><TD><b><?=$nationalite?></b></TD></TR>
<TR><TD align=right>Sexe :</TD><TD><b><?=$sexe?></b></TD></TR>
<TR><TD align=right>Classe :</TD><TD><b><?=$classe?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Nom des parents :</TD><TD><b><?=$nom_parent?></b></TD></TR>
<TR><TD align=right>Adresse :</TD><TD><b><?=$adresse?></b></TD></TR>
<TR><TD align=right>CP :</TD><TD><b><?=$cp?></b></TD></TR>
<TR><TD align=right>Ville :</TD><TD><b><?=$ville?></b></TD></TR>
<TR><TD align=right>Tél :</TD><TD><b><?=$tel?></b></TD></TR>
<TR><TD align=right>Portable :</TD><TD><b><?=$portable?></b></TD></TR>
<TR><TD align=right>Mail :</TD><TD><b><?=$mail?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Destination :</TD><TD><b><?=$destination?></b></TD></TR>
<TR><TD align=right>Formule :</TD><TD><b><?=$formule?></b></TD></TR>
<TR><TD align=right valign="top">Message :</TD><TD><b><?=nl2br($message)?></b></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><input type="button" value="Retour" onclick="history.back();" class="bouton"></TD></TR>
<!--<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>-->
</TABLE>
</form>


  		</td>
	</tr>
</table><br>