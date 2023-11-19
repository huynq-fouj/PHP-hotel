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
      <span>Dashboard</span>
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
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="charts-chartjs.html">
          <i class="bi bi-circle"></i><span>Chart.js</span>
        </a>
      </li>
      <li>
        <a href="charts-echarts.html">
          <i class="bi bi-circle"></i><span>ECharts</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Remix Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-boxicons.html">
          <i class="bi bi-circle"></i><span>Boxicons</span>
        </a>
      </li>
    </ul>
  </li><!-- End Icons Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/">
      <i class="bi bi-card-list"></i>
      <span>Hostay</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/profiles.php">
      <i class="bi bi-person"></i>
      <span>Thông tin cá nhân</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/views/contact.php">
      <i class="bi bi-envelope"></i>
      <span>Liên hệ</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/hostay/logout.php?redirect=admin">
      <i class="bi bi-box-arrow-right"></i>
      <span>Đăng xuất</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->