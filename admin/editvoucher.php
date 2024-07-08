<?php
session_start();

// require dependecies
require_once("../libraries/Utilities.php");
require_once("../app/models/VoucherModel.php");
require_once("../app/models/objects/VoucherObject.php");



// file name without .php 
$currentFileName = basename($_SERVER['PHP_SELF'], '.php');

// check permission
if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
} else {
    if (!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        headerRedirect("permis", "err", "login");
    }
}

// for sidebar
$_SESSION["pos"] = "voucher";
$_SESSION["active"] = "voulist";

// check valid id param
if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
    headerRedirect("noexist", "err", "vouchers");
}

// get Voucher
$voucherId = $_GET["id"];
$voucherModel = new VoucherModel();
$voucherItem = $voucherModel->getVoucher($voucherId);

if($voucherItem == null) {
    headerRedirect("noexist", "err", "vouchers");
}

if(isset($_POST["updateVoucher"])) {

    // get date from form input

    $voucherCode = trim($_POST['txtVoucherCode']);
    $percent = trim($_POST['txtPercent']);
    $discountLimit = trim($_POST['txtDiscountLimit']);
    $minOrderValue = trim($_POST['txtMinOrderValue']);
    $startDate = $_POST['txtStartDate'];
    $expireDate = $_POST['txtExpireDate'];
    $status = trim($_POST['statusSelect']);
    $description = trim($_POST['txtDescription']);
    $usageLimit = trim($_POST["txtUsageLimit"]);
    
    if(
        !empty($voucherCode) && !empty($usageLimit)
        && !empty($percent) && !empty($discountLimit)
        && !empty($minOrderValue) && !empty($startDate) 
        && !empty($expireDate) && !empty($status)
    ) {
        
        if ($percent < 1 || $discountLimit < 1 || $minOrderValue < 1 || $usageLimit < 1) {
            headerRedirect("invalid_value", "err", $currentFileName);
        }

        if ($startDate >= $expireDate) {
            headerRedirect("voucher_date", "err", $currentFileName);
        }


        $voucherItem->setVoucherCode($voucherCode);
        $voucherItem->setPercent($percent);
        $voucherItem->setDiscountLimit($discountLimit);
        $voucherItem->setMinOrderValue($minOrderValue);
        $voucherItem->setStartDate($startDate);
        $voucherItem->setExpireDate($expireDate);
        $voucherItem->setStatus($status);
        $voucherItem->setUsageLimit($usageLimit);
        $voucherItem->setDescription($description);

        if($voucherModel->updateVoucher($voucherItem)) {
            header("location:/hostay/admin/vouchers.php?suc=upd");
        } else {
            header("location:/hostay/admin/vouchers.php?err=upd");
        }
    } else {
        header("location:/hostay/admin/editvoucher.php?id=".'$id'."&err=lack");
    }
}

// require for html
require_once("layouts/header.php");
require_once("layouts/Toast.php");

?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Sửa voucher</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Voucher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <form action=""
                            method="post"
                            class="needs-validation"
                            novalidate>
                            <!-- <div class="row mt-3 mb-3">
                                <label for="" class="col-form-label fw-bold">Ảnh hiển thị</label>
                                <label for="roomImage"
                                    class="btn-uploaded">
                                    <img src="" class="img-uploaded" alt="">
                                </label>
                                <input type="file"
                                    id="roomImage"
                                    name="roomImage"
                                    class="form-control upload-img-input">
                            </div> -->
                            <div class="row mt-3 mb-3">
                                <label for="voucherCode" class="col-sm-2 col-form-label fw-bold">Voucher code</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="voucherCode"
                                        name="txtVoucherCode"
                                        placeholder="VOUCHERCODE"
                                        value="<?=$voucherItem->getVoucherCode()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập code khuyến mại
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="percent" class="col-sm-2 col-form-label fw-bold">Ưu đãi</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="percent"
                                        name="txtPercent"
                                        placeholder="100%"
                                        min = "1"
                                        max = "100"
                                        value="<?=$voucherItem->getPercent()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập phần trăm ưu đãi
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="discountLimit" class="col-sm-2 col-form-label fw-bold">Giảm tối đa</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="discountLimit"
                                        name="txtDiscountLimit"
                                        placeholder="100.000.000đ"
                                        min = "1"
                                        value="<?=$voucherItem->getDiscountLimit()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá giảm tối đa
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="minOrderValue" class="col-sm-2 col-form-label fw-bold">Đơn giá tối thiểu</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="minOrderValue"
                                        name="txtMinOrderValue"
                                        placeholder="100.000đ"
                                        min = "1"
                                        value="<?=$voucherItem->getMinOrderValue()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá đơn hàng tối thiểu
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="startDate" class="col-sm-2 col-form-label fw-bold">Ngày bắt đầu</label>
                                <div class="col-sm-10">

                                    <?php
                                        $formatStartDate = date_create($voucherItem->getStartDate());
                                        $formatExpireDate = date_create($voucherItem->getExpireDate());
                                    ?>

                                    <input type="date"
                                        class="form-control"
                                        id="startDate"
                                        name="txtStartDate"
                                        value="<?= $formatStartDate->format('Y-m-d') ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập ngày bắt đầu
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="txtExpireDate" class="col-sm-2 col-form-label fw-bold">Ngày kết thúc</label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        class="form-control"
                                        id="expireDate"
                                        name="txtExpireDate"
                                        value="<?=$formatExpireDate->format('Y-m-d')?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập ngày kết thúc
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="usageCount" class="col-sm-2 col-form-label fw-bold">Lượt sử dụng</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="usageCount"
                                        name="txtUsageCount"
                                        value="<?=$voucherItem->getUsageCount()?>"
                                        readonly
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá đơn hàng tối thiểu
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="usageLimit" class="col-sm-2 col-form-label fw-bold">Lượt sử dụng tối đa</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="usageLimit"
                                        name="txtUsageLimit"
                                        value="<?=$voucherItem->getUsageLimit()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập lượt sử dụng tối đa
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomStatic" class="col-sm-2 col-form-label fw-bold">Trạng thái</label>
                                <div class="col-sm-10">
                                    <?php
                                        $status = $voucherItem->getStatus();
                                    ?>
                                    <select name="statusSelect" id="statusSelect" class="form-control" required>
                                        <option value="active" <?=$status == "active" ? 'selected' : ''?>>Hoạt động</option>
                                        <option value="expired" <?=$status == "expired" ? 'selected' : ''?>>Hết hạn</option>
                                        <option value="used" <?=$status == "used" ? 'selected' : ''?>>Hết lượt sử dụng</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Hãy nhập chọn trạng thái
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="description" class="col-sm-2 col-form-label fw-bold">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="txtDescription"
                                        id="description"
                                        rows="6"
                                        class="form-control"
                                        placeholder="Description"><?=$voucherItem->getDescription()?></textarea>
                                </div>
                            </div>
                            
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="updateVoucher">
                                    Cập nhật thay đổi
                                </button>
                                <a class="btn btn-secondary col-md-2 col-sm-3 mt-3" href="">Xóa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--End main page-->
<script>
    let inImg = document.querySelector(".upload-img-input");
    inImg.addEventListener("change", async () => {
        let img = document.querySelector(".img-uploaded");
        img.src = await convertBase64(inImg.files[0]);
    });
</script>
<?php
require_once("layouts/footer.php");
?>