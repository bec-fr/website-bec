<?php
//Numéro de la région
if(isset($_POST["pays"]) && $_POST["pays"] != 'vide'){
/*Si la variable $include n'existe pas c'est que le numéro de la région passe par AJAX. On a donc besoin d'avoir une connexion avec la base de données.*/
/*Quand on poste le formulaire, cette page est inclue directement dans le div "blocvilles", donc la connexion est inutile.*/
/*Si on inlcue cette page au moment de la validation, c'est uniquement pour garder la sélection "selected" de la liste.*/
if(!isset($include)){
//On indique le Content-Type utilisé
header('Content-Type: text/html; charset="iso-8859-1"');
 
include("connect.php");
//Connexion à la base de données


}
else{


}
?>

<select name="ville" id="ville">
<option value="">- - -  Ville - - -</option>
<?php
echo $_POST["pays"];
//On sélectionne les départements en fonction du numéro de la région
$selectville = mysql_query("SELECT id,nom FROM ville WHERE pays=".mysql_real_escape_string($_POST["pays"])." ORDER BY nom") or die (mysql_error());

//On boucle
while($donnees = mysql_fetch_assoc($selectville))
{
echo '<option value="'.$donnees['id'].'"';
if(isset($_POST["ville"]) && $_POST["ville"]==$donnees['num_ville']){ echo " selected"; }
echo '>'.$donnees['nom'].'</option>';
}
?>


</select>
                           
                                        
                                   



<?php } ?>
