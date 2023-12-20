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
require_once("../app/models/BillModel.php");
require_once("components/BillLibrary.php");
require_once("components/Paging.php");
//Khởi tạo đối tượng
$bm = new BillModel();
$similar = new BillObject();

//Lấy chỉ số cho phân trang
$url = "/hostay/admin/bills.php?";
$page = 1;
$totalperpage = 10;
$total = $bm->countBill($similar);
if(isset($_GET["page"])) {
    $savePage = $_GET["page"];
    if(is_numeric($savePage) && $savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$items = $bm->getBills($similar, $page, $totalperpage);

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
          <li class="breadcrumb-item active">Đơn đặt phòng</li>
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
                                <a href="/hostay/actions/billexcel.php" class="btn btn-success"><i class="bi bi-filetype-xlsx"></i> Xuất Excel</a>
                            </div>
                        </div>
                        <?=BillTable($items)?>
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