<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil1</title>
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="src2/css/moranje.css">
</head>
<body>
    <div class="naslov"><h1>Moj profil</h1></div>
	<div class="kontenjer">
         <div class="okvir">
				<form method="post" action="registriraj.php">
					<input type="text" placeholder="Ime firme" name="ime_firme" required>
					<input type="text" placeholder="Faks" name="faks" required>
					<input type="text" placeholder="Adresa" name="adresa" required>
					<input type="text" placeholder="Grad" name="grad" required>
					<input type="text" placeholder="Država" name="drzava">
					<input type="text" placeholder="Poštanski broj" name="postanski_broj"><br>
					<br>
					<input type="submit" value="Potvrda" name="potvrda">
				</form>
			</div>
		</div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>