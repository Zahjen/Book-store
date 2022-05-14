<?php
    ob_start();
    require '../../../controller/page/admin/admin-update-book-controller.php';
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../../import/import-admin-update-book/import.css">
    
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
            <div id="book-add-container">
                <img src="../../asset/image/logo-min.svg" alt="logo-min" id="book-add-img">
                <div id="book-add-text">
                    <span class="book-add-word">Update</span> 
                    <span class="book-add-word">Book</span>
                </div>
            </div>

            <a href="admin-book-handle.php" class="title">
                <span class="material-symbols-outlined icon-update">
                    chevron_left
                </span>
                <span class="title-text">
                    Update Book
                </span>
            </a>

            <form action="" method="post">

                <div class="input-container container-title">
                    <label for="title">Title <span class="madatory-field">*</span></label>
                    <input type="text" id="title" name="title" value="<?php echo $bookTitle ?>"onkeyup="verifierChampsVide(this, '1')">
                    <span id="champAremplir1" class="test"></span>
                </div>
        
                <div class="input-container container-description">
                    <label for="description">Description <span class="madatory-field">*</span></label>
                    <input type="text" id="description" name="description" value="<?php echo $bookDescription ?>"onkeyup="verifierChampsVide(this, '2')">
                    <span id="champAremplir2" class="test"></span>
                </div>

                <div class="input-container container-author">
                    <label>Author <span class="madatory-field">*</span></label>
                    <input type="text" class="author-name" name="author-name" placeholder="name" value="<?php echo $authorName ?>"onkeyup="verifierChampsVide(this, '3')">
                <span id="champAremplir3" class="test"></span>
                    <input type="text" class="author-surname" name="author-surname" placeholder="surname" value="<?php echo $authorSurname ?>"onkeyup="verifierChampsVide(this, '4')">
                <span id="champAremplir4" class="test"></span>
                </div>


                <div class="input-container container-editor">
                    <label for="editor">Editor <span class="madatory-field">*</span></label>
                    <input type="text" id="editor" name="editor" value="<?php echo $editorLabel ?>"onkeyup="verifierChampsVide(this, '5')">
                <span id="champAremplir5" class="test"></span>
                </div>

                <div class="input-container container-language">
                    <label for="language">Language <span class="madatory-field">*</span></label>
                    <input type="text" id="language" name="language" value="<?php echo $bookLanguage ?>"onkeyup="verifierChampsVide(this, '6')">
                <span id="champAremplir6" class="test"></span>
                </div>

                <div class="input-container container-tome">
                    <label for="tome">Tome</label>
                    <input type="number" id="tome" name="tome" value="<?php echo $bookTome ?>">
                </div>

                <div class="input-container container-ASIN">
                    <label for="ASIN">ASIN <span class="madatory-field">*</span></label>
                    <input type="text" id="ASIN" name="asin" value="<?php echo $bookAsin ?>"onkeyup="verifierAsin(this)">
                <span id="champAsin" class="test"></span>
                </div>

                <div class="input-container container-category">
                    <label for="category">Category <span class="madatory-field">*</span></label>
                    <input type="text" id="category" name="category" value="<?php echo $categoryLabel ?>"onkeyup="verifierChampsVide(this, '7')">
                <span id="champAremplir7" class="test"></span>
                </div>

                <div class="input-container container-nb-page">
                    <label for="nb-page">Number of pages <span class="madatory-field">*</span></label>
                    <input type="number" id="nb-page" name="nb-page" value="<?php echo $bookNbPages ?>"onkeyup="verifierNb(this, '1')">
                <span id="champNb1" class="test"></span>
                </div>

                <div class="input-container container-nb-octets">
                    <label for="nb-octets">Number of octets <span class="madatory-field">*</span></label>
                    <input type="number" id="nb-octets" name="nb-octets" value="<?php echo $bookNbOctets ?>"onkeyup="verifierNb(this, '2')">
                <span id="champNb2" class="test"></span>
                </div>

                <input type="submit" value="Update book" id="sign" name="submit">

            </form>

            <?php 
                send_data($authorManager, $author, $editorManager, $editor, $categoryManager, $category, $bookManager, $id_book);
            ?>

        </article>

    </section>
    <script type="text/javascript" src="/Book-store-main/dist/javascript/script.js"></script>

</body>
</html>