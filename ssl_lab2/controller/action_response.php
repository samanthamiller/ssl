<?php

	$valid = true;

	if(
		isset($_POST['captcha']) && 
		isset($_SESSION['captcha']) && 
		$_POST['captcha'] != '' && 
		$_SESSION['captcha'] != '' && 
		$_POST['captcha'] == $_SESSION['captcha']
	){
		$_SESSION['invalid_captcha'] = false;
	}else{
		$_SESSION['invalid_captcha'] = true;
		$valid = false;
	}

	$user = $_POST['username'];
	$_SESSION['profile_username'] = $user;
	if(isset($user) && $user != ''){
		$_SESSION['invalid_username'] = false;
	}else{
		$_SESSION['invalid_username'] = true;
		$valid = false;
	}


	if(isset($_POST['password']) && $_POST['password'] != ''){
		
		$_SESSION['invalid_password'] = false;

		$password = $_POST['password'];
		$password_salt = uniqid();
		$password_hash = md5($password . $password_salt);
		$_SESSION['profile_password'] = $password_hash;

	}else{
		$_SESSION['invalid_password'] = true;
		$valid = false;
	}

	if(
		is_uploaded_file($_FILES['userfile']['tmp_name']) &&
		$_FILES['userfile']['type'] == 'image/jpeg'
	){
		$_SESSION['invalid_image'] = false;

		$image_id = uniqid();

		move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/'.$image_id.'.jpg');

		// process the image

		$_SESSION['image_id'] = $image_id;

	}else{
		$_SESSION['invalid_image'] = true;
		$valid = false;
	}


	if(!$valid){
		header('Location: /form');
		exit;
	}

		//header('Location: /image');

	header('Location: /userProfile');

	// everything worked fine



	