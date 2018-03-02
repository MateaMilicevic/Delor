<?php

session_start();
require 'db.php';
// php populate html table from mysql database
if (isset($_POST["drop"])){
	$_SESSION['id']= $_POST['id_korisnika'];
	$id= $_SESSION['id'];
	$sql="DELETE  FROM `korisnik` WHERE `id_korisnik`='$id'";
	if ($mysqli->query($sql)){
	header("location: urediprofil_a.php");
	}
}
$query1 = "SELECT * FROM korisnik ";


$result1 = mysqli_query($mysqli, $query1);

?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DelOr</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/urediprofil_a.css">
</head>
<body>
<nav id="myNavbar" class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-center">
	          <li class="nav-item option"><a class="nav-link" href="pocetna_admin.php">Natrag</a></li>
		    </ul>
		  </div>
		</nav>


	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
		<div id="ostatak">
			<div class="row boja">
				<table class="table">
					<thead class="thead-inverse">
						<tr>	
							<th>ID korisnika</th>
							<th>Ime korisnika</th>
							<th>Ime firme</th>
							<th> Odabir</th>
						</tr>
					</thead>
					<tbody>	
					
						<?php while($korisnik = mysqli_fetch_array($result1)):?>
						<tr>
							<form method="post" action="urediprofil_a.php">
								<td><input type="hidden" name="id_korisnika" value=" <?php echo $korisnik['id_korisnik'];?> ">  <?php echo $korisnik['id_korisnik'];?></td>
								<td><input type="hidden" name="korisnicko_ime" value=" <?php echo $korisnik['id_korisnik'];?> ">  <?php echo $korisnik['korisnicko_ime'];?></td>
								<td><input type="hidden" name="ime_firme" value=" <?php echo $korisnik['id_korisnik'];?> ">  <?php echo $korisnik['ime_firme'];?></td>
								<td><div class="btn">
									 <input type="submit"  value="Brisanje korisnika" name="drop">
				   				</div></td>
							</form>
						</tr>
						<?php endwhile;?>
					</tbody>
				</table>
			</div>
			</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../src/js/index.js" type="text/javascript"></script>

</body>
</html>