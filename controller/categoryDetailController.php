<?php

    require '../../modele/db/connection.php';
    require '../../modele/db/categoryManager.php';
    require '../../modele/object/category.php';
    require '../../modele/db/bookManager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/writtenByManager.php';
    require '../../modele/object/writtenBy.php';
    require '../../modele/db/authorManager.php';
    require '../../modele/object/author.php';

    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: sign-in.php');
    }

    // On déclare l'id de la catégorie que l'on va récupérer via le href de la liste des catégorie
    $id_category = null;  

    // Si l'id de la catégorie est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_category']) && !empty($_GET['id_category']) && is_numeric($_GET['id_category'])) {
        $id_category = $_GET['id_category'];      
    } else {
        echo 'Problem';
    }

    // On récupère tout les livres liés à une catégorie 
    $bookManager = new BookManager($db);
    $books = $bookManager->get_book_by_id_category($id_category);

    $writtenByManager = new WrittenByManager($db);

    $authorManager = new AuthorManager($db);
    $author = new Author();

    $categoryManager = new CategoryManager($db);
    $category = $categoryManager->get($id_category);

    // Variales utiles dans la page HTML
    $categoryLabel = $category->get_label();

?>