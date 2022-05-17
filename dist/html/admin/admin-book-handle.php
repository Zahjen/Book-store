<?php
    require '../../../controller/page/admin/admin-book-handle-controller.php';
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../../import/import-admin-book-handle/import.css">
    <link rel="stylesheet" media="screen and (max-width: 949px)" href="../../import/import-admin-book-handle/import-tablet.css">
    
    <title>Book Handle</title>
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
                <a href="admin-book-handle.php" class="part-link-page active">
                    Book Handle
                </a>
                <a href="admin-add-book.php" class="part-link-page">
                    Add Book
                </a>

                <a href="../../../controller/page/logout.php" class="log-out">
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
            <div id="book-intro-container">
                <img src="../../asset/image/logo-min.svg" alt="logo-min" id="book-intro-img">
                <div id="book-intro-text">
                    <span class="book-intro-word">Book</span> 
                    <span class="book-intro-word">Handle</span>
                </div>
            </div>

            <h1 class="title">List of books</h1>

            <div class="books-container">
                <?php foreach($books as $book) : ?>
                    <div class="book-item-info">
                        <div class="info-container">
                            <div class="detail">
                                <span class="detail-label">
                                    Title : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_title(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Book ID : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_id_book(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Author : 
                                </span>
                                <span class="detail-db">
                                    <?= $authorManager->get($book->get_id_author())->get_name() ?>
                                    <?= $authorManager->get($book->get_id_author())->get_surname() ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Editor : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $editorManager->get($book->get_id_editor())->get_label(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    ASIN : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_asin(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Tome : 
                                </span>
                                <span class="detail-db">
                                    <?php echo ($book->get_tome() == NULL) ? "None" : $book->get_tome(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Language : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_language(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Category : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $categoryManager->get($book->get_id_category())->get_label(); ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Number of pages : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_nb_pages() ?>
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Size : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_nb_octets() ?> octets
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    Description : 
                                </span>
                                <span class="detail-db">
                                    <?php echo $book->get_description() ?>
                                </span>
                            </div>
                        </div>

                        <a href="admin-update-book.php?id_book=<?= $book->get_id_book() ?>" class="update-book">
                            Update the book
                        </a>
                        
                        <a href="../../../controller/book/book-delete.php?id_book=<?= $book->get_id_book() ?>" class="delete-book">
                            Delete the book
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </article>
        
    </section>

</body>
</html>