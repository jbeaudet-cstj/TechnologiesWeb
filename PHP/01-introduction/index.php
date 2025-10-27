<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction au PHP</title>
</head>
<body>
    <h1>Introduction au PHP</h1>

    <?php  // Début d'un bloc de code PHP

    echo '<p>Ceci est un message provenant du code php</p>';  // ; obligatoire

    // Les variable doivent débuté par $
    // Comme en JS, pas de type
    $nombre = 5;
    $string = 'Bonjour';
    $reel = 3.1415;
    $condition = true;

    $nombre2 = 12;
    $somme = $nombre + $nombre2;

    // Les strings entre '' sont telles quelles
    echo '<p>$nombre + $nombre2 = $somme</p>';
    // Les strings entre "" sont interprètées
    echo "<p>$nombre + $nombre2 = $somme</p>";

    /* Fin du bloc de code PHP */ ?>
</body>
</html>