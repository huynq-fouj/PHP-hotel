<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
            header("location:/hostay/admin/contacts.php?err=value");
        } else {
            require_once("../app/models/ContactModel.php");
            $cm = new ContactModel();
            $contact = $cm->getContact($_GET["id"]);
            if($contact != null){
                $contact->setContact_seen(1);
                $result = $cm->editContact($contact);
                if($result) {
                    header("location:/hostay/admin/contacts.php?suc=upd");
                } else {
                    header("location:/hostay/admin/contacts.php?err=upd");
                }
            } else {
                header("location:/hostay/admin/contacts.php?err=noexist");
            }
        }
    }
}
?>