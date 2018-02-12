<?php

// php populate html table from mysql database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "db_delor";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query

$query1 = "SELECT * FROM artikal";
$query2 = "SELECT * FROM artikal WHERE naziv='coca'";

// result for method one
$result1 = mysqli_query($connect, $query1);

// result for method two 
$result2 = mysqli_query($connect, $query2);

?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DelOr</title>
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/profil.css">
</head>
<body>
		<nav id="myNavbar" class="navbar navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-auto">
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="profil.php">Moj profil</a></li>
              <li class="nav-item option"><a class="nav-link" href="dodavanje.php">Novi artikal</a></li>
              <li class="nav-item option"><a class="nav-link" href="">Skladišta</a></li>

	          <li class="nav-item option"><a class="nav-link" href="../public/prijava/odjava.php">Odjava</a></li>
             </ul>
		  </div>
		</nav>

	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
      
		<div class="row no-gutters">
			
			<div id="fix" class="col-sm-5 vavbar-fixed-left">
				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2>TOPLI NAPITCI</h2>
      					</div>
				</div>
				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2>GAZIRANA PIĆA</h2>
      					</div>
				</div>

				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2>ALKOHOLNA PIĆA</h2>
      					</div>
				</div>

				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2>SOKOVI</h2>
      					</div>
				</div>
			</div>

			<div class="col-sm-7">
				<div class="row">
				<table class="table">
  					<thead class="thead-inverse">
   						 <tr>
      						<th>#</th>
	 						 <th>Naziv</th>
	  						<th>Cijena</th>
      						<th>Neto kolicina</th>
      						<th>Dostupnost</th>
    					</tr>
  					</thead>
  					<tbody>
						
					  <?php while($artikal = mysqli_fetch_array($result1)):;?>
            <tr>
                <td><?php echo $artikal['id_artikla'];?></td>
                <td><?php echo $artikal['naziv'];?></td>
                <td><?php echo $artikal['cijena'];?></td>
				<td><?php echo $artikal['neto_kolicina'];?></td>
				<td><?php echo $artikal['dostupnost'];?></td>
            </tr>
            <?php endwhile;?>
							
					  	
				</table>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../src/js/index.js" type="text/javascript"></script>

</body>
</html>