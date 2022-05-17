<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/category-manager.php';
    require '../../modele/object/category.php';
    require '../../modele/db/book-manager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/author-manager.php';
    require '../../modele/object/author.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../dist/html/user/sign-in.php');
    }

    header('Content-Type: application/json');

    // On récupère tout les livres liés à une catégorie 
    $bookManager = new BookManager($db);
    $books = $bookManager->get_by_search($_GET['statement']);


    echo json_encode($books, JSON_FORCE_OBJECT);

    exit;

?>