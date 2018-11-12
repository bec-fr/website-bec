<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Fiches mini-séjours</td><td align="right"><a href="admin.php?action=fiche_minisAjouter" style="color:#FFFFFF">Ajouter une fiche</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette fiche ?")) {
  document.location.href='fiche_minis-sup.php?n='+id;
 }
}
</script>


<?
if(isset($_POST["ok_import"]) && $_POST["ok_import"] == "1"){
	if($_FILES['fic']['error'] == 0){
		$tab_extension = array("csv");
		$extension = mb_strtolower(substr($_FILES['fic']['name'], strrpos($_FILES['fic']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			$fichier = "../imagesUp/tarifs.csv";	
			move_uploaded_file($_FILES['fic']['tmp_name'], $fichier);
		
			//Traitement du fichier d'export
			$tableau = file($fichier);
			$i=0;
			while(list($cle, $ligne) = each($tableau)){
				//echo $ligne."<br>";
				$tab = explode(";", $ligne);
				
				$nb_pc_min = trim($tab[0]);
				$apartirde = trim($tab[1]);
				$heb = trim($tab[2]);
				$id_sejour = trim($tab[3]);
				$nom_sejour = trim($tab[4]);
				$tarif_st = trim($tab[28]);
				$tarif_pcsup = trim($tab[29]);
				
				if($id_sejour != "" && is_numeric($id_sejour)){
					$query = "SELECT id FROM hebergement_minis2 WHERE nom = '".addslashes($heb)."'";
					$exec = mysql_query($query) or die(mysql_error());
					$data = mysql_fetch_row($exec);
					$heb = $data[0];
					
					for($i=0 ; $i<25 ; $i++){
						$tarif = trim($tab[$i+5]);
						
						$sql = "DELETE FROM fiche_minis_tarif WHERE rid_fiche_minis = '".addslashes($id_sejour)."' AND rid_zone = '".($i+1)."' AND rid_hebergement = '".addslashes($heb)."'";
						mysql_query($sql) or die(mysql_error());
						
						$sql = "INSERT INTO fiche_minis_tarif (rid_fiche_minis, rid_zone, rid_hebergement, tarif) VALUES ('".addslashes($id_sejour)."', '".($i+1)."', '".addslashes($heb)."', '".addslashes($tarif)."')";
						//echo $sql."<br>";
						mysql_query($sql) or die(mysql_error());
					}
					
					$sql = "UPDATE fiche_minis SET tarif_nbjour_min = '".addslashes($nb_pc_min)."' WHERE id = '".addslashes($id_sejour)."'";
					//echo $sql."<br>";
					mysql_query($sql) or die(mysql_error());
				}
			}
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier csv.')</script>";
		}
	}else{
		echo "<script>alert('L\'upload du fichier a échoué.')</script>";
	}
	
	echo "<script>document.location.href='admin.php?action=fiche_minis';</script>";
	exit();
}
?>


<form name="form_tarif" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="ok_import" value="1" />
<table align="center" width="98%" style="border:#000 1px solid;">
<tr>
<td align="right" width="120">Fichier tarifs (csv) : </td>
<td><input type="file" name="fic" class="formulaire" /></td>
</tr>
<tr><td height="10"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="envoyer" /></td></tr>
</table>
</form>
<br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Pays</th>
    <th class="cellule_basdroite">Ville</th>
    <th class="cellule_basdroite">Sous titre</th>
    <th class="cellule_basdroite">Tarifs</th>
    <th class="cellule_basdroite">PC</th>
    <th width="100" colspan="3" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm LEFT OUTER JOIN minis_pays p ON fm.pays = p.id LEFT OUTER JOIN minis_ville v ON fm.ville = v.id ORDER BY p.nom, v.nom";

$nb = mysql_num_rows(mysql_query($query));
$query .= " LIMIT ".($page*50).",50";

$exec = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['pays'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['ville'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['soustitre'])?></td>
    <td class="cellule_basdroite"><a href="admin.php?action=tarif_minis&fiche=<?=$row[0]?>">Tarifs</a></td>
    <td class="cellule_basdroite"><?=$row['tarif_nbjour_min']?><br /><?=$row['tarif_nbjour_max']?></td>
	<td class="cellule_basdroite"><a href="admin.php?action=image_minisModif&id=<?=$row[0]?>&url_retour=<?=urlencode("admin.php?action=fiche_minis&page=".$page.$plus_link)?>"><img src="../adminImg/image.gif" width="25" border="0" /></a></td>
    <td class="cellule_basdroite"><a href="admin.php?action=fiche_minisModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=fiche_minis&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>