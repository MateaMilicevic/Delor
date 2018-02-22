<?php
require 'db.php';


$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "db_delor";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query

$query1 = "SELECT * FROM artikal";
$query2 = "SELECT * FROM artikal WHERE naziv='coca'";

if(isset($_POST['TN'])) {
	$query1 = "SELECT * FROM artikal WHERE tip='Topli napitci'";
}elseif(isset($_POST['GP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Gazirana pica'";
}elseif(isset($_POST['AP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Alkoholna pica'";
}elseif(isset($_POST['NP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Negazirana pica'";
}
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
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/profil.css">
</head>
<body>
		<nav id="myNavbar" class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-auto">
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php">Moj profil</a></li>
              <li class="nav-item option"><a class="nav-link" href="artikl.php">Novi artikal</a></li>
              <li class="nav-item option"><a class="nav-link" href="profil.php">Skladišta</a></li>

	          <li class="nav-item option"><a class="nav-link" href="../prijava/odjava.php">Odjava</a></li>
             </ul>
		  </div>
		</nav>

	<div class="container-fluid">
		<div id="zaglavlje" class="row">
			<div id="iscezavanjek">
			</div>
		</div>
      
		<div class="row no-gutters">
			<div id="boja" class="col-sm-5 boja">
			<div  id="sticky-sidebar" class="col-sm-5 wrapper is-sticky boja">
				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
							  <form method="POST" action="profil.php">
       						<h2><input type="submit" name="TN" style=" color: white; background-color: transparent; border-color: transparent; cursor: default;" value="TOPLI NAPITCI"></h2>
						</div>
				</div>
				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2><input type="submit" name="GP" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" value="GAZIRANA PICA"></h2>
      					</div>
				</div>

				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2><input type="submit" name="AP" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" value="ALKOHOLNA PICA"></h2>
      					</div>
				</div>

				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
       						<h2><input type="submit" name="NP" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" value="NEGAZIRANA PICA"></h2>
						  </div>
						  </form>
				</div>
			</div>
			</div>
			<div class="col-sm-7 ml-auto">
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
	<script>
	document.getElementById('TN').style.display='hidden';
	document.getElementById('subm1').style.display='block';
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../src/js/index.js" type="text/javascript"></script>

</body>
</html>