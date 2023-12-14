<?php
function BillTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Thanh toán</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hiệu lực</th>
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
    $out .= '<td scope="row" class="align-middle">'.date("d/m/Y", strtotime($item->getBill_created_at())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.($item->getBill_is_paid() != 0 ? "Đã thanh toán" : "Chưa thanh toán").'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getBillstatic_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.($item->getBill_cancel() == 0 ? "Có" : "Không").'</td>';
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
    $out .= '<p><b>Trạng thái: </b>'.$item->getBillstatic_name().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/billdr.php?id='.$item->getBill_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>