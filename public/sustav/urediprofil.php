<?php
session_start();
require 'db.php';
$query = "SELECT * FROM korisnik WHERE id_korisnik = '".$_SESSION['id_korisnik']."'";
$result = mysqli_query($mysqli, $query);
$korisnik = mysqli_fetch_array($result);


if(isset($_POST['Izmjenite_profil'])){
	$sql = "UPDATE korisnik SET ime ='".$_POST['ime']."',prezime ='".$_POST['prezime']."',ime_firme ='".$_POST['ime_firme']."',broj_telefona ='".$_POST['telbroj']."',faks ='".$_POST['faks']."',email ='".$_POST['email']."',grad ='".$_POST['grad']."',
	drzava ='".$_POST['drzava']."',grad ='".$_POST['grad']."',postanski_broj ='".$_POST['postanski_broj']."',korisnicko_ime ='".$_POST['korime']."',adresa ='".$_POST['adresa']."' WHERE id_korisnik = '".$_SESSION['id_korisnik']."' ";
	$_SESSION['ime']=$_POST['ime'];
	$_SESSION['prezime']=$_POST['prezime'];
	$_SESSION['korime']=$_POST['korime'];
	$_SESSION['ime_firme']=$_POST['ime_firme'];
	$_SESSION['adresa']=$_POST['adresa'];
	$_SESSION['broje_telefona']=$_POST['broj_telefona'];
	if ($mysqli->query($sql)){
		header("location: moj_profil.php?query='1'");
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
				<p><form method="post" action="urediprofil.php">
                    <b>Ime:</b>     <input type="text" value="<?php echo $korisnik['ime'] ?>" name="ime" required ><br>
                    <b>Prezime:</b> <input type="text" value="<?php echo $korisnik['prezime'] ?>" name="prezime" required><br>
                    <b>Korisnicko ime:</b> <input type="text" value="<?php echo $korisnik['korisnicko_ime'] ?>" name="korime" required><br>
					<b>Broj telefona:</b> <input type="text" value="<?php echo $korisnik['broj_telefona'] ?>" name="telbroj" required><br>
					<b>Faks:</b> <input type="text" value="<?php echo $korisnik['faks'] ?>" name="faks" required><br>
                    <b>Email:</b><input type="text" value="<?php echo $korisnik['email'] ?>" name="email" required><br>
					<b>Ime firme:</b> <input type="text" value="<?php echo $korisnik['ime_firme'] ?>" name="ime_firme" required><br>
					<b>Adresa:</b> <input type="text" value="<?php echo $korisnik['adresa'] ?>" name="adresa" required><br>
					<b>Grad:</b><input type="text" value="<?php echo $korisnik['grad'] ?>" name="grad" required><br>
					<b>Država</b>: <input type="text" value="<?php echo $korisnik['drzava'] ?>" name="drzava"><br>
					<b>Poštanski broj:</b> <input type="text" value="<?php echo $korisnik['postanski_broj'] ?>" name="postanski_broj"><br>

					<input type="submit" value="Izmjenite profil"  name="Izmjenite_profil">
                    <br>
				</form></p>
			</div>
		</div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>