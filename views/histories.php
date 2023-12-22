<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    header("location:/hostay/views");
}
$_REQUEST["pos"] = "";
//
require_once("../app/models/UserModel.php");
require_once("../app/models/BillModel.php");
//Khởi tạo đối tượng
$um = new UserModel();
//Lấy thông tin User
$user = $um->getUserById($_SESSION["user"]["id"]);
if($user == null) {
    header("location:/hostay/views/login.php?err=notok");
}

$bm = new BillModel();
$similar = new BillObject();
$similar->setBill_customer_id($user->getUser_id());
$bills = $bm->getBills($similar, 1, $bm->countBill($similar));

require_once("layouts/header.php");
require_once("layouts/Toaster.php");
?>
<main class="main">
    <div class="intro-single">
        <div class="container">
            <?php
                if(count($bills) > 0) {
                    foreach($bills as $bill) {
            ?>
                <div class="
                    history-row
                    d-flex
                    justify-content-between
                    align-items-center
                    shadow
                    p-3
                    mb-3
                    rounded
                    border
                    border-5
                    border-top-0
                    border-bottom-0
                    <?=$bill->getBill_cancel() == 0 ? "border-success" : "border-danger"?>
                    ">
                    <div class="history-infor d-flex align-items-center">
                        <a data-bs-toggle="collapse"
                            href="#multiCollapseExample<?=$bill->getBill_id()?>"
                            role="button" aria-expanded="false"
                            aria-controls="multiCollapseExample1">
                            <i class="bi bi-chevron-down me-1"></i>
                            <span>Đơn đặt phòng ngày <?=date("d-m-Y", strtotime($bill->getBill_created_at()))?></span>
                            <?php
                                if($bill->getBill_cancel() != 0) {
                                    echo '<span class="ms-1 text-danger">(Đã bị hủy)</span>';
                                }
                            ?>
                        </a>
                    </div>
                    <div class="history-dropdown">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li>
                                <a class="dropdown-item py-0"
                                    href="/hostay/views/ticket.php?id=<?=$bill->getBill_id()?>">
                                    Xem hóa đơn
                                </a>
                            </li>
                            <?php
                                if($bill->getBill_is_paid() != 0 || $bill->getBill_cancel() != 0) {
                                    echo "";
                                } else {
                            ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <button class="dropdown-item py-0 text-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCancelBill">
                                        Hủy đơn
                                    </button>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                        <div class="modal fade"
                            id="modalCancelBill"
                            data-bs-backdrop="static"
                            data-bs-keyboard="false"
                            tabindex="-1"
                            aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hủy đơn đặt phòng</h1>
                                        <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Đơn ngày <?=date("d-m-Y", strtotime($bill->getBill_created_at()))?></p>
                                        <p>Bạn chác chán muốn hủy đơn này?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                            Thoát
                                        </button>
                                        <a href="/hostay/actions/billcl.php?id=<?=$bill->getBill_id()?>"
                                            class="btn btn-danger">
                                            Hủy đơn
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <div class="collapse multi-collapse"
                        id="multiCollapseExample<?=$bill->getBill_id()?>">
                            <div class="card card-body mb-3">
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Họ tên:</div>
                                    <div class="col-md-9">
                                        <?=$bill->getBill_fullname()?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Số điện thoại:</div>
                                    <div class="col-md-9">
                                        <?=$bill->getBill_phone()?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Email:</div>
                                    <div class="col-md-9">
                                        <?=$bill->getBill_email()?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Ngày nhận phòng:</div>
                                    <div class="col-md-9">
                                        <?=date("d-m-Y", strtotime($bill->getBill_start_date()))?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Ngày trả phòng:</div>
                                    <div class="col-md-9">
                                        <?=date("d-m-Y", strtotime($bill->getBill_end_date()))?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Trạng thái:</div>
                                    <div class="col-md-9">
                                        <?=$bill->getBillstatic_name()?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Thanh toán:</div>
                                    <div class="col-md-9">
                                    <?=$bill->getBill_is_paid() != 0 ? 'Đã thanh toán' : 'Chưa thanh toán'?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Hiệu lực:</div>
                                    <div class="col-md-9">
                                        <?=$bill->getBill_cancel() == 0 ?
                                        '<span class="text-success">Có</span>' :
                                        '<span class="text-danger me-1">Không</span>
                                        <span>(Đơn đặt phòng đã bị hủy)</span>'?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    }
                } else {
                    echo '<div class="row">Không tìm thấy dữ liệu đặt phòng!</div>';
                }
            ?>
        </div>
    </div>
</main>
<?php
require_once("layouts/footer.php");
?>