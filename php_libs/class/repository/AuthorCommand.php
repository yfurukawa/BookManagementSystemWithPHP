<?php

require_once('DbConnector.php');

class AuthorCommand {
    private $c = "";

    public function resisterAuthor($isbn, $authorNameList) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        try {
            $connector->beginTransaction();
            $sql = "INSERT INTO author (isbn, authorName) VALUES ( :isbn, :authorName )";

            $stmh = $connector->prepare($sql);
            $stmh->bindValue(':isbn', $isbn);
            foreach($authorNameList as $authorName) {
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
