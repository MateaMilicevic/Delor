<?php
session_start();
require 'db.php';

// Select za uzimanje svih podataka iz baze
$query1 = "SELECT * FROM narudzba, detalji_narudzbe, artikal WHERE narudzba.id_narudzbe = detalji_narudzbe.id_narudzbe
			AND detalji_narudzbe.id_artikla = artikal.id_artikla AND narudzba.id_narudzbe= '".$_SESSION["ida"]."'";
$result1 = mysqli_query($mysqli, $query1);
$ida= $_SESSION['ida'];

if(isset($_POST['potvrdjeno'])){
	$_SESSION['datum']=$_POST['datum'];
	$sql = "UPDATE narudzba SET stanje ='potvrdjeno' WHERE id_narudzbe = '$ida' ";
	$mysqli->query($sql);
		if(isset($_POST['datum'])){
			$_SESSION['datum']=$_POST['datum'];
			$datum=$_POST['datum'];
			$sql = "UPDATE narudzba SET datum_dostave ='$datum' WHERE id_narudzbe = '$ida' ";
			if ($mysqli->query($sql)){
				header("location: moj_profil.php?izbor_1='".$_SESSION['zap']."'");
			}
	}
}
if(isset($_POST['odbijeno'])){
	$sql = "UPDATE narudzba SET stanje ='zaprimljeno' WHERE id_narudzbe = '$ida' ";
	if ($mysqli->query($sql)){
		header("location: moj_profil.php?izbor_1='".$_SESSION['zap']."'");
	}
}
?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<script>
		function myFunction() {
   	 		window.print();
		}
	</script>
<style>
@page { size: A4 };	
</style>

</head>
<body>
	<div class="container-fluid">

		<div  style="text-align: center;">
		<br>
				<h2>Popis svih zaprimljenih artikala<h2><br><br>

		</div>
		<div  id="row no-gutters" class="d-flex justify-content-center">
			<div class="col-8" >
				<table class="table" width="100%">
						<tbody>
						<tr>
						<th>Broj narudzbe:</th>
						<td><?php echo$_SESSION['ida'] ;?></td>
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
								<td><?php echo $value["kolicina_artikala"]; ?></td>
								<td><?php echo number_format($value["kolicina_artikala"] * $value["cijena"], 2); ?> KM</td>
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
									<td>

				</table>
				
				<form method="post" action="zaprimljeni.php" class="in" style="padding-right: 100px; margin: auto 0; text-align: center; ">
				Unesite datum za dostavu <input type="text" name="datum" placeholder="00/00/0000" style="width: 20%; border: none; border-bottom: 2px solid #22313f; outline: none; height: 30px;" required><br><br>
		<input type="submit" value="Prihvati narudžbu" name="potvrdjeno" style="width: 300px; margin: auto 0; text-align: center;">
		<input type="submit" value="Odbij narudžbu" name="odbijeno" style="width: 300px; margin: auto 0; text-align: center;" formnovalidate>
		<a href="moj_profil.php?izbor_1=<?$_SESSION['zap']?>" style="padding-left: 50px;">Natrag</a>
		</form>

			</div>

		</div>
		
			
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../../src/js/tether.min.js" type="text/javascript"></script>
		<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../../src/js/index.js" type="text/javascript"></script>
</body>
</html>