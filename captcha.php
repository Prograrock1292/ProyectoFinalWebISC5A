<?php 

function create_capacha($text)
{

	$width = 200;
	$height = 100;
	$fontfile = "Roboto-Regular.ttf";

	$image = imagecreatetruecolor($width, $height);

	$white = imagecolorallocate($image, 194, 236, 255);
	$black = imagecolorallocate($image, 0, 0, 0);

	imagefill($image, 0, 0, $white);
	imagettftext($image, 25, rand(-20,20), $width/4, 60, $black, $fontfile, $text);

	$warped_image = imagecreatetruecolor($width, $height);
	imagefill($warped_image, 0, 0, imagecolorallocate($warped_image, 152, 223, 255));

	for ($x=0; $x < $width; $x++) { 
		# code...
		for ($y=0; $y < $height; $y++) { 
			# code...
			$index = imagecolorat($image, $x, $y);
			$color_comp = imagecolorsforindex($image, $index);

			$color = imagecolorallocate($warped_image, $color_comp['red'], $color_comp['green'], $color_comp['blue']);

			$imageX = $x;
			$imageY = $y + sin($x / 10) * 10;

			imagesetpixel($warped_image, $imageX, $imageY, $color);
		}
	}

	$path = "captcha.jpg";
	imagejpeg($warped_image,$path);
	imagedestroy($warped_image);
	imagedestroy($image);

	return $path;
}
?>