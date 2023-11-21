<?php
function checkValidPassWord(string $pass1, string $pass2) : bool {
    if($pass1 == null
        || $pass1 == ""
        || $pass2 == null
        || $pass2 == ""
        || $pass1 != $pass2
        || strlen($pass1) < 8) {
            return false;
        }
    return true;
}
function checkEmail($email) : bool {
    if($email != "" && str_contains($email, "@") && str_contains($email, ".")) {
        $arr = explode("@", $email);
        $str = $arr[0];
        if(strlen($str) >= 5) {
            return true;
        }
    }
    return false;
}
?>