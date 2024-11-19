<?php
require __DIR__ . '/../../vendor/autoload.php';

use ClassName\User;

/**
 * Convert data collection to User objects
 *
 * @param any $data data collection
 * @return User User object
 */
function jsonToUser($data) {
    return new User(
        $data->user_id ?? "no user_id", 
        $data->userName ?? "Unknown", 
        $data->userPswd ?? "no password retrieved",);
}