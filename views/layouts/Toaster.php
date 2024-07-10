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
                    echo "Xóa tài khoản không thành công!";
                    break;
                case "upd":
                    echo "Cập nhật không thành công!";
                    break;
                case "add":
                    echo "Thêm tài khoản không thành công!";
                    break;
                case "value":
                    echo "Có lỗi trong dữ liệu được gửi đi!";
                    break;
                case "pass":
                    echo "Sai mật khẩu!";
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
                case "noexistr":
                    echo "Phòng không tồn tại!";
                    break;
                case "lack":
                    echo "Vui lòng điền đầy đủ thông tin!";
                    break;
                case "nr":
                    echo "Số phòng phải là số từ 1 đến 5!";
                    break;
                case "na":
                    echo "Số người lớn là số từ 0 đến 10!";
                    break;
                case "nc":
                    echo "Số trẻ nhỏ là số từ 0 đến 10!";
                    break;
                case "np":
                    echo "Phải có ít nhất 1 người đặt phòng!";
                    break;
                case "date":
                    echo "Không đúng định dạng hoặc có lỗi khi nhập ngày tháng năm!";
                    break;
                case "bia":
                    echo "Đặt phòng không thành công!";
                    break;
                case "invalid_voucher":
                    echo "Voucher không khả dụng";
                    break;
                case "limit":
                    echo "Voucher đã hết lượt sử dụng";
                    break;
                case "expire":
                    echo "Voucher đã hết hạn";
                    break;
                case "bill_id":
                    echo "Mã hóa đơn không tồn tại";
                    break;
                case "bill_num":
                    echo "Mã hóa đơn không tồn tại";
                    break;
                case "not_paid":
                    echo "Vui lòng thanh toán để được checkin online";
                    break;
                case "checkin_date":
                    echo "Ngày checkin không thể sau ngày bắt đầu ";
                    break;
                case "img_lack":
                    echo "Thiếu ảnh căn cước";
                    break;
                case "false_upl":
                        echo "Lỗi trong quá trình tải ảnh lên";
                        break;
                case "checkin_err":
                    echo "Lỗi trong quá checkin";
                    break;
                case "checkincode_err":
                    echo "Không tìm thấy mã checkin";
                    break;
                case "checkincode_exist":
                    echo "Phòng đã được checkin trước đó";
                    break;
                case "no_checkin":
                    echo "Phòng chưa được checkin";
                    break;
                case "checkin_date_af":
                    echo "Ngày checkin không thể sau ngày tạo hóa đơn";
                    break;
                case "checkin_no":
                    echo "Hóa đơn chưa được checkin";
                    break;
                case "checkout":
                    echo "Có lỗi trong quá trình checkout";
                    break;
                case "checkout_end_date":
                    echo "Ngày checkout không thể sau ngày hết hạn phòng";
                    break;
                case "checkout_start_date":
                    echo "Ngày checkout không thể trước ngày đặt phòng";
                    break;
                case "checkout_exist":
                    echo "Hóa đơn đã được checkout";
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
                    echo "Xóa tài khoản thành công!";
                    break;
                case "upd":
                    echo "Cập nhật thành công!";
                    break;
                case "add":
                    echo "Thêm tài khoản thành công!";
                    break;
                case "bia":
                    echo "Đặt phòng thành công!";
                    break;
                case "checkin":
                    echo "Checkin thành công!";
                    break;
                case "checkout":
                    echo "Checkout thành công!";
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