<?php
require_once("../app/models/RoomModel.php");
require_once("components/RoomLibrary.php");
require_once("components/Paging.php");

$rm = new RoomModel();
$similar = new RoomObject();
$param = "";
if(isset($_GET["key"]) && trim($_GET["key"]) != "") {
  $saveKey = trim($_GET["key"]);
  $similar->setRoom_hotel_name($saveKey);
  $param = "key=".$saveKey;
}
if(isset($_GET["slt"]) && trim($_GET["slt"]) != "" && is_numeric(trim($_GET["slt"]))) {
  if($param != "") {
    $param .= "&";
  }
  $saveType = trim($_GET["slt"]);
  $similar->setRoom_type_id($saveType);
  $param .= "slt=".$saveType;
}
if(isset($_GET["sla"]) && trim($_GET["sla"]) != "") {
  if($param != "") {
    $param .= "&";
  }
  $saveAddress = trim($_GET["sla"]);
  $similar->setRoom_address($saveAddress);
  $param .= "sla=".$saveAddress;
}
if(isset($_GET["slp"]) && trim($_GET["slp"]) != "" && is_numeric($_GET["slp"])) {
  if($param != "") {
    $param .= "&";
  }
  $savePrice = trim($_GET["slp"]);
  $similar->setRoom_price((float)$savePrice);
  $param .= "slp=".$savePrice;
}
$sortType = "";
if(isset($_GET["sort"]) && trim($_GET["sort"]) != "") {
  if($param != "") {
    $param .= "&";
  }
  $sortType = trim($_GET["sort"]);
  $param .= "sort=".$sortType;
}
//Dữ liệu phân trang
$page = 1;
$url = "/hostay/views/rooms.php?";
if($param != "") {
  $url .= $param."&";
}
$total = $rm->countRoom($similar);
$totalperpage = 6;
if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
    $savePage = $_GET["page"];
    if($savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$rooms = $rm->getRooms($similar, $page, $totalperpage, $sortType);

require_once("layouts/header.php");
require_once("layouts/Toaster.php");
?>
<main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Dịch vụ của chúng tôi</h1>
          <span class="color-text-a">Danh sách phòng</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/hostay/views/">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Đặt phòng
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Grid ======= -->
<section class="property-grid grid">
  <div class="container">
    <!-- Grid room -->
    <?=RoomGrid($rooms)?>
    <!-- Start Paging -->
    <?=Paging($url,$page,$total,$totalperpage)?>
    <!-- End Paging -->
</section><!-- End Property Grid Single-->

</main><!-- End #main -->
<?php
require_once("layouts/footer.php");
?>