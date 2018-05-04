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

		
		
	
			$sql = "INSERT INTO korisnik (ime, prezime, email, korisnicko_ime, lozinka, tip, broj_telefona) "
			. "VALUES ('$ime','$prezime','$email', '$korime', '$lozinka', '$uloga', $telbroj)";

			if ($mysqli->query($sql)){
				$_SESSION['message'] = "Uspjesna registracija.";
				header("location: ../sustav/moranje.php");
			} else {
				$_SESSION['message'] = $sql;
				header("location: registracija.php");
			}

		

	}

}
$_SESSION['korime'] = $korime;
$_SESSION['uloga'] = $_POST['uloga'];
?>