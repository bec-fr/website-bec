<?
include('../inc/conf.php');
include('../inc/fonctions.php');
verif_session();
connexion();

if(isset($_GET["partie"]) && $_GET["partie"] == "etudiant_adulte"){
	$_SESSION["partie"] = "1";
}elseif(isset($_GET["partie"]) && $_GET["partie"] == "minis"){
	$_SESSION["partie"] = "2";
}elseif(isset($_GET["partie"]) && $_GET["partie"] == "junior"){
	$_SESSION["partie"] = "3";
}if(isset($_GET["partie"]) && $_GET["partie"] == "immersion_totale"){
	$_SESSION["partie"] = "4";
}else{
	if(!isset($_SESSION["partie"])){
		$_SESSION["partie"] = "1";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<script language="javascript" src="../inc/fonctions.js"></script>
<link type="text/css" href="font.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
</head>

<body style="margin-top:0px">

<table border="0" bgcolor="#FFFFFF" align="center" width="900px" cellpadding="0" cellspacing="0" style="border-width:1px; border-color:#FFFFFF; border-style:solid;">
<tr><td><img src="logo_administration.jpg" /></td></tr>
<tr height="500px" valign="top"><td colspan="3">

	<table>
    <tr valign="top">
    	<td width="180px">
        <br>
		<? include("menu.php"); ?>
        </td>
        <td width="750">
        <br>
		<?
		if(isset($_GET['action']))
		{
			switch($_GET['action'])
			{
				case "formuleAjouter" :
					include("formule-ajt.php");
					break;
				case "formuleModif" :
					include("formule-ajt.php");
					break;							
				case "formule" :
					include("formule.php");
					break;
				case "minis_formuleAjouter" :
					include("minis_formule-ajt.php");
					break;
				case "minis_formuleModif" :
					include("minis_formule-ajt.php");
					break;							
				case "minis_formule" :
					include("minis_formule.php");
					break;
				case "junior_formuleAjouter" :
					include("junior_formule-ajt.php");
					break;
				case "junior_formuleModif" :
					include("junior_formule-ajt.php");
					break;							
				case "junior_formule" :
					include("junior_formule.php");
					break;
				case "immersion_totale_formuleAjouter" :
					include("immersion_totale_formule-ajt.php");
					break;
				case "immersion_totale_formuleModif" :
					include("immersion_totale_formule-ajt.php");
					break;							
				case "immersion_totale_formule" :
					include("immersion_totale_formule.php");
					break;
				
				case "examenAjouter" :
					include("examen-ajt.php");
					break;
				case "examenModif" :
					include("examen-ajt.php");
					break;							
				case "examen" :
					include("examen.php");
					break;
				
				case "hebergementAjouter" :
					include("hebergement-ajt.php");
					break;
				case "hebergementModif" :
					include("hebergement-ajt.php");
					break;							
				case "hebergement" :
					include("hebergement.php");
					break;
				case "junior_hebergementAjouter" :
					include("junior_hebergement-ajt.php");
					break;
				case "junior_hebergementModif" :
					include("junior_hebergement-ajt.php");
					break;							
				case "junior_hebergement" :
					include("junior_hebergement.php");
					break;
				case "minis_hebergementAjouter" :
					include("minis_hebergement-ajt.php");
					break;
				case "minis_hebergementModif" :
					include("minis_hebergement-ajt.php");
					break;							
				case "minis_hebergement" :
					include("minis_hebergement.php");
					break;
				
				case "accreditationAjouter" :
					include("accreditation-ajt.php");
					break;
				case "accreditationModif" :
					include("accreditation-ajt.php");
					break;							
				case "accreditation" :
					include("accreditation.php");
					break;
				
				case "paysAjouter" :
					include("pays-ajt.php");
					break;
				case "paysModif" :
					include("pays-ajt.php");
					break;							
				case "pays" :
					include("pays.php");
					break;
				case "minis_paysAjouter" :
					include("minis_pays-ajt.php");
					break;
				case "minis_paysModif" :
					include("minis_pays-ajt.php");
					break;							
				case "minis_pays" :
					include("minis_pays.php");
					break;
				case "junior_paysAjouter" :
					include("junior_pays-ajt.php");
					break;
				case "junior_paysModif" :
					include("junior_pays-ajt.php");
					break;							
				case "junior_pays" :
					include("junior_pays.php");
					break;
				case "immersion_totale_paysAjouter" :
					include("immersion_totale_pays-ajt.php");
					break;
				case "immersion_totale_paysModif" :
					include("immersion_totale_pays-ajt.php");
					break;
				case "immersion_totale_pays" :
					include("immersion_totale_pays.php");
					break;
				
				case "immersion_totale_catAjouter" :
					include("immersion_totale_cat-ajt.php");
					break;
				case "immersion_totale_catModif" :
					include("immersion_totale_cat-ajt.php");
					break;							
				case "immersion_totale_cat" :
					include("immersion_totale_cat.php");
					break;
				
				case "immersion_totale_cat2Ajouter" :
					include("immersion_totale_cat2-ajt.php");
					break;
				case "immersion_totale_cat2Modif" :
					include("immersion_totale_cat2-ajt.php");
					break;							
				case "immersion_totale_cat2" :
					include("immersion_totale_cat2.php");
					break;
				
				case "villeAjouter" :
					include("ville-ajt.php");
					break;
				case "villeModif" :
					include("ville-ajt.php");
					break;							
				case "ville" :
					include("ville.php");
					break;
				case "minis_villeAjouter" :
					include("minis_ville-ajt.php");
					break;
				case "minis_villeModif" :
					include("minis_ville-ajt.php");
					break;							
				case "minis_ville" :
					include("minis_ville.php");
					break;
				case "junior_villeAjouter" :
					include("junior_ville-ajt.php");
					break;
				case "junior_villeModif" :
					include("junior_ville-ajt.php");
					break;							
				case "junior_ville" :
					include("junior_ville.php");
					break;
				case "immersion_totale_villeAjouter" :
					include("immersion_totale_ville-ajt.php");
					break;
				case "immersion_totale_villeModif" :
					include("immersion_totale_ville-ajt.php");
					break;							
				case "immersion_totale_ville" :
					include("immersion_totale_ville.php");
					break;
				
				case "fiche_etudiant_adulteAjouter" :
					include("fiche_etudiant_adulte-ajt.php");
					break;
				case "fiche_etudiant_adulteModif" :
					include("fiche_etudiant_adulte-ajt.php");
					break;							
				case "fiche_etudiant_adulte" :
					include("fiche_etudiant_adulte.php");
					break;
				case "imageModif" :
					include("image.php");
					break;
				
				case "fiche_minisAjouter" :
					include("fiche_minis-ajt.php");
					break;
				case "fiche_minisModif" :
					include("fiche_minis-ajt.php");
					break;
				case "fiche_minis" :
					include("fiche_minis.php");
					break;
				case "image_minisModif" :
					include("image_minis.php");
					break;
				
				case "fiche_juniorAjouter" :
					include("fiche_junior-ajt.php");
					break;
				case "fiche_juniorModif" :
					include("fiche_junior-ajt.php");
					break;
				case "fiche_junior" :
					include("fiche_junior.php");
					break;
				case "image_juniorModif" :
					include("image_junior.php");
					break;
				case "programme_juniorModif" :
					include("programme_junior.php");
					break;
				case "junior_date" :
					include("junior_date.php");
					break;
				case "junior_dateAjouter" :
					include("junior_date-ajt.php");
					break;
				case "junior_dateModif" :
					include("junior_date-ajt.php");
					break;
				
				case "reservation_junior" :
					include("reservation_junior.php");
					break;
				case "reservation_juniorModif" :
					include("reservation_junior-mod.php");
					break;
				
				case "fiche_immersion_totaleAjouter" :
					include("fiche_immersion_totale-ajt.php");
					break;
				case "fiche_immersion_totaleModif" :
					include("fiche_immersion_totale-ajt.php");
					break;
				case "fiche_immersion_totale" :
					include("fiche_immersion_totale.php");
					break;
				case "image_immersion_totaleModif" :
					include("image_immersion_totale.php");
					break;
				case "programme_immersion_totaleModif" :
					include("programme_immersion_totale.php");
					break;
				
				case "newsletter" :
					include("newsletter.php");
					break;
				case "newsletterAjouter" :
					include("newsletter-ajt.php");
					break;
				case "newsletterModif" :
					include("newsletter-ajt.php");
					break;
				case "newsletterEnv" :
					include("newsletterEnv.php");
					break;
				case "newsletter_archive" :
					include("newsletter_archive.php");
					break;
				case "newsletter_archive_voir" :
					include("newsletter_archive_voir.php");
					break;
				case "newsletter_groupe" :
					include("newsletter_groupe.php");
					break;
				case "newsletter_groupeAjouter" :
					include("newsletter_groupe-ajt.php");
					break;
				case "newsletter_groupeModif" :
					include("newsletter_groupe-ajt.php");
					break;
				case "newsletter_importmail" :
					include("newsletter_importmail.php");
					break;
				
				case "tarifAjouter" :
					include("tarif-ajt.php");
					break;
				case "tarifModif" :
					include("tarif-ajt.php");
					break;
				case "tarif" :
					include("tarif.php");
					break;
				
				case "tarif_minis" :
					include("tarif_minis.php");
					break;
				
				case "supplementAjouter" :
					include("supplement-ajt.php");
					break;
				case "supplementModif" :
					include("supplement-ajt.php");
					break;							
				case "supplement" :
					include("supplement.php");
					break;
				
				case "faqAjouter" :
					include("faq-ajt.php");
					break;
				case "faqModif" :
					include("faq-ajt.php");
					break;
				case "faq" :
					include("faq.php");
					break;			
				
				
				case "devisAjouter" :
					include("devis-ajt.php");
					break;
				case "devisModif" :
					include("devis-ajt.php");
					break;
				case "devis" :
					include("devis.php");
					break;
				case "minis_devisAjouter" :
					include("minis_devis-ajt.php");
					break;
				case "minis_devisModif" :
					include("minis_devis-ajt.php");
					break;
				case "minis_devis" :
					include("minis_devis.php");
					break;
				case "junior_devisAjouter" :
					include("junior_devis-ajt.php");
					break;
				case "junior_devisModif" :
					include("junior_devis-ajt.php");
					break;
				case "junior_devis" :
					include("junior_devis.php");
					break;
				case "immersion_totale_devisAjouter" :
					include("immersion_totale_devis-ajt.php");
					break;
				case "immersion_totale_devisModif" :
					include("immersion_totale_devis-ajt.php");
					break;
				case "immersion_totale_devis" :
					include("immersion_totale_devis.php");
					break;
				
				case "brochureAjouter" :
					include("brochure-ajt.php");
					break;
				case "brochureModif" :
					include("brochure-ajt.php");
					break;
				case "brochure" :
					include("brochure.php");
					break;
				case "brochure_minisAjouter" :
					include("brochure_minis-ajt.php");
					break;
				case "brochure_minisModif" :
					include("brochure_minis-ajt.php");
					break;
				case "brochure_minis" :
					include("brochure_minis.php");
					break;
				
				case "junior_devis_villeAjouter" :
					include("junior_devis_ville-ajt.php");
					break;
				case "junior_devis_villeModif" :
					include("junior_devis_ville-ajt.php");
					break;							
				case "junior_devis_ville" :
					include("junior_devis_ville.php");
					break;
				
				case "junior_option_transportAjouter" :
					include("junior_option_transport-ajt.php");
					break;
				case "junior_option_transportModif" :
					include("junior_option_transport-ajt.php");
					break;							
				case "junior_option_transport" :
					include("junior_option_transport.php");
					break;
				
				case "page2Ajouter" :
					include("page2-ajt.php");
					break;
				case "page2Modif" :
					include("page2-ajt.php");
					break;
				case "page2" :
					include("page2.php");
					break;
				
				case "junior_reductionAjouter" :
					include("junior_reduction-ajt.php");
					break;
				case "junior_reductionModif" :
					include("junior_reduction-ajt.php");
					break;							
				case "junior_reduction" :
					include("junior_reduction.php");
					break;
				
				case "avoirAjouter" :
					include("avoir-ajt.php");
					break;
				case "avoirModif" :
					include("avoir-ajt.php");
					break;
				case "avoir" :
					include("avoir.php");
					break;
				
				case "bandeauAjouter" :
					include("bandeau-ajt.php");
					break;
				case "bandeauModif" :
					include("bandeau-ajt.php");
					break;
				case "bandeau" :
					include("bandeau.php");
					break;
				
				case "bandeau_accAjouter" :
					include("bandeau_acc-ajt.php");
					break;
				case "bandeau_accModif" :
					include("bandeau_acc-ajt.php");
					break;
				case "bandeau_acc" :
					include("bandeau_acc.php");
					break;					
					
				case "devise" :
					include("devise.php");
					break;
				case "deviseModif" :
					include("devise-ajt.php");
					break;	
				case "deviseAjout" :
					include("devise-ajt.php");
					break;	
					
				case "reductions_etudiants" :
					include("promotions_etudiants.php");
					break;
				case "reductions_etudiants_Modif" :
					include("promotion_etudiants_ajt.php");
					break;	
				case "reductions_etudiants_Ajout" :
					include("promotion_etudiants_ajt.php");
					break;		
					
				case "stage" :
					include("stage.php");
					break;				
				default : include ("accueil.php");							
			}
		}else{
			include ("accueil.php");
		}
		?>
        </td>
    </tr>
    </table>
    
</td></tr>

</table>

</body>
</html>