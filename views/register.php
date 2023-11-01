<?php
require_once "../app/models/UserModel.php";
require_once "../libraries/Utilities.php";

session_start();
$message = "";
if(isset($_POST["register"])) {
    $user_name = isset($_POST["txtUserName"]) ? trim($_POST["txtUserName"]) : null;
    $user_pass1 = isset($_POST["txtPass1"]) ? trim($_POST["txtPass1"]) : null;
    $user_pass2 = isset($_POST["txtPass2"]) ? trim($_POST["txtPass2"]) : null;
    $user_fullname = isset($_POST["txtFullName"]) ? trim($_POST["txtFullName"]) : null;
    $user_email = isset($_POST["txtEmail"]) ? trim($_POST["txtEmail"]) : null;
    if($user_name != null && $user_name != ""
        && checkValidPassWord($user_pass1, $user_pass2)
        && $user_fullname != null && $user_fullname != ""
        && $user_email != null && $user_email != "")
    {
        $um = new UserModel();
        $user = new UserObject();
        $user->setUser_name($user_name);
        $user->setUser_password($user_pass1);
        $user->setUser_fullname($user_fullname);
        $user->setUser_email($user_email);
        $user->setUser_permission(0);
        if(!$um->isExists($user)) {
            if($um->addUser($user)) {
                if($user_register = $um->getUser($user_name, $user_pass1)) {
                    $_SESSION["customer"]["id"] = $user_register->getUser_id();
                    $_SESSION["customer"]["name"] = $user_register->getUser_name();
                    $_SESSION["customer"]["email"] = $user_register->getUser_email();
                    $_SESSION["customer"]["fullname"] = $user_register->getUser_fullname();
                    header("location:../");
                }else {
                    header("location:login.php");
                }
            }else {
                $message = "Có lỗi trong quá trình thực hiện";
            }
        } else {
            $message = "Tên đăng nhập đã tồn tại";
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
    <title>Đăng ký</title>
</head>
<body>
    
</body>
</html>