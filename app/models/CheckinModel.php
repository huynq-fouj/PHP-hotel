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
}