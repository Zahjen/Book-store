<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/bookManager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/writtenByManager.php';
    require '../../modele/object/writtenBy.php';
    require '../../modele/db/authorManager.php';
    require '../../modele/object/author.php';

    session_start();

    $userPseudo = $_SESSION['pseudo'];

    // Récupération des derniers livres ajoutés
    $bookManager = new BookManager($db);
    $books = $bookManager->get_latest();

    $writtenByManager = new WrittenByManager($db);

    $authorManager = new AuthorManager($db);
    $author = new Author();

?>