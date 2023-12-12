<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_POST["idForPost"]) || $_POST["idForPost"] <= 0 || !is_numeric($_POST["idForPost"])) {
            header("location:/hostay/admin/billstatics.php?err=value");
        } else {
            require_once("../app/models/BillstaticModel.php");
            $bm = new BillstaticModel();
            $item = $bm->getBillstatic($_POST["idForPost"]);
            if($item != null){
                $name = $_POST["txtName"];
                if($name != "") {
                    $notes = $_POST["txtNotes"];
                    $item->setBillstatic_name($name);
                    $item->setBillstatic_notes($notes);
                    $result = $bm->editBillstatic($item);
                    if($result) {
                        header("location:/hostay/admin/billstatics.php?suc=upd");
                    } else {
                        header("location:/hostay/admin/billstatics.php?err=upd");
                    }
                } else {
                    header("location:/hostay/admin/billstatics.php?err=value");
                }
            } else {
                header("location:/hostay/admin/billstatics.php?err=noexist");
            }
        }
    }
}
?>