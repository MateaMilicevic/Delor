<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="all" href="../../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/css/prijavac.css">
</head>
<body>

        <div class="naslov">
            <h1>Prijava</h1>
        </div>
        <div class="kontenjer">
            <div class="left"></div>
            <div class="right">
                <div class="okvir">
                    <form method="post" action="prijava.php">
                         <p>Korisničko ime</p>
                         <input type="text" name="korime" placeholder="Online">
                         <p>Lozinka</p>
                         <input type="password" name="lozinka" placeholder="......">
                         <input type="submit" name="prijavi" value="Prijava">
                         <a href="#"> Zaboravili ste lozinku? </a>
                    </form>
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../src/js/tether.min.js" type="text/javascript"></script>
    <script src="../../src/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>