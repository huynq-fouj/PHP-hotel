<?php

require_once("../app/models/UserModel.php");
function voucherTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Description</th>
                        <th scope="col" colspan="3">Thực hiện</th>
                    </tr>
                </thead>
            <tbody>';
    foreach($items as $item) {
        $out .= voucherRow($item);
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

function voucherRow(VoucherObject $item) {
    $out = '<tr>';

    $out .= '<th scope="row" class="align-middle">'.$item->getVoucherId().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getVoucherCode().'</td>';
    $out .= '<td scope="row" class="align-middle">'.date("d/m/Y", strtotime($item->getStartDate())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.date("d/m/Y", strtotime($item->getExpireDate())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.getStatic($item->getStatus()).'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getDescription().'</td>';
    //detail
    $out .= '<td class="align-middle">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewVoucher'.$item->getVoucherId().'">
        <i class="bi bi-eye"></i>
    </button>
    </td>';
    $out .= viewDetail($item);
    
    $out .= '<td class="align-middle">
    <a class="btn btn-success btn-sm" href="/hostay/admin/editvoucher.php?id='.$item->getVoucherId().'">
        <i class="bi bi-pencil-square"></i>
    </a>
    </td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delVoucher'.$item->getVoucherId().'">
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
        case "active":
            $out = '<span class="text-success">Khả dụng</span>';
            break;
        case "expired":
            $out = '<span class="text-danger">Hết hạn</span>';
            break;
        case "used":
            $out = '<span class="text-warning">Hết lượt sử dụng</span>';
            break;
        default:
            break;
    }
    return $out;
}

function viewDetail(VoucherObject $item) {
    $out = '<div class="modal fade"
        id="viewVoucher'.$item->getVoucherId().'"
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
                <div class="col-sm-12 d-flex justify-content-center">
                    <img src="https://img.freepik.com/free-vector/gradient-sale-background-design_23-2149069433.jpg"
                        alt="" class="room-img"
                        style="
                            width: 100%;
                            object-fit: contain;
                            max-height:300px;
                        ">
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Voucher code</div>
                <div class="col-sm-12">'.$item->getVoucherCode().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ưu đãi</div>
                <div class="col-sm-12">'.$item->getPercent().'% </div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Giảm tối đa</div>
                <div class="col-sm-12">'.number_format($item->getDiscountLimit(), 0, '', ',').'đ</div>
            </div>';
     $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Đơn tối thiểu</div>
                <div class="col-sm-12">'.number_format($item->getMinOrderValue(), 0, '', ',').'đ</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ngày bắt đầu</div>
                <div class="col-sm-12">'.date("d/m/Y", strtotime($item->getStartDate())).'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ngày kết thúc</div>
                <div class="col-sm-12">'.date("d/m/Y", strtotime($item->getExpireDate())).'</div>
            </div>';
    $out .= '<div class="row mt-3">
        <div class="col-sm-12 fw-bold">Lượt sử dụng tối đa</div>
        <div class="col-sm-12">'.$item->getUsageLimit().'  
        </div>
    </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Lượt sử dụng</div>
                <div class="col-sm-12">'.$item->getUsageCount().'  
                </div>
            </div>';
    // $out .= '<div class="row mt-3">
    //             <div class="col-sm-12 fw-bold">Đơn giá</div>
    //             <div class="col-sm-12">'.$item->getRoom_price().'</div>
    //         </div>';
    // $out .= '<div class="row mt-3">
    //             <div class="col-sm-12 fw-bold">Diện tích</div>
    //             <div class="col-sm-12">'.$item->getRoom_area().'m<sup>2</sup></div>
    //         </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Trạng thái</div>
                <div class="col-sm-12">'.getStatic($item->getStatus()).'</div>
            </div>';

    $userModel = new UserModel();
    $userCreateVoucher = $userModel->getUserById($item->getUserId());

    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Người tạo</div>

                <div class="col-sm-12">'.$userCreateVoucher->getUser_name().'</div>
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
        id="delVoucher'.$item->getVoucherId().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa voucher</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa voucher này không?</p>';
    // $out .= '<p><b>Khách sạn: </b>'.$item->getVoucherId().'</p>';
    // $out .= '<p><b>Loại: </b>'.$item->getVoucherId().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/voucherdel.php?id='.$item->getVoucherId().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>