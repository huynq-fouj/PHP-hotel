<?php
function getActive(string $act) {
if(isset($_SESSION["active"]) && $_SESSION["active"] == $act){
return "active";
}
return "";
}
function getShow(string $pos) {
if(isset($_SESSION["pos"]) && $_SESSION["pos"] == $pos){
return "show";
}
return "";
}
function getCollapsed(string $pos) {
if(isset($_SESSION["pos"]) && $_SESSION["pos"] == $pos){
return "";
}
return "collapsed";
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link <?=getCollapsed("dashboard")?>" href="/hostay/admin/">
      <i class="bi bi-grid"></i>
      <span>Thống kê</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link <?=getCollapsed("user")?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Người sử dụng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse <?=getShow("user")?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/hostay/admin/users.php" class="<?=getActive("urlist")?>">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      <li>
        <a href="/hostay/admin/adduser.php" class="<?=getActive("uradd")?>">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link <?=getCollapsed("bill")?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Đơn đặt phòng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse <?=getShow("bill")?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/hostay/admin/bills.php" class="<?=getActive("bilist")?>">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      <li>
        <a href="/hostay/admin/billstatics.php" class="<?=getActive("bista")?>">
          <i class="bi bi-circle"></i><span>Trạng thái</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link <?=getCollapsed("room")?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Phòng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse <?=getShow("room")?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/hostay/admin/rooms.php" class="<?=getActive("rolist")?>">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      <li>
        <a href="/hostay/admin/addroom.php" class="<?=getActive("roadd")?>">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
      <li>
        <a href="/hostay/admin/roomtypes.php" class="<?=getActive("rotype")?>">
          <i class="bi bi-circle"></i><span>Loại phòng</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link <?=getCollapsed("contact")?>" data-bs-target="#contacts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-chat-dots"></i><span>Phản hồi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="contacts-nav" class="nav-content collapse <?=getShow("contact")?>" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/hostay/admin/contacts.php" class="<?=getActive("ctlist")?>">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/">
      <i class="bi bi-card-list"></i>
      <span>Hostay</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/about.php">
      <i class="bi bi-exclamation-circle"></i>
      <span>Giới thiệu</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/rooms.php">
      <i class="bi bi-send"></i>
      <span>Đặt phòng</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/contact.php">
      <i class="bi bi-envelope"></i>
      <span>Liên hệ</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/profiles.php">
      <i class="bi bi-person"></i>
      <span>Thông tin cá nhân</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/logout.php?redirect=admin">
      <i class="bi bi-box-arrow-right"></i>
      <span>Đăng xuất</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->