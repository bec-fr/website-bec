<? include("connect.php"); ?>
<? include("haut.php"); ?>
						<table width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="10">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="10">&nbsp;</td>
                            <td valign="top" width="201"><? include("include/menu".$fic_nom.".php"); ?></td>
                            <td width="15">&nbsp;</td>
                            <td valign="top"><table cellpadding="0" cellspacing="0" width="560">
                                <tr>
                                  <td><img src="images/crochet<?=$fic_nom?>.jpg" align="absmiddle" />&nbsp;<span class="<?=$class_titre?>"><b>Foire aux questions</b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top" class="texteGris">
                                  <br /><br />
                                  
                                  <table align="center" width="100%" class="texteGris">
								  <?
                                  $query = "SELECT * FROM faq ORDER BY id";
                                  $exec = mysql_query($query) or die(mysql_error());
                                  $nb = mysql_num_rows($exec);
                                  
                                  $i=1;
                                  while($data = mysql_fetch_assoc($exec))
                                  {
                                    ?>
                                    <tr><td><b><?=stripslashes($data["question"])?></b></td></tr>
                                    <tr height="10"><td></td></tr>
                                    <tr><td><?=nl2br(stripslashes($data["reponse"]))?></td></tr>
                                    <tr height="15"><td></td></tr>
                                    <?
                                    $i++;
                                  }
                                  ?>
                                  </table>
                                  
                                  </td>
                                </tr>
                              </table></td>
                            <td width="9">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite".$fic_nom.".php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>