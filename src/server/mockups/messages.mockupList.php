<?php

require __DIR__ . "/../models/messages.models.php";


// Mock data
$_messages = [
    new Messages(
        1,
        1,
        "Hello, World!",
        "2022-01-01 12:00:00"
    ),
    new Messages(
        2,
        1,
        "This is a test message!",
        "2022-01-02 13:00:00"
    ),
    new Messages(
        3,
        2,
        "Another test message.",
        "2022-01-03 14:00:00"
    ),
    new Messages(
        4,
        2,
        "Last message.",
        "2022-01-04 15:00:00"
    )
];
