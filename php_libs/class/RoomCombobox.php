<?php

require_once('repository/RoomQuery.php');

class RoomCombobox {
    public function createRoomCombobox() {
        $roomQuery = new RoomQuery();
        $rooms = $roomQuery->roomListup();
        $contents = '<select name="publishers">';

        foreach($rooms as $room) {
            $contents = $contents.'<option value="'.$room['roomId'].'">'.$room['roomName'].'</option>';
        }
        $contents = $contents.'</select>';

        return $contents;
    }
}