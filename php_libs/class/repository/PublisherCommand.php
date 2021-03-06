<?php

require_once('DbConnector.php');

class PublisherCommand {
    private $c = "";

    public function registPublisher($isbn, $publisherName) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        try {
            $connector->beginTransaction();
            $sql = "INSERT INTO publisher (publisherName, publisherCode) VALUES ( :publisherName, :publisherCode )";

            $stmh = $connector->prepare($sql);
            $stmh->bindValue(':publisherName', $publisherName);
            $stmh->bindValue(':publisherCode', $isbn->publisherCode());
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
