<?php

    session_start();
    //PHP CAPTCHA image
    //Generated by https://www.html-code-generator.com/php/captcha-image-code-generator


    $width = 130;
    $height = 40;
    $font_size = 20;
    $font = "fonts/Roboto-Regular.ttf";
    $chars_length = 5;

    $captcha_characters = '0123456789';

    $image = imagecreatetruecolor($width, $height);
    $bg_color = imagecolorallocate($image, 178, 2, 24);
    $font_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

    //background vert-line
    $vert_line = round($width/5);
    $color = imagecolorallocate($image, 255, 255, 255);
    for($i=0; $i < $vert_line; $i++) {
        imageline($image, 5*$i, $height, 5*$i, 0, $color);
    }

    $xw = ($width/$chars_length);
    $x = 0;
    $font_gap = $xw/2-$font_size/2;
    $digit = '';
    for($i = 0; $i < $chars_length; $i++) {
        $letter = $captcha_characters[rand(0, strlen($captcha_characters)-1)];
        $digit .= $letter;
        if ($i == 0) {
            $x = 0;
        }else {
            $x = $xw*$i;
        }
        imagettftext($image, $font_size, rand(-20,20), $x+$font_gap, rand(22, $height-5), $font_color, $font, $letter);
    }

    // record token in session variable
    $_SESSION['captcha_token'] = strtolower($digit);

    // display image
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
?>