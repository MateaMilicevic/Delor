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
			<ul class="navbar-nav ml-auto">
				<li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php">Moj profil</a></li>
				<li class="nav-item option"><a class="nav-link" href="kosarica.php">Košarica</a></li>
				<li class="nav-item option"><a class="nav-link" href="kupac/skladiste.php">Skladišta</a></li>
				<li class="nav-item option"><a class="nav-link" href="../prijava/odjava.php">Odjava</a></li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
		<div id="ostatak" class="row">
		<div class="row">
				<table class="table">
  					<tbody>
					  <?php while($korisnik = mysqli_fetch_array($result2)):;?>	
					 <tr>
						<form method="post" action="bijelastr.php?action=add&id=<?php echo $korisnik["ime_firme"]?>">
							<td><input type="submit" name="ime_firme" value="<?php echo $korisnik['ime_firme'];?>">
							</td>
						</form>
					</tr>

            
			<?php endwhile;?>			
					  	
				</table>
			
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