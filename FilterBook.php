<?php

    $title = $_POST['title'];
    $publisher = $_POST['publisherId'];
    $room = $_POST['roomId'];
    $tags = $_POST['tags'];

    /*
    echo($title);
    echo("<br>");
    echo($publisher);
    echo("<br>");
    echo($room);
    echo("<br>");
    echo($tags);
*/

    define('_ROOT_DIR',__DIR__.'/');
    require_once('/var/www/php_libs/init.php');
    $bookList = new BookListController();
    $bookList->listBook($title, $publisher);