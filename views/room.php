<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("location:/hostay/views/login.php?err=login");
}
//
if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] <= 0) {
    header("location:/hostay/views/rooms.php");
}
//
$id = $_GET["id"];
//
require_once __DIR__."/../app/models/RoomModel.php";
require_once __DIR__."/../app/models/BillModel.php";
require_once __DIR__."/../libraries/Utilities.php";
require_once __DIR__."/../libraries/Sendmail.php";

$rm = new RoomModel();
$room = $rm->getRoom($id);
if($room == null) {
    header("location:/hostay/views/rooms.php?err=notok");
}

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/layouts/Toaster.php";
?>

<?php
require_once __DIR__."/layouts/footer.php"
?>