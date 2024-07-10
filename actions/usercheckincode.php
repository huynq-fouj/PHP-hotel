<?php
require_once("../libraries/Utilities.php");
require_once "../app/models/CheckinModel.php";


session_start();

$currentFileName = basename($_SERVER['PHP_SELF'], '.php');

if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
}

    if(isset($_GET["code"]) && strlen((string)$_GET["code"]) > 10){
        headerRedirectViews("noexist", "err", "/hostay/views/histories.php?");
    }


    $checkinModel = new CheckinModel();
    $checkinItem = $checkinModel->getCheckinByCode($_GET["code"]);

    if($checkinItem == null){
        headerRedirectViews("err", "checkin_no", "/hostay/views/histories.php?");
    } 

    $checkinId = $checkinItem->getCheckinId();

    headerRedirectViews(null, null, "/hostay/views/billcheckin.php?id=$checkinId");

?>