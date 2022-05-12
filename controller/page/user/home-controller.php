<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/book-manager.php';
    require '../../../modele/object/book.php';
    require '../../../modele/db/author-manager.php';
    require '../../../modele/object/author.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    $userPseudo = $_SESSION['pseudo'];

    // Récupération des derniers livres ajoutés
    $bookManager = new BookManager($db);
    $books = $bookManager->get_latest();

    $authorManager = new AuthorManager($db);
    $author = new Author();

?>