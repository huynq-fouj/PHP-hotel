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
        require_once("../app/models/UserModel.php");
        require_once("autoload.php");
        $um = new UserModel();
        $similar = new UserObject();
        $items = $um->getUsers($similar, 1, $um->countUser($similar));
        $excel = new Spreadsheet();
        $i = 1;
        $excel->getActiveSheet()->fromArray([
            "ID",
            "Tên đăng nhập",
            "Mật khẩu",
            "Họ tên",
            "Email",
            "Số điện thoại",
            "Quyền",
            "Ngày tạo"], null, "A" . $i++);
        foreach ($items as $item) {
            $excel->getActiveSheet()->fromArray((array)$item, null, "A" . $i++);
        }

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="users'.date("dmY").'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($excel);
        $writer->save('php://output');
    }
}
?>