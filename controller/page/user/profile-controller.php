<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/user-manager.php';
    require '../../../modele/object/user.php';
    require '../../../controller/user/user-update.php';

    session_start();

    // Si l'utilisateur n'est pas correctement connecté, on le redirige automatiquement vers la page de connexion
    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    // Récupération de l'id de l'utilisateur actuellement connecté
    $userId = (int) $_SESSION['id_user'];

    $userManager = new UserManager($db);

    // Création d'un utilisateur avec les informations de la session
    $user = $userManager->get($userId);

    // Champ permettant un pré affichage de chacun des champs
    $userMail = $user->get_mail();
    $userPseudo = $user->get_pseudo();

?>