<?php
session_start();
require 'db.php';
unset($_SESSION['prod']);

$ida= $_SESSION['ida'];
$query1 = "SELECT * FROM arhiv WHERE id_narudzbe = '$ida'";
$result1 = mysqli_query($mysqli, $query1);
$result2 = mysqli_query($mysqli, $query1);


?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/bootstrap.min.css">
	<script>
		function myFunction() {
   	 		window.print();
		}
	</script>
	<style>
		@page { size: A4 }

		
	</style>

</head>
<body>
	<div class="container-fluid">

		<div  style="text-align: center;">
		<br>
				<h2>Popis svih kupljenih artikala<h2><br><br>

		</div>
		<div  id="row no-gutters" class="d-flex justify-content-center">
			<div class="col-8" >
				<table class="table" width="100%">
						<tbody>
							<?php $value2 = mysqli_fetch_array($result2) ?>
						<tr>
						<th>Broj narudzbe:</th>
						<td><?php echo$_SESSION['ida'] ;?></td>
						
						</tr>
						<tr>
							<th>Prodavac:</th>
								<td><?php echo $value2['ime_firme_prodavaca'] ;?></td>
								<th>Kupac:</th>
								<td><?php echo $value2['ime_firme_kupca'] ;?></td>
							
							</tr>

							<tr>
								<th>#</th>
								<th>Naziv</th>
								<th>Cijena</th>
								<th>Kolicina</th>
								<th>Ukupna cijena </th>
							</tr>
							<?php while($value = mysqli_fetch_array($result1)):;?>
							<tr>
								<td><?php echo $value["id_artikla"]; ?></td>
								<td><?php echo $value["naziv"]; ?></td>
								<td><?php echo $value["cijena"]; ?> KM</td>
								<td><?php echo $value["kolicina_artikla"]; ?></td>
								<td><?php echo number_format($value["kolicina_artikla"] * $value["cijena"], 2); ?> KM</td>
							</tr>
							<?php $_SESSION['cijena']=$value["ukupna_cijena"];
								  $_SESSION['kolicina']=$value["ukupna_kolicina"]; ?>
						
						<?php endwhile;?>
								<tr>
									<th>Ukupno:</th>
									<th></th>
									<th></th>
									
									<th><?php echo   $_SESSION['kolicina']; ?> kom</th>
									<th><?php echo $_SESSION['cijena']; ?> KM</th>
								</tr>
								<tr>
								<th>Datum narudzbe:</th>
								<td><?php echo $value2['datum_narudzbe'] ;?></td>
								<th>Datum dostave:</th>
								<td><?php echo $value2['datum_dostave'] ;?></td>
							</tr>
							
							
				</table>
			</div>

		</div>
		<div>
		</div>
		<div style="margin: auto 0; text-align: center;">			
		<br>
		<br>
		<br>
		<br>
			<button onclick="myFunction()" style="width: 300px; margin: auto 0; text-align: center;">Print this page</button>
			<a href="moj_profil.php?izbor_3=<?$_SESSION['prod']?>" style="padding-left: 50px;">Natrag</a>
	</div>
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../../src/js/tether.min.js" type="text/javascript"></script>
		<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../../src/js/index.js" type="text/javascript"></script>
</body>
</html>