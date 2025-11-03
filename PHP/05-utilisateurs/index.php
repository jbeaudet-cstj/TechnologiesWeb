<?php

$users = [
    [ 'id' => 94, 'firstName' => 'Agathe', 'name' => 'Auger', 'email' => 'aauger@cstj.qc.ca' ],
    [ 'id' => 49, 'firstName' => 'Brigitte', 'name' => 'Bazinet', 'email' => 'bbazinet@cstj.qc.ca' ],
    [ 'id' => 23, 'firstName' => 'Clothilde', 'name' => 'Coulombe', 'email' => 'ccoulombe@cstj.qc.ca' ],
    [ 'id' => 77, 'firstName' => 'Doris', 'name' => 'Dubuc', 'email' => 'ddubuc@cstj.qc.ca' ],
    [ 'id' => 70, 'firstName' => 'Estelle', 'name' => 'Erickson', 'email' => 'eerickson@cstj.qc.ca' ],
    [ 'id' => 19, 'firstName' => 'Fiona', 'name' => 'Frappier', 'email' => 'ffrappier@cstj.qc.ca' ],
    [ 'id' => 84, 'firstName' => 'Ginette', 'name' => 'Gaumond', 'email' => 'ggaumond@cstj.qc.ca' ],
    [ 'id' => 26, 'firstName' => 'Henriette', 'name' => 'Hurtubise', 'email' => 'hhurtubise@cstj.qc.ca' ],
    [ 'id' => 63, 'firstName' => 'Ingrid', 'name' => 'Imbeault', 'email' => 'iimbeault@cstj.qc.ca' ],
    [ 'id' => 72, 'firstName' => 'Jeannette', 'name' => 'Jalbert', 'email' => 'jjalbert@cstj.qc.ca' ],
    [ 'id' => 65, 'firstName' => 'Katleen', 'name' => 'King', 'email' => 'kking@cstj.qc.ca' ],
    [ 'id' => 48, 'firstName' => 'Lydia', 'name' => 'Lussier', 'email' => 'llussier@cstj.qc.ca' ],
    [ 'id' => 93, 'firstName' => 'Madeleine', 'name' => 'Meunier', 'email' => 'mmeunier@cstj.qc.ca' ],
    [ 'id' => 52, 'firstName' => 'Nolwenn', 'name' => 'Nantel', 'email' => 'nnantel@cstj.qc.ca' ],
    [ 'id' => 38, 'firstName' => 'Odile', 'name' => 'Ouellet', 'email' => 'oouellet@cstj.qc.ca' ],
    [ 'id' => 14, 'firstName' => 'Pierrette', 'name' => 'Phaneuf', 'email' => 'pphaneuf@cstj.qc.ca' ],
    [ 'id' => 50, 'firstName' => 'Rita', 'name' => 'Robidoux', 'email' => 'rrobidoux@cstj.qc.ca' ],
    [ 'id' => 57, 'firstName' => 'Shirley', 'name' => 'Surprenant', 'email' => 'ssurprenant@cstj.qc.ca' ],
    [ 'id' => 30, 'firstName' => 'Tatiane', 'name' => 'Touchette', 'email' => 'ttouchette@cstj.qc.ca' ],
    [ 'id' => 66, 'firstName' => 'Victoria', 'name' => 'Veilleux', 'email' => 'vveilleux@cstj.qc.ca' ]
];


// Retourne l'utilisateur du tableau donné, portant l'id donnée
// Lance une InvalidArgumentException si id introuvable
function getUserById($users, $id) {
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    throw new InvalidArgumentException();
}



// Retourne une sous-liste du tableau donné contenant les utilsateurs dont le nom
// ou le prénom contiennent le texte donné (non sensible à la casse)
function searchUsers($users, $text) {
    $liste = [];

    foreach ($users as $user) {
        $recherche = strtolower($user['firstName'] . $user['name']);
        if (str_contains($recherche, $text)) {
            $liste[] = $user;
        }
    }

    return $liste;
}




//var_dump($_GET);
// isset retourne vrai si la variable donnée contient une valeur, faux sinon
if (isset($_GET['id'])) {
    try {
        $resultat = getUserById($users, $_GET['id']);
    }
    catch (InvalidArgumentException) {
        // Modifie le statut de la réponse HTTP (404 = Not Found)
        http_response_code(404);
        die();
    }
}
elseif (isset($_GET['search'])) {
    $resultat = searchUsers($users, $_GET['search']);
}
else {
    $resultat = $users;
}


// Modifie l'en-tête de la réponse
// Indique au client qu'on retourne du JSON
header('Content-Type: application/json; charset=utf-8');

// Transforme un tableau associatif en structure json
echo json_encode($resultat);
?>
