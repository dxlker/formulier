<?php
if (isset($_POST["knopje"])){
    $totaalBedrag = $_POST["totaalBedrag"];
    $aantalPersonen = $_POST["aantalPersonen"];
    $fooi = $_POST["fooi"];

if($totaalBedrag <=0 || $aantalPersonen <1 || $fooi<0)
    echo "Vul geen negatieve getallen!";
else{
    $totaalMetFooi = $totaalBedrag + $fooi;
    $kosten = $totaalMetFooi / $aantalPersonen;

    echo "Kosten per persoon is $. ($kosten)";

}}
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

<input type="text" name="totaalBedrag" placeholder="Totaal bedrag" required> <br>
<input type="text" name="aantalPersonen" placeholder="Aantal perssoon" required> <br>
<input type="text" name="fooi" placeholder="Fooi" required> <br>
<input type="submit" name="knopje" value="Verzenden">

</form>
</body>
</html>