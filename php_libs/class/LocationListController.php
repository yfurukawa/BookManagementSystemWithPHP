<?php

class LocationListController {
    private $c = "";

    public function listLocation() {
        $pubs = "";
        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM room";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $pubs = $pubs."<tr><td>".$row['roomName']."</td></tr>";
            }
            $contents = '<table border="2"><tbody><tr><th>保管場所</th></tr>';
            $contents = $contents.$pubs;
            $contents = $contents."</tbody></table>";
            print $contents;
        }
    }
}

