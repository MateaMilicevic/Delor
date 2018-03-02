
<?php
session_start();
require 'db.php';
unset($_SESSION["artiklic"]);
// Kada se udje prvi put u stranicu da povuce podatke iz baze
// if(!isset($_SESSION['pot'])&&!isset($_SESSION['pos'])&&!isset($_SESSION['kup'])){
	// Select za povezivanje trenutno aktivnog skladista/prodavaca sa njegovim narudzbama stanja zaprimljeno
	$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik  
		AND id_kupca ='".$_SESSION['id_korisnik']."' AND narudzba.stanje= 'zaprimljeno'  ORDER BY id_narudzbe DESC ";
// }
$_SESSION['idnarudzbe']= 1;
// Kada se vrsi odabir opcija zaprimljeno, potvrdjeno i naruceno i vrcanje unazad sa bijelih stranica
if(isset($_POST['pos'])||(isset($_GET['izbor_1']))) {
	if(isset($_SESSION['pot'])) unset($_SESSION['pot']);
	if(isset($_SESSION['kup'])) unset($_SESSION['kup']);
	$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik  
		AND id_kupca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'zaprimljeno'  ORDER BY id_narudzbe DESC ";
	$_SESSION['pos']=1;
}elseif(isset($_POST['pot'])||(isset($_GET['izbor_2']))){
	$_SESSION['pot']=2;
	if(isset($_SESSION['pos'])) unset($_SESSION['pos']);
	if(isset($_SESSION['kup'])) unset($_SESSION['kup']);
	$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik  
		AND id_kupca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'potvrdjeno'  ORDER BY id_narudzbe DESC ";
}elseif(isset($_POST['kup'])||(isset($_GET['izbor_3']))){
	$_SESSION['kup']=3;
	if(isset($_SESSION['pos'])) unset($_SESSION['pos']);
	if(isset($_SESSION['pot'])) unset($_SESSION['pot']);
	$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik  
		AND id_kupca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'prodano'  ORDER BY id_narudzbe DESC ";
}

if(isset($_POST['ime_firme'])){
	if(!isset($_SESSION['pot'])&&!isset($_SESSION['pos'])&&!isset($_SESSION['kup'])){
		// Select za povezivanje trenutno aktivnog skladista/prodavaca sa njegovim narudzbama stanja zaprimljeno
		$query1 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik  
			AND id_kupca =' ".$_SESSION['id_korisnik']." ' AND narudzba.stanje= 'zaprimljeno'  ORDER BY id_narudzbe DESC ";
		$_SESSION['pos']=1;
	}
	// Sesija sa id narudzbe koja se proslijedjuje na bijele stranice
	$_SESSION['ida']= $_POST['id'];
	if(isset($_SESSION['pos'])) {
		header("location: poslano.php");
	}
	if(isset($_SESSION['pot'])) {
		header("location: potvrdjeni.php");
	}if(isset($_SESSION['kup'])) {
		header("location: kupljeni.php");
	}
	$result1 = mysqli_query($mysqli, $query1);
}
$result1 = mysqli_query($mysqli, $query1);
	
	


?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DelOr</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/moj_profil.css">
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
			  <li class="nav-item-option nav-link navbar-toggler-center" style="border: 2px solid black; background-color: black; align_text: center; color: white;"><a href ="skladiste.php"><h2><?php echo $_SESSION['ime_firme_prodavaca'] ?></h2></a></li>
              <li class="nav-item option"><a class="nav-link" href="pocetna2.php">Skladišta</a></li>
	          <li class="nav-item option"><a class="nav-link " href="../../prijava/odjava.php">Odjava</a></li>
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
					<img src="../../../src/img/avatar.png" alt="Avatar" style="width:100%">
  							<div class="container">
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
							 	<li class="nav-item option"><span class="nav-link"><input  type="submit" name="pos" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" value="Poslano"></span></li>
							</form>
							<form action="moj_profil.php" method="POST">
							 	<li class="nav-item option"><span class="nav-link"><input type="submit" name="pot" style="color: white; background-color:transparent; ; border-color: transparent; cursor: default;" value="Potvrđeno"></span></li>
							</form>
							<form action="moj_profil.php" method="POST">
							 	<li class="nav-item option"><span class="nav-link"><input type="submit" name="kup" style="color: white; background-color:transparent; ; border-color: transparent; cursor: default;" value="Kupljeno"></span></li>
							</form>
						 </ul>
						 <ul class="nav navbar-nav navbar-toggler-right">
             				<li class="nav-item option"><a class="nav-link" href="urediprofil.php">Uredi profil</a></li>
             			</ul>
		 			</div>
				</nav>
				<div class="row">
				
				<?php if((isset($_POST['pos']))||(isset($_POST['pot']))||(isset($_GET['query']))){ ?>
				<table class="table" cellpadding="1">
				
  					<tbody>
					  <?php while($korisnik = mysqli_fetch_array($result1)):
					  // Select za povezivanje narudzbi od aktivnog skladista s kupcima koji su poslali narudzbe
						$query2 = "SELECT * FROM narudzba, korisnik WHERE narudzba.id_kupca = korisnik.id_korisnik AND id_narudzbe = '".$korisnik['id_narudzbe']."'";
						$result2 = mysqli_query($mysqli, $query2);
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
				
				<?php }?>
					  <?php if((isset($_POST['kup']))||(isset($_GET['izbor_3']))){ ?>
				<table class="table" cellpadding="1">
  					<tbody>
					  <?php 
					  $querypp = "SELECT * FROM arhiv WHERE id_kupca = ' ".$_SESSION['id_korisnik']." ' ORDER BY id_narudzbe DESC";
					  $resultpp = mysqli_query($mysqli, $querypp);
					  while($korisnik2 = mysqli_fetch_array($resultpp)):
					  
						?>	
					 <tr>
					 <?php if($_SESSION['idnarudzbe']!=$korisnik2["id_narudzbe"]){ ?>
						<form method="post" action="moj_profil.php">
							<td>
							<div class="btn">
							<input type="hidden" name="id" value="<?php echo $korisnik2['id_narudzbe'];?>"><?php $_SESSION['idnarudzbe']= $korisnik2["id_narudzbe"]; ?>
							<input type="submit" name="ime_firme" style="color: white; background-color: transparent;
							 border-color: transparent; cursor: default;" value="<?php echo $korisnik2['ime_firme_kupca'];?>                       <?php echo $korisnik2['datum_narudzbe'];?>" >
							 </div>
							 </td>

						</form>
					</tr>
					 <?php } ?>
            
			<?php endwhile;?>			
					  	
				</table>
					  <?php }?>
			</div>
        		</div>
               
            </div>
        
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../../src/js/index.js" type="text/javascript"></script>

</body>
</html>