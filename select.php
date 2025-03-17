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

$producten = $pdo->query("SELECT * FROM producten");
$result = $producten->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Producten toevoegen</h1>
    <form method="POST">
        <input type="text" name="product_naam" placeholder="Product naam" required>
        <input type="text" name="prijs_per_stuk" placeholder="Prijs per stuk" required>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required>
        <input type="submit" name="knop" value="Submit">

    </form>

    <h2>Overzicht van producten</h2>

    <table class="table table-bordered border-primary">
        <tr>
            <th>Product naam</th>
            <th>Prijs per stuk</th>
            <th>Omschrijving</th>
        </tr>

       <?php
       foreach ($result as $producten){
        echo "<tr>";
        echo "<td>". $producten["product_naam"]. "</td>";
        echo "<td>". $producten["prijs_per_stuk"]. "</td>";
        echo "<td>". $producten["omschrijving"]. "</td>";
        echo "</tr>";

       }
       ?>
    </table>
</body>
</html>