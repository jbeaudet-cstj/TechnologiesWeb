<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tableaux.css">
    <title>Exemples de tableaux</title>
</head>

<?php
$tab1 = [ 'a', 'b', 'c' ];

// $tab1 est une version abrégée de:
$tab2 = [ 0 => 'a', 1 => 'b', 2 => 'c' ];

// En PHP, un tableau est en fait un tableau associatif (un dictionnaire)
// Les éléments peuvent être de types différents
$tab3 = [
    'a' => 'Bonjour',
    3   => true,
    'allo' => 12
];

// Tableau 2D: tableau indexé de tableau associatif
$produits = [
    [ 'nom' => 'Souris sans fil', 'prix' => 19.99, 'inventaire' => 12 ],
    [ 'nom' => 'Clavier', 'prix' => 28.50, 'inventaire' => 7 ],
    [ 'nom' => 'Moniteur', 'prix' => 189.00, 'inventaire' => 3 ]
];

$produits[] = [ 'nom' => 'Cable usb', 'prix' => 9.99, 'inventaire' => 34 ];
?>

<body>
<h2>Tableau simple</h2>
<?php
// Ajoute à la fin du tableau
$tab1[] = 'd';
foreach ($tab1 as $i => $valeur) {
    echo "$i: $valeur<br>";
}
?>


<h2>Tableau associatif</h2>
<?php
// Ajoute à la fin du tableau
$tab3[12] = 3.14;
foreach ($tab3 as $cle => $valeur) {
    echo "$cle: $valeur<br>";
}
echo "$tab3[allo]<br>";
?>


<h2>Produits</h2>
<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix ($)</th>
            <th>Inventaire</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($produits as $produit) {
            echo '<tr>' .
                     '<td>' . $produit['nom'] . '</td>' .
                     '<td>' . number_format($produit['prix'], 2) . '</td>' .
                     '<td>' . $produit['inventaire'] . '</td>' .
                 '</tr>';
        }
        ?>
    </tbody>
</table>

</body>
</html>