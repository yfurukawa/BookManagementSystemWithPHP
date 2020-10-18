<?php
    $menu = <<<EOM
        <nav>
            <ul>
            <li class="current"><a href="#">Home</a></li>
            <li><a href="BookList.php">書籍一覧</a></li>
            <li><a href="PublisherList.php">出版社一覧</a></li>
            <li><a href="LocationList.php">保存場所一覧</a></li>
            <li><a href="RegistrationPage.php">書籍登録</a></li>
            </ul>
        </nav>
    EOM;

    echo $menu;
