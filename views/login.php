<?php
require_once("../app/models/UserModel.php");

session_start();
if(isset($_POST["login"])) {
    $user_name = isset($_POST["txtUserName"]) ? trim($_POST["txtUserName"]) : null;
    $user_pass = isset($_POST["txtPass"]) ? trim($_POST["txtPass"]) : null;
    if($user_name != null && $user_name != "" && $user_pass != null && $user_pass != "") {
        $um = new UserModel();
        $user = $um->getUser($user_name, $user_pass);
        if($user != null) {
            $_SESSION["user"]["id"] = $user->getUser_id();
            $_SESSION["user"]["name"] = $user->getUser_name();
            $_SESSION["user"]["email"] = $user->getUser_email();
            $_SESSION["user"]["fullname"] = $user->getUser_fullname();
            $_SESSION["user"]["permission"] = $user->getUser_permission();
            header("location:/hostay/views/");
        } else {
            unset($_POST);
            header("location:/hostay/views/login.php/?err=invalid");
        }
    } else {
        header("location:/hostay/views/login.php/?err=value");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
                case "invalid":
                    echo "Tài khoản hoặc mật khẩu không đúng!";
                    break;
                case "value":
                    echo "Vui lòng điền đầy đủ thông tin!";
                    break;
                case "login":
                    echo "Vui lòng đăng nhập để sử dụng dịch vụ!";
                    break;
                default:
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
                        <p>ĐĂNG NHẬP</p>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom01" class="form-label">Tên đăng nhập</label>
                        <input type="text"
                            class="form-control"
                            id="validationCustom01"
                            name="txtUserName"
                            placeholder="Username"
                            required>
                        <div class="invalid-feedback">
                            Tên đăng nhập không được để trống!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <label for="validationCustom02" class="form-label">Mật khẩu</label>
                        <input type="password"
                            class="form-control"
                            id="validationCustom02"
                            name="txtPass"
                            placeholder="Password"
                            required>
                        <div class="invalid-feedback">
                            Hãy nhập mật khẩu!
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-4" name="login">Đăng nhập</button>
                        </div>
                    </div>
                    <div class="row mt-3 mx-2 text-center">
                        <span>Bạn chưa có tài khoản?<a href="/hostay/views/register.php">Đăng ký</a></span>
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