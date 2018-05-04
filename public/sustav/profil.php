<?php
session_start();
require 'db.php';


if (isset($_POST["drop"])){
	$_SESSION['id']= $_POST['id'];
	$id= $_SESSION['id'];
	$sql="DELETE FROM `artikal` WHERE `id_artikla`='$id'";
	if ($mysqli->query($sql)){
	header("location: profil.php");
	}
}

// Ako su pokrenute sesije u mom profilu da ih vracanjem na skladiste ugasimo
if(isset($_SESSION['zap'])) unset($_SESSION['zap']);
if(isset($_SESSION['prod'])) unset($_SESSION['prod']);
if(isset($_SESSION['pot'])) unset($_SESSION['pot']);

$query1 = "SELECT * FROM artikal WHERE id_korisnik = '".$_SESSION['id_korisnik']."'";
$query2 = "SELECT * FROM artikal WHERE naziv='coca'";

if(isset($_POST['TN'])) {
	$query1 = "SELECT * FROM artikal WHERE tip='Topli napitci' AND id_korisnik = '".$_SESSION['id_korisnik']."'";
}elseif(isset($_POST['GP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Gazirana pica' AND id_korisnik = '".$_SESSION['id_korisnik']."'";
}elseif(isset($_POST['AP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Alkoholna pica' AND id_korisnik = '".$_SESSION['id_korisnik']."'";
}elseif(isset($_POST['NP'])){
	$query1 = "SELECT * FROM artikal WHERE tip='Negazirana pica' AND id_korisnik = '".$_SESSION['id_korisnik']."'";
}
// result for method one
$result1 = mysqli_query($mysqli, $query1);

// result for method two 
$query2 = "SELECT * FROM korisnik WHERE id_korisnik = '".$_SESSION['id_korisnik']."'";
$result2 = mysqli_query($mysqli, $query2);
$value2 = mysqli_fetch_array($result2);


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
			<li class="nav-item-option nav-link navbar-toggler-center" style="border: 2px solid black; background-color: black;"><h2><?php echo $value2['ime_firme'] ?></h2></li>							
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php?query='1'">Moj profil</a></li>
			  <li class="nav-item option"><a class="nav-link navbar-toggler-center" href="artikl.php">Dodaj Artikl</a></li>
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
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="pretraživanje po imenu..">
				<table id = "myTable"class="table">
  					<thead class="thead-inverse">
   						 <tr>
      						<th>#</th>
	 						<th>Naziv</th>
	  						<th>Cijena</th>
							  <th>Neto kolicina</th>
							  <th></th>
							  <th></th>
      						
							
    					</tr>

  					</thead>
  					<tbody>
					  <?php while($artikal = mysqli_fetch_array($result1)):;?>	
					 
            <tr>
				<form method="post" action="profil.php">
                <td><input type="hidden" name="id" value="<?php echo $artikal['id_artikla'];?>"><?php echo $artikal['id_artikla'];?></td>
                <td><?php echo $artikal['naziv'];?></td>
                <td><?php echo $artikal['cijena'];?> KM</td>
				<td><?php echo $artikal['neto_kolicina'];?> </td>
				<td></td>
				<td><div class="btn">
                       
                            
                            <input type="submit"  value="Brisanje" name="drop">
                        
                    </div></td>
					</form>
			<?php endwhile;?>			
			
								
									 
				   				</div></td>
						
							</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
	<script>
	document.getElementById('TN').style.display='hidden';
	document.getElementById('subm1').style.display='block';
	</script>

<script>
		
			function myFunction() {
  				// Declare variables 
 			 var input, filter, table, tr, td, i;
  				input = document.getElementById("myInput");
  				filter = input.value.toUpperCase();
  				table = document.getElementById("myTable");
 				 tr = table.getElementsByTagName("tr");

  					// Loop through all table rows, and hide those who don't match the search query
  				for (i = 0; i < tr.length; i++) {
   					 td = tr[i].getElementsByTagName("td")[1];
    				if (td) {
     				 if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
       				 tr[i].style.display = "";
     				 } else {
      		  tr[i].style.display = "none";
     		 }
    		} 
  			}
		}
		
		</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../src/js/index.js" type="text/javascript"></script>

</body>
</html>