<?php
session_start();
if(!isset($_SESSION["user"]) || $_SESSION["user"]["permission"] < 1) {
    header("location:/hostay/admin/login.php?err=permis");
}

require_once "layouts/header.php";
?>
<!--Start main page-->
<h1>Admin page</h1>
<!--End main page-->
<?php
require_once "layouts/footer.php";
?>