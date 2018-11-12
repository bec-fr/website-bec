<?
//les slides
$queryB = "SELECT * FROM bandeau WHERE afficher = '1' AND site='".addslashes($site)."' ORDER BY ordre";
$execB = mysql_query($queryB) or die(mysql_error());
$tab_slide = array(); 
$nb_slide = mysql_num_rows($execB);
while($data = mysql_fetch_assoc($execB)){
	array_push($tab_slide, $data);
}
?>
<? if($nb_slide!='0'){?>
<div id="bandeau">
  <? if($nb_slide >= 2){ ?>
  <div id="bloc_puce">
    <? for($i=0 ; $i<$nb_slide ; $i++){?>
    <a class="<?=(($i==0) ? "btn_slide_actif" : "btn_slide")?>" href="#" id="puce_<?=$i?>" onclick="go_to_slide('<?=$i?>'); return false;"></a>
    <? }?>
  </div>
  <? }?>
</div>
<div id="slide">
  <div id="all_slide" style="width:<?=($nb_slide*550)?>px;">
    <?
	for($i=0 ; $i<$nb_slide ; $i++){?>
    <div class="contenu_slide">
      <? if(trim($tab_slide[$i]["url"]) != ""){?>
      <a href="<?=$tab_slide[$i]["url"]?>" target="_blank"><img src="imagesUp/bandeaux/<?=$tab_slide[$i]["id_bandeau"]?>_c.jpg" alt="" style="float:left;" /></a>
      <?
	}else{?>
      <img src="imagesUp/bandeaux/<?=$tab_slide[$i]["id_bandeau"]?>_c.jpg" alt="" style="float:left;" />
      <?
	}
	?>
    	<? if(trim($tab_slide[$i]["nom"]) != ""){?>
      <div id="titre_bandeau">
		<?=stripslashes($tab_slide[$i]["nom"])?>
      </div>
      <? }?>
    </div>
    <?
	}
	?>
  </div>
</div>
<? }?>
<script type="text/javascript">
var lecture = true;
var indice = 0;

function suivant_slide(){
	if(lecture == true){
		document.getElementById("puce_" + indice).setAttribute("class", "btn_slide");
		if(indice == "<?=($nb_slide-1)?>")
			num = 0;
		else
			num = indice+1;
		indice = num;
		new_margin_left = parseInt(num*550);
		$('#all_slide').animate({marginLeft: -new_margin_left+'px'}, 500);
		document.getElementById("puce_" + num).setAttribute("class", "btn_slide_actif");
		setTimeout("suivant_slide()", 4000);
	}
}

function pause(){
	lecture = false;
}

function go_to_slide(num){
	pause();
	
	new_margin_left = parseInt(num*550);
	$('#all_slide').animate({marginLeft: -new_margin_left+'px'}, 500);
	document.getElementById("puce_" + indice).setAttribute("class", "btn_slide");
	document.getElementById("puce_" + num).setAttribute("class", "btn_slide_actif");
	
	indice = num;
}

$(document).ready(function(){
	<? if($nb_slide >= 2){ ?>
	setTimeout("suivant_slide()", 5000);
	<? } ?>
});

</script> 
