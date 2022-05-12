<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/category-manager.php';
    require '../../../modele/object/category.php';
    require '../../../modele/db/book-manager.php';
    require '../../../modele/object/book.php';
    require '../../../modele/db/author-manager.php';
    require '../../../modele/object/author.php';
    require '../../../modele/db/editor-manager.php';
    require '../../../modele/object/editor.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    // Récupération d'un livre grace à l'id de celui ci
    $bookManager = new BookManager($db);
    $books = $bookManager->get_all();

    $authorManager = new AuthorManager($db);

    $editorManager = new EditorManager($db);

    $categoryManager = new CategoryManager($db);

?>