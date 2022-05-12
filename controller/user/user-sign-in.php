<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/user-manager.php';
    require '../../../modele/object/user.php';

    session_start();

    function signIn($db) {
        $userManager = new userManager($db);

        if (isset($_POST['submit']) && isset($_POST['mail'])) {
            $user = $userManager->login($_POST['mail']);

            if (!$user) {
                echo "Entered address does not exist.";
            } else {
                if ($user && password_verify($_POST['password'], $user->get_password())) {
                    // On stocke les informations de l'utilisateur
                    $_SESSION['id_user'] = $user->get_id_user();
                    $_SESSION['mail'] = $user->get_mail();
                    $_SESSION['pseudo'] = $user->get_pseudo();
                    
                    // Selon si on est un admin ou non on sera redirigé vers la page correspondant à notre statut
                    if ($user->get_is_admin()) {
                        header('Location: ../admin/admin-user-handle.php');
                    } else {
                        header('Location: home.php');
                    }
                } else {
                    echo "Wrong password.";
                }
            }
        }
    }

?>