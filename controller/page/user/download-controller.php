<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/category-manager.php';
    require '../../../modele/object/category.php';
    require '../../../modele/db/book-manager.php';
    require '../../../modele/object/book.php';
    require '../../../modele/db/download-manager.php';
    require '../../../modele/object/download.php';
    require '../../../modele/db/author-manager.php';
    require '../../../modele/object/author.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }
    
    $userPseudo = $_SESSION['pseudo'];
    $userId = $_SESSION['id_user'];

    $bookManager = new BookManager($db);
    
    $downloadManager = new DownloadManager($db);
    $downloads = $downloadManager->get($userId);

    $authorManager = new AuthorManager($db);
    $author = new Author();

    

    $userPseudo = $_SESSION['pseudo'];
    $userId = $_SESSION['id_user'];

?>