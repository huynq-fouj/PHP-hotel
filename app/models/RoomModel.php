<?php
require_once "BasicModel.php";
require_once "objects/RoomObject.php";

class RoomModel extends BasicModel {

    function addRoom(RoomObject $item) : bool {
        return false;
    }

    function delRoom(RoomObject $item) : bool {
        $sql = "DELETE FROM tblroom WHERE room_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getRoom_id();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editRoom(RoomObject $item) : bool {
        return false;
    }

}
?>