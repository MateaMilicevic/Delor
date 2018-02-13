<?php

session_start();

?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil1</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/moranje.css">
</head>
<body>
    <div class="naslov"><h1>Moj profil</h1></div>
	<div class="kontenjer">
         <div class="okvir">
				<form method="post" action="moranje.php">
					
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
    <script src="../../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>

<?php

require 'db.php';




if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['potvrda'])) {
		$ime_firme = $_POST['ime_firme'];
		$faks = $_POST['faks'];
		$adresa = $_POST['adresa'];
		$grad = $_POST['grad'];
		$drzava = $_POST['drzava'];
		$postanski_broj = $_POST['postanski_broj'];

		$result = $mysqli->query("SELECT * FROM korisnik "  ) or die($mysqli->error());

			$sql = " UPDATE korisnik SET ime_firme='$ime_firme' , faks= '$faks', adresa='$adresa', grad= '$grad', drzava= '$drzava', postanski_broj= '$postanski_broj' WHERE korisnicko_ime ='".$_SESSION['korime']."'";
			if ($mysqli->query($sql)){
				header("location: session.php");
			}
	}
}
?>