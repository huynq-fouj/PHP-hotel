<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/users.php?err=value");
        } else {
            if($_SESSION["user"]["id"] != $_GET["id"]) {
                require_once __DIR__."/../app/models/UserModel.php";
                require_once __DIR__."/components/UserLibrary.php";
                $um = new UserModel();
                $user = new UserObject();
                $user->setUser_id($_GET["id"]);
                $result = $um->delUser($user);
                if($result) {
                    header("location:/hostay/admin/users.php");
                } else {
                    header("location:/hostay/admin/users.php?err=del");
                }
            } else {
                header("location:/hostay/admin/users.php?err=del");
            }
        }
    }
}
?>