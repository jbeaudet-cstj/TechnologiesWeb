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
    $nombre = 12;
    $string = 'Bonjour';
    $reel = 3.1415;
    $condition = true;

    $nombre2 = '12';
    $somme = $nombre + $nombre2;

    // Les strings entre '' sont telles quelles
    echo '<p>$nombre + $nombre2 = $somme</p>';
    // Les strings entre "" sont interprètées
    echo "<p>$nombre + $nombre2 = $somme</p>";


    $string2 = 'tout le monde';
    // . est l'opérateur de concaténation
    $message = $string . " " . $string2;
    echo "<p>$message</p>";

    /* Fin du bloc de code PHP */ ?>

    <h2>Intermède HMTL</h2>
    <ul>
        <?php
        // Il peut y avoir plusieurs bloc php
        if ($nombre < $nombre2) {
            for ($i = $nombre; $i <= $nombre2; $i++) {
                echo "<li>$i</li>";
            }
        }
        elseif ($nombre > $nombre2) {
            for ($i = $nombre; $i >= $nombre2; $i--) {
                echo "<li>$i</li>";
            }
        }
        // Comme en JS, valeur et type
        elseif ($nombre === $nombre2) {
            echo '<li>Les 2 nombres sont égaux</li>';
        }
        else {
            echo '<li>Les 2 nombres sont égaux, mais ne sont pas du même type</li>';
        }

        ?>
    </ul>

    <?php
    for ($i = 1; $i <= 6; $i++) {
        echo "<h$i>Titre de niveau $i</h$i>";
    }
    ?>

    <table>
        <?php
        // define permet de définir le nom d'une constante
        // Doit être au niveau global, ne peut pas être dans une fonction
        define('NB_LIGNES', 5);
        define('NB_COLONNES', 10);

        // Pas de $ avec les constantes
        for ($ligne = 0; $ligne < NB_LIGNES; $ligne++) {
            echo '<tr>';
            for ($colonne = 0; $colonne < NB_COLONNES; $colonne++) {
                echo '<td>' . ($ligne * NB_COLONNES + $colonne) . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>