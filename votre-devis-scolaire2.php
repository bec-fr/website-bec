<!DOCTYPE html>
<? include("connect.php"); ?><html lang="fr"> 
   <head>  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	  
   <title>BEC - Finaliser votre devis scolaire 2016-2017</title>  
   
   <meta name="description" content="BEC S�jour linguistiques : Finaliser votre devis scolaire 2018-2019">   
   <meta name="author" content="Bec S�jours Linguistiques">   
   
   <!-- Mobile Metas -->       
   <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">   
   <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">  
   <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">     
   <!-- Favicons -->   
   <link rel="shortcut icon" href="img/icons/favicon.ico">    
   <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        
   <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">   
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->   
   <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer--> 
   <script type="text/javascript" src="http://www.google.com/jsapi"></script>		  
	<STYLE type="text/css">
		.titles h1 {
    border-bottom: 3px solid #c10e12;
		}
		
		
		.titles span {
    /* background-color: #1e1e1e; */
    color: #5c5c5c;
    font-weight: bold;
    font-size: 16px;
    line-height: 30px;
    display: block;
    text-align: center;	
}
th, td {
    padding: 10px;
    
}
		</STYLE>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '325277634598697');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=325277634598697&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

   </head>
    
   <!-- Section Title -->  
   <div class="section_title juniors">          
   <div class="container">         
   <div class="row"> 						                
   <div class="col-md-10"><br>         
   <title>Bec s�jours linguistiques - Votre devis scolaire - finalisation</title>  
   
   </div> 						<div class="col-md-2"></div>						                    </div>         
   </div>                        </div>      
   <!-- End Section Title -->			            <!-- End content info -->
   <section class="content_info">	            
   <div class="container">					<!-- Newsletter Box -->                                  
   <div class="newsletter_box">          
   <div class="container">          
   <div class="row"> 
   
   
     <div class="col-md-8">
                                                 
                                </div>
                                <div align="right" class="col-md-4"><br>
                                 <b>Contactez nous au 01 55 35 25 00</b>
                                    <div id="result-newsletter"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
   <section class="row padding_top">                 
   <!-- Properties -->                         


   <!-- Contenu-->                                               
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
		else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqu� votre pr�nom.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.tel.value.length == 0) {alert('Vous n\'avez pas indiqu� votre tel�phone'); a="1"; document.mail.tel.focus();}
		else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqu� votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
		else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
		else if (document.mail.nom_etab.value.length == 0) {alert('Vous n\'avez pas indiqu� votre �tablissement.'); a="1"; document.mail.nom_etab.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>


					
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	$query = "UPDATE devis_minis SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel_etab = '".addslashes($_POST["tel_etab"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."', nom_etab = '".addslashes($_POST["nom_etab"])."', message = '".addslashes($_POST["message"])."', connu = '".addslashes($_POST["connu"])."' WHERE id = '".addslashes($_GET["id"])."'";
	mysql_query($query) or die(mysql_error());
	$id = mysql_insert_id();
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
	
	if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
		mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '7')");
	}
	
	?>
    


    <?
	echo "<br><br><div align='center' class='texteBleu'><b>Merci pour votre demande.<br>Nous allons vous adresser une proposition dans les plus brefs d�lais.<br>Si des informations manquaient, un conseiller prendra contact avec vous afin d'affiner votre demande.</b></div><br><br>";	
	echo "<meta http-equiv='refresh' content='0;url=http://www.becfrance.com/merci-devis-scolaire.php'>";
	
}


else{

?> <div class="col-md-6 hidden-sm hidden-xs">  

               
						<div>
						<h2>
						<img align="left" hspace="4" width="150" src="img/logo.png"> <b> <?php echo htmlentities($_GET['ecole'],ENT_QUOTES,'UTF-8'); ?> <br>
						
            <?php
if ($_GET['m'] == 1) {
    echo "Votre Offre de Fid�lit� 2018 -2019 ";
} elseif ($_GET['m'] == 2) {
    echo "Votre Offre de Bienvenue 2018 -2019";
} else {
    echo "Vos Offres 2018 - 2019";
} 
?></b>
            </div>
          
              <div> 
              
              <?php
if ($_GET['m'] == 1) {
    echo "<h3>Votre Remise </h3><li> <b>Une remise imm�diate de 310�</b> sur le montant global";
} elseif ($_GET['m'] == 2) {
    echo "<h3>Votre Remise </h3> 
              <li>B�n�ficiez d'une <b>r�duction imm�diate de 150�</b> sur le budget global de votre s�jour. ";
} else {
    echo "<h3>Vos Remises </h3>
            <li> <b>Une remise de 310�</b> si vous avez d�j� effectu� un voyage avec BEC
            <li> <b>Une remise de 150�</b> pour votre premier voyage avec BEC ";
}
?>




              
              <h3 style="padding-top :35px;">En plus</h3>
              <li><b>8 % de r�duction</b> pour tout s�jour avant le 31 janvier 2019 
<li><b>4 % de r�duction</b> pour tout s�jour entre le 1er et le 28 f�vrier 2019 
<br>
<h3 style="padding-top :35px;">Pourquoi choisir BEC ?</h3>
</div>
            <div class="row">
          <div align="center" class="col-md-6 col-xs-6"><img alt="50 ans bec" width="90" class="img-responsive" src="img/50ans.png">Depuis 1967 � votre service</div>
          <div align="center" class="col-md-6 col-xs-6"><img width="90" src="img/contrat-qualite.png"><br>Labelis� Contrat Qualit� de l'Office</div>
          <div align="center" class="col-md-6 col-xs-6"><img alt="assurance" width="90" src="img/assurance.png"><br>Assurance annulation totale scolaire</div>
          <div align="center" class="col-md-6 col-xs-6"><img   width="90"  src="img/garantie-apst.png"><br>Garantie des Fonds D�pos�s </div>
          </div><br>
          
          <br>De 2013 � 2018 : <br><br>
          <li><font style="font-size: 18px"><b>80</b></font> destinations (<a target="_blank" href="http://www.becfrance.com/doc/brochures-scolaires-2017.pdf">cf catalogue</a>)
           <li><font style="font-size: 18px"><b>+ 1200</b></font> voyages organis�s
           <li><font style="font-size: 18px"><b>+ 46.500</b></font> �l�ves et encadrants</b>  
					
					<br>
					<h3 <h3 style="padding-top :35px;">Ils nous font confiance</h3>
                            <blockquote><i>"Notre premier voyage avec BEC a �t� une magnifique r�ussite et je n'attends qu'une chose : repartir ! Merci encore et f�licitations � votre �quipe : Les �l�ves sont ravis. C'est un plaisir de travailler avec vous."</i>
                                <small>Mme Lavillat � <cite title="Source Title">Coll�ge St Fran�ois</cite></small>
                            </blockquote>
							<blockquote><i>"Tr�s bon travail de l'equipe du BEC. Bonnes visites, les �l�ves ont ador�. C'�tait impeccable !"</i>
                                <small>Mme Philippe � <cite title="Source Title">Coll�ge La Peyroua</cite></small>
                            </blockquote>


					</div>
<div class="col-md-6">					
                <table style="background-color: rgba(210, 231, 216, 0.5);"  width="100%" border="0" align="center">
				
                  <form  action="" method="post" name="mail">
				  
                    <input type="hidden" value="1" name="ok" />
                    <tr>									
					<td colspan="2">					
					<div class="titles">      
					<h1><i class="fa fa-edit"></i>&nbsp;Finalisation de votre devis</h1>     <br><br>
					<span style="background-color: rgba(0,178,41,0.01);">Etape 2/2 : Vos coordonn�es</span>     
																   </div>															</td>
                
                    <tr>
                      <td  align="right" ><b>Nom du professeur* :</b></td>
                      <td ><input name="nom" type="text" id="nom" value="<? echo htmlentities ($_GET['nom'],ENT_QUOTES,'UTF-8'); ?>" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" ><b>Pr&eacute;nom* : </b></td>
                      <td><input name="prenom" type="text" id="prenom" value="<? echo htmlentities ($_GET['prenom'],ENT_QUOTES,'UTF-8'); ?>" class="inputtext" size="30" /></td>
                    </tr>					                    <tr>             
					<td align="right" ><b>T�l mobile* :</b></td>                      <td><input name="tel" type="text" id="tel" value="" class="inputtext" size="30" /></td>  
					</tr>              
					<tr>                      <td align="right" class="text"><b>Mail* :</b></td>                      <td><input name="mail" type="text" id="mail" value="<? echo $_GET['email']; ?>" class="inputtext" size="30" /></td>                    </tr>
                    <tr>
                      <td align="right" ><b>Nom de l'�tablissement* :</b></td>
                      <td><input name="nom_etab" type="text" id="nom_etab" value="<? echo htmlentities($_GET['ecole'],ENT_QUOTES,'UTF-8'); ?>"  class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text"><b>Adresse de l'�tablissement* :</b></td>
                      <td><input name="adresse" type="text" id="adresse" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text"><b>Code postal* :</b></td>
                      <td><input name="cp" type="text" id="cp" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text"><b>Ville* :</b></td>
                      <td><input name="ville" type="text" id="ville" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text"><b>T�l �tablissement* :</b></td>
                      <td><input name="tel_etab" type="text" id="tel_etab" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text"><b>Inscription newsletter :</b></td>
                      <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="text"><b>Comment avez-vous connu le BEC ?</b></td>
                      <td><select name="connu" class="select"><option value="">- - -</option><option value="moteurs de recherche">moteurs de recherche</option><option value="l'Office">l'Office</option><option value="mon professeur">mon professeur</option><option value="un ami / ma famille">un ami / ma famille</option><option value="tract sur le salon Expolangues">tract sur le salon Expolangues</option><option value="tract devant ma fac / mon lyc�e">tract devant ma fac / mon lyc�e</option></select></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="text"><b>Message :</b></td>
                      <td><textarea name="message" cols="40" rows="8" id="message" class="textarea"></textarea></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td colspan="2" align="right" valign="bottom">					  					  <input style="font-size: 130%;" align="right" type="submit"  onClick="javascript:verifForm(); _gaq.push(['_trackPageview', '/devis-voyage-scolaire.php']); return false;" class="button" value="Finaliser le devis">					  					 </td>
                    </tr>
                  </form>
                </table>
				</div>
				<div class="col-md-6 hidden-md hidden-lg">  
<br />
               
						<div>
						<h2>
						<img align="left" hspace="4" width="130" src="img/logo.png"> <b> <?php echo htmlentities($_GET['ecole'],ENT_QUOTES,'UTF-8'); ?> <br>
						
						<?php
if ($_GET['m'] == 1) {
    echo "Votre offre de fidelit� 2016 -2017 ";
} elseif ($_GET['m'] == 2) {
    echo "Votre offre de bienvenue 2016 -2017";
} 
?></b>
						</div>
							<div> 
							
							<?php
if ($_GET['m'] == 1) {
    echo "<h3>Vos remises </h3><li> <b>une premi�re remise de 310�</b> si vous avez d�j� effectu� un s�jour au cours des 3 derni�res ann�es
<li> <b>une seconde remise de 150�</b> si votre �tablissement effectue un second voyage au cours de l'ann�e ";
} elseif ($_GET['m'] == 2) {
    echo "<h3>Vos remises </h3> 
							<li>Ben�ficiez d'une <b>offre de r�duction de 150�</b> sur le budget global de votre s�jour. ";
} 
?>



							
							<h3>En plus</h3>
							<li><b>8 % de r�duction</b> pour tout s�jour avant le 31 janvier 2017 
<li><b>4 % de r�duction</b> pour tout s�jour entre le 1er et le 28 f�vrier 2017 

<h3 style="padding-top :35px;">En plus</h3>
							<li><b>8 % de r�duction</b> pour tout s�jour avant le 31 janvier 2017 
<li><b>4 % de r�duction</b> pour tout s�jour entre le 1er et le 28 f�vrier 2017 
<br>
<h3 style="padding-top :35px;">Pourquoi choisir BEC ?</h3>
</div>
						<div class="row">
					<div align="center" class="col-md-6 col-xs-6"><img alt="50 ans bec" width="90" class="img-responsive" src="img/50ans.png">Depuis 1967 � votre service</div>
					<div align="center" class="col-md-6 col-xs-6"><img width="90" src="img/contrat-qualite.png"><br>Labelis� Contrat Qualit� de l'Office</div>
					<div align="center" class="col-md-6 col-xs-6"><img alt="assurance" width="90" src="img/assurance.png"><br>Assurance annulation totale scolaire</div>
					<div align="center" class="col-md-6 col-xs-6"><img   width="90"  src="img/garantie-apst.png"><br>Garantie des Fonds D�pos�s </div>
					</div><br>
					
					En 2015-2016 : <br><br>
					<li><font style="font-size: 18px"><b>80</b></font> destinations (<a target="_blank" href="http://www.becfrance.com/doc/brochures-scolaires-2017.pdf">cf catalogue</a>)
					 <li><font style="font-size: 18px"><b>+ 270</b></font> voyages organis�s
					 <li><font style="font-size: 18px"><b>+ 13.500</b></font> �l�ves et encadrants</b>  
					
					<br>
					<h3 <h3 style="padding-top :35px;">Ils nous font confiance</h3>
                            <blockquote><i>"Notre premier voyage avec BEC a �t� une magnifique r�ussite et je n'attends qu'une chose : repartir ! Merci encore et f�licitations � votre �quipe : Les �l�ves sont ravis. C'est un plaisir de travailler avec vous."</i>
                                <small>Mme Lavillat � <cite title="Source Title">Coll�ge St Fran�ois</cite></small>
                            </blockquote>
							<blockquote><i>"Tr�s bon travail de l'equipe du BEC. Bonnes visites, les �l�ves ont ador�. C'�tait impeccable !"</i>
                                <small>Mme Philippe � <cite title="Source Title">Coll�ge La Peyroua</cite></small>
                            </blockquote>



					</div>
                <? } ?>
                                  
                               </div>                                       <!-- fin contenu -->						<!-- Aside -->			
							  
							   
							   </div>                     <!-- contenu bas pages sur toute largeur-->	
							   <div class="container"> 					          					                </div>            </section>     
							   <!-- End content info--> <? include("footer_scolaires.php"); ?>          			