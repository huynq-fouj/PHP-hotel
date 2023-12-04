<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("location:/hostay/views");
}
//
require_once("../app/models/UserModel.php");
//Khởi tạo đối tượng
$um = new UserModel();
//Lấy thông tin User
$user = $um->getUserById($_SESSION["user"]["id"]);
if($user == null) {
    header("location:/hostay/views/login.php?err=notok");
}

require_once("layouts/header.php");
require_once("layouts/Toaster.php");
?>
<main class="main">
    <div class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

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

                        <li class="nav-item">
                            <button class="nav-link"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Đổi mật khẩu</button>
                        </li>

                        </ul>
                        <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Chi tiết</h5>

                            <div class="row mt-3">
                            <div class="col-lg-2 col-md-3 fw-bold label ">Họ tên</div>
                            <div class="col-lg-10 col-md-9"><?=$user->getUser_fullname()?></div>
                            </div>

                            <div class="row mt-3">
                            <div class="col-lg-2 col-md-3 fw-bold label">Tên đăng nhập</div>
                            <div class="col-lg-10 col-md-9"><?=$user->getUser_name()?></div>
                            </div>

                            <div class="row mt-3">
                            <div class="col-lg-2 col-md-3 fw-bold label">Số điện thoại</div>
                            <div class="col-lg-10 col-md-9"><?=$user->getUser_phone()?></div>
                            </div>

                            <div class="row mt-3">
                            <div class="col-lg-2 col-md-3 fw-bold label">Email</div>
                            <div class="col-lg-10 col-md-9"><?=$user->getUser_email()?></div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-3 fw-bold label">Vị trí</div>
                                <div class="col-lg-10 col-md-9">
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

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form action="/hostay/actions/userupd.php"
                                method="post"
                                class="needs-validation" novalidate>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-3 col-lg-2 col-form-label">Tên đầy đủ</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input name="txtFullname"
                                            type="text"
                                            class="form-control"
                                            id="fullName"
                                            value="<?=$user->getUser_fullname()?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="emailInput" class="col-md-3 col-lg-2 col-form-label">Email</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input name="txtEmail"
                                            type="text"
                                            class="form-control"
                                            id="emailInput"
                                            value="<?=$user->getUser_email()?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-3 col-lg-2 col-form-label">Số điện thoại</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input name="txtPhone"
                                            type="text"
                                            class="form-control"
                                            id="Phone" value="<?=$user->getUser_phone()?>">
                                    </div>
                                </div>

                                <input type="hidden" name="idForPost" value="<?=$_SESSION["user"]["id"]?>">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="edit">Lưu thay đổi</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="/hostay/actions/changepassword.php"
                                method="post"
                                class="needs-validation"
                                novalidate>

                            <div class="row mb-3">
                                <label for="currentPassword"
                                    class="col-md-3 col-lg-2 col-form-label">
                                        Mật khẩu hiện tại
                                </label>
                                <div class="col-md-9 col-lg-10">
                                <input name="txtPass"
                                    type="password"
                                    class="form-control"
                                    id="currentPassword"
                                    placeholder="••••••••"
                                    required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-3 col-lg-2 col-form-label">
                                    Mật khẩu mới
                                </label>
                                <div class="col-md-9 col-lg-10">
                                <input name="txtPass1"
                                    type="password"
                                    class="form-control"
                                    id="newPassword"
                                    placeholder="At least 8 character"
                                    required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-3 col-lg-2 col-form-label">
                                    Nhập lại mật khẩu mới
                                </label>
                                <div class="col-md-9 col-lg-10">
                                <input name="txtPass2"
                                    type="password"
                                    class="form-control"
                                    id="renewPassword"
                                    placeholder="At least 8 character"
                                    required>
                                </div>
                            </div>

                            <input type="hidden" name="idForPost" value="<?=$_SESSION["user"]["id"]?>">

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </div>
                            </form><!-- End Change Password Form -->

                        </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once("layouts/footer.php");
?>