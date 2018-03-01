<?php
session_start();
require 'db.php';


// Select za upis podataka u bazu za Arhiv
$query1 = "SELECT * FROM narudzba, detalji_narudzbe, artikal WHERE narudzba.id_narudzbe = detalji_narudzbe.id_narudzbe
AND detalji_narudzbe.id_artikla = artikal.id_artikla  AND narudzba.id_narudzbe= '".$_SESSION["ida"]."'";
$result1 = mysqli_query($mysqli, $query1);
$result1_1 = mysqli_query($mysqli, $query1);
$value = mysqli_fetch_array($result1_1);

$query2 = "SELECT * FROM korisnik WHERE id_korisnik= '".$value['id_prodavaca']."'";
$query3 = "SELECT * FROM korisnik WHERE id_korisnik= '".$value['id_kupca']."'";
$query4 = "SELECT * FROM detalji_narudzbe WHERE id_narudzbe= '".$_SESSION['ida']."'";
$result2 = mysqli_query($mysqli, $query2);
$value2 = mysqli_fetch_array($result2);
$result3 = mysqli_query($mysqli, $query3);
$value3 = mysqli_fetch_array($result3);
$result4 = mysqli_query($mysqli, $query4);
$value4 = mysqli_fetch_array($result4);




$ida= $_SESSION['ida'];

if(isset($_POST['potvrdjeno'])){
	foreach($_SESSION["artiklic"] as $key => $value5){
		
		$sql = "INSERT INTO arhiv (ime_firme_kupca, ime_firme_prodavaca, id_kupca, id_prodavaca, id_artikla, naziv, 
		cijena, kolicina_artikla, ukupna_cijena, ukupna_kolicina, datum_narudzbe, datum_dostave, vrijeme, id_narudzbe) "
		. "VALUES ('".$value5["ime_firme_kupca"]."','".$value5["ime_firme_prodavaca"]."',
		 '".$value5["id_kupca"]."','".$value5["id_prodavaca"]."','".$value5["id"]."',
		'".$value5["naziv"]."','".$value5["cijena"]."', '".$value5["kolicina_artikla"]."', '".$value5["ukupna_cijena"]."',
		'".$value5["ukupna_kolicina"]."','".$value5["datum_narudzbe"]."', '".$value5["datum_dostave"]."','".$value5["vrijeme"]."', '".$value5["id_narudzbe"]."')";
		if($mysqli->query($sql)){
				
			$sql = "UPDATE narudzba SET stanje ='prodano' WHERE id_narudzbe = '$ida' ";
			if ($mysqli->query($sql)){
				header("location: moj_profil.php?izbor_2='".$_SESSION['zap']."'");
			}
			}
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
		@page { size: A4 }

		
	</style>

</head>
<body>
	<div class="container-fluid">

		<div  style="text-align: center;">
		<br>
				<h2>Popis svih potvrdjenih artikala<h2><br><br>

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
						<?php while($value1 = mysqli_fetch_array($result1)):
							
							if(isset($_SESSION["artiklic"])){
								$item_array_id = array_column($_SESSION["artiklic"],"id");
								if (!in_array($value1['id_artikla'],$item_array_id)){
									$count = count($_SESSION["artiklic"]);
									$item_array = array(
										'id' => $value1['id_artikla'],
										'ime_firme_kupca' => $value3["ime_firme"],
										'ime_firme_prodavaca' => $value2["ime_firme"],
										'id_kupca' => $value["id_kupca"],
										'id_prodavaca' => $value["id_prodavaca"],
										'id_narudzbe' => $value['id_narudzbe'],
										'naziv' => $value1["naziv"],
										'cijena' => $value1["cijena"],
										'kolicina_artikla' => $value1["kolicina_artikala"],
										'ukupna_cijena' => $value["ukupna_cijena"],
										'ukupna_kolicina' => $value["ukupna_kolicina"],
										'datum_narudzbe' => $value["datum_narudzbe"],
										'datum_dostave' => $value["datum_dostave"],
										'vrijeme' => $value["vrijeme"],
										
									);
									$_SESSION["artiklic"][$count] = $item_array;
								}
							}else{
									$item_array = array(
										'id' => $value1['id_artikla'],
										'ime_firme_kupca' => $value3["ime_firme"],
										'ime_firme_prodavaca' => $value2["ime_firme"],
										'id_kupca' => $value["id_kupca"],
										'id_prodavaca' => $value["id_prodavaca"],
										'id_narudzbe' => $value['id_narudzbe'],
										'naziv' => $value1["naziv"],
										'cijena' => $value1["cijena"],
										'kolicina_artikla' => $value1["kolicina_artikala"],
										'ukupna_cijena' => $value["ukupna_cijena"],
										'ukupna_kolicina' => $value["ukupna_kolicina"],
										'datum_narudzbe' => $value["datum_narudzbe"],
										'datum_dostave' => $value["datum_dostave"],
										'vrijeme' => $value["vrijeme"],
										
									);
									$_SESSION["artiklic"][0] = $item_array;
								}
							
							;?>	
						<tr>
							<form method="post" action="bijelastr.1.php?action=add&id=<?php echo $value1["id_artikla"]?>" style="padding-right: 100px; margin: auto 0; text-align: center;" >
							<input type="hidden" name="id" value="<?php echo $value1["id_artikla"];?>">
								<td><input type="hidden" name="idar" value="<?php echo $value1["id_artikla"];?>"><?php echo $value1["id_artikla"]; ?></td>
								<td><input type="hidden" name="naziv" value="<?php echo $value1["naziv"];?>"><?php echo $value1["naziv"]; ?></td>
								<td><input type="hidden" name="cijena" value="<?php echo $value1["cijena"];?>"><?php echo $value1["cijena"]; ?> KM</td>
								<td><input type="hidden" name="kolicina_artikla" value="<?php echo $value1["kolicina_artikala"];?>"><?php echo $value1["kolicina_artikala"]; ?></td>
								<td><?php echo number_format($value1["kolicina_artikala"] * $value1["cijena"], 2); ?> KM</td>
						</tr>
							<?php $_SESSION['cijena']=$value1["ukupna_cijena"];
								  $_SESSION['kolicina']=$value1["ukupna_kolicina"]; ?>
						
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
							<td><?php echo $value['datum_narudzbe'] ;?></td>
							<th>Datum dostave:</th>
							<td><?php echo $value['datum_dostave'] ;?></td>
								
						</tr>

						<tr>
							<td><input type="submit" value="Zaključi narudžbu" name="potvrdjeno" style="width: 300px; margin: auto 0; text-align: center;"></td>
							<td><a href="moj_profil.php?izbor_2=<?$_SESSION['pot']?>" style="padding-left: 50px;">Natrag</a></td>
						</tr>
							
							</form>
							
					</tbody>
				</table>
			</div>

		</div>
		
		
		
			
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../../src/js/tether.min.js" type="text/javascript"></script>
		<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../../src/js/index.js" type="text/javascript"></script>
</body>
</html>