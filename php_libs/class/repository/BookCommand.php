<?php

require_once('DbConnector.php');

class BookCommand {
    private $c = "";

    public function resisterBook($bookInformation) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        try {
            $connector->beginTransaction();
            $sql = "INSERT INTO book (isbn, title, description, publisherId, thumbnail, roomId) VALUES ( :isbn, :authorName )";

            $stmh = $connector->prepare($sql);
            $stmh->bindValue(':isbn', $isbn);
            foreach($authorNames as $authorName) {
                $stmh->bindValue(':authorName', $authorName);
                $stmh->execute();
            }
            $connector->commit();
            return "データを".$stmh->rowCount()."件　登録しました";
        }
        catch (PDOException $Exception) {
            $connector->rollBack();
            return "エラー：".$Exception->getMessage();
        }

    }
}
