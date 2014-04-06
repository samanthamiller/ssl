<?php require $GLOBALS['document_root'] . '/view/head.php'; ?>

<?php if(isset($_SESSION['profile_username'])): ?>
<h2>Hello, <?php echo $_SESSION['profile_username'] ?>!</h2>
<?php endif; ?>

<?php if(isset($_SESSION['profile_password'])): ?>
<h2>Password: <?php echo $_SESSION['profile_password'] ?></h2>
<?php endif; ?>

<?php require $GLOBALS['document_root'] . '/view/foot.php'; ?>