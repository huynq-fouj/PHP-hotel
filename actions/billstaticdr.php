<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/billstatics.php?err=value");
        } else {
            require_once("../app/models/BillstaticModel.php");
            $bsm = new BillstaticModel();
            $bs = $bsm->getBillstatic($_GET["id"]);
            if($bs != null){
                $result = $bsm->delBillstatic($bs);
                if($result) {
                    header("location:/hostay/admin/billstatics.php?suc=del");
                } else {
                    header("location:/hostay/admin/billstatics.php?err=del");
                }
            } else {
                header("location:/hostay/admin/billstatics.php?err=noexist");
            }
        }
    }
}
?>