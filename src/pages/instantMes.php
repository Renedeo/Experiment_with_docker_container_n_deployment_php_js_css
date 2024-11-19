<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="asset/css/general.css">
    <link rel="stylesheet" href="asset/css/input.css">
    <link rel="stylesheet" href="asset/css/messageApp/message-app.css">
    <link rel="stylesheet" href="asset/css/messageApp/message-app-menu.css">
    <title>PHP - Mes instant</title>
</head>

<body>
    <div id="menu">
        <form method="post">
            <input id="signOutButton" type="submit" value="Sign-out" name="event">
        </form>
        <div id="menu-option">
            <ul>
                <li><a href="?event=update"><i class="fa fa-user"></i></a></li>
            </ul>
        </div>
    </div>

    <div id="message-app">
        <h3>Instant Messaging</h3>
        
        <div id="messages-container">
            <!-- Messages go here -->
        </div>
        
        <div id=message-footer>
            <div class="container-input">
                <textarea id="message-input" placeholder="Type your message..."></textarea>
                <label for="message-input">Type your messages...</label>
            </div>
            <input id="sendButton" type="button" value="Send" name="event">
        </div>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="asset/js/send.clientRequest.js"></script>
    <script type="module" src="asset/js/display.clientRequest.js"></script>
    <script type="module" src="asset/js/isNewMessage.clientRequest.method1.js"></script>
</body>

</html>