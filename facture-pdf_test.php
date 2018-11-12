<?php
if(!isset($envoi) || $envoi != "1"){
	session_start();
	include("inc/conf.php");
	include("inc/fonctions.php");
	connexion();
}

require('fpdf/fpdf.php');
class PDF extends FPDF{
	function Header(){
		global $tel_site, $fax_site, $adresse_site, $nom_site, $mail_site, $url_site, $url_site2, $img_mail_haut, $envoi;
			
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(0,0,255);
		$this->Image(((isset($envoi) && $envoi == "1") ? "../" : "").'images/logo2.jpg',10,8,50);
		$this->SetXY(10, 37);
		$this->Write(5, $adresse_site);
		$this->SetXY(10, 41);
		$this->Write(5, "Tél. : ".$tel_site." – Fax : ".$fax_site);
		$this->SetXY(10, 45);
		$this->Write(5, $mail_site);
	}
	function Footer(){
		$this->SetFont('Arial','',8);
		$this->SetTextColor(128,128,255);
		$this->SetY(-19);
		$this->Cell(0,10,'British European Centre est une marque de FV CONSULTING – SARL au capital de 31 100 euros - APE 7911Z',0,0,'C');
		$this->SetY(-15);
		$this->Cell(0,10,'RCS Paris 491 256 137 - IM 075 11 0001 - Garantie financière APST - RCP Mutuelles du Mans Assurances : n° 113 581 190',0,0,'C');
	}
}

if(isset($_GET["id"])){
	$i=1;
	$pdf=new PDF();
	
	$pdf->AddPage();
	$pdf->SetFont('Arial','',11);
	
	
	//réservation
	$query = "SELECT r.*, f.nom as fiche, d.nom as date FROM reservation_junior r LEFT OUTER JOIN fiche_junior f ON r.rid_fiche = f.id LEFT OUTER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id'])."'";
	$exec = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($exec);
	//destination
	$query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".$row["rid_fiche"]."'";
	$exec_d = mysql_query($query_d) or die(mysql_error());
	$data_d = mysql_fetch_assoc($exec_d);
	
	//transport
	if($row["num_option_transport"] != "" && $row["num_option_transport"] != "0"){
		//$query_t = "SELECT jot.* FROM fiche_junior_date fjd INNER JOIN junior_option_transport jot ON fjd.rid_option_transport".$row["num_option_transport"]." = jot.id WHERE 1";
		$query_t = "SELECT * FROM junior_option_transport WHERE id = '".$row["num_option_transport"]."'";
		$exec_t = mysql_query($query_t) or die(mysql_error());
		$data_t = mysql_fetch_assoc($exec_t);
	}
	
	
	
	$pdf->SetXY(130, 54);
	$pdf->Write(5, "Famille ".stripslashes($row["nom"]));
	$pdf->SetXY(130, 59);
	$pdf->Write(5, stripslashes($row["adresse"]));
	$pdf->SetXY(130, 64);
	$pdf->Write(5, stripslashes($row["cp"])." ".stripslashes($row["ville"]));
	$pdf->SetXY(20, 75);
	$pdf->Write(15, "Paris, le ".date("d")." ".$tab_mois[date("m")-1]." ".date("Y"));
	$pdf->SetY(86);
	$pdf->Cell(0, 10, 'Confirmation de réservation', 0, 0, 'C');
	$pdf->SetFont('Arial','B',11);
	$pdf->SetXY(10, 94);
	$pdf->Write(15, "Réservation N° ".stripslashes($row["num_dossier"]));
	$pdf->SetXY(10, 100);
	$pdf->Write(15, "Participant : ".stripslashes($row["nom"])." ".stripslashes($row["prenom"]));
	
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(10, 118);
	$pdf->Write(15, "Séjour : ".stripslashes($data_d["nom"]));
	$pdf->SetXY(10, 124);
	$pdf->Write(15, "Période : ".stripslashes($row["date"]));
	$pdf->SetXY(30, 133);
	$pdf->Write(15, "Frais de séjour");
	$pdf->SetXY(170, 133);
	$pdf->Write(15, stripslashes($row["tarif_sejour"]+$row["avion_tarif"])." €");
	$pdf->SetXY(30, 139);
	$pdf->Write(15, "Option de Transport : ".stripslashes($data_t["nom"]));
	$pdf->SetXY(170, 139);
	$pdf->Write(15, $data_t["prix"]." €");
	$pdf->SetXY(30, 144);
	$pdf->Write(15, "Option activité : ".stripslashes($data_d["option_nom".$row["num_option_activite"]]));
	$pdf->SetXY(170, 144);
	$pdf->Write(15, $data_d["option_prix".$row["num_option_activite"]]." €");
	$pdf->SetXY(30, 149);
	$pdf->Write(15, "Option hébergement : ".stripslashes($data_d["option_nom".$row["num_option_hebergement"]]));
	$pdf->SetXY(170, 149);
	$pdf->Write(15, $data_d["option_prix".$row["num_option_hebergement"]]." €");
	$pdf->SetXY(30, 160);
	$pdf->Write(15, "ASSURANCES");
	$pdf->SetXY(30, 166);
	$pdf->Write(15, "Assurance annulation : ".(($row["ass_annulation"] == "1") ? "OUI" : "NON"));
	$pdf->SetXY(170, 166);
	$pdf->Write(15, (($row["ass_annulation"] == "1") ? parsePrix(round($row["soustotal"]*0.03, 2)) : 0)." €");
	$pdf->SetXY(30, 172);
	$pdf->Write(15, "Assurance Interruption : ".(($row["ass_interruption"] == "1") ? "OUI" : "NON"));
	$pdf->SetXY(170, 172);
	$pdf->Write(15, (($row["ass_interruption"] == "1") ? parsePrix(round($row["soustotal"]*0.015, 2)) : 0)." €");
	$pdf->SetXY(30, 178);
	$pdf->Write(15, "Réduction : ".(($row["reduction_1"] == "1" || $row["reduction_2"] == "1" || $row["reduction_3"] == "1" || $row["reduction_4"] == "1") ? "OUI" : "NON"));
	$pdf->SetXY(170, 178);
	$pdf->Write(15, (($row["reduction_1"] == "1" || $row["reduction_2"] == "1" || $row["reduction_3"] == "1" || $row["reduction_4"] == "1") ? 50 : 0)." €");
	$pdf->Line(170, 191, 190, 191);
	$pdf->SetXY(30, 189);
	$pdf->Write(15, "TOTAL");
	$pdf->SetXY(170, 189);
	$pdf->Write(15, parsePrix($row["total"])." €");
	$pdf->SetXY(30, 197);
	$pdf->Write(15, "Vous avez versé à ce jour");
	$pdf->SetXY(170, 197);
	$pdf->Write(15, parsePrix($row["acompte"])." €");
	$pdf->SetXY(30, 206);
	$pdf->Write(15, "Reste dû");
	$pdf->SetXY(170, 206);
	$pdf->Write(15, parsePrix($row["total"]-$row["acompte"])." €");
	
	$pdf->SetXY(10, 226);
	$pdf->Write(5, "Nous vous remercions de nous adresser le solde de votre séjour au plus tard 6 semaines avant le départ. Si vous avez opté pour un règlement par carte bancaire, le prélèvement du solde sera effectué dans ces délais.
	
Très cordialement,");
	$pdf->SetXY(160, 244);
	$pdf->Write(5, "Le Service Juniors ");
	
	if(!isset($envoi) || $envoi != "1"){
		$pdf->Output();
	}else{
		$pdf->Output('../pdf/facture'.$row["id"].'.pdf','F');
	}
}
?>