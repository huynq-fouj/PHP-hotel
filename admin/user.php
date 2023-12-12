<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    }
}
if(!isset($_GET["id"]) || $_GET["id"] <= 0 || !is_numeric($_GET["id"])) {
    header("location:/hostay/admin/users.php?err=value");
}
//
$_SESSION["pos"] = "user";
$_SESSION["active"] = "urlist";
//
require_once("../app/models/UserModel.php");
require_once("../libraries/Utilities.php");

$um = new UserModel();
$user = $um->getUserById($_GET["id"]);
$isEdit = $_SESSION["user"]["permission"] >= $user->getUser_permission();

if(isset($_POST["edit"])) {
  if($isEdit) {
    $fullname = trim($_POST["txtFullname"]);
    $email = trim($_POST["txtEmail"]);
    $permis = $_POST["slcPermis"];
    if($fullname != ""
        && checkEmail($email)
        && $permis >= 0
        && $permis <= $_SESSION["user"]["permission"]) {
        $phone = $_POST["txtPhone"];
        $user->setUser_fullname($fullname);
        $user->setUser_email($email);
        $user->setUser_phone($phone);
        $user->setUser_permission($permis);
        $result = $um->editUser($user);
        if($result) {
            if($user->getUser_id() == $_SESSION["user"]["id"]) {
                $_SESSION["user"]["fullname"] = $user->getUser_fullname();
                $_SESSION["user"]["email"] = $user->getUser_email();
                $_SESSION["user"]["permission"] = $user->getUser_permission();
            }
            header("location:/hostay/admin/users.php");
        } else {
            header("location:/hostay/admin/users.php?err=upd");
        }
    } else {
      header("location:/hostay/admin/users.php?err=value");
    }
  } else {
    header("location:/hostay/admin/users.php?err=permis");
  }
}


require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Thông tin người sử dụng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="/hostay/admin/users.php">Người sử dụng</a></li>
          <li class="breadcrumb-item active">Thông tin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/hostay/public/user-profile.jpg" alt="Profile" class="rounded-circle">
              <h2><?=$user->getUser_fullname()?></h2>
              <h3><?=$user->getUser_name()?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active"
                    data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Tổng quan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link"
                    data-bs-toggle="tab"
                    data-bs-target="#profile-edit">Chỉnh sửa</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Chi tiết</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Tên đầy đủ</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getUser_fullname()?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tên đăng nhập</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getUser_name()?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getUser_email()?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getUser_phone()?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Vị trí</div>
                    <div class="col-lg-9 col-md-8">
                        <?php
                            $permis = $user->getUser_permission();
                            if($permis < 1) {
                                echo "Khách hàng";
                            }
                            if($permis >= 1 && $permis < 5) {
                                echo "Nhân viên quản lý";
                            }
                            if($permis >= 5) {
                                echo "Quản trị cấp cao";
                            }
                        ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ngày tạo</div>
                    <div class="col-lg-9 col-md-8"><?=date("d-m-Y", strtotime($user->getUser_created_at()))?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="post" class="needs-validation" novalidate>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Tên đầy đủ</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtFullname"
                            type="text"
                            class="form-control"
                            id="fullName"
                            value="<?=$user->getUser_fullname()?>"
                            required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="emailInput" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtEmail"
                            type="text"
                            class="form-control"
                            id="emailInput"
                            value="<?=$user->getUser_email()?>"
                            required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtPhone"
                            type="text"
                            class="form-control"
                            id="Phone" value="<?=$user->getUser_phone()?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="permission" class="col-md-4 col-lg-3 col-form-label">vị trí</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="slcPermis" class="form-control" required>
                            <option value="0" <?=$user->getUser_permission() < 1 ? "selected": ""?>>Khách hàng</option>
                            <option value="1" <?=($user->getUser_permission() >= 1
                                && $user->getUser_permission() < 5) ? "selected" : ""?>>
                                Nhân viên quản lý
                            </option>
                            <?php
                                if($_SESSION["user"]["permission"] >= 5) {
                            ?>
                                <option value="5" <?=$user->getUser_permission() >= 5 ? "selected": ""?>>Quản trị cấp cao</option>
                            <?php
                                }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="text-center">
                      <?php
                        if($isEdit) {
                      ?>
                        <button type="submit" class="btn btn-primary" name="edit">Lưu thay đổi</button>
                      <?php
                        } else {
                      ?>
                        <button type="button" class="btn btn-primary disabled">Lưu thay đổi</button>
                      <?php
                        }
                      ?>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

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