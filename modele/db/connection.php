<?php

    try {
        $db = new PDO(
            'mysql:host=127.0.0.1;dbname=book_store;charset=utf8', 
            'root', 
            '', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    } catch (Exception $sqle) {
        die('Error : '.$sqle->getMessage());
    }

?>