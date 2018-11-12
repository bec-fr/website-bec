<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Réserver séjour junior - Bec séjours linguistiques </title> 
		<meta name="robots" content="noindex">        
        <meta name="description" content="Reserver un séjour junior -BEC Séjours linguistiques">
        <meta name="author" content="BEC Séjours linguistiques">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen">  

        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- styles for IE -->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!-- Skins Changer-->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		
    </head>

<? $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays, v.id as idville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index_junior.php';</script>";
	exit();
}
$data_d = mysql_fetch_assoc($exec_d);

$query_dd = "SELECT * FROM fiche_junior_date WHERE id = '".addslashes($_GET["date"])."'";
$exec_dd = mysql_query($query_dd) or die(mysql_error());
$data_dd = mysql_fetch_assoc($exec_dd);



//age
$query2 = "SELECT MIN(age_mini) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age = $data2[0];
$query2 = "SELECT MAX(age_maxi) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age .= "-".$data2[0]." ans";

$fil_ariane .= "<a href='sejours-linguistiques-pour-adolescents.html' class='texteBleu'>Séjour linguistique Juniors 12-17 ans</a>";
$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["pays"])."</a>";
$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["ville"])."</a>";
$fil_ariane .= " / <a href='sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html' class='texteBleu'>".stripslashes($data_d["nom"])."</a>";
$title="Séjour linguistique pour adolescent ".stripslashes($data_d["nom"])." - Stage et job ".stripslashes($data_d["nom"]);

if($data_d["idpays"] != "0"){
	$_GET["pays"] = $data_d["idpays"];
}
if($data_d["idville"] != "0"){
	$_GET["ville"] = $data_d["idville"];
}


/*$tab_prix = array();
$tab_prix[] = $data_d["tarif"];
$query2 = "SELECT tarif FROM fiche_junior_date WHERE rid_fiche = '".$data_d["id"]."' AND tarif > '0'";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_row($exec2)){
	$tab_prix[] = $data2[0];
}
$prix_apartirde = min($tab_prix);*/

$ass_annulation = "";
$ass_interruption = "";
$reduction_num = "";
$num_option_activite = "";
$num_option_hebergement = "";
$num_option_transport = "";
$transport_valeur = "";

$sexe = "";
$nom = "";
$prenom = "";
$date_naiss_j = "";
$date_naiss_m = "";
$date_naiss_a = "";
$adresse = "";
$cp = "";
$ville = "";
$tel = "";
$mail = "";
if(isset($_GET["id_reservation"]) && $_GET["id_reservation"] != ""){
	$query_res = "SELECT * FROM reservation_junior WHERE id = '".addslashes($_GET["id_reservation"])."'";
	$exec_res = mysql_query($query_res) or die(mysql_error());
	$data_res = mysql_fetch_assoc($exec_res);
	
	$ass_annulation = $data_res["ass_annulation"];
	$ass_interruption = $data_res["ass_interruption"];
	$reduction_num = $data_res["reduction_num"];
	$num_option_activite = $data_res["num_option_activite"];
	$num_option_hebergement = $data_res["num_option_hebergement"];
	$num_option_transport = $data_res["num_option_transport"];
	$transport_valeur = $data_res["transport_valeur"];
	
	$sexe = $data_res["sexe"];
	$nom = $data_res["nom"];
	$prenom = $data_res["prenom"];
	$datenaiss = explode("-", $data_res["datenaiss"]);
	$date_naiss_j = $datenaiss[2];
	$date_naiss_m = $datenaiss[1];
	$date_naiss_a = $datenaiss[0];
	$adresse = $data_res["adresse"];
	$cp = $data_res["cp"];
	$ville = $data_res["ville"];
	$tel = $data_res["tel"];
	$mail = $data_res["mail"];
}elseif(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	$ass_annulation = ((isset($_POST["ass_annulation"])) ? $_POST["ass_annulation"]: "");
	$ass_interruption = ((isset($_POST["ass_interruption"])) ? $_POST["ass_interruption"]: "");
	for($i=1 ; $i<=5 ; $i++){
		if(isset($_POST["reduction_".$i])){
			$reduction_num = $_POST["reduction_".$i];
		}
	}
	for($i=1 ; $i<=5 ; $i++){
		if(isset($_POST["option_activite".$i]) && $_POST["option_activite".$i] != ""){
			$num_option_activite = $_POST["option_activite".$i];
		}
	}
	for($i=1 ; $i<=5 ; $i++){
		if(isset($_POST["option_hebergement".$i]) && $_POST["option_hebergement".$i] != ""){
			$num_option_hebergement = $_POST["option_hebergement".$i];
		}
	}
	for($i=1 ; $i<=5 ; $i++){
		if(isset($_POST["option_transport".$i]) && $_POST["option_transport".$i] != ""){
			$num_option_transport = $_POST["option_transport".$i];
		}
	}
	for($i=1 ; $i<=5 ; $i++){
		if(isset($_POST["transport_valeur".$i]) && $_POST["transport_valeur".$i] != ""){
			$transport_valeur = $_POST["transport_valeur".$i];
		}
	}
	
	$sexe = ((isset($_POST["sexe"])) ? $_POST["sexe"]: "");
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$date_naiss_j = $_POST["date_naiss_j"];
	$date_naiss_m = $_POST["date_naiss_m"];
	$date_naiss_a = $_POST["date_naiss_a"];
	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$tel = $_POST["tel"];
	$mail = $_POST["mail"];
}


$prix_sejour = $data_dd["tarif"];
$avion_tarif = (($data_dd["avion_tarif2"] != "0") ? $data_dd["avion_tarif2"] : $data_d["avion_tarif"]);
?>
<? include("top_juniors.php"); ?>
<?
if(isset($_POST['code'])){
	$code = $_POST['code'];
}else{
	if(isset($_SESSION['code']))
		$code = $_SESSION['code'];
	else
		$code = "";
}
$avoir = calcul_avoir($prix_sejour, $code, $data_d["id"]);
?>

<script type="text/javascript">
function verifForm(){
	testm = false ;
	for (var j=1 ; j<(document.form.mail.value.length) ; j++) {
		if (document.form.mail.value.charAt(j)=='@') { 
			if (j<(document.form.mail.value.length-4)){ 
				for (var k=j ; k<(document.form.mail.value.length-2) ; k++) { 
					if (document.form.mail.value.charAt(k)=='.') testm = true;
				} 
			} 
		} 
	}
	a="0";
	
	if (!document.getElementById("sexe1").checked && !document.getElementById("sexe2").checked) {alert('Vous n\'avez pas indiqué votre civilité.'); a="1";}
	else if (document.form.nom.value.length == 0) {alert('Vous n\'avez pas indiqué votre nom.'); a="1"; document.form.nom.focus();}
	else if (document.form.prenom.value.length == 0) {alert('Vous n\'avez pas indiqué votre prénom.'); a="1"; document.form.prenom.focus();}
	else if (document.form.adresse.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse.'); a="1"; document.form.adresse.focus();}
	else if (document.form.cp.value.length == 0) {alert('Vous n\'avez pas indiqué votre code postal.'); a="1"; document.form.cp.focus();}
	else if (document.form.ville.value.length == 0) {alert('Vous n\'avez pas indiqué votre ville.'); a="1"; document.form.ville.focus();}
	else if (document.form.tel.value.length == 0) {alert('Vous n\'avez pas indiqué votre numéro de téléphone.'); a="1"; document.form.tel.focus();}
	else if (document.form.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.form.mail.focus();}
	else if ((testm==false) && (document.form.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.form.mail.focus();}
	else if(!document.getElementById('valider').checked) {alert('Veuillez accepter les conditions générales et les conditions particuli&egrave;res.'); a="1"; document.form.mail.focus();}
	
	if (a == 0) {
		document.form.action = 'junior_reserver_sejour2.php?fiche=<?=$_GET["fiche"]?>&date=<?=$_GET["date"]?>';
		document.form.submit();
	}
}

var nb_reduction = "<?=mysql_num_rows(mysql_query("SELECT * FROM junior_reduction WHERE 1 AND ((date_debut = '0000-00-00' AND date_fin = '0000-00-00') OR (date_debut <= CURRENT_DATE() AND date_fin >= CURRENT_DATE()))"))?>";

function coche_option_activite(valeur){
	for(i=1 ; i<=5 ; i++){
		if(valeur != i){
			if(document.form.elements["option_activite" + i]){
				document.form.elements["option_activite" + i].checked = false;
			}
		}
	}
}
function coche_option_hebergement(valeur){
	for(i=1 ; i<=5 ; i++){
		if(valeur != i){
			if(document.form.elements["option_hebergement" + i]){
				document.form.elements["option_hebergement" + i].checked = false;
			}
		}
	}
}
function coche_option_transport(valeur){
	for(i=1 ; i<=3 ; i++){
		if(valeur != i){
			if(document.form.elements["option_transport" + i]){
				document.form.elements["option_transport" + i].checked = false;
			}
		}
	}
}

function coche_reduction(num){
	for(i=1 ; i<=nb_reduction ; i++){
		if(num != i){
			document.form.elements["reduction_" + i].checked = false;
		}
	}
}
function reset_check_reduction(){
	for(i=1 ; i<=nb_reduction ; i++){
		document.form.elements["reduction_" + i].checked = false;
	}
}
function coche_assurance(num){
	/*if(num == "annulation"){
		
	}else if(num == "interruption"){
		
	}*/
	if(num != "annulation"){
		document.form.elements["ass_annulation"].checked = false;
	}
	if(num != "interruption"){
		document.form.elements["ass_interruption"].checked = false;
	}
	/*for(i=1 ; i<=nb_assurance ; i++){
		if(num != i){
			document.form.elements["assurance_" + i].checked = false;
		}
	}*/
}
function reset_check_assurance(){
	document.form.elements["ass_annulation"].checked = false;
	document.form.elements["ass_interruption"].checked = false;
	/*for(i=1 ; i<=nb_assurance ; i++){
		document.form.elements["assurance_" + i].checked = false;
	}*/
}

function maj_prix(){
	var option_transport = Array(); var option_transport_prix = Array();
	for(i=1 ; i<=3 ; i++){
		if(document.form.elements["option_transport"+i]){
			option_transport[i] = document.form.elements["option_transport"+i];
			option_transport_prix[i] = document.form.elements["option_transport"+i].getAttribute("prix");
		}else{
			option_transport[i] = "";
			option_transport_prix[i] = "";
		}
	}
	var option_activite = Array(); var option_activite_prix = Array();
	for(i=1 ; i<=5 ; i++){
		if(document.form.elements["option_activite"+i]){
			option_activite[i] = document.form.elements["option_activite"+i];
			option_activite_prix[i] = document.form.elements["option_activite"+i].getAttribute("prix");
		}else{
			option_activite[i] = "";
			option_activite_prix[i] = "";
		}
	}
	var option_hebergement = Array(); var option_hebergement_prix = Array();
	for(i=1 ; i<=5 ; i++){
		if(document.form.elements["option_hebergement"+i]){
			option_hebergement[i] = document.form.elements["option_hebergement"+i];
			option_hebergement_prix[i] = document.form.elements["option_hebergement"+i].getAttribute("prix");
		}else{
			option_hebergement[i] = "";
			option_hebergement_prix[i] = "";
		}
	}
	
	var ass_annulation = document.form.ass_annulation;
	var ass_interruption = document.form.ass_interruption;
	
	var total = <?=($prix_sejour+$avion_tarif)?>;
	var avoir = <?=($avoir)?>;
	
	for(i=1 ; i<=3 ; i++){
		if(option_transport[i].checked){
			total += parseFloat(option_transport_prix[i]);
		}
	}
	var soustotal = total;
	
	for(i=1 ; i<=5 ; i++){
		if(option_activite[i].checked){
			total += parseFloat(option_activite_prix[i]);
		}
	}
	var soustotal_act = total;
	for(i=1 ; i<=5 ; i++){
		if(option_hebergement[i].checked){
			total += parseFloat(option_hebergement_prix[i]);
		}
	}
	var soustotal_heb = total;
	
	for(i=1 ; i<=nb_reduction ; i++){
		if(document.form.elements["reduction_" + i] && document.form.elements["reduction_" + i].checked){
			total -= document.form.elements["reduction_" + i].getAttribute("prix");
		}
	}
	var soustotal3 = total;
	
	
	var tot_assurance = 0;
	document.getElementById("ass1").innerHTML = Math.round((soustotal3*0.03)*100)/100;
	if(ass_annulation.checked){
		total += soustotal3*0.03;
		tot_assurance += soustotal3*0.03;
	}
	document.getElementById("ass2").innerHTML = Math.round((soustotal3*0.045)*100)/100;
	if(ass_interruption.checked){
		total += soustotal3*0.045;
		tot_assurance += soustotal3*0.045;
	}
	tot_assurance = Math.round((tot_assurance)*100)/100;
	var acompte = 500+tot_assurance;
	
	total -= avoir;
	total = Math.round((total)*100)/100;
	
	document.getElementById("tot1").innerHTML = soustotal;
	if(document.getElementById("tot_act")){
		document.getElementById("tot_act").innerHTML = soustotal_act;
	}
	if(document.getElementById("tot_heb")){
		document.getElementById("tot_heb").innerHTML = soustotal_heb;
	}
	document.getElementById("tot3").innerHTML = soustotal3;
	document.getElementById("tot4").innerHTML = total;
	
	var solde = total-acompte;
	solde = Math.round((solde)*100)/100;
	document.getElementById("acompte").innerHTML = acompte;
	document.getElementById("solde").innerHTML = solde;
	
	//alert(total);
}
</script>


					 <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Réservation séjour juniors <?=stripslashes($data_d["ville"])?></h1>
                        </div> 
						<div class="col-md-2"></div>						
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->
			<!-- End content info -->
            <section class="content_info">	
                <div class="container">
					<!-- Newsletter Box -->                  
                    <div class="newsletter_box">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-9 titre"> 
										<span><?=($fil_ariane)?></span>				
                                </div>								
                            </div>
                        </div>
                    </div>
                     <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">    
                       
                       	  <? $bloc = ""; ?>
						
                            
                            <form action="" method="post" name="form">
                            <input type="hidden" name="ok" value="1" />
							
                            <!--<input type="hidden" name="fiche" value="<?=$_GET["fiche"]?>" />
                            <input type="hidden" name="date" value="<?=$_GET["date"]?>" />-->
                            
                            <div>
                              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                               
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;">
								  <table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td  height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td>
											
											
											<div class="titles">                            
											<br>
											<h2>&nbsp;Réservation du séjour </h2>
                               
											</div>    
											
											</td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                   
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  
                                      <?
									  $total = $prix_sejour;
									  $acompte = 500;
									  ?>
                                      <table>
                                     
                                      <tr><td height="5"></td></tr>
                                      <tr><td width="70%">Séjour à <b><?=stripslashes($data_d["ville"])?></b></td><td align="right">du <?=parseDate($data_dd["date_debut"])?> au <?=parseDate($data_dd["date_fin"])?></td></tr>
                                      <tr><td>Montant du séjour</td><td align="right"><?=$total?> €</td></tr>
                                      <? if($avion_tarif != "0"){ ?>
									  <?
                                      $total += $avion_tarif;
									  ?>
                                      <tr><td>Taxes aéroports et surcharge carburant</td><td align="right"><?=$avion_tarif?> €</td></tr>
                                      <? } ?>
									  <!-- reste invisbile -->
									 
                                      <tr><td align="right">Sous Total</td><td align="right"><b><?=$total?> €</b></td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options de transport :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <? for($i=1 ; $i<=3 ; $i++){ ?>
                                      <? if($data_dd["rid_option_transport".$i] != "0"){ ?>
                                      <?
                                      $query2 = "SELECT * FROM junior_option_transport WHERE id = '".$data_dd["rid_option_transport".$i]."'";
									  $exec2 = mysql_query($query2) or die(mysql_error());
									  $data2 = mysql_fetch_assoc($exec2);
									  $prixt = $data2["prix"];
									  ?>
                                      <tr><td><input type="checkbox" name="option_transport<?=$i?>" id="option_transport<?=$i?>" value="<?=$data_dd["rid_option_transport".$i]?>" prix="<?=$data2["prix"]?>" onClick="coche_option_transport('<?=$i?>'); maj_prix();" <?=(($num_option_transport == $data_dd["rid_option_transport".$i]) ? " checked" : "")?> /> &nbsp;<?=stripslashes($data2["nom"])?><br />
                                      <select name="transport_valeur<?=$i?>" class="select"><option value="">- - -</option>
									  <?
                                      $query2 = "SELECT otl.* FROM junior_date_transport jdt INNER JOIN option_transport_liste otl ON jdt.rid_option = otl.id WHERE rid_date = '".$data_dd["id"]."' AND num_transport = '".$i."' ORDER BY otl.nom";
                                      $exec2 = mysql_query($query2) or die(mysql_error());
                                        while($data2 = mysql_fetch_assoc($exec2)){
                                            ?><option value="<?=stripslashes($data2["nom"])?>" <?=(($transport_valeur == $data2["nom"]) ? " selected" : "")?>><?=stripslashes($data2["nom"])?></option><?
                                        }
                                        ?>
                                      </select>
                                      </td><td align="right"><?=parsePrix($prixt)?> €</td></tr>
                                      <? } ?>
                                     
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot1"><?=$total?></span> €</b></td></tr>
                                      <?
									  $aff_option_activite = false;
									  for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "activité"){
											  $aff_option_activite = true;
										  }
									  }
									  ?>
                                      <? if($aff_option_activite == true){ ?>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options activité :</b></td></tr>
                                      <? } ?>
                                      <tr><td height="5"></td></tr>
                                      <? for($i=1 ; $i<=5 ; $i++){ ?>
									  <? if($data_d["option_type".$i] == "activité"){// && $data_d["option_prix".$i] != "0" ?>
                                      <tr><td><input type="checkbox" name="option_activite<?=$i?>" id="option_activite<?=$i?>" value="<?=$i?>" prix="<?=$data_d["option_prix".$i]?>" onClick="coche_option_activite('<?=$i?>'); maj_prix();" <?=(($num_option_activite == $i) ? " checked" : "")?> /> &nbsp;<?=stripslashes($data_d["option_nom".$i])?></td><td align="right"><?=parsePrix($data_d["option_prix".$i])?> €</td></tr>
                                      <? } ?>
                                      <? } ?>
                                      <?
									  $aff_option_hebergement = false;
									  for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "hébergement"){
											  $aff_option_hebergement = true;
										  }
									  }
									  ?>
                                      <? if($aff_option_activite == true){ ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot_act"><?=$total?></span> €</b></td></tr>
                                      <? } ?>
                                      
                                      <? if($aff_option_hebergement == true){ ?>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options hébergement :</b></td></tr>
                                      <? } ?>
                                      <tr><td height="5"></td></tr>
                                      <? for($i=1 ; $i<=5 ; $i++){ ?>
									  <? if($data_d["option_type".$i] == "hébergement"){// && $data_d["option_prix".$i] != "0" ?>
                                      <tr><td><input type="checkbox" name="option_hebergement<?=$i?>" id="option_hebergement<?=$i?>" value="<?=$i?>" prix="<?=$data_d["option_prix".$i]?>" onClick="coche_option_hebergement('<?=$i?>'); maj_prix();" <?=(($num_option_hebergement == $i) ? " checked" : "")?> /> &nbsp;<?=stripslashes($data_d["option_nom".$i])?></td><td align="right"><?=parsePrix($data_d["option_prix".$i])?> €</td></tr>
                                      <? } ?>
                                      <? } ?>
                                      <? if($aff_option_hebergement == true){ ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot_heb"><?=$total?></span> €</b></td></tr>
                                      <? } ?>
									  
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Réductions :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <?
									  $query2 = "SELECT * FROM junior_reduction WHERE 1 AND ((date_debut = '0000-00-00' AND date_fin = '0000-00-00') OR (date_debut <= CURRENT_DATE() AND date_fin >= CURRENT_DATE()))";
									  $exec2 = mysql_query($query2) or die(mysql_error());
									  $i=1;
									  while($data2 = mysql_fetch_assoc($exec2)){
										  ?>
										  <tr><td><input type="checkbox" name="reduction_<?=$i?>" value="<?=$data2["id"]?>" prix="<?=$data2["prix"]?>" onClick="<?=((isset($code) && $code != "") ? "reset_check_reduction();" : "")?> coche_reduction('<?=$i?>'); maj_prix();" <?=(($reduction_num == $data2["id"]) ? " checked" : "")?> /> &nbsp;&nbsp;<?=stripslashes($data2["nom"])?></td><td align="right">-<?=$data2["prix"]?> €</td></tr>
										  <?
										  $i++;
									  }
									  ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot3"><?=$total?></span> €</b></td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Code de réduction :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <tr><td>Je dispose d’un code de réduction</td></tr>
                                      <tr><td><input type="text" name="code" value="<?=((isset($code) && $code != "") ? $code : "")?>" class="inputtext" size="15" /> <a href="#" onclick="reset_check_reduction(); document.form.submit(); return false;"><input  align="right" class="button" width="50" value="Valider ce code"></a></td><td align="right"><?=$avoir?> €</td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options d'assurance :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <tr><td><input type="checkbox" name="ass_annulation" value="1" <?=(($ass_annulation == "1") ? " checked" : "")?> onClick="<?=((isset($code) && $code != "") ? "reset_check_reduction();" : "")?> coche_assurance('annulation'); maj_prix();" /> &nbsp;&nbsp;Assurance annulation (3%)</td><td align="right"><span id="ass1"><?=parsePrix($total*0.03)?></span> €</td></tr>
                                      <tr><td><input type="checkbox" name="ass_interruption" value="1" <?=(($ass_interruption == "1") ? " checked" : "")?> onClick="<?=((isset($code) && $code != "") ? "reset_check_assurance();" : "")?> coche_assurance('interruption'); maj_prix();" /> &nbsp;&nbsp;Pack multirisques (4,5%)</td><td align="right"><span id="ass2"><?=parsePrix($total*0.045)?></span> €</td></tr>
									   <? } ?>
                                      <tr><td align="right">Montant Total</td><td align="right"><b><span id="tot4"><?=$total?></span> €</b></td></tr>
                                      </table>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                               
                              </table><br />
                              <hr>
                              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                               
                                <tr>
                                 
								  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                     
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td>
											
											<div class="titles">                          
											<h2>&nbsp;Coordonnées </h2>                              
											</div>  
											
											
											</td>
                                          </tr>
                                        </table>
                                    </tr>
                                  
                                  </table>
                                </tr>
                                <tr>
                              
								  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
                                      
                                      <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                                        <tr>
                                          <td align="right" class="text">Civilité* :</td>
                                          <td><input name="sexe" id="sexe1" type="radio" value="0" <?=(($sexe == "0") ? " checked" : "")?> /> gar&ccedil;on &nbsp;&nbsp;&nbsp; <input name="sexe" id="sexe2" type="radio" value="1" <?=(($sexe == "1") ? " checked" : "")?> /> fille</td>
                                        </tr>
                                        <tr>
                                          <td width="37%" align="right" class="text">Nom du jeune* :</td>
                                          <td width="63%"><input name="nom" type="text" value="<?=$nom?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Pr&eacute;nom* :</td>
                                          <td><input name="prenom" type="text" value="<?=$prenom?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Date de naissance* :</td>
                                          <td><select name="date_naiss_j" class="select"><?=sel_date("jour",$date_naiss_j)?></select> <select name="date_naiss_m" class="select"><?=sel_date("mois",$date_naiss_m)?></select> <select name="date_naiss_a" class="select"><?=sel_date("annee",$date_naiss_a,1995)?></select></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Adresse* :</td>
                                          <td><input name="adresse" type="text" value="<?=$adresse?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Code postal* :</td>
                                          <td><input name="cp" type="text" value="<?=$cp?>" class="inputtext" size="10" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Ville* :</td>
                                          <td><input name="ville" type="text" value="<?=$ville?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Tél* :</td>
                                          <td><input name="tel" type="text" value="<?=$tel?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Mail* :</td>
                                          <td><input name="mail" type="text" value="<?=$mail?>" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Inscription newsletter :</td>
                                          <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                                        </tr>
                                    </table>
                                      
                                      </td>
                                    </tr>
                                  </table>
								  
								 
                                </tr>                               
                              </table><br />
                              <hr>
                              <table width="100%"border="0" cellpadding="0" cellspacing="0">
                               
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                    
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td>
											<div class="titles">                          
											<h2>&nbsp;Mode de paiement </h2>                              
											</div></td>
                                          </tr>
                                        </table>
                                    </tr>
                                 
                                  </table>
								  </td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;">
								  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  
                                      <?
										$limite = 30;
										$nb_jour = diff_date($data_dd["date_debut"], date("Y-m-d"));
										/*if($nb_jour < 30){
											$limite = $nb_jour-2;
										}*/
										?>
                                      
                                      <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                                        <tr>
                                        <? if($nb_jour <= $limite){ ?>
                                        <td align="left" width="33%" valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="6" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cb.gif" width="120" /></td></tr><tr><td align="center"><b>Tout CB</b></td></tr></table>
                                            <br />
                                            Le départ étant a moins de 30 jours, le montant total du séjour sera prélevé sur votre CB à l’inscription
                                        </td>
                                        <? }else{ ?>
                                        <td align="left" width="33%" valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="5" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cb.gif" width="120" /></td></tr><tr><td align="center"><b>Acompte + Solde par CB</b></td></tr></table>
                                            <br />
                                            Vous payez l'acompte immédiatement en CB. Le solde sera prélevé automatiquement sur votre CB <?=$limite?> jours avant le départ.
                                        </td>
                                        <? } ?>
										
                                        <td align="left" width="33%" valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="1" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cb.gif" width="70" /><br /><img src="images/logo_cheque.jpg" width="70" /></td></tr><tr><td align="center"><b>Acompte par CB + Solde par ch&egrave;que</b></td></tr></table>
                                            <br />
                                            <? if($nb_jour < $limite){ ?>
                                            Vous payez l'acompte immédiatement en CB. Le départ étant à moins de 30 jours, le solde du séjour doit nous parvenir par ch&egrave;que sous 3 jours ouvrés.
                                            <? }else{ ?>
                                            Vous payez l'acompte immédiatement en CB. Le solde devra &ecirc;tre versé par ch&egrave;que 45 jours avant le départ.
                                            <? } ?>
                                        </td>
                                        <? if($nb_jour < $limite){ ?>
                                        <td align="left" valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="7" checked="checked" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cheque.jpg" /></td></tr><tr><td align="center"><b>Tout ch&egrave;que</b></td></tr></table>
                                            <br />
                                            Le départ étant à moins de 30 jours, le montant total du séjour doit nous parvenir par ch&egrave;que sous 3 jours ouvrés.
                                        </td>
                                        <? }else{ ?>
                                        <td align="left" valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="2" checked="checked" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cheque.jpg" /></td></tr><tr><td align="center"><b>Acompte + Solde par ch&egrave;que</b></td></tr></table>
                                            <br />
                                            L'acompte doit &ecirc;tre envoyé par ch&egrave;que sous 7 jours. Le solde devra &ecirc;tre versé par ch&egrave;que 45 jours avant le départ.
                                        </td>
										 <? } ?>
										
                                        </tr>
                                        <tr><td height="15"></td></tr>
                                        <tr><td colspan="3">Le montant total de l'acompte est de <span id="acompte"><?=$acompte?></span> € (500€ majoré des assurances souscrites).<br />Le solde est de <span id="solde"><?=($total-$acompte)?></span> €.<br /><br /><input type="checkbox" name="valider" id="valider"> &nbsp;&nbsp;&nbsp; J'accepte sans réserve les modalités d'inscription et les conditions <a href="cgv_gene.php" target="_blank" class="lienGris2" style="font-weight:bold"> générales</a> et <a href="cgv_junior.php" target="_blank" class="lienGris2" style="font-weight:bold">particuli&egrave;res</a> de vente.</td></tr>
                                    </table>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                               
                              </table><br />
                              
                              <div align="right"><a href="#" onclick="verifForm(); _gaq.push(['_trackPageview', '/reservation-jeune.php']); return false;"><input  align="right" class="button" width="50" value="Valider"></a></div>
                              
                            </div>
                            </form>
                            
                        

<script type="text/javascript">

<? if((isset($_GET["id_reservation"]) && $_GET["id_reservation"] != "") || (isset($_POST["ok"]) && $_POST["ok"] == "1")){ ?>
maj_prix();
<? } ?>

</script>
                        
                      </td>
                    </tr>
                  </table>
				   </div>
              	<!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_juniors.php"); ?> 
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			