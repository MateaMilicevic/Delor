<?php
session_start();
require 'db.php';
$query = "SELECT * FROM korisnik WHERE id_korisnik = '".$_SESSION['id_korisnik']."'";
$result = mysqli_query($mysqli, $query);
$korisnik = mysqli_fetch_array($result);
echo $_SESSION['id_korisnik'];

if(isset($_POST['Izmjenite_profil'])){
	$sql = "UPDATE korisnik SET ime ='".$_POST['ime']."' WHERE id_korisnik = '".$_SESSION['id_korisnik']."' ";
	if ($mysqli->query($sql)){
		header("location: moj_profil.php");
	}
}
?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil1</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/urediprofil.css">
</head>
<body>
    <div class="naslov"><h1>Moj profil</h1></div>
	<div class="kontenjer">
         <div class="okvir">
				<form method="post" action="urediprofil.php">
                    <span>Ime: </span><input type="text" value="<?php echo $korisnik['ime'] ?>" name="ime" required ><br>
                    <span>Prezime: </span><input type="text" value="<?php echo $korisnik['prezime'] ?>" name="prezime" required><br>
                    <span>Korisnicko ime: </span><input type="text" value="<?php echo $korisnik['korisnicko_ime'] ?>" name="korime" required><br>
					<span>Broj telefona: </span><input type="text" value="<?php echo $korisnik['broj_telefona'] ?>" name="telbroj" required><br>
                    <span>Email: </span><input type="text" value="<?php echo $korisnik['email'] ?>" name="email" required><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['ime_firme'] ?>" name="ime_firme" required><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['faks'] ?>" name="faks" required><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['adresa'] ?>" name="adresa" required><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['grad'] ?>" name="grad" required><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['drzava'] ?>" name="drzava"><br>
					<span>Ime: </span><input type="text" value="<?php echo $korisnik['postanski_broj'] ?>" name="postanski_broj"><br>

					<input type="submit" value="Izmjenite profil"  name="Izmjenite_profil">
                    <br>
				</form>
			</div>
		</div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>