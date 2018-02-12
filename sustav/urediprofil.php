<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil1</title>
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="src2/css/urediprofil.css">
</head>
<body>
    <div class="naslov"><h1>Moj profil</h1></div>
	<div class="kontenjer">
         <div class="okvir">
				<form method="post" action="registriraj.php">
                    <input type="text" placeholder="Ime" name="ime" required>  
                    <input type="text" placeholder="Prezime" name="prezime" required><br>
                    <input type="text" placeholder="Korisničko ime" name="korime" required>
					<input type="text" placeholder="Broj telefona" name="telbroj" required>
                    <input type="text" placeholder="E-mail" name="email" required><br>
					<input type="text" placeholder="Ime firme" name="ime_firme" required>
					<input type="text" placeholder="Faks" name="faks" required>
					<input type="text" placeholder="Adresa" name="adresa" required>
					<input type="text" placeholder="Grad" name="grad" required>
					<input type="text" placeholder="Država" name="drzava">
					<input type="text" placeholder="Poštanski broj" name="postanski_broj"><br>
                    <br>
				</form>
			</div>
		</div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>