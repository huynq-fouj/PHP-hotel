<?php
function RoomTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kiểu phòng</th>
                        <th scope="col">Khách sạn</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" colspan="3">Thực hiện</th>
                    </tr>
                </thead>
            <tbody>';
    foreach($items as $item) {
        $out .= RoomRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function RoomRow(RoomObject $item) {
    $out = '<tr>';

    $out .= '<th scope="row" class="align-middle">'.$item->getRoom_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getRoomtype_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getRoom_hotel_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.getStatic($item->getRoom_static()).'</td>';
    //detail
    $out .= '<td class="align-middle">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewRoom'.$item->getRoom_id().'">
        <i class="bi bi-eye"></i>
    </button>
    </td>';
    $out .= viewDetail($item);
    //edit
    $out .= '<td class="align-middle">
    <a class="btn btn-success btn-sm" href="/hostay/admin/editroom.php?id='.$item->getRoom_id().'">
        <i class="bi bi-pencil-square"></i>
    </a>
    </td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRoom'.$item->getRoom_id().'">
        <i class="bi bi-trash"></i>
    </button>
    </td>';
    $out .= viewDel($item);

    $out .= '</tr>';
    return $out;
}

function getStatic($static) {
    $out = '';
    switch($static) {
        case 1:
            $out = '<span class="text-success">Còn phòng trống</span>';
            break;
        case 2:
            $out = '<span class="text-danger">Hết phòng</span>';
            break;
        case 3:
            $out = '<span class="text-warning">Đang sửa chữa</span>';
            break;
        default:
            break;
    }
    return $out;
}

function viewDetail(RoomObject $item) {
    $out = '<div class="modal fade"
        id="viewRoom'.$item->getRoom_id().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin phòng</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <img src="'.$item->getRoom_image().'"
                        alt="" class="room-img"
                        style="
                            width: 100%;
                            object-fit: contain;
                            max-height:300px;
                        ">
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Tên khách sạn</div>
                <div class="col-sm-12">'.$item->getRoom_hotel_name().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Tên địa chỉ</div>
                <div class="col-sm-12">'.$item->getRoom_address().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Kiểu phòng</div>
                <div class="col-sm-12">'.$item->getRoomtype_name().'</div>
            </div>';
     $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Kiểu giường ngủ</div>
                <div class="col-sm-12">'.$item->getRoom_bed_type().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Số người ở</div>
                <div class="col-sm-12">'.$item->getRoom_number_people().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Số giường ngủ</div>
                <div class="col-sm-12">'.$item->getRoom_number_bed().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Đánh giá</div>
                <div class="col-sm-12">'.$item->getRoom_quality().'
                    <i class="bi bi-star-fill text-warning ms-1"></i>
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Đơn giá</div>
                <div class="col-sm-12">'.$item->getRoom_price().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Diện tích</div>
                <div class="col-sm-12">'.$item->getRoom_area().'m<sup>2</sup></div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Trạng thái</div>
                <div class="col-sm-12">'.getStatic($item->getRoom_static()).'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Chi tiết</div>
                <div class="col-sm-12">'.$item->getRoom_detail().'</div>
            </div>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div></div></div></div>';
    return $out;
}

function viewDel($item) {
    $out = '<div class="modal fade"
        id="delRoom'.$item->getRoom_id().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa phòng</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa phòng:</p>';
    $out .= '<p><b>Khách sạn: </b>'.$item->getRoom_hotel_name().'</p>';
    $out .= '<p><b>Loại: </b>'.$item->getRoomtype_name().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/roomdr.php?id='.$item->getRoom_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>