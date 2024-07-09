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
$_SESSION["pos"] = "checkin";
$_SESSION["active"] = "checkinqr";
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

<style>
    .btn-uploaded::before
    {
        display: none;
    }
    .btn-uploaded::after
    {
        display: none;
    }
    .html5-qrcode-element {
        align-items: center;
        appearance: button;
        background-color: #0276ff;
        border-radius: 8px;
        border-style: none;
        box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: flex;
        flex-direction: row;
        flex-shrink: 0;
        font-family: "RM Neue", sans-serif;
        font-size: 100%;
        line-height: 1.15;
        margin: 0;
        padding: 10px 21px;
        text-align: center;
        text-transform: none;
        transition: color 0.13s ease-in-out, background 0.13s ease-in-out,
            opacity 0.13s ease-in-out, box-shadow 0.13s ease-in-out;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        padding-top: 10px;
    }

    .html5-qrcode-element:active {
        background-color: #006ae8;
    }

    .html5-qrcode-element:hover {
        background-color: #1c84ff;
    }

    #html5-qrcode-anchor-scan-type-change {
        display: none;
        margin-top: 10px;
    }

    #html5-qrcode-button-camera-permission{
        margin-left: 125px;
    }

</style>
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
                    <div class="container">
                    <div class="row my-3">
                        <label for="" class="col-form-label fw-bold">Scan checkin code</label>
                        <div class="col-md-6 mt-3 mx-auto"> <!-- Sử dụng lớp mx-auto để căn giữa -->
                        <div class="btn-uploaded" style="background-image: none;">
                            <div style="width: 800px" id="reader"></div>
                        </div>
                        </div>
                    </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
   function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`);
        // Điều hướng đến trang editcheckin.php với tham số id là giá trị từ mã QR
        location.href = `/hostay/actions/checkincode.php?code=${encodeURIComponent(decodedText)}`;
    }

    function onScanError(errorMessage) {
        // handle on error condition, with error message
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
<!--End main page-->
<!--End main page-->
<?php
require_once("layouts/footer.php");
?>