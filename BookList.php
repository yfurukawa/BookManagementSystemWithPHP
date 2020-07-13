<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            書籍一覧
        </div>
        
        <div class="searchPublisher">
            <form name="search" method="POST" action="php_libs/class/BookListController.php">
                保管場所：
                <input type="text" name="book">
                <input type="submit" value="検索">
            </form>
        </div>
        <br>
        <div class="list">
            <div class="listTitle">
                書籍一覧<br>
            </div>
            <div class="bookList">
                <?php
                    define('_ROOT_DIR',__DIR__.'/');
                    require_once('/var/www/php_libs/init.php');
                    $bookList = new BookListController();
                    $bookList->listBook();
                ?>
            </div>
        </div>
    </body>
</html>
