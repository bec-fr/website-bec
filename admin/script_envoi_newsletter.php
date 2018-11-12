<?
	include('../inc/conf.php');
	include('../inc/fonctions.php');
	verif_session();
	connexion();
	
	$requete = "SELECT * FROM mailing WHERE 1";
	if(isset($_SESSION['groupe'])){
		/*$groupe=$_SESSION['groupe'];
		$requete.= " AND (0";
		for($i=0; $i<count($groupe); $i++){
			$requete.= " OR groupe='".addslashes($groupe[$i])."'";
		}
		$requete.= ")";*/
		$requete.= " AND groupe = '".addslashes($_SESSION['groupe'])."'";
	}
	$requete.=" ORDER BY id LIMIT ".$_SESSION['pos_envoi_en_cours'].",1";
	//echo $requete;
	$result = mysql_query($requete) or die(mysql_error());	
	$message = stripslashes($_SESSION['message']);
	$sujet = stripslashes($_SESSION['sujet']);
	while($row = mysql_fetch_array($result))
	{
		$from = $mail_site;
		$to = $row['mail'];
		
		$limite = "_parties_".md5(uniqid(rand()));
		$mail_mime = "Date: ".date("r")."\n";
		$mail_mime .= "MIME-Version: 1.0\n";
		$mail_mime .= "Content-Type: multipart/mixed;\n";
		$mail_mime .= " boundary=\"----=".$limite."\"\n";
		$mail_mime .= "X-Sender: <".$url_site2.">\n";
		$mail_mime .= "X-Mailer: PHP\n";
		$mail_mime .= "X-auth-smtp-user: ".$from." \n";
		$mail_mime .= "X-abuse-contact: ".$from;
		//Le message en texte simple pour les navigateurs qui n'acceptent pas le HTML
		$texte = "This is a multi-part message in MIME format.\n";
		$texte .= "Ceci est un message au format MIME.\n";
		$texte .= "------=".$limite."\n";
		$texte .= "Content-Type: text/html;\n";
		$texte .= "Content-Transfer-Encoding: 7bit\n\n";
		$message = str_replace('href="/', 'href="'.$url_site.'/', $message);
		$message = str_replace('src="/', 'src="'.$url_site.'/', $message);
		$texte .= "<html><body bgcolor='#f6ffff'><br>".stripslashes($message)."
		 			<p align='center' style='font-family:Verdana; font-size:9px;'>Pour vous d&eacute;sinscrire de la newsletter, cliquez <a href='".$url_site."/supp-newsletter.php?n=".$row[0]."&to=".$to."'>ici</a></p><br /><br /></body></html>";
		$texte .= "\n\n";
		$b = mail($to, $sujet, $texte, "From:".$nom_site." <".$from.">\nReply-to: ".$from."\n".$mail_mime, "-f".$from);
		$_SESSION['pos_envoi_en_cours']++;
		echo " ";
		flush();
     }	 	 
	 echo $_SESSION['pos_envoi_en_cours'];
?>