<?php
require_once __DIR__."/../app/models/RoomModel.php";
require_once __DIR__."/components/RoomLibrary.php";
require_once __DIR__."/components/Paging.php";

$rm = new RoomModel();
$similar = new RoomObject();
//Dữ liệu phân trang
$page = 1;
$url = "/hostay/views/rooms.php?";
$total = $rm->countRoom($similar);
$totalperpage = 6;
if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
    $savePage = $_GET["page"];
    if($savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$rooms = $rm->getRooms($similar, $page, $totalperpage);

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/layouts/Toaster.php";
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
require_once __DIR__."/layouts/footer.php"
?>