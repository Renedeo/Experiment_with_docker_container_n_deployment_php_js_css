<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
use \ClassName\Database;

if (isset($_POST['username'])) {
    $loginUsr = $_POST['username'];

    if (isset($_POST['password'])) {
        $loginPswd = $_POST['password'];
        // Check if the username and password are not empty
        if (!empty($loginUsr) && !empty($loginPswd)) {
            
            // Validate the username and password
            try {
                require_once __DIR__  . "/../functions/DAO/findone.php";

                $user = findOne($loginUsr, (new Database())->getConnection());

                if ($user) {
                    // if ($user->userPassword == $loginPswd) {
                    if ($user->checkPassword($loginPswd)) {
                        $_SESSION["login"] = true;
                        $_SESSION["username"] = $user->userName;
                        $_SESSION["user_id"] = $user->user_id;
                        
                        echo json_encode(
                            [
                                'success' => true,
                                'message' => 'Login successful.',
                                'session' => $_SESSION
                            ]
                        );
                    }
                    else{
                        echo json_encode(
                            array(
                                'success' => false,
                                'message' => 'Incorrect password.',
                            )
                        );
                    }
                } else {
                    echo json_encode(
                        array(
                            'success' => false,
                            'message' => 'User not found.',
                        )
                    );
                }
            } catch (\Throwable $th) {
                echo json_encode(array(
                    'success' => false,
                    'message' => 'Login: Database connection failed.',
                    'error' => $th->getMessage()
                ));
            }
        } else {
            // Display an error message if the username or password is empty
            echo json_encode(
                array(
                    'success' => false,
                    'message' => 'Username and password are required.',
                )
            );
        }
    }
} else {
    echo json_encode(
        array(
            'success' => false,
            'message' => 'Password is required.',
        )
    );
}
