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
    require "../../../controller/book/book-update.php";

    session_start();

    // Si l'utilisateur n'est pas correctement connecté, on le redirige automatiquement vers la page de connexion
    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    // On déclare l'id du livre que l'on va récupérer via le href de la liste des livres d'une catégorie
    $id_book = null;  

    // Si l'id du livre est correcte on le récupère et on le stocke dans notre variable, sinon on affiche un message de problème 
    if (isset($_GET['id_book']) && !empty($_GET['id_book']) && is_numeric($_GET['id_book'])) {
        $id_book = $_GET['id_book'];      
    } else {
        echo 'Problem';
    }

    // Récupération d'un livre grâce à l'id de celui ci
    $bookManager = new BookManager($db);
    $book = $bookManager->get($id_book);

     // Récupération de l'auteur d'un livre grâce à l'id du livre
    $authorManager = new AuthorManager($db);
    $author = $authorManager->get($id_book); 

    // Récupération de l'éditeur d'un livre grâce à l'id du livre
    $editorManager = new EditorManager($db);
    $editor = $editorManager->get($book->get_id_editor()); 

    // Récupération de la catégorie d'un livre grâce à l'id du livre
    $categoryManager = new CategoryManager($db);
    $category = $categoryManager->get($book->get_id_category()); 

    // Champ permettant un pré affichage de chacun des champs
    $categoryLabel = $category->get_label();
    $categoryId = $category->get_id_category();

    $editorLabel = $editor->get_label();

    $authorName = $author->get_name();
    $authorSurname = $author->get_surname();

    $bookTitle = $book->get_title();
    $bookDescription = $book->get_description();
    $bookAsin = $book->get_asin();
    $bookTome = ($book->get_tome() == "None") ? NULL : $book->get_tome();
    $bookLanguage = $book->get_language();
    $bookNbPages = $book->get_nb_pages();
    $bookNbOctets = $book->get_nb_octets();

?>