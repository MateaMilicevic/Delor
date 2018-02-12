<?php
session_id("session1");
session_start();
require 'db.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['reg'])) {
		
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$email = $_POST['email'];
		$korime = $_POST['korime'];
		$lozinka = password_hash($_POST['lozinka'], PASSWORD_BCRYPT);
		$uloga = $_POST['uloga'];
		$telbroj = $_POST['telbroj'];

		$result = $mysqli->query("SELECT * FROM korisnik WHERE korisnicko_ime ='$korime'") or die($mysqli->error());

		if ( $result->num_rows > 0 ) {
			$_SESSION['message'] = 'Korisnik s ovom e-mail adresom već postoji!';
			header("location: poruka.php"); //Dodaj alert $_SESSION['message']
		} else if($_POST['lozinka'] != $_POST['lozinkaa']){
			$_SESSION['message'] = "Lozinke se ne podudaraju!";
			header("location: poruka.php"); //Dodaj alert $_SESSION['message']
		} else {
			$sql = "INSERT INTO korisnik (ime, prezime, email, korisnicko_ime, lozinka, tip, broj_telefona) "
			. "VALUES ('$ime','$prezime','$email', '$korime', '$lozinka', '$uloga', $telbroj)";

			if ($mysqli->query($sql)){
				$_SESSION['message'] = "Uspjesna registracija.";
				header("location: poruka.php"); //Dodaj alert $_SESSION['message']
			} else {
				$_SESSION['message'] = $sql;
				header("location: poruka.php"); //Dodaj alert $_SESSION['message']
			}

		}

	}
}
$_SESSION["korime"] = $korime;
$_SESSION["ime"] = $ime;
$_SESSION["prezime"] = $prezime;
?>

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
				<form method="post" action="registriracija.php">
					<input type="text" placeholder="Ime" name="ime" required>
					<input type="text" placeholder="Prezime" name="prezime" required><br>
					<input type="text" placeholder="E-mail" name="email" required><br>
					<input type="text" placeholder="Korisničko ime" name="korime" required>
					<input type="text" placeholder="Broj telefona" name="telbroj" required>
					<input type="password" placeholder="Lozinka" name="lozinka" required>
					<input type="password" placeholder="Potvrdite lozinku" name="lozinkaa" required>
					<input type="radio" value="kupac" name="uloga">Kupac
					<input type="radio"  value="prodavac" name="uloga">Prodavač <br>
					<input type="checkbox" name="">Jeste li sigurni?<br>
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