<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            出版社一覧
        </div>
        <div class="header">
            <table>
                <tr><a href="BookList.php">書籍一覧</a></tr>
                <tr><a href="PublisherList.php">出版社一覧</a></tr>
                <tr><a href="LocationList.php">保存場所一覧</a></tr>
            </table>
        </div>
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
