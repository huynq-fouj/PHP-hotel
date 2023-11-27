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

require_once "layouts/header.php";
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
<?php
require_once __DIR__."/layouts/footer.php";
?>