<?php

    // Fonction permettant de vérifier si un champ du formulaire n'est pas vide et bien rempli
    function is_valid($str) {
        return isset($_POST[$str]) && !empty($_POST[$str]) && trim($_POST[$str]) !== "";
    }

    // Fonction permttant de vérifier que tout les champs sont valides
    function is_everything_valid_update() {
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

    // Fonction permettant d'update un auteur avec les nouvelles informations fournies. Cette fonction retourne l'id de l'auteur qui vient d'être entré
    function update_author($authorManager, $author) {
        $postAuthor = [
            'id_author' => $author->get_id_author(),
            'name' => $_POST['author-name'],
            'surname' => $_POST['author-surname']
        ];

        $author = new Author();
        $author->hydrate($postAuthor);
        $authorManager->update($author);
    }

    // Fonction permettant d'update un editeur avec les nouvelles informations fournies. Cette fonction retourne l'id de l'editeur qui vient d'être entré
    function update_editor($editorManager, $editor) {
        $postEditor = [
            'id_editor' => $editor->get_id_editor(),
            'label' => $_POST['editor']
        ];

        $editor = new Editor();
        $editor->hydrate($postEditor);
        $editorManager->update($editor);
    }

    // Fonction permettant d'update une categorie avec les nouvelles informations fournies. Cette fonction retourne l'id de la categorie qui vient d'être entrée
    function update_category($categoryManager, $category) {
        $postCategory = [
            'id_category' => $category->get_id_category(),
            'label' => $_POST['category']
        ];

        $category = new Category();
        $category->hydrate($postCategory);
        $categoryManager->update($category);
    }

    // Fonction permettant d'update un livre avec les nouvelles informations fournies.
    function update_book($authorManager, $author, $editorManager, $editor, $categoryManager, $category, $bookManager, $id_book) {
        update_author($authorManager, $author);
        update_editor($editorManager, $editor);
        update_category($categoryManager, $category);

        $postBook = [
            'id_book' => $id_book,
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'nb_pages' => $_POST['nb-page'],
            'nb_octets' => $_POST['nb-octets'],
            'asin' => $_POST['asin'],
            'tome' => $_POST['tome'],
            'language' => $_POST['language'],
            'id_category' => $category->get_id_category(),
            'id_editor' => $editor->get_id_editor(),
            'id_author' => $author->get_id_author()
        ];

        $book = new Book();
        $book->hydrate($postBook);
        $bookManager->update($book);
    }


    function send_data($authorManager, $author, $editorManager, $editor, $categoryManager, $category, $bookManager, $id_book) {
        if (isset($_POST['submit'])) {
            if (is_everything_valid_update()) {
                update_book($authorManager, $author, $editorManager, $editor, $categoryManager, $category, $bookManager, $id_book);             

                header("Location: admin-book-handle.php");
            } else {
                echo 'Problem';
            }
        } 
    }
?>