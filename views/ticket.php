<?php
session_start();

// require dependencies
require_once("../libraries/Utilities.php");

if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    headerRedirect(null, null, null, "/hostay/views/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn đăng ký đặt phòng</title>
    <link rel="shortcut icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/hostay/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/hostay/assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #131417;
        }
        .ticket {
            margin: auto;
            width: 1000px;
        }
    </style>
</head>
<body>
    <?php
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            header("location:/hostay/views/?err=value");
        }
        require_once("../app/models/BillModel.php");
        require_once("../app/models/RoomModel.php");
        require_once("../libraries/Utilities.php");
        require_once("../app/models/VoucherModel.php");

        $bm = new BillModel();
        $rm = new RoomModel();
        $bill = $bm->getBill($_GET["id"]);
        $room = null;
        if($bill != null) {
            if($bill->getBill_customer_id() != $_SESSION["user"]["id"] && $_SESSION["user"]["permission"] == 0) {
                header("location:/hostay/views/");
            }
            $room = $rm->getRoom($bill->getBill_room_id());
            if($room == null) {
                header("location:/hostay/views/?err=noexist");
            }
        } else {
            header("location:/hostay/views/?err=noexist");
        }
    ?>
    <div class="container">
        <div class="row text-white my-3">
            <h1 align="center">ĐƠN ĐĂNG KÝ ĐẶT PHÒNG</h1>
        </div>

        <div class="d-flex justify-content-center my-3">
            <button class="btn btn-primary mx-3 btn-goback"><i class="bi bi-reply"></i> Quay lại</button>
            <a href="/hostay/views/" class="btn btn-primary mx-3"><i class="bi bi-house"></i> Trang chủ</a>
            <button class="btn btn-primary mx-3 ticket-dowload"><i class="bi bi-download"></i> Tải ảnh xuống</button>
            <button class="btn btn-primary mx-3 ticket-pdf"><i class="bi bi-filetype-pdf"></i> Xuất PDF</button>
        </div>

        <div class="row mb-5">
            <div class="ticket bg-white p-5" id="ticket">
                <div class="row d-flex justify-content-between">
                    <div class="col-6">
                        <span class="me-2"><b>Khách sạn:</b></span>
                        <?=$room->getRoom_hotel_name()?>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <span class="me-2"><b>Mã phiếu:</b></span>
                        <?=$bill->getBill_id()?>
                    </div>
                </div>
                <div class="row p-4 mb-4">
                    <h2 align="center">PHIẾU XÁC NHẬN ĐẶT PHÒNG</h2>
                </div>
                <div class="row">
                    <div class="col-3"><b>Tên khách hàng:</b></div>
                    <div class="col-9"><?=$bill->getBill_fullname()?></div>
                </div>
                <div class="row">
                    <div class="col-3"><b>Số điện thoại:</b></div>
                    <div class="col-9"><?=$bill->getBill_phone()?></div>
                </div>
                <div class="row">
                    <div class="col-3"><b>Email:</b></div>
                    <div class="col-9"><?=$bill->getBill_email()?></div>
                </div>
                <div class="row">
                    <div class="col-3"><b>Giấy tờ tùy thân:</b></div>
                    <div class="col-9"><?=$bill->getBillPersonalId()?></div>
                </div>
                <div class="row">
                    <div class="col-3"><b>Mã checkin:</b></div>
                    <div class="col-9"><?=$bill->getBillCheckinCode()?></div>
                </div>
                <div class="row">
                    <div class="col-3"><b>Ngày tạo:</b></div>
                    <div class="col-9"><?=date("d-m-Y", strtotime($bill->getBill_created_at()))?></div>
                </div>
                <div class="row mt-3">
                    <div class="col-3 fw-bold">Chi tiết</div>
                    <div class="col-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Số lượng phòng</th>
                                    <th>Người lớn</th>
                                    <th>Trẻ nhỏ</th>
                                    <th>Ngày nhận</th>
                                    <th>Ngày trả</th>
                                    <th>Giảm giá</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$bill->getBill_id()?></td>
                                    <td>
                                        <span class="d-flex justify-content-end"><?=$bill->getBill_number_room()?></span>
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-end"><?=$bill->getBill_number_adult()?></span>
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-end"><?=$bill->getBill_number_children()?></span>
                                    </td>
                                    <?php

                                        $diff = getDateDiff($bill->getBill_start_date(), $bill->getBill_end_date());
                                        $total = $diff * $room->getRoom_price() * $bill->getBill_number_room();
                                        $voucherModel = new VoucherModel();
                                        $voucherObject = $voucherModel->getVoucherByCode($bill->getBillVoucherCode());
                                        $voucherPercent = 0;
                                        $discount = 0;
                                        if($voucherObject != null){
                                            $discount = $total / $voucherObject->getPercent();
                                            $voucherPercent = $voucherObject->getPercent();
                                        }
                                    ?>
                                    <td><?=date("d-m-Y", strtotime($bill->getBill_start_date()))?></td>
                                    <td><?=date("d-m-Y", strtotime($bill->getBill_end_date()))?></td>
                                    <td><span class="d-flex justify-content-end"><?=$voucherPercent ?>%</span></td>
                                    <td><span class="d-flex justify-content-end"><?=number_format($room->getRoom_price(), 0, '', ',') ?>đ</span></td>
                                    <td><span class="d-flex justify-content-end"><?=number_format($total, 0, '', ',');?>đ</span></td>
                                </tr>
                                <tr>
                                    <td colspan="8"><span class="d-flex justify-content-end">Giảm:</span></td>
                                    <td><span class="d-flex justify-content-end">- <?=  number_format($discount, 0, '', ',') ?> đ</span></td>
                                </tr>
                                <tr>
                                    <td colspan="8"><span class="d-flex justify-content-end"><b>Tổng:</b></span></td>
                                    <td><span class="d-flex justify-content-end"><b><?=number_format($total - $discount, 0, '', ',');?>đ</b></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 fw-bold">Ghi chú:</div>
                    <div class="col-12"><?=$bill->getBill_notes()?></div>
                </div>
                <div class="row mt-3">
                    <div class="col-3"><b>Thanh toán:</b></div>
                    <div class="col-9"><?=$bill->getBill_is_paid() != 0 ? "Đã thanh toán" : "Chưa thanh toán"?></div>
                </div>
                <div class="row my-5 d-flex justify-content-between">
                    <div class="col-5">
                        <div class="d-flex justify-content-center mb-2"><b>Nhân viên xác nhận</b></div>
                        <div class="d-flex justify-content-center"><?=$bill->getBill_staff_name()?></div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex justify-content-center mb-2"><b>Khách hàng</b></div>
                        <div class="d-flex justify-content-center"><?=$bill->getBill_fullname()?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/hostay/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/html2canvas/html2canvas.min.js"></script>
    <script src="../assets/vendor/html2pdf/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
    <script>
        document.querySelector(".ticket-dowload").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            html2canvas(target).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                let anchor = document.createElement("a");
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "Phieu_xac_nhan_dat_phong_<?=$bill->getBill_id()?>.png");
                anchor.click();
                anchor.remove();
            });
        });

        document.querySelector(".ticket-pdf").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            var opt = {
                margin:       0.5,
                filename:     'Phieu_xac_nhan_dat_phong_<?=$bill->getBill_id()?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 , width: 920 },
                jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
            };

            var worker = html2pdf().from(target).set(opt).toPdf().get("pdf").then((pdf) => { 
                window.open(pdf.output('bloburl'), '_blank');
            });
        });

        document.querySelector(".btn-goback").addEventListener("click", () => {
            window.history.back();
        });
    </script>
</body>
</html>
