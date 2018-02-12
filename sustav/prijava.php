<?php

require 'db.php';
require 'session.php';



if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['potvrda'])) {
		
		$naziv = $_POST['naziv'];
		$neto_kolicina = $_POST['neto_kolicina'];
		$cijena = $_POST['cijena'];
		$dostupnost = $_POST['dostupnost'];
		$_SESSION['logged_in'] = true;

		

		
			$sql = "INSERT INTO artikal (naziv, neto_kolicina, cijena, dostupnost) "
			. "VALUES ('$naziv','$neto_kolicina','$cijena', '$dostupnost')";
			if ($mysqli->query($sql)){
				header("location: profil.php");
			}
	}	

	}


?>