<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/userManager.php';
    require '../../../modele/object/user.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: sign-in.php');
    }

    $userManager = new UserManager($db);
    $users = $userManager->get_all();

?>