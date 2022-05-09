<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/categoryManager.php';
    require '../../modele/object/category.php';
    require '../../modele/db/bookManager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/writtenByManager.php';
    require '../../modele/object/writtenBy.php';
    require '../../modele/db/downloadManager.php';
    require '../../modele/object/download.php';
    require '../../modele/db/authorManager.php';
    require '../../modele/object/author.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: sign-in.php');
    }
    
    $userPseudo = $_SESSION['pseudo'];
    $userId = $_SESSION['id_user'];

    $bookManager = new BookManager($db);

    $writtenByManager = new WrittenByManager($db);
    $downloadManager = new DownloadManager($db);
    $downloads = $downloadManager->get($userId);

    $authorManager = new AuthorManager($db);
    $author = new Author();

    

?>