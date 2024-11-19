<?php
require __DIR__ . '/../../vendor/autoload.php';

use \ClassName\Database;
use \ClassName\User;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $registerUsername = $_POST['username'];
        $registerPassword = $_POST['password'];
        
        try {

            require_once __DIR__ . '/../functions/DAO/findone.php';
            $user = findone($registerUsername, (new Database())->getConnection());

            if ($user) {
                echo json_encode(array(
                    'success' => false,
                    'message' => 'Username already exists.'
                ));
            } else {
                
                try {
                    $userToSave = new User(NULL, $registerUsername, $registerPassword);
                    $userToSave->cryptPassword();

                    
                    require_once __DIR__ . '/../functions/DAO/insert.php';
                    insertUser($userToSave, $userToSave->getConnection());

                    echo json_encode(array(
                        'success' => true,
                        'message' => 'User registered successfully.'
                    ));
                } catch (\Throwable $th) {
                    echo json_encode(array(
                        'success' => false,
                        'message' => 'Register: User registration failed',
                        'error' => $th->getMessage()
                    ));
                } finally {
                    $conn = null;
                }
            }
        } catch (\Throwable $th) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Database connection failed.',
                'error' => $th->getMessage()
            ));
        }
    } else {
        echo json_encode(array(
            'success' => false,
            'message' => 'Username and password are required.'
        ));
    }
}
