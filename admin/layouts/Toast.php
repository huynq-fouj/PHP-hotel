<div aria-live="polite"
    aria-atomic="true"
    class="position-relative">
  <div class="toast-container top-0 end-0 p-3">

    <div class="toast toastErr"
        role="alert"
        aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
            <div class="rounded-circle me-2 p-2 bg-danger"></div>
            <strong class="me-auto text-danger">Error</strong>
            <button type="button"
                class="btn-close"
                data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
        <?php
        if(isset($_GET["err"])) {
            switch($_GET["err"]) {
                case "del":
                    echo "Thực hiện xóa không thành công!";
                    break;
                case "upd":
                    echo "Thực hiện cập nhật không thành công!";
                    break;
                case "add":
                    echo "Thực hiện thêm mới không thành công!";
                    break;
                case "value":
                    echo "Có lỗi trong dữ liệu được gửi đi!";
                    break;
                case "lack":
                    echo "Vui lòng điền đầy đủ thông tin!";
                    break;
                case "permis":
                    echo "Không đủ quyền thực hiện hành động!";
                    break;
                case "exist":
                    echo "Đối tượng đã tồn tại!";
                    break;
                case "noexist":
                    echo "Đối tượng không tồn tại!";
                    break;
                case "upload":
                    echo "Lỗi trong quá trình sử lý ảnh!";
                    break;
                case "img":
                    echo "Lỗi trong quá trình nhận ảnh!";
                    break;
                case "np":
                    echo "Số người phải là số tự nhiên từ 1 đến 10!";
                    break;
                case "nb":
                    echo "Số phòng phải là số tự nhiên từ 1 đến 10!";
                    break;
                case "fq":
                    echo "Đánh giá phải là số nguyên từ 1 đến 5!";
                    break;
                case "fp":
                    echo "Đơn giá phải là số nguyên lớn hơn 0!";
                    break;
                case "fa":
                    echo "Diện tích là số nguyên lớn hơn 0!";
                    break;
                case "send":
                    echo "Gửi không thành công!";
                    break;
                default:
                    echo "Có lỗi trong quá trình thực hiện!";
                    break;
            }
        }
        ?>
        </div>
    </div>

    <div class="toast toastSuc"
        role="alert"
        aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
            <div class="rounded-circle me-2 p-2 bg-success"></div>
            <strong class="me-auto text-success">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-success">
        <?php
        if(isset($_GET["suc"])) {
            switch($_GET["suc"]) {
                case "del":
                    echo "Xóa thành công!";
                    break;
                case "upd":
                    echo "Cập nhật thành công!";
                    break;
                case "add":
                    echo "Thêm thành công!";
                    break;
                case "addr":
                        echo "Thêm phòng thành công!";
                        break;
                case "send":
                    echo "Trả lời thành công!";
                    break;
                default:
                    break;
            }
        }
        ?>
        </div>
    </div>
  </div>
</div>
<script>
const toastErr = document.querySelector('.toastErr');
const toastErrShow = new bootstrap.Toast(toastErr);
const toastSuc = document.querySelector('.toastSuc');
const toastSucShow = new bootstrap.Toast(toastSuc);
        <?php
        if(isset($_GET["err"])) {
            echo "toastErrShow.show();";
        }
        if(isset($_GET["suc"])) {
            echo "toastSucShow.show();";
        }
        ?>
</script>