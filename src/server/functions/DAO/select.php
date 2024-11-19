<?php
require_once __DIR__ . "/../convertertoMessage.php";

/**
 * Retrieves messages from the database and converts them to a JSON format.
 *
 * @param PDO $pdo The PDO instance representing the database connection.
 *
 * @return array An array of Message objects converted to their Business Object (BO) representation.
 */
function getMessages($pdo) {
    $dbname = getenv("MYSQL_DATABASE");

    $query = "SELECT * FROM $dbname.Messages";
    $stmt = $pdo->prepare($query);
    $stmt->execute();


    $json_messages = array_map(
        function ($messages) {
            return jsonToMessage($messages)->to_BoObject();
        },
        $stmt->fetchAll(PDO::FETCH_OBJ)
    );

    return $json_messages;
}
