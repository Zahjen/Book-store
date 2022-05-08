<?php
    $id_category = null;  

    if (isset($_GET['id_category']) && !empty($_GET['id_category']) && is_numeric($_GET['id_category'])) {
        $id_category = $_GET['id_category'];      
    } else {
        echo 'Probleme';
    }

    require '../../modele/db/connection.php';
    require '../../modele/db/categoryManager.php';
    require '../../modele/object/category.php';
    require '../../modele/db/bookManager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/ecritParManager.php';
    require '../../modele/object/ecritPar.php';
    require '../../modele/db/authorManager.php';
    require '../../modele/object/author.php';

    session_start();

    $bookManager = new BookManager($db);
    $books = $bookManager->get_book_by_id_category($id_category);

    $ecritParManager = new EcritParManager($db);

    $authorManager = new AuthorManager($db);
    $author = new Author();

    $categoryManager = new CategoryManager($db);
    $category = $categoryManager->get($id_category);  
    
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../import/import-category-detail/import.css">
    
    <title><?php echo $category->get_label(); ?></title>
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
                <img src="../asset/image/logo.svg" alt="logo">
            </a>        

            <!-- Navigation link -->
            <div class="nav-links">
                <a href="home.php" class="part-link-page">
                    Home
                </a>
                <a href="search.php" class="part-link-page">
                    Search
                </a>
                <a href="category.php" class="part-link-page active">
                    Category
                </a>
                <a href="#download" class="part-link-page">
                    Download
                </a>
                <a href="#profile" class="part-link-page">
                    Profile
                </a>
            </div>

            <div class="ghost"></div>
        </div> 
    </nav>     

    <section class="section-global">

        <article>
            <div id="category-container">
                <img src="../asset/image/logo-min.svg" alt="logo-min" id="category-img">
                <div id="category-text">
                    <span id="category-word">Category</span> 
                    <span id="category-label"><?php echo $category->get_label() ?></span>
                </div>
            </div>

            <h1 class="title">
                <a href="category.php" class="material-symbols-outlined title-icon">
                    chevron_left
                </a>
                <span class="title-text">
                    <?php echo $category->get_label() ?>
                </span>
            </h1>

            <div class="category-detail-container">
                <?php foreach($books as $id_book => $book) : ?>
                    <div class="category-detail-book-container">
                        <img src="https://via.placeholder.com/100x150" class="category-detail-book-img">
                        <div class="category-detail-book-text">
                            <span class="category-detail-book-title">
                                <?= $book->get_title() ?>
                            </span>
                            <span class="category-detail-book-author">
                                <?php 
                                    $ecritPars = $ecritParManager->get($book->get_id_book());
                                    foreach($ecritPars as $id_book => $ecritPar) : 
                                ?>
                                    <span>
                                        <?= $authorManager->get($ecritPar->get_id_author())->get_name() ?>
                                    </span> 
                                    <span>
                                        <?= $authorManager->get($ecritPar->get_id_author())->get_surname() ?>
                                    </span> &nbsp;
                                <?php endforeach ?>
                            </span>
                            <a href="">
                                More
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </article>
        
    </section>

    <script type="application/javascript" src="../javascript/nav-bar.js"></script>

</body>
</html>