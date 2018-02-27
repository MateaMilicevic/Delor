
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registracija</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/registracijac.css">
</head>
 
<body>
	<div class="naslov"><h1>Registracija</h1></div>
	<div class="kontenjer">
		<div class="left"></div>
		<div class="right">
			<div class="okvir">
				<form method="post" action="registriraj.php">
					<input type="text" placeholder="Ime" name="ime" required>
					<input type="text" placeholder="Prezime" name="prezime" required><br>
					<input type="text" pattern="[^ @]*@[^ @]*" placeholder="E-mail" name="email" required><br>
					<input type="text" placeholder="Korisničko ime" name="korime" required>
					<input type="text" placeholder="Broj telefona" name="telbroj" required>
					<input type="password" placeholder="Lozinka" name="lozinka" required>
					<input type="password" placeholder="Potvrdite lozinku" name="lozinkaa" required>
					<input type="radio" value="kupac" name="uloga">Kupac
					<input type="radio"  value="prodavac" name="uloga">Prodavač <br>
					<br>
					<input type="submit" value="Registracija" name="reg">
				</form>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>