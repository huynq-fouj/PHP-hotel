<?php
require_once("../libraries/Utilities.php");
session_start();

$currentFileName = basename($_SERVER['PHP_SELF'], '.php');

if (!isset($_SESSION["user"])) {
    headerRedirect(null, null, "login");
} else {
    if (!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        headerRedirect("permis", "err", "login");
    }
}
//
$_SESSION["pos"] = "checkin";
$_SESSION["active"] = "checkinlist";
//
require_once("../app/models/CheckinModel.php");
require_once("components/CheckinLibrary.php");
require_once("components/Paging.php");

$checkinModel = new CheckinModel();
$checkinObject = new CheckinObject();

//Search
$saveKey = "";
$param = "";

if(isset($_GET["key"])) {
    $saveKey = trim($_GET["key"]);
}
if($saveKey != "") {
    $checkinObject->setCheckinCode($saveKey);
    $param = "key=$saveKey";
}
//Phân trang
$url = "/hostay/admin/checkin.php?";
if($param != "") {
    $url .= "$param&";
}
$total = $checkinModel->countCheckin($checkinObject);
$page = 1;
$totalperpage = 10;
if(isset($_GET["page"])) {
    $savePage = $_GET["page"];
    if(is_numeric($savePage) && $savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$checkinList = $checkinModel->getCheckins($checkinObject, $page, $totalperpage);

require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Danh sách</h1>
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
                        <div class="row my-3">
                            <div class="col-md-12">
                                <a href="/hostay/views/checkin.php" class="btn btn-primary"><i class="bi bi-check-all"></i> Checkin online</a>
                            </div>
                        </div>
                        <?=checkinTable($checkinList)?>
                        <?=Paging($url, $page, $total, $totalperpage)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--End main page-->
<?php
require_once("layouts/footer.php");
?>