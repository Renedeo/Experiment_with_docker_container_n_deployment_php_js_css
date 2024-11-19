<?php
require_once __DIR__ . "/../convertToUser.php";

/**
 * This function retrieves a single user from the database based on the provided username.
 *
 * @param string $username The username of the user to be retrieved.
 * @param PDO $pdo The PDO instance representing the database connection.
 *
 * @return User|null The retrieved user object, or null if no user was found.
 */
function findone($username, $pdo) {
    $query = "SELECT * FROM " . getenv("MYSQL_DATABASE") . ".credentials WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    return $user ? jsonToUser($user) : null;
}



/**
 * This function retrieves a single user from the database based on the provided user_id
 *
 * @param number $user_id The user_id of the user to retrieve.
 * @param PDO $pdo The PDO instance representing the database connection.
 * 
 * @return User|null The retrieved user object, or null if no user was found.
 */
function findOnebyID($user_id, $pdo){
    $query = "SELECT userName FROM ".getenv("MYSQL_DATABASE").".credentials WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    // var_dump($user);
    // var_dump(jsonToUser($user));
    return $user ? jsonToUser($user)->userName : null;
}
