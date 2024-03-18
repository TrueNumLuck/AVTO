<?php
		$login = $_POST['Login'];
		$password = $_POST['Password'];
		if ($login != "" and $password != "")
		{
			$connection = mysqli_connect('localhost','root','','avto');
			$Q = mysqli_query($connection,"SELECT COUNT(LOGIN) FROM USER WHERE LOGIN = '$login' and PASSWORD = '$password';");
			$skoka = mysqli_fetch_assoc($Q);
			$skoka = $skoka["COUNT(LOGIN)"];
			if (isset($Q))
			{
				if ($skoka == 0)
				{
					print("<script type='text/javascript'>");
					print("alert('Такого пользователя не существует');");
					print("location.replace('../authorization.html');");
					print("</script>");
				}
				else
				{
					session_start();
					//echo("Есть такой пользователь!");
					$_SESSION['login'] = $login;
					print("<script type='text/javascript'>");
					print("location.replace('../main.php');");
					print("</script>");
					//echo(session_id());
				}
			}
			mysqli_close($connection);
		}
		else
		{
			print("<script type='text/javascript'>");
			print("alert('Такого пользователя не существует');");
			print("location.replace('../authorization.html');");
			print("</script>");
		}
?>