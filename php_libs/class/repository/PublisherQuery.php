<?php

require_once('DbConnector.php');

class PublisherQuery {
    private $c = "";

    public function publisherListup() {
        $publishers = array();

        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM publisher";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            return $publishers;    
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $publishers[] = array('publisherId' => $row['publisherId'], 'publisherName' => $row['publisherName']);
            }
            return $publishers;
        }
    }

    public function isExistByName($publisherName) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        $sql = "SELECT count(*) FROM publisher WHERE publisherName = :publisherName";
        
        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':publisherName', $publisherName);
        $stmh->execute();
        return (($stmh->fetch())[0] >= 1);
    }

    public function isExistByIsbnCode($isbn) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        $sql = "SELECT count(*) FROM publisher WHERE publisherCode = :publisherCode";
        
        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':publisherCode', substr($isbn, 4, 4));
        $stmh->execute();
        return (($stmh->fetch())[0] >= 1);
    }

    public function getPublisherNameWithCode($isbn) {
        $c = new DbConnector();
        $connector = $c->connectDb();
        $sql = "SELECT publisherName FROM publisher WHERE publisherCode = :publisherCode";
        
        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':publisherCode', substr($isbn, 4, 4));
        $stmh->execute();
        return (($stmh->fetch())[0]);
    }

    public function getPublisherIdWithName($publisherName) {
        $c = new DbConnector();
        $connector = $c->connectDb();

        $sql = "SELECT publisherId FROM publisher WHERE publisherName = :publisherName";

        $stmh = $connector->prepare($sql);
        $stmh->bindValue(':publisherName', $publisherName);
        $stmh->execute();
        return (($stmh->fetch())[0]);
    }
}
