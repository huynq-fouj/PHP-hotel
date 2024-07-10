<?php
require_once("../libraries/Utilities.php");
require_once "../app/models/CheckinModel.php";
session_start();

$currentFileName = basename($_SERVER['PHP_SELF'], '.php');

if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
} else {
    if (!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        headerRedirect("permis", "err", "login");
    }
}

    if(isset($_GET["code"]) && strlen((string)$_GET["code"]) > 10){
        headerRedirect("noexist", "err", "checkinqr");
    }


    $checkinModel = new CheckinModel();
    $checkinItem = $checkinModel->getCheckinByCode($_GET["code"]);

    if($checkinItem == null){
        headerRedirect("noexist", "err", "checkinqr");
    } 

    $checkinId = $checkinItem->getCheckinId();

    headerRedirectViews(null, null, "/hostay/admin/editcheckin.php?id=$checkinId");

?>