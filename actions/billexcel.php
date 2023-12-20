<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    } else {
        require_once("../app/models/BillModel.php");
        require_once("autoload.php");
        $bm = new BillModel();
        $similar = new BillObject();
        $items = $bm->getBills($similar, 1, $bm->countBill($similar));
        $excel = new Spreadsheet();
        $i = 1;
        $excel->getActiveSheet()->fromArray([
            "ID trạng thái",
            "Trạng thái",
            "Ghi chú trạng thái",
            "ID Phiếu",
            "ID phòng",
            "ID người dùng",
            "Ngày tạo",
            "Họ tên",
            "Email",
            "Số điện thoại",
            "Ngày nhận phòng",
            "Ngày trả phòng",
            "Số lượng người trưởng thành",
            "Số trẻ nhỏ",
            "Ghi chú",
            "ID trạng thái",
            "Đã thanh toán",
            "Bị hủy",
            "Nhân viên xác nhận"
        ], null, "A" . $i++);
        foreach ($items as $item) {
            $excel->getActiveSheet()->fromArray((array)$item, null, "A" . $i++);
        }

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bills'.date("dmY").'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($excel);
        $writer->save('php://output');
    }
}
?>