<?php

require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
class BookListController {
    private $c = "";

    public function listBookAll() {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql  = "SELECT isbn, title, publisherName, author, description, thumbnail, roomName, tags From book as b, publisher as p, room as r WHERE b.publisherId = p.publisherId AND b.roomId = r.roomId";

        $stmh = $connector->prepare($sql);
        $this->executeSelect($stmh);
    }

    public function listBook($title, $publisher) {
        $pubs = "";
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql  = "SELECT isbn, title, publisherName, author, description, thumbnail, roomName, tags From book as b, publisher as p, room as r WHERE b.publisherId = p.publisherId AND b.roomId = r.roomId and (b.title like :title or b.publisherId = :publisherId)";

        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':title', "%".$title."%");
        $stmh->bindValue(':publisherId', $publisher);
        $this->executeSelect($stmh);
    }

    function executeSelect($stmh) {
        $pubs = "";

        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $pubs = $pubs."<tr><td>".$row['title']."</td><td>".$row['isbn']."</td><td>".$row['publisherName']."</td><td>".$row['author']."</td><td>".$row['description'].'</td><td><img src="'.$row['thumbnail'].'"></td><td>'.$row['roomName']."</td><td>".$row['tags']."</td><td><a href=\"UpdatePage.php?idbn=".$row['isbn']."\">更新</a></td></tr>";
            }
            $contents = '<table border="2"><tbody><tr><th>書籍名称</th><th>ISBN</th><th>出版社</th><th>著者</th><th>説明</th><th>サムネイル</th><th>保管場所</th><th>タグ</th><th></th></tr>';
            $contents = $contents.$pubs;
            $contents = $contents."</tbody></table>";
            print $contents;
        }
    }
}

