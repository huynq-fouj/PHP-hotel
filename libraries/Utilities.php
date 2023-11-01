<?php
function checkValidPassWord(string $pass1, string $pass2) : bool {
    if($pass1 == null
        || $pass1 == ""
        || $pass2 == null
        || $pass2 == ""
        || $pass1 != $pass2) {
            return false;
        }
    return true;
}
?>