<?php
session_start();
$korime = $_SESSION['korime'];

if($_SESSION['logged_in'] != 'true') {
	header('location: prijava/prijava.php');
}

?>
