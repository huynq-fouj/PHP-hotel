<?php
require_once("../libraries/Utilities.php");
session_start();

$currentFileName = basename($_SERVER['PHP_SELF'], '.php');

if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
} else {
    if (!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        headerRedirect("permis", "err", "login");
    }
}
//
$_SESSION["pos"] = "voucher";
$_SESSION["active"] = "voulist";
//
require_once("../app/models/VoucherModel.php");
require_once("components/VoucherLibrary.php");
require_once("components/Paging.php");

$voucherModel = new VoucherModel();
$voucherObject = new VoucherObject();

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
                            <div class="col-md-6 mt-3">
                                <label for="" class="col-form-label fw-bold">Scan checkin code</label>
                                <label class="btn-uploaded">
                                <img src="<?= $checkinItem->getFirstIndentityCard() ?>" class="img-uploaded first-img" alt="">
                                </label>
                            </div>
                            </div>
                        </div>
            
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