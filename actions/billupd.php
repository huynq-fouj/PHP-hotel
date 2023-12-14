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
                require_once("../app/models/BillstaticModel.php");
                $id = trim($_POST["idForPost"]);
                $bsm = new BillstaticModel();
                $bm = new BillModel();
                $statics = $bsm->getBillstatics(new BillstaticObject, 1, 100);
                $arrStaid = array();
                foreach($statics as $it) {
                    array_push($arrStaid, $it->getBillstatic_id());
                }
                $item = $bm->getBill($id);
                if($item != null) {
                    $static = trim($_POST["slcStatic"]);
                    if($static != ""
                    && is_numeric($static)
                    && in_array((int)$static, $arrStaid)) {
                        $txtIsPaid = trim($_POST["slcPaid"]);
                        $isPaid = (($txtIsPaid != "") && is_numeric($txtIsPaid) && ($txtIsPaid != 0)) ? 1 : 0;
                        if($item->getBill_staff_name() == null || $item->getBill_staff_name() == "") {
                            $staffName = trim($_POST["txtStaffName"]);
                            if($staffName != "" && strlen($staffName) > 6) {
                                $item->setBill_staff_name($staffName);
                            } else {
                                header("location:/hostay/admin/bill.php?id=$id&err=lack");
                            }
                        }
                        $item->setBill_is_paid($isPaid);
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