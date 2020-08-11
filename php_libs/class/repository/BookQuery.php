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

    public function isExist($isbn) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT count(*) FROM book WHERE isbn = :isbn";
        
        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':isbn', $isbn);
        $stmh->execute();
    } 
}
