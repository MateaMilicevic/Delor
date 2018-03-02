<?php
session_start();
require 'db.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['prijavi'])) {

		$korime = $_POST['korime'];
		$result = $mysqli->query("SELECT * FROM korisnik WHERE korisnicko_ime='$korime'");

		if ($result->num_rows == 0) {
			$_SESSION['message'] = "Korisnik s ovim korisnickim imenom ne postoji.";
			header("location: poruka.php");
		} else {
			$user = $result->fetch_assoc();
			if (password_verify($_POST['lozinka'], $user['lozinka'])) {
				$_SESSION['id_korisnik'] = $user['id_korisnik'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['ime'] = $user['ime'];
				$_SESSION['prezime'] = $user['prezime'];
				$_SESSION['korime'] = $user['korisnicko_ime'];
				$_SESSION['uloga'] = $user['tip'];
				$_SESSION['ime_firme'] = $user['ime_firme'];
				$_SESSION['faks'] = $user['faks'];
				$_SESSION['adresa'] = $user['adresa'];
				$_SESSION['grad'] = $user['grad'];
				$_SESSION['drzava'] = $user['drzava'];
				$_SESSION['postanski_broj'] = $user['postanski_broj'];
				$_SESSION['broj_telefona'] = $user['broj_telefona'];
				$_SESSION['logged_in'] = true;
				header("location: session.php");
			} else {
				$_SESSION['message'] = "Neispravna lozinka.";
				header("location: poruka.php");
			}
		}
	}
}

?>