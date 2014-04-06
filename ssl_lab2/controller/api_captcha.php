<?php

	$file = file('./dictionary.txt');
	$captchaText = trim($file[array_rand($file)]);
	msg($captchaText);
	$_SESSION['captcha'] = $captchaText;

	function msg($msg){
		$container = imagecreate(300, 200);
		$black = imagecolorallocate($container, 0, 0, 0);
		$white = imagecolorallocate($container, 255, 255, 255);
		$font = 'Arial.ttf';
		imagefilledrectangle($container, 0, 0, 250, 150, $black);
		imagefttext($container, 50, 0, 0, 125, $white, $font, $msg);
		header('Content-Type: image/png');
		imagepng($container, null);
		imagedestroy($container);
	}
