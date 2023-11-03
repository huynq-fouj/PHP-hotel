<?php
require_once "BasicModel.php";
require_once "objects/RoombookObject.php";

class RoombookModel extends BasicModel {
    
    function addRoombook(RoombookObject $item) : bool {
        $sql = "INSERT INTO tblroombook(
            rb_room_id,rb_customer_id,rb_created_at,
            rb_fullname,rb_email,rb_phone,rb_start_date,
            rb_end_date,rb_number_adult,rb_number_children,
            rb_number_room,rb_notes,rb_static
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {

            $room_id = $item->getRb_room_id();
            $customer_id = $item->getRb_customer_id();
            $created_at    = $item->getRb_created_at();
            $fullname = $item->getRb_fullname();
            $email = $item->getRb_email();
            $phone = $item->getRb_phone();
            $start_date   = $item->getRb_start_date();
            $end_date = $item->getRb_end_date();
            $number_adult = $item->getRb_number_adult();
            $number_children    = $item->getRb_number_children();
            $number_room = $item->getRb_number_room();
            $notes = $item->getRb_notes();
            $static = $item->getRb_static();
            
            $stmt->bind_param("iissssssiiisi",
                                $room_id,
                                $customer_id,
                                $created_at,
                                $fullname,
                                $email,
                                $phone,
                                $start_date,
                                $end_date,
                                $number_adult,
                                $number_children,
                                $number_room,
                                $notes,
                                $static);
            return $this->addV2($stmt);
        }
        return false;
    }

    function delRoombook(RoombookObject $item) : bool {
        $sql = "DELETE FROM tblroombook WHERE rb_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getRb_id();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editRoombook(RoombookObject $item) : bool {
        $sql = "UPDATE tblroombook SET rb_static=? WHERE rb_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $static = $item->getRb_static();
            $id = $item->getRb_id();
            $stmt->bind_param("ii",$static,$id);
            return $this->editV2($stmt);
        }
        return false;
    }

    function getRoombook($id) {
        $item = null;
        $sql = "SELECT * FROM tblroombook WHERE rb_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("RoombookObject");
        }
        return $item;
    }

    function getRoombooks(RoombookObject $similar, $page, $total) : array {
        $list = array();
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblroombook ";
        $sql .= "LIMIT $at, $total;";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            while($item = $result->fetch_object('RoombookObject')) {
                array_push($list, $item);
            }
        }
        return $list;
    }

    function countRoombook(RoombookObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblroombook ";
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