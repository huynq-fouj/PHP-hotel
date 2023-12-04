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
            $pass = trim($_POST["txtPass"]);
            $pass1 = trim($_POST["txtPass1"]);
            $pass2 = trim($_POST["txtPass2"]);
            if($pass != "" && checkValidPassWord($pass1, $pass2)) {
                if(md5($pass) === $user->getUser_password()) {
                    $user->setUser_password($pass1);
                    if($um->editUser($user, "PASS")) {
                        unset($_SESSION["user"]);
                        header("location:/hostay/views/login.php");
                    } else {
                        header("location:/hostay/views/profiles.php?err=upd");
                    }
                } else {
                    header("location:/hostay/views/profiles.php?err=pass");
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