<?php
	require 'session.php';

	$korime = $_SESSION['korime'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikacija</title>
</head>
<body>
Dobrodosao <?php echo $korime; ?> prodavac!
<button href="prijava/odjava.php"><a href="prijava/odjava.php">Odjava</a></button>
</body>
</html>