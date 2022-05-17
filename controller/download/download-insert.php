<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/download-manager.php';
    require '../../modele/object/download.php';

    session_start();

    // On déclare l'id du livre que l'on va récupérer via le href du détail du livre 
    $id_book = null;  

    // Si l'id du livre est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_book']) && !empty($_GET['id_book']) && is_numeric($_GET['id_book'])) {
        $id_book = $_GET['id_book'];      
    } else {
        echo 'Problem';
    }


    $id_user = $_SESSION['id_user'];

    $postDownload = [
        'id_user' => $id_user,
        'id_book' => $id_book
    ];

    $downloadManager = new DownloadManager($db);
    $download = new Download();
    $download->hydrate($postDownload);

    if ($downloadManager->exists($download)) {
        echo 'You already downloaded this book.';
    } else {
        $downloadManager->insert($download);
    }

    header('Location: ../../dist/html/user/download.php');

?>