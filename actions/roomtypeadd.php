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
            require_once("../app/models/RoomtypeModel.php");
            $bsm = new RoomtypeModel();
            $item = new RoomtypeObject();
            $notes = $_POST["txtNotes"];
            $item->setRoomtype_name($name);
            $item->setRoomtype_notes($notes);
            $result = $bsm->addRoomtype($item);
            if($result) {
                header("location:/hostay/admin/roomtypes.php?suc=add");
            } else {
                header("location:/hostay/admin/roomtypes.php?err=add");
            }
        } else {
            header("location:/hostay/admin/roomtypes.php?err=value");
        }
    }
}
?>