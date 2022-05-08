<?php
    require '../../modele/db/connection.php';
    require '../../modele/db/bookManager.php';
    require '../../modele/object/book.php';
    require '../../modele/db/ecritParManager.php';
    require '../../modele/object/ecritPar.php';
    require '../../modele/db/authorManager.php';
    require '../../modele/object/author.php';

    session_start();
    $bookManager = new BookManager($db);
    $books = $bookManager->get_latest();

    $ecritParManager = new EcritParManager($db);

    $authorManager = new AuthorManager($db);
    $author = new Author();
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

    <!-- Styles sheet -->
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../import/import-home/import.css">
    <link rel="stylesheet" media="screen and (min-width: 650px) and (max-width: 949px)" href="../import/import-home/import-tablet.css">
    
    <title>Home</title>
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
                <a href="home.php" class="part-link-page active">
                    Home
                </a>
                <a href="search.php" class="part-link-page">
                    Search
                </a>
                <a href="category.php" class="part-link-page">
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
            <div id="welcome-container">
                <img src="../asset/image/logo-min.svg" alt="logo-min" id="welcome-img">
                <div id="welcome-text">
                    <span id="welcome-word">Welcome</span> 
                    <span id="username-word">Username</span>
                </div>
            </div>

            <h1 class="title">Latest entries</h1>

            <div class="last-container">
                <?php foreach($books as $id_book => $book) : ?>
                    <div class="last-book-container">
                        <img src="https://via.placeholder.com/100x150" class="last-book-img">
                        <div class="last-book-text">
                            <span class="last-book-title">
                                <?= $book->get_title() ?>
                            </span>
                            <span class="last-book-author">
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