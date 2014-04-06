<?php require $GLOBALS['document_root'] . '/view/head.php'; ?>

<?php if(isset($_SESSION['invalid_captcha']) && $_SESSION['invalid_captcha']): ?>
	<p>Captcha is Invalid</p>
<?php endif; ?>

<?php if(isset($_SESSION['invalid_image']) && $_SESSION['invalid_image']): ?>
	<p>Image is Invalid</p>
<?php endif; ?>

<?php if(isset($_SESSION['invalid_username']) && $_SESSION['invalid_username']): ?>
	<p>Username is Invalid</p>
<?php endif; ?>

<?php if (isset($_SESSION['invalid_password']) && $_SESSION['invalid_password']): ?>
	<p>Password is invalid</p>
<?php endif; ?>	

<form enctype='multipart/form-data' method='POST' action='/action_response'>
	Username: <input type='text' name='username'><br/>
	Password: <input type='password' name='password'><br/>
	Choose an avatar image: <input name='userfile' type='file'><br/>
	<img src='/api_captcha'/><br/>
	<input type='text' name='captcha'><br/>
	<input type='submit' value='Submit'> <br/>
</form>

<?php require $GLOBALS['document_root'] . '/view/foot.php'; ?>
