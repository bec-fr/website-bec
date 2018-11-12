<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(!isset($_POST["nom"]) || $_POST["nom"] == ""){
	echo "<script>document.location.href='index_junior.php';</script>";
	exit();
}

$query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays, v.id as idville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";
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

$prix_sejour = $data_dd["tarif"];
$avion_tarif = (($data_dd["avion_tarif2"] != "0") ? $data_dd["avion_tarif2"] : $data_d["avion_tarif"]);
?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques Juniors - confirmation inscription</title>  
        <meta name="keywords" content="Confirmation inscription séjours" />
        <meta name="description" content="BEC Séjour linguistiques - confirmation inscription séjour junior">
        <meta name="author" content="BEC séjours linguistiques">  
        
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
<? include("top_juniors_cro.php"); ?>
           <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Reserver un séjour junior - Confirmation inscription</h1>
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
                    <!-- End Newsletter Box -->
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                            <!-- Contenu-->

<?
$total = $prix_sejour;
$total += $avion_tarif;

for($i=1 ; $i<=3 ; $i++){
	if(isset($_POST["option_transport".$i])){
		$query2 = "SELECT prix FROM junior_option_transport WHERE id = '".addslashes($_POST["option_transport".$i])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$data2 = mysql_fetch_row($exec2);
		$total += $data2[0];
		$num_option_transport = $_POST["option_transport".$i];
		$transport_valeur = stripslashes($_POST["transport_valeur".$i]);
		echo $transport_valeur;
	}
}
for($i=1 ; $i<=5 ; $i++){
	if(isset($_POST["option_activite".$i])){
		$total += $data_d["option_prix".$i];
		$num_option_activite = $i;
	}
}
for($i=1 ; $i<=5 ; $i++){
	if(isset($_POST["option_hebergement".$i])){
		$total += $data_d["option_prix".$i];
		$num_option_hebergement = $i;
	}
}

$query2 = "SELECT * FROM junior_reduction WHERE 1 AND ((date_debut = '0000-00-00' AND date_fin = '0000-00-00') OR (date_debut <= CURRENT_DATE() AND date_fin >= CURRENT_DATE()))";
$exec2 = mysql_query($query2) or die(mysql_error());
$i=1; $reduction_num=0;
while($data2 = mysql_fetch_assoc($exec2)){
	if(isset($_POST["reduction_".$i]) && $_POST["reduction_".$i] == $data2["id"]){
		$total -= $data2["prix"];
		$reduction_num = $data2["id"];
	}
	$i++;
}

if(isset($_SESSION['code']))
	$code = $_SESSION['code'];
else
	$code = "";
$avoir = calcul_avoir($prix_sejour, $code, $data_d["id"]);

$soustotal = $total;
$tot_assurance = 0;
if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
	$total += $soustotal*0.03;
	$tot_assurance += $soustotal*0.03;
}
if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
	$total += $soustotal*0.045;
	$tot_assurance += $soustotal*0.045;
}
$tot_assurance = round($tot_assurance, 2);
$acompte = 500+$tot_assurance;

$total -= $avoir;
$total = round($total, 2);

$mail = trim(stripslashes($_POST["mail"]));
$saison = "7";

$query = "INSERT INTO reservation_junior (rid_fiche, rid_date, ass_annulation, ass_interruption, reduction_1, reduction_2, reduction_3, reduction_4, reduction_num, sexe, nom, prenom, datenaiss, adresse, cp, ville, tel, mail, tarif_sejour, soustotal, tot_assurance, total, acompte, date_com, type_paiement, saison, num_option_activite, num_option_hebergement, num_option_transport, transport_valeur, avion_tarif, avoir, avoir_code) VALUES ('".addslashes($_GET["fiche"])."', '".addslashes($_GET["date"])."', '".addslashes($_POST["ass_annulation"])."', '".addslashes($_POST["ass_interruption"])."', '".addslashes($_POST["reduction_1"])."', '".addslashes($_POST["reduction_2"])."', '".addslashes($_POST["reduction_3"])."', '".addslashes($_POST["reduction_4"])."', '".$reduction_num."', '".addslashes($_POST["sexe"])."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."', '".$prix_sejour."', '".$soustotal."', '".$tot_assurance."', '".$total."', '".$acompte."', NOW(), '".addslashes($_POST['paiement'])."', '".$saison."', '".$num_option_activite."', '".$num_option_hebergement."', '".$num_option_transport."', '".addslashes($transport_valeur)."', '".$avion_tarif."', '".$avoir."', '".addslashes((isset($_SESSION['code'])) ? $_SESSION['code'] : "")."')";
mysql_query($query) or die(mysql_error());
//echo $query."<br>";
$id_reservation = mysql_insert_id();

if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
	mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '5')");
}

//décrémentation du stock
mysql_query("UPDATE fiche_junior_date SET stock = stock-1 WHERE id = '".addslashes($_GET["date"])."'") or die(mysql_error());
?>

<!-- Google Code for Reservation Sejour Junior Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "x2SZCJjN3QIQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=x2SZCJjN3QIQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for R&eacute;servation Jeunes Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "5sdiCKivuwgQgKKQzwM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971247872/?value=0&amp;label=5sdiCKivuwgQgKKQzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/06439453-89a6-4c59-8b71-7f259756792f/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"2863895",type:"1",actionid:"227086"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/06439453-89a6-4c59-8b71-7f259756792f/analytics.html?dedup=1&domainId=2863895&type=1&actionid=227086" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>


						
                        <div class="zone_contenu" style="border-bottom:1px solid #f2f2f2; margin-bottom:8px;">
                          <div style="float:left;" class="titreJaune"><strong><?=stripslashes($data_d["nom"])?></strong></div>
                        
                        </div>
                        
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? $bloc = ""; ?>
						
                            
                            <div class="junior_col_contenu">
                              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                               
                                <tr>
                                 
								  <table width="100% border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                    
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td>
											<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%">Récapitulatif</td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table>
											
											</td>
                                          </tr>
                                        </table>
                                    </tr>
                                   
                                  </table>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  
                                      <?
									  $total = $prix_sejour;
									  $acompte = 500;
									  ?>
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr><td class="texteBleu" style="font-size:12px"><b>INSCRIPTION &Agrave; UN S&Eacute;JOUR</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <tr><td width="70%">Séjour à <b><?=stripslashes($data_d["ville"])?></b></td><td align="right">du <?=parseDate($data_dd["date_debut"])?> au <?=parseDate($data_dd["date_fin"])?></td></tr>
                                      <tr><td>Montant du séjour</td><td align="right"><?=$total?> €</td></tr>
                                      <? if($avion_tarif != "0"){ ?>
									  <?
                                      $total += $avion_tarif;
									  ?>
                                      <tr><td>Taxes aéroports et surcharge carburant</td><td align="right"><?=$avion_tarif?> €</td></tr>
                                      <? } ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><?=$total?> €</b></td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options de transport :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <? for($i=1 ; $i<=3 ; $i++){ ?>
                                      <?
                                      if(isset($_POST["option_transport".$i])){
										  $query2 = "SELECT * FROM junior_option_transport WHERE id = '".addslashes($_POST["option_transport".$i])."'";
										  $exec2 = mysql_query($query2) or die(mysql_error());
										  $data2 = mysql_fetch_assoc($exec2);
										  $total += $data2["prix"];
										  ?>
                                          <tr><td><?=stripslashes($data2["nom"])?> <?=$transport_valeur?></td><td align="right"><?=parsePrix($data2["prix"])?> €</td></tr>
										  <?
                                      }
									  ?>
                                      <? } ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot1"><?=$total?></span> €</b></td></tr>
                                      <?
									  $aff_option_activite = false;
									  for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "activité"){// && $data_d["option_prix".$i] != "0"
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
									  <? if(isset($_POST["option_activite".$i])){ ?>
									  <?
                                      $total += $data_d["option_prix".$i];
									  ?>
                                      <tr><td><?=stripslashes($data_d["option_nom".$i])?></td><td align="right"><?=parsePrix($data_d["option_prix".$i])?> €</td></tr>
									  <? } ?>
									  <? } ?>
                                      <?
									  $aff_option_hebergement = false;
									  for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "hébergement"){// && $data_d["option_prix".$i] != "0"
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
									  <? if(isset($_POST["option_hebergement".$i])){ ?>
									  <?
                                      $total += $data_d["option_prix".$i];
									  ?>
                                      <tr><td><?=stripslashes($data_d["option_nom".$i])?></td><td align="right"><?=parsePrix($data_d["option_prix".$i])?> €</td></tr>
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
										  if(isset($_POST["reduction_".$i]) && $_POST["reduction_".$i] == $data2["id"]){
											  $total -= $data2["prix"];
											  $txt = stripslashes($data2["nom"]);
											  ?>
                                              <tr><td><?=$txt?></td><td align="right">-<?=$data2["prix"]?> €</td></tr>
                                              <?
										  }
										  $i++;
									  }
									  ?>
                                      <tr><td align="right">Sous Total</td><td align="right"><b><span id="tot3"><?=$total?></span> €</b></td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Code de réduction :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <tr><td>Je dispose d’un code de réduction</td></tr>
                                      <tr><td><b><?=((isset($_SESSION['code']) && $_SESSION['code'] != "") ? $_SESSION['code'] : "")?></b></td><td align="right"><?=$avoir?> €</td></tr>
                                      <tr><td height="10"></td></tr>
                                      <tr><td class="texteBleu" style="font-size:12px"><b>Options d'assurance :</b></td></tr>
                                      <tr><td height="5"></td></tr>
                                      <?
                                      $soustotal = $total;
									  $tot_assurance = 0;
									  if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
										  $tot_assurance += $soustotal*0.03;
										  ?>
                                          <tr><td>Assurance annulation (3%)</td><td align="right"><?=parsePrix($soustotal*0.03)?> €</td></tr>
										  <?
                                      }
									  if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
										  $tot_assurance += $soustotal*0.045;
										  ?>
                                          <tr><td>Pack multirisques (4,5%)</td><td align="right"><?=parsePrix($soustotal*0.045)?> €</td></tr>
										  <?
                                      }
									  $tot_assurance = round($tot_assurance, 2);
									  $total += $tot_assurance;
									  $total -= $avoir;
									  ?>
                                      <tr><td align="right">Montant Total</td><td align="right"><b><span id="tot4"><?=$total?></span> €</b></td></tr>
                                      </table>
                                      
                                      <?
									  $acompte = 500+$tot_assurance;
									  ?>
									  
                                      <br />
                                      
                                      <div style="border-bottom:#666666 1px solid; width:95%; margin:auto;"></div>
                                      <br />
                                      
<?
if($_POST['paiement']==1){
	$key = "7367801851812003"; //8789563990781189
    // Initialisation des paramètres
    $params = array(); // tableau des paramètres du formulaire
    $params['vads_site_id'] = "79705806";
    $params['vads_amount'] = 100*$acompte; // en cents
    $params['vads_currency'] = "978"; // norme ISO 4217
    $params['vads_ctx_mode'] = "PRODUCTION"; //TEST
    $params['vads_page_action'] = "PAYMENT";
    $params['vads_action_mode'] = "INTERACTIVE"; // saisie de carte réalisée par la plateforme
    $params['vads_payment_config']= "SINGLE";
    $params['vads_version'] = "V2";
    $params['vads_shop_url'] = $url_site;
    
    $params['vads_url_cancel'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_error'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_referral'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_refused'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_success'] = $url_site."/ok_cro.php?id_reservation=".$id_reservation;
    
    $ts = time();
    $params['vads_trans_date'] = gmdate("YmdHis", $ts);
    $trans_id = sprintf("%06d",$id_reservation);
    $params['vads_trans_id'] = $trans_id;
    $params['vads_order_id'] = $id_reservation;
    $params['vads_cust_email'] = $mail;
    
    ksort($params); // tri des paramètres par ordre alphabétique
    $contenu_signature = "";
    foreach ($params as $nom => $valeur){
        $contenu_signature .= $valeur."+";
    }
    $contenu_signature .= $key; // On ajoute le certificat à la fin
    $params['signature'] = sha1($contenu_signature);
    ?>
    <div style="text-align:center">
    <form name="paiement_banque" method="POST" action="https://systempay.cyberpluspaiement.com/vads-payment/">
    <?
    foreach($params as $nom => $valeur){
        echo '<input type="hidden" name="' . $nom . '" value="' . $valeur . '" />';
    }
    ?>
    <input type="image" src="images/btPayer<?=$fic_nom?>.jpg" alt="Payer" />
    </form>
    </div>
    <script>
    //document.paiement_banque.submit();
    </script>
    <br />
    <?
}elseif($_POST['paiement']==6){
	$key = "7367801851812003"; //8789563990781189
    // Initialisation des paramètres
    $params = array(); // tableau des paramètres du formulaire
    $params['vads_site_id'] = "79705806";
    $params['vads_amount'] = 100*$total; // en cents
    $params['vads_currency'] = "978"; // norme ISO 4217
    $params['vads_ctx_mode'] = "PRODUCTION"; //TEST
    $params['vads_page_action'] = "PAYMENT";
    $params['vads_action_mode'] = "INTERACTIVE"; // saisie de carte réalisée par la plateforme
    $params['vads_payment_config']= "SINGLE";
    $params['vads_version'] = "V2";
    $params['vads_shop_url'] = $url_site;
    
    $params['vads_url_cancel'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_error'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_referral'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_refused'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_success'] = $url_site."/ok_cro.php?id_reservation=".$id_reservation;
    
    $ts = time();
    $params['vads_trans_date'] = gmdate("YmdHis", $ts);
    $trans_id = sprintf("%06d",$id_reservation);
    $params['vads_trans_id'] = $trans_id;
    $params['vads_order_id'] = $id_reservation;
    $params['vads_cust_email'] = $mail;
    
    ksort($params); // tri des paramètres par ordre alphabétique
    $contenu_signature = "";
    foreach ($params as $nom => $valeur){
        $contenu_signature .= $valeur."+";
    }
    $contenu_signature .= $key; // On ajoute le certificat à la fin
    $params['signature'] = sha1($contenu_signature);
    ?>
    <div style="text-align:center">
    <form name="paiement_banque" method="POST" action="https://systempay.cyberpluspaiement.com/vads-payment/">
    <?
    foreach($params as $nom => $valeur){
        echo '<input type="hidden" name="' . $nom . '" value="' . $valeur . '" />';
    }
    ?>
    <input type="image" src="images/btPayer<?=$fic_nom?>.jpg" alt="Payer" />
    </form>
    </div>
    <script>
    //document.paiement_banque.submit();
    </script>
    <br />
    <?
}elseif($_POST['paiement']==5){
	$limite = 30;
	$nb_jour = diff_date($data_dd["date_debut"], date("Y-m-d"));
	/*if($nb_jour < 30){
		$limite = $nb_jour-2;
	}*/
	
	$date_tmp = explode("-", $data_dd["date_debut"]);
	$mktime = mktime(0, 0, 0, $date_tmp[1], $date_tmp[2]-$limite, $date_tmp[0]);
	
	$datedebut_paiement = date("Ymd");
	$datefin_paiement = date("Ymd", $mktime);
	
	$key = "7367801851812003"; //8789563990781189
    // Initialisation des paramètres
    $params = array(); // tableau des paramètres du formulaire
    $params['vads_site_id'] = "79705806";
    $params['vads_amount'] = 100*$total; // en cents
    $params['vads_currency'] = "978"; // norme ISO 4217
    $params['vads_ctx_mode'] = "PRODUCTION"; //TEST
    $params['vads_page_action'] = "PAYMENT";
    $params['vads_action_mode'] = "INTERACTIVE"; // saisie de carte réalisée par la plateforme
    $params['vads_payment_config']= "MULTI_EXT:".$datedebut_paiement."=".(100*$acompte).";".$datefin_paiement."=".(100*($total-$acompte));
    $params['vads_version'] = "V2";
    $params['vads_shop_url'] = $url_site;
    
    $params['vads_url_cancel'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_error'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_referral'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_refused'] = $url_site."/ko.php?id_reservation=".$id_reservation;
    $params['vads_url_success'] = $url_site."/ok_cro.php?id_reservation=".$id_reservation;
    
    $ts = time();
    $params['vads_trans_date'] = gmdate("YmdHis", $ts);
    $trans_id = sprintf("%06d",$id_reservation);
    $params['vads_trans_id'] = $trans_id;
    $params['vads_order_id'] = $id_reservation;
    $params['vads_cust_email'] = $mail;
    
    ksort($params); // tri des paramètres par ordre alphabétique
    $contenu_signature = "";
    foreach ($params as $nom => $valeur){
        $contenu_signature .= $valeur."+";
    }
    $contenu_signature .= $key; // On ajoute le certificat à la fin
    $params['signature'] = sha1($contenu_signature);
    ?>
    <div style="text-align:center">
    <form name="paiement_banque" method="POST" action="https://systempay.cyberpluspaiement.com/vads-payment/">
    <?
    foreach($params as $nom => $valeur){
        echo '<input type="hidden" name="' . $nom . '" value="' . $valeur . '" />';
    }
    ?>
    <input type="image" src="images/btPayer<?=$fic_nom?>.jpg" alt="Payer" />
    </form>
    </div>
    <script>
    //document.paiement_banque.submit();
    </script>
    <br />
    <?
}elseif($_POST['paiement']==2 || $_POST['paiement']==7){
	envoi_mail($mail, "Réservation : ".$url_site2, "<span style='font-size:16px; font-weight:bold;'>Réservation</span><br><br><br>Ch&egrave;re Cliente, cher Client,<br><br>Nous avons bien reçu l'inscription pour le séjour linguistique à ".stripslashes($data_d["ville"])." et vous remercions pour l'intérêt et la confiance portés à notre organisme.<br /><br />
<b>Pour valider définitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours*, un exemplaire du bulletin d’inscription pré-rempli, dûment complété et signé par vos soins et accompagné d'un acompte de 500€ majoré des assurances souscrites, soit un montant total de ".parsePrix($acompte)." €.</b><br /><br />
<center><a href='".$url_site."/bulletin-pdf.php?id=".$id_reservation."' target='_blank'><img src='".$url_site."/images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
Dans cette attente, nous restons à votre disposition et vous prions d'agréer, Madame, Monsieur, l'expression de nos sentiments les meilleurs.<br /><br /><br />
* Note Importante : toute inscription faite sur le site internet avec paiement par chèque qui n'aura pas été formalisée par l'envoi par courrier du bulletin d'inscription signé et accompagné du chèque d'acompte requis dans le délai de 7 jours, sera automatiquement annulée. Si le séjour débute moins de 15 jours après la date de l'inscription, cet envoi est attendu sous 3 jours ouvrés en nos bureaux. 
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
?>
 <table width="90%" align="center" cellpadding="1" cellspacing="1">
	<tr>
		<td><br>
		Nous avons bien reçu l'inscription pour le séjour linguistique <?=stripslashes($data_d["ville"])?> et vous remercions pour l'intérêt et la confiance portés à notre organisme.<br /><br />
		
<b>Pour valider définitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours*, un exemplaire du bulletin d’inscription pré-rempli, dûment complété et signé par vos soins et accompagné d'un acompte de 500€ majoré des assurances souscrites, soit un montant total de <?=parsePrix($acompte)?> €.</b><br /><br />
		<center><a href="bulletin-pdf.php?id=<?=$id_reservation?>" target="_blank"><img src="images/btn_telecharger_bulletin_inscription.png" border="0" alt="bon de commande" /></a></center><br /><br />
			
            * Note Importante : toute inscription faite sur le site internet avec paiement par chèque qui n'aura pas été formalisée par l'envoi par courrier du bulletin d'inscription signé et accompagné du chèque d'acompte requis dans le délai de 7 jours, sera automatiquement annulée. Si le séjour débute moins de 15 jours après la date de l'inscription, cet envoi est attendu sous 3 jours ouvrés en nos bureaux. 
			<br>
			Dans cette attente, nous restons à votre disposition et vous prions d'agréer, Madame, Monsieur, l'expression de nos sentiments les meilleurs.<br /><br /><br />
			
            <br /><br /><br />
            <center><strong>
            <?=$nom_site?>
            <br />
            <?=$adresse_site1?>
            <br />
            <?=$adresse_site2?>
            <br />
            <?=$pays_site?>
            <br />
            <?=$tel_site?>
            <br />
            </strong></center>
		</td>
	</tr>
 </table>
<? } ?>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>                               
                              </table><br />
                              
                            </div>
                            
                        </div>
                        
                       </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? //include("droite_juniors.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('l6c7t', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l6c7t&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=l6c7t&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>
 <? include("footer_juniors.php"); ?>       