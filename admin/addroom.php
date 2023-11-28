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
$_SESSION["active"] = "roadd";
//
require_once __DIR__."/../app/models/RoomModel.php";
require_once __DIR__."/../libraries/ImgUpload.php";

if(isset($_POST["addRoom"])) {
    $hotelname = trim($_POST["txtHotelName"]);
    $address = trim($_POST["txtAddress"]);
    $roomtype = trim($_POST["txtRoomType"]);
    $bedtype = trim($_POST["txtBedType"]);
    $numpeople = trim($_POST["txtNumberPeople"]);
    $numbed = trim($_POST["txtNumberBed"]);
    $quality = trim($_POST["txtQuality"]);
    $price = trim($_POST["txtPrice"]);
    $area = trim($_POST["txtArea"]);
}

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/layouts/Toast.php";
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Thêm phòng</h1>
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
                                    <img src="" class="img-uploaded" alt="">
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
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập địa chỉ
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomType" class="col-sm-2 col-form-label fw-bold">Loại phòng</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="roomType"
                                        name="txtRoomType"
                                        placeholder="Type of room"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập kiểu phòng
                                    </div>
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
                                        placeholder="Quality"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập đánh giá
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomPrice" class="col-sm-2 col-form-label fw-bold">Giá phòng</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        id="roomPrice"
                                        name="txtPrice"
                                        placeholder="Price"
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
                                        placeholder="Area (m²)"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập diện tích
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="roomStatic" class="col-sm-2 col-form-label fw-bold">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select name="slcStatic" id="roomStatic" class="form-control" required>
                                        <option value="1" selected>Còn phòng trống</option>
                                        <option value="2">Hết phòng</option>
                                        <option value="3">Đang sửa chữa</option>
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
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="addRoom">
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
    const convertBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = () => {
                resolve(fileReader.result);
            };

            fileReader.onerror = (error) => {
                reject(error);
            };
        });
    };

    let inImg = document.querySelector(".upload-img-input");
    inImg.addEventListener("change", async () => {
        let img = document.querySelector(".img-uploaded");
        img.src = await convertBase64(inImg.files[0]);
    });
</script>
<?php
require_once __DIR__."/layouts/footer.php";
?>