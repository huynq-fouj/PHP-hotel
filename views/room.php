<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("location:/hostay/views/login.php?err=login");
}
//
if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] <= 0) {
    header("location:/hostay/views/rooms.php");
}
//
$id = $_GET["id"];
//
require_once("../app/models/RoomModel.php");
require_once("../app/models/UserModel.php");
require_once("../app/models/BillModel.php");
require_once("../libraries/Utilities.php");
require_once("../libraries/Sendmail.php");

$rm = new RoomModel();
$item = $rm->getRoom($id);
if($item == null) {
    header("location:/hostay/views/rooms.php?err=notok");
}

$userModel = new UserModel();
$userItem = $userModel->getUserByUsername($_SESSION["user"]["name"]);

$state = "";
switch($item->getRoom_static()) {
    case 1:
        $state = '<span class="text-success">Còn phòng trống</span>';
        break;
    case 2:
        $state = '<span class="text-danger">Hết phòng</span>';
        break;
    case 3:
        $state = '<span class="text-warning">Đang sửa chữa</span>';
        break;
    default:
        break;
}

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
          <h1 class="title-single"><?=$item->getRoom_hotel_name()?></h1>
          <span class="color-text-a"><?=$item->getRoom_address()?></span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/hostay/views/">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/hostay/views/rooms.php">Đặt phòng</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Single ======= -->
<section class="property-single nav-arrow-b">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 mb-5">
        <img src="<?=$item->getRoom_image()?>" alt="" class="img-fluid">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cash"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c"><?=number_format($item->getRoom_price(), 0, '', ',')?>₫</h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">Tóm tắt</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex">
                    <strong class="me-2">ID:</strong>
                    <span><?=$item->getRoom_id()?></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Địa chỉ:</strong>
                    <span><?=$item->getRoom_address()?></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Loại:</strong>
                    <span><?=$item->getRoomtype_name()?></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Loại giường ngủ:</strong>
                    <span><?=$item->getRoom_bed_type()?></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Trạng thái:</strong>
                    <?=$state?>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Diện tích:</strong>
                    <span><?=$item->getRoom_area()?>m<sup>2</sup></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Giường ngủ:</strong>
                    <span><?=$item->getRoom_number_bed()?></span>
                  </li>
                  <li class="d-flex">
                    <strong class="me-2">Đánh giá:</strong>
                    <span><?=$item->getRoom_quality()?><i class="bi bi-star-fill text-warning ms-1"></i></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-7 section-md-t3">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Mô tả</h3>
                </div>
              </div>
            </div>
            <div class="property-description">
              <p class="description color-text-a">
                <?=$item->getRoom_detail()?>
              </p>
            </div>
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Tiện nghi</h3>
                </div>
              </div>
            </div>
            <div class="amenities-list color-text-a">
              <ul class="list-a no-margin">
                <li>Wifi miễn phí</li>
                <li>Chỗ để xe miễn phí</li>
                <li>Dịch vụ phòng</li>
                <li>Điều hòa không khí</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10 offset-md-1">
        <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active"
                id="pills-map-tab"
                data-bs-toggle="pill"
                href="#pills-map"
                role="tab"
                aria-controls="pills-map"
                aria-selected="false">
                <i class="bi bi-geo-alt me-1"></i>
                Bản đồ
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane show active" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
            <iframe
                src="https://maps.google.com/maps?q=<?=$item->getRoom_address()?>&output=embed"
                width="100%"
                height="460"
                loading="lazy"
                allowfullscreen
                title="<?=$item->getRoom_address()?>">
            </iframe>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="row section-t3">
        <div class="card">
          <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link active"
                      data-bs-toggle="tab"
                      data-bs-target="#your-booking">Đặt phòng</button>
              </li>
              <li class="nav-item">
                  <button class="nav-link"
                      data-bs-toggle="tab"
                      data-bs-target="#friends-booking">Đặt hộ</button>
              </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active your-booking" id="your-booking">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="property-contact">
                          <form class="form-a needs-validation" method="post" action="/hostay/actions/billadd.php" novalidate>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                    <label for="txtFullname" class="form-label">Họ và tên</label>
                                        <input type="text"
                                            class="form-control form-control-lg form-control-a"
                                            id="txtFullname"
                                            name="txtFullname"
                                            value="<?= $userItem->getUser_fullname() ?>"
                                            readonly
                                            placeholder="Fullname"
                                            required>
                                        <div class="invalid-feedback">Vui lòng nhập đầy đủ họ tên</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtName" class="form-label">Email</label>
                                      <input type="email"
                                          class="form-control form-control-lg form-control-a"
                                          id="txtEmail"
                                          name="txtEmail"
                                          placeholder="Email"
                                          value="<?= $userItem->getUser_email() ?>"
                                          readonly
                                          required>
                                      <div class="invalid-feedback">Vui lòng nhập email</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtPhone" class="form-label">Số điện thoại</label>
                                      <input type="text"
                                          class="form-control form-control-lg form-control-a"
                                          id="txtPhone"
                                          name="txtPhone"
                                          placeholder="Phone"
                                          required>
                                          <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberRoom" class="form-label">Số lượng phòng</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberRoom"
                                              name="txtNumberRoom"
                                              min="1"
                                              max="5"
                                              value="1"
                                              placeholder="Number of room"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số phòng</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberAdult" class="form-label">Số lượng người lớn</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberAdult"
                                              name="txtNumberAdult"
                                              min="0"
                                              max="10"
                                              value="1"
                                              placeholder="Number of adults"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số người lớn</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberChildren" class="form-label">Số lượng trẻ nhỏ</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberChildren"
                                              name="txtNumberChildren"
                                              min="0"
                                              max="10"
                                              value="0"
                                              placeholder="Number of childrens"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số trẻ nhỏ</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtStartDate" class="form-label">Ngày bắt đầu</label>
                                      <input type="date"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtStartDate"
                                              name="txtStartDate"
                                              placeholder="Start date"
                                              value="<?=date("Y-m-d")?>"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập ngày bắt đầu</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtEndDate" class="form-label">Ngày kết thúc</label>
                                      <input type="date"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtEndDate"
                                              name="txtEndDate"
                                              placeholder="End date"
                                              value="<?=date("Y-m-d")?>"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập ngày kết thúc</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="personalID" class="form-label">Căn cước công dân | Passport</label>
                                      <input type="text"
                                          class="form-control form-control-lg form-control-a"
                                          id="personalID"
                                          name="txtPersonalID"
                                          placeholder="Căn cước công dân | Passport"
                                          required>
                                          <div class="invalid-feedback">Vui lòng nhập số căn cước công dân hoặc passport của bạn</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="voucher" class="form-label">Voucher</label>
                                      <input type="text"
                                              class="form-control form-control-lg form-control-a"
                                              id="voucher"
                                              name="txtVoucher"
                                              placeholder="Voucher">
                                      <div class="invalid-feedback">Voucher không hợp lệ</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group">
                                      <label for="txtFullname" class="form-label">Ghi chú</label>
                                      <textarea id="textMessage"
                                          class="form-control"
                                          placeholder="Notes"
                                          name="txtNotes"
                                          cols="45"
                                          rows="8"
                                      ></textarea>
                                  </div>
                              </div>
                              <input type="hidden" name="idForPost" value="<?=$item->getRoom_id()?>">
                              <div class="row mt-3 d-flex justify-content-center">
                                  <div class="col-lg-3">
                                      <button type="submit" class="btn btn-a"><i class="bi bi-send me-1"></i>Đặt phòng</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade friends-booking pt-3" id="friends-booking">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="property-contact">
                          <form class="form-a needs-validation" method="post" action="/hostay/actions/billadd.php" novalidate>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                    <label for="txtFullname" class="form-label">Họ và tên </label>
                                        <input type="text"
                                            class="form-control form-control-lg form-control-a"
                                            id="txtFullname"
                                            name="txtFullname"
                                            placeholder="Fullname"
                                            required>
                                        <div class="invalid-feedback">Vui lòng nhập đầy đủ họ tên</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtName" class="form-label">Email</label>
                                      <input type="email"
                                          class="form-control form-control-lg form-control-a"
                                          id="txtEmail"
                                          name="txtEmail"
                                          placeholder="Email"
                                          required>
                                      <div class="invalid-feedback">Vui lòng nhập email</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtPhone" class="form-label">Số điện thoại</label>
                                      <input type="text"
                                          class="form-control form-control-lg form-control-a"
                                          id="txtPhone"
                                          name="txtPhone"
                                          placeholder="Phone"
                                          required>
                                          <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberRoom" class="form-label">Số lượng phòng</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberRoom"
                                              name="txtNumberRoom"
                                              min="1"
                                              max="5"
                                              value="1"
                                              placeholder="Number of room"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số phòng</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberAdult" class="form-label">Số lượng người lớn</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberAdult"
                                              name="txtNumberAdult"
                                              min="0"
                                              max="10"
                                              value="1"
                                              placeholder="Number of adults"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số người lớn</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtNumberChildren" class="form-label">Số lượng trẻ nhỏ</label>
                                      <input type="number"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtNumberChildren"
                                              name="txtNumberChildren"
                                              min="0"
                                              max="10"
                                              value="0"
                                              placeholder="Number of childrens"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập số trẻ nhỏ</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtStartDate" class="form-label">Ngày bắt đầu</label>
                                      <input type="date"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtStartDate"
                                              name="txtStartDate"
                                              placeholder="Start date"
                                              value="<?=date("Y-m-d")?>"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập ngày bắt đầu</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtEndDate" class="form-label">Ngày kết thúc</label>
                                      <input type="date"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtEndDate"
                                              name="txtEndDate"
                                              placeholder="End date"
                                              value="<?=date("Y-m-d")?>"
                                              required>
                                      <div class="invalid-feedback">Vui lòng nhập ngày kết thúc</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtPersonalID" class="form-label">Căn cước công dân | Passport</label>
                                      <input type="text"
                                          class="form-control form-control-lg form-control-a"
                                          id="txtPersonalID"
                                          name="txtPersonalID"
                                          placeholder="Căn cước công dân | Passport"
                                          required>
                                          <div class="invalid-feedback">Vui lòng nhập số căn cước công dân hoặc passport của bạn</div>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label for="txtVoucher" class="form-label">Voucher</label>
                                      <input type="text"
                                              class="form-control form-control-lg form-control-a"
                                              id="txtVoucher"
                                              name="txtVoucher"
                                              placeholder="Voucher">
                                      <div class="invalid-feedback">Voucher không hợp lệ</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group">
                                      <label for="txtFullname" class="form-label">Ghi chú</label>
                                      <textarea id="textMessage"
                                          class="form-control"
                                          placeholder="Notes"
                                          name="txtNotes"
                                          cols="45"
                                          rows="8"
                                      ></textarea>
                                  </div>
                              </div>
                              <input type="hidden" name="idForPost" value="<?=$item->getRoom_id()?>">
                              <div class="row mt-3 d-flex justify-content-center">
                                  <div class="col-lg-3">
                                      <button type="submit" class="btn btn-a"><i class="bi bi-send me-1"></i>Đặt phòng</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Property Single-->

</main><!-- End #main -->
<?php
require_once("layouts/footer.php");
?>