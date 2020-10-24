<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/menu.css">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            出版社一覧
        </div>
        
        <?php
            $publisherList = "current";
            include('./menu.php');
        ?>

        <div class="searchPublisher">
            <form name="search" method="POST" action="php/PublisherListController.php">
                出版社：
                <input type="text" name="publisher">
                <input type="submit" value="検索">
            </form>
        </div>
        <br>
        <div class="list">
            <div class="listTitle">
                出版社一覧<br>
            </div>
            <div class="publisherList">
                <?php
                    define('_ROOT_DIR',__DIR__.'/');
                    require_once('/var/www/php_libs/init.php');
                    $publisherList = new PublisherListController();
                    $publisherList->listPublisher();
                ?>
            </div>
        </div>
    </body>
</html>
