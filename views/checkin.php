<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/views/login.php");
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
              <h1 class="title-single">Checkin online</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/hostay/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Checkin
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- Contact form -->
    <section class="contact mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-single-box">
              <h1 class="title-single">Gửi thông tin checkin</h1>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <form method="post" action="/hostay/actions/addcheckin.php" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="" class="col-form-label fw-bold">Căn cước công dân mặt trước</label>
                    <label for="firstImg"
                        class="btn-uploaded">
                        <img src="" class="img-uploaded first-img" alt="">
                    </label>
                    <input type="file"
                        id="firstImg"
                        name="firstImg"
                        required
                        class="form-control upload-img-input first-input">
                    </div>
            <div class="col-md-6 mt-3">
                <label for="" class="col-form-label fw-bold">Căn cước công dân mặt sau</label>
                <label for="secondImg"
                    class="btn-uploaded">
                    <img src="" class="img-uploaded second-img" alt="">
                </label>
                <input type="file"
                    id="secondImg"
                    name="secondImg"
                    required
                    class="form-control upload-img-input second-input">
            </div>

              </div>  
              <div class="row">
                <div class="col-md-6 mt-3">
                  <label for="checkinCode" class="form-label text-dark fw-bold">Mã checkin</label>
                  <input type="text" class="form-control" id="checkinCode" name="txtCheckinCode" required placeholder="Mã checkin">
                  <div class="invalid-feedback">Vui lòng nhập mã checkin</div>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="checkinDate" class="form-label text-dark fw-bold">Ngày vào</label>
                  <input type="date" class="form-control" id="checkinDate" name="txtCheckinDate" required placeholder="Email">
                  <div class="invalid-feedback">Vui lòng ngày vào</div>
                </div>  
                <div class="col-md-12 mt-3">
                  <label for="description" class="form-label text-dark fw-bold">Nội dung</label>
                  <textarea name="txtDescription"
                    class="form-control"
                    id="description" rows="5"
                    placeholder="Nhập nội dung tại đây"></textarea>
                  <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                </div>
                <div class="col-md-12 mt-3 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary px-4 fs-5" name="checkin">
                    <i class="bi bi-send"></i>
                    Checkin
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Checkin form -->
  </main>
  <!-- End #main -->
<script>
    let inImg = document.querySelector(".first-input");
    inImg.addEventListener("change", async () => {
        let img = document.querySelector(".first-img");
        img.src = await convertBase64(inImg.files[0]);
    });

    let inImg2 = document.querySelector(".second-input");
    inImg2.addEventListener("change", async () => {
        let img2 = document.querySelector(".second-img");
        img2.src = await convertBase64(inImg2.files[0]);
    });
</script>
<?php
require_once("layouts/footer.php");
?>