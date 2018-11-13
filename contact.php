<!DOCTYPE html>
 <? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec s�jours linguistiques - Nous contacter</title>  
        
        <meta name="description" content="Comment contacter le BEC">
        <meta name="author" content="BEC S�jours linguistiques"> 
        
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
                  <form action="http://localhost/becfrance-site/posted-contact.php" method="POST" name="WebToLeadForm"  class="form-horizontal">
					<div class="form-group">
								<label  class="col-sm-3 control-label">Titre* : </label>
								<div class="col-sm-9">
									<select id="salutation" name="salutation" class="select">
										<option selected>---</option>
										<option value="M.">M.</option>
										<option value="Mme">Mme</option>
									</select>
								</div>
						</div>
						<div class="form-group">
								<label  class="col-sm-3 control-label">Nom* : </label>
								<div class="col-sm-9"><input required name="last_name" type="text" id="last_name" value=""  size="40" /></div>
						</div>	
						<div class="form-group">
								<label  class="col-sm-3 control-label">Pr&eacute;nom* : </label>
								<div class="col-sm-9"><input required name="first_name" type="text" id="first_name" value=""  size="40" /></div>
						</div>
					
						<div class="form-group">
								<label  class="col-sm-3 control-label">T&eacute;l : </label>
								<div class="col-sm-9"><input name="phone_mobile" type="text" id="phone_mobile" value=""  size="10" /></div>
						</div>
						<div class="form-group">
								<label  class="col-sm-3 control-label">Mail*  </label>
								<div class="col-sm-9"><input required name="email1" type="email" id="email1" value=""  size="40" /></div>
						</div>
						<div class="form-group">
								<label  class="col-sm-3 control-label">Vous recherchez :</label>
								<div class="col-sm-9">
									<select name="segment" class="select">
										<option value="">- - -</option>
										<option value="un s�jour junior">un s�jour junior</option>
										<option value="un s�jour �tudiant/adulte">un s�jour �tudiant/adulte</option>
										<option value="un voyage scolaire">un voyage scolaire</option>
									</select>
								</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Message :</label>
								<div class="col-sm-9"><textarea name="message" cols="50" rows="8" id="message" class="textarea"></textarea></div>
						</div>
					
						<div align="right" class="col-sm-9" >
						<input  align="right" type="submit"   class="button" value="Adresser votre message">
						</div>
                    
                  </form>
            
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
			