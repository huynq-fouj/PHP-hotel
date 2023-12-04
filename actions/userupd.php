<?php
if(isset($_POST["idForPost"]) && is_numeric($_POST["idForPost"])) {
    session_start();
    $id = $_POST["idForPost"];
    if($id > 0 && $id == $_SESSION["user"]["id"]) {
        require_once("../app/models/UserModel.php");
        require_once("../libraries/Utilities.php");
        $um = new UserModel();
        $user = $um->getUserById($id);
        if($user != null) {
            $fullname = trim($_POST["txtFullname"]);
            $email = trim($_POST["txtEmail"]);
            if($fullname != ""
                && checkEmail($email)) {
                $phone = $_POST["txtPhone"];
                $user->setUser_fullname($fullname);
                $user->setUser_email($email);
                $user->setUser_phone($phone);
                $result = $um->editUser($user);
                if($result) {
                    $_SESSION["user"]["fullname"] = $user->getUser_fullname();
                    $_SESSION["user"]["email"] = $user->getUser_email();

                    header("location:/hostay/views/profiles.php?suc=upd");
                } else {
                    header("location:/hostay/views/profiles.php?err=upd");
                }
            } else {
            header("location:/hostay/views/profiles.php?err=value");
            }
        } else {
            header("location:/hostay/views/profiles.php?err=noexist");
        }
    } else {
        header("location:/hostay/views/profiles.php?err=notok");
    }
} else {
    header("location:/hostay/views/profiles.php?err=notok");
}
?>