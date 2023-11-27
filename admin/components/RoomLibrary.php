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
    $out .= '<td scope="row" class="align-middle">'.$item->getRoom_type().'</td>';
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
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editRoom'.$item->getRoom_id().'">
        <i class="bi bi-pencil-square"></i>
    </button>
    </td>';
    $out .= viewEdit($item);
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

function viewDetail($item) {
    $out = '';

    return $out;
}

function viewEdit($item) {
    $out = '';

    return $out;
}

function viewDel($item) {
    $out = '<div class="modal fade" id="delRoom'.$item->getRoom_id().'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa phòng</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa phòng:</p>';
    $out .= '<p><b>Khách sạn: </b>'.$item->getRoom_hotel_name().'</p>';
    $out .= '<p><b>Loại: </b>'.$item->getRoom_type().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/roomdr.php?id='.$item->getRoom_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>