<?php
if(session_id() === "") {
    session_start();
}
$active = "home";
$title = "Hostay";
$uri = $_SERVER["REQUEST_URI"];
if(str_contains($uri, "/views/about")) {
    $title = "Giới thiệu";
    $active = "about";
}
if(str_contains($uri, "/views/contact")) {
    $title = "Liên hệ";
    $active = "contact";
}
if(str_contains($uri, "/views/room")) {
    $title = "Đặt phòng";
    $active = "rooms";
}
if(str_contains($uri, "/views/profiles")) {
    $title = "Thông tin cá nhân";
    $active = "";
}
if(str_contains($uri, "/views/histories")) {
    $title = "Lịch sử đặt phòng";
    $active = "";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="/hostay/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/hostay/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hostay/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/hostay/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/hostay/assets/vendor/lightgallery.js/src/css/lightgallery.css"/>
    <!-- Template Main CSS File -->
    <link href="/hostay/assets/css/fonts.css" rel="stylesheet">
    <link href="/hostay/assets/css/views_style.css" rel="stylesheet">
    

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/hostay/assets/js/base64Convert.js"></script>
    <!-- lightgallery -->
    <script type="module" src="../assets/vendor/lightgallery.js/src/js/lightgallery.js"></script>
    <!-- lightgallery plugins -->
    <script type="module" src="../assets/vendor/lightgallery.js/src/js/lg-autoplay.min.js"></script>
    <script type="module" src="../assets/vendor/lightgallery.js/src/js/lg-share.min.js"></script>
    <script type="module" src="../assets/vendor/lightgallery.js/src/js/lg-zoom.min.js"></script>
    <script type="module" src="../assets/vendor/lightgallery.js/src/js/lg-fullscreen.min.js"></script>
</head>
<body>
    <?php
        require_once("searchForm.php");
    ?>
    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarDefault"
                aria-controls="navbarDefault"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="/hostay/"><span class="color-b">Hostay</span></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "home"? "active" : ""?>"
                        href="/hostay/views/">Trang chủ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "about"? "active" : ""?>"
                        href="/hostay/views/about.php">Giới thiệu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "rooms"? "active" : ""?>"
                        href="/hostay/views/rooms.php">Đặt phòng</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "contact"? "active" : ""?>"
                            href="/hostay/views/contact.php">Liên hệ</a>
                    </li>
                </ul>
            </div>

            <button type="button"
            class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01">
                <i class="bi bi-search"></i>
            </button>

            <?php
                if(isset($_SESSION["user"])) {
            ?>
            <div class="dropdown ms-3">

                <a class="d-flex align-items-center pe-0 avatar-profile"
                href="/hostay/views/profiles.php"
                data-bs-toggle="dropdown">
                    <img src="/hostay/public/user-profile.jpg" alt="Profile" class="rounded-circle avatar-profile-img">
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end profile">
                    <li class="dropdown-header">
                    <h6><?=$_SESSION["user"]["fullname"]?></h6>
                    <span><?=$_SESSION["user"]["name"]?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/views/profiles.php">
                            <i class="bi bi-person"></i>
                            <span class="ms-1">Thông tin cá nhân</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/views/histories.php">
                            <i class="bi bi-clock-history"></i>
                            <span class="ms-1">Lịch sử đặt phòng</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/views/checkin.php">
                            <i class="bi bi-check-all"></i>
                            <span class="ms-1">Checkin</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/views/checkout.php">
                            <i class="bi bi-calendar-check"></i>
                            <span class="ms-1">Checkout</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                        if($_SESSION["user"]["permission"] > 0) {
                    ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/hostay/admin">
                                <i class="bi bi-gear"></i>
                                <span class="ms-1">Đến trang quản trị</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    <?php
                        }
                    ?>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/views/contact.php">
                            <i class="bi bi-question-circle"></i>
                            <span class="ms-1">Cần giúp đỡ?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/hostay/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="ms-1">Đăng xuất</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </div><!-- End Profile Nav -->
            <?php
                } else {
            ?>
                <a href="/hostay/views/login.php" class="ms-3">Đăng nhập</a>
            <?php
                }
            ?>
            
        </div>
    </nav>
    <!-- End Header/Navbar -->