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
    require '../../modele/db/editorManager.php';
    require '../../modele/object/editor.php';

    // On déclare l'id du livre que l'on va récupérer via le href de la liste des livres d'une catégorie
    $id_book = null;  

    // Si l'id du livre est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_book']) && !empty($_GET['id_book']) && is_numeric($_GET['id_book'])) {
        $id_book = $_GET['id_book'];      
    } else {
        echo 'Problem';
    }

    session_start();

    // Récupération d'un livre grace à l'id de celui ci
    $bookManager = new BookManager($db);
    $book = $bookManager->get($id_book);

    // Récupération des id des auteurs d'un livres grace à son id
    $writtenByManager = new WrittenByManager($db);
    $writtenBys = $writtenByManager->get($id_book);

    $authorManager = new AuthorManager($db);
    $author = new Author(); 

    // Récupération de l'éditeur d'un livre grace à l'id du livre
    $editorManager = new EditorManager($db);
    $editor = $editorManager->get($book->get_id_editor()); 

    // Récupération de la catégorie d'un livre grace à l'id du livre
    $categoryManager = new CategoryManager($db);
    $category = $categoryManager->get($book->get_id_category()); 

    // Variales utiles dans la page HTML
    $categoryLabel = $category->get_label();
    $categoryId = $category->get_id_category();

    $editorLabel = $editor->get_label();

    $bookTitle = $book->get_title();
    $bookDescription = $book->get_description();
    $bookNbEdition = $book->get_nb_edition();
    $bookDate = $book->get_date();
    $bookAsin = $book->get_asin();
    $bookTome = ($book->get_tome() == NULL) ? "None" : $book->get_tome();
    $bookLanguage = $book->get_language();
    $bookNbPages = $book->get_nb_pages();
    $bookNbOctets = $book->get_nb_octets();

?>