<?php
class RoomtypeObject {
    protected $roomtype_id;
    protected $roomtype_name;
    protected $roomtype_notes;

    function getRoomtype_id() {
        return $this->roomtype_id;
    }

    function getRoomtype_name() {
        return $this->roomtype_name;
    }

    function getRoomtype_notes() {
        return $this->roomtype_notes;
    }

    function setRoomtype_id($roomtype_id) {
        $this->roomtype_id = $roomtype_id;
    }

    function setRoomtype_name($roomtype_name) {
        $this->roomtype_name = $roomtype_name;
    }

    function setRoomtype_notes($roomtype_notes) {
        $this->roomtype_notes = $roomtype_notes;
    }
}
?>