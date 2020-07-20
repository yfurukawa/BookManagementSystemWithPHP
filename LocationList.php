<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            保管場所一覧
        </div>
        <div class="header">
            <table>
                <tr><a href="BookList.php">書籍一覧</a></tr>
                <tr><a href="PublisherList.php">出版社一覧</a></tr>
                <tr><a href="LocationList.php">保存場所一覧</a></tr>
            </table>
        </div>
        <div class="list">
            <div class="listTitle">
                保管場所一覧<br>
            </div>
            <div class="locationList">
                <?php
                    define('_ROOT_DIR',__DIR__.'/');
                    require_once('/var/www/php_libs/init.php');
                    $locationList = new LocationListController();
                    $locationList->listLocation();
                ?>
            </div>
        </div>
    </body>
</html>
