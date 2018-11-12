<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Brochure - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
if(isset($_GET['id'])){
	mysql_query("UPDATE brochure SET vu = '1' WHERE id = '".addslashes($_GET['id'])."'") or die(mysql_error());
	
	$requete = "SELECT * FROM brochure WHERE id = '".addslashes($_GET['id'])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$nom = stripslashes($row['nom']);
	$prenom = stripslashes($row['prenom']);
	$adresse = stripslashes($row['adresse']);
	$cp = stripslashes($row['cp']);
	$ville = stripslashes($row['ville']);
	$tel = stripslashes($row['tel']);
	$mail = stripslashes($row['mail']);
	$message = stripslashes($row['message']);
	$connu = stripslashes($row['connu']);
	$pays = stripslashes($row['pays']);
	$sejour = stripslashes($row['sejour']);
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
<TR><TD align=right>Message :</TD><TD><b><?=$message?></b></TD></TR>
<TR><TD align=right>Connu BEC :</TD><TD><b><?=$connu?></b></TD></TR>
<?
if ($_SESSION["partie"] == "1")
{?>
<TR><TD align=right>Pays :</TD><TD><b><?=$pays?></b></TD></TR>
<TR><TD align=right>Sejour :</TD><TD><b><?=$sejour?></b></TD></TR>
<?}?>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><input type="button" value="Retour" onclick="history.back();" class="bouton"></TD></TR>
<!--<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>-->
</TABLE>
</form>


  		</td>
	</tr>
</table><br>