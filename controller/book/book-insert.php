<?php

    // Fonction permettant de vérifier si un champ du formulaire n'est pas vide et bien rempli
    function is_valid($str) {
        return isset($_POST[$str]) && !empty($_POST[$str]) && trim($_POST[$str]) !== "";
    }

    function is_everything_valid_insert() {
        return (
            is_valid('title') &&
            is_valid('description') &&
            is_valid('author-name') &&
            is_valid('author-surname') &&
            is_valid('editor') &&
            is_valid('language') &&
            is_valid('asin') &&
            is_valid('category') &&
            is_valid('nb-page') &&
            is_valid('nb-octets')
        );
    }

    // Fonction permettant d'insert un auteur avec les nouvelles informations fournies. Cette fonction retourne l'id de l'auteur qui vient d'être entré
    function insert_author($authorManager) {
        $postAuthor = [
            'name' => $_POST['author-name'],
            'surname' => $_POST['author-surname']
        ];

        $author = new Author();
        $author->hydrate($postAuthor);
        $authorManager->insert($author);
    }

    // Fonction permettant d'insert un editeur avec les nouvelles informations fournies. Cette fonction retourne l'id de l'editeur qui vient d'être entré
    function insert_editor($editorManager) {
        $postEditor = [
            'label' => $_POST['editor']
        ];

        $editor = new Editor();
        $editor->hydrate($postEditor);
        $editorManager->insert($editor);
    }

    // Fonction permettant d'insert une categorie avec les nouvelles informations fournies. Cette fonction retourne l'id de la categorie qui vient d'être entrée
    function insert_category($categoryManager) {
        $postCategory = [
            'label' => $_POST['category']
        ];

        $category = new Category();
        $category->hydrate($postCategory);
        $categoryManager->insert($category);
    }

    // Fonction permettant d'insert un livre avec les nouvelles informations fournies.
    function insert_book($authorManager, $editorManager, $categoryManager, $bookManager, $db) {
        insert_author($authorManager, $db);
        $lastInsertedAuthorId = $db->lastInsertId();

        insert_editor($editorManager, $db);
        $lastInsertedEditorId = $db->lastInsertId();
        
        insert_category($categoryManager, $db);
        $lastInsertedCategoryId = $db->lastInsertId();

        $postBook = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'nb_pages' => $_POST['nb-page'],
            'nb_octets' => $_POST['nb-octets'],
            'asin' => $_POST['asin'],
            'tome' => $_POST['tome'],
            'language' => $_POST['language'],
            'id_category' => $lastInsertedCategoryId,
            'id_editor' => $lastInsertedEditorId,
            'id_author' => $lastInsertedAuthorId
        ];

        $book = new Book();
        $book->hydrate($postBook);
        $bookManager->insert($book);
    }


    function send_data($authorManager, $editorManager, $categoryManager, $bookManager, $db) {
        if (isset($_POST['submit'])) {
            if (is_everything_valid_insert()) {
                insert_book($authorManager, $editorManager, $categoryManager, $bookManager, $db);             

                header("Location: admin-book-handle.php");
            } else {
                echo 'Problem';
            }
        } 
    }
?>