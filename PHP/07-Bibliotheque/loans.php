<?php
require_once '../PdoWrapper.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, PATCH');

// Extrait le contenu de la requête et vérifie que les attributs donnés sont présents
// Retourne le contenu sous forme d'un tableau associatif
// Lance une InvalidArgumentException si contenu pas en json, ou attribut manquant
function extractData($attributes) {
    $jsonData = file_get_contents('php://input'); // Contenu de la requête
    $data = json_decode($jsonData, true);  // true: retourne un tableau, false: retourne un objet

    // Si json_deconde n'a pas fonctionné
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new InvalidArgumentException();
    }

    // Les attributs attendus doivent être présents
    foreach ($attributes as $attribute) {
        if (!isset($data[$attribute])) {
            throw new InvalidArgumentException();
        }
    }

    return $data;
}


function validateId($pdo, $table, $id, $extra = '') {
    $statement = $pdo->prepare("SELECT * FROM $table WHERE `id` = ?" . $extra);
    $statement->execute([ $id ]);
    if ($statement->rowCount() === 0) {
        throw new InvalidArgumentException();
    }
}

function addLoan($pdo) {
    $data = extractData([ 'member_id', 'book_id' ]);

    $memberId = $data['member_id'];
    $bookId = $data['book_id'];

    // Vérifie que le membre et le livre sont valide
    validateId($pdo, 'members', $memberId);
    validateId($pdo, 'books', $bookId);

    $statement = $pdo->prepare("INSERT INTO `loans` (`member_id`, `book_id`) VALUES (?, ?)");
    if ($statement->execute([ $memberId, $bookId ]) === false) {
        throw new RuntimeException();
    }

    $statement = $pdo->prepare("SELECT * FROM `loans` WHERE `id` = ?");
    $statement->execute([ $pdo->lastInsertId() ]);
    return $statement->fetch();
}

function returnLoan($pdo) {
    $data = extractData(['id']);
    $id = $data['id'];

    validateId($pdo, 'loans', $id, " AND `return_date` IS NULL");

    $statement = $pdo->prepare("UPDATE `loans` SET `return_date` = CURRENT_DATE WHERE `id` = ?");
    if ($statement->execute([ $id ]) === false) {
        throw new RuntimeException();
    }

    $statement = $pdo->prepare("SELECT * FROM `loans` WHERE `id` = ?");
    $statement->execute([ $id ]);
    return $statement->fetch();    
}



try {
    $pdow = new PdoWrapper('library');


    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(204); // OK, mais aucun contenu
        die();
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $resultat = addLoan($pdow->getPdo());
        http_response_code(201);  // Créé
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
        $resultat = returnLoan($pdow->getPdo());
    }
    else {
        $resultat = [];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($resultat);
}
catch (InvalidArgumentException) {
    http_response_code(400); // Invalide
    die();
}
catch (RuntimeException) {
    http_response_code(500); // Erreur serveur
    die();
}
?>
