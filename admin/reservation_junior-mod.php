<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Réservations - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé :
if(isset($_POST['etat'])){
   $etat = $_POST['etat'];
   
   if(isset($_GET['id'])){
	 $requete = "SELECT r.*, d.nom as date, d.date_debut FROM reservation_junior r INNER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id'])."'";
	 $result = mysql_query($requete) or die(mysql_error());
  	 $row = mysql_fetch_array($result);
	 
	 $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".$row["rid_fiche"]."'";
	 $exec_d = mysql_query($query_d) or die(mysql_error());
	 $data_d = mysql_fetch_assoc($exec_d);
	 
	 //transport
	 $transport_lib = "";
	if($row["num_option_transport"] != "" && $row["num_option_transport"] != "0"){
		//$query_t = "SELECT jot.* FROM fiche_junior_date fjd INNER JOIN junior_option_transport jot ON fjd.rid_option_transport".$row["num_option_transport"]." = jot.id WHERE 1";
		$query_t = "SELECT * FROM junior_option_transport WHERE id = '".$row["num_option_transport"]."'";
		$exec_t = mysql_query($query_t) or die(mysql_error());
		$data_t = mysql_fetch_assoc($exec_t);
		
		$transport_lib = stripslashes($data_t["nom"])." ".stripslashes($row["transport_valeur"]);
	}
	//hebergement
	$hebergement_lib = "";
	if($row["num_option_hebergement"] > 0){
		$hebergement_lib = stripslashes($data_d["option_nom".$row["num_option_hebergement"]]);
	}
	//activite
	$activite_lib = "";
	if($row["num_option_activite"] > 0){
		$activite_lib = stripslashes($data_d["option_nom".$row["num_option_activite"]]);
	}
	//reduction
	$reduction_lib = "";
	if($row["reduction_num"] > 0){
		$query2 = "SELECT * FROM junior_reduction WHERE id = '".$row["reduction_num"]."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$data2 = mysql_fetch_assoc($exec2);
		
		$reduction_lib = stripslashes($data2["nom"]);
	}
	 
	 $etat_old = $row['paiement'];
	 $type_paiement = $row['type_paiement'];
	 $mail = $row["mail"];
	 $nom = $row["nom"];
	 $prenom = $row["prenom"];
	 
	 if($etat_old!=$etat){
		 if($etat==1){
			//génération du numéro de dossier
			$tab_date_debut = explode("-", $row["date_debut"]);
			$annee = $tab_date_debut[0]; $mois = $tab_date_debut[1];
			$query_r = "SELECT MAX(num_dossier2) FROM reservation_junior r INNER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.paiement='1' AND YEAR(d.date_debut) = '".$annee."' AND MONTH(d.date_debut) = '".$mois."' AND saison = '7'";
			$exec_r = mysql_query($query_r) or die(mysql_error());
			$data_r = mysql_fetch_row($exec_r);
			$num_dossier = $annee."/".$mois."/J".($data_r[0]+1);
			
			$requete = "UPDATE reservation_junior SET paiement = '".addslashes($etat)."', num_dossier = '".$num_dossier."', num_dossier2 = '".($data_r[0]+1)."' WHERE id = '".addslashes($_GET['id'])."'";
			mysql_query($requete) or die(mysql_error());
			
			//si type paiement chèque
			if($type_paiement == "1"){
				$requete = "UPDATE reservation_junior SET date_paie = NOW() WHERE id = '".addslashes($_GET['id'])."'";
				mysql_query($requete) or die(mysql_error());
			}
			
			$envoi = "1";
			include("../facture-pdf.php");
			
			$texte = "<span style='font-size:16px; font-weight:bold;'>Confirmation réservation</span><br><br><br><b>DOSSIER N° ".stripslashes($num_dossier)."</b><br><br>Madame, Monsieur,<br><br>Nous avons bien reçu votre bulletin d'inscription pour le séjour linguistique à ".stripslashes($data_d["ville"])." ainsi que la somme de ".parsePrix($row["acompte"])." € et vous remercions pour l'intérêt et la confiance portés à notre organisme. Nous vous prions de bien vouloir vérifier les informations ci-après enregistrées sur votre dossier et nous signaler toute erreur.<br>
			<br>Vous avez demandé le séjour suivant : <br><br>
			Séjour : ".stripslashes($data_d["nom"])."<br>
			Date : ".stripslashes($row["date"])."<br>
			Ville de séjour : ".stripslashes($data_d["ville"])."<br><br>
			Option d'activité : ".(($activite_lib != "") ? $activite_lib : "---")."<br>
			Option d'hébergement : ".(($hebergement_lib != "") ? $hebergement_lib : "---")."<br>
			Option de transport : ".(($transport_lib != "") ? $transport_lib : "---")."
			<br><br>
			Assurances : <br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assistance Médicale / Rapatriement : Incluse<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Annulation / Bagages : ".(($row["ass_annulation"] == "1") ? "OUI" : "NON")."<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pack multirisques : ".(($row["ass_interruption"] == "1") ? "OUI" : "NON")."
			<br><br>
			Réductions : ".$reduction_lib."<br>
			<br><br>
			IMPORTANT - Vous trouverez en pièce jointe de ce mail :
			<br><br>
			- La confirmation d’inscription<br>
			- les formalités de séjour à lire attentivement<br>
			- La fiche sanitaire de liaison à nous retourner dès que possible et au plus tard 1 mois avant le départ.
			<br><br>
			Vous recevrez environ deux semaines avant le départ, votre dossier voyage incluant la convocation pour le départ.<br>
			Si vous souhaitez connaître les horaires et lieux de convocation plus tôt afin de réserver un transport pour vous y rendre, n’hésitez pas à nous contacter.<br>
			Tel : 01.55.35.25.00 – Courriel : administrateur@becfrance.com<br>
			Une facture acquittée vous sera adressée après règlement du solde du séjour.<br><br>
			Nous restons à votre disposition pour toute précision complémentaire.<br><br>
			Dans cette attente, nous vous prions d'agréer, Madame, Monsieur, l'expression de nos sentiments les meilleurs.
			<br><br>
			&Agrave; votre service et &agrave; bient&ocirc;t sur <a href='".$url_site."'>".$url_site3."</a>.<br><br>
			L'&eacute;quipe du BEC.";
			//echo $texte;
			//(($row["reduction_1"] == "1" || $row["reduction_2"] == "1" || $row["reduction_3"] == "1" || $row["reduction_4"] == "1" || $row[""] != "0") ? "OUI" : "NON")
			
			mail_attachement($mail, "Confirmation réservation : ".$url_site2, $texte, "../pdf/confirmation".$row['id'].".pdf", "application/pdf", "confirmation_".$num_dossier.".pdf", "../doc/formalites_sejour.pdf", "application/pdf", "formalites_sejour.pdf", "../doc/fiche_sanitaire_liaison.pdf", "application/pdf", "fiche_sanitaire_liaison.pdf");
			
			if(file_exists("../pdf/confirmation".$row['id'].".pdf")){
				unlink("../pdf/confirmation".$row['id'].".pdf");
			}
		 }else if($etat==2){
			$requete = "UPDATE reservation_junior SET paiement = '".addslashes($etat)."' WHERE id = '".addslashes($_GET['id'])."'";
			mysql_query($requete) or die(mysql_error());
			
			//on remet le stock
			mysql_query("UPDATE fiche_junior_date SET stock = stock+1 WHERE id = '".$row["rid_date"]."'") or die(mysql_error());
		 }else{
		 	$requete = "UPDATE reservation_junior SET paiement = '".addslashes($etat)."' WHERE id = '".addslashes($_GET['id'])."'";
			mysql_query($requete) or die(mysql_error());
		 }
	 }else{
	 	$requete = "UPDATE reservation_junior SET colis='".addslashes($colis)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
	 }
	 $id=$_GET['id'];
   }
   
   echo "<script>document.location.href='admin.php?action=reservation_junior&paiement=".$etat."';</script>";
}else{   
   if(isset($_GET['id'])){
     $requete = "SELECT * FROM reservation_junior WHERE id = '".addslashes($_GET['id'])."'";
     $result = mysql_query($requete) or die(mysql_error());
	 $row = mysql_fetch_array($result);
	 
	 $etat = $row['paiement'];
   }
}
  ?>
  
  <FORM ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu>
  <TR><TD align=right>Etat de la commande :</TD><TD>
  <SELECT name="etat">
  	<option value="0" <?=($etat==0 ? "selected" : "")?>>En attente</option>
 	<option value="1" <?=($etat==1 ? "selected" : "")?>>A traité/Paiement validé</option>
  	<option value="2" <?=($etat==2 ? "selected" : "")?>>Annulé</option>
  </SELECT>
  </TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value="<?=(isset($_GET['id'])? "Modifier" : "Ajouter"); ?>" class="bouton"></TD></TR>
  </TABLE>
  </form>
  
  
		</td>
	</tr>
</table><br>