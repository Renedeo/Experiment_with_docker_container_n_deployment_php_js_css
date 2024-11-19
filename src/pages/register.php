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
    <link rel="stylesheet" href="asset/css/dropdown.css">
    <title>PHP - Mes instant</title>
</head>

<body>

    <form action="http://localhost:8000" id="register-form" method="POST">
        <h3>Register</h3>
        <div class="container-input" id="container-username">
            <input type="text" id="register-username" name="username" placeholder="Nom d'utilisateur" required>
            <label for="username">Nom d'utilisateur:</label>
        </div>
        <div class="container" id="password-area">
            <div>
                <label for="information-checkbox">
                    <i class="fas fa-info-circle"></i>
                </label>
                <input type="checkbox" id="information-checkbox" checked>
            </div>

            <div class="container-input" id="container-password">
                <input type="password" id="register-password" name="password" placeholder="Nom d'utilisateur" required>
                <label for="password">Mot de passe:</label>
            </div>
        </div>

        <div id="password-recommendation">
            <p>
                Veuillez entrer un mot de passe qui contient :
            </p>
            <ul id="password-helper">
                <li class="help help-car"><i class="fa fa-user"></i> Au moins 8 caractères</li>
                <li class="help help-upper"><i class="fa fa-arrow-up"></i> Au moins une majuscule</li>
                <li class="help help-lower"><i class="fa fa-arrow-down"></i> Au moins une minuscule</li>
                <li class="help help-number"><i class="fa fa-hashtag"></i> Au moins un chiffre</li>
                <li class="help help-special"><i class="fa fa-asterisk"></i> Au moins un caractère spécial</li>
            </ul>
        </div>


        <input type="submit" name="submitButton" value="S'inscrire">

        <a href="http://localhost:8000">
            <em>
                <u>
                    Déjà un compte ?
                </u>
            </em>
        </a>
        <p id="server-message"></p>
    </form>

    <div id="blob">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="./asset/js/Authentification/register.auth.clientRequest.js"></script>
    <script src="./asset/js/formValidation/validatePassword/help/index.js"></script>
</body>

</html>