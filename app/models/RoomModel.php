<?php
require_once "BasicModel.php";
require_once "objects/RoomObject.php";

class RoomModel extends BasicModel {

    function addRoom(RoomObject $item) : bool {
        $sql = "INSERT INTO tblroom(
            room_number_people,room_number_bed,room_quality,
            room_type,room_bed_type,room_price,room_detail,room_area,
            room_static,room_image,room_address,room_hotel_name
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {
            $number_people = $item->getRoom_number_people();//int
            $number_bed = $item->getRoom_number_bed();//int
            $quality = $item->getRoom_quality();//float
            $type = $item->getRoom_type();//string
            $bed_type = $item->getRoom_bed_type();//int
            $price = $item->getRoom_price();//float
            $detail = $item->getRoom_detail();//string
            $area = $item->getRoom_area();//float
            $static = $item->getRoom_static();//int
            $image = $item->getRoom_image();//string
            $address = $item->getRoom_address();//string
            $hotel_name = $item->getRoom_hotel_name();//string

            $stmt->bind_param("iidsidsdisss",
                                $number_people,
                                $number_bed,
                                $quality,
                                $type,
                                $bed_type,
                                $price,
                                $detail,
                                $area,
                                $static,
                                $image,
                                $address,
                                $hotel_name);
            return $this->addV2($stmt);
        }
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
        $sql = "UPDATE tblroom SET room_number_people=?,room_number_bed=?,
            room_quality=?,room_type=?,room_bed_type=?,room_price=?,room_detail=?,
            room_area=?,room_static=?,
            room_image=?,room_address=?,room_hotel_name=? WHERE room_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $number_people = $item->getRoom_number_people();//int
            $number_bed = $item->getRoom_number_bed();//int
            $quality = $item->getRoom_quality();//float
            $type = $item->getRoom_type();//string
            $bed_type = $item->getRoom_bed_type();//int
            $price = $item->getRoom_price();//float
            $detail = $item->getRoom_detail();//string
            $area = $item->getRoom_area();//float
            $static = $item->getRoom_static();//int
            $image = $item->getRoom_image();//string
            $address = $item->getRoom_address();//string
            $hotel_name = $item->getRoom_hotel_name();//string
            $id = $item->getRoom_id();//int
            $stmt->bind_param("iidsidsdisssi",
                                $number_people,
                                $number_bed,
                                $quality,
                                $type,
                                $bed_type,
                                $price,
                                $detail,
                                $area,
                                $static,
                                $image,
                                $address,
                                $hotel_name,
                                $id);
            return $this->editV2($stmt);
        }
        return false;
    }

    function getRoom($id) {
        $item = null;
        $sql = "SELECT * FROM tblroom WHERE room_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object('RoomObject');
        }
        return $item;
    }

    function getRooms(RoomObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblroom ";
        $sql .= $this->createConditions($similar);
        $sql .= "LIMIT $at, $total;";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            while($item = $result->fetch_object('RoomObject')) {
                array_push($list, $item);
            }
        }
        return $list;
    }

    function countRoom(RoomObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblroom ";
        $sql .= $this->createConditions($similar);
        $sql .= ";";
        $total = 0;
        if($result = $this->get($sql)){
            if($row = $result->fetch_array()) {
                $total = $row[0];
            }
        }
        return $total;
    }

    private function createConditions(RoomObject $similar) {
        $out = "";

        if($out != "") {
            $out = "WHERE ".$out;
        }
        return $out;
    }

}
?>