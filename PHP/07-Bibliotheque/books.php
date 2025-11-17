<?php
require_once '../PdoWrapper.php';

define('BASE_QUERY', "SELECT `b`.`id`, `b`.`title`, CONCAT(`a`.`first_name`, ' ', `a`.`last_name`) AS `author`, `b`.`year` FROM `books` AS `b` JOIN `book_authors` AS `ba` ON `b`.`id` = `ba`.`book_id` JOIN `authors` AS `a` ON `ba`.`author_id` = `a`.`id`");
define('ORDER_BY', " ORDER BY `b`.`title`");


function process($statement) {
    $books = [];

    foreach ($statement as $row) {
        $id = $row['id'];

        if (!isset($books[ $id ])) {
            $books[ $id ] = [
                'title' => $row['title'],
                'authors' => [],
                'year' => $row['year']
            ];
        }

        $books[ $id ]['authors'][] = $row['author'];
    }

    // AU lieu de retourner un objet, on retourne une liste des valeurs seulement
    return array_values($books);
}

function getAllBooks($pdo) {
    $statement = $pdo->query(BASE_QUERY . ORDER_BY);
    return process($statement);
}


function searchAuthors($pdo, $text) {
    $statement = $pdo->prepare(BASE_QUERY . " WHERE `a`.`first_name` LIKE ? OR `a`.`last_name` LIKE ?" . ORDER_BY);
    $statement->execute([ "%$text%", "%$text%" ]);
    return process($statement);
}

$pdow = new PdoWrapper('library');

if (isset($_GET['author'])) {
    $resultat = searchAuthors($pdow->getPdo(), $_GET['author']);
}
else {
    $resultat = getAllBooks($pdow->getPdo());
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($resultat);
?>
