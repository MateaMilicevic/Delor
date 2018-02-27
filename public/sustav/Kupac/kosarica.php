<?php
require 'db.php';
session_start();


if (isset($_POST["add"])){
	if (isset($_SESSION["kosarica"])){
		$item_array_id = array_column($_SESSION["kosarica"],"id");
		if (!in_array($_GET["id_artikla"],$item_array_id)){
			$count = count($_SESSION["kosarica"]);
			$item_array = array(
				'id' => $_POST["id"],
				'ime_artikla' => $_POST["ime"],
				'cijena2' => $_POST["cijenaa"],
				'kolicina2' => $_POST["kolicina"],
			);
			$_SESSION["kosarica"][$count] = $item_array;
			echo '<script>window.location="skladiste.php"</script>';
		}else{
			echo '<script>alert("Product is already Added to kosarica")</script>';
			echo '<script>window.location="skladiste.php"</script>';
		}
	}else{
		$item_array = array(
			'id' => $_GET["id"],
			'ime_artikla' => $_POST["ime"],
			'cijena2' => $_POST["cijenaa"],
			'kolicina2' => $_POST["kolicina"],
		);
		$_SESSION["kosarica"][0] = $item_array;
	}
}

if (isset($_GET["action"])){
	if ($_GET["action"] == "delete"){
		foreach ($_SESSION["kosarica"] as $keys => $value){
			if ($value["id"] == $_GET["id"]){
				unset($_SESSION["kosarica"][$keys]);
				echo '<script>alert("Artikal ce biti uklonjen...!")</script>';
				echo '<script>window.location="kosarica.php"</script>';
			}
		}
	}
	if (isset($_GET["action"])){
		if ($_GET["action"] == "deleteall"){
			unset($_SESSION["kosarica"]);
			echo '<script>alert("Svi artikli ce biti uklonjeni...!")</script>';
			echo '<script>window.location="kosarica.php"</script>';
			}
		}
}
date_default_timezone_set("Europe/Zagreb");
$datum= date("d/m/Y");
$vrijeme= date("h:i:sa");
echo $vrijeme;
$_SESSION['vrijeme']=$vrijeme;
$_SESSION['datum']= $datum;
	if(isset($_POST['potvrda'])) {
		$_SESSION['ubaci']= 22;	
				$sql = "INSERT INTO narudzba (ukupna_cijena, ukupna_kolicina, datum_narudzbe,vrijeme, id_kupca, id_prodavaca, stanje) "
				. "VALUES ('".$_SESSION['total']."','".$_SESSION['uk_kol']."','$datum','$vrijeme','".$_SESSION['id_korisnik']."' ,'".$_SESSION['id_prodavac']."', 'zaprimljeno')";
				if ($mysqli->query($sql)){
					if(isset($_SESSION['ubaci'])){
						$query1 = "SELECT *FROM narudzba WHERE ukupna_cijena ='".$_SESSION['total']."' AND id_kupca = '".$_SESSION['id_korisnik']."' AND id_prodavaca = '".$_SESSION['id_prodavac']."' AND datum_narudzbe = '".$_SESSION['datum']."' AND vrijeme = '".$_SESSION['vrijeme']."'";
						$result1 = mysqli_query($mysqli, $query1);
						$user = $result1->fetch_assoc();
						$_SESSION['id_narudzbe']= $user['id_narudzbe'];
						foreach($_SESSION["kosarica"] as $key => $value2){
							$sql2 = "INSERT INTO detalji_narudzbe (id_narudzbe, id_artikla, kolicina_artikala) "
							. "VALUES ('".$_SESSION['id_narudzbe']."','".$value2["id"]."', '".$value2["kolicina2"]."')";
						
						
						if ($mysqli->query($sql2)){
							unset($_SESSION['ubaci']);	
							unset($_SESSION["kosarica"]);
							header("location: skladiste.php");
						}
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
	<title>Kosarica</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/kosarica.css">
</head>
<body>
		<nav id="myNavbar" class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-auto">
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php">Moj profil</a></li>
              <li class="nav-item option"><a class="nav-link" href="kosarica.php">Košarica</a></li>
              <li class="nav-item option"><a class="nav-link" href="skladiste.php">Skladišta</a></li>

	          <li class="nav-item option"><a class="nav-link" href="../../prijava/odjava.php">Odjava</a></li>
             </ul>
		  </div>
		</nav>

	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
      
		<div id="row no-gutters" class="d-flex justify-content-center">
			<div id="kosarica" class="col-8">
                <div class="zaglavlje3">
                    <h1>Košarica</h1>
                
                </div>
            
                    <table class="table">
                       <tbody>
                             <tr>
      						    <th>#</th>
	 						    <th>Naziv</th>
								 <th>Cijena</th>
	  						    <th>Neto količina</th>
								<th>Ukupna cijena </th>
                                <th>Odabir <a href="kosarica.php?action=deleteall&id ?>">Obrisi sve</a></th>
    					    </tr>
							<?php
							if(!empty($_SESSION["kosarica"])){
								$total=	0;
								$uk_kol=0;
								foreach($_SESSION["kosarica"] as $key => $value){
									?>
									<tr>
									
										<td><?php echo $value["id"]; ?></td>
										<td><?php echo $value["ime_artikla"]; ?></td>
										<td><?php echo $value["cijena2"]; ?> KM</td>
										<td><?php echo $value["kolicina2"]; ?></td>
										<td><?php echo number_format($value["kolicina2"] * $value["cijena2"], 2); ?> KM</td>
										<td><a href="kosarica.php?action=delete&id=<?php echo $value["id"]; ?>"><span>Ukloni artikal</span> <a/></td>
									</tr>
									<?php
									(double)$total = $total + ($value["kolicina2"] * $value["cijena2"]);
									(int)$uk_kol += $value["kolicina2"];
								}
									?>
									<tr>
									<th>Ukupno:</th>
									<th><?php echo $uk_kol; ?> kom</th>
									<th><?php echo number_format($total, 2); ?> KM</th>
									<td>
									<form method="post" action="kosarica.php">
									<input type="submit" value="Potvrdi" name="potvrda">
									
									</form>
									</td>
									</tr>
									<?php
									$_SESSION['total']=$total;
									$_SESSION['uk_kol']=$uk_kol;
								}
								?>
							
                       </tbody> 
                    </table>
            </div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../../src/js/index.js" type="text/javascript"></script>

</body>
</html>