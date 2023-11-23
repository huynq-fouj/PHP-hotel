<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("location:/hostay/views");
}

require_once __DIR__."/layouts/header.php";
?>

<?php
require_once __DIR__."/layouts/footer.php";
?>