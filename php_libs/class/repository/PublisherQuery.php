<?php


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
}
