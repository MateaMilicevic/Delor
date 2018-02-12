<?php
session_start();

if($_SESSION['logged_in'] == 'true') {
	if($_SESSION['uloga'] == 'kupac'){ // kupac ili broj
		header('location: ../../sustav/pocetna2.php'); // stranica za kupca
	} else {
		header('location: ../../sustav/profil.php'); // stranica za prodavaca
	}
}else{
	header('location: ../session.php');

}

?>
