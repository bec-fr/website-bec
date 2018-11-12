<?
if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
	if($site == "etudiant"){
		$query2 = "SELECT fea.* FROM fiche_etudiant_adulte fea WHERE fea.id = '".addslashes($_GET["fiche"])."'";
	}elseif($site == "minis"){
		$query2 = "SELECT fm.* FROM fiche_minis fm WHERE fm.id = '".addslashes($_GET["fiche"])."'";
	}elseif($site == "junior"){
		$query2 = "SELECT fj.* FROM fiche_junior fj WHERE fj.id = '".addslashes($_GET["fiche"])."'";
	}
	//echo $query2;
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	?>
    <table border="0" align="center" width="100%">
    <?
	for($i=0 ; $i<10 ; $i++){
		if($i%2 == 0){
			?><tr><?
		}
		if(file_exists("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1)."_m.jpg")){
			$size = getimagesize("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1)."_m.jpg");
			  $width = $size[0];
			  $height = $size[1];
			  ?>
			  <td align="center" bgcolor="#EEEEEE" style="border:#CCC 1px solid">
			  <a href="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>.jpg" title="<?=stripslashes($data2["img_leg".($i+1)])?>" rel="prettyPhoto[gallery]">
			  <?
			  if($height > $width){
				  ?><img src="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>_m.jpg" height="70" border="0" alt="" style="border:#000 1px solid" /><?
			  }else{
				  ?><img src="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>_m.jpg" width="70" border="0" alt="" style="border:#000 1px solid" /><?
			  }
			  ?>
			  </a>
			  </td>
			<?
		}
		if(($i+1)%2 == 0){
			?></tr><?
		}
	}
	?>
    </table>
    <?
}
?>

<br />