<?php
class RoomObject {
    
    private $room_id = 0;

    function getRoom_id() : int {
        return $this->room_id;
    }

    function setRoom_id(int $room_id) {
        $this->room_id = $room_id;
    }

}
?>