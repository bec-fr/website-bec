<script language="javascript">
function verif_form(){
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
$requete = 'SELECT count(*) as total FROM mailing WHERE 1';
if(isset($_POST['groupe'])){
	/*$groupe=$_POST['groupe'];
	$requete.= " AND (0";
	for($i=0; $i<count($groupe); $i++){
		$requete.= " OR groupe='".addslashes($groupe[$i])."'";
	}
	$requete.= ")";*/
	$requete.= " AND groupe = '".addslashes($_POST['groupe'])."'";
}
$result = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($result);
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Envoi Newsletter - Il y a <?=$row['total']?> inscrit(s)</td></tr>
	<tr>
		<td>
<br />


<?
//Si le formulaire a été envoyé
if(isset($_POST['sujet']) && $_POST['sujet'] != ""){
	$_SESSION['groupe'] = $_POST['groupe'];
	$_SESSION['sujet'] = $_POST['sujet'];
	$_SESSION['message'] = $_POST['message'];
	$_SESSION['pos_envoi_en_cours'] = 0;
	
	mysql_query("INSERT INTO mailing_archive (sujet, texte, datetime) VALUES ('".addslashes($_SESSION['sujet'])."', '".addslashes($_SESSION['message'])."', '".date("Y-m-d H:i:s")."')") or die(mysql_error());
	
	$requete = "SELECT * FROM mailing WHERE 1";		
	if(isset($_POST['groupe'])){
		/*$groupe=$_POST['groupe'];
		$requete.= " AND (0";
		for($i=0; $i<count($groupe); $i++){
			$requete.= " OR groupe='".addslashes($groupe[$i])."'";
		}
		$requete.= ")";*/
		$requete.= " AND groupe = '".addslashes($_POST['groupe'])."'";
	}
	$result = mysql_query($requete) or die(mysql_error());	
	$_SESSION['nb_enreg'] = mysql_num_rows($result);
	?>
   
			<table align="center" cellpadding="0" cellspacing="2" width="90%" bgcolor="#444444">
            	<tr>
                	<td height="30" style="color:#FFF; font-size:14px;" align="center"><span id="poucentage"><table cellpadding=0 height=30 cellspacing=0 width='100%'><tr><td width='0%'  align=right bgcolor='#990000'></td><td width='100%'>&nbsp;<b>0 %</b></td></tr></table></span></td>
                </tr>
            </table><br />
            &nbsp;<b>Envoi de la newsletter en cours veuillez patienter<span id="points"></span></b><br />&nbsp;(cette opération peut-être très longue suivant la taille de la liste de diffusion)<br /><br />
<script>
	var pos=0;
	var nb_enreg=<?=$_SESSION['nb_enreg']?>;
	function defile_points(){
		if(pos<100){
			val=document.getElementById('points').innerHTML;
			if(val==""){
				res=".";	
			}else if(val=="."){
				res="..";
			}else if(val==".."){
				res="...";
			}else{
				res="";
			}
			document.getElementById('points').innerHTML=res;		
			setTimeout("defile_points()",800);
		}
	}
	function createXHR(){
		var request = false;
		try{
			request = new ActiveXObject('Msxml2.XMLHTTP');
		}catch (err2) {
			try {
				request = new ActiveXObject('Microsoft.XMLHTTP');
			}catch (err3) {
				try {
					request = new XMLHttpRequest();
				}catch (err1){
					request = false;
				}
			}
		}
		return request;
	}	
	function defilement_barre_progression(){ 		
		var req = createXHR();
		req.onreadystatechange = function(){ 
			if(req.readyState == 4){
				if(req.status == 200){
					pos=parseInt(req.responseText);
					pos=Math.round((pos*100)/nb_enreg);
					if(pos>50){
						document.getElementById('poucentage').innerHTML="<table cellpadding=0 height=30 cellspacing=0 width='100%'><tr><td width='"+pos+"%'  align=right bgcolor='#990000'><b>" + pos + " %</b>&nbsp;</td><td width='"+ (100-pos) +"%'></td></tr></table>";
					}else{
						document.getElementById('poucentage').innerHTML="<table cellpadding=0 height=30 cellspacing=0 width='100%'><tr><td width='"+pos+"%' bgcolor='#990000'></td><td width='"+ (100-pos) +"%'><b>&nbsp;" + pos + " %</b></td></tr></table>";
					}
					if(parseInt(req.responseText)<nb_enreg){
						defilement_barre_progression();		
					}else{
						document.getElementById('points').innerHTML=".";
						document.getElementById('poucentage').innerHTML="<table cellpadding=0 height=30 cellspacing=0 width='100%'><tr><td bgcolor='#990000' align='center' class='texte_blanc_12'><b>Envoi terminé</b></td></tr></table>";
					}
				}else{
					defilement_barre_progression();	
				}
			}
		}; 
		req.open("GET", "script_envoi_newsletter.php", true); 
		req.send(null);
	}	
	defilement_barre_progression();	
	defile_points();
</script>	
<?
}else{

if(isset($_GET["option"]) && $_GET["option"] == "mod" && $_GET["newsletter"] != ""){
	$query2 = "SELECT * FROM mailing_archive WHERE id = '".addslashes($_GET["newsletter"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$sujet = stripslashes($data2["sujet"]);
	$message = stripslashes($data2["texte"]);
}else{
	if(isset($_GET["site"]) && $_GET["site"] == "etudiant"){
		$img_mail_haut = $url_site."/images/mail_haut_etudiant.jpg";
	}elseif(isset($_GET["site"]) && $_GET["site"] == "junior"){
		$img_mail_haut = $url_site."/images/mail_haut_junior.jpg";
	}elseif(isset($_GET["site"]) && $_GET["site"] == "minis"){
		$img_mail_haut = $url_site."/images/mail_haut_mini_sejour.jpg";
	}
	
	$sujet = ((isset($_GET["sujet"])) ? stripslashes($_GET["sujet"]) : "");
	$message = '<table cellpadding="0" cellspacing="0" align="center" width="550" style="border-style:solid; border-width:1px; border-color:#33a4dd;">
				<tr height="50">
					<td align="left" bgcolor="#FFFFFF"><a href="'.$url_site.'"><img src="'.$img_mail_haut.'" border=0 vspace="0" hspace="0"></a>
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
<td align=right>Site :</td>
<td><select name="site" onchange="document.location.href='admin.php?action=newsletterEnv&site='+this.value"><option value="">- - -</option><option value="etudiant" <?=((isset($_GET["site"]) && $_GET["site"] == "etudiant") ? " selected" : "")?>>étudiant</option><option value="junior" <?=((isset($_GET["site"]) && $_GET["site"] == "junior") ? " selected" : "")?>>junior</option><option value="minis" <?=((isset($_GET["site"]) && $_GET["site"] == "minis") ? " selected" : "")?>>voyages scolaires</option></select></td>
</tr>
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
while($data = mysql_fetch_assoc($exec)){
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
<? } ?>

		</td>
	</tr>
</table><br>