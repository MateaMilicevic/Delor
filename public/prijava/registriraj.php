<?php

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

?>