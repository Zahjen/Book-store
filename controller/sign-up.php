<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/userManager.php';
    require '../../modele/object/user.php';
    
    session_start();

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

    function signUp($db) {
        $userManager = new UserManager($db);

        if (isset($_POST['submit']) && is_everything_valid()) {
            if ($_POST['password'] == $_POST['check-password']) {
                $postUser = [
                    'pseudo' => $_POST['pseudo'],
                    'mail' => $_POST['mail'],
                    'password' => $_POST['password']
                ];

                // Création du nouvel utilisateur
                $user = new User();
                $user->hydrate($postUser);
                $userManager->insert($user);

                $lastInsertedUserId = $db->lastInsertId();

                // On stocke les données de l'utilisateur
                $_SESSION['id_user'] = $lastInsertedUserId;
                $_SESSION['mail'] = $user->get_mail();
                $_SESSION['pseudo'] = $user->get_pseudo();

                header("Location: home.php");
            } else {
                echo 'Password are not the same';
            }
        }
    }

?>