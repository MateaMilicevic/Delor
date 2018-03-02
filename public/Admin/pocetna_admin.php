<?php

session_start();
require 'db.php';
// php populate html table from mysql database

$query1 = "SELECT * FROM korisnik WHERE tip = 'prodavac' ";


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
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/pocetna2.css">
</head>
<body>
<nav id="myNavbar" class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-center">
	          <li class="nav-item option"><a class="nav-link" href="urediprofil_a.php">Uredi profile</a></li>
	          <li class="nav-item option"><a class="nav-link" href="#contact">Arhiv narudžbi</a></li>
		    </ul>
		  </div>
		</nav>


	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
		<div id="ostatak">
		<div class="row">
	
			<?php while($korisnik = mysqli_fetch_array($result1)):
			
		
		
			?>
		
		
		<form method="post" action="pocetna_admin.php">
				<div class="Leo">
					<div class="btn">
	
					<input type="submit" name="ime_firme" style="color: rgb(207,209,221) ; font-size:60 ;  background-color: transparent;
					border-color: transparent;  cursor: default;" value="<?php echo $korisnik['ime_firme'];?> " >
					<input type="hidden" name="id_korisnika" value=" <?php echo $korisnik['id_korisnik'];?> "  >
				</div>
				</div>
			</form>
					

            
			<?php endwhile;?>			
					  	
				
			
			</div>
        		</div>
               
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../src/js/index.js" type="text/javascript"></script>

</body>
</html>