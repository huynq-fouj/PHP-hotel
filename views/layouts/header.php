<?php
$active = "home";
$title = "Hostay";
$uri = $_SERVER["REQUEST_URI"];
if(str_contains($uri, "/views/about")) {
    $title = "Về chúng tôi";
    $active = "about";
}
if(str_contains($uri, "/views/contact")) {
    $title = "Liên hệ";
    $active = "contact";
}
if(str_contains($uri, "/views/booking")) {
    $title = "Đặt phòng";
    $active = "booking";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <?=require_once "linkConfig.php";?>
</head>
<body>
    <?=require_once "searchForm.php"?>
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
            <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "home"? "active" : ""?>"
                        href="/hostay/views/">Trang chủ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "about"? "active" : ""?>"
                        href="/hostay/views/about.php">Về chúng tôi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "booking"? "active" : ""?>"
                        href="/hostay/views/">Đặt phòng</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=$active == "blog"? "active" : ""?>"
                        href="/hostay/views/">Bài viết</a>
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

        </div>
    </nav>
    <!-- End Header/Navbar -->