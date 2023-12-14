<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/views/login.php");
} else {
    if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
        header("location:/hostay/views/histories.php?err=value");
    } else {
        require_once("../app/models/BillModel.php");
        $bm = new BillModel();
        $bill = $bm->getBill($_GET["id"]);
        if($bill != null){
            $bill->setBill_cancel(1);
            $result = $bm->editBill($bill);
            if($result) {
                header("location:/hostay/views/histories.php?suc=upd");
            } else {
                header("location:/hostay/views/histories.php?err=upd");
            }
        } else {
            header("location:/hostay/views/histories.php?err=noexist");
        }
    }
}
?>