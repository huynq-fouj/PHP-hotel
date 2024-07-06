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
$_SESSION["active"] = "vouadd";
//
require_once "../app/models/VoucherModel.php";
require_once "../app/models/objects/VoucherObject.php";
require_once "../app/models/UserModel.php";
require_once "../app/models/objects/UserObject.php";
$voucherModel = new VoucherModel();

if (isset($_POST["addVoucher"])) {

    $voucherCode = strtoupper(trim($_POST["txtVoucherCode"]));
    $voucherPercent = trim($_POST["txtPercent"]);
    $limitDiscount = trim($_POST["txtDiscountLimit"]);
    $startDate = trim($_POST["txtStartDate"]);
    $expireDate = trim($_POST["txtExpireDate"]);
    $createdBy = trim($_POST["txtUserName"]);
    $description = trim($_POST["txtDescription"]);
    $minOrderValue = trim($_POST["txtMinOrderValue"]);
    $usageLimit = trim($_POST["txtUsageLimit"]);

    if (
        !empty($voucherCode) 
        && !empty($voucherPercent) 
        && !empty($limitDiscount)
        && !empty($startDate)
        && !empty($expireDate)
        && !empty($createdBy) 
        && !empty($minOrderValue)
        && !empty($usageLimit)
    ) {


        $voucherModel = new VoucherModel();

        $countCode = $voucherModel->countVoucherByCode($voucherCode);

        if($countCode >= 1){
            headerRedirect("duplicate_code", "err", $currentFileName); 
        }

        if ($voucherPercent < 1 || $limitDiscount < 1 && $minOrderValue < 1 || $usageLimit < 1) {
            headerRedirect("invalid_value", "err", $currentFileName);
        }

        if ($startDate >= $expireDate) {
            headerRedirect("voucher_date", "err", $currentFileName);
        }

        $detail = $_POST["txtDetail"];
        $voucherObject = new VoucherObject();

        $userModel = new UserModel();
        $userId = $userModel->getUserIdByUserName($createdBy);

        $voucherObject->setVoucherCode($voucherCode);
        $voucherObject->setPercent($voucherPercent);
        $voucherObject->setDiscountLimit($limitDiscount);
        $voucherObject->setStartDate($startDate);
        $voucherObject->setExpireDate($expireDate);
        $voucherObject->setMinOrderValue($minOrderValue);
        $voucherObject->setUserId($userId);
        $voucherObject->setDescription($description);
        $voucherObject->setUsageLimit($usageLimit);

        if ($voucherModel->addVoucher($voucherObject)) {
            headerRedirect("addr", "suc", $currentFileName);
        } else {
            headerRedirect("add", "err", $currentFileName);
        }

    } else {
        headerRedirect("lack", "err", $currentFileName);
    }

}

require_once "layouts/header.php";
require_once "layouts/Toast.php";
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Thêm voucher</h1>
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
                            <div class = "mb-3 mt-3 row">
                            <div class="mb-3 row">
                                <label for="voucherCode" class="col-sm-2 col-form-label fw-bold">Code</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="voucherCode"
                                        name="txtVoucherCode"
                                        placeholder="CODEVOUCHER"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập code voucher
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
                                        min="1"
                                        max="100"
                                        placeholder="100%"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập phần trăm cần giảm 1% <= x <= 100%
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="discountLimit" class="col-sm-2 col-form-label fw-bold">Giảm tối đa</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        name="txtDiscountLimit"
                                        id="discountLimit"
                                        class="form-control"
                                        placeholder="1.000.000"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá giảm tối đa
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="minOrderValue" class="col-sm-2 col-form-label fw-bold">Đơn hàng tối thiểu</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        name="txtMinOrderValue"
                                        id="minOrderValue"
                                        class="form-control"
                                        placeholder="100.000"
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
                                        name="txtUsageLimit"
                                        id="usageLimit"
                                        class="form-control"
                                        placeholder="100"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập lượt sử dụng tối đa
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="startDate" class="col-sm-2 col-form-label fw-bold">Ngày bắt đầu</label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        class="form-control"
                                        id="startDate"
                                        name="txtStartDate"
                                        placeholder="23/07/2024"
                                        value="07/07/2024"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy ngày bắt đầu
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="expireDate" class="col-sm-2 col-form-label fw-bold">Ngày kết thúc</label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        class="form-control"
                                        id="expireDate"
                                        name="txtExpireDate"
                                        placeholder="23/07/2024"
                                        value="07/07/2024"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy ngày kết thúc
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="userName" class="col-sm-2 col-form-label fw-bold">Người tạo</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="userName"
                                        name="txtUserName"
                                        value="<?=$_SESSION["user"]["name"]?>"
                                        readonly
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy ngày kết thúc
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
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="addVoucher">
                                    Thêm mới
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
require_once "layouts/footer.php";
?>