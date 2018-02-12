
 <!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Artikli</title>
	<link rel="stylesheet" type="text/css" media="all" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="src2/css/artikl.css">
</head>

<body>
    <div class="pozadina">
        <div class="kontenjer">          
          <div class="naslov"><h1>Dodaj artikl</h1></div>
            <form method="post" action="prijava.php">
              <input type="text" placeholder="Naziv artikla" name="naziv" required><br>
			        <input type="text" placeholder="Neto količina" name="neto_kolicina" required><br>
			        <input type="text" placeholder="Cijena" name="cijena" required><br>
			        <input type="text" placeholder="Dostupnost" name="dostupnost" required><br><br>
              <label for="odab1"><h5>Kategorija:</h5></label>
                 <select class="odabir" id="odab1">
                    <option>Topli napitci</option>
                    <option>Gazirana pića</option>
                    <option>Alkoholna pića</option>
                    <option>Negazirana pića</option>
                 </select>
				  <br>
			  <input type="submit" value="Dodaj" name="potvrda2">
              <input type="submit" value="Potvrdi" name="potvrda">
           </form>
         </div>
    </div>

</body>
