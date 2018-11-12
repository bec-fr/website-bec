<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Page - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
//Si le formulaire a été envoyé
if(isset($_POST['texte'])){
	$texte = $_POST['texte'];
	
	$requete = "UPDATE page SET texte = '".addslashes($texte)."' WHERE id = '".addslashes($_GET["page"])."'";
	mysql_query($requete) or die(mysql_error());
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=page2Ajouter&page=".addslashes($_GET["page"])."';</script>";
}else{
	$requete = "SELECT * FROM page WHERE id = '".addslashes($_GET["page"])."'";
	$result = mysql_query($requete) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$texte = stripslashes($row['texte']);
	$nom = stripslashes($row['nom']);
}
?>

<?=$nom?><br /><br />

<FORM ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu align="center">
<TR><TD>
<?
include_once("../fckeditor/fckeditor.php");
$oFCKeditor = new FCKeditor('texte');
$oFCKeditor->BasePath = '../fckeditor/';
$oFCKeditor->Height = '600';
$oFCKeditor->Width = '600';
$oFCKeditor->Value = $texte;
$oFCKeditor->Create();
?>
</TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD><INPUT TYPE="submit" value="Modifier" class="bouton"></TD></TR>
</TABLE>
</form>


			</td>
	</tr>
</table><br>