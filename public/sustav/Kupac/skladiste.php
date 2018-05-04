<?php
session_start();
require 'db.php';


if(isset($_POST['ime_firme'])){
$_SESSION['korisnik_id']=$_POST['id_korisnik'];
}
$query1 = "SELECT * FROM artikal WHERE id_korisnik = '".$_SESSION['korisnik_id']."'";



if(isset($_SESSION['TN'])){
		$query1 = "SELECT * FROM artikal WHERE tip='Topli napitci' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
	}
	if(isset($_SESSION['GP'])){
		$query1 = "SELECT * FROM artikal WHERE tip='Gazirana pica' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
	}
	
	if(isset($_SESSION['AP'])){
		$query1 = "SELECT * FROM artikal WHERE tip='Alkoholna pica' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
	}
	
	if(isset($_SESSION['NP'])){
		$query1 = "SELECT * FROM artikal WHERE tip='Negazirana pica' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
	}
	

if(isset($_POST['TN'])) {
	$_SESSION['TN']=$_POST['TN'];
	if(isset($_SESSION['GP'])) unset($_SESSION['GP']);
	if(isset($_SESSION['AP'])) unset($_SESSION['AP']);
	if(isset($_SESSION['NP'])) unset($_SESSION['NP']);
	$query1 = "SELECT * FROM artikal WHERE tip='Topli napitci' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
}elseif(isset($_POST['GP'])){
	$_SESSION['GP']=$_POST['GP'];
	if(isset($_SESSION['TN'])) unset($_SESSION['TN']);
	if(isset($_SESSION['AP'])) unset($_SESSION['AP']);
	if(isset($_SESSION['NP'])) unset($_SESSION['NP']);
	$query1 = "SELECT * FROM artikal WHERE tip='Gazirana pica'AND id_korisnik = '".$_SESSION['korisnik_id']."' ";
}elseif(isset($_POST['AP'])){
	$_SESSION['AP']=$_POST['AP'];
	if(isset($_SESSION['TN'])) unset($_SESSION['TN']);
	if(isset($_SESSION['GP'])) unset($_SESSION['GP']);
	if(isset($_SESSION['NP'])) unset($_SESSION['NP']);
	$query1 = "SELECT * FROM artikal WHERE tip='Alkoholna pica' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
}elseif(isset($_POST['NP'])){
	$_SESSION['NP']=$_POST['NP'];
	if(isset($_SESSION['TN'])) unset($_SESSION['TN']);
	if(isset($_SESSION['AP'])) unset($_SESSION['AP']);
	if(isset($_SESSION['GP'])) unset($_SESSION['GP']);
	$query1 = "SELECT * FROM artikal WHERE tip='Negazirana pica' AND id_korisnik = '".$_SESSION['korisnik_id']."'";
}
// result for method one
$result1 = mysqli_query($mysqli, $query1);


// if(isset($_POST['skladiste'])){
	$query3 = "SELECT *FROM korisnik , artikal WHERE korisnik.id_korisnik=artikal.id_korisnik AND korisnik.id_korisnik='".$_SESSION['korisnik_id']."'";
	
	$result3 = mysqli_query($mysqli, $query3);
	
	$ime = mysqli_fetch_array($result3);
	$_SESSION['id_prodavac']= $ime['id_korisnik'];
	$_SESSION['ime_firme_prodavaca']= $ime['ime_firme'];

// }


?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DelOr</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/profil.css">
	
</head>
<body>
		<nav id="myNavbar" class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-auto">
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php?query='1'">Moj profil</a></li>
			  <li class="nav-item-option nav-link navbar-toggler-center" style="border: 2px solid black; background-color: black;"><h2><?php echo $_SESSION['ime_firme_prodavaca'] ?></h2></li>
              <li class="nav-item option"><a class="nav-link" href="kosarica.php">Košarica</a></li>
              <li class="nav-item option"><a class="nav-link" href="pocetna2.php">Skladišta</a></li>
	          <li class="nav-item option"><a class="nav-link" href="../../prijava/odjava.php">Odjava</a></li>
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
			<div  id="sticky-sidebar" class="col-sm-5 wrapper is-sticky">
				<div id="topli_napitci" class="row menu-bar">
					<div class="col-sm-1 za-sliku">
						<img src="http://superawesomevectors.com/wp-content/uploads/2017/04/flat-coffee-cup-icon-800x566.jpg" class="slika image-fluid img-thumbnail img-responsive" alt="Cinque Terre">
					</div>
      					<div class="col-8">
						  <form method="POST" action="skladiste.php">
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
				<table id="myTable" class="table">
  					<thead class="thead-inverse">
   						 <tr>
      						<th>#</th>
	 						<th>Naziv</th>
	  						<th>Cijena</th>
      						<th>Neto kolicina</th>
      						
                            <th>Odabir</th>
    					</tr>

  					</thead>
  					<tbody>
						
					  <?php while($artikal = mysqli_fetch_array($result1)):;?>
            <tr>
			<form method="post" action="kosarica.php?action=add&id=<?php echo $artikal["id_artikla"]?>">
                <td><input type="hidden" name="id" value="<?php echo $artikal['id_artikla'];?>"><?php echo $artikal['id_artikla'];?></td>
                <td><input type="hidden" name="ime" value="<?php echo $artikal['naziv'];?>"><?php echo $artikal['naziv'];?></td>
                <td><input type="hidden" name="cijenaa" value="<?php echo $artikal['cijena'];?>"><?php echo $artikal['cijena'];?></td>
				<td><input type="hidden" name="neto" value="<?php echo $artikal['neto_kolicina'];?>"><?php echo $artikal['neto_kolicina'];?></td>
				
                <td><div class="btn">
                       
                            <input type="text" name="kolicina" value="1" size="1" class="demo-input-box">
                            <input type="submit"  value="Dodaj u košaricu" name="add">
                        
                    </div></td>
					</form>
            </tr>
            <?php endwhile;?>
							
					  	
				</table>
				</div>
			</div>
		</div>
	</div>

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
	<script src="../../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../../src/js/index.js" type="text/javascript"></script>

</body>
</html>