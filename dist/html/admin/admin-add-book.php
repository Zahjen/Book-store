<?php
    ob_start();
    require '../../../controller/admin-add-book.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Poppins font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!-- Material Icon -->
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Styles sheet -->
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../../import/import-admin-add-book/import.css">
    
    <title>Sign Up</title>
</head>
<body>

    <nav class="nav"> 
        <!-- Burger menu relate to mobile version -->
        <input type="checkbox" id="nav-checkbox">
        <label for="nav-checkbox" class="nav-button">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </label>

        <!-- Nav bar -->
        <div class="nav-bar-container">
            <a href="" class="logo">
                <img src="../../asset/image/logo.svg" alt="logo">
            </a>        

            <!-- Navigation link -->
            <div class="nav-links">
                <a href="admin-user-handle.php" class="part-link-page">
                    User Handle
                </a>
                <a href="admin-book-handle.php" class="part-link-page">
                    Book Handle
                </a>
                <a href="admin-add-book.php" class="part-link-page active">
                    Add Book
                </a>

                <a href="../logout.php" class="log-out">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <span class="log-out-text">
                        Logout
                    </span>
                </a>
            </div>

            <div class="ghost"></div>
        </div> 
    </nav>
    
    <section class="section-global">

        <article>
            <div id="book-add-container">
                <img src="../../asset/image/logo-min.svg" alt="logo-min" id="book-add-img">
                <div id="book-add-text">
                    <span class="book-add-word">Add</span> 
                    <span class="book-add-word">Book</span>
                </div>
            </div>

            <h1 class="title">Add Book</h1>

            <form action="" method="post">

                <div class="input-container container-title">
                    <label for="title">Title <span class="madatory-field">*</span></label>
                    <input type="text" id="title" name="title">
                </div>
        
                <div class="input-container container-description">
                    <label for="description">Description <span class="madatory-field">*</span></label>
                    <input type="text" id="description" name="description">
                </div>

                <div class="input-container container-author">
                    <label>Author(s) <span class="madatory-field">*</span></label>
                    <input type="text" class="author-name" name="author-name">
                    <input type="text" class="author-surname" name="author-surname">
                </div>


                <div class="input-container container-editor">
                    <label for="editor">Editor <span class="madatory-field">*</span></label>
                    <input type="text" id="editor" name="editor">
                </div>

                <div class="input-container container-language">
                    <label for="language">Language <span class="madatory-field">*</span></label>
                    <input type="text" id="language" name="language">
                </div>

                <div class="input-container container-tome">
                    <label for="tome">Tome</label>
                    <input type="number" id="tome" name="tome">
                </div>

                <div class="input-container container-ASIN">
                    <label for="ASIN">ASIN <span class="madatory-field">*</span></label>
                    <input type="text" id="ASIN" name="asin">
                </div>

                <div class="input-container container-category">
                    <label for="category">Category <span class="madatory-field">*</span></label>
                    <input type="text" id="category" name="category">
                </div>

                <div class="input-container container-nb-page">
                    <label for="nb-page">Number of pages <span class="madatory-field">*</span></label>
                    <input type="number" id="nb-page" name="nb-page">
                </div>

                <div class="input-container container-nb-octets">
                    <label for="nb-octets">Number of octets <span class="madatory-field">*</span></label>
                    <input type="number" id="nb-octets" name="nb-octets">
                </div>

                <input type="submit" value="Add book" id="sign" name="submit">

            </form>

            <?php
                function is_valid($str) {
                    return isset($_POST[$str]) && !empty($_POST[$str]) && trim($_POST[$str]) !== "";
                }

                function is_everything_valid() {
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

                if (isset($_POST['submit'])) {
                    if (is_everything_valid()) {
                        $postAuthor = [
                            'name' => $_POST['author-name'],
                            'surname' => $_POST['author-surname']
                        ];

                        $author = new Author();
                        $author->hydrate($postAuthor);
                        $authorManager->insert($author);

                        $lastInsertedAuthorId = $db->lastInsertId();

                        // ---------------------------------------------------

                        $postEditor = [
                            'label' => $_POST['editor']
                        ];

                        $editor = new Editor();
                        $editor->hydrate($postEditor);
                        $editorManager->insert($editor);

                        $lastInsertedEditorId = $db->lastInsertId();

                        // ---------------------------------------------------

                        $postCategory = [
                            'label' => $_POST['category']
                        ];

                        $category = new Category();
                        $category->hydrate($postCategory);
                        $categoryManager->insert($category);

                        $lastInsertedCategoryId = $db->lastInsertId();

                        // ---------------------------------------------------

                        $postBook = [
                            'title' => $_POST['title'],
                            'description' => $_POST['description'],
                            'nb_pages' => $_POST['nb-page'],
                            'nb_octets' => $_POST['nb-octets'],
                            'asin' => $_POST['asin'],
                            'tome' => $_POST['tome'],
                            'language' => $_POST['language'],
                            'id_category' => $lastInsertedCategoryId,
                            'id_editor' => $lastInsertedEditorId
                        ];

                        $book = new Book();
                        $book->hydrate($postBook);
                        $bookManager->insert($book);

                        $lastInsertedBookId = $db->lastInsertId();

                        // ---------------------------------------------------

                        $postWrittenBy = [
                            'id_book' => $lastInsertedBookId,
                            'id_author' => $lastInsertedAuthorId,
                        ];

                        $writtenBy = new WrittenBy();
                        $writtenBy->hydrate($postWrittenBy);
                        $writtenByManager->insert($writtenBy);

                        $lastInsertedWrittenById = $db->lastInsertId();

                        header("Location: admin-book-handle.php");
                    } else {
                        echo 'Probleme';
                    }
                }
            ?>

        </article>

    </section>


</body>
</html>