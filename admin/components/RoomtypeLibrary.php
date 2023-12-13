<?php
function RoomtypeTable($items) {
    $out = '<button class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addRoomtype">
                Thêm loại phòng
            </button>';
    $out .= viewAdd();
    $out .= '<table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="1">ID</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Ghi chú</th>
                <th scope="col" colspan="3">Thực hiện</th>
            </tr>
        </thead>
    <tbody>';
    foreach($items as $item) {
    $out .= RoomtypeRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function RoomtypeRow(RoomtypeObject $item) {
    $out = '<tr>';
    $out .= '<th scope="row" class="align-middle">'.$item->getRoomtype_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getRoomtype_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getRoomtype_notes().'</td>';
    //detail
    $out .= '<td class="align-middle" width="1">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewRoomtype'.$item->getRoomtype_id().'">
        <i class="bi bi-eye"></i>
    </button>';
    $out .= viewDetail($item);
    $out .= '</td>';
    //edit
    $out .= '<td class="align-middle" width="1">
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editRoomtype'.$item->getRoomtype_id().'">
        <i class="bi bi-pencil-square"></i>
    </button>';
    $out .= viewEdit($item);
    $out .= '</td>';
    //del
    $out .= '<td class="align-middle" width="1">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRoomtype'.$item->getRoomtype_id().'">
        <i class="bi bi-trash"></i>
    </button>';
    $out .= viewDel($item);
    $out .= '</td>';
    $out .= '</tr>';
    return $out;
}

function viewDetail($item) {
    $out = '<div class="modal fade"
        id="viewRoomtype'.$item->getRoomtype_id().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin loại</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Tên loại</div>
                <div class="col-sm-12">'.$item->getRoomtype_name().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ghi chú</div>
                <div class="col-sm-12">'.$item->getRoomtype_notes().'</div>
            </div>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div></div></div></div>';

    return $out;
}

function viewEdit($item) {
    $out = '<div class="modal fade"
        id="editRoomtype'.$item->getRoomtype_id().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<form action="/hostay/actions/roomtypeupd.php" method="post" class="needs-validation" novalidate>';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Cập nhật loại</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div>';//header
    $out .= '<div class="modal-body">';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Tên loại</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="txtName" value="'.$item->getRoomtype_name().'" required>
                    <div class="invalid-feedback">Hãy nhập tên loại</div>
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Ghi chú</label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="txtNotes" rows="10">'.$item->getRoomtype_notes().'</textarea>
                </div>
            </div>';
    $out .= '<input type="hidden" name="idForPost" value="'.$item->getRoomtype_id().'">';
    $out .= '</div>';//body
    $out .= '<div class="modal-footer">
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>';//footer
    $out .= '</div>';//content
    $out .= '</div>';//dialog
    $out .= '</form>';
    $out .= '</div>';

    return $out;
}

function viewDel($item) {
    $out = '<div class="modal fade"
        id="delRoomtype'.$item->getRoomtype_id().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa loại</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa loại này:</p>';
    $out .= '<p><b>Tên loại: </b>'.$item->getRoomtype_name().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/roomtypedr.php?id='.$item->getRoomtype_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}

function viewAdd() {
    $out = '<div class="modal fade"
        id="addRoomtype"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<form action="/hostay/actions/roomtypeadd.php" method="post" class="needs-validation" novalidate>';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm loại</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div>';//header
    $out .= '<div class="modal-body">';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Tên loại</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="txtName" required>
                    <div class="invalid-feedback">Hãy nhập tên loại</div>
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Ghi chú</label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="txtNotes" rows="10"></textarea>
                </div>
            </div>';
    $out .= '</div>';//body
    $out .= '<div class="modal-footer">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>';//footer
    $out .= '</div>';//content
    $out .= '</div>';//dialog
    $out .= '</form>';
    $out .= '</div>';

    return $out;
}
?>