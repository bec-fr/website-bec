<!DOCTYPE html>
<? include("connect.php"); ?><html lang="fr"> 
   <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <title>Bec séjours linguistiques adultes - Etablir un devis - Etape 2</title>   
       
	   <meta name="description" content="etablir un devis pour adultes">  
	   <!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">   
	   <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">  
	   <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin"> 
       <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">   
	   <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">   
	   <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head>
	   <? include("top_adultes.php"); ?>
<script>
	function verifForm(){
		testm = false ;
		for (var j=1 ; j<(document.mail.mail.value.length) ; j++) {
			if (document.mail.mail.value.charAt(j)=='@') { 
				if (j<(document.mail.mail.value.length-4)){ 
					for (var k=j ; k<(document.mail.mail.value.length-2) ; k++) { 
						if (document.mail.mail.value.charAt(k)=='.') testm = true;
					} 
				} 
			} 
		}
		a="0";
		
		if (document.mail.nom.value.length == 0) {alert('Vous n\'avez pas indiqué votre nom.'); a="1"; document.mail.nom.focus();}
		else if (document.mail.niveau.value.length == 0) {alert('Vous n\'avez pas indiqué votre niveau.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqué votre prénom.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.nationalite.value.length == 0) {alert('Vous n\'avez pas indiqué votre nationalité.'); a="1"; document.mail.nationalite.focus();}
		else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.mail.mail.focus();}				else if (document.mail.tel.value.length == 0) {alert('Merci de nous indiquer un numéro de téléphone.'); a="1"; document.mail.tel.focus();}
		else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>

<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>
 <!-- Section Title -->            <div class="section_title features">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> Demander un devis pour un séjour étudiant adulte</h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>Séjour Linguistique Adulte</a>  / Etablir un devis</a></span>			                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">						
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	//$query = "UPDATE devis SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', datenaiss = '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."' WHERE id = '".addslashes($_GET["id"])."'";
	$query = "INSERT INTO devis (destination, formule, hebergement, nb_sem, date_debut, frais_adm,ass_assistance, ass_annulation, ass_interruption, taux, total, datetime, nom, prenom,nationalite, datenaiss,niveau , adresse, cp, ville, tel, mail) VALUES ('".addslashes($_SESSION["devis_destination"])."', '".addslashes($_SESSION["devis_formule"])."', '".addslashes($_SESSION["devis_hebergement"])."', '".addslashes($_SESSION["devis_nb_sem"])."', '".addslashes($_SESSION["devis_date_debut"])."', '".addslashes($_SESSION["devis_frais_adm"])."', '".addslashes($_SESSION["devis_ass_assistance"])."', '".addslashes($_SESSION["devis_ass_annulation"])."', '".addslashes($_SESSION["devis_ass_interruption"])."', '".addslashes($_SESSION["taux"])."','".addslashes($_SESSION["devis_total"])."', '".date("Y-m-d H:i:s")."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["nationalite"])."', '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', '".addslashes($_POST["niveau"])."','".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."')";		
	mysql_query($query) or die(mysql_error());
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis étudiant/adulte.");
	
	if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
		mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '6')");
	}
	
	?>
    <!-- Google Code for Demande devis etudiant Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "1HhdCJCl3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=1HhdCJCl3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for Devis Etudiant/Adulte Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "JR5ICLituwgQgKKQzwM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971247872/?value=0&amp;label=JR5ICLituwgQgKKQzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/06439453-89a6-4c59-8b71-7f259756792f/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"2863895",type:"1",actionid:"227083"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/06439453-89a6-4c59-8b71-7f259756792f/analytics.html?dedup=1&domainId=2863895&type=1&actionid=227083" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

<script type="application/javascript" src="https://s.yimg.com/wi/ytc.js"></script><script type="application/javascript">YAHOO.ywa.I13N.fireBeacon([{"projectId" : "1000179072403","coloId" : "SP","properties" : {/*"documentName" : "",*/"pixelId" : "19691","qstrings" : {}}}]);</script>
<img src="https://sp.analytics.yahoo.com/spp.pl?a=1000179072403&.yp=19691&js=no"/>

    <?
	
	echo "<br><br><div align='center' class='texteBleu'><b>Merci pour votre demande de devis.<br>Un conseiller vous contacter afin de finaliser votre demande</b></div><br><br>";
}else{

?>
<br />
                                                  
             				<div class="titles">					                                <span>ETAPE 2/2 : préincription </span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un séjour étudiant adulte 2/2</h1>                               						  </div>						 
                 <form class="form-horizontal" action=""  method="post" name="mail" >	
				 <input type="hidden" value="1" name="ok" />					
				 <div class="search_box2">						<div class="form-group">							<label class="col-sm-3 control-label">Nom*</label>	
				 <div class="col-sm-9"><input name="nom" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>			
				 <div class="form-group">							<label  class="col-sm-3 control-label">Prénom*</label>	
				 <div class="col-sm-9"><input name="prenom" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>	
				 <div class="form-group">							<label  class="col-sm-3 control-label">Nationalite*</label>	
				 <div class="col-sm-9"><input name="nationalite" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>	
				 <div class="form-group">	
				 <label class="col-sm-3 control-label">Date de naissance </label>		
				 <div class="col-sm-9"><select name="date_naiss_j" class="select"><?=sel_date("jour","")?></select>
				 <select name="date_naiss_m" class="select"><?=sel_date("mois","")?></select> <select name="date_naiss_a" class="select"><?=sel_date("annee","",1965)?></select>	</div>	
				 </div>				
				 <div class="form-group">		
				 <label  class="col-sm-3 control-label">Niveau de langue*</label>							
				 <div class="col-sm-9">
				 <select name="niveau">
				  <option value="">Indiquez votre niveau </option>
				 <option value="Débutant - A0">Débutant - A0</option>
				 <option value="Elémentaire - A1">Elémentaire - A1</option>
				  <option value="Pre-intermédiaire - A2">Pré-intermédiaire - A2</option>
				  <option value="Intermédiaire - B1">Intermédiaire - B1</option>
				  <option value="Intermédiaire supérieur - B2">Intermédiaire supérieur - B2</option>
				  <option value="Avancé - C1">Avancé - C1</option>
				    <option value="Compétent-Courant - C2">Compétent/Courant - C2</option>
				 
				 </select>
				 
				 
				  
				 
				 </div>	

				 </div>		
				
				 <div class="form-group">		
				 <label  class="col-sm-3 control-label">Adresse :</label>							
				 <div class="col-sm-9"><input name="adresse" type="text" value="" class="inputtext" size="40" /></div>						</div>				
				 <div class="form-group">							<label  class="col-sm-3 control-label">Code postal:</label>							
				 <div class="col-sm-9"><input name="cp" type="text" value="" class="inputtext" size="10" /></div>						</div>						<div class="form-group">		
				 <label  class="col-sm-3 control-label">Ville:</label>							<div class="col-sm-9"><input name="ville" type="text" value="" class="inputtext" size="40" /></div>			
				 </div>						
				 
				 <div class="form-group">							<label  class="col-sm-3 control-label">Tel. mobile*:</label>	
				 <div class="col-sm-9"><input name="tel" type="tel" value="" class="inputtext" size="10" /></div>						</div>												<div class="form-group">							<label  class="col-sm-3 control-label">Mail*:</label>							
				 <div class="col-sm-9"><input name="mail" type="email" required="required" value="" class="inputtext" size="40" /></div>
				 </div>	
				 <div class="form-group">					
				 <label  class="col-sm-3 control-label">Inscription newsletter :</label>	
				 <div class="col-sm-9"><input name="newsletter" type="checkbox" value="1" checked="checked" /></div>						</div>			
				 <div align="right"><input  align="right" type="submit"  onclick="javascript:verifForm(); _gaq.push(['_trackPageview', '/devis-etudiant-adulte.php']); return false;" class="button" value="Etablir le devis"></div>											  </form>				</div>	
				 
				 <div><h2>Quel est votre niveau de langue ?</h2><i>Certains cours possédent un niveau minimum requis pour pouvoir s'incrire.</i><br><li><b>Niveau 1 (A0) : Débutant</b><br>
Vous pouvez parler et comprendre la langue de manière très limitée, voire inexistante.

<li><b>Niveau 2 (A1) : Élémentaire</b><br>
Vous pouvez comprendre la langue dans des situations quotidiennes élémentaires si votre interlocuteur parle doucement et clairement. Vous comprenez et utilisez des expressions simples. Améliorez vos compétences d’écoute et le vocabulaire.

<li><b>Niveau 3 (A2) : Pré-intermédiaire</b><br>
Vous pouvez communiquer et vous faire comprendre avec des messages simples dans certains contextes quotidiens. Développez vos compétences en grammaire, vocabulaire et à l’oral.

<li><b>Niveau 4 (B1) : Intermédiaire</b><br>
Vous pouvez parler la langue de manière compréhensible, cohérente et avec assurance sur des sujets de la vie courante qui vous sont familiers. Améliorez vos compétences en grammaire et élargissez votre vocabulaire.

<li><b>Niveau 5 (B2) : Intermédiaire supérieur</b><br>
Vous pouvez utiliser la langue de manière efficace et vous exprimer précisément. Développez votre aisance à l’oral en discutant, débattant et exprimant votre opinion de manière plus approfondie. Affinez votre utilisation de la grammaire et votre vocabulaire.

<li><b>Niveau 6 (C1) : Avancé</b><br>
Vous pouvez parler la langue de manière plus complexe, spontanée et sur des sujets variés. Étendez votre gamme de vocabulaire et affinez le style utilisé pour acquérir une aisance plus marquée.
<li><b>Niveau 7 (C2) : Compétent/Courant </b><br>
Vous pouvez utiliser la langue avec aisance et facilité en argumentant sur des sujets complexes. Améliorez votre compréhension des nuances de la langue et engagez une lecture indépendante pour perfectionner votre vocabulaire.	<br>			
				</div>		
				 
                <? } ?>
                                  
								  
								  <!-- fin formulaire -->																                        </div>                                       <!-- fin contenu -->						<!-- Aside -->				
								  <? include("droite_adultes.php"); ?> 						</div>                     <!-- contenu bas pages sur toute largeur-->					            </section>            <!-- End content info--> <? include("footer.php"); ?>   