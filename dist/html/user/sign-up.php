<?php
    require '../../../controller/user/user-sign-up.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Poppins font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!-- Styles sheet -->
    <link rel="stylesheet" href="../../import/import-sign/import.css">
    
    <title>Sign Up</title>
</head>
<body>
    
    <section>

        <img src="../../asset/image/logo.svg" alt="logo">

        <form action="" method="post" name="formulaire" >

            <div class="input-container container-username">
                <label for="username">Username</label>
                <input type="text" id="username" name="pseudo" onkeyup="verifierPseudo(this)">
                <span id="champPseudo" class="test"></span>
            </div>
    
            <div class="input-container container-mail">
                <label for="mail">Email</label>
                <input type="text" id="mail" name="mail"onkeyup="verifierEmail(this)" placeholder="test@test.fr">
                <span id="champMail" class="test"></span>
            </div>

            <div class="input-container container-password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" onkeyup="checkPassword(this)">
                <span id="champMdp" class="test"></span>
            </div>

            <div class="input-container container-check-password">
                <label for="check-password">Confirm password</label>
                <input type="password" id="check-password" name="check-password" onkeyup="verifierMdp2()">
                    <span id="champMdp2" class="test"></span>
            </div>

            <input type="submit" value="Sign Up" id="sign" name="submit">

        </form>

        <a href="sign-in.php">
            Sign In
        </a>

        <?php
            sign_up($db);
        ?>

    </section>

    <script type="text/javascript" src="../../javascript/script.js"></script>
</body>
</html>