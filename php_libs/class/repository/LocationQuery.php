<?php

class LocationQuery {
    private $c = "";

    public function locationListup() {
        $locations = array();

        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM room";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            return $locations;    
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $locations[] = array('roomID' => $row['roomId'], 'roomName' => $row['roomName']);
            }
            return $locations;
        }

    }
}