<?php
require_once("BasicModel.php");
require_once("objects/BillObject.php");

class BillModel extends BasicModel {
    
    function addBill(BillObject $item) : bool {
        $sql = "INSERT INTO tblbill(
            bill_room_id,bill_customer_id,bill_created_at,
            bill_fullname,bill_email,bill_phone,bill_start_date,
            bill_end_date,bill_number_adult,bill_number_children,
            bill_number_room,bill_notes,bill_static,bill_is_paid,bill_cancel
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {

            $room_id = $item->getBill_room_id();
            $customer_id = $item->getBill_customer_id();
            $created_at    = $item->getBill_created_at();
            $fullname = $item->getBill_fullname();
            $email = $item->getBill_email();
            $phone = $item->getBill_phone();
            $start_date   = $item->getBill_start_date();
            $end_date = $item->getBill_end_date();
            $number_adult = $item->getBill_number_adult();
            $number_children    = $item->getBill_number_children();
            $number_room = $item->getBill_number_room();
            $notes = $item->getBill_notes();
            $static = $item->getBill_static();
            $isPaid = $item->getBill_is_paid();
            $isCancel = 0;
            
            $stmt->bind_param("iissssssiiisiii",
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
                                $static,
                                $isPaid,
                                $isCancel);
            return $this->addV2($stmt);
        }
        return false;
    }

    function delBill(BillObject $item) : bool {
        $sql = "DELETE FROM tblbill WHERE bill_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getBill_id();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editBill(BillObject $item) : bool {
        $sql = "UPDATE tblbill SET bill_static=?,bill_is_paid=?,bill_cancel=?,bill_staff_name=? WHERE bill_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $static = $item->getBill_static();
            $isPaid = $item->getBill_is_paid();
            $isCancel = $item->getBill_cancel();
            $staff_name = $item->getBill_staff_name();
            $id = $item->getBill_id();
            $stmt->bind_param("iiisi", $static, $isPaid, $isCancel, $staff_name, $id);
            return $this->editV2($stmt);
        }
        return false;
    }

    function getBill($id) {
        $item = null;
        $sql = "SELECT * FROM tblbill ";
        $sql .= "LEFT JOIN tblbillstatic ON tblbill.bill_static = tblbillstatic.billstatic_id ";
        $sql .= "WHERE bill_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("BillObject");
        }
        return $item;
    }

    function getBills(BillObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblbill LEFT JOIN tblbillstatic ON tblbill.bill_static = tblbillstatic.billstatic_id ";
        $sql .= $this->createConditions($similar);
        $sql .= "ORDER BY bill_id DESC ";
        $sql .= "LIMIT $at, $total;";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('BillObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $list;
    }

    function countBill(BillObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblbill LEFT JOIN tblbillstatic ON tblbill.bill_static = tblbillstatic.billstatic_id ";
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

    private function createConditions(BillObject $similar) {
        $out = "";
        if($similar->getBill_customer_id() != null) {
            $user_id = $similar->getBill_customer_id();
            $out .= "bill_customer_id=$user_id ";
        }

        if($out != "") {
            $out = "WHERE $out";
        }
        return $out;
    }

    /**
     * @param int $time
     * @param string $option  'DAY' / 'MONTH' / 'YEAR'
     */
    function countByTime($time, $option = "DAY") {
        $sql = "SELECT COUNT(*) AS total FROM tblbill ";
        switch($option) {
            case "DAY":
                $sql .= "WHERE DAY(bill_created_at) = $time";
                break;
            case "MONTH":
                $sql .= "WHERE MONTH(bill_created_at) = $time";
                break;
            case "YEAR":
                $sql .= "WHERE YEAR(bill_created_at) = $time";
                break;
            default:
                break;
        }
        $sql .= ";";
        $total = 0;
        try {
            if($result = $this->get($sql)){
                if($row = $result->fetch_array()) {
                    $total = $row[0];
                }
            }
        } catch(Exception $e) {
            echo $sql."</br>".$e->getMessage()."</br>";
        }
        return $total;

    }

    /**
     * @param int $day
     * @param int $month
     * @param int $year
     * @param string $option  'DAY' / 'MONTH' / 'YEAR'
     * @return array
     */
    function getByTime($day, $month, $year, $option = "DAY", $isPaid = true) {
        $list = array();
        $sql = "SELECT * FROM tblbill ";
        switch($option) {
            case "DAY":
                $sql .= "WHERE DAY(bill_created_at) = $day AND MONTH(bill_created_at) = $month AND YEAR(bill_created_at) = $year";
                break;
            case "MONTH":
                $sql .= "WHERE MONTH(bill_created_at) = $month AND YEAR(bill_created_at) = $year";
                break;
            case "YEAR":
                $sql .= "WHERE YEAR(bill_created_at) = $year";
                break;
            default:
                break;
        }
        if($isPaid) {
            $sql .= " AND bill_is_paid!=0";
        }
        $sql .= ";";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('BillObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            echo $sql."</br>".$e->getMessage()."</br>";
        }
        return $list;

    }

    function getNewBill($user_id) {
        $item = null;
        $sql = "SELECT * FROM tblbill ";
        $sql .= "LEFT JOIN tblbillstatic ON tblbill.bill_static = tblbillstatic.billstatic_id ";
        $sql .= "WHERE bill_customer_id=$user_id ";
        $sql .= "ORDER BY bill_id DESC ";
        $sql .= "LIMIT 0,1 ";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("BillObject");
        }
        return $item;
    }

}
?>