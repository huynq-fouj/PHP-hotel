<?php
if(isset($_POST["idForPost"]) && is_numeric($_POST["idForPost"])) {
    session_start();
    $id = $_POST["idForPost"];
    if($id > 0 && $id == $_SESSION["user"]["id"]) {
        require_once __DIR__."/../app/models/UserModel.php";
        require_once __DIR__."/../libraries/Utilities.php";
        $um = new UserModel();
        $user = $um->getUserById($id);
        if($user != null) {
            
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