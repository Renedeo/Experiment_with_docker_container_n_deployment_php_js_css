<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use ClassName\Messages;
// header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required fields are sent
    if (!empty($_POST['message'])) {
        // Save the message to the database
        $message = $_POST['message'];

        try {

            require_once __DIR__ . "/functions/DAO/insert.php";
            $messageToSave = new Messages(
                NULL,
                $_SESSION["user_id"], // default
                $message,
                NULL
            );
            var_dump($messageToSave);
            insertMessage($messageToSave, $messageToSave->getConnection());

            $currentDateTime = new DateTime();
            echo json_encode([
                'status' => 'success',
                'message' => 'Message saved successfully',
                'data' => [
                    'user_id' => $messageToSave->user_id,
                    'content' => $messageToSave->content,
                    'created_at' => $currentDateTime->format('Y-m-d H:i:s')
                ]
            ]);

        } catch (PDOException $e) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Message Sent: Database connection failed.',
                'error' => $th->getMessage()
            ));
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No message provided'
        ]);
    }
} else {
    echo json_encode([
        'error' => 'Invalid request method',
        'message' => 'Only POST requests are allowed'
    ]);
}
?>
