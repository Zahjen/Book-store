<?php
    require '../../modele/db/connection.php';
    require '../../modele/db/userManager.php';
    require '../../modele/object/user.php';

    session_start();
    
    $userManager = new userManager($db);
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
    <link rel="stylesheet" href="../import/import-sign/import.css">
    
    <title>Sign In</title>
</head>
<body>
    
    <section>

        <img src="../asset/image/logo.svg" alt="logo">

        <form action="" method="post">
    
            <div class="input-container container-mail">
                <label for="mail">Email</label>
                <input type="text" id="mail" name="mail">
            </div>

            <div class="input-container container-password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <input type="submit" name="submit" value="Sign In" id="sign">

        </form>

        <a href="sign-up.php">
            Sign Up
        </a>

        <?php
            if (isset($_POST['submit']) && isset($_POST['mail'])) {
                $user = $userManager->login($_POST['mail']);

                if (!$user) {
                    echo "Entered address does not exist.";
                } else {
                    if ($user && $user->get_password() == $_POST['password']) {
                        $_SESSION['id_user'] = $user->get_id_user();
                        $_SESSION['mail'] = $user->get_mail();
                        $_SESSION['pseudo'] = $user->get_pseudo();
                        header('Location: home.php');
                    } else {
                        echo "Wrong password.";
                    }
                }
            }
        ?>

    </section>


</body>
</html>