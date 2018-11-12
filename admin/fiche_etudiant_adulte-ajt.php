<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Fiche étudiant/adulte - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['pays'])){
	$nom = $_POST['nom'];
	$pays = $_POST['pays'];
	$devise = $_POST['devise'];
	$ville = $_POST['ville'];
	$description = $_POST['description'];
	$age_mini2 = $_POST['age_mini2'];
	$age_mini = $_POST['age_mini'];
	$les_activites = $_POST['les_activites'];
	$wifi = $_POST['wifi'];
	$video = $_POST['video'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$fermeture_centre = $_POST['fermeture_centre'];
	$langue = $_POST['langue'];
	
	$formule = $_POST['formule'];
	$hebergement = $_POST['hebergement'];
	$examen = $_POST['examen'];
	$accreditation = $_POST['accreditation'];
	
	$enseignement_nom1 = $_POST['enseignement_nom1']; $enseignement_texte1 = $_POST['enseignement_texte1'];
	$enseignement_nom2 = $_POST['enseignement_nom2']; $enseignement_texte2 = $_POST['enseignement_texte2'];
	$enseignement_nom3 = $_POST['enseignement_nom3']; $enseignement_texte3 = $_POST['enseignement_texte3'];
	$enseignement_nom4 = $_POST['enseignement_nom4']; $enseignement_texte4 = $_POST['enseignement_texte4'];
	$enseignement_nom5 = $_POST['enseignement_nom5']; $enseignement_texte5 = $_POST['enseignement_texte5'];
	$enseignement_nom6 = $_POST['enseignement_nom6']; $enseignement_texte6 = $_POST['enseignement_texte6'];
	$enseignement_nom7 = $_POST['enseignement_nom7']; $enseignement_texte7 = $_POST['enseignement_texte7'];
	$enseignement_nom8 = $_POST['enseignement_nom8']; $enseignement_texte8 = $_POST['enseignement_texte8'];
	
	$job_nom1 = $_POST['job_nom1']; $job_texte1 = $_POST['job_texte1'];
	$job_nom2 = $_POST['job_nom2']; $job_texte2 = $_POST['job_texte2'];
	$job_nom3 = $_POST['job_nom3']; $job_texte3 = $_POST['job_texte3'];
	$job_nom4 = $_POST['job_nom4']; $job_texte4 = $_POST['job_texte4'];
	$job_nom5 = $_POST['job_nom5']; $job_texte5 = $_POST['job_texte5'];
	
	$hebergement_nom1 = $_POST['hebergement_nom1']; $hebergement_texte1 = $_POST['hebergement_texte1'];$hebergement_prix1 = $_POST['hebergement_prix1'];
	$hebergement_nom2 = $_POST['hebergement_nom2']; $hebergement_texte2 = $_POST['hebergement_texte2'];$hebergement_prix2 = $_POST['hebergement_prix2'];
	$hebergement_nom3 = $_POST['hebergement_nom3']; $hebergement_texte3 = $_POST['hebergement_texte3'];$hebergement_prix3 = $_POST['hebergement_prix3'];
	$hebergement_nom4 = $_POST['hebergement_nom4']; $hebergement_texte4 = $_POST['hebergement_texte4'];
	$hebergement_nom5 = $_POST['hebergement_nom5']; $hebergement_texte5 = $_POST['hebergement_texte5'];
	
	$point_fort1 = $_POST['point_fort1'];
	$point_fort2 = $_POST['point_fort2'];
	$point_fort3 = $_POST['point_fort3'];
	$point_fort4 = $_POST['point_fort4'];
	$point_fort5 = $_POST['point_fort5'];
	
	$lib_tarif_1 = $_POST['lib_tarif_1'];
	$lib_tarif_2 = $_POST['lib_tarif_2'];
	$lib_tarif_3 = $_POST['lib_tarif_3'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_etudiant_adulte SET nom='".addslashes($nom)."', pays='".addslashes($pays)."',devise='".addslashes($devise)."', ville='".addslashes($ville)."', description='".addslashes($description)."', age_mini2='".addslashes($age_mini2)."', age_mini='".addslashes($age_mini)."', les_activites='".addslashes($les_activites)."', wifi='".addslashes($wifi)."', video='".addslashes($video)."', fermeture_centre='".addslashes($fermeture_centre)."', enseignement_nom1='".addslashes($enseignement_nom1)."', enseignement_texte1='".addslashes($enseignement_texte1)."', enseignement_nom2='".addslashes($enseignement_nom2)."', enseignement_texte2='".addslashes($enseignement_texte2)."', enseignement_nom3='".addslashes($enseignement_nom3)."', enseignement_texte3='".addslashes($enseignement_texte3)."', enseignement_nom4='".addslashes($enseignement_nom4)."', enseignement_texte4='".addslashes($enseignement_texte4)."', enseignement_nom5='".addslashes($enseignement_nom5)."', enseignement_texte5='".addslashes($enseignement_texte5)."', enseignement_nom6='".addslashes($enseignement_nom6)."', enseignement_texte6='".addslashes($enseignement_texte6)."', enseignement_nom7='".addslashes($enseignement_nom7)."', enseignement_texte7='".addslashes($enseignement_texte7)."', enseignement_nom8='".addslashes($enseignement_nom8)."', enseignement_texte8='".addslashes($enseignement_texte8)."', job_nom1='".addslashes($job_nom1)."', job_texte1='".addslashes($job_texte1)."', job_nom2='".addslashes($job_nom2)."', job_texte2='".addslashes($job_texte2)."', job_nom3='".addslashes($job_nom3)."', job_texte3='".addslashes($job_texte3)."', job_nom4='".addslashes($job_nom4)."', job_texte4='".addslashes($job_texte4)."', job_nom5='".addslashes($job_nom5)."', job_texte5='".addslashes($job_texte5)."', hebergement_nom1='".addslashes($hebergement_nom1)."', hebergement_texte1='".addslashes($hebergement_texte1)."',hebergement_prix1='".addslashes($hebergement_prix1)."', hebergement_nom2='".addslashes($hebergement_nom2)."', hebergement_texte2='".addslashes($hebergement_texte2)."',hebergement_prix2='".addslashes($hebergement_prix2)."', hebergement_nom3='".addslashes($hebergement_nom3)."', hebergement_texte3='".addslashes($hebergement_texte3)."',hebergement_prix3='".addslashes($hebergement_prix3)."', hebergement_nom4='".addslashes($hebergement_nom4)."', hebergement_texte4='".addslashes($hebergement_texte4)."', hebergement_nom5='".addslashes($hebergement_nom5)."', hebergement_texte5='".addslashes($hebergement_texte5)."', point_fort1='".addslashes($point_fort1)."', point_fort2='".addslashes($point_fort2)."', point_fort3='".addslashes($point_fort3)."', point_fort4='".addslashes($point_fort4)."', point_fort5='".addslashes($point_fort5)."', langue='".addslashes($langue)."', lib_tarif_1='".addslashes($lib_tarif_1)."', lib_tarif_2='".addslashes($lib_tarif_2)."', lib_tarif_3='".addslashes($lib_tarif_3)."',lat='".addslashes($lat)."',lng='".addslashes($lng)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_etudiant_adulte (nom, pays,devise, ville, description, age_mini2, age_mini, les_activites, wifi ,video ,lat ,lng ,fermeture_centre, enseignement_nom1, enseignement_texte1, enseignement_nom2, enseignement_texte2, enseignement_nom3, enseignement_texte3, enseignement_nom4, enseignement_texte4, enseignement_nom5, enseignement_texte5, enseignement_nom6, enseignement_texte6, enseignement_nom7, enseignement_texte7, enseignement_nom8, enseignement_texte8, job_nom1, job_texte1, job_nom2, job_texte2, job_nom3, job_texte3, job_nom4, job_texte4, job_nom5, job_texte5, hebergement_nom1, hebergement_texte1,hebergement_prix1, hebergement_nom2, hebergement_texte2,hebergement_prix2, hebergement_nom3, hebergement_texte3,hebergement_prix3, hebergement_nom4, hebergement_texte4, hebergement_nom5, hebergement_texte5, point_fort1, point_fort2, point_fort3, point_fort4, point_fort5, langue, lib_tarif_1, lib_tarif_2, lib_tarif_3) VALUES ('".addslashes($nom)."', '".addslashes($pays)."','".addslashes($devise)."', '".addslashes($ville)."', '".addslashes($description)."', '".addslashes($age_mini2)."', '".addslashes($age_mini)."', '".addslashes($les_activites)."', '".addslashes($wifi)."', '".addslashes($video)."','".addslashes($lat)."','".addslashes($lng)."','".addslashes($fermeture_centre)."', '".addslashes($enseignement_nom1)."', '".addslashes($enseignement_texte1)."', '".addslashes($enseignement_nom2)."', '".addslashes($enseignement_texte2)."', '".addslashes($enseignement_nom3)."', '".addslashes($enseignement_texte3)."', '".addslashes($enseignement_nom4)."', '".addslashes($enseignement_texte4)."', '".addslashes($enseignement_nom5)."', '".addslashes($enseignement_texte5)."', '".addslashes($enseignement_nom6)."', '".addslashes($enseignement_texte6)."', '".addslashes($enseignement_nom7)."', '".addslashes($enseignement_texte7)."', '".addslashes($enseignement_nom8)."', '".addslashes($enseignement_texte8)."', '".addslashes($job_nom1)."', '".addslashes($job_texte1)."', '".addslashes($job_nom2)."', '".addslashes($job_texte2)."', '".addslashes($job_nom3)."', '".addslashes($job_texte3)."', '".addslashes($job_nom4)."', '".addslashes($job_texte4)."', '".addslashes($job_nom5)."', '".addslashes($job_texte5)."', '".addslashes($hebergement_nom1)."', '".addslashes($hebergement_texte1)."', '".addslashes($hebergement_prix1)."','".addslashes($hebergement_nom2)."', '".addslashes($hebergement_texte2)."','".addslashes($hebergement_prix2)."', '".addslashes($hebergement_nom3)."', '".addslashes($hebergement_texte3)."','".addslashes($hebergement_prix3)."', '".addslashes($hebergement_nom4)."', '".addslashes($hebergement_texte4)."', '".addslashes($hebergement_nom5)."', '".addslashes($hebergement_texte5)."', '".addslashes($point_fort1)."', '".addslashes($point_fort2)."', '".addslashes($point_fort3)."', '".addslashes($point_fort4)."', '".addslashes($point_fort5)."', '".addslashes($langue)."', '".addslashes($lib_tarif_1)."', '".addslashes($lib_tarif_2)."', '".addslashes($lib_tarif_3)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	$query = "DELETE FROM fiche_etudiant_adulte_formule WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($formule) ; $i++){
		$query = "INSERT INTO fiche_etudiant_adulte_formule VALUES ('".addslashes($_GET['id'])."', '".addslashes($formule[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_etudiant_adulte_examen WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($examen) ; $i++){
		$query = "INSERT INTO fiche_etudiant_adulte_examen VALUES ('".addslashes($_GET['id'])."', '".addslashes($examen[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_etudiant_adulte_hebergement WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($hebergement) ; $i++){
		$query = "INSERT INTO fiche_etudiant_adulte_hebergement VALUES ('".addslashes($_GET['id'])."', '".addslashes($hebergement[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_etudiant_adulte_accreditation WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($accreditation) ; $i++){
		$query = "INSERT INTO fiche_etudiant_adulte_accreditation VALUES ('".addslashes($_GET['id'])."', '".addslashes($accreditation[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			move_uploaded_file($_FILES['img']['tmp_name'], "../imagesUp/fiche_etudiant/".$id."-gen.".$extension);
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=fiche_etudiant_adulte';</script>";
}else{ 
	$id = "";
	$nom = "";
	$pays = "";
	$devise = "";
	$ville = "";
	$description = "";
	$age_mini2 = "";
	$age_mini = "18";
	$les_activites = "";
	$wifi = "1";
	$video = "";
	$lat = "";
	$lng = "";
	$fermeture_centre = "";
	$langue = "";
	
	//$enseignement_nom1 = ""; $enseignement_texte1 = "- Leçons : 15, 20, ou 25 leçons par semaine\n- Durée des cours : 1 à 12 semaines\n- Niveaux : débutant avancé\n- Effectif par classe : 16 étudiants maximum";
	$enseignement_nom1 = ""; $enseignement_texte1 = "";
	$enseignement_nom2 = ""; $enseignement_texte2 = "";
	$enseignement_nom3 = ""; $enseignement_texte3 = "";
	$enseignement_nom4 = ""; $enseignement_texte4 = "";
	$enseignement_nom5 = ""; $enseignement_texte5 = "";
	$enseignement_nom6 = ""; $enseignement_texte6 = "";
	$enseignement_nom7 = ""; $enseignement_texte7 = "";
	$enseignement_nom8 = ""; $enseignement_texte8 = "";
	
	//$job_nom1 = ""; $job_texte1 = "- Durée des cours : 1 semaine minimum de cours\n- Durée du stage : 2 semaines minimum\n- Niveaux : intermédiaire à avancé\n- Effectif par classe : 1 étudiant maximum";
	$job_nom1 = ""; $job_texte1 = "";
	$job_nom2 = ""; $job_texte2 = "";
	$job_nom3 = ""; $job_texte3 = "";
	$job_nom4 = ""; $job_texte4 = "";
	$job_nom5 = ""; $job_texte5 = "";
	
	//$hebergement_nom1 = ""; $hebergement_texte1 = "- Type de chambre : individuelle\n- Repas durant le séjour : petit-déjeuner ou demi-pension\n- Situation : de 30 à 50 minutes du centre du cour.";
	$hebergement_nom1 = ""; $hebergement_texte1 = ""; $hebergement_prix1 = "";
	$hebergement_nom2 = ""; $hebergement_texte2 = ""; $hebergement_prix2 = "";
	$hebergement_nom3 = ""; $hebergement_texte3 = ""; $hebergement_prix3 = "";
	$hebergement_nom4 = ""; $hebergement_texte4 = "";
	$hebergement_nom5 = ""; $hebergement_texte5 = "";
	
	$point_fort1 = "";
	$point_fort2 = "";
	$point_fort3 = "";
	$point_fort4 = "";
	$point_fort5 = "";
	
	$lib_tarif_1 = "";
	$lib_tarif_2 = "";
	$lib_tarif_3 = "";
	
	$formule = array();
	$hebergement = array();
	$examen = array();
	$accreditation = array();
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_etudiant_adulte WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = stripslashes($row['nom']);
		$pays = stripslashes($row['pays']);
		$devise = stripslashes($row['devise']);
		$ville = stripslashes($row['ville']);
		$description = stripslashes($row['description']);
		$age_mini2 = stripslashes($row['age_mini2']);
		$age_mini = stripslashes($row['age_mini']);
		$les_activites = stripslashes($row['les_activites']);
		$wifi = stripslashes($row['wifi']);
		$video = stripslashes($row['video']);
		$lat = $row['lat'];
		$lng = $row['lng'];
		$fermeture_centre = stripslashes($row['fermeture_centre']);
		$langue = stripslashes($row['langue']);
		
		$enseignement_nom1 = stripslashes($row['enseignement_nom1']); $enseignement_texte1 = stripslashes($row['enseignement_texte1']);
		$enseignement_nom2 = stripslashes($row['enseignement_nom2']); $enseignement_texte2 = stripslashes($row['enseignement_texte2']);
		$enseignement_nom3 = stripslashes($row['enseignement_nom3']); $enseignement_texte3 = stripslashes($row['enseignement_texte3']);
		$enseignement_nom4 = stripslashes($row['enseignement_nom4']); $enseignement_texte4 = stripslashes($row['enseignement_texte4']);
		$enseignement_nom5 = stripslashes($row['enseignement_nom5']); $enseignement_texte5 = stripslashes($row['enseignement_texte5']);
		$enseignement_nom6 = stripslashes($row['enseignement_nom6']); $enseignement_texte6 = stripslashes($row['enseignement_texte6']);
		$enseignement_nom7 = stripslashes($row['enseignement_nom7']); $enseignement_texte7 = stripslashes($row['enseignement_texte7']);
		$enseignement_nom8 = stripslashes($row['enseignement_nom8']); $enseignement_texte8 = stripslashes($row['enseignement_texte8']);
		
		$job_nom1 = stripslashes($row['job_nom1']); $job_texte1 = stripslashes($row['job_texte1']);
		$job_nom2 = stripslashes($row['job_nom2']); $job_texte2 = stripslashes($row['job_texte2']);
		$job_nom3 = stripslashes($row['job_nom3']); $job_texte3 = stripslashes($row['job_texte3']);
		$job_nom4 = stripslashes($row['job_nom4']); $job_texte4 = stripslashes($row['job_texte4']);
		$job_nom5 = stripslashes($row['job_nom5']); $job_texte5 = stripslashes($row['job_texte5']);
		
		$hebergement_nom1 = stripslashes($row['hebergement_nom1']); $hebergement_texte1 = stripslashes($row['hebergement_texte1']);$hebergement_prix1 = stripslashes($row['hebergement_prix1']);
		$hebergement_nom2 = stripslashes($row['hebergement_nom2']); $hebergement_texte2 = stripslashes($row['hebergement_texte2']);$hebergement_prix2 = stripslashes($row['hebergement_prix2']);
		$hebergement_nom3 = stripslashes($row['hebergement_nom3']); $hebergement_texte3 = stripslashes($row['hebergement_texte3']);$hebergement_prix3 = stripslashes($row['hebergement_prix3']);
		$hebergement_nom4 = stripslashes($row['hebergement_nom4']); $hebergement_texte4 = stripslashes($row['hebergement_texte4']);
		$hebergement_nom5 = stripslashes($row['hebergement_nom5']); $hebergement_texte5 = stripslashes($row['hebergement_texte5']);
		
		$point_fort1 = stripslashes($row['point_fort1']);
		$point_fort2 = stripslashes($row['point_fort2']);
		$point_fort3 = stripslashes($row['point_fort3']);
		$point_fort4 = stripslashes($row['point_fort4']);
		$point_fort5 = stripslashes($row['point_fort5']);
		
		$lib_tarif_1 = stripslashes($row['lib_tarif_1']);
		$lib_tarif_2 = stripslashes($row['lib_tarif_2']);
		$lib_tarif_3 = stripslashes($row['lib_tarif_3']);
		
		$query2 = "SELECT * FROM fiche_etudiant_adulte_formule WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$formule[$i] = $data2['formule'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_etudiant_adulte_hebergement WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$hebergement[$i] = $data2['hebergement'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_etudiant_adulte_examen WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$examen[$i] = $data2['examen'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_etudiant_adulte_accreditation WHERE fiche_etudiant_adulte = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$accreditation[$i] = $data2['accreditation'];
			$i++;
		}
	}
}
?>

<table width="100%"><tr><td align="center" valign="middle"><?=(file_exists("../imagesUp/fiche_etudiant/".$id."-gen.jpg") ? "<img src='../imagesUp/fiche_etudiant/".$id."-gen.jpg' /><br /><a href='#' onclick='if(confirm(\"Voulez vous supprimer cette photo ?\")) document.location.href=\"fiche_etudiant_adulte-supp_photo.php?f=".$id."-gen\";'>supprimer ?</a>" : "")?></td></tr></table><br />

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>
<TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
<TR><TD align=right>Pays :</TD><TD><select name="pays"><option value="- - -"></option>
<?
$query = "SELECT * FROM pays ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $pays)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select>&nbsp;Devise:
<select name="devise"><option value="- - -"></option>
<?
$query = "SELECT * FROM devise";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $devise)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select>
</TD>


</TR>
<TR><TD align=right>Ville :</TD><TD><select name="ville"><option value="- - -"></option>
<?
$query = "SELECT * FROM ville ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $ville)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="50" rows="8"><?=$description?></textarea></TD></TR>
<tr><td colspan="2"><table border="0" width="100%" align="center">
<TR><TD align=right valign="top">Formules&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="formule[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM formule ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($formule) ; $i++){
      if($data["id"] == $formule[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD><td width="20"></td><TD align=right valign="top">Examens&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="examen[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM examen ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($examen) ; $i++){
      if($data["id"] == $examen[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right valign="top">Hébergements&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="hebergement[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM hebergement ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($hebergement) ; $i++){
      if($data["id"] == $hebergement[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD><td width="20"></td><TD align=right valign="top">Accréditations&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="accreditation[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM accreditation ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($accreditation) ; $i++){
      if($data["id"] == $accreditation[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
</table></td></tr>
<TR><TD align=right>Age minimum :</TD><TD><INPUT TYPE="checkbox" name="age_mini2" value="1" <?=(($age_mini2 == "1") ? " checked" : "")?>> <INPUT TYPE="text" size="2" name="age_mini" maxlength="5" value="<?=$age_mini?>"> ans</TD></TR>
<TR><TD align=right valign="top">Les activités :</TD><TD><textarea name="les_activites" cols="50" rows="6"><?=$les_activites?></textarea></TD></TR>
<TR><TD align=right>Wifi :</TD><TD><input type="radio" name="wifi" value="1" <?=(($wifi=="1") ? " checked" : "")?> /> oui <input type="radio" name="wifi" value="0" <?=(($wifi=="0") ? " checked" : "")?> /> non</TD></TR>
<TR><TD align=right>video :</TD><TD><INPUT TYPE="text" size="50" name="video" maxlength="200" value="<?=$video?>"></TD></TR>
<TR><TD align=right>Latitude :</TD><TD><INPUT TYPE="text" size="20" name="lat" maxlength="20" value="<?=$lat?>"></TD></TR>
   <TR><TD align=right>Longitude :</TD><TD><INPUT TYPE="text" size="20" name="lng" maxlength="20" value="<?=$lng?>"></TD></TR>
<TR><TD align=right valign="top">Fermeture centre :</TD><TD><textarea name="fermeture_centre" cols="40" rows="4"><?=$fermeture_centre?></textarea></TD></TR>
<TR><TD align=right>Langues&nbsp;:</TD><TD><select name="langue"><option value="">- - -</option>
<?
$query = "SELECT * FROM langue ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $langue){
      echo " selected";
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Libellé tarif 1 :</TD><TD><INPUT TYPE="text" size="50" name="lib_tarif_1" maxlength="250" value="<?=$lib_tarif_1?>"></TD></TR>
<TR><TD align=right>Libellé tarif 2 :</TD><TD><INPUT TYPE="text" size="50" name="lib_tarif_2" maxlength="250" value="<?=$lib_tarif_2?>"></TD></TR>
<TR><TD align=right>Libellé tarif 3 :</TD><TD><INPUT TYPE="text" size="50" name="lib_tarif_3" maxlength="250" value="<?=$lib_tarif_3?>"></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Point fort 1 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort1" maxlength="250" value="<?=$point_fort1?>"></TD></TR>
<TR><TD align=right>Point fort 2 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort2" maxlength="250" value="<?=$point_fort2?>"></TD></TR>
<TR><TD align=right>Point fort 3 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort3" maxlength="250" value="<?=$point_fort3?>"></TD></TR>
<TR><TD align=right>Point fort 4 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort4" maxlength="250" value="<?=$point_fort4?>"></TD></TR>
<TR><TD align=right>Point fort 5 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort5" maxlength="250" value="<?=$point_fort5?>"></TD></TR>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table align="center" border="0" style="border-style:solid; border-color:#666666; border-width:1px;">
<tr><th colspan="3">Enseignement</th></tr>
<tr><th>Num</th><th>Nom</th><th>Description</th></tr>
<tr align="center"><td>1</td><td><INPUT TYPE="text" size="20" name="enseignement_nom1" maxlength="255" value="<?=$enseignement_nom1?>"></td><td><textarea name="enseignement_texte1" cols="40" rows="4"><?=$enseignement_texte1?></textarea></td></tr>
<tr align="center"><td>2</td><td><INPUT TYPE="text" size="20" name="enseignement_nom2" maxlength="255" value="<?=$enseignement_nom2?>"></td><td><textarea name="enseignement_texte2" cols="40" rows="4"><?=$enseignement_texte2?></textarea></td></tr>
<tr align="center"><td>3</td><td><INPUT TYPE="text" size="20" name="enseignement_nom3" maxlength="255" value="<?=$enseignement_nom3?>"></td><td><textarea name="enseignement_texte3" cols="40" rows="4"><?=$enseignement_texte3?></textarea></td></tr>
<tr align="center"><td>4</td><td><INPUT TYPE="text" size="20" name="enseignement_nom4" maxlength="255" value="<?=$enseignement_nom4?>"></td><td><textarea name="enseignement_texte4" cols="40" rows="4"><?=$enseignement_texte4?></textarea></td></tr>
<tr align="center"><td>5</td><td><INPUT TYPE="text" size="20" name="enseignement_nom5" maxlength="255" value="<?=$enseignement_nom5?>"></td><td><textarea name="enseignement_texte5" cols="40" rows="4"><?=$enseignement_texte5?></textarea></td></tr>
<tr align="center"><td>6</td><td><INPUT TYPE="text" size="20" name="enseignement_nom6" maxlength="255" value="<?=$enseignement_nom6?>"></td><td><textarea name="enseignement_texte6" cols="40" rows="4"><?=$enseignement_texte6?></textarea></td></tr>
<tr align="center"><td>7</td><td><INPUT TYPE="text" size="20" name="enseignement_nom7" maxlength="255" value="<?=$enseignement_nom7?>"></td><td><textarea name="enseignement_texte7" cols="40" rows="4"><?=$enseignement_texte7?></textarea></td></tr>
<tr align="center"><td>8</td><td><INPUT TYPE="text" size="20" name="enseignement_nom8" maxlength="255" value="<?=$enseignement_nom8?>"></td><td><textarea name="enseignement_texte8" cols="40" rows="4"><?=$enseignement_texte8?></textarea></td></tr>
</table></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table align="center" border="0" style="border-style:solid; border-color:#666666; border-width:1px;">
<tr><th colspan="3">Jobs / stages</th></tr>
<tr><th>Num</th><th>Nom</th><th>Description</th></tr>
<tr align="center"><td>1</td><td><INPUT TYPE="text" size="20" name="job_nom1" maxlength="255" value="<?=$job_nom1?>"></td><td><textarea name="job_texte1" cols="40" rows="4"><?=$job_texte1?></textarea></td></tr>
<tr align="center"><td>2</td><td><INPUT TYPE="text" size="20" name="job_nom2" maxlength="255" value="<?=$job_nom2?>"></td><td><textarea name="job_texte2" cols="40" rows="4"><?=$job_texte2?></textarea></td></tr>
<tr align="center"><td>3</td><td><INPUT TYPE="text" size="20" name="job_nom3" maxlength="255" value="<?=$job_nom3?>"></td><td><textarea name="job_texte3" cols="40" rows="4"><?=$job_texte3?></textarea></td></tr>
<tr align="center"><td>4</td><td><INPUT TYPE="text" size="20" name="job_nom4" maxlength="255" value="<?=$job_nom4?>"></td><td><textarea name="job_texte4" cols="40" rows="4"><?=$job_texte4?></textarea></td></tr>
<tr align="center"><td>5</td><td><INPUT TYPE="text" size="20" name="job_nom5" maxlength="255" value="<?=$job_nom5?>"></td><td><textarea name="job_texte5" cols="40" rows="4"><?=$job_texte5?></textarea></td></tr>
</table></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table align="center" border="0" style="border-style:solid; border-color:#666666; border-width:1px;">
<tr><th colspan="3">Hébergements</th></tr>
<tr><th>Num</th><th>Nom</th><th>Description</th></tr>
<tr align="center"><td>1</td><td><INPUT TYPE="text" size="20" name="hebergement_nom1" maxlength="255" value="<?=$hebergement_nom1?>"><br>prix <INPUT TYPE="text" size="5" name="hebergement_prix1" maxlength="5" value="<?=$hebergement_prix1?>"></td><td><textarea name="hebergement_texte1" cols="40" rows="4"><?=$hebergement_texte1?></textarea></td></tr>
<tr align="center"><td>2</td><td><INPUT TYPE="text" size="20" name="hebergement_nom2" maxlength="255" value="<?=$hebergement_nom2?>"><br>prix <INPUT TYPE="text" size="5" name="hebergement_prix2" maxlength="5" value="<?=$hebergement_prix2?>"></td><td><textarea name="hebergement_texte2" cols="40" rows="4"><?=$hebergement_texte2?></textarea></td></tr>
<tr align="center"><td>3</td><td><INPUT TYPE="text" size="20" name="hebergement_nom3" maxlength="255" value="<?=$hebergement_nom3?>"><br>prix <INPUT TYPE="text" size="5" name="hebergement_prix3" maxlength="5" value="<?=$hebergement_prix3?>"></td><td><textarea name="hebergement_texte3" cols="40" rows="4"><?=$hebergement_texte3?></textarea></td></tr>
<tr align="center"><td>4</td><td><INPUT TYPE="text" size="20" name="hebergement_nom4" maxlength="255" value="<?=$hebergement_nom4?>"></td><td><textarea name="hebergement_texte4" cols="40" rows="4"><?=$hebergement_texte4?></textarea></td></tr>
<tr align="center"><td>5</td><td><INPUT TYPE="text" size="20" name="hebergement_nom5" maxlength="255" value="<?=$hebergement_nom5?>"></td><td><textarea name="hebergement_texte5" cols="40" rows="4"><?=$hebergement_texte5?></textarea></td></tr>
</table></td></tr>
<TR><TD align="right">Image : </TD><TD><input type="file" name="img" /> jpg 550*80 px</TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
</TABLE>
</form>


		</td>
	</tr>
</table><br>