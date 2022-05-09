<?php

    require '../../db/connection.php';
    require '../../object/user.php';
    require '../../db/userManager.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/sign-in.php');
    }

    // On déclare l'id du livre que l'on va récupérer via le href de la liste des livres d'une catégorie
    $id_user = null;  

    // Si l'id du livre est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_user']) && !empty($_GET['id_user']) && is_numeric($_GET['id_user'])) {
        $id_user = $_GET['id_user'];      
    } else {
        echo 'Problem';
    }

    $userManager = new UserManager($db);
    $user = $userManager->get($id_user);

    $userManager->delete($user);

    header('Location: ../../../dist/html/admin/admin-user-handle.php');
    
    exit;

?>