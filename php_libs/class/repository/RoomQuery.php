<?php

require_once('DbConnector.php');

class RoomQuery {
    private $c = "";

    public function roomListup() {
        $rooms = array();

        $c = new DbConnector();
        $connector = $c->connectDb();
        
        $sql = "SELECT * FROM room";
        
        $stmh = $connector->prepare($sql);
        $stmh->execute();
        
        if ($stmh->rowCount() < 1) {
            return  $rooms;    
        }
        else {
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                $rooms[] = array('roomId' => $row['roomId'], 'roomName' => $row['roomName']);
            }
            return  $rooms;
        }

    }
}
