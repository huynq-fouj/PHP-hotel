<?php
require_once("objects/CheckoutObject.php");
require_once("BasicModel.php");

class CheckoutModel extends BasicModel{
    function addCheckout(CheckoutObject $item) : bool {
        $sql = "INSERT INTO checkout(
            bill_id, checkout_by_user, checkout_date, description
            ) VALUES(?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {
    
            $billId = $item->getBillId();
            $username = $item->getCheckoutByUser();
            $checkinDate = $item->getCheckoutDate();
            $description = $item->getDescription();
            
            $stmt->bind_param("isss",
                                $billId, $username, $checkinDate, $description);
            return $this->addV2($stmt);
        }
        return false;
    }

    function getCheckoutByBillId($id) : CheckoutObject | null{
        $item = null;
        $sql = "SELECT * FROM checkout WHERE bill_id='$id'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("CheckoutObject");
        }
        return $item;
    }
}