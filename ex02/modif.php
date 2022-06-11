<?php
$login = $_POST['login'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
$submit = $_POST['submit'];

if ($login && $oldpw && $newpw && $submit === "OK")
{
	$user_list = unserialize(file_get_contents("../private/passwd"));
	$usr_updated = 0;
	if ($user_list)
	{
		foreach($user_list as $key => $value)
		{
			if ($login === $value['login'])
			{
				if ($value['passwd'] === hash('whirlpool', $oldpw))
				{
					$user_list[$key]['passwd'] = hash('whirlpool', $newpw);
					$usr_updated = 1;
				}
			}
		}
		if ($usr_updated == 1)
		{
			file_put_contents("../private/passwd", serialize($user_list));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";