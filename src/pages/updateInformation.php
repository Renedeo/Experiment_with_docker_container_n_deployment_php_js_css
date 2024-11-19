<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="asset/css/input.css">
    <link rel="stylesheet" href="asset/css/general.css">
    <link rel="stylesheet" href="asset/css/form.css">
    <link rel="stylesheet" href="asset/css/blob.css">
    <link rel="stylesheet" href="asset/css/update.css">
    <title>PHP - Mes instant</title>
</head>

<body>

    <form action="http://localhost:8000" id="register-form" method="POST">
        <h3>Personal Information</h3>
        <div class="container-input" id="container-username">
            <input
                type="text"
                id="register-username"
                name="username"
                placeholder="Nom d'utilisateur"
                value="<?php echo $_SESSION['username']; ?>"
                required>

            <label for="username">Nom d'utilisateur:</label>
        </div>


        <input type="submit" name="submitButton" value="Update">
    </form>

    <div id="blob">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="./asset/js/Authentification/register.auth.clientRequest.js"></script>
    <script src="./asset/js/formValidation/validatePassword/help/index.js"></script>
</body>

</html>