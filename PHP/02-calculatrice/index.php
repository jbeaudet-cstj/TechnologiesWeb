<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>

<?php
$operations = [ 'Additionner', 'Soustraire', 'Multiplier', 'Diviser' ];

function calculer($n1, $n2, $op) {
    // Pour accéder à une variable définie à l'extérieur de la fonction
    global $operations;

    switch ($op) {
        case $operations[0]:
            return $n1 + $n2;
        case $operations[1]:
            return $n1 - $n2;
        case $operations[2]:
            return $n1 * $n2;
        case $operations[3]:
            return $n1 / $n2;
    }
}
?>


<body>
    <h1>Calculatrice</h1>

    <form method="post">
        <label for="num1">Nombre 1:</label>
        <input type="text" name="num1" id="num1">
        <br><br>

        <label for="num2">Nombre 2:</label>
        <input type="text" name="num2" id="num2">
        <br><br>

        <label for="operation">Opération:</label>
        <select name="operation" id="operation">
            <?php
            foreach ($operations as $operation) {
                echo "<option value=\"$operation\">$operation</option>";
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Calculer">
    </form>
    <hr>

    <?php
    // $_SERVER est une variable "super globale", accessible de partout
    //var_dump($_SERVER);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $_POST est aussi super globale
        //var_dump($_POST);

        try {
            // Les noms de fonctions ne sont pas sensibles à la casse (case insensitive)
            $resultat = CALcuLeR($_POST['num1'], $_POST['num2'], $_POST['operation']);
            echo '<h2>Résultat</h2>';
            echo "<strong>$resultat</strong>";
        }
        catch (DivisionByZeroError) {
            echo '<h2>Erreur</h2> Division par 0!';
        }
        catch (TypeError) {
            echo '<h2>Erreur</h2> Vous devez indiquez 2 nombres!';
        }

    }
    ?>
</body>
</html>