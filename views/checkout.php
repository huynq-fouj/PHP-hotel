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
              <h1 class="title-single">Checkout</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/hostay/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Checkout
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
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="post" action="/hostay/actions/addcheckout.php" class="needs-validation" enctype="multipart/form-data" novalidate> 
              <div class="row">
                <div class="col-md-6 mt-3">
                  <label for="billId" class="form-label text-dark fw-bold">Mã hóa đơn</label>
                  <input type="text" class="form-control" id="billId" name="txtBillId" required placeholder="Mã hóa đơn">
                  <div class="invalid-feedback">Vui lòng nhập mã checkin</div>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="checkoutDate" class="form-label text-dark fw-bold">Ngày vào</label>
                  <input type="date" class="form-control" id="checkoutDate" name="txtCheckoutDate" required placeholder="Email">
                  <div class="invalid-feedback">Vui lòng ngày ra</div>
                </div>  
                <div class="col-md-6 mt-3" style="display: none;">
                  <label for="userName" class="form-label text-dark fw-bold">Checkout by</label>
                  <input type="text" class="form-control" id="userName" name="txtUsername"  value="<?= $_SESSION["user"]["name"] ?>">
                  <div class="invalid-feedback">Vui lòng nhập mã checkin</div>
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
                  <button type="submit" class="btn btn-primary px-4 fs-5" name="checkout">
                    <i class="bi bi-send"></i>
                    Checkout
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