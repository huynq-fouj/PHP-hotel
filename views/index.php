<?php


require_once __DIR__."/layouts/header.php";
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
    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
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
                                            <?=$item->getRoom_type()?>
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

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
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
                      <img src="/hostay/assets/img-views/testimonial-1.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                        debitis hic ber quibusdam
                        voluptatibus officia expedita corpori.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="/hostay/assets/img-views/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Albert & Erika</h5>
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
                      <img src="/hostay/assets/img-views/testimonial-2.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                        debitis hic ber quibusdam
                        voluptatibus officia expedita corpori.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="/hostay/assets/img-views/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Pablo & Emma</h5>
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
</main>
<?php
    require_once __DIR__."/layouts/footer.php";
?>