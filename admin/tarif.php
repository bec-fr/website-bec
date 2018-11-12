<?
$query_d = "SELECT * FROM fiche_etudiant_adulte WHERE id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
$data_d = mysql_fetch_assoc($exec_d);
?>

<?
$query = "SELECT id, nom, lib_tarif_1, lib_tarif_2, lib_tarif_3 FROM fiche_etudiant_adulte WHERE id = '".addslashes($_GET["fiche"])."'";
$exec = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_assoc($exec);
$col1 = stripslashes($data["lib_tarif_1"]);
$col2 = stripslashes($data["lib_tarif_2"]);
$col3 = stripslashes($data["lib_tarif_3"]);
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Tarif - <?=stripslashes($data["nom"])?></td><td align="right"><a href="admin.php?action=tarifAjouter&fiche=<?=$_GET["fiche"]?>&url_retour=<?=urlencode("admin.php?action=tarif&fiche=".$_GET["fiche"])?>" style="color:#FFFFFF">Ajouter un tarif</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id, url_retour) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce tarif ?")) {
  document.location.href='tarif-sup.php?n='+id+'&url_retour='+encodeURIComponent(url_retour);
 }
}
</script>

<a href="admin.php?action=fiche_etudiant_adulte">Retour fiches</a><br /><br />
<?=stripslashes($data_d["nom"])?><br /><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite"><?=$col1?></th>
    <th class="cellule_basdroite"><?=$col2?></th>
    <th class="cellule_basdroite"><?=$col3?></th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE 1";
if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
	$query .= " AND fiche_etudiant_adulte = '".addslashes($_GET["fiche"])."'";
	$plus_link .= "&fiche=".$_GET["fiche"];
}
$query .= " ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));
// on recupere la devise des tarifs
$query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$_GET["fiche"]."'";
							$exec4 = mysql_query($query4) or die(mysql_error());
							$data4 = mysql_fetch_assoc($exec4);
										{
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);
										}
while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite"><?=$row['prix_famille']?> <?=$symbole ?></td>
    <td class="cellule_basdroite"><?=$row['prix_residence']?> <?=$symbole ?></td>
    <td class="cellule_basdroite"><a href="admin.php?action=tarifModif&fiche=<?=$_GET["fiche"]?>&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>', '<?=urlencode("admin.php?action=tarif&fiche=".$_GET["fiche"])?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />

<?
if(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	if($_FILES['fic']['error'] == 0){
		if(substr(strtolower($_FILES["fic"]['name']),-4)==".csv"){
			mysql_query("DELETE FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".addslashes($_GET['fiche'])."'") or die(mysql_error());
			
			$Fnm = "../imagesUp/tarifs/tarif_etudiant.csv";
			move_uploaded_file($_FILES['fic']['tmp_name'], $Fnm);
			
			$tableau = file($Fnm);
			while(list($cle,$val) = each($tableau))
			{
			   $t = explode(";", $val);   
			   $sql = "INSERT INTO fiche_etudiant_adulte_tarif VALUES ('', '".addslashes($_GET['fiche'])."', '".addslashes(str_replace("\"", "", $t[0]))."', '".addslashes(str_replace(array(" ","€"), "", $t[1]))."', '".addslashes(str_replace(array(" ","€"), "", $t[2]))."')";
			   mysql_query($sql) or die(mysql_error());
			}
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un PDF.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=tarif&fiche=".$_GET['fiche']."';</script>";
}
?>

<form name="form" method="post" enctype="multipart/form-data" action="admin.php?action=tarif&fiche=<?=$_GET["fiche"]?>">
<input type="hidden" name="ok" value="1" />
<table align="center" width="98%" style="border:#000 1px solid;">
<tr><td>Charger le fichier des tarifs</td></tr>
<tr><td>Le fichier doit être un au format csv (séparateur ";") et doit être formé comme les exemples suivants :<br /><a href="exemple_tarif_etudiant.csv" target="_blank">exemple 1</a> - <a href="exemple_tarif_etudiant2.csv" target="_blank">exemple 2</a></td></tr>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=tarif&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>