<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">FAQ - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
//Si le formulaire a été envoyé
if(isset($_POST['question']) && $_POST['question'] != ""){
	$question = $_POST['question'];
	$reponse = $_POST['reponse'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE faq SET question = '".addslashes($question)."', reponse = '".addslashes($reponse)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());	
		$id = $_GET['id']; 
	}else{
		$requete = "INSERT INTO faq (question, reponse) VALUES('".addslashes($question)."', '".addslashes($reponse)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	echo "<script>document.location.href='admin.php?action=faq';</script>";
}else{ 
	$question = "";
	$reponse = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM faq WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$question = stripslashes($row['question']);
		$reponse = stripslashes($row['reponse']);
	}
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>  
<TR><TD align=right>Question :</TD><TD><INPUT TYPE="text" size="50" name="question" value="<?=$question?>"></TD></TR>
<TR><TD align=right valign="top">Réponse :</TD><TD><textarea name="reponse" cols="50" rows="8"><?=$reponse?></textarea></TD></TR>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
</TABLE>
</form>


  		</td>
	</tr>
</table><br>