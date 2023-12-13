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
$_SESSION["pos"] = "room";
$_SESSION["active"] = "rolist";
//
if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] < 1) {
    header("location:/hostay/admin/rooms.php");
}
require_once("../app/models/RoomModel.php");
require_once("../libraries/ImgUpload.php");
require_once("../libraries/DeleteFile.php");
require_once("../app/models/RoomtypeModel.php");
$rtm = new RoomtypeModel();
$id = $_GET["id"];
$rm = new RoomModel();
$item = $rm->getRoom($id);

if($item == null) {
    header("location:/hostay/admin/rooms.php?err=noexist");
}

$target_dir = "/hostay/public/images";
$new_img = "";
$old_img = $item->getRoom_image();

if(isset($_POST["addRoom"])) {
    $hotelname = trim($_POST["txtHotelName"]);
    $address = trim($_POST["txtAddress"]);
    $roomtype = trim($_POST["slcRoomType"]);
    $bedtype = trim($_POST["txtBedType"]);
    $numpeople = trim($_POST["txtNumberPeople"]);
    $numbed = trim($_POST["txtNumberBed"]);
    $quality = trim($_POST["txtQuality"]);
    $price = trim($_POST["txtPrice"]);
    $area = trim($_POST["txtArea"]);
    $static = trim($_POST["slcStatic"]);
    if(!is_numeric($static) || $static < 1 || $static > 3) {
        $static = 1;
    }
    //
    if($hotelname != ""
    && $address != ""
    && is_numeric($roomtype)
    && $rtm->getRoomtype($roomtype) != null
    && $bedtype != ""
    && $numbed != ""
    && $numpeople != ""
    && $quality != ""
    && $price != ""
    && $area != "") {
        if(!is_numeric($numpeople) || $numpeople < 1 || $numpeople > 10) {
            header("location:/hostay/admin/editroom.php?id=$id&err=np");
        }
        if(!is_numeric($numbed) || $numbed < 1 || $numbed > 10) {
            header("location:/hostay/admin/editroom.php?id=$id&err=nb");
        }
        if(!is_numeric($quality) || $quality < 1 || $quality > 5) {
            header("location:/hostay/admin/editroom.php?id=$id&err=fq");
        }
        if(!is_numeric($price) || $quality < 0) {
            header("location:/hostay/admin/editroom.php?id=$id&err=fp");
        }
        if(!is_numeric($area) || $quality < 0) {
            header("location:/hostay/admin/editroom.php?id=$id&err=fa");
        }
        if(isset($_FILES["roomImage"])
        && file_exists($_FILES["roomImage"]["tmp_name"])
        && is_uploaded_file($_FILES["roomImage"]["tmp_name"])) {
            if($target_file = ImgUpload($target_dir, $_FILES["roomImage"])) {
                $new_img = $target_file;
            } else {
                header("location:/hostay/admin/editroom.php?id=$id&err=upload");
            }
        }
        $detail = $_POST["txtDetail"];
        $item->setRoom_address($address);
        $item->setRoom_hotel_name($hotelname);
        $item->setRoom_type_id($roomtype);
        $item->setRoom_bed_type($bedtype);
        $item->setRoom_number_people((int) $numpeople);
        $item->setRoom_number_bed((int) $numbed);
        $item->setRoom_price((float) $price);
        $item->setRoom_quality((float) $quality);
        $item->setRoom_area((float) $area);
        $item->setRoom_static((int) $static);
        if($new_img != "") {
            $item->setRoom_image($new_img);
        }
        $item->setRoom_detail($detail);
        if($rm->editRoom($item)) {
            if($new_img != "") {
                DeleteFile($old_img);
            }
            header("location:/hostay/admin/rooms.php?suc=upd");
        } else {
            if($new_img != "") {
                DeleteFile($new_img);
            }
            header("location:/hostay/admin/rooms.php?err=upd");
        }
    } else {
        header("location:/hostay/admin/editroom.php?id=$id&err=lack");
    }
}

require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Sửa phòng</h1>
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
                        <form action=""
                            method="post"
                            class="needs-validation"
                            enctype="multipart/form-data"
                            novalidate>
                            <div class="row mt-3 mb-3">
                                <label for="" class="col-form-label fw-bold">Ảnh hiển thị</label>
                                <label for="roomImage"
                                    class="btn-uploaded">
                                    <img src="<?=$item->getRoom_image()?>" class="img-uploaded" alt="">
                                </label>
                                <input type="file"
                                    id="roomImage"
                                    name="roomImage"
                                    class="form-control upload-img-input">
                            </div>
                            <div class="mb-3 row">
                                <label for="hotelName" class="col-sm-2 col-form-label fw-bold">Tên khách sạn</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="hotelName"
                                        name="txtHotelName"
                                        placeholder="Hotel name"
                                        value="<?=$item->getRoom_hotel_name()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập tên khách sạn
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label fw-bold">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="address"
                                        name="txtAddress"
                                        placeholder="Address"
                                        value="<?=$item->getRoom_address()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập địa chỉ
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomType" class="col-sm-2 col-form-label fw-bold">Loại phòng</label>
                                <div class="col-sm-10">
                                    <select name="slcRoomType" id="" class="form-control" required>
                                        <?php
                                            $rtypes = $rtm->getRoomtypes(new RoomtypeObject, 1, 100);
                                            foreach($rtypes as $rtype) {
                                                $out = '<option value="'.$rtype->getRoomtype_id().'" ';
                                                if($item->getRoom_type_id() == $rtype->getRoomtype_id()) {
                                                    $out .= "selected";
                                                }
                                                $out .= '>'.$rtype->getRoomtype_name().'</option>';
                                                echo $out;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomBedType" class="col-sm-2 col-form-label fw-bold">Loại giường ngủ</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        name="txtBedType"
                                        id="roomBedType"
                                        list="roomBedTypeSlc"
                                        class="form-control"
                                        placeholder="Type of bed"
                                        value="<?=$item->getRoom_bed_type()?>"
                                        required>
                                    <datalist id="roomBedTypeSlc">
                                        <option value="Giường đơn nhỏ">
                                        <option value="Giường đơn lớn">
                                        <option value="Giường đôi nhỏ">
                                        <option value="Giường đôi lớn">
                                    </datalist>
                                    <div class="invalid-feedback">
                                        Hãy nhập loại giường ngủ
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomNumPeople" class="col-sm-2 col-form-label fw-bold">Số người ở</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="roomNumPeople"
                                        name="txtNumberPeople"
                                        placeholder="Number of people"
                                        min="1"
                                        max="10"
                                        value="<?=$item->getRoom_number_people()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập số người ở
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomNumBed" class="col-sm-2 col-form-label fw-bold">Số giường ngủ</label>
                                <div class="col-sm-10">
                                    <input type="number"
                                        class="form-control"
                                        id="roomNumBed"
                                        name="txtNumberBed"
                                        placeholder="Number of bed"
                                        min="1"
                                        max="10"
                                        value="<?=$item->getRoom_number_bed()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập số giường ngủ
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomQuality" class="col-sm-2 col-form-label fw-bold">Đánh giá</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="roomQuality"
                                        name="txtQuality"
                                        placeholder="Từ 1 đến 5 sao"
                                        value="<?=$item->getRoom_quality()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập đánh giá
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomPrice" class="col-sm-2 col-form-label fw-bold">Đơn giá phòng</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="roomPrice"
                                        name="txtPrice"
                                        placeholder="Price ($)/Night > 0"
                                        value="<?=$item->getRoom_price()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập giá phòng
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomArea" class="col-sm-2 col-form-label fw-bold">Diện tích</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="roomArea"
                                        name="txtArea"
                                        placeholder="Area (m²) > 0"
                                        value="<?=$item->getRoom_area()?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập diện tích
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomStatic" class="col-sm-2 col-form-label fw-bold">Trạng thái</label>
                                <div class="col-sm-10">
                                    <?php
                                        $cs = $item->getRoom_static();
                                    ?>
                                    <select name="slcStatic" id="roomStatic" class="form-control" required>
                                        <option value="1" <?=$cs == 1 ? 'selected' : ''?>>Còn phòng trống</option>
                                        <option value="2" <?=$cs == 2 ? 'selected' : ''?>>Hết phòng</option>
                                        <option value="3" <?=$cs == 3 ? 'selected' : ''?>>Đang sửa chữa</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Hãy nhập chọn trạng thái
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="detail" class="col-sm-2 col-form-label fw-bold">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="txtDetail"
                                        id="detail"
                                        rows="6"
                                        class="form-control"
                                        placeholder="Description"><?=$item->getRoom_detail()?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="addRoom">
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