<?php
    require '../../../controller/page/user/book-detail-controller.php';
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../../import/import-book-detail/import.css">
    <link rel="stylesheet" media="screen and (min-width: 550px) and (max-width: 949px)" href="../../import/import-book-detail/import-tablet.css">
    <link rel="stylesheet" media="screen and (max-width: 549px)" href="../../import/import-book-detail/import-mobile.css">
    
    <title><?php echo $bookTitle; ?></title>
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
                <a href="profile.php" class="part-link-page">
                    Profile
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
            <div id="book-container">
                <img src="../../asset/image/logo-min.svg" alt="logo-min" id="book-img">
                <div id="book-text">
                    <span id="book-word">Category</span> 
                    <span id="book-label"><?php echo $categoryLabel ?></span>
                </div>
            </div>

            <a href="category-detail.php?id_category=<?= $categoryId ?>" class="title">
                <span  class="material-symbols-outlined title-icon">
                    chevron_left
                </span>
                <span class="title-text">
                    Back to category
                </span>
            </a>
           
            <div class="container-book-img-download">
                <img src="https://via.placeholder.com/200x300" alt="logo" class="book-img">
                <div class="book-title-download">
                    <span class="book-title">
                        <?php echo $bookTitle; ?>
                    </span>
                    <span class="book-author">
                        <?= $authorName ?>
                        <?= $authorSurname ?>
                    </span>
                    <a href="../../../controller/download/download-insert.php?id_book=<?= $id_book ?>" class="button-download">
                        <span class="material-symbols-outlined">
                            download
                        </span>
                    </a>
                </div>
            </div>

            <div class="description-container">
                <h1 class="title-description">
                    Description
                </h1>
                <div class="description-text">
                    <?php echo $bookDescription; ?>
                </div>
            </div>

            <div class="info-container">
                <h1 class="title-info">
                    Informations
                </h1>
                <div class="info-text">
                    <div class="detail">
                        <span class="detail-label">
                            Editor : 
                        </span>
                        <span class="detail-db">
                            <?php echo $editorLabel; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            ASIN : 
                        </span>
                        <span class="detail-db">
                            <?php echo $bookAsin; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            Tome : 
                        </span>
                        <span class="detail-db">
                            <?php echo $bookTome; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            Language : 
                        </span>
                        <span class="detail-db">
                            <?php echo $bookLanguage ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            Category : 
                        </span>
                        <span class="detail-db">
                            <?php echo $categoryLabel ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            Number of pages : 
                        </span>
                        <span class="detail-db">
                            <?php echo $bookNbPages ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">
                            Size : 
                        </span>
                        <span class="detail-db">
                            <?php echo $bookNbOctets ?> octets
                        </span>
                    </div>

                </div>
            </div>
        </article>
        
    </section>

</body>
</html>
