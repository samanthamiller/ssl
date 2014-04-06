<?php require $GLOBALS['document_root'] . '/view/head.php'; ?>
	<?php 
		$img = $_SESSION['image_id'];
		$dir = '/images';
		
		function img($image, $filepath){
			$filename = $image;
			$width = 100;
			$height = 100;
			header('Content-Type: image/jpeg');
			list($width_orig, $height_orig) = getimagesize($filename);

			$ratio_orig = $width_orig/$height_orig;

			if ($width/$height > $ratio_orig) {
			   $width = $height*$ratio_orig;
			}else {
			   $height = $width/$ratio_orig;
			}

			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagejpeg($image_p, $filepath.'userThumb.jpg');

		}

		img($img,$dir);

	?>
<?php require $GLOBALS['document_root'] . '/view/foot.php'; ?>


