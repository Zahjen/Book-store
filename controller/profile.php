<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/userManager.php';
    require '../../modele/object/user.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: sign-in.php');
    }

    $userId = (int) $_SESSION['id_user'];

    $userManager = new UserManager($db);

    $user = $userManager->get($userId);

    $userMail = $user->get_mail();
    $userPseudo = $user->get_pseudo();

    function is_valid($str) {
        return isset($_POST[$str]) && !empty($_POST[$str]) && trim($_POST[$str]) !== "";
    }

    function is_everything_valid() {
        return (
            is_valid('pseudo') &&
            is_valid('mail') &&
            is_valid('password') &&
            is_valid('check-password')
        );
    }

    function update($userManager, $userId) {
        if (isset($_POST['submit']) && is_everything_valid()) {
            if ($_POST['password'] == $_POST['check-password']) {
                $postUser = [
                    'id_user' => $userId,
                    'pseudo' => $_POST['pseudo'],
                    'mail' => $_POST['mail'],
                    'password' => $_POST['password'],
                    'is_admin' => 0
                ];

                // Update de l'utilisateur 
                $user = new User();
                $user->hydrate($postUser);
                $userManager->update($user);

                header("Location: home.php");
            } else {
                echo 'Password are not the same';
            }
        }
    }

?>