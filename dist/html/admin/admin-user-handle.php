<?php
    require '../../../controller/admin-user-handle.php';
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../../import/import-admin-user-handle/import.css">
    
    <title>User Handle</title>
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
                <a href="admin-user-handle.php" class="part-link-page active">
                    User Handle
                </a>
                <a href="admin-book-handle.php" class="part-link-page">
                    Book Handle
                </a>
                <a href="admin-add-book.php" class="part-link-page">
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
            <div id="welcome-container">
                <img src="../../asset/image/logo-min.svg" alt="logo-min" id="welcome-img">
                <div id="welcome-text">
                    <span id="welcome-word">User</span> 
                    <span id="username-word">Handle</span>
                </div>
            </div>

            <h1 class="title">List of users</h1>

            <div class="users-container">
                <div class="user-text-container-directive">
                    <span class="user-id">
                        User ID
                    </span>
                    <span class="user-pseudo">
                        Pseudo
                    </span>
                    <span class="user-mail">
                        Mail
                    </span>
                    <span class="user-delete">
                        Delete
                    </span>
                </div>
                
                <?php foreach($users as $user) : ?>
                    <div class="user-text-container">
                        <span class="user-id">
                            <?= $user->get_id_user() ?>
                        </span>
                        <span class="user-pseudo">
                            <?= $user->get_pseudo() ?>
                        </span>
                        <span class="user-mail">
                            <?= $user->get_mail() ?>
                        </span>
                        <a href="../../../modele/ajax/user/user-delete.php?id_user=<?= $user->get_id_user() ?>" class="material-symbols-outlined icon-delete">
                            delete
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </article>
        
    </section>

    <script type="application/javascript" src="../../javascript/nav-bar.js"></script>

</body>
</html>