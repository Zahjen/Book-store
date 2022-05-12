<?php

    require '../../modele/db/connection.php';
    require '../../modele/object/user.php';
    require '../../modele/db/user-manager.php';
    require '../../modele/object/download.php';
    require '../../modele/db/download-manager.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../dist/html/user/sign-in.php');
    }

    // On déclare l'id de l'utiliateur que l'on va récupérer via le href de la liste des utiliateurs d'une catégorie
    $id_user = null;  

    // Si l'id de l'utiliateur est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_user']) && !empty($_GET['id_user']) && is_numeric($_GET['id_user'])) {
        $id_user = $_GET['id_user'];      
    } else {
        echo 'Problem';
    }

    $userManager = new UserManager($db);
    $user = $userManager->get($id_user);

    $downloadManager = new DownloadManager($db);
    $downloads = $downloadManager->get($id_user);

    foreach($downloads as $download) {
        $downloadManager->delete($download);
    }

    $userManager->delete($user);

    header('Location: ../../dist/html/admin/admin-user-handle.php');
    
    exit;

?>