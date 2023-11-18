<?php
session_start();
unset($_SESSION["user"]);
if(isset($_GET["redirect"])) {
    if($_GET["redirect"] == "admin") {
        header("location:/hostay/admin");
    }
} else {
    header("location:/hostay/views");
}
?>