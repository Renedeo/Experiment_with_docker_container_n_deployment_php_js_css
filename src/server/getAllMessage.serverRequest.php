<?php

require __DIR__ . '/../vendor/autoload.php';
use \ClassName\Database;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    try {
        
        // // Fetch all messages from the database
        require_once "./functions/DAO/select.php";
        $json_messages = getMessages((new Database())->getConnection());

        // Close the database connection
        $conn = null;

        echo json_encode([
            'status' => 'success',
            'message' => 'All messages have been retrieved successfully',
            'data' => $json_messages
        ]);
        return;
    } catch (PDOException $th) {
        echo json_encode(array(
            'success' => false,
            'message' => 'Get All Message: Database connection failed.',
            'error' => $th->getMessage()
        ));    }
} else {
    echo json_encode([
        'error' => 'Invalid request method',
        'message' => 'Only GET requests are allowed',
    ]);
}
