
<?php
if (session_id() == "session1"|| "session2")
session_start();

?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DelOr</title>
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/moj_profil.css">
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
		        <div class="col-3 boja1">
                    <h2><?php echo ($_SESSION["korime"])?></h2>
					<div class="card">
  						<img src="src2/img/avatar.png" alt="Avatar" style="width:100%">
  							<div class="container">
    							<h4><b><?php echo ($_SESSION["ime"])?> <?php echo ($_SESSION["prezime"])?></b></h4> 
   								 <p>
									<?php echo ($_SESSION["ime_firme"])?><br>
									<?php echo ($_SESSION["adresa"]) ?><br>
									Broj telefona
								</p> 
								<a id="ikona" href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></i></a>
  							</div>
					</div>
        
                </div>
			
                <div class="col-9 boja2">
<<<<<<< HEAD
				<nav id="myNavbar" class="navbar sticky-top navbar-toggleable-md navbar-light bg-faded">
		  			<button class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    			<span class="navbar-toggler-icon"></span>
		  			</button>
		 			<div class="navbar-collapse collapse" >
		    			<ul class="nav navbar-nav navbar-left">
             				<li class="nav-item option"><a class="nav-link" href="#">Novi</a></li>
             				<li class="nav-item option"><a class="nav-link " href="">Zaprimljeno</a></li>
			  				<li class="nav-item option"><a class="nav-link " href="">Prodano</a></li>
						 </ul>
						 <ul class="nav navbar-nav navbar-toggler-right">
             				<li class="nav-item option"><a class="nav-link" href="#">Uredi profil</a></li>
=======
				
				<nav id="myNavbar" class="navbar navbar-toggleable-md navbar-light bg-faded">
		  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    			<span class="navbar-toggler-icon"></span>
		  			</button>
		 			<div class="collapse navbar-collapse" id="navbarResponsive">
		    			<ul class="navbar-nav ml-auto">
             				<li class="nav-item option"><a class="nav-link  " href="">Novi</a></li>
             				<li class="nav-item option"><a class="nav-link  " href="">Zaprimljeno</a></li>
			  				<li class="nav-item option"><a class="nav-link  " href="">Prodano</a></li>
						    <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="urediprofil.php">Uredi profil</a></li>
>>>>>>> 7b3d53e41bcd5e9db6ffa5d69e73c8ee71464b16
             			</ul>
		 			</div>
				</nav>
        			</div>
               
            </div>
        
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../src/js/index.js" type="text/javascript"></script>

</body>
</html>