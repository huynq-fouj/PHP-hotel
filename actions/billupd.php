<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(isset($_POST["updSta"])) {
            if(isset($_POST["idForPost"]) && is_numeric($_POST["idForPost"])) {
                require_once("../app/models/BillModel.php");

                $id = trim($_POST["idForPost"]);
                $arrSta = array(1,2,3,4,5);
                $bm = new BillModel();
                $item = $bm->getBill($id);
                if($item != null) {
                    $static = trim($_POST["slcStatic"]);
                    if($static != ""
                    && is_numeric($static)
                    && in_array((int)$static, $arrSta)) {
                        $item->setBill_static((int) $static);
                        if($bm->editBill($item)) {
                            header("location:/hostay/admin/bill.php?id=$id&suc=upd");
                        } else {
                            header("location:/hostay/admin/bill.php?id=$id&err=upd");
                        }
                    } else {
                        header("location:/hostay/admin/bill.php?id=$id&err=value");
                    }
                } else {
                    header("location:/hostay/admin/bills.php?err=noexist");
                }
            } else {
                header("location:/hostay/admin/bills.php?err=notok");
            }
        } else {
            header("location:/hostay/admin/bills.php");
        }
    }
}
?>