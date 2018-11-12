//Fonction d'Instance
function objet_XMLHttpRequest()
{
    var xhr = null;
 
    if (window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e){
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else{
            xhr = new XMLHttpRequest();
        }
    }
    else{
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}
//Fonction permettant d'envoyer les donn�es
function Ville(id)
{
    //On d�clare un objet
    var objet1 = objet_XMLHttpRequest();
 
    //On d�fini ce qu'on va faire quand on aura la r�ponse
    objet1.onreadystatechange = function(){
        //On ne fait quelque chose que si on a tout re�u et que le serveur est ok
        if(objet1.readyState == 4 && objet1.status == 200){
            //On envoie la r�ponse dans le div "blocDepartements"
            document.getElementById('blocDepartements').innerHTML = objet1.responseText;
        }
        //c�t� ajax �a merde
        else{
            //on contr�le le statut. Si 404, le fichier ouvert par "open" n'existe pas
            if(objet1.status == 404){
                alert('Erreur ' +objet1.status + '! Le fichier php semble �tre absent...');
            }
        }
    }
    //Ouverture : m�thode, fichier, mode (true=asynchrone | false=synchrone)
    objet1.open("POST", "requete.php" , true);  
    objet1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //envoie
    objet1.send("region=" + id);
}