<?php

require_once __DIR__."/../app/models/RoomModel.php";
require_once __DIR__."/components/RoomLibrary.php";
require_once __DIR__."/components/Paging.php";

$rm = new RoomModel();
$similar = new RoomObject();
//Dữ liệu phân trang
$page = 1;
$url = "/hostay/views/rooms.php?";
$total = $rm->countRoom($similar);
$total = 100;
$totalperpage = 6;
if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
    $savePage = $_GET["page"];
    if($savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$rooms = $rm->getRooms($similar, $page, $totalperpage);

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/layouts/Toaster.php";
?>
<main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Dịch vụ của chúng tôi</h1>
          <span class="color-text-a">Danh sách phòng</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/hostay/views/">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Đặt phòng
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Grid ======= -->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      <!-- Grid Option -->
      <div class="col-sm-12">
        <div class="grid-option">
          <form>
            <select class="custom-select">
              <option selected>All</option>
              <option value="1">New to Old</option>
              <option value="2">For Rent</option>
              <option value="3">For Sale</option>
            </select>
          </form>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/public/images/about-1.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/public/images/about-2.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/assets/img-views/property-6.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/assets/img-views/property-7.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/assets/img-views/property-8.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="/hostay/assets/img-views/property-10.jpg" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ 12.000</span>
                </div>
                <a href="property-single.html" class="link-a">Click here to view
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Area</h4>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>4</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Garages</h4>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Start Paging -->
    <?=Paging($url,$page,$total,$totalperpage)?>
    <!-- End Paging -->
</section><!-- End Property Grid Single-->

</main><!-- End #main -->
<?php
require_once __DIR__."/layouts/footer.php"
?>