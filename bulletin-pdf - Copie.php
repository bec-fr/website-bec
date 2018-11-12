<?php

session_start();

include("inc/conf.php");

include("inc/fonctions.php");

connexion();



require('fpdf/fpdf.php');



if(isset($_GET["id"])){

	$i=1;

	$pdf=new FPDF();

	$pdf->SetMargins(0,0);

	

	//réservation

	$query = "SELECT r.*, f.nom as fiche, d.nom as date, d.date_debut, d.date_fin FROM reservation_junior r LEFT OUTER JOIN fiche_junior f ON r.rid_fiche = f.id LEFT OUTER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id'])."'";

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

	

	

	/*$tab_prix = array();

	$tab_prix[] = $data_d["tarif"];

	$query2 = "SELECT tarif FROM fiche_junior_date WHERE rid_fiche = '".$data_d["id"]."' AND tarif > '0'";

	$exec2 = mysql_query($query2) or die(mysql_error());

	while($data2 = mysql_fetch_row($exec2)){

		$tab_prix[] = $data2[0];

	}

	$prix_apartirde = min($tab_prix);*/

	

	$prix_sejour = $row["tarif_sejour"];
	$avion_tarif = $row["avion_tarif"];

	

	$pdf->AddPage();

	$pdf->Image('images/fond_bulletin.jpg',0,0,210,297);

	$pdf->SetFont('Arial','',11);

	

	

	$pdf->SetXY(25, 30);
	$pdf->Write(15, stripslashes($row["nom"]));
	$pdf->SetXY(122, 30);
	$pdf->Write(15, stripslashes($row["prenom"]));
	$pdf->SetXY((($row["sexe"] == "1") ? "35" : "9"), 39);
	$pdf->Write(15, "X");
	$pdf->SetXY(144, 38);
	$pdf->Write(15, parseDate($row["datenaiss"]));
	$pdf->SetXY(30, 83);
	$pdf->Write(15, stripslashes($row["adresse"]));
	$pdf->SetXY(35, 92);
	$pdf->Write(15, stripslashes($row["cp"]));
	$pdf->SetXY(89, 92);

	$pdf->Write(15, stripslashes($row["ville"]));

	if($row["reduction_num"] == "1"){//reduction 1

		$pdf->SetXY(9.5, 223);
		$pdf->Write(15, "X");

	}elseif($row["reduction_num"] == "2"){//reduction 2

		$pdf->SetXY(9.5, 228);
		$pdf->Write(15, "X");

	}elseif($row["reduction_num"] == "3"){//reduction 3

		$pdf->SetXY(9.5, 233);
		$pdf->Write(15, "X");

	}elseif($row["reduction_num"] == "4"){//reduction 4

		$pdf->SetXY(9.5, 239);
		$pdf->Write(15, "X");

	}

	//code réduction

	if($row["avoir"] != "0"){

		$pdf->SetXY(9.5, 250);

		$pdf->Write(15, "X");

		$pdf->SetXY(86, 250);

		$pdf->Write(15, stripslashes($row["avoir_code"]));

	}

	

	

	$pdf->AddPage();

	$pdf->Image('images/fond_bulletin_page2.jpg',0,0,210,297);

	$pdf->SetFont('Arial','',11);

	

	//$pdf->SetXY(34, 2);

	//$pdf->Write(15, stripslashes($data_d["pays"]));

	$pdf->SetXY(40, 0.5);

	$pdf->Write(15, stripslashes($data_d["nom"]));//ville

	/*$pdf->SetXY(154, 2);

	$pdf->Write(15, substr(stripslashes($data_d["nom"]), 0, 25));*/

	// date séjour

	$tab_date_debut = explode("-", $row["date_debut"]);
	$tab_date_fin = explode("-", $row["date_fin"]);
	$pdf->SetXY(44, 6.5);
	$pdf->Write(15, (int)$tab_date_debut[2]);
	$pdf->SetXY(66, 6);
	$pdf->Write(15, $tab_mois[$tab_date_debut[1]-1]);
	$pdf->SetXY(100, 6.5);
	$pdf->Write(15, (int)$tab_date_fin[2]);
	$pdf->SetXY(119, 6.5);
	$pdf->Write(15, $tab_mois[$tab_date_fin[1]-1]);

	

	if(isset($data_d["option_nom".$row["num_option_hebergement"]]) && strpos($data_d["option_nom".$row["num_option_hebergement"]], "famille") !== false){//famille

		$pdf->SetXY(59, 12);
		$pdf->Write(15, "X");

	}

	if(isset($data_d["option_nom".$row["num_option_hebergement"]]) && strpos($data_d["option_nom".$row["num_option_hebergement"]], "campus") !== false){//campus

		$pdf->SetXY(85, 12);
		$pdf->Write(15, "X");

	}

	if(isset($data_d["option_nom".$row["num_option_hebergement"]]) && strpos($data_d["option_nom".$row["num_option_hebergement"]], "hôtel") !== false){//hôtel

		$pdf->SetXY(85, 12);
		$pdf->Write(15, "X");

	}

	if(isset($data_d["option_nom".$row["num_option_hebergement"]]) && strpos($data_d["option_nom".$row["num_option_hebergement"]], "résidence") !== false){//résidence

		$pdf->SetXY(85, 12);
		$pdf->Write(15, "X");

	}

	

	$pdf->SetXY(187, 38);
	$pdf->Write(15, $prix_sejour);
	$pdf->SetXY(189, 43.5);
	$pdf->Write(15, $avion_tarif);

	

	$pdf->SetFont('Arial','',9);
	$pdf->SetXY(80, 48);
	$pdf->Write(15, (($row["num_option_hebergement"] > 0) ? substr(stripslashes($data_d["option_nom".$row["num_option_hebergement"]]), 0, 30) : ""));
	$pdf->SetXY(80, 52);
	$pdf->Write(15, (($row["num_option_activite"] > 0) ? substr(stripslashes($data_d["option_nom".$row["num_option_activite"]]), 0, 30) : ""));

	

	$pdf->SetFont('Arial','',11);

	$pdf->SetXY(189, 49);

	

	$prix_options = 0;

	$prix_options += (($row["num_option_activite"] > 0) ? $data_d["option_prix".$row["num_option_activite"]] : 0);

	$prix_options += (($row["num_option_hebergement"] > 0) ? $data_d["option_prix".$row["num_option_hebergement"]] : 0);

	

	$pdf->Write(15, $prix_options);

	

	$total = $prix_sejour+$avion_tarif+$prix_options;

	if(isset($data_t) && $data_t["id"] == "1"){

		$total += $data_t["prix"];
		$pdf->SetXY(140, 60);
		$pdf->Write(15, stripslashes($row["transport_valeur"]));
		$pdf->SetXY(9, 60);
		$pdf->Write(15, "X");

	}else{

		$pdf->SetXY(192, 58);
		$pdf->Write(15, "___");

	}

	if(isset($data_t) && $data_t["id"] == "2"){

		$total += $data_t["prix"];

		$pdf->SetXY(140, 66);
		$pdf->Write(15, stripslashes($row["transport_valeur"]));
		$pdf->SetXY(9, 66);
		$pdf->Write(15, "X");

	}else{

		$pdf->SetXY(192, 64);
		$pdf->Write(15, "___");

	}

	if(isset($data_t) && $data_t["id"] == "3"){

		$total += $data_t["prix"];
		$pdf->SetXY(140, 71);
		$pdf->Write(15, stripslashes($row["transport_valeur"]));
		$pdf->SetXY(9, 71.5);
		$pdf->Write(15, "X");

	}else{

		$pdf->SetXY(192, 69.5);
		$pdf->Write(15, "___");

	}

	if(isset($data_t) && ($data_t["id"] == "4" || $data_t["id"] == "5")){

		$total += $data_t["prix"];
		$pdf->SetXY(140, 77);
		$pdf->Write(15, stripslashes($row["transport_valeur"]));
		$pdf->SetXY(9, 77);
		$pdf->Write(15, "X");

	}else{

		$pdf->SetXY(192, 75);
		$pdf->Write(15, "___");

	}

	

	$pdf->SetFont('Arial','',9);
// reductions
	$tot_reduc = 0;

	if($row["reduction_num"] != "0"){

		$query2 = "SELECT * FROM junior_reduction WHERE id = '".$row["reduction_num"]."'";

		$exec2 = mysql_query($query2) or die(mysql_error());
		$data2 = mysql_fetch_assoc($exec2);

		

		$total -= $data2["prix"];
		$tot_reduc += $data2["prix"];
		$pdf->SetXY(126, 86);
		$pdf->Write(15, substr(stripslashes($data2["nom"]), 0, 30));

	}

	if($row["avoir"] != "0"){

		$total -= $row["avoir"];

		$tot_reduc += $row["avoir"];
		$pdf->SetXY(126, 86);
		$pdf->Write(15, "code réduction : ".$row["avoir_code"]);

	}

	if($tot_reduc != "0" || 1){

		$pdf->SetXY(192, 86);
		$pdf->Write(15, $tot_reduc);

	}

	$pdf->SetFont('Arial','',11);

	

	$soustotal = $total;

	$tot_assurance = 0;

	if($row["ass_annulation"] == "1"){

		$total += $soustotal*0.03;
		$tot_assurance += $soustotal*0.03;
		$pdf->SetXY(184, 97.5);
		$pdf->Write(15, parsePrix(round($soustotal*0.03, 2)));
		$pdf->SetXY(9, 97.5);
		$pdf->Write(15, "X");

	}

	if($row["ass_interruption"] == "1"){

		$total += $soustotal*0.045;
		$tot_assurance += $soustotal*0.045;
		$pdf->SetXY(184, 103);
		$pdf->Write(15, parsePrix(round($soustotal*0.045, 2)));
		$pdf->SetXY(9, 103);
		$pdf->Write(15, "X");

	}

	$tot_assurance = round($tot_assurance, 2);

	

	$pdf->SetXY(180, 109);
	$pdf->Write(15, parsePrix($row["total"]));
	

	$pdf->SetXY(39, 127);
	$pdf->Write(15, parsePrix(500 + $tot_assurance));

	

	if($row["type_paiement"] == "1" || $row["type_paiement"] == "5"){

		$pdf->SetXY(65, 132);
		$pdf->Write(15, "X");

	}elseif($row["type_paiement"] == "2"){

		$pdf->SetXY(65, 127);
		$pdf->Write(15, "X");

	}

	
	

	$pdf->Output();

}

?>