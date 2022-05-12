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
    require '../../../controller/book/book-insert.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    $authorManager = new AuthorManager($db);
    $bookManager = new BookManager($db);
    $categoryManager = new CategoryManager($db);
    $editorManager = new EditorManager($db);

?>