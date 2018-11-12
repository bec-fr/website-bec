<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();
?>
<html>
<head>
<link rel="Shortcut Icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$nom_site?></title>
<meta name="Description" content="Site Internet <?=$nom_site?>">
<meta name="Keywords" content="<?=$nom_site?>">
<style type="text/css">
.norm{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;		
}
.Style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
</style>
<style type="text/css" media="print">
.norm{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;		
}
.Style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.cache {display:none; }
</style>
</head>

<body>

<?
$query = "SELECT r.*, f.nom as fiche, d.nom as date FROM reservation_junior r LEFT OUTER JOIN fiche_junior f ON r.rid_fiche = f.id LEFT OUTER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id'])."'";
$exec = mysql_query($query) or die(mysql_error());
if(mysql_num_rows($exec) > 0){						
	$row = mysql_fetch_array($exec);
	
	$total=0;
	$total2 = $row['total'];
	$acompte = $row['acompte'];
	
	$date_paie = $row['date_paie'];
	$paiement = $row['paiement'];
	
?>

<? if(!isset($_GET['p'])){ ?>
<table width="100%" align="center" class="norm" height="150">
<tr>
	<td valign="top" width="70%"><div align="left">
<b>
		  <img src="../images/logo.jpg" width="150"><br><br>
		  <?=$nom_site?><br>
		  <?=$adresse_site2?><br />
		  <?=$pays_site?><br />
          <?=$tel_site?><br /></b>
	</div></td>
	<td valign="top">
	<table align="right" class="norm" ><tr><td>
    <br><br>
	<B><u>Coordonnées :</u><br>
<?=stripslashes($row['nom'])?> <?=stripslashes($row['prenom'])?><br>
<?=stripslashes($row['adresse'])?><br>
<?=stripslashes($row['cp'])?> <?=stripslashes($row['ville'])?><br>
<? if(trim($row['tel']) != ""){?>
<?=stripslashes($row['tel'])?><br>
<? } ?>
<? if(trim($row['mail']) != ""){?>
<?=stripslashes($row['mail'])?><br>
<? } ?>
Né le <?=parseDate($row['datenaiss'])?><br>
</B>
</td></tr></table></td>	
</tr>
</table>
<? } ?>
<br />

<span class="norm"><strong>Numéro de réservation : </strong><?=$_GET['id']?></span><br />
<span class="norm"><strong>Date de la réservation : </strong><?=parseDate($row['date_com'])?></span><br />
<span class="norm"><strong>Type de paiement : </strong><?=($row['type_paiement']==1 ? "CB" : ($row['type_paiement']==2 ? "Chèque" : ($row['type_paiement']==3 ? "Virement" : ($row['type_paiement']==4 ? "Paypal" : ($row['type_paiement']==5 ? "R&P" : "&nbsp;")))))?></span><br />
<br>
<span class="Style2" style="font-size:14px"><b><u>Votre réservation en d&eacute;tail :</u></b></span> <br />
<br />

<TABLE width=100% border="1" cellpadding=2 cellspacing=0 bordercolor="#CCCCCC" bgcolor='#999999' class=norm>
<TR>
<TD align=center class=norm bgcolor='#999999'><b>Séjour</b></TD>
<TD align=center class=norm bgcolor='#999999'><b>Date</b></TD>
<TD align=center class=norm bgcolor='#999999'><b>Options</b></TD>
<TD align=center class=norm bgcolor='#999999'><b>Acompte</b></TD>
<TD align=center class=norm bgcolor='#999999'><b>Total</b></TD>
</TR>
<tr class=norm>					 
    <td bgcolor=#EEEDEC class=norm align="center"><b><?=stripslashes($row['fiche'])?>&nbsp;</b></td>
    <td bgcolor=#EEEDEC class=norm align="center"><b><?=stripslashes($row['date'])?></b>&nbsp;</td>
    <td bgcolor=#EEEDEC class=norm align="center">
    <b>
	<?
	if($row["preacheminement"] == "1"){
		?>
        - Préacheminement de Province en Train depuis <?=stripslashes($row["preacheminement_ville"])?><br>
		<?
	}
	if($row["preacheminement_avion"] == "1"){
		?>
        - Préacheminement de Province en Avion depuis <?=stripslashes($row["preacheminement_avion_ville"])?><br>
		<?
	}
	if($row["accueil_paris"] == "1"){
		?>
        - Accueil à Paris en Gare de <?=stripslashes($row["gare"])?><br>
		<?
	}
	if($row["accueil_paris_aeroport"] == "1"){
		?>
		- Accueil à Paris à l'aéroport de <?=stripslashes($row["aeroport"])?><br>
		<?
	}
	if($row["ass_annulation"] == "1"){
		?>
		- Assurance annulation 3%<br>
		<?
	}
	if($row["ass_interruption"] == "1"){
		?>
		- Assurance Interruption 1.5%<br>
		<?
	}
	if($row["reduction_1"] == "1" || $row["reduction_2"] == "1" || $row["reduction_3"] == "1" || $row["reduction_4"] == "1" || $row["reduction_num"] != "0"){
		?>
		- Réduction<br>
		<?
	}
	?>
    </b>
    </td>
    <td bgcolor=#EEEDEC class=norm align="right"><?=parsePrix($row['acompte'])?> &euro;</td>
    <td bgcolor=#EEEDEC class=norm align="right"><?=parsePrix($row['total'])?> &euro;</td>
</tr>
<tr><td colspan="5" bgcolor=#EEEDEC>&nbsp;</td></tr>
<TR>
<TD bgcolor=#EEEDEC class=norm colspan=4 align=right><b>Montant Total TTC</b></TD>
<TD bgcolor=#EEEDEC class=normcouleur align=right><b><?=parsePrix($total2)?>&nbsp;€</b></TD>
</TR>
</TABLE>
<br />

<? if(!isset($_GET['p'])){ ?>
<span class="Style2" style="font-size:14px"><b><u>Statut de votre réservation :</u></b></span> <br />
<br />
<table align="center" width="50%" border="1" cellpadding="2" cellspacing="0" class="norm">
	<tr>
		<td width="80%">&nbsp;</td>
		<td width="10%" align="center"><strong>Date</strong></td>
		<td width="10%" align="center"><strong>Statut</strong></td>		
	</tr>
	<tr>
		<td>Validation du paiement : </td>
		<td align="center"><?=($date_paie != "0000-00-00 00:00:00" ? parseDate($date_paie) : "&nbsp;")?></td>
		<td align="center"><?=($paiement == 1 || $paiement == 3 || $paiement == 4 ? "<img src='../images/bt_ok.gif'>" : "<img src='../images/bt_attente.gif'>")?></td>		
	</tr>
</table><br><br>

<? } ?>

<div class="cache">
<center><input type="button" value="Fermer" onClick="window.close();" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Imprimer" onClick="window.print();" /></center>
</div>

<?
}else{
	echo "<script>alert('La commande n\'existe pas.'); window.close(); document.location.href='index.php';</script>";
}
?>

</body>
</html>