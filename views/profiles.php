<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/views");
}

require_once "layouts/header.php";
?>

<?php
require_once "layouts/footer.php";
?>