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

if (isset($_POST["checkout"])) {

    // require dependencies
    require_once("../app/models/CheckinModel.php");
    require_once("../app/models/CheckoutModel.php");
    require_once("../app/models/BillModel.php");

    // util variables
    $url = "/hostay/views/checkout.php?";

    // get data from form
    $billId = trim($_POST["txtBillId"]);
    $checkoutDate = $_POST["txtCheckoutDate"];
    $username = $_POST["txtUsername"];


    if(!empty($billId) && !empty($checkoutDate)){


        if(!is_numeric($billId)){
            headerRedirectViews("err", "noexist", $url);
        }

        $billModel = new BillModel();
        $checkoutModel = new CheckoutModel();

        $billItem = $billModel->getBillById($billId);

        if($billItem == null){
            headerRedirectViews("err", "bill_id", $url);
        }

        $checkinModel = new CheckinModel();
        
        if($checkinModel->getCheckinByCode($billItem->getBillCheckinCode()) == null){
            headerRedirectViews("err", "no_checkin", $url);
        }

        if($checkoutDate > $billItem->getBill_end_date()){
            headerRedirectViews("err", "checkout_end_date", $url);
        }

        if($checkoutDate < $billItem->getBill_start_date()){
            headerRedirectViews("err", "checkout_start_date", $url);
        }

        if($checkoutModel->getCheckoutByBillId($billId) != null){
            headerRedirectViews("err", "checkout_exist", $url);
        }


        $checkoutItem = new CheckoutObject();

        $checkoutItem->setBillId($billId);
        $checkoutItem->setCheckoutByUser($username);
        $checkoutItem->setCheckoutDate($checkoutDate);
        $checkoutItem->setDescription($_POST["txtDescription"]);

        
        if($checkoutModel->addCheckout($checkoutItem)){
            $billModel->updateBillStatus($billItem, "checkout");
            headerRedirectViews("suc", "checkout", $url);
        } else{
            headerRedirectViews("err", "checkout", $url);
        }
        
    } else{
        headerRedirectViews("err", "lack", $url);
    }
}