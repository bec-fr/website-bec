<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Menu principal</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/home2.gif"></td><td><a href="admin.php" class="menu">Accueil</a></td></tr>
    <tr><td align="center"><img src="../adminImg/web2.gif"></td><td><a href="../" class="menu" target="_blank">Voir votre site</a></td></tr>
    <tr><td align="center"><img src="../adminImg/sortie2.gif"></td><td><a href="deconnexion.php" class="menu">Déconnexion</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td align="center" colspan="2" style="font-size:14px">Partie <b><?=(($_SESSION["partie"] == "1") ? "Etudiants/adultes" : (($_SESSION["partie"] == "2") ? "Mini séjours" : (($_SESSION["partie"] == "3") ? "Junior" : "Etudiants/adultes")))?></b></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Partie</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?partie=etudiant_adulte" class="menu">Etudiants/adultes</a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?partie=minis" class="menu">Mini séjours</a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?partie=junior" class="menu">Juniors</a></td></tr>
    <!--<tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?partie=immersion_totale" class="menu">Immersion totale</a></td></tr>-->
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Réservations junior</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=reservation_junior" class="menu">Voir tout</a> (<?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE saison = ''"))?>)</td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=reservation_junior&paiement=1" class="menu" style="color:#20C420">Paiement validé</a> (<?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE paiement = '1' AND saison = '7'"))?>)</td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=reservation_junior&paiement=0" class="menu" style="color:#CC00FF">Paiement attente</a> (<?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE paiement = '0' AND saison = '7'"))?>)</td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=reservation_junior&paiement=2" class="menu" style="color:#FF0000">Paiement annulé</a> (<?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE paiement = '2' AND saison = '7'"))?>)</td></tr>
    </table>
</td></tr>
</table><br />

<? if($_SESSION["partie"] == "3"){ ?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Options / devis</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_devis" class="menu">Listing des <b>options</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<? } ?>

<? if($_SESSION["partie"] == "1"){ ?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Fiches</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=fiche_etudiant_adulte" class="menu">Listing des <b>fiches adultes</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=fiche_etudiant_adulteAjouter" class="menu">Ajout d'une <b>fiche adulte</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Pays / villes</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=pays" class="menu">Listing des <b>pays</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=paysAjouter" class="menu">Ajout d'un <b>pays</b></a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=ville" class="menu">Listing des <b>villes</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=villeAjouter" class="menu">Ajout d'une <b>ville</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Formules</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=formule" class="menu">Listing des <b>formules</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=formuleAjouter" class="menu">Ajout d'une <b>formule</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Hébergements</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=hebergement" class="menu">Listing des <b>hébergements</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=hebergementAjouter" class="menu">Ajout d'un <b>hébergement</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Examens préparés</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=examen" class="menu">Listing des <b>examens</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=examenAjouter" class="menu">Ajout d'un <b>examen</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Accréditations</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=accreditation" class="menu">Listing des <b>accréditations</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=accreditationAjouter" class="menu">Ajout d'une <b>accréditation</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Devis</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=devis" class="menu">Listing des <b>devis</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Devises/taux de change</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=devise" class="menu">Listing des <b>Devises</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Réductions étudiants</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=reductions_etudiants" class="menu">Listing des <b>réductions</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#9d005d"><td>Brochures</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=brochure&site=etudiant" class="menu">Listing des <b>brochures</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<? } ?>

<? if($_SESSION["partie"] == "2"){ ?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Fiches</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=fiche_minis" class="menu">Listing des <b>fiches mini-séjours</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=fiche_minisAjouter" class="menu">Ajout d'une <b>fiche mini-séjour</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Pays / villes</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=minis_pays" class="menu">Listing des <b>pays</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=minis_paysAjouter" class="menu">Ajout d'un <b>pays</b></a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=minis_ville" class="menu">Listing des <b>villes</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=minis_villeAjouter" class="menu">Ajout d'une <b>ville</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Formules</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=minis_formule" class="menu">Listing des <b>formules</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=minis_formuleAjouter" class="menu">Ajout d'une <b>formule</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Hébergements</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=minis_hebergement" class="menu">Listing des <b>hébergements</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=minis_hebergementAjouter" class="menu">Ajout d'un <b>hébergement</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Devis</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=minis_devis" class="menu">Listing des <b>devis</b></a></td></tr>
    </table>
</td></tr>
</table><br />


<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#a80915"><td>Brochures</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=brochure_minis" class="menu">Listing des <b>brochures</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<? } ?>

<? if($_SESSION["partie"] == "3"){ ?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Fiches</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=fiche_junior" class="menu">Listing des <b>fiches junior</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=fiche_juniorAjouter" class="menu">Ajout d'une <b>fiche junior</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Pays / villes</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_pays" class="menu">Listing des <b>pays</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_paysAjouter" class="menu">Ajout d'un <b>pays</b></a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_ville" class="menu">Listing des <b>villes</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_villeAjouter" class="menu">Ajout d'une <b>ville</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Options transport</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_option_transport" class="menu">Listing des <b>options</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_option_transportAjouter" class="menu">Ajout d'une <b>option</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Réductions</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_reduction" class="menu">Listing des <b>réductions</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_reductionAjouter" class="menu">Ajout d'une <b>réduction</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Formules</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_formule" class="menu">Listing des <b>formules</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_formuleAjouter" class="menu">Ajout d'une <b>formule</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Hébergements</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=junior_hebergement" class="menu">Listing des <b>hébergements</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=junior_hebergementAjouter" class="menu">Ajout d'un <b>hébergement</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Brochures</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=brochure&site=junior" class="menu">Listing des <b>brochures</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#faaf3b"><td>Avoir / réduc</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=avoir" class="menu">Listing des <b>avoirs</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=avoirAjouter" class="menu">Ajout d'un <b>avoir</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<? } ?>

<? if($_SESSION["partie"] == "4"){ ?>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#89b013"><td>Fiches</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=fiche_immersion_totale" class="menu">Listing des <b>fiches immersions</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=fiche_immersion_totaleAjouter" class="menu">Ajout d'une <b>fiche immersion</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#89b013"><td>cat / scat</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=immersion_totale_cat" class="menu">Listing des <b>cat</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=immersion_totale_catAjouter" class="menu">Ajout d'une <b>cat</b></a></td></tr>
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=immersion_totale_cat2" class="menu">Listing des <b>sous-cat</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=immersion_totale_cat2Ajouter" class="menu">Ajout d'une <b>cat</b></a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2" style="background-color:#89b013"><td>Destination</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=immersion_totale_pays" class="menu">Listing des <b>destinations</b></a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=immersion_totale_paysAjouter" class="menu">Ajout d'une <b>destination</b></a></td></tr>
    </table>
</td></tr>
</table><br />
<? } ?>


<br /><br /><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Carrousel</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=bandeau" class="menu">Listing des bandeaux</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=bandeauAjouter" class="menu">Ajout d'un bandeau</a></td></tr>
    </table>
</td></tr>
</table><br />
<? /*
<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Bandeaux accueil</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=bandeau_acc" class="menu">Listing des bandeaux</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=bandeau_accAjouter" class="menu">Ajout d'un bandeau</a></td></tr>
    </table>
</td></tr>
</table><br />
*/ ?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Pages</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=1" class="menu">Accueil étudiants</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=2" class="menu">Accueil Juniors</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=3" class="menu">Accueil Voyages scolaires</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=4" class="menu">Intro Etudiants</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=5" class="menu">Intro Juniors</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=6" class="menu">Intro Voyages scolaires</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=7" class="menu">Intro Etudiants 2</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=8" class="menu">Intro Juniors 2</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=page2Ajouter&page=9" class="menu">Intro Voyages scolaires 2</a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>FAQ</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=faq" class="menu">Listing des questions</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=faqAjouter" class="menu">Ajout d'une question</a></td></tr>
    </table>
</td></tr>
</table><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
<tr align="center" class="titre2"><td>Newsletter</td></tr>
<tr><td>
	<table align="center" border="0" width="100%" cellpadding="2" cellspacing="0">
    <tr><td align="center" width="20"><img src="../adminImg/mail2.gif"></td><td><a href="admin.php?action=newsletterEnv" class="menu">Envoyer un mail</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=newsletter" class="menu">Liste de diffusion</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=newsletter_archive" class="menu">Archives</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=newsletterAjouter" class="menu">Ajout d'un e-mail</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=newsletter_importmail" class="menu">Importer fichier csv</a></td></tr>
    <tr><td align="center"><img src="../adminImg/listing2.gif"></td><td><a href="admin.php?action=newsletter_groupe" class="menu">Liste des groupes</a></td></tr>
    <tr><td align="center"><img src="../adminImg/plus2.gif"></td><td><a href="admin.php?action=newsletter_groupeAjouter" class="menu">Ajout d'un groupe</a></td></tr>
    </table>
</td></tr>
</table><br />
