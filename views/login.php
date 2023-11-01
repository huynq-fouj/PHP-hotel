<?php
require_once "../app/models/UserModel.php";

session_start();
$message = "";
if(isset($_POST["login"])) {
    $user_name = isset($_POST["txtUserName"]) ? trim($_POST["txtUserName"]) : null;
    $user_pass = isset($_POST["txtPass1"]) ? trim($_POST["txtPass1"]) : null;
    if($user_name != null && $user_name != "" && $user_pass != null && $user_pass != "") {
        $um = new UserModel();
        $user = $um->getUser($user_name, $user_pass);
        if($user != null) {
            $_SESSION["customer"]["id"] = $user_register->getUser_id();
            $_SESSION["customer"]["name"] = $user_register->getUser_name();
            $_SESSION["customer"]["email"] = $user_register->getUser_email();
            $_SESSION["customer"]["fullname"] = $user_register->getUser_fullname();
            header("location:../");
        } else {
            $message = "Tài khoản hoặc mật khẩu không đúng";
        }
    } else {
        $message = "Vui lòng điền đầy đủ thông tin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    
</body>
</html>