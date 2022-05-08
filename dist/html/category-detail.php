<?php
    require '../../controller/categoryDetailController.php';
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
    
    <title><?php echo $categoryLabel; ?></title>
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
                <a href="download.php" class="part-link-page">
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
                    <span id="category-label"><?php echo $categoryLabel ?></span>
                </div>
            </div>

            <a href="category.php" class="title">
                <span  class="material-symbols-outlined title-icon">
                    chevron_left
                </span>
                <span class="title-text">
                    <?php echo $categoryLabel ?>
                </span>
            </a>

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
                                    $writtenBys = $writtenByManager->get($book->get_id_book());
                                    foreach($writtenBys as $id_book => $writtenBy) : 
                                ?>
                                    <span>
                                        <?= $authorManager->get($writtenBy->get_id_author())->get_name() ?>
                                    </span> 
                                    <span>
                                        <?= $authorManager->get($writtenBy->get_id_author())->get_surname() ?>
                                    </span> &nbsp;
                                <?php endforeach ?>
                            </span>
                            <a href="book-detail.php?id_book=<?= $book->get_id_book() ?>">
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