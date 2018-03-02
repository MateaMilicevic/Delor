<?php

session_start();
require 'db.php';
// php populate html table from mysql database
if (isset($_POST["drop"])){
	$_SESSION['id']= $_POST['id_narudzbe'];
	$id= $_SESSION['id'];
	$sql="DELETE  FROM `arhiv` WHERE `id_narudzbe`='$id'";
	if ($mysqli->query($sql)){
	header("location: arhiv.php");
	}
}
$query1 = "SELECT * FROM arhiv ORDER BY id_narudzbe ";
$result1 = mysqli_query($mysqli, $query1);
$_SESSION['idnarudzbe']= 1;

if (isset($_POST["drop"])){
	$_SESSION['id']= $_POST['id_korisnika'];
	$id= $_SESSION['id'];
	$sql="DELETE  FROM `arhiv` WHERE `id_korisnik`='$id'";
	if ($mysqli->query($sql)){
	header("location: urediprofil_a.php");
	}
}
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

            <h2 style="width: 100%; margin: auto 0; text-align: center;">Arhiv svih narudzbi</h2><br>
            <table class="table" width="100%">
						<tbody>
                        
						
					
							<tr>
                            <th>Broj narudzbe:</th>
								<th>Ime prodavaca</th>
								<th>Ime kupca</th>
								<th>Datum narudzbe</th>
								<th>Datum dostave</th>
								<th>Ukupna cijena </th>
                                <th>Ukupna kolicina</th>
							</tr>
                            <?php while($value = mysqli_fetch_array($result1)):;?>
							<tr>
                               <?php if($_SESSION['idnarudzbe']!=$value["id_narudzbe"]){ ?>
                                <form method="post" action="arhiv.php">
								<td><input type="hidden" name="id_narudzbe" value=" <?php echo $value["id_narudzbe"];?> "><?php echo $value["id_narudzbe"];  $_SESSION['idnarudzbe']= $value["id_narudzbe"];?></td>
								<td><?php echo $value["ime_firme_prodavaca"]; ?></td>
								<td><?php echo $value["ime_firme_kupca"]; ?></td>
								<td><?php echo $value["datum_narudzbe"]; ?></td>
                                <td><?php echo $value["datum_dostave"]; ?></td>
                                <td><?php echo $value["ukupna_cijena"]; ?> KM</td>
                                <td><?php echo $value["ukupna_kolicina"]; ?></td>
                                <td><input type="submit"  value="Brisanje korisnika" name="drop"></td>
                                </form>
                               <?php } ?>
							</tr>
                            
						
						<?php endwhile;?>
								
							
							
				</table>
			</div>
			</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../src/js/index.js" type="text/javascript"></script>

</body>
</html>