<?php
session_start();

if($_SESSION['logged_in'] == 'true') {
	if($_SESSION['uloga'] == 'kupac'){
		if(isset($_SESSION['ime_firme'])&&isset($_SESSION['faks'])&&isset($_SESSION['adresa'])&&isset($_SESSION['grad'])&&isset($_SESSION['drzava'])&&isset($_SESSION['postanski_broj']))
		{// kupac ili broj
		header('location: ../sustav/Kupac/pocetna2.php'); 
	}
	else
	header('location: ../sustav/moranje.php');// stranica za kupca
	}elseif($_SESSION['uloga'] == 'admin'){
		header('location: ../Admin/pocetna_admin.php');
	}else {
		if (isset($_SESSION['ime_firme'])&&isset($_SESSION['faks'])&&isset($_SESSION['adresa'])&&isset($_SESSION['grad'])&&isset($_SESSION['drzava'])&&isset($_SESSION['postanski_broj']))
		{header('location: ../sustav/profil.php'); // stranica za prodavaca
	
		}
		else
		header('location: ../sustav/moranje.php');

	}
}else{
	header('location: ../session.php');

}

?>
