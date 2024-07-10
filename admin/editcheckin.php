<?php
session_start();

// require dependecies
require_once "../libraries/Utilities.php";
require_once "../app/models/CheckinModel.php";
require_once "../app/models/BillModel.php";

// file name without .php
$currentFileName = basename($_SERVER["PHP_SELF"], ".php");

// check permission
if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
} else {
    if (
        !isset($_SESSION["user"]["permission"]) ||
        $_SESSION["user"]["permission"] < 1
    ) {
        headerRedirect("permis", "err", "login");
    }
}

// for sidebar
$_SESSION["pos"] = "checkin";
$_SESSION["active"] = "checkinlist";

// check valid id param
if (!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
    headerRedirect("noexist", "err", "checkin");
}

$checkinId = $_GET["id"];

// get checkin item
$checkinModel = new CheckinModel();
$checkinItem = $checkinModel->getCheckinById($checkinId);

if ($checkinItem == null) {
    headerRedirect("noexist", "err", "checkin");
}

$billModel = new BillModel();
$billItem = $billModel->getBillById($checkinItem->getBillId());

if (isset($_POST["updateCheckin"])) {

    // get input
    $updateCheckinDate = trim($_POST["txtStartDate"]);
    $updateStatus = $_POST["statusSelect"];
    $description = trim($_POST["txtDescription"]);

    if($updateCheckinDate > $billItem->getBill_start_date()){
      headerRedirect("checkin_date", "err", "checkin");
    }

    $checkinItem->setCheckinDate($updateCheckinDate);
    $checkinItem->setStatus($updateStatus);
    $checkinItem->setDescription($description);

    if($checkinModel->updateCheckin($checkinItem)){
      $billModel->updateBillStatus($billItem, $updateStatus);
      headerRedirectViews("suc", "upd", "/hostay/admin/checkin.php?");
    } else{
      headerRedirectViews("err", "checkin_no", "/hostay/admin/checkin.php?");
    }


}

// require for html
require_once "layouts/header.php";
require_once "layouts/Toast.php";
?>

<!--Start main page-->
<main id="main" class="main">
  <div class="pagetitle d-flex justify-content-between">
    <h1>Sửa voucher</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/hostay/admin/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Checkin</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="" method="post" class="needs-validation" novalidate>
              <div class="row mt-3 mb-3">
                <div class="row">
                  <div class="col-md-6 mt-3">
                    <label for="" class="col-form-label fw-bold">Căn cước công dân mặt trước</label>
                    <label class="btn-uploaded">
                      <img src="<?= $checkinItem->getFirstIndentityCard() ?>" class="img-uploaded first-img" alt="">
                    </label>
                  </div>
                  <div class="col-md-6 mt-3">
                    <label for="" class="col-form-label fw-bold">Căn cước công dân mặt sau</label>
                    <label for="secondImg" class="btn-uploaded">
                      <img src="<?= $checkinItem->getSecondIndentityCard() ?>" class="img-uploaded second-img" alt="">
                    </label>
                  </div>
                </div>
                <div class="row mt-3 mb-3">
                  <label for="fullname" class="col-sm-2 col-form-label fw-bold">Họ và tên</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname" name="txtFullname" readonly value="<?= $billItem->getBill_fullname() ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="phone" class="col-sm-2 col-form-label fw-bold">Số điện thoại</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="txtPhone" readonly value="<?= $billItem->getBill_phone() ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="personalId" class="col-sm-2 col-form-label fw-bold">Căn cước công dân</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="personalId" name="txtPersonalId" readonly value="<?= $billItem->getBillPersonalId() ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="email" class="col-sm-2 col-form-label fw-bold">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="txtEmail"  value="<?= $billItem->getBill_email() ?>" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="checkinCode" class="col-sm-2 col-form-label fw-bold">Mã checkin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="checkinCode" name="txtCheckinCode" value="<?= $billItem->getBillCheckinCode() ?>" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="startDate" class="col-sm-2 col-form-label fw-bold">Ngày vào</label>
                  <div class="col-sm-10">
                    <?php 
                      $checkinDate = date_create($checkinItem->getCheckinDate());
                    ?>
                    <input type="date" class="form-control" id="startDate" name="txtStartDate" value="<?= $checkinDate->format('Y-m-d') ?>" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="roomStatic" class="col-sm-2 col-form-label fw-bold">Trạng thái</label>
                  <div class="col-sm-10">
                  <?php
                      $status = $checkinItem->getStatus();
                  ?>
                    <select name="statusSelect" id="statusSelect" class="form-control" required>
                        <option value="uncheck" <?=$status == "uncheck" ? 'selected' : ''?>>Chưa kiểm tra</option>
                        <option value="checked" <?=$status == "checked" ? 'selected' : ''?>>Đã kiểm tra</option>
                        <option value="incorrect" <?=$status == "incorrect" ? 'selected' : ''?>>Thông tin không trùng khớp</option>
                    </select>
                    <div class="invalid-feedback">
                        Hãy nhập chọn trạng thái
                    </div>
                  </div>
                  </div>
                <div class="mb-3 row">
                  <label for="description" class="col-sm-2 col-form-label fw-bold">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea name="txtDescription" id="description" rows="6" class="form-control" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3" name="updateCheckin"> Checkin </button>
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
<?php require_once "layouts/footer.php";
?>
