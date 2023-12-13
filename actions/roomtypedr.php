<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/roomtypes.php?err=value");
        } else {
            require_once("../app/models/RoomtypeModel.php");
            $bsm = new RoomtypeModel();
            $bs = $bsm->getRoomtype($_GET["id"]);
            if($bs != null){
                $result = $bsm->delRoomtype($bs);
                if($result) {
                    header("location:/hostay/admin/roomtypes.php?suc=del");
                } else {
                    header("location:/hostay/admin/roomtypes.php?err=del");
                }
            } else {
                header("location:/hostay/admin/roomtypes.php?err=noexist");
            }
        }
    }
}
?>