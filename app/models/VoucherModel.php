<?php

require_once("BasicModel.php");
require_once("objects/VoucherObject.php");

class VoucherModel extends BasicModel{

    // function addVoucher(VoucherObject $item) : bool{
    //     $sqlStatement = "INSERT INTO voucher (
    //         voucher_code, description, start_date, expire_date, percent, discount_limit,
    //         status, usage_count, min_order_value, user_id) VALUES (?,?,?,?,?,?,?,?,?,?)
    //     )";

    //     if($query = $this->con->prepare($sqlStatement)){
    //         $voucherCode = $item->getVoucherCode();
    //         $description = $item->getDescription();
    //         $startDate = $item->getStartDate();
    //         $expireDate = $item->getExpireDate();
    //         $percent = $item->getPercent();
    //         $discountLimit = $item->getDiscountLimit();
    //         $status = $item->getStatus();
    //         $usageCount = $item->getUsageCount();
    //         $minOrderValue = $item->getMinOrderValue(); 
    //         $userId = $item->getUserID();
    //     }
    // }

    function getVoucher($id) {
        $item = null;
        $sql = "SELECT * FROM voucher WHERE voucher_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object('VoucherObject');
        }
        return $item;
    }


    function getVouchers(VoucherObject $similar, $page, $total, $sort_type = "lastest") : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM voucher ";
        //$sql .= $this->createConditions($similar);
        switch($sort_type) {
            case "pricet":
                $sql .= "ORDER BY percent ASC ";
                break;
            case "priceg":
                $sql .= "ORDER BY percent DESC ";
                break;
            default:
                $sql .= "ORDER BY voucher_id ASC ";
                break;
        }
        $sql .= "LIMIT $at, $total;";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('VoucherObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $list;
    }

    //  private function createConditions(RoomObject $similar) {
    //     $out = "";
    //     if($similar->getRoom_hotel_name() != null) {
    //         $key = $similar->getRoom_hotel_name();
    //         $out .= "(room_hotel_name LIKE '%$key%')
    //                  OR (room_address LIKE '%$key%')
    //                  OR (room_bed_type LIKE '%$key%') ";
    //     }
    //     if($similar->getRoom_type_id() != null) {
    //         if($out != "") {
    //             $out .= " AND ";
    //         }
    //         $type = $similar->getRoom_type_id();
    //         $out .= "(room_type_id = $type) ";
    //     }
    //     if($similar->getRoom_address() != null) {
    //         if($out != "") {
    //             $out .= " AND ";
    //         }
    //         $address = $similar->getRoom_address();
    //         $out .= "(room_address LIKE '%$address%') ";
    //     }
    //     if($similar->getRoom_price() != null) {
    //         if($out != "") {
    //             $out .= " AND ";
    //         }
    //         $price = $similar->getRoom_price();
    //         $out .= "(room_price < $price) ";
    //     }
    //     if($out != "") {
    //         $out = "WHERE ".$out;
    //     }
    //     return $out;
    // }

    function countVoucher(VoucherObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM voucher ";
        //$sql .= $this->createConditions($similar);
        $sql .= ";";
        $total = 0;
        try {
            if($result = $this->get($sql)){
                if($row = $result->fetch_array()) {
                    $total = $row[0];
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $total;
    }

    function delVoucher(VoucherObject $item) : bool {
        $sql = "DELETE FROM voucher WHERE voucher_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getVoucherId();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

}