    <style>
  .navbar-logo {
    float: left; height: 70px;padding: 5px 10px;font-size: 16px;line-height: 20px;
}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-16546505-1', 'auto');
  ga('send', 'pageview');
</script>

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

<!-- BingAds -->
<script>
  (function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5709661"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");
</script>
<noscript><img src="//bat.bing.com/action/0?ti=5709661&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>




    <body onload="_googWcmGet(callback, '01-55-35-25-00')"> 
        <!-- layout-->
        <div id="layout">             
          
           
            <div class="line"></div>
            <!-- End Login Client -->

            <!-- Info Head -->
            <section class="hidden-xs hidden-sm info_head">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
						<a href="index.php"><img src="img/logo.png" width="160" class="img-responsive" alt="BEC séjours linguistiques"></a>
						</div>
						<address>
						<div class="col-md-4">
						
                            <ul>
								<li><i class="fa fa-pencil"></i><b>BEC</b> <br>British European Centre<br>99 Rue la Fayette 75010 Paris							
							</ul>								
						</div>	
						<div class="col-md-3"> 
						<ul>							
							<li><i class="fa fa-envelope"></i><a href="contact.php">Contact</a>
								<br><span class="number"><i class="fa fa-headphones"></i>01 55 35 25 00</li></span></li>
							</ul>							
						</div>	
						</address></div>
                </div>                         
            </section>
            <!-- Info Head -->
            <!-- Nav-->
			<nav class = "hidden-xl hidden-lg hidden-md navbar navbar-default" role = "navigation">
   
   <div class = "navbar-header">
      <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#example-navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
		
     <a class="navbar-logo" href="index.php"><img src="img/logo.png" width="125" class="img-responsive" alt="BEC séjours linguistiques"></a> 
	<a href="sejours-linguistiques-pour-adolescents.html" class="navbar-brand"><font size="+3" color="#00a1f1"><b>Juniors</b></font></a>	
	
   </div>
   
   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
	
      <ul class = "nav navbar-nav">		
			
         <li class = "dropdown">
            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><b>DESTINATIONS</b><b class = "caret"></b> </a>            
            <ul class = "dropdown-menu">              
                                       <ul>                                  
                                         <li><a href="sejours-linguistiques-adolescents-angleterre,1.html">Angleterre</a></li>
										<li><a href="sejours-linguistiques-adolescents-australie,9.html">Australie</a></li>					
										<li><a href="sejours-linguistiques-adolescents-irlande,2.html">Irlande</a></li>	
									   <li><a href="sejours-linguistiques-adolescents-malte,7.html">Malte</a></li>										
									   <li><a href="sejours-linguistiques-adolescents-usa,3.html">USA</a></li>									
											
                                      </ul>    
            </ul>            
         </li>
		 <li class = "dropdown">
            <a href = "formules-sejours-linguistiques-pour-adolescents.php" class = "dropdown-toggle" data-toggle = "dropdown"><b>FORMULES</b><b class = "caret"></b> </a>

				  <ul class = "dropdown-menu"> 
				  <ul>
										<?
							$query_r = "SELECT * FROM formule_junior WHERE 1 AND afficher = '1' ORDER BY nom";														
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){
							echo "<li><a href=recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=".$data_r["id"].">".stripslashes($data_r["nom"])."</a></li>";				
									}
									?>
					</ul>
                  </ul>      
         </li>
		 <li class = "dropdown">
            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><b>PRESTATIONS</b><b class = "caret"></b> </a>            
            <ul class = "dropdown-menu">              
                                        <ul>                                  
                                         <li><a href="prestation_junior.php">Prestations détaillées</a></li>
									<li><a href="reduction_junior.php">Réductions</a></li>
									<li><a href="avantage_junior.php">Avantages</a></li>							
									<li><a href="cgv_junior.php">Conditions particulières</a></li>					
                                      </ul>            
            </ul>            
         </li>
	<li><a href="offres-speciales-sejours-linguistiques-ados.php"><b>OFFRES SPECIALES</b></a>
		 </li>
		 <li><span class="number"><i class="fa fa-headphones"></i>01 55 35 25 00</li></span></li>
		 <li class="hidden-sm" ><a href="brochure_juniors.php"><i class="fa fa-edit"></i><b>&nbsp;Demander notre brochure</b></a></li>
      </ul>
   </div>   
</nav>

            <nav class="hidden-xs hidden-sm">
                <div class="container">
                    <div class="row">
                         <div class="col-md-4">
                            <span class="titre_adultes"><a href="sejours-linguistiques-pour-adolescents.html"><font color="#ffffff">Séjours Juniors 12-17 ans</font></a></span>
                        </div>
         <!-- Menu-->
                        <ul id="menu" class="col-md-8  sf-menu ">
                           				
							 
                                    <li><a href="#">DESTINATIONS</a>
                                        <ul>                                  
                                         <li><a href="sejours-linguistiques-adolescents-angleterre,1.html">Angleterre</a></li>
										<li><a href="sejours-linguistiques-adolescents-australie,9.html">Australie</a></li>					
										<li><a href="sejours-linguistiques-adolescents-irlande,2.html">Irlande</a></li>	
										<li><a href="sejours-linguistiques-adolescents-espagne,14.html">Espagne</a></li>	
									   <li><a href="sejours-linguistiques-adolescents-malte,7.html">Malte</a></li>										
									   <li><a href="sejours-linguistiques-adolescents-usa,3.html">USA</a></li>											
											
                                      </ul>   
                                    </li>                                 
                                   
									<li><a href="formules-sejours-linguistiques-pour-adolescents.php">FORMULES</a>
									
										<ul>
										<?
							$query_r = "SELECT * FROM formule_junior WHERE 1 AND afficher = '1' ORDER BY nom";														
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){
							echo "<li><a href=recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=".$data_r["id"].">".stripslashes($data_r["nom"])."</a></li>";				
									}
									?></ul>
									
									</li>
                                   <li><a href="#">PRESTATIONS</A>								
									<ul>
							<li><a href="prestation_junior.php">Prestations détaillées</a></li>
									<li><a href="reduction_junior.php">Réductions</a></li>
									<li><a href="avantage_junior.php">Avantages</a></li>							
									<li><a href="cgv_junior.php">Conditions particulières</a></li>		
									</ul>
									</li>
									<li>
									<a href="offres-speciales-sejours-linguistiques-ados.php">OFFRES SPECIALES</a>
                                  
                               
                           
                                                                                         
                         
                        </ul>
                <!-- End Menu-->
							
                    </div>
                </div>
            </nav>
            <!-- End Nav-->