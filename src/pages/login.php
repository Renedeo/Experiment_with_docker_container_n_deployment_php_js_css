<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Mes instant</title>
    <link rel="stylesheet" href="asset/css/input.css">
    <link rel="stylesheet" href="asset/css/general.css">
    <link rel="stylesheet" href="asset/css/form.css"> 
    <link rel="stylesheet" href="asset/css/blob.css"> 
</head>

<body>

    <?php
    if (session_status() === PHP_SESSION_ACTIVE) {
        echo "Session is active on login page.";
        $_SESSION["activePage"] = "login";
    } else {
        echo "Session is not active.";
    }
    ?>
    <form action="/" id="login-form" method="post">
        <h3> Connexion </h3>
        <div class="container-input" id="container-username">
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur:" required>
            <label for="username">Nom d'utilisateur:</label>
        </div>
        <div class="container container-input" id="container-password">
            <input type="password" id="password" name="password" placeholder="Mot de passe:" required>
            <label for="password">Mot de passe:</label>
        </div>
        <!-- <button type="submit" name="submitButton">Connexion</button> -->
        <input type="submit" name="submitButton" value="Connexion">
        <a href="?phase=register"><em><u>Créer un compte</u></em></a>
        <p id="server-message"></p>
    </form>
    <div id="blob">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="./asset/js/Authentification/isUser.auth.clientRequest.js"></script>
</body>

</html>