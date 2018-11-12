<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques - Nous contacter</title>  
        
        <meta name="description" content="Comment contacter le BEC">
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
<? include("top_bec.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        
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
                              								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                           
                             <div class="titles">
                                  <h1>Nous adresser un message</h1>
						</div>
						
                                  
                                  <?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	//$mail_site = "contact@becfrance.com";
	if(envoi_mail($mail_site, "Message depuis votre site Internet ".$url_site2, "Vous avez re&ccedil;u un message depuis votre site Internet ".$url_site2."<br><br>

Nom : ".htmlentities($_POST["nom"])."<br>
Pr&eacute;nom : ".htmlentities($_POST["prenom"])."<br>
Adresse : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l : ".htmlentities($_POST["tel"])."<br>
Recherche : ".htmlentities($_POST["rechercher"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br><br>

Message : ".nl2br(htmlentities($_POST["message"]))."<br>

")){
		echo "<br><br><div align='center' class='texteBleu'><b>Merci, votre demande a bien été envoyée !</b></div><br><br>";
		
		if(trim($_POST["mail"]) != ""){
			mysql_query("INSERT INTO mailing (mail) VALUES ('".addslashes($_POST["mail"])."')");
		}
	}else{
		echo "<br><br><div align='center' class='texteBleu'><b>Votre demande n'a pas pu être envoyée.</b></div><br><br>";
	}
}else{

?>                                  
                
				 <div class="row"> 
						<address>
						<div class="col-md-2 col-sm-4">
						<img src="images/logo_mini.gif" align="left">
						</div>
						<div class="col-md-3 col-sm-4">
						
                            <i class="fa fa-pencil"></i><a href="#"> <b>BEC</b> <br>British European Centre<br>99 Rue la Fayette 75010 Paris</a>								
															
						</div>	
						<div class="col-md-3 col-sm-4"> <br> 
					
								<i class="fa fa-headphones"></i><a href="tel:+33155352500"> 01 55 35 25 00</a><br>
									<i class="fa fa-fax"></i><a href="#"> 01 42 60 36 55</a>
													
						</div>	
						</address>	
				</div>		
				
				<br>
                  <form class="form-horizontal" action="" method="post" name="mail" id="mail">
                    <input type="hidden" value="1" name="ok" />
					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Nom* : </label>
							<div class="col-sm-9"><input required name="nom" type="text" id="nom" value=""  size="40" /></div>
					</div>	
					<div class="form-group">
							<label  class="col-sm-3 control-label">Pr&eacute;nom* : </label>
							<div class="col-sm-9"><input required name="prenom" type="text" id="prenom" value="" " size="40" /></div>
					</div>
                   <div class="form-group">
							<label  class="col-sm-3 control-label">Adresse : </label>
							<div class="col-sm-9"><input name="adresse" type="text" id="adresse" value=""  size="40" /></div>
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Code postal </label>
							<div class="col-sm-9"><input name="cp" type="text" id="cp" value="" size="8" /></div>
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Ville :</label>
							<div class="col-sm-9"><input name="ville" type="text" id="ville" value=""  size="40" /></div>
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">T&eacute;l : </label>
							<div class="col-sm-9"><input name="tel" type="text" id="tel" value=""  size="10" /></div>
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Mail*  </label>
							<div class="col-sm-9"><input required name="mail" type="email" id="mail" value=""  size="40" /></div>
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Vous recherchez :</label>
							<div class="col-sm-9"><select name="rechercher" class="select"><option value="">- - -</option><option value="un séjour junior">un séjour junior</option><option value="un séjour étudiant/adulte">un séjour étudiant/adulte</option><option value="un voyage scolaire">un voyage scolaire</option></select></div>
					</div>
					 <div class="form-group">
                   		<label  class="col-sm-3 control-label">Message :</label>
							<div class="col-sm-9"><textarea name="message" cols="50" rows="8" id="message" class="textarea"></textarea></div>
					</div>
               
                   	<div align="right" class="col-sm-9" ><input  align="right" type="submit"  onClick="javascript:verifForm()" class="button" value="Adresser votre message"></div>                
                 
                   
                  </form>
               
                <? } ?>
				</div>
                                  
                                 <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_home.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					<div class="container"> 
					
          
					
                </div>
            </section>
            <!-- End content info-->

 <? include("footer_home.php"); ?>          
			