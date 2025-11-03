<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quiz.css">
    <title>Quiz</title>
</head>

<?php
// Tableau en 2D
$questions = [
    [ 'Dans quel pays se trouve le mont Kilimandjaro', 'Tanzanie' ],
    [ 'En quelle année est sorti le premier iPhone', '2007' ],
    [ 'Quel est le prénom du père de famille des Simpsons', 'Homer' ]
];


function valider($i, $question) {
    echo "<label>$question[0] ?</label><br>\n";
    $reponse = $_POST["reponse$i"];
    if (strtolower($reponse) == strtolower($question[1])) {
        echo "<span class=\"reponse ok\">$reponse</span><br><br>\n\n";
        return 1;
    }
    else {
        echo "<span class=\"reponse error\">$reponse</span><br>\n\n";
        echo "La bonne réponse était: <span class=\"reponse ok\">$question[1]</span><br><br>";
        return 0;
    }
}
?>

<body>
    <h1>Quiz en PHP</h1>

   
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);
            $points = 0;
            foreach ($questions as $i => $question) {
                $points += valider($i, $question);
            }
            echo "Votre score: $points / " . count($questions);
        }
        else {
            echo '<form method="post">';
            // $i va contenir l'index, et $question l'élément du tableau
            foreach ($questions as $i => $question) {
                echo "<label>$question[0] ?</label><br>\n";
                echo "<input type=\"text\" name=\"reponse$i\" required><br><br>\n\n";
            }
            echo '<input type="submit" value="Soumettre les réponses">';
            echo '</form>';
        }
        ?>
</body>
</html>