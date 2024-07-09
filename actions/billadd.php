<?php
session_start();

// require utils dependencies
require_once "../libraries/Utilities.php";

// authentication
if (!isset($_SESSION["user"])) {
    headerRedirectViews(null, null, "/hostay/views/login.php");
}
if (!isset($_SESSION["user"]["id"])) {
    headerRedirectViews("err", "login", "/hostay/views/login.php?");
}

// check valid room id
if (isset($_POST["idForPost"]) && is_numeric($_POST["idForPost"])) {

    require_once "../app/models/RoomModel.php";
    require_once "../app/models/BillModel.php";
    require_once "../app/models/VoucherModel.php";

    // global variables
    $roomId = $_POST["idForPost"];
    $roomUrl = "/hostay/views/room.php?id=$roomId&";
    
    $rm = new RoomModel();

    if ($rm->getRoom($roomId) != null) {

        $user_id = $_SESSION["user"]["id"];
        $fullname = trim($_POST["txtFullname"]);
        $email = trim($_POST["txtEmail"]);
        $phone = trim($_POST["txtPhone"]);
        $numRoom = trim($_POST["txtNumberRoom"]);
        $numAdult = trim($_POST["txtNumberAdult"]);
        $numChild = trim($_POST["txtNumberChildren"]);
        $start = trim($_POST["txtStartDate"]);
        $end = trim($_POST["txtEndDate"]);
        $notes = trim($_POST["txtNotes"]);
        $personalID = trim($_POST["txtPersonalID"]);
        $voucher = strtoupper(trim($_POST["txtVoucher"]));

        // check empty input
        if (!empty($fullname) && checkEmail($email) && !empty($phone) 
            && !empty($numRoom) && !empty($numAdult) && !empty($start) 
            && !empty($end) && !empty($personalID) ) {

            if(!empty($voucher)){
                // check voucher valid
                $voucherModel = new VoucherModel();
                $voucherObject = $voucherModel->getVoucherByCode($voucher);
                // check voucher not found in database
                if($voucherObject == null){
                    headerRedirectViews("err", "invalid_voucher", $roomUrl);
                }
                // check usage limit
                if((int)$voucherObject->getUsageLimit() <= (int)$voucherObject->getUsageCount()){
                    headerRedirectViews("err", "limit", $roomUrl);
                }
                // check expire date
                $nowDate = date('Y-m-d');
                if(date($voucherObject->getExpireDate()) < $nowDate){
                    headerRedirectViews("err", "expire", $roomUrl);
                }
            }

            // valid input 
            if (!is_numeric($numRoom) || $numRoom < 1 || $numRoom > 5) {
                headerRedirectViews("err", "nr", $roomUrl);
            }
            if ( !is_numeric($numAdult) || $numAdult < 0 || $numAdult > 10) {
                headerRedirectViews("err", "na", $roomUrl);
            }
            if (!is_numeric($numChild) || $numChild < 0 || $numChild > 10) {
                headerRedirectViews("err", "nc", $roomUrl);
            }
            if ($numAdult == 0 && $numChild == 0) {
                headerRedirectViews("err", "np", $roomUrl);
            }
            if (!checkValidDate($start, $end)) {
                headerRedirectViews("err", "date", $roomUrl);
            }

            $bm = new BillModel();
            $item = new BillObject();
            $item->setBill_room_id($roomId);
            $item->setBill_customer_id($user_id);
            $item->setBill_email($email);
            $item->setBill_fullname($fullname);
            $item->setBill_notes($notes);
            $item->setBill_phone($phone);
            $item->setBill_number_room((int)$numRoom);
            $item->setBill_number_adult((int)$numAdult);
            $item->setBill_number_children((int)$numChild);
            $item->setBill_start_date(date("Y-m-d", strtotime($start)));
            $item->setBill_end_date(date("Y-m-d", strtotime($end)));
            $item->setBillPersonalId($personalID);
            $item->setBillVoucherCode($voucher);
            $item->setBill_static(1);
            $item->setBill_created_at(date("Y-m-d"));
            $item->setBill_is_paid(0);

            if ($bm->addBill($item)) {

                $newBill = $bm->getNewBill($item->getBill_customer_id());

                // increase usage voucher
                if(!empty($voucher)){
                    $voucherModel->updateUsedVoucher($voucherObject);
                }

                if ($newBill != null) {
                    $newbill_id = $newBill->getBill_id();
                    $checkinCode = generateRandomString(5) . $newbill_id;
                    $bm->addCheckinCode($checkinCode, $newbill_id);
                    headerRedirectViews(null, null, "/hostay/views/ticket.php?id=$newbill_id");
                } else {
                    headerRedirectViews("suc", "bia", $roomUrl);
                }
            } else {
                headerRedirectViews("err", "bia", $roomUrl);
            }

        } else {
            headerRedirectViews("err", "lack", $roomUrl);
        }
    } else{
        headerRedirectViews("err", "noexistr", "/hostay/views/rooms.php?");
    }
} else{
    headerRedirectViews("err", "value", "/hostay/views/rooms.php?");
}
