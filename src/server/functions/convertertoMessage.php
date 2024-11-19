<?php

// require_once "../models/messages_models.php";
require __DIR__ . '/../../vendor/autoload.php';

use ClassName\Messages;

/**
 * Convert data collection to Message objects
 * 
 * @param any $data data collection
 * @return Messages Message object
 */
function jsonToMessage($data)
{
    return new Messages(
        $data->message_id ?? "no messageID",
        $data->user_id ?? "no user_id",
        $data->content ?? "no content",
        $data->created_at ?? "no created_at date",
    );
}
