<?php
session_start();
require 'db.php';

	$result = $mysqli->query("SELECT * FROM korisnik WHERE korisnicko_ime='".$_SESSION['korime']."'");
	
				$user = $result->fetch_assoc();
					$_SESSION['id'] = $user['id_kupca'];
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
				
		if (isset($_SESSION['ime_firme'])&&isset($_SESSION['faks'])&&isset($_SESSION['adresa'])&&isset($_SESSION['grad'])&&isset($_SESSION['drzava'])&&isset($_SESSION['postanski_broj']))
		{header('location: ../prijava/prijava.php'); // stranica za prodavaca
	
		}
		else
		header('location: moranje.php');
	

?>
