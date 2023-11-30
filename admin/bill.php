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
$_SESSION["pos"] = "bill";
$_SESSION["active"] = "bilist";
//
if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
    header("location:/hostay/admin/bills.php");
}
//
require_once __DIR__."/../app/models/BillModel.php";
require_once __DIR__."/../app/models/RoomModel.php";

$id = $_GET["id"];
$bm = new BillModel();
$bill = $bm->getBill($id);
if($bill == null) {
    header("location:/hostay/admin/bills.php?err=noexist");
}
$rm = new RoomModel();
$room = $rm->getRoom($bill->getBill_room_id());

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/layouts/Toast.php";
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Danh sách</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Đơn đặt phòng</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <!-- Start preview room -->
                        <div class="row mt-3">
                            <?php
                                if($room == null) {
                            ?>
                                <div class="col-sm-12 d-flex justify-content-center text-danger">
                                    Phòng không tồn tại hoặc đã bị xóa khỏi cơ sở dữ liệu!
                                </div>
                            <?php
                                } else {
                            ?>
                                <div class="col-sm-12 mb-3 room-img-container">
                                    <img src="<?=$room->getRoom_image()?>" class="room-img" alt="">
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <div class="col-sm-12 fw-bold">Tên khách sạn</div>
                                    <div class="col-sm-12"><?=$room->getRoom_hotel_name()?></div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <div class="col-sm-12 fw-bold">Loại phòng</div>
                                    <div class="col-sm-12"><?=$room->getRoom_type()?></div>
                                </div>
                                <div class="col-sm-12 row mb-3">
                                    <div class="col-sm-12 fw-bold">Địa chỉ</div>
                                    <div class="col-sm-12"><?=$room->getRoom_address()?></div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <a href="/hostay/views/room.php?id=<?=$room->getRoom_id()?>">
                                        Click để xem chi tiết.
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- End preview room -->
                        <!-- Start bill detail -->
                        <div class="row mb-3">
                            
                        </div>
                        <!-- End bill detail -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--End main page-->
<?php
require_once __DIR__."/layouts/footer.php";
?>