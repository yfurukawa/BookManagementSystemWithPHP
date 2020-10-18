<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
    </head>

    <body>
        <div class="pageTitle">
            書籍情報更新
        </div>

        <div class="updateBook">
            <form name="update" method="POST" action="RegistBook.php">
                <table>
                    <tr><th>ISBN : </th><td></td></tr>
                    <tr><th>タイトル : </th><td><input type="text"     name="title" id="title"></td></tr>
                    <tr><th>説明 :     </th><td><input type="textarea" name="description" id="description"></td></tr>
                    <tr><th>出版社 : </th>
                        <td>
                            <?php
                                require_once('/var/www/php_libs/class/PublisherCombobox.php');
                                print((new PublisherCombobox())->createPublisherCombobox());
                            ?>
                        </td>
                    </tr>
                    <tr><th>著者 : </th><td><input type="text" name="authors" id="authors"></td></tr>
                    <tr><th>サムネイル：</th><td><input type="text" name="thumbnail" id="thumbnail"></td></tr>
                    <tr><th>保管場所</th>
                        <td>
                            <?php
                                require_once('/var/www/php_libs/class/RoomCombobox.php');
                                print((new RoomCombobox())->createRoomCombobox());
                            ?>
                        </td>
                    </tr>
                    <tr><th>タグ</th><td><input type="text" name="tags" id="tags"></td></tr>
                </table>
              <input type="submit" value="更新" />
            </form>
        </div>
    </body>
</html>


