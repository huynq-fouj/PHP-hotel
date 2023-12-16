<?php
function ContactTable($items) {
    $out = '';
    $out .= '<table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" colspan="2">Thực hiện</th>
            </tr>
        </thead>
    <tbody>';
    foreach($items as $item) {
    $out .= ContactRow($item);
    }
    $out .= '</tbody></table>';

    return $out;
}

function ContactRow(ContactObject $item) {
    $out = '<tr>';
    $out .= '<th scope="row" class="align-middle">'.$item->getContact_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getContact_fullname().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getContact_subject().'</td>';
    $out .= '<td scope="row" class="align-middle">'.date("d-m-Y", strtotime($item->getContact_created_at())).'</td>';
    $out .= '<td scope="row" class="align-middle">'.($item->getContact_seen() == 0 ? "<span class=\"text-danger\">Chưa xem</span>" : "<span class=\"text-success\">Đã xem</span>").'</td>';
    //detail
    $out .= '<td class="align-middle" width="1">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewContact'.$item->getContact_id().'">
        <i class="bi bi-eye"></i>
    </button>';
    $out .= viewDetail($item);
    $out .= '</td>';
    //del
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delContact'.$item->getContact_id().'">
        <i class="bi bi-trash"></i>
    </button>';
    $out .= viewDel($item);
    $out .= '</td>';
    $out .= '</tr>';
    return $out;
}

function viewDetail($item) {
    $out = '<div class="modal fade"
        id="viewContact'.$item->getContact_id().'"
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
                <div class="col-sm-12 fw-bold">Họ tên:</div>
                <div class="col-sm-12">'.$item->getContact_fullname().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Email:</div>
                <div class="col-sm-12">'.$item->getContact_email().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Tiêu đề:</div>
                <div class="col-sm-12">'.$item->getContact_subject().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Nội dung:</div>
                <div class="col-sm-12">'.$item->getContact_notes().'</div>
            </div>';
    $out .= '<div class="row mt-3">
                <div class="col-sm-12 fw-bold">Ngày tạo:</div>
                <div class="col-sm-12">'.date("d-m-Y", strtotime($item->getContact_created_at())).'</div>
            </div>';
    //form
    $out .= '<div class="row mt-3">
                <form action="/hostay/actions/answer.php" method="post" class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nt" class="form-label fw-bold">Trả lời khách hàng</label>
                            <textarea class="form-control"
                                name="txtMessage"
                                id="nt" rows="5"
                                placeholder="Nội dung"
                                required></textarea>
                            <div class="invalid-feedback">Vui lòng nhập nội dung.</div>
                        </div>
                        <input type="hidden" name="idForPost" value="'.$item->getContact_id().'">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-dark"><i class="bi bi-send"></i> Trả lời</button>
                        </div>
                    </div>
                    <div class="row"></div>
                </form>
            </div>';
    //end form
    $out .= '</div><div class="modal-footer">';
    if($item->getContact_seen() == 0) {
        $out .= '<a href="/hostay/actions/contactupd.php?id='.$item->getContact_id().'" class="btn btn-primary">Đánh dấu đã xem</a>';
    }
    $out .= '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>';
    $out .= '</div></div></div></div>';

    return $out;
}

function viewDel($item) {
    $out = '<div class="modal fade"
        id="delContact'.$item->getContact_id().'"
        data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa trạng thái</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= '<p>Bạn có chắc chắn muốn xóa phản hồi này:</p>';
    $out .= '<p><b>Họ tên: </b>'.$item->getContact_fullname().'</p>';
    $out .= '<p><b>Chủ đề: </b>'.$item->getContact_subject().'</p>';
    $out .= '<p><b>Ngày tạo: </b>'.date("d-m-Y", strtotime($item->getContact_created_at())).'</p>';
    $out .= '<p><b>Trạng thái: </b>'.($item->getContact_seen() == 0 ? "Chưa xem" : "Đã xem").'</p>';
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/contactdr.php?id='.$item->getContact_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>