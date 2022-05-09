<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/categoryManager.php';
    require '../../../modele/object/category.php';
    require '../../../modele/db/bookManager.php';
    require '../../../modele/object/book.php';
    require '../../../modele/db/writtenByManager.php';
    require '../../../modele/object/writtenBy.php';
    require '../../../modele/db/authorManager.php';
    require '../../../modele/object/author.php';
    require '../../../modele/db/editorManager.php';
    require '../../../modele/object/editor.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: sign-in.php');
    }

    $authorManager = new AuthorManager($db);
    $bookManager = new BookManager($db);
    $categoryManager = new CategoryManager($db);
    $editorManager = new EditorManager($db);
    $writtenByManager = new WrittenByManager($db);

?>