<?php
function BillstaticTable($items) {
    $out = '<button class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addBillstatic">
                Thêm trạng thái
            </button>';
    $out .= viewAdd();
    $out .= '<table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên trạng thái</th>
                <th scope="col">Ghi chú</th>
                <th scope="col" colspan="3">Thực hiện</th>
            </tr>
        </thead>
    <tbody>';
    foreach($items as $item) {
    $out .= BillstaticRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function BillstaticRow(BillstaticObject $item) {
    $out = '<tr>';
    $out .= '<th scope="row" class="align-middle">'.$item->getBillstatic_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getBillstatic_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getBillstatic_notes().'</td>';
    //detail
    $out .= '<td class="align-middle">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewBillstatic'.$item->getBillstatic_id().'">
        <i class="bi bi-eye"></i>
    </button>';
    $out .= viewDetail($item);
    $out .= '</td>';
    //edit
    $out .= '<td class="align-middle">
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editBillstatic'.$item->getBillstatic_id().'">
        <i class="bi bi-pencil-square"></i>
    </button>';
    $out .= viewEdit($item);
    $out .= '</td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delBillstatic'.$item->getBillstatic_id().'">
        <i class="bi bi-trash"></i>
    </button>';
    $out .= viewDel($item);
    $out .= '</td>';
    $out .= '</tr>';
    return $out;
}

function viewDetail($item) {
    $out = '<div class="modal fade"
        id="viewBillstatic'.$item->getBillstatic_id().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin trạng thái</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Tên trạng thái</div>
                <div class="col-sm-12">'.$item->getBillstatic_name().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ghi chú</div>
                <div class="col-sm-12">'.$item->getBillstatic_notes().'</div>
            </div>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div></div></div></div>';

    return $out;
}

function viewEdit($item) {
    $out = '<div class="modal fade"
        id="editBillstatic'.$item->getBillstatic_id().'"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<form action="/hostay/actions/billstaticupd.php" method="post" class="needs-validation" novalidate>';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Cập nhật trạng thái</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div>';//header
    $out .= '<div class="modal-body">';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Tên trạng thái</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="txtName" value="'.$item->getBillstatic_name().'" required>
                    <div class="invalid-feedback">Hãy nhập tên trạng thái</div>
                </div>
            </div>';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Ghi chú</label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="txtNotes" rows="10">'.$item->getBillstatic_notes().'</textarea>
                </div>
            </div>';
    $out .= '<input type="hidden" name="idForPost" value="'.$item->getBillstatic_id().'">';
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
        id="delBillstatic'.$item->getBillstatic_id().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa trạng thái</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa trạng thái này:</p>';
    $out .= '<p><b>Tên trạng thái: </b>'.$item->getBillstatic_name().'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/billstaticdr.php?id='.$item->getBillstatic_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}

function viewAdd() {
    $out = '<div class="modal fade"
        id="addBillstatic"
        data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<form action="/hostay/actions/billstaticadd.php" method="post" class="needs-validation" novalidate>';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm trạng thái</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div>';//header
    $out .= '<div class="modal-body">';
    $out .= '<div class="row mt-3">
                <label class="col-sm-12 col-form-label fw-bold">Tên trạng thái</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="txtName" required>
                    <div class="invalid-feedback">Hãy nhập tên trạng thái</div>
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