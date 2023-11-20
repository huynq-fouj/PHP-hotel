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
$_SESSION["pos"] = "user";
$_SESSION["active"] = "urlist";
//
require_once __DIR__."/../app/models/UserModel.php";
require_once __DIR__."/components/UserLibrary.php";

$um = new UserModel();
$similar = new UserObject();
$items = $um->getUsers($similar, 1, 10);

require_once __DIR__."/layouts/header.php";
require_once __DIR__."/components/ErrorToast.php";
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Danh sách</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Người sử dụng</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <?=UserTable($items)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--End main page-->
<?php
require_once "layouts/footer.php";
?>