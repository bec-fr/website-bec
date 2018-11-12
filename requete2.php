<?php
//Numéro de la région
if(isset($_POST["region"]) && $_POST["region"] != 'vide'){
/*Si la variable $include n'existe pas c'est que le numéro de la région passe par AJAX. On a donc besoin d'avoir une connexion avec la base de données.*/
/*Quand on poste le formulaire, cette page est inclue directement dans le div "blocDepartements", donc la connexion est inutile.*/
/*Si on inlcue cette page au moment de la validation, c'est uniquement pour garder la sélection "selected" de la liste.*/
if(!isset($include)){
//On indique le Content-Type utilisé
header('Content-Type: text/html; charset="iso-8859-1"');
 
include("connect.php");
//Connexion à la base de données

echo '<div id="reponse">La variable $_POST["region"] provient d\'AJAX.</div>';
}
else{
echo '<div id="reponse">La variable $_POST["region"] provient de l\'include.</div>';

}
?>
 valeur : <?= ($_POST["region"]);?><br>
<label>Ville : </label>

<select name="departement" id="departement">
<option value="vide">- - - Choisissez une ville - - -</option>
<?php
echo $_POST["region"];
//On sélectionne les départements en fonction du numéro de la région
$selectdepartement = mysql_query("SELECT id,nom FROM ville WHERE pays=".mysql_real_escape_string($_POST["region"])." ORDER BY nom") or die (mysql_error());

//On boucle
while($donnees = mysql_fetch_assoc($selectdepartement))
{
echo '<option value="'.$donnees['id'].'"';
if(isset($_POST["departement"]) && $_POST["departement"]==$donnees['num_departement']){ echo " selected"; }
echo '>'.$donnees['nom'].'</option>';
}
?>
</select><br/>
<?php } ?>