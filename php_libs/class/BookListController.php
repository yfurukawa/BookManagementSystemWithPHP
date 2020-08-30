<?php

require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
class BookListController {
    private $c = "";

    public function listBook() {
        $pubs = "";
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        //$sql = "SELECT b.isbn, title, description, publisherName, authorName, thumbnail, roomName FROM book as b, author as a, room as r, publisher as p WHERE b.isbn = 
        //a.isbn and b.roomId = r.roomId and b.publisherId = p.publisherId";
        
        $sql = "SELECT isbn, title, description, thumbnail From book";

        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $pubs = $pubs."<tr><td>".$row['title']."</td><td>".$row['isbn']."</td><td>".$row['description'].'</td><td><img src="'.$row['thumbnail'].'"></td></tr>';
            }
            $contents = '<table border="2"><tbody><tr><th>書籍名称</th><th>ISBN</th><th>説明</th><th></th></tr>';
            $contents = $contents.$pubs;
            $contents = $contents."</tbody></table>";
            print $contents;
        }
    }
}

