<script language="javascript">
function verif_form()
{
	if(document.form.sujet.value == ''){
		alert('Veuillez renseigner un sujet.');
	}else{
		if(confirm("Etes-vous sûr de vouloir envoyer la newsletter ?")){
			document.form.submit();
		}
	}
}
</script>

<?
$requete = "SELECT count(*) as total FROM mailing";
$result = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($result);   
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Envoi Newsletter - Il y a <?=$row['total']?> inscrit(s)</td></tr>
	<tr>
		<td>
<br />


<?
// Si le formulaire a été envoyé :
if(isset($_POST['sujet']) && $_POST['sujet'] != "")
{
	$sujet = stripslashes($_POST['sujet']);
	$message = stripslashes($_POST['message']);
	
	mysql_query("INSERT INTO mailing_archive (sujet, texte, datetime) VALUES ('".addslashes($sujet)."', '".addslashes($message)."', '".date("Y-m-d H:i:s")."')") or die(mysql_error());
	
	$requete = "SELECT * FROM mailing WHERE 1";
	if(isset($_POST['groupe']) && $_POST['groupe'] != "")
	 	$requete .= " AND groupe = '".addslashes($_POST['groupe'])."'";
	//echo $requete;
	$result = mysql_query($requete) or die(mysql_error());
	
	while($row = mysql_fetch_array($result))
	{
		$from = $mail_site;
		$to = $row['mail'];
		//echo $to;
		$limite = "_parties_".md5(uniqid(rand()));
		$mail_mime = "Date: ".date("r")."\n";
		$mail_mime .= "MIME-Version: 1.0\n";
		$mail_mime .= "Content-Type: multipart/mixed;\n";
		$mail_mime .= " boundary=\"----=$limite\"\n\n";  
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
		 			<p align='center' style='font-family:Verdana; font-size:9px;'>Pour vous d&eacute;sinscrire de la newsletter, cliquez <a href='".$url_site."/supp-newsletter.php?n=".$row[0]."&to=$to'>ici</a></center><br /><br /></body></html>";
		$texte .= "\n\n";
		$b = mail($to, $sujet, $texte, "Reply-to: ".$from."\r\nFrom:".$nom_site." <".$from.">\r\n".$mail_mime, "-f".$from);
     }
	 
	 if($b){
	 	echo "<span style='color:red; padding-left:15px;'>La newsletter a bien été envoyée à la liste de diffusion.</span><br><br>";
	 }else{
	 	echo "<span style='color:red; padding-left:15px;'>Echec de l'envoi de la newsletter.</span><br><br>";  
	 }
}


if(isset($_GET["option"]) && $_GET["option"] == "mod" && $_GET["newsletter"] != ""){
	$query2 = "SELECT * FROM mailing_archive WHERE id = '".addslashes($_GET["newsletter"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$sujet = stripslashes($data2["sujet"]);
	$message = stripslashes($data2["texte"]);
}else{
	$sujet = ((isset($_GET["sujet"])) ? stripslashes($_GET["sujet"]) : "");
	$message = '<table cellpadding="0" cellspacing="0" align="center" width="550" style="border-style:solid; border-width:1px; border-color:#33a4dd;">
				<tr height="50">
					<td align="left" bgcolor="#FFFFFF" style="font-family:Arial; font-size:11px; color:#544035"><a href="'.$url_site.'"><img src="'.$img_mail_haut.'" border=0 vspace="0" hspace="0"></a>
						<table width="96%" align=center style="font-family:Arial; font-size:11px; color:#544035">
							
							<tr>
								<td>
									<br>Ici, le texte de votre newsletter ...
									<br><br>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#33a4dd">	
						<span style="font-weight: bold; font-size: 12px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;">'.$nom_site.'</span>
					</td>
				</tr>
			   </table>';
}
?>

  <form name="form" action="" method="post">
  <table BORDER="0" class="contenu" width="100%">
  <tr>
  	<td align=right>Sujet :</td>
  	<td><input TYPE="text" size="40" name="sujet" maxlength="100" value="<?=$sujet?>"></td>
  </tr>
  <tr>
  	<td align=right>Groupe :</td>
  	<td><select name="groupe">
	<?
    $query = "SELECT * FROM mailing_groupe ORDER BY nom";
    $exec = mysql_query($query) or die(mysql_error());
    while($data = mysql_fetch_assoc($exec))
    {
    	echo "<option value='".$data["id"]."'";
		if($data["id"] == "3")
			echo " selected";
		echo ">".stripslashes($data["nom"])."</option>";
    }
    ?>
    </select></td>
  </tr>
  <TR><TD align=right valign="top">Message :</TD><TD>
  <?
  include_once("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor('message');
  $oFCKeditor->BasePath = '../fckeditor/';
  $oFCKeditor->Height = '600';
  $oFCKeditor->Width = '600';
  $oFCKeditor->Value = $message;
  $oFCKeditor->Create();
  ?>
  </TD></TR>
  <tr><td>&nbsp;</td></tr>
  <tr>
  	<td colspan="2" align="center"><input type="button" value="Envoyer" class="bouton" onclick="verif_form()"></td>
  </tr>
  </table>
  </form>
  
  
		</td>
	</tr>
</table><br>