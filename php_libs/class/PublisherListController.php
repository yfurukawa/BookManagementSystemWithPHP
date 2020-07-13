<?php

class PublisherListController {
    private $c = "";

    public function listPublisher() {
        $pubs = "";
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM publisher";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $pubs = $pubs."<tr><td>".$row['publisherName']."</td></tr>";
        }
        $contents = '<table border="2"><tbody><tr><th>出版社</th></tr>';
        $contents = $contents.$pubs;
        $contents = $contents."</tbody></table>";
        print $contents;
    }
}

