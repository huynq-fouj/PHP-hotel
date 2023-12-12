<?php
require_once("../app/models/UserModel.php");
require_once("../libraries/Utilities.php");

session_start();
if(isset($_POST["register"])) {
    $user_name = isset($_POST["txtUserName"]) ? trim($_POST["txtUserName"]) : null;
    $user_pass1 = isset($_POST["txtPass1"]) ? trim($_POST["txtPass1"]) : null;
    $user_pass2 = isset($_POST["txtPass2"]) ? trim($_POST["txtPass2"]) : null;
    $user_fullname = isset($_POST["txtFullName"]) ? trim($_POST["txtFullName"]) : null;
    $user_email = isset($_POST["txtEmail"]) ? trim($_POST["txtEmail"]) : null;
    if($user_name != null && $user_name != ""
        && checkValidPassWord($user_pass1, $user_pass2)
        && $user_fullname != null && $user_fullname != ""
        && $user_email != null && $user_email != "")
    {
        $um = new UserModel();
        $user = new UserObject();
        $user->setUser_name($user_name);
        $user->setUser_password($user_pass1);
        $user->setUser_fullname($user_fullname);
        $user->setUser_email($user_email);
        $user->setUser_permission(0);
        $user->setUser_created_at(date("Y-m-d"));
        if(!$um->isExists($user)) {
            if($um->addUser($user)) {
                if($user_register = $um->getUser($user_name, $user_pass1)) {
                    $_SESSION["user"]["id"] = $user_register->getUser_id();
                    $_SESSION["user"]["name"] = $user_register->getUser_name();
                    $_SESSION["user"]["email"] = $user_register->getUser_email();
                    $_SESSION["user"]["fullname"] = $user_register->getUser_fullname();
                    $_SESSION["user"]["permission"] = $user->getUser_permission();
                    header("location:/hostay/");
                }else {
                    header("location:/hostay/views/login.php");
                }
            }else {
                header("location:/hostay/views/register.php?err=add");
            }
        } else {
            header("location:/hostay/views/register.php?err=exist");
        }
    } else {
        header("location:/hostay/views/register.php?err=value");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="shortcut icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/hostay/assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .top-5 {
            top: 5%;
        }
    </style>
</head>
<body>
    <div class="toast position-absolute top-5 start-50 translate-middle-x"
        role="alert"
        aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
            <div class="rounded-circle me-2 p-2 bg-danger"></div>
            <strong class="me-auto text-danger">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
        <?php
        if(isset($_GET["err"])) {
            switch($_GET["err"]) {
                case "exist":
                    echo "Tên tài khoản đã tồn tại!";
                    break;
                case "value":
                    echo "Có lỗi trong quá trình xử lý thông tin!";
                    break;
                default:
                    echo "Có lỗi trong quá trình thực hiện!";
                    break;
            }
        }
        ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5 py-3">
                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="row text-center mx-2 fs-3 fw-bold">
                        <p>ĐĂNG KÝ</p>
                    </div>
                    <div class="row mx-2">
                        <label for="validationCustom01" class="form-label">Tên đầy đủ</label>
                        <input type="text"
                            class="form-control"
                            id="validationCustom01"
                            name="txtFullName"
                            placeholder="Fullname"
                            required>
                        <div class="invalid-feedback">
                            Tên đầy đủ không được để trống!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom04" class="form-label">Tên đăng nhập</label>
                        <input type="text"
                            class="form-control"
                            id="validationCustom04"
                            name="txtUserName"
                            placeholder="Username"
                            required>
                        <div class="invalid-feedback">
                            Tên đăng nhập không được để trống!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom05" class="form-label">Email</label>
                        <input type="text"
                            class="form-control"
                            id="validationCustom05"
                            name="txtEmail"
                            placeholder="Example@gmail.com"
                            required>
                        <div class="invalid-feedback">
                            Email không được để trống!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom02" class="form-label">Mật khẩu</label>
                        <input type="password"
                            class="form-control"
                            id="validationCustom02"
                            name="txtPass1"
                            placeholder="Password"
                            required>
                        <div class="invalid-feedback">
                            Hãy nhập mật khẩu!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom03" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password"
                            class="form-control"
                            id="validationCustom03"
                            name="txtPass2"
                            placeholder="Password"
                            required>
                        <div class="invalid-feedback">
                            Hãy nhập mật khẩu xác nhận!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-4" name="register">Đăng ký</button>
                        </div>
                    </div>
                    <div class="row mt-3 mx-2 text-center">
                        <span>Đã có tài khoản?<a href="login.php">Đăng nhập</a></span>
                    </div>
                    <div class="row mx-2 text-center">
                        <a href="/hostay/">Trang chủ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/hostay/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()

            const toastElList = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastElList);
        <?php
        if(isset($_GET["err"])) {
            echo "toast.show();";
        }
        ?>
    </script>
</body>
</html>