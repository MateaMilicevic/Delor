<?php
session_start();

if($_SESSION['logged_in'] == 'true') {
	if($_SESSION['uloga'] == 'kupac'){ // kupac ili broj
		header('location: ../../sustav/moranje.php'); // stranica za kupca
	} else {
		header('location: ../../sustav/moranje.php'); // stranica za prodavaca
	}
}else{
	header('location: ../session.php');

}

?>
