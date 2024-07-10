<?php
require_once("../app/models/BillModel.php");
function checkinTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã checkin</th>
                        <th scope="col">Ngày vào</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Description</th>
                        <th scope="col" colspan="3">Thực hiện</th>
                    </tr>
                </thead>
            <tbody>';
    foreach($items as $item) {
        $out .= checkinRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function checkinRow(CheckinObject $item) {

    $out = '<tr>';
    $out .= '<th scope="row" class="align-middle">'.$item->getCheckinId().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getCheckinCode().'</td>';
    $out .= '<td scope="row" class="align-middle">'.date("d/m/Y", strtotime($item->getCheckinDate())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.getStatic($item->getStatus()).'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getDescription().'</td>';
    //detail
    $out .= '<td class="align-middle">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewVoucher'.$item->getCheckinId().'">
        <i class="bi bi-eye"></i>
    </button>
    </td>';
    $out .= viewDetail($item);
    
    $out .= '<td class="align-middle">
    <a class="btn btn-success btn-sm" href="/hostay/admin/editcheckin.php?id='.$item->getCheckinId().'">
        <i class="bi bi-pencil-square"></i>
    </a>
    </td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delVoucher'.$item->getCheckinId().'">
        <i class="bi bi-trash"></i>
    </button>
    </td>';
    $out .= viewDel($item);

    $out .= '</tr>';
    // debug_to_console($item);
    return $out;
}

function getStatic($static) {
    $out = '';
    switch($static) {
        case "checked":
            $out = '<span class="text-success">Đã kiểm tra</span>';
            break;
        case "incorrect":
            $out = '<span class="text-danger">Sai thông tin</span>';
            break;
        case "uncheck":
            $out = '<span class="text-warning">Chưa kiểm tra</span>';
            break;
        default:
            break;
    }
    return $out;
}

function viewDetail(CheckinObject $item) {

    $billModel = new BillModel();
    $billItem = $billModel->getBillById($item->getBillId());

    $out = '<div class="modal fade"
        id="viewVoucher'.$item->getCheckinId().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin voucher</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<div class="row">
                <div class="col-sm-20">
                    <label for="" class="col-form-label fw-bold">Căn cước công dân mặt trước</label>
                    <label class="btn-uploaded" style="height: 335px;">
                    <img src=" '. $item->getFirstIndentityCard() .'" class="img-uploaded first-img" alt="">
                    </label>
                    <input type="file" id="firstImg" name="firstImg"  class="form-control upload-img-input first-input">
                </div>
            </div>';
    $out .= '<div class="row">
                <div class="col-sm-20">
                    <label for="" class="col-form-label fw-bold">Căn cước công dân mặt sau</label>
                    <label class="btn-uploaded" style="height: 335px;">
                    <img src=" '. $item->getSecondIndentityCard() .'" class="img-uploaded first-img" alt="">
                    </label>
                    <input type="file" id="firstImg" name="firstImg"  class="form-control upload-img-input first-input">
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Họ và tên</div>
                <div class="col-sm-12">'.$billItem->getBill_fullname().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Số điện thoại</div>
                <div class="col-sm-12">'.$billItem->getBill_phone().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Số căn cước công dân</div>
                <div class="col-sm-12">'.$billItem->getBillPersonalId().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Mã checkin</div>
                <div class="col-sm-12">'.$item->getCheckinCode().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Mã phòng</div>
                <div class="col-sm-12">'.$billItem->getBill_room_id().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ngày checkin</div>
                <div class="col-sm-12">'.date("d/m/Y", strtotime($item->getCheckinDate())).' </div>
            </div>';
    
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Trạng thái</div>
                <div class="col-sm-12">'.getStatic($item->getStatus()).'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Mô tả</div>
                <div class="col-sm-12">'.$item->getDescription().'</div>
            </div>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div></div></div></div>';
    return $out;
}

function viewDel($item) {
    $out = '<div class="modal fade"
        id="delVoucher'.$item->getCheckinId().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa checkin</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Xin lỗi chỉ có thể thay đổi trạng thái checkin</p>';
    // $out .= '<p><b>Khách sạn: </b>'.$item->getVoucherId().'</p>';
    // $out .= '<p><b>Loại: </b>'.$item->getVoucherId().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                
            </div></div></div></div>';
    return $out;
}
?>