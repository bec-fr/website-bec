<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Suppl�ments</td><td align="right"><a href="admin.php?action=supplementAjouter&fiche=<?=$_GET["fiche"]?>&url_retour=<?=urlencode("admin.php?action=supplement&fiche=".$_GET["fiche"])?>" style="color:#FFFFFF">Ajouter un suppl�ment</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id, url_retour) {
 if (confirm("Etes-vous s�r de vouloir supprimer ce suppl�ment ?")) {
  document.location.href='supplement-sup.php?n='+id+'&url_retour='+encodeURIComponent(url_retour);
 }
}
</script>

<a href="admin.php?action=fiche_etudiant_adulte">Retour fiches</a><br /><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Tarif</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE 1";
if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
	$query .= " AND fiche_etudiant_adulte = '".addslashes($_GET["fiche"])."'";
	$plus_link .= "&fiche=".$_GET["fiche"];
}
$query .= " ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?>&nbsp;</td>
	<td class="cellule_basdroite"><?=stripslashes($row['tarif'])?>&nbsp;</td>
	<td class="cellule_basdroite"><a href="admin.php?action=supplementModif&id=<?=$row[0]?>&url_retour=<?=urlencode("admin.php?action=supplement&fiche=".$_GET["fiche"])?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>', '<?=urlencode("admin.php?action=supplement&fiche=".$_GET["fiche"])?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />

<?
if(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	if($_FILES['fic']['error'] == 0){
		if(substr(strtolower($_FILES["fic"]['name']),-4)==".csv"){
			mysql_query("DELETE FROM fiche_etudiant_adulte_supplement WHERE fiche_etudiant_adulte = '".addslashes($_GET['fiche'])."'") or die(mysql_error());
			
			$Fnm = "../imagesUp/tarifs/tarif_etudiant.csv";
			move_uploaded_file($_FILES['fic']['tmp_name'], $Fnm);
			
			$tableau = file($Fnm);
			while(list($cle,$val) = each($tableau))
			{
			   $t = explode(";", $val);   
			   $sql = "INSERT INTO fiche_etudiant_adulte_supplement VALUES ('', '".addslashes($_GET['fiche'])."', '".addslashes(str_replace("\"", "", $t[0]))."', '".addslashes(str_replace("\"", "", $t[1]))."',0)";
			   mysql_query($sql) or die(mysql_error());
			}
		}else{
			echo "<script>alert('Le fichier envoy� n\'est pas un PDF.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=supplement&fiche=".$_GET['fiche']."';</script>";
}
?>

<form name="form" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="ok" value="1" />
<table align="center" width="98%" style="border:#000 1px solid;">
<tr><td>Charger le fichier des suppl�ments</td></tr>
<tr><td>Le fichier doit �tre un au format csv (s�parateur ";") et doit �tre form� comme les exemples suivants :<br /><a href="exemple_supplement_etudiant.csv" target="_blank">exemple 1</a> - <a href="exemple_supplement_etudiant2.csv" target="_blank">exemple 2</a></td></tr>
<tr height="5"><td></td></tr>
<tr><td><input type="file" name="fic" /></td></tr>
<tr><td><input type="submit" value="envoyer" /></td></tr>
</table>
</form>

<p align="center">
<?
for($i=0 ; $i<ceil($nb/50) ; $i++)
{
	if($i!=0)
	{
		echo " - ";
	}
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=supplement&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>