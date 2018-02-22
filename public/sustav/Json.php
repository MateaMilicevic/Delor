<?php
require 'db.php';

header('Content-Type: application/json; charset=utf-8;');



$sql = "SELECT * FROM artikal WHERE tip = 'Topli napitci'";
$result1 = mysqli_query($mysqli, $query1);



?>