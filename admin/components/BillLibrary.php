<?php
function BillTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" colspan="3">Thực hiện</th>
                    </tr>
                </thead>
            <tbody>';
    foreach($items as $item) {
        $out .= BillRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function BillRow(BillObject $item) {
    $out = '<tr>';

    $out .= '<th scope="row" class="align-middle">'.$item->getBill_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getBill_fullname().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getBill_phone().'</td>';
    $out .= '<td scope="row" class="align-middle">'.date("d/m/Y", strtotime($item->getBill_created_at())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.getStatic($item->getBill_static()).'</td>';
    //detail
    $out .= '<td class="align-middle">
    <a class="btn btn-primary btn-sm" href="/hostay/admin/bill.php?id='.$item->getBill_id().'">
        <i class="bi bi-eye"></i>
    </a>
    </td>';
    //edit
    $out .= '<td class="align-middle">
    <a class="btn btn-success btn-sm" href="/hostay/admin/bill.php?id='.$item->getBill_id().'">
        <i class="bi bi-pencil-square"></i>
    </a>
    </td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delBill'.$item->getBill_id().'">
        <i class="bi bi-trash"></i>
    </button>
    </td>';
    $out .= viewDel($item);
    $out .= '</tr>';
    return $out;
}

function viewDel(BillObject $item) {
    $out = '<div class="modal fade"
        id="delBill'.$item->getBill_id().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa đơn đặt phòng</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa đơn này:</p>';
    $out .= '<p><b>Khách hàng: </b>'.$item->getBill_fullname().'</p>';
    $out .= '<p><b>Ngày tạo: </b>'.date("d/m/Y", strtotime($item->getBill_created_at())).'</p>';
    $out .= '<p><b>Trạng thái: </b>'.getStatic($item->getBill_static()).'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/billdr.php?id='.$item->getBill_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}

function getStatic($static) {
    $out = '';
    switch($static) {
        case 1:
            $out = '<span class="text-warning">Chờ xử lý</span>';
            break;
        case 2:
            $out = '<span class="text-success">Thành công - chờ nhận phòng</span>';
            break;
        case 3:
            $out = '<span class="text-danger">Bị hủy</span>';
            break;
        case 4:
            $out = '<span class="text-primary">Đã nhận phòng</span>';
            break;
        case 5:
            $out = '<span class="text-primary-emphasis">Đã trả phòng</span>';
            break;
        default:
            break;
    }
    return $out;
}

function generateOption($static) {
    $out = '';
    switch($static) {
        case 1:
            $out .= '<option value="1">Chờ xử lý</option>';
            $out .= '<option value="2">Xác nhận đơn</option>';
            $out .= '<option value="3">Hủy đơn</option>';
            break;
        case 2:
            $out .= '<option value="2">Xác nhận đơn</option>';
            $out .= '<option value="4">Đã nhận phòng</option>';
            $out .= '<option value="3">Hủy đơn</option>';
            break;
        case 3:
            $out .= '<option value="3">Hủy đơn</option>';
            break;
        case 4:
            $out .= '<option value="4">Đã nhận phòng</option>';
            $out .= '<option value="5">Đã trả phòng</option>';
            $out .= '<option value="3">Hủy đơn</option>';
            break;
        case 5:
            $out .= '<option value="5">Đã trả phòng</option>';
            break;
        default:
            break;
    }
    return $out;
}
?>