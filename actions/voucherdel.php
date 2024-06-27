<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/voucher.php?err=value");
        } else {
            require_once("../app/models/VoucherModel.php");
            require_once("../libraries/DeleteFile.php");
            $voucherModel = new VoucherModel();
            $voucher = $voucherModel->getVoucher($_GET["id"]);
            if($voucher != null){
                $result = $voucherModel->delVoucher($voucher);
                if($result) {
                    header("location:/hostay/admin/vouchers.php?suc=del");
                } else {
                    header("location:/hostay/admin/vouchers.php?err=del");
                }
            } else {
                header("location:/hostay/admin/vouchers.php?err=noexist");
            }
        }
    }
}
?>