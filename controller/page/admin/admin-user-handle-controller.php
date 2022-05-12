<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/user-manager.php';
    require '../../../modele/object/user.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    $userManager = new UserManager($db);
    $users = $userManager->get_all();

?>