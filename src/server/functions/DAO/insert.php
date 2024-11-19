<?php

/**
 * Save the message into the database
 *
 * @param Messages $messageToSave
 * @param PDO $conn
 * @return string|false If a sequence name was not specified for the name parameter, 
 * PDO::lastInsertId returns a string representing the row ID of the last row that was inserted into the database.
 *
 *  If a sequence name was specified for the name parameter, 
 * PDO::lastInsertId returns a string representing the last value retrieved from the specified sequence object.
 */
function insertMessage($messageToSave, $conn)
{
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO Messages (content, user_id) VALUES (:message, :user_id)");

    // Bind the parameters
    $stmt->bindParam(':user_id', $messageToSave->user_id, pdo::PARAM_INT);
    $stmt->bindParam(':message', $messageToSave->content, pdo::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Return the last inserted ID
    return $conn->lastInsertId();
}


/**
 * Insert the user information into the database
 *
 * @param PDO $conn
 * @param User $userToSave
 * @return string|false
 *  If a sequence name was not specified for the name parameter, 
 * PDO::lastInsertId returns a string representing the row ID of the last row that was inserted into the database.
 *
 *  If a sequence name was specified for the name parameter, 
 * PDO::lastInsertId returns a string representing the last value retrieved from the specified sequence object.
 */
function insertUser($userToSave, $conn)
{
    $stmt = $conn->prepare("INSERT INTO credentials (userName, userPswd) VALUES (:username, :password)");
    $stmt->bindParam(':username', $userToSave->userName, pdo::PARAM_STR);
    $stmt->bindParam(':password', $userToSave->userPassword, pdo::PARAM_STR);
    $stmt->execute();
    return $conn->lastInsertId();
}
