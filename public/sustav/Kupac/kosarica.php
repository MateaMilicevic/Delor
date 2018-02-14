<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kosarica</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../src/css/kosarica.css">
</head>
<body>
		<nav id="myNavbar" class="navbar navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
		    <ul class="navbar-nav ml-auto">
	          <li class="nav-item option"><a class="nav-link navbar-toggler-left" href="moj_profil.php">Moj profil</a></li>
              <li class="nav-item option"><a class="nav-link" href="kosarica.php">Košarica</a></li>
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
      
		<div id="row no-gutters" class="d-flex justify-content-center">
			<div id="kosarica" class="col-8">
                <div class="zaglavlje3">
                    <h1>Košarica</h1>
                    <a id="btnIsprazni" href="kosarica.php?action=empty" ><h5>Isprazni košaricu</h5></a>
                </div>
            
                    <table class="table">
                       <tbody>
                             <tr>
      						    <th>#</th>
	 						    <th>Naziv</th>
	  						    <th>Cijena</th>
      						    <th>Neto količina</th>
      						    <th>Količina</th>
                                <th>Odabir</th>
    					    </tr>
                       </tbody> 
                    </table>
            </div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../../src/js/tether.min.js" type="text/javascript"></script>
	<script src="../../../src/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../../src/js/index.js" type="text/javascript"></script>

</body>
</html>