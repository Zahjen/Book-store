<?php

    require '../../../modele/db/connection.php';
    require '../../../modele/db/category-manager.php';
    require '../../../modele/object/category.php';
    
    session_start();

    if (!isset($_SESSION['pseudo'])) {
        header('Location: ../../../dist/html/user/sign-in.php');
    }

    $categoryManager = new CategoryManager($db);

    // Permet de récupérer toutes les catégories
    $categories = $categoryManager->get_all();

?>