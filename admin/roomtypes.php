<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    }
}
//
$_SESSION["pos"] = "room";
$_SESSION["active"] = "rotype";
//
require_once("../app/models/RoomtypeModel.php");
require_once("components/RoomtypeLibrary.php");
require_once("components/Paging.php");
//Khởi tạo đối tượng
$rtm = new RoomtypeModel();
$similar = new RoomtypeObject();

//Lấy chỉ số cho phân trang
$url = "/hostay/admin/roomtypes.php?";
$page = 1;
$totalperpage = 10;
$total = $rtm->countRoomtype($similar);
if(isset($_GET["page"])) {
    $savePage = $_GET["page"];
    if(is_numeric($savePage) && $savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$items = $rtm->getRoomtypes($similar, $page, $totalperpage);

require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Danh sách</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh sách loại phòng</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <?=RoomtypeTable($items)?>
                        <?=Paging($url, $page, $total, $totalperpage)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--End main page-->
<?php
require_once("layouts/footer.php");
?>