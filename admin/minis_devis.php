<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>

<form action="admin.php" method="get" name="tri">
<input type="hidden" name="action" value="<?=$_GET["action"]?>" />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td colspan="2">Recherche</td></tr>
	<tr><td valign="top">
    
	<table>	
		<tr>
			<td>					
				N° demande > à :
			</td>
			<td>
				<input type="text" name="num_dem" size="10" value="<?=((isset($_GET["num_dem"]) && $_GET["num_dem"] != "") ? stripslashes($_GET["num_dem"]) : "")?>" />
			</td>
		</tr>
        <tr>
			<td>					
				Date demande > à :
			</td>
			<td>
				<table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_dem" maxlength="250" value="<?=((isset($_GET["date_dem"]) && $_GET["date_dem"] != "") ? $_GET["date_dem"] : "")?>" readonly="readonly">
				<script language="JavaScript" type="text/javascript">
                function exampleCallback_ISO1(date, month, year){
                    if (String(month).length == 1) {
                        month = '0' + month;
                    }
                    if (String(date).length == 1) {
                        date = '0' + date;
                    }
                    document.tri.date_dem.value = date + '/' + month + '/' + year;
                }
                calendar1 = new dynCalendar('calendar1', 'exampleCallback_ISO1', 'calendrier/');
                calendar1.setMonthCombo(true);
                calendar1.setYearCombo(true);  
                </script>
                </td></tr></table>
			</td>
		</tr>
        <tr><td></td><td><input type="submit" value="OK" /></td></tr>
	</table>
    		
	</td></tr>
</table>
</form><br />

<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT d.*, fm.nom as destination, mp.nom as pays FROM devis_minis d LEFT OUTER JOIN fiche_minis fm ON d.destination = fm.id LEFT OUTER JOIN minis_pays mp ON fm.pays = mp.id WHERE 1";
if(isset($_GET['num_dem']) && $_GET['num_dem'] != ""){
	$query .= " AND d.id >= '".addslashes($_GET['num_dem'])."'";
	$plus_link .= "&num_dem=".$_GET['num_dem'];
}
if(isset($_GET['date_dem']) && $_GET['date_dem'] != ""){
	$date_dem = explode("/", $_GET['date_dem']);
	$date_dem = $date_dem[2]."-".$date_dem[1]."-".$date_dem[0];
	
	$query .= " AND DATE(d.datetime) >= '".addslashes($date_dem)."'";
	$plus_link .= "&date_dem=".$_GET['date_dem'];
}
//echo $query."<br>";
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Devis</td></tr>
	<tr>
		<td>
<br />


<div align="center"><input type="button" value="Exporter" onclick="window.open('minis_devis-export.php?<?=$plus_link?>', '')" class="bouton" /></div><br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce devis ?")) {
  document.location.href='minis_devis-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="99%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Num</th>
    <th class="cellule_basdroite">Nom prof</th>
    <th class="cellule_basdroite">Destination<br />ville</th>
    <th class="cellule_basdroite">Nb élèves total</th>
    <th class="cellule_basdroite">Nb prof</th>
    <th class="cellule_basdroite">Nb PC</th>
    <th class="cellule_basdroite">Date départ</th>
    <th class="cellule_basdroite">Date dem</th>
    <th class="cellule_basdroite">Vu</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$nb = mysql_num_rows(mysql_query($query));
$query .= " ORDER BY id DESC";
$query .= " LIMIT ".($page*50).",50";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['id'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['nom'])?> <?=stripslashes($row['prenom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['destination'])?></td>	<? $total = ($row['nb_eleve']) + ($row['nb_eleve2']) + ($row['nb_eleve3']);?>
    <td class="cellule_basdroite"><?=$total?>&nbsp;</td>
    <td class="cellule_basdroite"><?=stripslashes($row['nb_adulte'])?>&nbsp;</td>
    <td class="cellule_basdroite"><?=stripslashes($row['nb_pc'])?>&nbsp;</td>
    <td class="cellule_basdroite"><?=parseDate($row['date_debut'])?>&nbsp;</td>
    <td class="cellule_basdroite"><?=parseDate($row['datetime'])?>&nbsp;</td>
    <td class="cellule_basdroite"><img src="../adminImg/<?=(($row["vu"] == "1") ? "true" : "false")?>.gif" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=minis_devisModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />

<p align="center">
<?
for($i=0 ; $i<ceil($nb/50) ; $i++)
{
	if($i!=0)
	{
		echo " - ";
	}
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=minis_devis&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>