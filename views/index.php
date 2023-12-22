<?php
require_once("layouts/header.php");
require_once("layouts/Toaster.php");
?>

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

<div class="swiper-wrapper">

    <div class="swiper-slide carousel-item-a intro-item bg-image"
        style="background-image: url(/hostay/assets/img-views/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="intro-body">
                    <h1 class="intro-title mb-4 ">
                    Hiện đại
                    </h1>
                    <p class="intro-subtitle intro-price">
                    <a href="/hostay/views/rooms.php"><span class="price-a">Đặt phòng ngay</span></a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="swiper-slide carousel-item-a intro-item bg-image"
    style="background-image: url(/hostay/assets/img-views/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="intro-body">
                    <h1 class="intro-title mb-4">
                    Tinh tế
                    </h1>
                    <p class="intro-subtitle intro-price">
                    <a href="/hostay/views/rooms.php"><span class="price-a">Đặt phòng ngay</span></a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="swiper-slide carousel-item-a intro-item bg-image"
    style="background-image: url(/hostay/assets/img-views/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="intro-body">
                    <h1 class="intro-title mb-4">
                    Sang trọng
                    </h1>
                    <p class="intro-subtitle intro-price">
                    <a href="/hostay/views/rooms.php"><span class="price-a">Đặt phòng ngay</span></a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->
<main id="main">

    <!--  -->
    <section class="section-property section-t8 pt-5" id="uu-dai">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between pb-5">
              <div class="title-box">
                <h2 class="title-a">Ưu đãi</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="card col-md-6 border-0 rounded-0 my-1">
            <div class="card-body rounded text-white" style="
                background-image: url(/hostay/public/uu-dai/img-3.jpg);
                background-size: cover;
                background-position: center;">
              <h5 class="card-title">Năm mới hành trình mới</h5>
              <p class="card-text">
                Tiết kiệm từ 15% khi đặt và lưu trú trước 1/4/2024
              </p>
              <a href="/hostay/views/rooms.php" class="card-link btn btn-primary mb-0 mt-auto">Khám phá</a>
            </div>
          </div>

          <div class="card col-md-6 border-0 rounded-0 my-1">
            <div class="card-body rounded text-white" style="
                background-image: url(/hostay/public/uu-dai/img-4.jpg);
                background-size: cover;
                background-position: center;">
              <h5 class="card-title">Làm việc thư giãn hay cả 2</h5>
              <p class="card-text">
                Khám phá các chỗ nghỉ cho phép lưu trú dài ngày với giá theo tháng tiết kiệm hơn
              </p>
              <a href="/hostay/views/rooms.php" class="card-link btn btn-primary mb-0 mt-auto">Khám phá</a>
            </div>
          </div>

        </div>
      </div>
    </section><!--  -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8 pt-5" id="moi-nhat">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between pb-5">
              <div class="title-box">
                <h2 class="title-a">Mới nhất</h2>
              </div>
              <div class="title-link">
                <a href="/hostay/views/rooms.php">Tất cả phòng
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">
            <?php
                require_once("../app/models/RoomModel.php");
                $rm = new RoomModel();
                $items = $rm->getRooms(new RoomObject(), 1, 5);
                if(count($items) > 0) {
                    foreach($items as $item) {
            ?>
                <div class="carousel-item-b swiper-slide">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="<?=$item->getRoom_image()?>" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="/hostay/views/room.php?id=<?=$item->getRoom_id()?>">
                                            <?=$item->getRoomtype_name()?>
                                        </a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a">Giá | $ <?=$item->getRoom_price()?></span>
                                    </div>
                                    <a href="/hostay/views/room.php?id=<?=$item->getRoom_id()?>"
                                        class="link-a">
                                        Click để xem chi tiết<span class="bi bi-chevron-right"></span>
                                    </a>
                                </div>
                            <div class="card-footer-a">
                            <ul class="card-info d-flex justify-content-around">
                                <li>
                                    <h4 class="card-info-title">Area</h4>
                                    <span><?=$item->getRoom_area()?>m
                                        <sup>2</sup>
                                    </span>
                                </li>
                                <li>
                                    <h4 class="card-info-title">Beds</h4>
                                    <span><?=$item->getRoom_number_bed()?></span>
                                </li>
                                <li>
                                    <h4 class="card-info-title">People</h4>
                                    <span><?=$item->getRoom_number_people()?></span>
                                </li>
                                <li>
                                    <h4 class="card-info-title">Quality</h4>
                                    <span>
                                        <?=$item->getRoom_quality()?>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                    </span>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div><!-- End carousel item -->
            <?php
                    }
                } else {
            ?>
                <p>Không thể lấy dữ liệu!</p>
            <?php
                }
            ?>
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest Properties Section -->

    <!-- Loaction section -->
    <section class="section-property section-t8 pt-5" id="dia-diem">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between pb-5">
              <div class="title-box">
                <h2 class="title-a">Địa điểm phổ biến</h2>
              </div>
              <div class="title-link">
                <a href="/hostay/views/rooms.php">Tất cả phòng
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <a href="/hostay/views/rooms.php?sla=H%E1%BA%A1+Long" class="card border-0 py-0 col-md-3 col-sm-6">
            <img src="/hostay/public/location-img/ha-long.jpg"
              class="card-img-top loc-img" alt="" style="object-fit: cover;">
            <div class="card-body p-1">
              <p class="card-text mb-0 fw-bold">Hạ Long</p>
              <p class="card-text" style="font-size: 14px;">
                <?php
                  $similar = new RoomObject();
                  $similar->setRoom_address('Hạ Long');
                  echo $rm->countRoom($similar)." điểm dừng";
                ?>
              </p>
            </div>
          </a>

          <a href="/hostay/views/rooms.php?sla=Nha+Trang" class="card border-0 py-0 col-md-3 col-sm-6">
            <img src="/hostay/public/location-img/nha-trang.jpg"
              class="card-img-top loc-img" alt="" style="object-fit: cover;">
            <div class="card-body p-1">
              <p class="card-text mb-0 fw-bold">Nha Trang</p>
              <p class="card-text" style="font-size: 14px;">
                <?php
                  $similar->setRoom_address('Nha Trang');
                  echo $rm->countRoom($similar)." điểm dừng";
                ?>
              </p>
            </div>
          </a>

          <a href="/hostay/views/rooms.php?sla=%C4%90%C3%A0+L%E1%BA%A1t" class="card border-0 py-0 col-md-3 col-sm-6">
            <img src="/hostay/public/location-img/da-lat.jpg"
              class="card-img-top loc-img" alt="" style="object-fit: cover;">
            <div class="card-body p-1">
              <p class="card-text mb-0 fw-bold">Đà Lạt</p>
              <p class="card-text" style="font-size: 14px;">
                <?php
                  $similar->setRoom_address('Đà Lạt');
                  echo $rm->countRoom($similar)." điểm dừng";
                ?>
              </p>
            </div>
          </a>

          <a href="/hostay/views/rooms.php?sla=%C4%90%C3%A0+N%E1%BA%B5ng" class="card border-0 py-0 col-md-3 col-sm-6">
            <img src="/hostay/public/location-img/da-nang.jpg"
              class="card-img-top loc-img" alt="" style="object-fit: cover;">
            <div class="card-body p-1">
              <p class="card-text mb-0 fw-bold">Đà Nẵng</p>
              <p class="card-text" style="font-size: 14px;">
                <?php
                  $similar->setRoom_address('Đà Nẵng');
                  echo $rm->countRoom($similar)." điểm dừng";
                ?>
              </p>
            </div>
          </a>

        </div>
      </div>
    </section><!-- End loaction section -->
    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 pt-5 nav-arrow-a" id="danh-gia">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between pb-5">
              <div class="title-box">
                <h2 class="title-a">Đánh giá</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper">
          <div class="swiper-wrapper">

            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="/hostay/public/testimonials/t1.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Tốc độ truy cập trang web Hostay rất nhanh, giúp tôi có trải nghiệm tốt khi sử dụng.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="/hostay/public/testimonials/t1-avatar.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Elisa</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="/hostay/public/testimonials/t2.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Tôi đánh giá cao dịch vụ khách hàng của Hostay,
                        với đội ngũ nhân viên nhiệt tình, sẵn sàng hỗ trợ khách hàng 24/7.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="/hostay/public/testimonials/t2-avatar.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Pablo</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

          </div>
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Testimonials Section -->
    
    <!-- Gallery -->
    <section class="section-property section-t8 pt-5" id="albums">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between pb-5">
              <div class="title-box">
                <h2 class="title-a">Albums</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row lightgallery" id="lightgallery">
          <?php
            $items = $rm->getRooms(new RoomObject, 1, 30);
            $count = 0;
            foreach($items as $item) {
              if($count < 6) {
                $count++;
                echo '
                  <a class="col-4 gallery-show" href="'.$item->getRoom_image().'">
                    <div class="gallery-icon" data-number="+'.(count($items)-5).'"></div>
                    <img src="'.$item->getRoom_image().'" alt="">
                  </a>
                ';
              } else {
                echo '<a class="" href="'.$item->getRoom_image().'"></a>';
              }
            }
          ?>
        </div>
      </div>
    </section><!-- End Gallery -->

</main>
<script type="module">
  let arrLoc = document.querySelectorAll(".loc-img");
  let gall = document.querySelectorAll(".gallery-show");
  function update() {
    window.requestAnimationFrame(update);
    let imgHeight = arrLoc[0].offsetHeight;
    if(imgHeight > 0) {
      arrLoc.forEach(item => {
        item.style.height = imgHeight + "px";
      });
    }

    let gallW = gall[0].offsetWidth;
    if(gallW > 0) {
      gall.forEach(item => {
        item.style.height = gallW + "px";
      });
    }
  }

  update();

  lightGallery(document.getElementById('lightgallery'), {
    pause: 3000,
  });
</script>
<?php
    require_once("layouts/footer.php");
?>