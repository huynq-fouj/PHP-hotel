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
$_SESSION["active"] = "emadd";
//

require_once("../app/models/EmployeeModel.php");
require_once("../libraries/Utilities.php");

if(isset($_POST["addEmployee"])) {
    
    $fullname = trim($_POST["txtFullname"]);
    $email = trim($_POST["txtEmail"]);
    $phone = trim($_POST["txtPhone"]);
    $personalId = trim($_POST["txtpersonalId"]);
    $address = trim($_POST["txtAddress"]);
    $role = trim($_POST["slcPermis"]);

    if(!empty($fullname) && checkEmail($email) && !empty($phone) && !empty($personalId) && !empty($address) && !empty($role))
    {
        $employeeModel = new EmployeeModel();
        $employeeObject = new EmployeeObject();

        $employeeObject->setAddress($address);
        $employeeObject->setEmail($email);
        $employeeObject->setFullname($fullname);
        $employeeObject->setPersonalId($personalId);
        $employeeObject->setPhone($phone);
        $employeeObject->setRole($role);

        if(!$employeeModel->isExists($employeeObject)) {
            if($employeeModel->addEmployee($employeeObject)) {
                header("location:/hostay/admin/addemployee.php?suc=add");
            }else {
                header("location:/hostay/admin/addemployee.php?err=add");
            }
        } else {
            header("location:/hostay/admin/addemployee.php?err=exist");
        }
    } else {
        header("location:/hostay/admin/addemployee.php?err=value");
    }
}

require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Thêm mới nhân viên</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Người nhân viên</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
		        <div class="card">
		            <div class="card-body">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div class="mb-3 mt-3 row">
                                <label for="fullname" class="col-sm-3 col-form-label fw-bold">Tên đầy đủ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="fullname"
                                        name="txtFullname"
                                        placeholder="Fullname"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập họ và tên
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label fw-bold">Email</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="staticEmail"
                                        name="txtEmail"
                                        placeholder="example@gmail.com"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập email
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label fw-bold">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="phone"
                                        name="txtPhone"
                                        placeholder="0123 456 789">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="personalId" class="col-sm-3 col-form-label fw-bold">Số CCCD</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="personalId"
                                        name="txtpersonalId"
                                        placeholder="0123456789">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label fw-bold">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="address"
                                        name="txtAddress"
                                        placeholder="Triều Khúc, Hà Nội">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="slcPermis"
                                    class="col-sm-3 col-form-label fw-bold">
                                    Vị trí
                                </label>
                                <div class="col-sm-9">
                                    <select type="password"
                                        class="form-control"
                                        id="slcPermis"
                                        name="slcPermis"
                                        required>
                                        <option value="Bảo vệ" selected> Bảo vệ</option>
                                        <option value="Lễ tân" selected> Lễ tân</option>
                                        <option value="Phục vụ" selected> Phục vụ</option>
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        Hãy nhập chọn vị trí
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="addEmployee">
                                    Thêm mới
                                </button>
                                <a class="btn btn-secondary col-md-2 col-sm-3 mt-3" href="">Xóa</a>
                            </div>
                        </form>
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