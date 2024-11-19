<?php
namespace ClassName;
use \ClassName\Database;

require __DIR__ . '/../../vendor/autoload.php';

// require_once(__DIR__ . "/../mySQLdatabase/database_credentials.php");
require_once(__DIR__ . "/../functions/DAO/findOne.php");           

class Messages extends \ClassName\Database
{
    public $message_id;
    public $user_id;
    public $content;
    public $created_at;

    // Constructor to initialize the properties
    public function __construct($id, $user_id, $message, $created_at) {
        parent::__construct();
        $this->message_id = $id;
        $this->user_id = $user_id;
        $this->content = $message;
        // Convert created_at to DateTime object
        $this->created_at = $created_at ? new \DateTime($created_at) : new \DateTime();
    }

    /**
     * Convert the message to JSON format
     */
    public function to_BoObject() {
        
        try {
        
            $userName = findOnebyID($this->user_id, $this->getConnection());
            
            return json_encode(array(
                'id' => $this->message_id,
                'user_id' => $this->user_id,
                'userName' => $userName ?? "unknown", 
                'content' => $this->content,
                'created_at' => $this->created_at->format('Y-m-d H:i:s')
            ));
        }
        catch (\PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    // Method to update the message
    public function updateMessage($new_message) {
        $this->content = $new_message;
    }
}

// $test = new Messages( 1, 1, NULL, NULL);
// var_dump($test->to_BoObject());

