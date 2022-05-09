<?php
    require '../../controller/profile.php';
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
    <link rel="stylesheet" media="screen and (min-width: 950px)" href="../import/import-profile/import.css">
    
    <title>Profile</title>
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
                <a href="download.php" class="part-link-page">
                    Download
                </a>
                <a href="profile.php" class="part-link-page">
                    Profile
                </a>

                <a href="logout.php" class="log-out">
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
            <div id="update-user-container">
                <img src="../asset/image/logo-min.svg" alt="logo-min" id="update-user-img">
                <div id="update-user-text">
                    <span class="update-user-word">Update</span> 
                    <span class="update-user-word">User</span>
                </div>
            </div>

            <h1 class="title">Update Profile</h1>

            <form action="" method="post">

                <div class="input-container container-username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="pseudo" value=<?php echo $userPseudo ?>>
                </div>
        
                <div class="input-container container-mail">
                    <label for="mail">Email</label>
                    <input type="text" id="mail" name="mail" value=<?php echo $userMail ?>>
                </div>

                <div class="input-container container-password">
                    <label for="password">New password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="input-container container-check-password">
                    <label for="check-password">Confirm new password</label>
                    <input type="password" id="check-password" name="check-password">
                </div>

                <input type="submit" value="Update" id="update" name="submit">

            </form>           
            
            <?php
                update($userManager, $userId);
            ?>
        </article>
        
    </section>

    <script type="application/javascript" src="../javascript/nav-bar.js"></script>

</body>
</html>