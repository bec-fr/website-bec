<form action="admin.php" method="get" name="tri">
<input type="hidden" name="action" value="newsletter" />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td colspan="2">Recherche</td></tr>
	<tr><td valign="top">
    
	<table>
		<tr>
			<td>Groupe :</td>
			<td>
				<select name="groupe" onchange="document.tri.submit()" class="contenu">
					<option value="">- - -</option>
					<?
					$query = "SELECT * FROM mailing_groupe ORDER BY nom";
					$req = mysql_query($query) or die(mysql_error());
					while ($row = mysql_fetch_array($req)) {
						echo "<option value='".$row[0]."' ".($row[0]==$_GET['groupe'] ? "selected" : "").">".stripslashes($row['nom'])."</option>";
					}
					?>
				</select>
			</td>
		</tr>
        <tr>
            <td>Recherche :</td>
            <td><input type="text" name="mots" value="<?=(isset($_GET['mots']) ? stripslashes($_GET['mots']) : "")?>" size="50" class="formulaire" /></td>
        </tr>
        <tr><td></td><td><input type="submit" value="OK" class="bouton" /></td>
	</table>
    
	</td></tr>
</table>
</form><br />

<?
$plus_link = "";

if(isset($_GET['page']))
	$page = addslashes($_GET['page']);
else
	$page = 0;

$query = "SELECT m.id, m.mail, mg.nom as groupe FROM mailing m LEFT OUTER JOIN mailing_groupe mg ON m.groupe = mg.id WHERE 1";
if(isset($_GET["groupe"]) && $_GET["groupe"] != ""){
	$query .= " AND m.groupe = '".addslashes($_GET["groupe"])."'";
	$plus_link .= "&groupe=".$_GET['groupe'];
}
if(isset($_GET["mots"]) && $_GET["mots"] != ""){
	$query .= " AND m.mail LIKE '%".addslashes($_GET["mots"])."%'";
	$plus_link .= "&mots=".$_GET["mots"];
}

$nb = mysql_num_rows(mysql_query($query));
$query .= " ORDER BY m.mail";
$query .= " LIMIT ".($page*50).",50";
//echo $query;
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Newsletter (<?=$nb?>)</td><td align="right"><a href="admin.php?action=newsletterAjouter&url_retour=<?=urlencode("admin.php?action=newsletter&page=".$page.$plus_link)?>" style="color:#FFFFFF">Ajouter un mail</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id, url_retour) {
	if(confirm("Etes-vous sûr de vouloir supprimer cette adresse e-mail ?")) {
		document.location.href='newsletter-sup.php?n='+id+'&url_retour='+encodeURIComponent(url_retour);
	}
}
</script>


<div align="center"><input type="button" value="Exporter" onclick="window.open('newsletter-export.php?<?=$plus_link?>', '')" class="bouton" /></div><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Groupe</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>

<?
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onMouseOver="this.style.backgroundColor='#DDDDDD'" onMouseOut="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['mail'])?></td>  
	<td class="cellule_basdroite"><?=stripslashes($row['groupe'])?></td>  
	<td class="cellule_basdroite"><a href="admin.php?action=newsletterModif&id=<?=$row[0]?>&url_retour=<?=urlencode("admin.php?action=newsletter&page=".$page.$plus_link)?>"><img src="../adminImg/crayon.gif" border="0"></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>', '<?=urlencode("admin.php?action=newsletter&page=".$page.$plus_link)?>');"><img src="../adminImg/poubelle.gif" border="0"></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=newsletter&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>