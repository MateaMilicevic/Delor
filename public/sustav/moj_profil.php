
<?php

session_start();
require 'db.php';
// php populate html table from mysql database
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "db_delor";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
if(!isset($_POST['ime_firme'])){
$query3 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik ";
$result3 = mysqli_query($connect, $query3);
$korisnik2 = mysqli_fetch_array($result3);
}
$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_prodavaca = korisnik.id_korisnik  
AND id_prodavaca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'zaprimljeno'  ORDER BY vrijeme DESC ";

// // mysql select query
// if(isset($_SESSION['zap'])){
// 	$query1 = "SELECT * FROM narudzba WHERE stanje='zaprimljeno' AND id_prodavaca = '".$_SESSION['id_korisnik']."'";
// }
// if(isset($_SESSION['pot'])){
// 	$query1 = "SELECT * FROM narudzba WHERE stanje='potvrdeno' AND id_prodavaca =' ".$_SESSION['id_korisnik']."'";
// }

// if(isset($_SESSION['prod'])){
// 	$query1 = "SELECT * FROM narudzba WHERE stanje='prodano' AND id_prodavaca = '".$_SESSION['id_korisnik']."'";
// }


if(isset($_POST['ime_firme'])){
	$_SESSION['ida']= $_POST['id'];
	if(isset($_SESSION['zap'])) {
		header("location: bijelastr.php");
	}
	if(isset($_SESSION['pot'])) {
		header("location: bijelastr.1.php");
	}if(isset($_SESSION['prod'])) {
		header("location: bijelastr.2.php");
	}
}


if(isset($_POST['zap'])) {
	$_SESSION['zap']=$_POST['zap'];
	if(isset($_SESSION['pot'])) unset($_SESSION['pot']);
	if(isset($_SESSION['prod'])) unset($_SESSION['prod']);
	$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_prodavaca = korisnik.id_korisnik  
	AND id_prodavaca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'zaprimljeno'  ORDER BY vrijeme DESC ";
}elseif(isset($_POST['pot'])){
	$_SESSION['pot']=$_POST['pot'];
	if(isset($_SESSION['zap'])) unset($_SESSION['zap']);
	if(isset($_SESSION['prod'])) unset($_SESSION['prod']);
	$query1 = "SELECT * FROM narudzba WHERE stanje='potvrdjeno' AND id_prodavaca = '".$_SESSION['id_korisnik']."'";
}elseif(isset($_POST['prod'])){
	$_SESSION['prod']=$_POST['prod'];
	if(isset($_SESSION['zap'])) unset($_SESSION['zap']);
	if(isset($_SESSION['pot'])) unset($_SESSION['pot']);
	$query1 = "SELECT * FROM narudzba WHERE stanje='prodano' AND id_prodavaca =' ".$_SESSION['id_korisnik']."'";
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
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/moj_profil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", rel="stylesheet", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous">
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
		        <div class="col-3 boja1">
                    <h2><?php echo ($_SESSION['korime'])?></h2>
					<div class="card">
    						<h4><b><?php echo ($_SESSION['ime'])?> <?php echo ($_SESSION['prezime'])?></b></h4> 
   								 <p>
									<?php echo ($_SESSION['ime_firme'])?><br>
									<?php echo ($_SESSION['adresa']) ?><br>
									<?php echo ($_SESSION['broj_telefona']) ?>
									
								</p> 
								<a id="ikona" href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></i></a>
  							</div>
					</div>
        
                </div>
			
                <div class="col-9 boja2">
				<nav id="myNavbar1" class="navbar sticky-top navbar-toggleable-md navbar-light bg-faded">
		  			<button class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    			<span class="navbar-toggler-icon"></span>
		  			</button>
		 			<div class="navbar-collapse collapse" >
		    			<ul class="nav navbar-nav navbar-left">
							<form action="moj_profil.php" method="POST">
							 	<li class="nav-item option"><span class="nav-link"><input  type="submit" name="zap" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" value="Zaprimljeno"></span></li>
							</form>
							<form action="moj_profil.php" method="POST">
							 	<li class="nav-item option"><span class="nav-link"><input type="submit" name="pot" style="color: white; background-color:transparent; ; border-color: transparent; cursor: default;" value="Potvrđeno"></span></li>
							</form>
							<form action="moj_profil.php" method="POST">
							 	<li class="nav-item option"><span class="nav-link"><input type="submit" name="prod" style="color: white; background-color:transparent; ; border-color: transparent; cursor: default;" value="Prodano"></span></li>
							</form>
						 </ul>
						 <ul class="nav navbar-nav navbar-toggler-right">
             				<li class="nav-item option"><a class="nav-link" href="urediprofil.php">Uredi profil</a></li>
             			</ul>
		 			</div>
				</nav>
				<div class="row">
				<table class="table" cellpadding="1">
  					<tbody>
					  <?php while($korisnik = mysqli_fetch_array($result1)):
						$query2 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik AND id_narudzbe = '".$korisnik['id_narudzbe']."'";
						$result2 = mysqli_query($connect, $query2);
						$korisnik2 = mysqli_fetch_array($result2);
					
						?>	
					 <tr>
					
						<form method="post" action="moj_profil.php">
							<td>
							<div class="btn">
							<input type="hidden" name="id" value="<?php echo $korisnik2['id_narudzbe'];?>">
							<input type="submit" name="ime_firme" style="color: white; background-color: transparent;
							 border-color: transparent; cursor: default;" value="<?php echo $korisnik2['ime_firme'];?>                       <?php echo $korisnik2['datum_narudzbe'];?>" >
							 </div>
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