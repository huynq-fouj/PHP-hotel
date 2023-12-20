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
$_SESSION["active"] = "rolist";
//
require_once("../app/models/RoomModel.php");
require_once("components/RoomLibrary.php");
require_once("components/Paging.php");
$rm = new RoomModel();
$similar = new RoomObject();
//Search
$saveKey = "";
$param = "";
if(isset($_GET["key"])) {
    $saveKey = trim($_GET["key"]);
}
if($saveKey != "") {
    $similar->setRoom_hotel_name($saveKey);
    $param = "key=$saveKey";
}
//Phân trang
$url = "/hostay/admin/rooms.php?";
if($param != "") {
    $url .= "$param&";
}
$total = $rm->countRoom($similar);
$page = 1;
$totalperpage = 10;
if(isset($_GET["page"])) {
    $savePage = $_GET["page"];
    if(is_numeric($savePage) && $savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$rooms = $rm->getRooms($similar, $page, $totalperpage);

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
          <li class="breadcrumb-item active">Phòng</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <div class="row my-3">
                            <div class="col-md-12">
                                <a href="/hostay/admin/addroom.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Thêm phòng</a>
                            </div>
                        </div>
                        <?=RoomTable($rooms)?>
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