<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        $name = $_POST["txtName"];
        if($name != "") {
            require_once("../app/models/BillstaticModel.php");
            $bsm = new BillstaticModel();
            $item = new BillstaticObject();
            $notes = $_POST["txtNotes"];
            $item->setBillstatic_name($name);
            $item->setBillstatic_notes($notes);
            $result = $bsm->addBillstatic($item);
            if($result) {
                header("location:/hostay/admin/billstatics.php?suc=add");
            } else {
                header("location:/hostay/admin/billstatics.php?err=add");
            }
        } else {
            header("location:/hostay/admin/billstatics.php?err=value");
        }
    }
}
?>