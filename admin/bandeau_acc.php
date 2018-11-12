<?
$table = "bandeau";
$action = "bandeau_acc";
$id = "id_bandeau";

/*****************************************************************
Gestion de l'ordre
*****************************************************************/
if(isset($_GET['option']) && $_GET['option'] == "page"){
	//sélection de la page que l'on déplace
	$query = "SELECT ordre FROM ".$table." WHERE ".$id." = '".addslashes($_GET['page'])."' AND site='4'";
	$exec = mysql_query($query) or die(mysql_error());
	$data = mysql_fetch_row($exec);
	$ordre = $data[0];
	
	//sélection de la page que l'on déplace
	$query_max = "SELECT MAX(ordre) FROM ".$table." WHERE site='4'";
	$exec_max = mysql_query($query_max) or die(mysql_error());
	$data_max = mysql_fetch_row($exec_max);
	$max = $data_max[0];
	
	//temporaire
	mysql_query("UPDATE ".$table." SET ordre = '".($max+1)."' WHERE ".$id." = '".addslashes($_GET['page'])."'") or die(mysql_error());
	
	//sélection de la page qui va s'échangée avec la page sélectionnée
	//et mise à jour de l'ordre de la page sélectionnée
	//et mise à jour de la page 2
	if($_GET["dir"] == "up"){
		$query = "SELECT ".$id." FROM ".$table." WHERE ordre < '".$ordre."' AND site='4' ORDER BY ordre DESC LIMIT 0,1";
		$exec = mysql_query($query) or die(mysql_error());
		$data = mysql_fetch_row($exec);
		$page2 = $data[0];
		
		//la page 2 prend l'ordre de la page sélectionnée
		mysql_query("UPDATE ".$table." SET ordre = '".$ordre."' WHERE ".$id." = '".$page2."'") or die(mysql_error());
		
		mysql_query("UPDATE ".$table." SET ordre = '".($ordre-1)."' WHERE ".$id." = '".addslashes($_GET['page'])."'") or die(mysql_error());
	}else{
		$query = "SELECT ".$id." FROM ".$table." WHERE ordre > '".$ordre."' AND site='4' ORDER BY ordre LIMIT 0,1";
		$exec = mysql_query($query) or die(mysql_error());
		$data = mysql_fetch_row($exec);
		$page2 = $data[0];
		
		//la page 2 prend l'ordre de la page sélectionnée
		mysql_query("UPDATE ".$table." SET ordre = '".$ordre."' WHERE ".$id." = '".$page2."'") or die(mysql_error());
		
		mysql_query("UPDATE ".$table." SET ordre = '".($ordre+1)."' WHERE ".$id." = '".addslashes($_GET['page'])."'") or die(mysql_error());
	}
	
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=".$action."';</script>";
	}
}

/*****************************************************************
Gestion de la publication
*****************************************************************/
if(isset($_GET['option']) && $_GET['option'] == "publication"){
	$exec = mysql_query("UPDATE ".$table." SET afficher = '".addslashes($_GET['value'])."' WHERE ".$id." = '".addslashes($_GET['page'])."'");
	
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=".$action."';</script>";
	}
	exit();
}

?>

<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce bandeau ?")) {
  document.location.href='bandeau-sup.php?n='+id;
 }
}
</script>

<?
$j=0;

$query = "SELECT * FROM bandeau WHERE site='4' ORDER BY ordre";
//echo $query;
$exec = mysql_query($query) or die(mysql_error());
$nb = mysql_num_rows(mysql_query($query));

?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Bandeaux</td><td align="right">
    <? if($nb>4){?>
    <a href="admin.php?action=bandeau_accAjouter" style="color:#FFFFFF">Ajouter un bandeau</a>
    <? }?>
    </td></tr>
	<tr>
		<td colspan="2">
<br />

<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Image</th>
    <th class="cellule_basdroite">Afficher</th>
	<th>Ordre</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>

<? while($row = mysql_fetch_array($exec)){
	$j++;
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite">
    <? if(file_exists("../imagesUp/bandeaux/".$row["id_bandeau"]."_c.jpg")){?>
    <img src="../imagesUp/bandeaux/<?=$row["id_bandeau"]?>_c.jpg" width="300" alt="<?=stripslashes($row['nom'])?>" />
    <? }?>
    </td>
	<td class="cellule_basdroite"><a href="admin.php?action=<?=$_GET['action']?>&option=publication&page=<?=$row['id_bandeau']?>&value=<?=(($row["afficher"] == "1") ? "0" : "1")?>&url_retour=<?=urlencode(basename($_SERVER['REQUEST_URI']))?>"><img src="../adminImg/<?=(($row["afficher"] == "1") ? "true" : "false")?>.gif" border="0" /></a></td>
    <td class="cellule_basdroite">
	<?
	if($j != 1){
		echo '<a href="admin.php?action='.$_GET['action'].'&option=page&page='.$row["id_bandeau"].'&dir=up&site='.$row["site"].'&url_retour='.urlencode(basename($_SERVER['REQUEST_URI'])).'"><img src="../adminImg/fleche_haut.gif" border="0" /></a>';
	}
	if($j != $nb){
		echo '<a href="admin.php?action='.$_GET['action'].'&option=page&page='.$row["id_bandeau"].'&dir=down&site='.$row["site"].'&url_retour='.urlencode(basename($_SERVER['REQUEST_URI'])).'"><img src="../adminImg/fleche_bas.gif" border="0" /></a>';
	}
    ?>
    </td>
	<td class="cellule_basdroite"><a href="admin.php?action=bandeau_accModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>