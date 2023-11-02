<?php
require_once "BasicModel.php";
require_once "objects/HotelObject.php";

class HotelModel extends BasicModel {
    
    function addHotel(HotelObject $item) : bool {
        $sql = "INSERT INTO tblhotel(
            hotel_name,hotel_detail,hotel_address,hotel_quality,
            hotel_image,hotel_number_room,hotel_number_floor,
            hotel_number_bar,hotel_number_restaurant,
            hotel_built_at,hotel_upgraded_at
        ) VALUES(?,?,?,?,?,?,?,?,?,?,?);";
        if($stmt = $this->con->prepare($sql)) {

            $name = $item->getHotel_name();
            $detail = $item->getHotel_detail();
            $address = $item->getHotel_address();
            $quality = $item->getHotel_quality();
            $image = $item->getHotel_image();
            $numberRoom = $item->getHotel_number_room();
            $numberFloor = $item->getHotel_number_floor();
            $numberBar = $item->getHotel_number_bar();
            $numberRes = $item->getHotel_number_restaurant();
            $builtAt = $item->getHotel_built_at();
            $upgradedAt = $item->getHotel_upgraded_at();

            $stmt->bind_param("sssdsiiiiss",
                            $name,
                            $detail,
                            $address,
                            $quality,
                            $image,
                            $numberRoom,
                            $numberFloor,
                            $numberBar,
                            $numberRes,
                            $builtAt,
                            $upgradedAt);
            return $this->addV2($stmt);
        }

        return false;
    }

    function delHotel(HotelObject $item) : bool {
        $sql = "DELETE FROM tblhotel WHERE hotel_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getHotel_id();
            $stmt->bind_param("i",$id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editHotel(HotelObject $item) : bool {
        $sql = "UPDATE tblhotel SET hotel_name=?,hotel_detail=?,
            hotel_address=?,hotel_quality=?,
            hotel_image=?,hotel_number_room=?,hotel_number_floor=?,
            hotel_number_bar=?,hotel_number_restaurant=?,
            hotel_upgraded_at=? WHERE hotel_id=?";
        if($stmt = $this->con->prepare($sql)) {
            
            $name = $item->getHotel_name();
            $detail = $item->getHotel_detail();
            $address = $item->getHotel_address();
            $quality = $item->getHotel_quality();
            $image = $item->getHotel_image();
            $numberRoom = $item->getHotel_number_room();
            $numberFloor = $item->getHotel_number_floor();
            $numberBar = $item->getHotel_number_bar();
            $numberRes = $item->getHotel_number_restaurant();
            $upgradedAt = $item->getHotel_upgraded_at();
            $id = $item->getHotel_id();

            $stmt->bind_param("sssdsiiiisi",
                            $name,
                            $detail,
                            $address,
                            $quality,
                            $image,
                            $numberRoom,
                            $numberFloor,
                            $numberBar,
                            $numberRes,
                            $upgradedAt,
                            $id);
            return $this->editV2($stmt);
        }
        return false;
    }

    /**
     * Lấy hotel thep id
     * @param mixed $id
     * Id của hotel cần lấy dữ liệu - int
     */
    function getHotel($id) {
        $item = null;
        $sql = "SELECT * FROM tblhotel WHERE hotel_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object('HotelObject');
        }
        return $item;
    }

    function getHotels(HotelObject $similar, $page, $total) : array {
        $list = array();
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblhotel ";
        $sql .= "LIMIT $at, $total;";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            while($item = $result->fetch_object('HotelObject')) {
                array_push($list, $item);
            }
        }
        return $list;
    }

    function countHotel(HotelObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblhotel ";
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