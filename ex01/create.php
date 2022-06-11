<?php
$login = $_POST['login'];
$passwd = $_POST['passwd'];
$submit = $_POST['submit'];

if ($login && $passwd && $submit === "OK")
{
	if (!(file_exists("../private")))
		mkdir("../private");
	if (!(file_exists("../private/passwd")))
		file_put_contents("../private/passwd", NULL);

	$usr_exists = 0;
	$user_list = unserialize(file_get_contents("../private/passwd"));
	if ($user_list)
	{
		foreach($user_list as $key => $value)
		{
			if ($value['login'] === $login)
				$usr_exists = 1;
		}
	}
	if ($usr_exists == 0)
	{
		$new_user['login'] = $login;
		$new_user['passwd'] = hash('whirlpool', $passwd);
		$user_list[] = $new_user;
		file_put_contents("../private/passwd", serialize($user_list));
		echo "OK\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>