<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/bills.php?err=value");
        } else {
            require_once("../app/models/BillModel.php");
            $bm = new BillModel();
            $bill = $bm->getBill($_GET["id"]);
            if($bill != null){
                $result = $bm->delBill($bill);
                if($result) {
                    header("location:/hostay/admin/bills.php?suc=del");
                } else {
                    header("location:/hostay/admin/bills.php?err=del");
                }
            } else {
                header("location:/hostay/admin/bills.php?err=noexist");
            }
        }
    }
}
?>