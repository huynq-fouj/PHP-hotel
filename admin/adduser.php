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
$_SESSION["active"] = "uradd";
//

require_once("../app/models/UserModel.php");
require_once("../libraries/Utilities.php");

if(isset($_POST["addUser"])) {
    $user_name = trim($_POST["txtUsername"]);
    $user_pass1 = trim($_POST["txtPass1"]);
    $user_pass2 = trim($_POST["txtPass2"]);
    $user_fullname = trim($_POST["txtFullname"]);
    $user_email = trim($_POST["txtEmail"]);
    $user_permission = $_POST["slcPermis"];
    if($user_permission < 0) {
        $user_permission = 0;
    }
    $isPermis = is_numeric($user_permission) && ($user_permission <= $_SESSION["user"]["permission"]);
    if( $user_name != ""
        && checkValidPassWord($user_pass1, $user_pass2)
        && $user_fullname != ""
        && checkEmail($user_email)
        && $isPermis)
    {
        $um = new UserModel();
        $user = new UserObject();
        $user->setUser_name($user_name);
        $user->setUser_password($user_pass1);
        $user->setUser_fullname($user_fullname);
        $user->setUser_email($user_email);
        $user->setUser_permission($user_permission);
        $user->setUser_phone($_POST["txtPhone"]);
        $user->setUser_created_at(date("Y-m-d"));
        if(!$um->isExists($user)) {
            if($um->addUser($user)) {
                header("location:/hostay/admin/adduser.php?suc=add");
            }else {
                header("location:/hostay/admin/adduser.php?err=add");
            }
        } else {
            header("location:/hostay/admin/adduser.php?err=exist");
        }
    } else {
        header("location:/hostay/admin/adduser.php?err=value");
    }
}

require_once("layouts/header.php");
require_once("layouts/Toast.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Thêm mới người sử dụng</h1>
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
                                <label for="username" class="col-sm-3 col-form-label fw-bold">Tên đăng nhập</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control"
                                        id="username"
                                        name="txtUsername"
                                        placeholder="Username"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập tên đăng nhập
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
                                <label for="inputPassword" class="col-sm-3 col-form-label fw-bold">Mật khẩu</label>
                                <div class="col-sm-9">
                                    <input type="password"
                                        class="form-control"
                                        id="inputPassword"
                                        placeholder="At least 8 character"
                                        name="txtPass1"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập mật khẩu
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword1"
                                    class="col-sm-3 col-form-label fw-bold">
                                    Xác nhận mật khẩu
                                </label>
                                <div class="col-sm-9">
                                    <input type="password"
                                        class="form-control"
                                        id="inputPassword1"
                                        name="txtPass2"
                                        placeholder="At least 8 character"
                                        required>
                                    <div class="invalid-feedback">
                                        Hãy nhập mật khẩu xác nhận
                                    </div>
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
                                        <option value="0" selected>Khách hàng</option>
                                        <?php
                                            if($_SESSION["user"]["permission"] >= 1) {
                                        ?>
                                            <option value="1">Nhân viên quản lý</option>
                                        <?php
                                            }
                                            if($_SESSION["user"]["permission"] >= 5) {
                                        ?>
                                            <option value="5">Quản trị viên</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Hãy nhập chọn vị trí
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center">
                                <button type="submit"
                                class="btn btn-primary col-md-2 col-sm-3 me-sm-3 mt-3"
                                name="addUser">
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