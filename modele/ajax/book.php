<?php

    require '../db/connection.php';
    require '../object/book.php';
    require '../db/bookManager.php';

    $bookManager = new BookManager($db);
    $books = $bookManager->get_all();

    header('Content-Type: application/json');

    echo json_encode($books, JSON_UNESCAPED_UNICODE);
    
    exit;

?>