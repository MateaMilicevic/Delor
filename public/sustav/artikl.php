<?php
session_start();
require 'db.php';




if($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST['potvrda2'])) {
		
		$naziv = $_POST['naziv'];
		$neto_kolicina = $_POST['neto_kolicina'];
		$cijena = $_POST['cijena'];
		
		$tip = $_POST['tip1'];
		$_SESSION['logged_in'] = true;

		

		
			$sql = "INSERT INTO artikal (naziv, neto_kolicina, cijena,  tip, id_korisnik) "
			. "VALUES ('$naziv','$neto_kolicina','$cijena','$tip', '".$_SESSION['id_korisnik']."' )";
			if ($mysqli->query($sql)){
				header("location: artikl.php");
			}
	}		

	}


?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Artikli</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/artikl.css">
</head>

<body>
    <div class="pozadina">
        <div class="kontenjer">          
          <div class="naslov"><h1>Dodaj artikl <?php echo ($_SESSION['id_korisnik']) ?></h1></div>
            <form method="post" action="artikl.php">
              <input type="text" placeholder="Naziv artikla" name="naziv" required><br>
			        <input type="text" placeholder="Neto količina" name="neto_kolicina" required><br>
			        <input type="text" placeholder="Cijena" name="cijena" required><br>
			        
              <label for="tip1"><h5>Kategorija:</h5></label>
                 <select class="tip1" id="tip1" name="tip1">
                    <option value="Topli napitci" name="tip">Topli napitci</option>
                    <option value="Gazirana pica" name="tip">Gazirana pića</option>
                    <option value="Alkoholna pica" name="tip">Alkoholna pića</option>
                    <option value="Negazirana pica" name="tip">Negazirana pića</option>
                 </select>
				  <br>
			  <input type="submit" value="Dodaj" name="potvrda2">
			  <div id="link"><span id="ll"span><a href="profil.php">Potvrdi</a></span></div>
		   </form>
		  
         </div>
    </div>

</body>
