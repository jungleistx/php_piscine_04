<?php
	session_start();
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
?>
<html><body>
<form method="GET" action="./index.php">
	Username: <input type="text" required name="login" value="<?php echo ($_SESSION["login"]); ?>" />
	<br />
	Password : <input type="password" required name="passwd" value="<?php echo ($_SESSION["passwd"]); ?>" >
	<input type="submit" name="submit" value="OK">
</form>
</body></html>
