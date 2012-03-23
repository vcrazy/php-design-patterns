<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PHP Homework 2</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<?php

		include('functions2.php');

		$functions = new Functions2();
		echo '3rd prime number is: ' . $functions->find_3_prime() . '<hr />';

		foreach($functions->check_exists() as $message)
		{
			echo $message . '<br />';
		}

	?>
</body>
</html>