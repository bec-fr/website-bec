<?php
function upload($source,$destination,$largeur_max,$hauteur_max=0){
	// Calcul des nouvelles dimensions
	$type=mime_content_type($source);
	list($width, $height) = getimagesize($source);
	if($largeur_max==0 || $largeur_max==""){
			$new_width = round(($width/$height)*$hauteur_max);
			$new_height = $hauteur_max;
	}else{
		$new_width = $largeur_max;
		$new_height = round(($height/$width)*$largeur_max);
		if($hauteur_max!=0 && $hauteur_max!="" && $new_height>$hauteur_max){
			$new_width = round(($width/$height)*$hauteur_max);
			$new_height = $hauteur_max;
		}
	}
	
	// Redimensionnement
	$image_g = imagecreatetruecolor($new_width, $new_height);
	$fond=imagecolorallocate ($image_g,255,255,255);
	imagefilledrectangle($image_g, 0, 0, $new_width, $new_height, $fond);
	if($type=="image/png"){
		$image = imagecreatefrompng($source);
	}elseif($type=="image/gif"){
		$image = imagecreatefromgif($source);
	}else{
		$image = imagecreatefromjpeg($source);
	}
	imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	// Enregistrement
	imagejpeg($image_g, $destination);
	
	//destruction
	imagedestroy($image);
	imagedestroy($image_g);
}

function upload_decoupe($source,$destination,$largeur,$hauteur){
	// Calcul des nouvelles dimensions
	$type=mime_content_type($source);
	list($width, $height) = getimagesize($source);
	if($largeur>=$hauteur){
		$new_width = $largeur;
		$new_height = round(($largeur * $height) / $width);
		if($new_height<$hauteur){
			$new_width = round(($hauteur * $width) / $height);
			$new_height = $hauteur;
		}
	}else{
		$new_width = round(($hauteur * $width) / $height);
		$new_height = $hauteur;
		if($new_width<$largeur){
			$new_width = $largeur;
			$new_height = round(($largeur * $height) / $width);
		}
	}
	
	// Redimensionnement
	$image_g = imagecreatetruecolor($new_width, $new_height);
	$fond=imagecolorallocate ($image_g,255,255,255);
	imagefilledrectangle($image_g, 0, 0, $new_width, $new_height, $fond);
	if($type=="image/png"){
		$image = imagecreatefrompng($source);
	}elseif($type=="image/gif"){
		$image = imagecreatefromgif($source);
	}else{
		$image = imagecreatefromjpeg($source);
	}
	imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	imagejpeg($image_g, $destination);	

	// Découpe
	if($new_width>$largeur){
		$decalage_x=floor(($new_width-$largeur)/2);
	}else{
		$decalage_x=0;
	}
	if($new_height>$hauteur){
		$decalage_y=floor(($new_height-$hauteur)/2);
	}else{
		$decalage_y=0;
	}
	$image_g2 = imagecreatetruecolor($largeur, $hauteur);
	imagecopy($image_g2, $image_g, 0, 0, $decalage_x, $decalage_y, $largeur, $hauteur);
	
	// Enregistrement
	imagejpeg($image_g2, $destination);	
	
	//destruction
	imagedestroy($image);
	imagedestroy($image_g);
	imagedestroy($image_g2);
}
?>
