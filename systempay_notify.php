<?php
include("inc/conf.php");
include("inc/fonctions.php");
connexion();

$logfile = "/home/users/becfranc/log_banque/log_".date('Y-m-d_H-i-s').".txt";
$flog = fopen($logfile, "a");

$key = "7367801851812003"; //8789563990781189
$contenu_signature = "";
$params = $_POST;
ksort($params);
foreach ($params as $nom => $valeur){
	fwrite($flog, $nom." : ".$valeur."\n");
	if(substr($nom,0,5) == 'vads_'){
	// C'est un champ utilisé pour calculer la signature
		$contenu_signature .= $valeur."+";
	}
}
$contenu_signature .= $key; // On ajoute le certificat (dernier paramètre)
$signature_calculee = sha1($contenu_signature);

fwrite($flog, "signature_calculee : ".$signature_calculee."\n");
if(isset($_POST['signature']) && $signature_calculee == $_POST['signature']){
	// Requête authentifiée
	// Attention cependant à bien vérifier les paramètres passés
	// Notamment le vads_site_id et le vads_ctx_mode
	fwrite($flog, "signature ok : ".date("Y-m-d H:i:s")."\n");
	
	$id_reservation = $_POST['vads_order_id'];
	//$mail = urldecode($_POST['vads_cust_email']);
	
	$sql = "SELECT * FROM reservation_junior WHERE id = '".addslashes($id_reservation)."'";
	$req = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($req);
	
	$query_dd = "SELECT * FROM fiche_junior_date WHERE id = '".$row['rid_date']."'";
	$exec_dd = mysql_query($query_dd) or die(mysql_error());
	$data_dd = mysql_fetch_assoc($exec_dd);
	
	$mail = $row["mail"];
	//$mail = "mael@amenothes.fr";
	$nom = $row["nom"];
	$prenom = $row["prenom"];
	
	if($_POST['vads_site_id'] == "79705806" && $_POST['vads_ctx_mode'] == "PRODUCTION"){ //TEST
		if($_POST['vads_result'] == "00"){
			envoi_mail($mail_site, "Réservation junior : ".$url_site2, "Réservation junior depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail de la réservation junior.");
envoi_mail("eric@becfrance.com", "Réservation junior : ".$url_site2, "Réservation junior depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail de la réservation junior.");
			
			fwrite($flog, "paiement validé : ".date("Y-m-d H:i:s")."\n");
			$sql = "UPDATE reservation_junior SET date_paie = NOW() WHERE id = '".addslashes($id_reservation)."'";//paiement = '1', 
			$i = mysql_query($sql);
			fwrite($flog, "requete : ".$sql."\n");
			
			if($row["type_paiement"] == "5"){
				$limite = 30;
				$nb_jour = diff_date($data_dd["date_debut"], date("Y-m-d"));
				
				envoi_mail($mail, "Confirmation réservation : ".$url_site2, "<span style='font-size:16px; font-weight:bold;'>Confirmation réservation</span><br /><br /><br /> Bonjour ".htmlentities($prenom." ".$nom).",<br /><br />Votre réservation a bien &eacute;t&eacute; enregistr&eacute;e ce jour et le paiement de ".parsePrix($row['acompte'])." &euro; a bien &eacute;t&eacute; accept&eacute;.<br /><br />
				Nous vous remercions pour votre confiance et l’intérêt porté à notre organisme.<br /><br />
				Pour valider définitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours par courrier ou par mail, un exemplaire du Bulletin d'inscription pré-rempli, dûment signé par vos soins.<br /><br />
				<center><a href='".$url_site."/bulletin-pdf.php?id=".$id_reservation."' target='_blank'><img src='".$url_site."/images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
				Nous vous rappelons que vous avez choisi de régler le solde de votre séjour par CB. Ainsi, le solde de votre séjour, soit ".parsePrix($row['total']-$row['acompte'])." €, sera automatiquement prélevé sur votre carte bancaire ".$limite." jours avant le départ.<br /><br />
				Nous vous remercions de votre confiance et restons à votre disposition pour toute information complémentaire.
				<br /><br /><br />
				<center><strong>
				".$nom_site."
				<br />
				".$adresse_site1."
				<br />
				".$adresse_site2."
				<br />
				".$pays_site."
				<br />
				".$tel_site."
				<br />
				</strong></center>");
			}elseif($row["type_paiement"] == "6"){
				$limite = 30;
				$nb_jour = diff_date($data_dd["date_debut"], date("Y-m-d"));
				
				envoi_mail($mail, "Confirmation réservation : ".$url_site2, "<span style='font-size:16px; font-weight:bold;'>Confirmation réservation</span><br /><br /><br /> Bonjour ".htmlentities($prenom." ".$nom).",<br /><br />Votre réservation a bien &eacute;t&eacute; enregistr&eacute;e ce jour et le paiement de ".parsePrix($row['total'])." &euro; a bien &eacute;t&eacute; accept&eacute;.<br /><br />
				Nous vous remercions pour votre confiance et l’intérêt porté à notre organisme.<br /><br />
				Pour valider définitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours par courrier ou par mail, un exemplaire du Bulletin d'inscription pré-rempli, dûment signé par vos soins.<br /><br />
				<center><a href='".$url_site."/bulletin-pdf.php?id=".$id_reservation."' target='_blank'><img src='".$url_site."/images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
				Nous vous remercions de votre confiance et restons à votre disposition pour toute information complémentaire.
				<br /><br /><br />
				<center><strong>
				".$nom_site."
				<br />
				".$adresse_site1."
				<br />
				".$adresse_site2."
				<br />
				".$pays_site."
				<br />
				".$tel_site."
				<br />
				</strong></center>");
			}else{
				envoi_mail($mail, "Confirmation réservation : ".$url_site2, "<span style='font-size:16px; font-weight:bold;'>Confirmation réservation</span><br /><br /><br /> Bonjour ".htmlentities($prenom." ".$nom).",<br /><br />Votre réservation a bien &eacute;t&eacute; enregistr&eacute;e ce jour et le paiement de ".parsePrix($row['acompte'])." &euro; a bien &eacute;t&eacute; accept&eacute;.<br /><br />
				Nous vous remercions pour votre confiance et l’intérêt porté à notre organisme.<br /><br />
				<b>Pour valider définitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours par courrier ou par mail, un exemplaire du Bulletin d'inscription pré-rempli, dûment signé par vos soins.</b><br /><br />
				<center><a href='".$url_site."/bulletin-pdf.php?id=".$id_reservation."' target='_blank'><img src='".$url_site."/images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
				Nous vous rappelons que vous avez choisi de régler le solde de votre séjour par chèque. Ainsi, le chèque de règlement du solde de ".parsePrix($row['total']-$row['acompte'])." € doit nous parvenir au plus tard 45 jours avant le départ.<br /><br />
				Dans cette attente, nous restons à votre disposition et vous prions d'agréer, Madame, Monsieur, l'expression de nos sentiments les meilleurs.
				<br /><br /><br />
				<center><strong>
				".$nom_site."
				<br />
				".$adresse_site1."
				<br />
				".$adresse_site2."
				<br />
				".$pays_site."
				<br />
				".$tel_site."
				<br />
				</strong></center>");
			}
		}else{
			fwrite($flog, "paiement annulé : ".date("Y-m-d H:i:s")."\n");
			$sql = "UPDATE reservation_junior SET paiement = '2' WHERE id = '".addslashes($id_reservation)."'";
			$i = mysql_query($sql);
			fwrite($flog, "requete : ".$sql."\n");
			
			//on remet le stock
			mysql_query("UPDATE fiche_junior_date SET stock = stock+1 WHERE id = '".$row["rid_date"]."'") or die(mysql_error());
		}
	}else{
		fwrite($flog, "mauvais vads_site_id ou vads_ctx_mode: ".date("Y-m-d H:i:s")."\n");
	}
}else{
	fwrite($flog, "signature nok : ".date("Y-m-d H:i:s")."\n");
}
fclose($flog);
?>