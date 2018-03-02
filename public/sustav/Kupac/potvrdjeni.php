<?php
session_start();
require 'db.php';


// Select za upis podataka u bazu za Arhiv
$query1 = "SELECT * FROM narudzba, detalji_narudzbe, artikal WHERE narudzba.id_narudzbe = detalji_narudzbe.id_narudzbe
AND detalji_narudzbe.id_artikla = artikal.id_artikla  AND narudzba.id_narudzbe= '".$_SESSION["ida"]."'";
$result1 = mysqli_query($mysqli, $query1);

// $_SESSION['id']=$_POST['id_korisnika'];
// $id=$_SESSION['id'];

$ida= $_SESSION['ida'];
if(isset($_POST['potvrdjeno'])){
	$_SESSION['datum']=$_POST['datum'];
	$sql = "UPDATE narudzba SET stanje ='potvrdjeno2' WHERE id_narudzbe = '$ida' ";
	if($mysqli->query($sql)){
				header("location: moj_profil.php?izbor_2='".$_SESSION['pot']."'");
			
	}
}
if(isset($_POST['odbijeno'])){
	$sql = "UPDATE narudzba SET stanje ='odbijeno' WHERE id_narudzbe = '$ida' ";
	if ($mysqli->query($sql)){
		header("location: moj_profil.php?izbor_1='".$_SESSION['pos']."'");
	}
}
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
						<?php while($value1 = mysqli_fetch_array($result1)):;?>	
						<tr>
							<form method="post" action="potvrdjeni.php?action=add&id=<?php echo $value1["id_artikla"]?>" style="padding-right: 100px; margin: auto 0; text-align: center;" >
							<input type="hidden" name="id" value="<?php echo $value1["id_artikla"];?>">
								<td><input type="hidden" name="idar" value="<?php echo $value1["id_artikla"];?>"><?php echo $value1["id_artikla"]; ?></td>
								<td><input type="hidden" name="naziv" value="<?php echo $value1["naziv"];?>"><?php echo $value1["naziv"]; ?></td>
								<td><input type="hidden" name="cijena" value="<?php echo $value1["cijena"];?>"><?php echo $value1["cijena"]; ?> KM</td>
								<td><input type="hidden" name="kolicina_artikla" value="<?php echo $value1["kolicina_artikala"];?>"><?php echo $value1["kolicina_artikala"]; ?></td>
								<td><?php echo number_format($value1["kolicina_artikala"] * $value1["cijena"], 2); ?> KM</td>
						</tr>
							<?php $_SESSION['cijena']=$value1["ukupna_cijena"];
								  $_SESSION['kolicina']=$value1["ukupna_kolicina"];
								  $_SESSION['datum_dostave']=$value1["datum_dostave"]; 
								  $_SESSION['datum_narudzbe']=$value1["datum_narudzbe"];?>
						
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
							<td><?php echo $_SESSION['datum_narudzbe'] ;?></td>
							<th>Datum dostave:</th>
							<td><?php echo  $_SESSION['datum_dostave'] ;?></td>
								
						</tr>	
					</tbody>
				</table>
				
				<form method="post" action="potvrdjeni.php"  style=" margin: auto 0; text-align: center; ">
						<br><br>
			   <input type="submit" value="Prihvati narudžbu" name="potvrdjeno" style="width: 300px; margin: auto 0; text-align: center;">
			   <input type="submit" value="Odbij narudžbu" name="odbijeno" style="width: 300px; margin: auto 0; text-align: center;" >
			   <a href="moj_profil.php?izbor_2=<?$_SESSION['pot']?>" style="padding-left: 50px;">Natrag</a>
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