<?php

class BookQuery {
    private $c = "";

    public function bookListup() {
        $book = array();

        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT isbn, title, publisherName, name, roomName, tags FROM book as b, author as a, room as r, publisher as p WHERE b.authorID = 
        a.authorId and b.roomId = r.roomId and b.publisherId = p.publisherId";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            return $books;    
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $books[] = array('isbn' => $row['isbn'], 'title' => $row['title'], 'publisherName' => $row['publisherName'], 'name' => $row['name'], 'roomName' => $row['roomName'], 'tags' => $row['tgs']);
            }
            return $books;
        }
    }

    /** 書籍が登録済みかどうか確認する
     * 
     * @param str $isbn 検索対象のISBN13番号
     * @return bool (登録済み：true、未登録：false)
     */ 
    public function isExist($isbn) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT count(*) FROM book WHERE isbn = :isbn";
        
        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':isbn', $isbn);
        $stmh->execute();

        $count = $stmh->fetch(PDO::FETCH_NUM);

        if ($count[0] >= 1) {
            return true;
        }
        else {
            return false;
        }
    } 
}
