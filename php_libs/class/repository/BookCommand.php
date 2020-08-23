<?php

require_once('DbConnector.php');

class BookCommand {
    private $c = "";

    public function resisterBook($bookInformation) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        try {
            $connector->beginTransaction();
            $sql = "INSERT INTO book (isbn, title, description, publisherId, thumbnail, roomId) VALUES ( :isbn, :title, :description, :publisherId, :thumbnail, :roomId )";

            $stmh = $connector->prepare($sql);
            $stmh->bindValue(':isbn', $bookInformation->getIsbn());
            $stmh->bindValue(':title', $bookInformation->getTitle());
            $stmh->bindValue(':description', $bookInformation->getDescription());
            $stmh->bindValue(':publisherId', $bookInformation->getPublisherId());
            $stmh->bindValue(':thumbnail', $bookInformation->getThumbnail());
            $stmh->bindValue(':roomId', $bookInformation->getRoomId());
            $stmh->execute();
            $connector->commit();
            return "データを".$stmh->rowCount()."件　登録しました";
        }
        catch (PDOException $Exception) {
            $connector->rollBack();
            return "エラー：".$Exception->getMessage();
        }

    }
}
