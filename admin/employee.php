<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    }
}
//
$_SESSION["pos"] = "em";
$_SESSION["active"] = "emlist";
//
require_once("../app/models/EmployeeModel.php");
require_once("components/EmployeeLibrary.php");
require_once("components/Paging.php");


$employeeModel = new EmployeeModel();
$employeeObject = new EmployeeObject();

//Tìm kiếm
$saveKey = "";
$param = "";
if(isset($_GET["key"])) {
    $saveKey = trim($_GET["key"]);
}
if($saveKey != "") {
    $employeeObject->setFullname($saveKey);
    $param = "key=$saveKey";
}

//Phân trang
$url = "/hostay/admin/users.php?";
if($param != "") {
    $url .= "$param&";
}
$page = 1;
$totalperpage = 10;
$total = $employeeModel->countEmployee($employeeObject);
if(isset($_GET["page"])) {
    $savePage = $_GET["page"];
    if(is_numeric($savePage) && $savePage > 0) {
        $page = $savePage;
    }
}
//Lấy danh sách
$items = $employeeModel->getEmployee($employeeObject, $page, $totalperpage);

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
          <li class="breadcrumb-item active">Nhân viên</li>
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
                                <a href="/hostay/actions/userexcel.php" class="btn btn-success me-3"><i class="bi bi-filetype-xlsx"></i> Xuất Excel</a>
                                <a href="/hostay/admin/addemployee.php" class="btn btn-primary"><i class="bi bi-person-add"></i> Thêm nhân viên</a>
                            </div>
                        </div>
                        <?=employeeTable($items)?>
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