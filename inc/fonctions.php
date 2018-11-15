<?

function connexion (){
	global $bdd_serveur, $bdd_user, $bdd_pass, $bdd_base;
	$link = mysql_connect($bdd_serveur, $bdd_user, $bdd_pass) or die("Impossible de se connecter : " . mysql_error());	
   	$db = mysql_select_db($bdd_base) or die("Impossible de se connecter : " . mysql_error());
}
function deconnexion(){
	unset($_SESSION["id"]);
	unset($_SESSION["email"]);
	unset($_SESSION["login"]);
}
function verif_session(){
  session_start(); 
  if (!isset($_SESSION['login'])){
		echo "<script> document.location.href='index.php'; </script>";
		exit();
	}
}


function minis_prix_a_partir_de($id_sejour, $id_heb=""){
	$query = "SELECT MIN(tarif) FROM fiche_minis_tarif WHERE rid_fiche_minis = '".addslashes($id_sejour)."' AND rid_zone <> '24' AND rid_zone <> '25'";
	if($id_heb <> ""){
		$query .= " AND rid_hebergement = '".addslashes($id_heb)."'";
	}
	$exec = mysql_query($query) or die(mysql_error());
	$data = mysql_fetch_row($exec);
	$prix_a_partir_de = $data[0];	
	return $prix_a_partir_de;
}


//frais de port
function frais_de_port($poids)
{
	$frais_port = 0;
		
	$query = "SELECT * FROM port_poids WHERE '".$poids."' >= min_poids AND '".$poids."' < max_poids";
	//echo $query;
	$exec = mysql_query($query);
	$data = mysql_fetch_assoc($exec);
	
	$frais_port = $data["prix"];
	if($frais_port == "")
		$frais_port = 0;
	
	return $frais_port;
}


function reduc_parrainage($client, $total){	
	$reduc=0;
	
	$query = "SELECT id_client FROM clients WHERE id_client = '".addslashes($client)."' AND parrainage = '1'";
	$exec = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($exec) > 0)
	{
		$reduc = 0.25*$total;
	}
	
	return $reduc;
}

function reduc_parrainage2($client, $total){	
	$reduc=0;
	
	$query = "SELECT id_client FROM clients WHERE id_client = '".addslashes($client)."' AND filleul_actif = '1'";
	$exec = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($exec) > 0)
	{
		$reduc = 0.25*$total;
	}
	
	return $reduc;
}


function calcul_avoir($total, $code, $fiche=""){
	$reduc=0;
	if($code!=""){
		$sql = "SELECT * FROM avoir WHERE code='".addslashes($code)."'";	
		$req = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($req) > 0){
			$row = mysql_fetch_array($req);
			$date = date("Y-m-d");
			if($row['date_debut'] <= $date && $date <= $row['date_fin']){
				if($row['rid_fiche'] == "0" || $row['rid_fiche'] == $fiche){
					if($total >= $row['prix_mini']){
						if($row['pourc'] != 0){
							$reduc = (($total*$row['pourc'])/100);
						}else{
							$reduc = $row['avoir'];
						}
						$_SESSION['code'] = $code;				
					}else{
						echo "<script>alert('Pour utiliser ce code de r�duction, il faut que le montant du s�jour soit sup�rieur � ".$row['prix_mini']." �.');</script>";	
						$_SESSION['code'] = "";
					}
				}else{
					echo "<script>alert('Ce code de r�duction n\'est pas valable pour ce s�jour.');</script>";	
					$_SESSION['code'] = "";
				}
			}else{
				echo "<script>alert('Ce code de r�duction n\'est plus valide.');</script>";	
				$_SESSION['code'] = "";
			}
		}else{
			echo "<script>alert('Il n\'existe pas de r�duction pour ce code.');</script>";
			$_SESSION['code'] = "";
		}
	}
	return round($reduc,2);
}


//si on applique la TVA selon le pays de destination
function appliquer_tva()
{
	if(isset($_SESSION['id']) && isset($_SESSION['email']))
	{		
		$sql = "SELECT * FROM clients WHERE id_client = '".addslashes($_SESSION['id'])."' AND email = '".addslashes($_SESSION['email'])."'";
		$req = mysql_query($sql);
		if(mysql_num_rows($req) > 0)
		{
			$row = mysql_fetch_array($req);
			if($row['livr'] == 0)
				$pays = stripslashes($row['pays']);
			else
				$pays = stripslashes($row['pays_livr']);
			
			$sql = "SELECT * FROM pays WHERE id_pays=$pays";
			$req = mysql_query($sql);
			$row = mysql_fetch_array($req);
			return $row['tva'];
		}
		else
		{
			deconnexion();
			echo "<script>alert('Vous devez �tre identifi� pour acc�der � cette partie.'); document.location.href='index.php';</script>";			
		}
	}
	else
		return 1;
}

//si on applique la TVA selon le pays de destination
function appliquer_tva2($id_client)
{
	$sql = "SELECT * FROM clients WHERE id_client = '".$id_client."'";
	$req = mysql_query($sql);
	if(mysql_num_rows($req) > 0)
	{
		$row = mysql_fetch_array($req);
		if($row['livr'] == 0)
			$pays = stripslashes($row['pays']);
		else
			$pays = stripslashes($row['pays_livr']);
		
		$sql = "SELECT * FROM pays WHERE id_pays = '".$pays."'";
		$req = mysql_query($sql);
		$row = mysql_fetch_array($req);
		return $row['tva'];
	}
	else
		return 1;
}


//affichage des publicit�s
function pub($data_pub, $width="120", $height="300")
{
	mysql_query("UPDATE pub SET vu = vu+1 WHERE id = '".$data_pub["id"]."'");
	
	if($data_pub["nom_fic"] != "" && file_exists("imagesUp/pub/".$data_pub["nom_fic"]))
	{
		?>
        <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr><td align='center' valign='middle'>
		<?
        $extension = substr($data_pub["nom_fic"], strrpos($data_pub["nom_fic"], ".")+1);
		if(strtoupper($extension) == "SWF")
		{
			?><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="<?=$width?>" height="<?=$height?>">
            <param name="movie" value="./imagesUp/pub/<?=$data_pub["nom_fic"]?>" />
            <param name="quality" value="high" />
            <embed src="./imagesUp/pub/<?=$data_pub["nom_fic"]?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?=$width?>" height="<?=$height?>"></embed></object><?
        }
		else
		{
			if($data_pub["lien"] != "")
			{
				?><a href='../pub.php?pub=<?=$data_pub["id"]?>' target='_blank'><?
            }
			?><img src='imagesUp/pub/<?=$data_pub["nom_fic"]?>' width='<?=$width?>' height='<?=$height?>' border='0'><?
            if($data_pub["lien"] != "")
			{
				?></a><?
            }
		}
		?>
        </td></tr>
        </table>
		<?
    }
	elseif($data_pub["code"] != "")
	{
		?><table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td align='center' valign='middle'><?=stripslashes($data_pub["code"])?></td></tr></table><?
	}
}


//fonction retournant le nombre de jours entre 2 dates
function diff_date($date_fin, $date_debut)
{
	$tab_datedebut = split("-", $date_debut);
	$tab_datefin = split("-", $date_fin);
	$mktime_debut = mktime(0, 0, 0, $tab_datedebut[1], $tab_datedebut[2], $tab_datedebut[0]);
	$mktime_fin = mktime(0, 0, 0, $tab_datefin[1], $tab_datefin[2], $tab_datefin[0]);
	$diff_date = $mktime_fin-$mktime_debut;
	$nb_jours = (int)($diff_date/(60*60*24));
	
	return $nb_jours;
}


//ajoute des points au client
function ajoutePoint($nb_point, $client, $type, $annonce="")
{
	$query = "INSERT INTO point_clients (point, client, datetime, type, annonce) VALUES ('".$nb_point."', '".$client."', '".date("Y-m-d H:i:s")."', '".$type."', '".$annonce."')";
	mysql_query($query) or die(mysql_error());
}


// ----------------------------------------------------------------------------
// Fonction pour mettre en forme les prix avec 2 d�cimals
// ----------------------------------------------------------------------------

function parsePrix($str) {
	$t=explode(".",$str);
	if(sizeof($t)>1){
		if(strlen($t[1])==1){
			return $t[0].",".$t[1]."0";		
		}else{
			return $t[0].",".$t[1];
		}	
	}else{
		return $str.",00";
	}
}


//fonction calculant l'�ge
function age($birthday)
{
	list($year, $month, $day) = split("-", $birthday);
	$today['day'] = date('j');
	$today['month'] = date('n');
	$today['year'] = date('Y');
	$age = $today['year'] - $year;
	
	if($today['month'] <= $month)
	{
		if($month == $today['month'])
		{
			if($day > $today['day'])
				$age--;
		}
		else
      		$age--;
    }
	
	return $age;
}//fin fonction age


//v�rifie si le texte donn� comporte certains bout de texte non autoris�
function verif_html($texte)
{
	if(strpos($texte, "<script") || strpos($texte, "<a") || strpos($texte, "<img"))
		return false;
	else
		return true;
}


// ----------------------------------------------------------------------------
// Fonction pour enlever du HTML !
// ----------------------------------------------------------------------------

function html_off($text)
{
	//gestion des sauts de ligne
	$text = str_replace("<br>", "[saut_ligne]", $text);
	$text = str_replace("<br/>", "[saut_ligne]", $text);
	$text = str_replace("<br />", "[saut_ligne]", $text);
	
	//on enl�ve toutes les balises HTML les balises HTML
	$text = preg_replace("@<[\/\!]*?[^<>]*?>@si", "", $text);
	
	//on remet les saut de ligne
	$text = str_replace("[saut_ligne]", "<br />", $text);
	
	return $text;
}


// ----------------------------------------------------------------------------
// Fonction pour bypasser les entr�es
// ----------------------------------------------------------------------------

function bypass($str) {
 return trim(htmlspecialchars(addslashes($str)));
}


function envoi_mail($to, $sujet, $message)
{
	 global $tel_site, $adresse_site, $nom_site, $mail_site, $url_site, $url_site2, $img_mail_haut;
	 
	 $from = $mail_site;
	 $url = $url_site;
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
	 $texte .= '<html><body bgcolor="#f6ffff"><table cellpadding="0" cellspacing="0" border="0" align="center" width="550" style="border-style:solid; border-width:1px; border-color:#33a4dd;">
				<tr>
					<td align="left" bgcolor="#FFFFFF" style="font-family:Arial; font-size:11px; color:#544035"><a href="'.$url.'"><img src="'.$img_mail_haut.'" border=0 vspace="0" hspace="0"></a>
						<table width="96%" align=center style="font-family:Arial; font-size:11px; color:#544035">
							
							<tr>
								<td>
									<br>'.stripslashes($message).'
									<br><br>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#33a4dd" style="font-weight: bold; font-size: 12px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;">'.$nom_site.' - '.$adresse_site.'</td>
				</tr>
			   </table></body></html>';
	 $texte .= "\n\n";
	 $b = mail($to, $sujet, $texte, "From:".$nom_site." <".$from.">\nReply-to: ".$from."\n".$mail_mime, "-f".$from);
	 
	 return $b;
}


function mail_attachement($to, $sujet, $message, $fichier, $typemime, $nom, $fichier2="", $typemime2="", $nom2="", $fichier3="", $typemime3="", $nom3=""){
	 global $tel_site, $adresse_site, $nom_site, $mail_site, $url_site, $url_site2, $img_mail_haut;
	 
	 $from = $mail_site;
	 $url = $url_site;
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
	 $texte .= '<html><body bgcolor="#f6ffff"><table cellpadding="0" cellspacing="0" border="0" align="center" width="550" style="border-style:solid; border-width:1px; border-color:#33a4dd;">
				<tr>
					<td align="left" bgcolor="#FFFFFF" style="font-family:Arial; font-size:11px; color:#544035"><a href="'.$url.'"><img src="'.$img_mail_haut.'" border=0 vspace="0" hspace="0"></a>
						<table width="96%" align=center style="font-family:Arial; font-size:11px; color:#544035">
							
							<tr>
								<td>
									<br>'.stripslashes($message).'
									<br><br>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#33a4dd" style="font-weight: bold; font-size: 12px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;">'.$nom_site.' - '.$adresse_site.'</td>
				</tr>
			   </table></body></html>';
	$texte .= "\n\n";
	//le fichier
	$attachement = "------=".$limite."\n";
	$attachement .= "Content-Type: ".$typemime."; name=\"".$nom."\"\n";
	$attachement .= "Content-Transfer-Encoding: base64\n";
	$attachement .= "Content-Disposition: attachment; filename=\"".$nom."\"\n\n";
	$contenu="";
	$tableau = file($fichier);
	while(list($cle,$val) = each($tableau)) {
		$contenu.=$val;
	}
	$attachement .= chunk_split(base64_encode($contenu));
	$attachement .= "\n\n\n------=".$limite."\n";
	if($fichier2!=""){
		$attachement .= "Content-Type: ".$typemime2."; name=\"".$nom2."\"\n";
		$attachement .= "Content-Transfer-Encoding: base64\n";
		$attachement .= "Content-Disposition: attachment; filename=\"".$nom2."\"\n\n";
		$contenu="";
		$tableau = file($fichier2);
		while(list($cle,$val) = each($tableau)) {
			$contenu.=$val;
		}
		$attachement .= chunk_split(base64_encode($contenu));
		$attachement .= "\n\n\n------=".$limite."\n";
	}
	if($fichier3!=""){
		$attachement .= "Content-Type: ".$typemime3."; name=\"".$nom3."\"\n";
		$attachement .= "Content-Transfer-Encoding: base64\n";
		$attachement .= "Content-Disposition: attachment; filename=\"".$nom3."\"\n\n";
		$contenu="";
		$tableau = file($fichier3);
		while(list($cle,$val) = each($tableau)) {
			$contenu.=$val;
		}
		$attachement .= chunk_split(base64_encode($contenu));
		$attachement .= "\n\n\n------=".$limite."\n";
	}
	$b = mail($to, $sujet, $texte.$attachement, "From:".$nom_site." <".$from.">\nReply-to: ".$from."\n".$mail_mime, "-f".$from);
	
	return $b;
	//return mail($to, $sujet, $texte.$attachement, "Reply-to: $reply\nFrom:$from\n".$mail_mime);
}



// ----------------------------------------------------------------------------
// Pour cr�er les select de date
// ----------------------------------------------------------------------------
function sel_date($type,$sel="",$from="1910") {
 switch ($type) {
  case 'annee':
   $to=date("Y")+1;
   break;
  case 'mois':
   $from=1;
   $to=12;
   break;
  case 'jour':
   $from=1;
   $to=31;
  break;
 }
 for ($i=$from; $i<=$to; $i++) {
  if ($i == $sel) {
   $all.='<option value="'.$i.'" selected>'.$i.'</option>';
  } else {
   $all.='<option value="'.$i.'">'.$i.'</option>';
  }
 }
 return $all;
}

// ----------------------------------------------------------------------------
// Validation d'adresse email
// ----------------------------------------------------------------------------
function ValideMail($email) {
    $mail_valide =    ereg("([A-Za-z0-9]|-|_|\.)*@([A-Za-z0-9]|-|_|\.)*\.([A-Za-z0-9]|-|_|\.)*",$email);

    if ($mail_valide) return 1;
    else return 0;
} 
// ----------------------------------------------------------------------------
// R�cuperer l'adresse IP de l'internaute
// ----------------------------------------------------------------------------
function get_ip() {
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip; 
}


// ----------------------------------------------------------------------------
// Mise en forme des dates
// ----------------------------------------------------------------------------

function parseDate($date) {
 if (strpos($date," ") != FALSE) {
  $tout = explode(" ",$date);
  $jour = explode("-",$tout[0]);
  $heure = explode(":",$tout[1]);
  $retour = "$jour[2]/$jour[1]/$jour[0] � $heure[0]:$heure[1]:$heure[2]";
 } else {
  $jour = explode("-",$date);
  $retour = "$jour[2]/$jour[1]/$jour[0]";
 }
 return $retour;
}

function parseDate2($date) {
 if (strpos($date," ") != FALSE) {
  $tout = explode(" ",$date);
  $jour = explode("-",$tout[0]);
  $heure = explode(":",$tout[1]);
  $retour = "$jour[2]/$jour[1] � $heure[0]:$heure[1]";
 } else {
  $jour = explode("-",$date);
  $retour = "$jour[2]/$jour[1]";
 }
 return $retour;
}

function parseDate3($date) {
 if (strpos($date," ") != FALSE) {
  $tout = explode(" ",$date);
  $jour = explode("-",$tout[0]);
  $heure = explode(":",$tout[1]);
  $retour = $jour[2]."/".$jour[1]."/".substr($jour[0], 2, 4)." � ".$heure[0].":".$heure[1];
 } else {
  $jour = explode("-",$date);
  $retour = $jour[2]."/".$jour[1]."/".substr($jour[0], 2, 4);
 }
 return $retour;
}

function parseDate4($date) {
 if (strpos($date," ") != FALSE) {
  $tout = explode(" ",$date);
  $jour = explode("-",$tout[0]);
  $heure = explode(":",$tout[1]);
  $retour = "$jour[2]/$jour[1]/$jour[0] � $heure[0]:$heure[1]";
 } else {
  $jour = explode("-",$date);
  $retour = "$jour[2]/$jour[1]/$jour[0]";
 }
 return $retour;
}




// ----------------------------------------------------------------------------
// Fonction pour afficher la navigation
// ----------------------------------------------------------------------------

function nav($nbr_page,$n_page,$count,$page,$plus_link) {
	if($nbr_page<$count){
		$i=0;
		echo "<table align=center><tr>";
		$nb_page=ceil($count/$nbr_page);
		if($nb_page>10){
			if($n_page>=($nb_page-5)){			
				$i=$nb_page-11;				
			}else if($n_page>5){
				$i=$n_page-5;
			}else{
				$i=0;
			}
		}
		if($n_page!=$i){
			echo "<td align=center valign=bottom class=nav width=30><a href=\"$page?page=0$plus_link\" title=\"Premi�re page\"><img src=\"images/nav/nav_2fleche_gauche.gif\" border=0></a><br>&nbsp;</td>";
			echo "<td align=center valign=bottom class=nav width=40><a href=\"$page?page=".($n_page-1)."$plus_link\" title=\"Page pr�c�dente\"><img src=\"images/nav/nav_fleche_gauche.gif\" border=0></a><br>&nbsp;</td>";
		}
		$j=0;		
		while($i<$nb_page){			
			if($n_page==$i){
				echo "<td align=center valign=bottom class=nav><img src=\"images/nav/nav_gpage.gif\" border=0><br><strong>".($i+1)."</strong></td>";
			}else{
				echo "<td align=center valign=bottom class=nav><a href=\"$page?page=$i$plus_link\" class=nav ><img src=\"images/nav/nav_page.gif\" border=0><br>".($i+1)."</a></td>";
			}
			$i++;
			$j++;
			if($j==11){
				break;
			}
		}
		if($n_page!=($nb_page-1)){
			echo "<td align=center valign=bottom class=nav width=40><a href=\"$page?page=".($n_page+1)."$plus_link\" title=\"Page suivante\"><img src=\"images/nav/nav_fleche_droite.gif\" border=0></a><br>&nbsp;</td>";
			echo "<td align=center valign=bottom class=nav width=30><a href=\"$page?page=".($nb_page-1)."$plus_link\" title=\"Derni�re page\"><img src=\"images/nav/nav_2fleche_droite.gif\" border=0></a><br>&nbsp;</td>";			
		}
		echo "</tr></table>";	
	}
}



?>