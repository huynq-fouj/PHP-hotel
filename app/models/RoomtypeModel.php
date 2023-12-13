<?php
require_once("objects/RoomtypeObject.php");
require_once("BasicModel.php");

class RoomtypeModel extends BasicModel {
    
    function addRoomtype(RoomtypeObject $item) : bool {
        $sql = "INSERT INTO tblroomtype(roomtype_name, roomtype_notes) VALUES(?,?)";
        if($stmt = $this->con->prepare($sql)) {

            $name = $item->getRoomtype_name();
            $notes = $item->getRoomtype_notes();
            
            
            $stmt->bind_param("ss",$name, $notes);
            return $this->addV2($stmt);
        }
        return false;
    }

    function delRoomtype(RoomtypeObject $item) : bool {
        $sql = "DELETE FROM tblroomtype WHERE roomtype_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getRoomtype_id();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editRoomtype(RoomtypeObject $item) : bool {
        $sql = "UPDATE tblroomtype SET roomtype_name=?,roomtype_notes=? WHERE roomtype_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $name = $item->getRoomtype_name();
            $notes = $item->getRoomtype_notes();
            $id = $item->getRoomtype_id();
            $stmt->bind_param("ssi",$name, $notes,$id);
            return $this->editV2($stmt);
        }
        return false;
    }

    function getRoomtype($id) {
        $item = null;
        $sql = "SELECT * FROM tblroomtype ";
        $sql .= "WHERE roomtype_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("RoomtypeObject");
        }
        return $item;
    }

    function getRoomtypes(RoomtypeObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblroomtype ";
        $sql .= "ORDER BY roomtype_id ASC ";
        $sql .= "LIMIT $at, $total;";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('RoomtypeObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $list;
    }

    function countRoomtype(RoomtypeObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblroomtype ";
        $sql .= ";";
        $total = 0;
        if($result = $this->get($sql)){
            if($row = $result->fetch_array()) {
                $total = $row[0];
            }
        }
        return $total;
    }


}
?>