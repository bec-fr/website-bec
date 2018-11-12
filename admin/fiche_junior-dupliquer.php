<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();

if(isset($_GET['n'])) {
	connexion();
	
	$id_fiche = $_GET['n'];
	
	$query = "INSERT INTO fiche_junior (nom, pays, ville, description, rappel_formule, prix_tout_compris, prix_non_compris, langue, point_fort1, point_fort2, point_fort3, point_fort4, point_fort5, niveau,video, dates, tarif, option_nom1, option_texte1, option_nom2, option_texte2, option_nom3, option_texte3, option_nom4, option_texte4, option_nom5, option_texte5, hebergement_nom1, hebergement_texte1, hebergement_nom2, hebergement_texte2, hebergement_nom3, hebergement_texte3, hebergement_nom4, hebergement_texte4, hebergement_nom5, hebergement_texte5, ville_devis, img_leg1, img_leg2, img_leg3, img_leg4, img_leg5, img_leg6, img_leg7, img_leg8, img_leg9, img_leg10, transport, infos_utiles, option_type1, option_type2, option_type3, option_type4, option_type5, preacheminement_train, preacheminement_avion, afficher, avion, avion_tarif, option_prix1, option_prix2, option_prix3, option_prix4, option_prix5, cours) SELECT nom, pays, ville, description, rappel_formule, prix_tout_compris, prix_non_compris, langue, point_fort1, point_fort2, point_fort3, point_fort4, point_fort5, niveau,video, dates, tarif, option_nom1, option_texte1, option_nom2, option_texte2, option_nom3, option_texte3, option_nom4, option_texte4, option_nom5, option_texte5, hebergement_nom1, hebergement_texte1, hebergement_nom2, hebergement_texte2, hebergement_nom3, hebergement_texte3, hebergement_nom4, hebergement_texte4, hebergement_nom5, hebergement_texte5, ville_devis, img_leg1, img_leg2, img_leg3, img_leg4, img_leg5, img_leg6, img_leg7, img_leg8, img_leg9, img_leg10, transport, infos_utiles, option_type1, option_type2, option_type3, option_type4, option_type5, preacheminement_train, preacheminement_avion, afficher, avion, avion_tarif, option_prix1, option_prix2, option_prix3, option_prix4, option_prix5, cours FROM fiche_junior WHERE id = '".addslashes($id_fiche)."'";
	//echo $query."<br>";
	
	if(mysql_query($query)){
		$id = mysql_insert_id();
		
		$query2 = "INSERT INTO fiche_junior_formule (fiche_junior, formule) SELECT '".$id."', formule FROM fiche_junior_formule WHERE fiche_junior = '".addslashes($id_fiche)."'";
		mysql_query($query2) or die(mysql_error());
		$query2 = "INSERT INTO fiche_junior_hebergement (fiche_junior, hebergement) SELECT '".$id."', hebergement FROM fiche_junior_hebergement WHERE fiche_junior = '".addslashes($id_fiche)."'";
		mysql_query($query2) or die(mysql_error());
		
		echo "<script>alert('Le produit a bien été dupliqué.');</script>";
	}else{
		echo "<script>alert('Une erreur est survenue lors de la duplication du produit.');</script>";
	}
}

if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){	
	echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
}else{
	echo "<script>document.location.href='admin.php?action=prod';</script>";
}
?>