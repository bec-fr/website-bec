<!DOCTYPE html>
<? include("connect.php"); ?><html lang="fr"> 
   <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <title>Bec s�jours linguistiques adultes - Etablir un devis - Etape 2</title>   
       
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
		
		if (document.mail.nom.value.length == 0) {alert('Vous n\'avez pas indiqu� votre nom.'); a="1"; document.mail.nom.focus();}
		else if (document.mail.niveau.value.length == 0) {alert('Vous n\'avez pas indiqu� votre niveau.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqu� votre pr�nom.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.nationalite.value.length == 0) {alert('Vous n\'avez pas indiqu� votre nationalit�.'); a="1"; document.mail.nationalite.focus();}
		else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqu� votre adresse e-mail.'); a="1"; document.mail.mail.focus();}				else if (document.mail.tel.value.length == 0) {alert('Merci de nous indiquer un num�ro de t�l�phone.'); a="1"; document.mail.tel.focus();}
		else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>

<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>
 <!-- Section Title -->            <div class="section_title features">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> Demander un devis pour un s�jour �tudiant adulte</h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>S�jour Linguistique Adulte</a>  / Etablir un devis</a></span>			                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">						
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	//$query = "UPDATE devis SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', datenaiss = '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."' WHERE id = '".addslashes($_GET["id"])."'";
	$query = "INSERT INTO devis (destination, formule, hebergement, nb_sem, date_debut, frais_adm,ass_assistance, ass_annulation, ass_interruption, taux, total, datetime, nom, prenom,nationalite, datenaiss,niveau , adresse, cp, ville, tel, mail) VALUES ('".addslashes($_SESSION["devis_destination"])."', '".addslashes($_SESSION["devis_formule"])."', '".addslashes($_SESSION["devis_hebergement"])."', '".addslashes($_SESSION["devis_nb_sem"])."', '".addslashes($_SESSION["devis_date_debut"])."', '".addslashes($_SESSION["devis_frais_adm"])."', '".addslashes($_SESSION["devis_ass_assistance"])."', '".addslashes($_SESSION["devis_ass_annulation"])."', '".addslashes($_SESSION["devis_ass_interruption"])."', '".addslashes($_SESSION["taux"])."','".addslashes($_SESSION["devis_total"])."', '".date("Y-m-d H:i:s")."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["nationalite"])."', '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', '".addslashes($_POST["niveau"])."','".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."')";		
	mysql_query($query) or die(mysql_error());
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis �tudiant/adulte.");
	
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
                                                  
             				<div class="titles">					                                <span>ETAPE 2/2 : pr�incription </span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un s�jour �tudiant adulte 2/2</h1>                               						  </div>						 
                 <form class="form-horizontal" action=""  method="post" name="mail" >	
				 <input type="hidden" value="1" name="ok" />					
				 <div class="search_box2">						<div class="form-group">							<label class="col-sm-3 control-label">Nom*</label>	
				 <div class="col-sm-9"><input name="nom" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>			
				 <div class="form-group">							<label  class="col-sm-3 control-label">Pr�nom*</label>	
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
				 <option value="D�butant - A0">D�butant - A0</option>
				 <option value="El�mentaire - A1">El�mentaire - A1</option>
				  <option value="Pre-interm�diaire - A2">Pr�-interm�diaire - A2</option>
				  <option value="Interm�diaire - B1">Interm�diaire - B1</option>
				  <option value="Interm�diaire sup�rieur - B2">Interm�diaire sup�rieur - B2</option>
				  <option value="Avanc� - C1">Avanc� - C1</option>
				    <option value="Comp�tent-Courant - C2">Comp�tent/Courant - C2</option>
				 
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
				 
				 <div><h2>Quel est votre niveau de langue ?</h2><i>Certains cours poss�dent un niveau minimum requis pour pouvoir s'incrire.</i><br><li><b>Niveau 1 (A0) : D�butant</b><br>
Vous pouvez parler et comprendre la langue de mani�re tr�s limit�e, voire inexistante.

<li><b>Niveau 2 (A1) : �l�mentaire</b><br>
Vous pouvez comprendre la langue dans des situations quotidiennes �l�mentaires si votre interlocuteur parle doucement et clairement. Vous comprenez et utilisez des expressions simples. Am�liorez vos comp�tences d��coute et le vocabulaire.

<li><b>Niveau 3 (A2) : Pr�-interm�diaire</b><br>
Vous pouvez communiquer et vous faire comprendre avec des messages simples dans certains contextes quotidiens. D�veloppez vos comp�tences en grammaire, vocabulaire et � l�oral.

<li><b>Niveau 4 (B1) : Interm�diaire</b><br>
Vous pouvez parler la langue de mani�re compr�hensible, coh�rente et avec assurance sur des sujets de la vie courante qui vous sont familiers. Am�liorez vos comp�tences en grammaire et �largissez votre vocabulaire.

<li><b>Niveau 5 (B2) : Interm�diaire sup�rieur</b><br>
Vous pouvez utiliser la langue de mani�re efficace et vous exprimer pr�cis�ment. D�veloppez votre aisance � l�oral en discutant, d�battant et exprimant votre opinion de mani�re plus approfondie. Affinez votre utilisation de la grammaire et votre vocabulaire.

<li><b>Niveau 6 (C1) : Avanc�</b><br>
Vous pouvez parler la langue de mani�re plus complexe, spontan�e et sur des sujets vari�s. �tendez votre gamme de vocabulaire et affinez le style utilis� pour acqu�rir une aisance plus marqu�e.
<li><b>Niveau 7 (C2) : Comp�tent/Courant </b><br>
Vous pouvez utiliser la langue avec aisance et facilit� en argumentant sur des sujets complexes. Am�liorez votre compr�hension des nuances de la langue et engagez une lecture ind�pendante pour perfectionner votre vocabulaire.	<br>			
				</div>		
				 
                <? } ?>
                                  
								  
								  <!-- fin formulaire -->																                        </div>                                       <!-- fin contenu -->						<!-- Aside -->				
								  <? include("droite_adultes.php"); ?> 						</div>                     <!-- contenu bas pages sur toute largeur-->					            </section>            <!-- End content info--> <? include("footer.php"); ?>   