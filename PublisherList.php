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
        
        <div class="searchLocation">
            <form name="search" method="POST" action="php/searchLocation.php">
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
                    $publisherList = new publisherList();
                    $publisherList->listPublisher();
                ?>
            </div>
        </div>
    </body>
</html>
