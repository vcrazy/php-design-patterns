<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PHP Homework 1</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<?php

		include('functions.php');

		$number = isset($_GET['number']) ? $_GET['number'] : NULL;

		$functions = new Functions($number);
		echo $functions->process_number();

	?>

	<form action="" method="get">
		Number: <input type="text" name="number" value="<?php echo $number; ?>" autofocus /><br />
		<input type="submit" />
	</form>
</body>
</html>