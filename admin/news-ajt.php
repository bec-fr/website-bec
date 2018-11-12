<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Actualité - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>

<?
// Si le formulaire a été envoyé :
if(isset($_POST['titre']))
{
   $titre = $_POST['titre'];
   $contenu = $_POST['contenu'];
   $date_debut = explode("/", $_POST['date_debut']);
   $date_debut = $date_debut[2]."-".$date_debut[1]."-".$date_debut[0];
   $date_fin = explode("/", $_POST['date_fin']);
   $date_fin = $date_fin[2]."-".$date_fin[1]."-".$date_fin[0];
   $alaune = $_POST['alaune'];
   $des_court = $_POST['des_court'];
   
   if (isset($_GET['id']))
   {
     $requete = "UPDATE news SET titre = '".addslashes($titre)."', contenu = '".addslashes($contenu)."', date_debut = '".$date_debut."', date_fin = '".$date_fin."', alaune = '".addslashes($alaune)."', des_court = '".addslashes($des_court)."' WHERE id_news = '".addslashes($_GET['id'])."'";
     mysql_query($requete) or die(mysql_error());
	 $id = $_GET['id'];
   }
   else
   {
     $requete = "INSERT INTO news (titre, contenu, date_debut, date_fin, alaune, des_court) VALUES ('".addslashes($titre)."', '".addslashes($contenu)."', '".$date_debut."', '".$date_fin."', '".addslashes($alaune)."', '".addslashes($des_court)."')";
     mysql_query($requete) or die(mysql_error());
	 $id = mysql_insert_id();
  }
  
   include("../inc/upload.php");
   
	// Transfert des images
	if ($_FILES["img"]['error'] == 0) {
		 if($_FILES["img"]['type']=="image/gif" || $_FILES["img"]['type']=="image/jpeg" || $_FILES["img"]['type']=="image/pjpeg"){   		
			$size = getimagesize($_FILES["img"]['tmp_name']);  
			$src_w = $size[0]; 
			$src_h = $size[1];        
			$image = new image();
			if($src_w>=$src_h){
				if ($src_w>150){
					$image->upload("img","../imagesUp/news/".$id."_m.jpg",150,"","ffffff");					
					if ($src_w>640){
						$image->upload("img","../imagesUp/news/".$id.".jpg",640,"","ffffff");					
					}else{
						$image->upload("img","../imagesUp/news/".$id.".jpg",$src_w,"","ffffff"); 
					}
				}else{
					$image->upload("img","../imagesUp/news/".$id."_m.jpg",$src_w,"","ffffff");
					$image->upload("img","../imagesUp/news/".$id.".jpg",$src_w,"","ffffff"); 
				}
			}else{
				if($src_h>150){
					$l=round(($src_w*150)/$src_h);						
					$image->upload("img","../imagesUp/news/".$id."_m.jpg",$l,"","ffffff");
					if($src_h>640){
						$l=round(($src_w*640)/$src_h);
						$image->upload("img","../imagesUp/news/".$id.".jpg",$l,"","ffffff"); 		
					}else{
						$image->upload("img","../imagesUp/news/".$id.".jpg",$src_w,"","ffffff"); 
					}
				}else{
					$image->upload("img","../imagesUp/news/".$id."_m.jpg",$src_w,"","ffffff");
					$image->upload("img","../imagesUp/news/".$id.".jpg",$src_w,"","ffffff"); 
				}
			}
		 }
		 else{		
			echo '<script>alert("L\'upload de l\'image a échoué : L\'image n\'est peut être pas au format gif ou jpg.");</script>';		
		 }
		}
	
	if($_FILES['pdf']['error'] == 0)
		{
			if($_FILES['pdf']['type'] == "application/pdf" || $_FILES['pdf']['type'] == "application/force-download")
			{//upload image
				move_uploaded_file($_FILES['pdf']['tmp_name'], "../imagesUp/news/".$id.".pdf");
			}
			else
			{
				echo "<script>alert('Le fichier envoyé n\'est pas un PDF.')</script>";
			}
		}
	
  echo "<script>document.location.href='admin.php?action=news';</script>";
}
else
{
   $id = "";
   $titre = "";
   $contenu = "";
   $date_debut = date("d/m/Y");
   $date_fin = date("d/m/Y");
   $alaune = 0;
   $des_court = "";
   
   if(isset($_GET['id']))
   {
     $requete = "SELECT * FROM news WHERE id_news = '".addslashes($_GET['id'])."'";
     $result = mysql_query($requete) or die(mysql_error());
	 $row = mysql_fetch_array($result);
	 
	 $id = $_GET['id'];
	 $titre = stripslashes($row['titre']);
	 $contenu = stripslashes($row['contenu']);
	 $date_debut = parseDate($row['date_debut']);
	 $date_fin = parseDate($row['date_fin']);
	 $alaune = stripslashes($row['alaune']);
	 $des_court = stripslashes($row['des_court']);
    }

   }
  ?>
  
  <table width="100%"><tr><td align="center" valign="middle"><?=(file_exists("../imagesUp/news/".$id.".jpg") ? '<img src="../imagesUp/news/'.$id.'.jpg" width="100" />' : '')?></td></tr></table><br />
  
  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE width="100%">
  <TR><TD align=right>Titre :</TD><TD><INPUT TYPE="text" size="50" name="titre" maxlength="50" value="<?=$titre?>"></TD></TR>
  <TR><TD align=right>Date de début :</TD><TD><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_debut" maxlength="250" value="<?=$date_debut?>" readonly="readonly">
  <script language="JavaScript" type="text/javascript">
   function exampleCallback_ISO1(date, month, year)
    {
        if (String(month).length == 1) {
            month = '0' + month;
        }

        if (String(date).length == 1) {
            date = '0' + date;
        }
        document.form.date_debut.value = date + '/' + month + '/' + year;
    }
    calendar1 = new dynCalendar('calendar1', 'exampleCallback_ISO1', 'calendrier/');
    calendar1.setMonthCombo(true);
    calendar1.setYearCombo(true);  
 </script>
 </td></tr></table></TD></TR>
  <TR><TD align=right>Date de fin :</TD><TD><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_fin" maxlength="250" value="<?=$date_fin?>" readonly="readonly">
  <script language="JavaScript" type="text/javascript">
   function exampleCallback_ISO2(date, month, year)
    {
        if (String(month).length == 1) {
            month = '0' + month;
        }

        if (String(date).length == 1) {
            date = '0' + date;
        }
        document.form.date_fin.value = date + '/' + month + '/' + year;
    }
    calendar2 = new dynCalendar('calendar2', 'exampleCallback_ISO2', 'calendrier/');
    calendar2.setMonthCombo(true);
    calendar2.setYearCombo(true);  
 </script>
 </td></tr></table></TD></TR>
  <TR><TD align="right" valign="top">Descriptif court : </TD><TD><textarea name="des_court" cols="50" rows="8"><?=$des_court?></textarea></TD></TR>
  <TR><TD align=right valign=top>Contenu :</TD><TD>
  <?
  include_once("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor('contenu');
  $oFCKeditor->BasePath = '../fckeditor/';
  $oFCKeditor->ToolbarSet = 'Default';
  $oFCKeditor->Height = '500';
  $oFCKeditor->Width = '580';
  $oFCKeditor->Value = $contenu;
  $oFCKeditor->Create();
  ?>
  </TD></TR>
  <TR><TD align="right">A la une : </TD><TD><input type="radio" name="alaune" value="1" <?=(($alaune == "1") ? " checked" : "")?> /> oui <input type="radio" name="alaune" value="0" <?=(($alaune == "0") ? " checked" : "")?> /> non</TD></TR>
  <TR><TD align="right">Image : </TD><TD><input type="file" name="img" /></TD></TR>
  <TR><TD align="right">PDF : </TD><TD><input type="file" name="pdf" /></TD></TR>
  <TR align="center"><TD colspan="2"><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>
  
  
		</td>
	</tr>
</table><br>