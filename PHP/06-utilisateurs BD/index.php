<?php
require_once '../PdoWrapper.php';


function getAllUsers($pdo) {
    $statement = $pdo->query("SELECT * FROM `users`");
    // Exécute la requête et récupère toutes les lignes sous forme de tableau
    $users = $statement->fetchAll();

    // $users est sous forme d'un tableau associatif tel que dans l'exercice 05
    return $users;
}

// Retourne l'utilisateur du tableau donné, portant l'id donnée
// Lance une InvalidArgumentException si id introuvable
function getUserById($pdo, $id) {
    $statement = $pdo->prepare("SELECT * FROM `users` WHERE `id` = ?");
    // ? sera remplacé par la valeur de $id
    $statement->execute([ $id ]);

    if ($statement->rowCount() == 0) {
        throw new InvalidArgumentException();
    }

    // Un seul objet est attendu, on récupère une seule ligne
    return $statement->fetch();
}



// Retourne une sous-liste du tableau donné contenant les utilsateurs dont le nom
// ou le prénom contiennent le texte donné (non sensible à la casse)
function searchUsers($pdo, $text) {
    $statement = $pdo->prepare("SELECT * FROM `users` WHERE `first_name` LIKE ? OR `last_name` LIKE ?");
    // Lorsque plusieurs ? sont présents, on donne plusieurs valeurs, dans l'ordre qu'ils apparaissent dans la requête
    $statement->execute([ "%$text%", "%$text%" ]);

    return $statement->fetchAll();
}




$pdow = new PdoWrapper('test_php');

//var_dump($_GET);
// isset retourne vrai si la variable donnée contient une valeur, faux sinon
if (isset($_GET['id'])) {
    try {
        $resultat = getUserById($pdow->getPdo(), $_GET['id']);
    }
    catch (InvalidArgumentException) {
        // Modifie le statut de la réponse HTTP (404 = Not Found)
        http_response_code(404);
        die();
    }
}
elseif (isset($_GET['search'])) {
    $resultat = searchUsers($pdow->getPdo(), $_GET['search']);
}
else {
    $resultat = getAllUsers($pdow->getPdo());
}


// Modifie l'en-tête de la réponse
// Indique au client qu'on retourne du JSON
header('Content-Type: application/json; charset=utf-8');

// Transforme un tableau associatif en structure json
echo json_encode($resultat);
?>
