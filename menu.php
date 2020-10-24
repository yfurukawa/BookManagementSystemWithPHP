<?php
    $menu = "<nav>";
    $menu .= '<ul>';
    $menu .= '<li class="'.$bookList.'"><a href="BookList.php">書籍一覧</a></li>';
    $menu .= '<li class="'.$publisherList.'"><a href="PublisherList.php">出版社一覧</a></li>';
    $menu .= '<li class="'.$locationList.'"><a href="LocationList.php">保存場所一覧</a></li>';
    $menu .= '<li class="'.$register.'"><a href="RegistrationPage.php">書籍登録</a></li>';
    $menu .= "</ul></nav>";

    echo $menu;
