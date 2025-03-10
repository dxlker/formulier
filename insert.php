<?php
require "connectie.php";

if (isset($_POST["knop"])){
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "insert into producten (product_naam, prijs_per_stuk, omschrijving)
    values (:product_naam, :prijs_per_stuk, :omschrijving)";
    $result = $pdo->prepare($sql);
    $placeholders = [
        "product_naam" => $product_naam,
        "prijs_per_stuk" => $prijs_per_stuk,
        "omschrijving" => $omschrijving

    ];
    $result->execute($placeholders);
    if ($result) {
        echo "File toegevoegd!";
    } else{
           echo "Er is een fout opgetreden";
           die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="product_naam">
        <input type="text" name="prijs_per_stuk">
        <input type="text" name="omschrijving">
        <input type="submit" name="knop" value="Submit">

    </form>
</body>
</html>