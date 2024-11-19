<?php
namespace ClassName;
use \ClassName\Database;
require __DIR__ . '/../../vendor/autoload.php';

class User extends \ClassName\Database 
{
    public $user_id;
    public $userName;
    public $userPassword;

    // Constructor to initialize the properties
    public function __construct($id, $name, $password) {
        parent::__construct();  // Call the parent constructor to establish a connection to the database
        $this->user_id = $id;
        $this->userName = $name;
        $this->userPassword = $password;
        // $this->userPassword = $this->cryptPassword($password);  // Use cryptPassword method to hash the password
    }

    // Mthod to crypt the password
    public function cryptPassword() {
        $this->userPassword = password_hash($this->userPassword, PASSWORD_BCRYPT);
    }

    // Method to check if password matches the stored password
    public function checkPassword($password) {
        return password_verify($password, $this->userPassword);
    }
    // Method to generate a unique token for the user
    public function generateToken() {
        return bin2hex(random_bytes(32));
    }
    // Method to update the password
    public function updatePassword($newPassword) {
        $this->userPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    }
}
