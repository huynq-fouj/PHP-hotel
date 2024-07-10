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
$_SESSION["pos"] = "em";
$_SESSION["active"] = "emlist";
//
require_once("../app/models/EmployeeModel.php");
require_once("../libraries/Utilities.php");

$employeeModel = new EmployeeModel();
$user = $employeeModel->getEmployeeById($_GET["id"]);

if(isset($_POST["edit"])) {

    $fullname = trim($_POST["txtFullname"]);
    $phone = trim($_POST["txtPhone"]);
    $address = trim($_POST["txtAddress"]);
    $email = trim($_POST["txtEmail"]);
    $permis = $_POST["slcPermis"];
    $personalId = $_POST["txtPersonalId"];

    if(!empty($fullname) && !empty($phone) && !empty($address) && checkEmail($email) 
    && !empty($permis) && !empty($personalId)) {

        $user->setAddress($address);
        $user->setEmail($email);
        $user->setFullname($fullname);
        $user->setPersonalId($personalId);
        $user->setPhone($phone);
        $user->setRole($permis);

        if($employeeModel->updateEmployee($user)) {
            header("location:/hostay/admin/employee.php");
        } else {
            header("location:/hostay/admin/employee.php?err=upd");
        }
    } else {
      header("location:/hostay/admin/employee.php?err=value");
    }

}


require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Thông tin nhân viên</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="/hostay/admin/employee.php">Người sử dụng</a></li>
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
              <h2><?=$user->getRole()?></h2>
              <h3><?=$user->getFullname()?></h3>
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
                    <div class="col-lg-9 col-md-8"><?=$user->getFullname()?></div>
                  </div>

                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getEmail()?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getPhone()?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getAddress()?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Chức vụ</div>
                    <div class="col-lg-9 col-md-8"><?=$user->getRole()?></div>
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
                            value="<?=$user->getFullname()?>"
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
                            value="<?=$user->getEmail()?>"
                            required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtPhone"
                            type="text"
                            class="form-control"
                            id="Phone" value="<?=$user->getPhone()?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="personalId" class="col-md-4 col-lg-3 col-form-label">Căn cước công dân</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtPersonalId"
                            type="text"
                            class="form-control"
                            id="personalId" value="<?=$user->getPersonalId()?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="txtAddress"
                            type="text"
                            class="form-control"
                            id="Phone" value="<?=$user->getAddress()?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="permission" class="col-md-4 col-lg-3 col-form-label">Chức vụ</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="slcPermis" class="form-control" required>
                            <option value="Bảo vệ" <?=$user->getRole() ==  "Bảo vệ"? "selected": ""?>>Bảo vệ</option>
                            <option value="Phục vụ" <?=$user->getRole() == "Phục vụ" ? "selected": ""?>>Phục vụ</option>
                            <option value="Lễ tân" <?=$user->getRole() == "Lễ tân" ? "selected": ""?>>Lễ tân</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="text-center">
                      
                        <button type="submit" class="btn btn-primary" name="edit">Lưu thay đổi</button>
                      
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