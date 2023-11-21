<div class="toast position-fixed start-50 translate-middle-x"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
    style="z-index:9999;
            top: 20px;">
    <div class="toast-header">
        <div class="rounded-circle me-2 p-2 bg-danger"></div>
        <strong class="me-auto text-danger">Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-danger">
    <?php
    if(isset($_GET["err"])) {
        switch($_GET["err"]) {
            case "del":
                echo "Xóa tài khoản không thành công!";
                break;
            case "upd":
                echo "Cập nhật tài khoản không thành công!";
                break;
            case "add":
                echo "Thêm tài khoản không thành công!";
                break;
            case "value":
                echo "Có lỗi trong dữ liệu được gửi đi!";
                break;
            case "permis":
                echo "Không đủ quyền thực hiện hành động!";
                break;
            case "noexist":
                echo "Đối tượng không tồn tại!";
                break;
            default:
                echo "Có lỗi trong quá trình thực hiện!";
                break;
        }
    }
    ?>
    </div>
</div>
<script>
const toastElList = document.querySelector('.toast');
const toast = new bootstrap.Toast(toastElList);
        <?php
        if(isset($_GET["err"])) {
            echo "toast.show();";
        }
        ?>
</script>