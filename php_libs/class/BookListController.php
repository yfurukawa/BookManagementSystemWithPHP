<?php

class BookListController {
    private $c = "";

    public function listBook() {
        $pubs = "";
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM book";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $pubs = $pubs."<tr><td>".$row['title']."</td><td>".$row['isbn']."</td><td>".$row['publisherName']."</td><td>".$row['authorName']."</td><td>".$row['roomName']."</td></tr>";
            }
            $contents = '<table border="2"><tbody><tr><th>書籍名称</th><th>ISBN</th><th>出版社</th><th>著者</th><th>保管場所</th></tr>';
            $contents = $contents.$pubs;
            $contents = $contents."</tbody></table>";
            print $contents;
        }
    }
}

