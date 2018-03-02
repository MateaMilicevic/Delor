<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registracija</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/dodavanje.css">
</head>

<body>
    <div class="pozadina">
        <div class="kontenjer">
            <form method="post" action="dodavanje.php">
					<input type="text" placeholder="Naziv firme" name="ime_firme" required><br>
					<input type="text" placeholder="Adresa" name="adresa" required><br>
					<input type="text" placeholder="Grad" name="grad" required><br>
					<input type="text" placeholder="Država" name="drzava" required>
					<input type="text" placeholder="Poštanski broj" name="postanski_broj" required>
					<input type="text" placeholder="Broj telefona" name="telbroj" required>
            
        <div class="naslov"><h1>Dodaj artikl</h1></div>
            
                    <input type="text" placeholder="Naziv artikla" name="naziv_artikla" required><br>
					<input type="text" placeholder="Neto količina" name="neto_kolicina" required><br>
					<input type="text" placeholder="Cijena" name="cijena" required><br>
					
					<input type="submit" value="Potvrdi" name="potvrda">
            </form>
        </div>
    </div>