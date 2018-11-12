<?
session_start();
include("inc/conf.php");
include("inc/fonctions.php");
include("inc/rewrite.php");
connexion();

$nom_fic = basename($_SERVER['PHP_SELF']);

if(isset($_GET["site"]) && $_GET["site"] != ""){
	$_SESSION["site"] = $_GET["site"];
}

if($nom_fic == "fiche_minis.php" || $nom_fic == "devis_minis.php" || $nom_fic == "devis_minis2.php" || $nom_fic == "index_minis.php" || $nom_fic == "prestation_minis.php" || $nom_fic == "recherche_minis.php" || $nom_fic == "ville_minis.php" || $nom_fic == "estimation_minis.php" || $nom_fic == "avantage_minis.php" || $nom_fic == "cgv_minis.php"){
	$_SESSION["site"] = "minis";
}elseif($nom_fic == "fiche_junior.php" || $nom_fic == "fiche_junior2.php" || $nom_fic == "devis_junior.php" || $nom_fic == "devis_junior2.php" || $nom_fic == "index_junior.php" || $nom_fic == "prestation_junior.php" || $nom_fic == "recherche_junior.php" || $nom_fic == "ville_junior.php" || $nom_fic == "avantage_junior.php" || $nom_fic == "cgv_junior.php" || $nom_fic == "reduction_junior.php"){
	$_SESSION["site"] = "junior";
}elseif($nom_fic == "fiche.php" || $nom_fic == "devis.php" || $nom_fic == "devis2.php" || $nom_fic == "index_adulte.php" || $nom_fic == "recherche.php" || $nom_fic == "ville.php" || $nom_fic == "cgv.php"){
	$_SESSION["site"] = "etudiant";
}

$fil_ariane="";

/*if($_SERVER['HTTP_HOST']!="192.168.1.201"){
	if(!stristr($_SERVER["HTTP_HOST"], 'www')){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_site.$_SERVER["REQUEST_URI"]);
		exit();
	}
	
	if($_SERVER["HTTP_HOST"]!=$url_site2 && $_SERVER['HTTP_HOST']==$url_site2.":8080"){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_site.$_SERVER["REQUEST_URI"]);
		exit();
	}
}*/

if(isset($_SESSION["site"]) && $_SESSION["site"] == "minis"){
	$site = "minis";
	$fic_nom = "_minis";
	$fic_nom2 = "minis_";
	$fic_nom3 = "_minis";
	$class_titre = "titreRouge";
	$bgcolor = "#8d0e15";
	$class_lien = "lienRouge";
	$rep_image = "fiche_minis";
}elseif(isset($_SESSION["site"]) && $_SESSION["site"] == "junior"){
	$site = "junior";
	$fic_nom = "_junior";
	$fic_nom2 = "junior_";
	$fic_nom3 = "_junior";
	$class_titre = "titreJaune";
	$bgcolor = "#f6921e";
	$class_lien = "lienJaune";
	$rep_image = "fiche_junior";
}else{
	$_SESSION["site"] = "etudiant";
	$site = "etudiant";
	$fic_nom = "";
	$fic_nom2 = "";
	$fic_nom3 = "_etudiant_adulte";
	$class_titre = "titreViolet";
	$bgcolor = "#67083e";
	$class_lien = "lienViolet";
	$rep_image = "fiche_etudiant";
}

$rubrique_site = "0";
if(isset($_GET["page"]) && $_GET["page"] != ""){
	$query_test = "SELECT rubrique_site FROM pages WHERE id = '".addslashes($_GET["page"])."'";
	$exec_test = mysql_query($query_test) or die(mysql_error());
	$data_test = mysql_fetch_row($exec_test);
	$rubrique_site = $data_test[0];
}

$fil_ariane = "";
/*if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query = "SELECT * FROM ".$fic_nom2."pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec = mysql_query($query) or die(mysql_error());
	$data = mysql_fetch_assoc($exec);
	$fil_ariane .= "<a href='ville".$fic_nom.".php?pays=".$data["id"]."' class='texteBleu'>".stripslashes($data["nom"])."</a>";
}*/
/*if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
	$query = "SELECT f.id, p.id as idpays, p.nom as pays, v.id as idville, v.nom as ville FROM fiche".$fic_nom3." f LEFT OUTER JOIN ".$fic_nom2."pays p ON f.pays = p.id LEFT OUTER JOIN ".$fic_nom2."ville v ON f.ville = v.id WHERE f.id = '".addslashes($_GET["fiche"])."'";
	$exec = mysql_query($query) or die(mysql_error());
	$data = mysql_fetch_assoc($exec);
	$fil_ariane .= "<a href='ville".$fic_nom.".php?pays=".$data["idpays"]."' class='texteBleu'>".stripslashes($data["pays"])."</a> / <a href='fiche".$fic_nom.".php?fiche=".$data["id"]."' class='texteBleu'>".stripslashes($data["ville"])."</a>";
}*/
?>
