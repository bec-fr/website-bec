<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Import fichier csv</td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST["groupe"]) && $_POST["groupe"] != ""){
	$groupe = $_POST['groupe'];
	
	if($_FILES['fic']['error'] == 0){
		$tab_extension = array("csv");
		$extension = mb_strtolower(substr($_FILES['fic']['name'], strrpos($_FILES['fic']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			//il ne veut pas qu'on supprime les mails
			//mysql_query("DELETE FROM mailing WHERE groupe = '".addslashes($groupe)."'") or die(mysql_error());
			
			$fichier = "../imagesUp/mails/import_mail.csv";	
			move_uploaded_file($_FILES['fic']['tmp_name'], $fichier);
		
			//Traitement du fichier d'export
			$tableau = file($fichier);
			$i=0;
			while(list($cle, $ligne) = each($tableau)){
				//echo $ligne."<br>";
				$tab = explode(";", $ligne);
				$mail = trim($tab[0]);
				
				if($mail != "" && ValideMail($mail)){
					$sql = "INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($mail)."', '".addslashes($groupe)."')";
					//echo $sql.";<br>";
					if(mysql_query($sql)){	  
						$i++;
					}
				}
			}
			
			echo "<b>".$i." emails insérés.</b><br><br>";
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier csv.')</script>";
		}
	}else{
		echo "<script>alert('L\'upload du fichier a échoué.')</script>";
	}
	
	/*if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=newsletter_importmail';</script>";
	}*/
}
?>
  
  <FORM name="form" enctype="multipart/form-data" METHOD="POST">
  <TABLE BORDER=0 class=contenu>
  <tr>
    <td align="right" width="80">Fichier csv : </td>
    <td><input type="file" name="fic" class="formulaire" /></td>
  </tr>
  <tr>
    <td align="right">Groupe :</td>
    <td><select name="groupe" class="formulaire"><option value="">- - -</option>
        <?
          $query = "SELECT * FROM mailing_groupe ORDER BY nom";
          $exec = mysql_query($query) or die(mysql_error());
          while($data = mysql_fetch_assoc($exec)){
            echo "<option value='".$data["id"]."'";
            if($groupe == $data["id"])
                echo " selected";
            echo ">".stripslashes($data["nom"])."</option>";
          }
          ?>
      </select></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td></td><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>
  
  
		</td>
	</tr>
</table><br>