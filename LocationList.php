<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            保存場所一覧
        </div>

        <div class="searchLocation">
            <form name="search" method="POST" action="php/SearchLocation.php">
                保存場所：
                <input type="text" name="location">
                <input type="submit" value="検索">
            </form>
        </div>
        <br>
        <div class="list">
            <div class="listTitle">
                保存場所一覧<br>
            </div>
            <div class="locationList">
                <?php
                    $locationList = new LocationList();
                    $locationList->listLocation();
                ?>
            </div>
        </div>
    </body>
</html>
