<?php
require_once("objects/CheckinObject.php");
require_once("BasicModel.php");

class CheckinModel extends BasicModel{
    function addBill(CheckinObject $item) : bool {
        $sql = "INSERT INTO checkin(
            first_indentity_card, second_indentity_card, checkin_code, checkin_date, bill_id, checkin_user, description
            ) VALUES(?,?,?,?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {
    
            $firstImg = $item->getFirstIndentityCard();
            $secondImg = $item->getSecondIndentityCard();
            $checkinCode = $item->getCheckinCode();
            $checkinDate = $item->getCheckinDate();
            $checkinUser = $item->getCheckinUser();
            $description = $item->getDescription();
            $billId = $item->getBillId();
            
            $stmt->bind_param("sssssss",
                                $firstImg, $secondImg, $checkinCode, $checkinDate,$billId, 
                            $checkinUser, $description);
            return $this->addV2($stmt);
        }
        return false;
    }

    function getCheckinById($id) : CheckinObject | null{
        $item = null;
        $sql = "SELECT * FROM checkin WHERE checkin_id='$id'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("CheckinObject");
        }
        return $item;
    }


    function getCheckinByCode($checkinCode) : CheckinObject | null{
        $item = null;
        $sql = "SELECT * FROM checkin WHERE checkin_code='$checkinCode'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("CheckinObject");
        }
        return $item;
    }
    function isExists($checkinCode) : bool {
        $item = null;
        $sql = "SELECT * FROM checkin ";
        $sql .= "WHERE checkin_code='$checkinCode'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            return true;
        }
        return false;;
    }

    function updateCheckin(CheckinObject $item) : bool {
        $sqlStatement = "UPDATE checkin SET checkin_date=?,status=?,
            description=? WHERE checkin_id=?";
        if($sqlQuery = $this->con->prepare($sqlStatement)) {
            
            $checkinDate = $item->getCheckinDate();
            $checkinStatus = $item->getStatus();
            $checkinDescription = $item->getDescription();
            $checkId = $item->getCheckinId();

            $sqlQuery->bind_param("sssi",
                $checkinDate, $checkinStatus, $checkinDescription, $checkId
        );

                                
            return $this->editV2($sqlQuery);
        }
        return false;
    }

    function getCheckins(CheckinObject $similar, $page, $total, $sort_type = "lastest") : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM checkin ";
        //$sql .= $this->createConditions($similar);
        switch($sort_type) {
            case "pricet":
                $sql .= "ORDER BY percent ASC ";
                break;
            case "priceg":
                $sql .= "ORDER BY percent DESC ";
                break;
            default:
                $sql .= "ORDER BY checkin_id ASC ";
                break;
        }
        $sql .= "LIMIT $at, $total;";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('CheckinObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $list;
    }

    function countCheckin(CheckinObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM checkin ";
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
 }