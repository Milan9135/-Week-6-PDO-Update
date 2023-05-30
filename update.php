<?php

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "winkel1";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected, ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['knopje'])) {
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    $sql = ("UPDATE producten SET product_naam = ?, prijs_per_stuk = ?, omschrijving = ? WHERE product_code = 2");

    $stmt = $conn->prepare($sql);
    $stmt->execute([$product_naam, $prijs_per_stuk, $omschrijving]);

    echo ("Product naam: $product_naam Prijs: $prijs_per_stuk omschrijving: $omschrijving");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="product_naam" placeholder="product_naam">
        <input type="text" name="prijs_per_stuk" placeholder="prijs_per_stuk">
        <input type="text" name="omschrijving" placeholder="omschrijving">
        <input type="submit" name="knopje">
    </form>
</body>
</html>
