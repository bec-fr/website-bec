<?
if(!isset($_GET["saison"])){
	$_GET["saison"] = "7";
}
?>

<center>
<br />
<span style="color:#CC00FF">Paiement en attente</span>&nbsp;&nbsp;-&nbsp;&nbsp;
<span style="color:#20C420">Paiement validé</span>&nbsp;&nbsp;-&nbsp;&nbsp;
<span style="color:#FF0000">Paiement annulé</span>
</center>
<br />

<form action="admin.php" method="get" name="tri">
<input type="hidden" name="action" value="<?=$_GET["action"]?>" />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td colspan="2">Recherche</td></tr>
	<tr><td valign="top">
    
	<table>
    <tr>
        <td>Saison :</td>
        <td>
            <select name="saison" onchange="document.tri.submit()" class="contenu">
                <option value="">- - -</option>
                <option value="1" <?=((isset($_GET["saison"]) && $_GET["saison"] == "1") ? " selected" : "")?>>saison 1</option>
                <option value="2" <?=((isset($_GET["saison"]) && $_GET["saison"] == "2") ? " selected" : "")?>>saison 2</option>
                <option value="3" <?=((isset($_GET["saison"]) && $_GET["saison"] == "3") ? " selected" : "")?>>saison 3</option>	
				<option value="4" <?=((isset($_GET["saison"]) && $_GET["saison"] == "4") ? " selected" : "")?>>saison 4</option>	
				<option value="5" <?=((isset($_GET["saison"]) && $_GET["saison"] == "5") ? " selected" : "")?>>saison 5</option>
				<option value="6" <?=((isset($_GET["saison"]) && $_GET["saison"] == "6") ? " selected" : "")?>>saison 6</option>
				<option value="7" <?=((isset($_GET["saison"]) && $_GET["saison"] == "7") ? " selected" : "")?>>saison 7</option>
            </select>
        </td>
    </tr>
    <tr>
    <td>Recherche :</td>
    <td><input type="text" size="30" name="mots" value="<?=((isset($_GET["mots"]) && $_GET["mots"] != "") ? stripslashes($_GET["mots"]) : "")?>" /></td>
    </tr>
	</table>
    
    </td>
    </tr>
    <tr align="center"><td colspan="2"><input type="submit" value="OK" class="bouton" /></td></tr>
</table>
</form><br />

<?
$type_paiement = "";
$paiement = "";
if(isset($_GET['paiement']) && $_GET['paiement'] != ""){
	$paiement = $_GET['paiement'];
	
	if($paiement == 0)
		$type_paiement = " - Paiement en attente";
	elseif($paiement == 1)
		$type_paiement = " - Paiement validé";
	elseif($paiement == 2)
		$type_paiement = " - Paiement annulé";
}
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Commandes <?=$type_paiement?></td></tr>
	<tr>
		<td>
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette commande ?")) {
  document.location.href='reservation_junior-sup.php?paiement=<?=$paiement?>&n='+id;
 }
}
</script>


<table border="0" align="center" width="100%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">ID</th>
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Destination</th>
    <th class="cellule_basdroite">Type</th>
    <th class="cellule_basdroite">Date commande</th>
    <th class="cellule_basdroite">Date paiement</th>
    <th class="cellule_basdroite">Total</th>
    <th width="100" colspan="5" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT r.*, f.nom as fiche, d.nom as date FROM reservation_junior r LEFT OUTER JOIN fiche_junior f ON r.rid_fiche = f.id LEFT OUTER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE 1";
if(isset($_GET['paiement']) && $_GET['paiement'] != ""){
	$query .= " AND paiement = '".addslashes($_GET['paiement'])."'";
	$plus_link .= "&paiement=".$_GET['paiement'];
}
if(isset($_GET['saison']) && $_GET['saison'] != ""){
	$query .= " AND saison = '".addslashes($_GET['saison'])."'";
	$plus_link .= "&saison=".$_GET['saison'];
}
if(isset($_GET['mots']) && $_GET['mots'] != ""){
	$query .= " AND (r.id LIKE '%".addslashes($_GET['mots'])."%' OR r.nom LIKE '%".addslashes($_GET['mots'])."%')";
	$plus_link .= "&mots=".$_GET['mots'];
}
$query .= " ORDER BY id DESC";
//echo $query;
$nb = mysql_num_rows(mysql_query($query));
$query .= " LIMIT ".($page*30).",30";
$req = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($req))
{
  ?>
  <tr align="center" onMouseOver="this.style.backgroundColor='#DDDDDD'" onMouseOut="this.style.backgroundColor='#ECECEC'">
  <?
  if($row['paiement'] == 0)
  	$color = "#CC00FF";
  elseif($row['paiement'] == 1)
  	$color = "#20C420";
  elseif($row['paiement'] == 2)
  	$color = "#FF0000";
  ?>
  <td align="center" class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=stripslashes($row['id'])?></td>
  <td align="left" class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=stripslashes($row['nom'])?> <?=stripslashes($row['prenom'])?></td>
  <td align="left" class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=stripslashes($row['fiche'])?><br /><?=stripslashes($row['date'])?></td>
  <td class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=($row['type_paiement']==1 ? "CB + chèque" : ($row['type_paiement']==2 ? "Chèque" : ($row['type_paiement']==3 ? "Virement" : ($row['type_paiement']==4 ? "Paypal" : ($row['type_paiement']==5 ? "CB 2 fois" : ($row['type_paiement']==6 ? "Tout CB" : ($row['type_paiement']==7 ? "Tout chèque" : "&nbsp;")))))))?></td>
  <td class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=parseDate($row['date_com'])?></td>
  <td class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=parseDate($row['date_paie'])?></td>
  <td class="cellule_basdroite" style="color:<?=$color?>; font-weight:bold"><?=parsePrix($row['total'])?>&nbsp;€</td>
  <td class="cellule_basdroite"><a href="#" onClick="window.open('voir-commande.php?id=<?=$row[0]?>','','top=200,left=200,width=800,height=700,resizable=yes,scrollbars=yes'); return false;"><img src="../adminImg/oeil.gif" title="voir inscription" border="0"></a></td>
  <td class="cellule_basdroite">
  <? if($row['saison'] == "3" or "4"){ ?>
  <a href="../facture-pdf.php?id=<?=$row[0]?>" target="_blank"><img src="../adminImg/icone-pdf.gif" title="voir confirmation réservation" border="0"></a>
  <? }elseif($row['saison'] == "2"){ ?>
  <a href="../facture-pdf_2013.php?id=<?=$row[0]?>" target="_blank"><img src="../adminImg/icone-pdf.gif" title="voir confirmation réservation 2013" border="0"></a>
  <? }else{ ?>
  <a href="../facture-pdf_2012.php?id=<?=$row[0]?>" target="_blank"><img src="../adminImg/icone-pdf.gif" title="voir confirmation réservation 2012" border="0"></a>
  <? } ?>
  </td>
  <td class="cellule_basdroite"><a href="admin.php?action=reservation_juniorModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
  <td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
  </tr>
  <?
}
?>

</table><br />

<p align="center">
<?
for($i=0 ; $i<ceil($nb/30) ; $i++)
{
	if($i!=0)
	{
		echo " - ";
	}
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=reservation_junior&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>