/**************************************************************************************************
*  D�terminer le type du navigateur pour l'aide dynamique
**************************************************************************************************/
//initialiser le navigateur
function chargernavigateur()
{
//d�terminer le type du navigateur
I5=I4=N4=N6=false;
if(document.all && document.getElementById)I5=true
else if(document.all)I4=true
else if(document.layers)N4=true
else if(document.getElementById)N6=true

//mettre en place le gestionnaire d'�v�nements
if(N6) document.addEventListener('keydown',aide,true)
else if(N4)
           {
           document.captureEvents(Event.KEYDOWN)
           document.onkeydown=aide
           }

else if(I4||I5)
           {
           document.onkeydown=aide
           }
}



/**************************************************************************************************
*  Ouvrir la fen�tre d'aide en haut � gauche
**************************************************************************************************/
function aide(e)
{
var Code=(I4||I5)?event.keyCode:e.which
var Touche=String.fromCharCode(Code)

//r�cup�rer la taille de l'�cran
var hauteurecran=screen.height;
    hauteurecran-=80;

    //appuie sur la touche d'aide ECHAPPE
    if(Code==27)
    {
    //pr�parer la fen�tre centr�e � l'�cran
    var option='scrollbars=1,width=400,height='+hauteurecran+',left=0,screenX=0,top=0,screenY=0';
    fenetre=window.open('aide.htm','f1',option);
    }
}


/**************************************************************************************************
*  Ouvrir la fen�tre d'aide en haut � gauche
**************************************************************************************************/
function confirmationsuppression()
{
reponse=confirm("Voulez vous continuer la suppression ?");
return reponse;
}


/**************************************************************************************************
*  Gestionnaire des rubrique
**************************************************************************************************/
//envoyer le formulaire
function controle(numerorubrique)
{
//mettre la zone cach�e � jour et cr�er le lien
document.rubrique.numerorubrique.value=numerorubrique;
document.rubrique.action='../controle/controleuti.php';
document.rubrique.submit();
}



/**************************************************************************************************
*  Gestionnaire des controles pour les enseignants
**************************************************************************************************/
//envoyer le formulaire
function controleenseignant(numerorubrique)
{
//mettre la zone cach�e � jour et cr�er le lien
document.rubrique.numerorubrique.value=numerorubrique;
document.rubrique.action='../controle/controleens.php';
document.rubrique.submit();
}




/**************************************************************************************************
*  Gestionnaire des groupes
**************************************************************************************************/
function soumettregroupe(numero,trait)
{
//mettre � jour les zones du formulaire
document.groupe.numerogroupe.value=numero;
document.groupe.traitement.value=trait;

         //traitement en cas de suppression
         if(trait=='supprimer')
         {
                 //boite de confirmation avant de supprimer le message
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.groupe.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le message
document.groupe.submit();
}



/**************************************************************************************************
*  Gestionnaire des graphiques pourles contr�les
**************************************************************************************************/
function graphcontrole(numerocontrole,numerorubrique)
{
//r�cup�rer le choix dans la bonne liste d�roulante
numerographique="document.controlerubrique.graphique"+numerocontrole+".selectedIndex";
//convertir en num�ro
numerographique=eval(numerographique);

                //faire le lien vers la bonne page de graphique
                if(numerographique!=0)
                {
                document.controlerubrique.numerocontrole.value=numerocontrole;
                document.controlerubrique.numerorubrique.value=numerorubrique;
                document.controlerubrique.action="./graphique"+numerographique+".php";
                document.controlerubrique.submit();
                }
}



/**************************************************************************************************
*  Gestionnaire des informations pour la rubrique
**************************************************************************************************/
function inforubrique(numero)
{
//mettre � jour les zones cach�es
document.rubrique.numerorubrique.value=numero;
document.rubrique.action="../rubrique/inforubrique.php";
document.rubrique.submit();
}



/**************************************************************************************************
*  Gestionnaire des rubriques
**************************************************************************************************/
function gestionrubrique(numero,traitement)
{
//mettre � jour les zones cach�es
document.rubriqueuti.numerorubrique.value=numero;
document.rubriqueuti.traitement.value=traitement;
document.rubriqueuti.action="../ressource/ressourceuti.php";
document.rubriqueuti.submit();
}



/**************************************************************************************************
*  Gestionnaire des rubriques pour les enseignants
**************************************************************************************************/
function gestionrubriqueenseignant(numero,traitement)
{
//mettre � jour les zones cach�es
document.rubriqueuti.numerorubrique.value=numero;
document.rubriqueuti.traitement.value=traitement;
document.rubriqueuti.action="../ressource/ressourceens.php";
document.rubriqueuti.submit();
}



/**************************************************************************************************
*  Gestionnaire de l'annuaire des utilisateurs de la rubrique
**************************************************************************************************/
function annuairerubriqueuti(numero)
{
//mettre � jour les zones cach�es
document.rubriqueuti.numerorubrique.value=numero;
document.rubriqueuti.action="./annuaireuti.php";
document.rubriqueuti.submit();
}



/**************************************************************************************************
*  Gestionnaire de l'annuaire de la rubrique
**************************************************************************************************/
function annuairerubrique(numero)
{
//mettre � jour les zones cach�es
document.rubrique.numerorubrique.value=numero;
document.rubrique.action="./annuaire.php";
document.rubrique.submit();
}



/**************************************************************************************************
*  Gestionnaire de l'annuaire de la rubrique
**************************************************************************************************/
function gestioncontrole(numerocontrole,numerorubrique,trait)
{
//mettre � jour les zones cach�es
document.controlerubrique.numerocontrole.value=numerocontrole;
document.controlerubrique.numerorubrique.value=numerorubrique;
document.controlerubrique.traitement.value=trait;

         //demande de suppression d'un contr�le
         if(trait=='supprimer')
         {
                 //afficher une zone de confirmation avant la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.controlerubrique.action="./controle.php";
                 document.controlerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
         //demande de cr�ation d'un contr�le
         if(trait=='creer')
         {
         document.controlerubrique.action="./insertcontrole.php";
         }
         //demande de modification d'un contr�le
         if(trait=='modifier')
         {
         document.controlerubrique.action="./modifiercontrole.php";
         }

//envoyer le formulaire
document.controlerubrique.submit();
}






/**************************************************************************************************
*  Gestionnaire des contr�les pour les enseignants
**************************************************************************************************/
function gestioncontroleens(numerocontrole,numerorubrique,trait)
{
//mettre � jour les zones cach�es
document.controlerubrique.numerocontrole.value=numerocontrole;
document.controlerubrique.numerorubrique.value=numerorubrique;
document.controlerubrique.traitement.value=trait;

         //suppression d'un contr�le
         if(trait=='supprimer')
         {
                 //confirmation de la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.controlerubrique.action="./controleens.php";
                 document.controlerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
         //demande de cr�ation d'un contr�le
         if(trait=='creer')
         {
         document.controlerubrique.action="./insertcontroleens.php";
         }
         //demande de modification d'un contr�le
         if(trait=='modifier')
         {
         document.controlerubrique.action="./modifiercontroleens.php";
         }

//envoyer le formulaire
document.controlerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des notes individuelles pour un contr�le sp�cifique
**************************************************************************************************/
function modifiernoteindividuelle(numerocontrole,numerorubrique,numeroetudiant)
{
//mettre � jour les zones cach�es
document.controlerubrique.numerocontrole.value=numerocontrole;
document.controlerubrique.numerorubrique.value=numerorubrique;
document.controlerubrique.numeroutilisateur.value=numeroetudiant;
document.controlerubrique.action="./insertnoteindividuelle.php";
document.controlerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des notes individuelles des contr�les pour les enseignants
**************************************************************************************************/
function modifiernoteindividuelleens(numerocontrole,numerorubrique,numeroetudiant)
{
//mettre � jour les zones cach�es
document.controlerubrique.numerocontrole.value=numerocontrole;
document.controlerubrique.numerorubrique.value=numerorubrique;
document.controlerubrique.numeroutilisateur.value=numeroetudiant;
document.controlerubrique.action="./insertnoteindividuelleens.php";
document.controlerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des contr�les
**************************************************************************************************/
function soumettrecontrole(numero)
{
//mettre � jour les zones cach�es
document.rubrique.numerorubrique.value=numero;
document.rubrique.action="../controle/controle.php";
document.rubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des ressources
**************************************************************************************************/
function soumettreressource(numero)
{
//mettre � jour les zones cach�es
document.rubrique.numerorubrique.value=numero;
document.rubrique.action="../ressource/ressource.php";
document.rubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des rubriques
**************************************************************************************************/
function soumettrerubrique(numero,trait)
{
//mettre � jour les zoens cach�es
document.rubrique.numerorubrique.value=numero;
document.rubrique.traitement.value=trait;

         //suppression d'une rubrique
         if(trait=='supprimer')
         {
                //message de confirmation
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.rubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }

//envoyer le formulaire
document.rubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des ressources de la rubrique
**************************************************************************************************/
function soumettreressourcerubriqueens(numero,trait,typeressource)
{
//mettre � jour les zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er la ressource pour la rubrique
         if(trait=='creer')
         {
         document.ressourcerubrique.action="insertressourceens.php";
         }
         //t�l�charger la ressource
         else if(trait=='telecharger')
         {
         document.ressourcerubrique.numeroressource.value=typeressource;
         document.ressourcerubrique.action="telecharger.php";
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressourceens.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //message de confirmation
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="ressourceens.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }

//envoyer le formulaire
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des controles de la rubrique
**************************************************************************************************/
function soumettrecontrolerubrique(numerocontrole)
{
//mettre � jour les zones cach�es
document.controlerubrique.numerocontrole.value=numerocontrole;
document.controlerubrique.action="telecharger.php";
document.controlerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des ressources de la rubrique
**************************************************************************************************/
function soumettreressourcerubrique(numero,trait,typeressource)
{
//mettre � jour les zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er une ressource
         if(trait=='creer')
         {
         document.ressourcerubrique.action="insertressource.php";
         }
         //t�l�charger la ressource
         else if(trait=='telecharger')
         {
         document.ressourcerubrique.numeroressource.value=typeressource;
         document.ressourcerubrique.action="telecharger.php";
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressource.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //message de confirmation pour la ressource
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="ressource.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }

//envoyer le formulaire
document.ressourcerubrique.submit();
}



/**************************************************************************************************
*  Gestionnaire des articles de la rubrique
**************************************************************************************************/
function soumettrearticlerubriqueuti(numero,trait,typeressource)
{
//mettre � jour les zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er l'article
         if(trait=='creer')
         {
         document.ressourcerubrique.action="articleuti.php";
         }
         //consulter l'article
         else if(trait=='consulter')
         {
         document.ressourcerubrique.action="articleuti.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //modifier l'article
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressource.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer l'article
         else if(trait=='supprimer')
         {
                 //demande de confirmation
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="articleuti.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }

//envoyer le formulaire
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des articles de la rubrique
**************************************************************************************************/
function soumettrearticlerubrique(numero,trait,typeressource)
{
//mettre � jour les zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er un article
         if(trait=='creer')
         {
         document.ressourcerubrique.action="article.php";
         }
         //consulter un article
         else if(trait=='consulter')
         {
         document.ressourcerubrique.action="article.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //modifier un article
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressource.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer un article
         else if(trait=='supprimer')
         {
                 //demande de confirmation de suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="article.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des articles de la rubrique en menu
**************************************************************************************************/
function soumettrearticlerubriquemenu(numero,trait,typeressource)
{
//mise � joru des zones cach�es
document.article.numerorubrique.value=numero;
document.article.traitement.value=trait;

         //cr�er l'article
         if(trait=='creer')
         {
         document.article.action="../ressource/articleuti.php";
         }
         //consulter l'article
         else if(trait=='consulter')
         {
         document.article.action="../ressource/articleuti.php";
         document.article.numeroressource.value=typeressource;
         }
         //modifier l'article
         else if(trait=='modifier')
         {
         document.article.action="../ressource/modifierressource.php";
         document.article.numeroressource.value=typeressource;
         }
         //supprimer l'article
         else if(trait=='supprimer')
         {
                 //demande de confirmation de la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.article.suppression.value="oui";
                 document.article.numeroressource.value=typeressource;
                 document.article.action="../ressource/articleuti.php";
                 document.article.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.article.submit();
}


/**************************************************************************************************
*  Gestionnaire des news de la rubrique avec le menu
**************************************************************************************************/
function soumettrenewsrubriquemenu(numero,trait,typeressource)
{
//mise � jour des zones cach�es
document.article.numerorubrique.value=numero;
document.article.traitement.value=trait;

         //cr�er la ressource
         if(trait=='creer')
         {
         document.article.action="../ressource/newsuti.php";
         }
         //consulter la ressource
         else if(trait=='consulter')
         {
         document.article.action="../ressource/newsuti.php";
         document.article.numeroressource.value=typeressource;
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.article.action="../ressource/modifierressourceuti.php";
         document.article.numeroressource.value=typeressource;
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //confirmation de la suppression de la ressource
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.article.suppression.value="oui";
                 document.article.numeroressource.value=typeressource;
                 document.article.action="../ressource/newsuti.php";
                 document.article.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.article.submit();
}


/**************************************************************************************************
*  Gestionnaire des news de la rubrique
**************************************************************************************************/
function soumettrenewsrubriqueuti(numero,trait,typeressource)
{
//mettre � jour les zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er la news
         if(trait=='creer')
         {
         document.ressourcerubrique.action="newsuti.php";
         }
         //consulter la news
         else if(trait=='consulter')
         {
         document.ressourcerubrique.action="newsuti.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //modifier la news
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressourceuti.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer la news
         else if(trait=='supprimer')
         {
                 //confirmation avant la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="newsuti.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des news de la rubrique
**************************************************************************************************/
function soumettrenewsrubrique(numero,trait,typeressource)
{
//mise � jour des zones cach�es
document.ressourcerubrique.numerorubrique.value=numero;
document.ressourcerubrique.typeressource.value=typeressource;
document.ressourcerubrique.traitement.value=trait;

         //cr�er la news
         if(trait=='creer')
         {
         document.ressourcerubrique.action="news.php";
         }
         //consulter la news
         else if(trait=='consulter')
         {
         document.ressourcerubrique.action="news.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //modifier la news
         else if(trait=='modifier')
         {
         document.ressourcerubrique.action="modifierressource.php";
         document.ressourcerubrique.numeroressource.value=typeressource;
         }
         //supprimer la news
         else if(trait=='supprimer')
         {
                 //confirmation avant suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.ressourcerubrique.suppression.value="oui";
                 document.ressourcerubrique.numeroressource.value=typeressource;
                 document.ressourcerubrique.action="news.php";
                 document.ressourcerubrique.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des liens sur les ressources
**************************************************************************************************/
function lienressource(numerorubrique,page)
{
//mettre � jour les zones cach�es et envoyer le formulaire
document.ressourcerubrique.numerorubrique.value=numerorubrique;
document.ressourcerubrique.action=page;
document.ressourcerubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des liens sur les ressources
**************************************************************************************************/
function lienressourceuti(numerorubrique,page)
{
//mettre � jour les zones cach�es et envoyer le formulaire
document.ressourcerubrique.numerorubrique.value=numerorubrique;
document.ressourcerubrique.action=page;
document.ressourcerubrique.submit();
}



/**************************************************************************************************
*  Gestionnaire des pages persos de l'utilisateur
**************************************************************************************************/
function pagepersoutilisateur(numero)
{
//mettre � jour les zones cach�es et envoyer le formulaire
document.rubrique.numeroutilisateur.value=numero;
document.rubrique.action="../utilisateur/fichepersoutilisateurbis.php";
document.rubrique.submit();
}


/**************************************************************************************************
*  Gestionnaire des pages perso de la personne et modification
**************************************************************************************************/
function fichepersoutilisateurmodif(numero)
{
//mettre � jour les zones cach�es et envoyer le formulaire
document.utilisateur.numeroutilisateur.value=numero;
document.utilisateur.action="./modifierutilisateurbis.php";
document.utilisateur.submit();
}


/**************************************************************************************************
*  Gestionnaire des utilisateurs
**************************************************************************************************/
function soumettreutilisateur(numero,trait)
{
//mettre � jour les zones cach�es et envoyer le formulaire
document.utilisateur.numeroutilisateur.value=numero;
document.utilisateur.traitement.value=trait;

         //consulter la ressource
         if(trait=='consulter')
         {
         document.utilisateur.action="fichepersoutilisateur.php";
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.utilisateur.action="modifierutilisateur.php";
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //confirmation avant suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.utilisateur.suppression.value="oui";
                 document.utilisateur.action="listeutilisateur.php";
                 document.utilisateur.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.utilisateur.submit();
}




/**************************************************************************************************
*  Gestionnaire des utilisateurs
**************************************************************************************************/
function soumettreutilisateurgroupe(numero,trait)
{
//mettre � jour les zones cach�e
document.utilisateur.numeroutilisateur.value=numero;
document.utilisateur.traitement.value=trait;

         //consulter la ressource
         if(trait=='consulter')
         {
         document.utilisateur.action="../utilisateur/fichepersoutilisateur.php";
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.utilisateur.action="modifierutilisateur.php";
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //confirmation de la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.utilisateur.suppression.value="oui";
                 document.utilisateur.action="listeutilisateur.php";
                 document.utilisateur.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.utilisateur.submit();
}



/**************************************************************************************************
*  Gestionnaire des enseignants de la rubrique
**************************************************************************************************/
function soumettreenseignantrubrique(numero,trait)
{
//mise � jour des zones cach�es
document.enseignant.numeroutilisateur.value=numero;
document.enseignant.traitement.value=trait;

         //consulter la ressource
         if(trait=='consulter')
         {
         document.enseignant.action="../utilisateur/fichepersoutilisateur.php";
         }
         //modifier la ressource
         else if(trait=='modifier')
         {
         document.enseignant.action="modifierutilisateur.php";
         }
         //supprimer la ressource
         else if(trait=='supprimer')
         {
                 //confirmation de la suppression
                 if(reponse=confirm("Voulez vous continuer la suppression ?"))
                 {
                 document.enseignant.suppression.value="oui";
                 document.enseignant.action="listeutilisateur.php";
                 document.enseignant.submit();
                 }
                 else
                 {
                 return response;
                 }
         }
//envoyer le formulaire
document.enseignant.submit();
}

