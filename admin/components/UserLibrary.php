<?php
function UserTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Tên đầy đủ</th>
                        <th scope="col">Hộp thư</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col" colspan="3">Thực hiện</th>
                    </tr>
                </thead>
            <tbody>';
    foreach($items as $item) {
        $out .= UserRow($item);
    }
    $out .= '</tbody></table>';
    return $out;
}

function UserRow($item) {
    $out = '<tr>';
    $out .= '<th scope="row" class="align-middle">'.$item->getUser_id().'</th>';
    $out .= '<td scope="row" class="align-middle">'.$item->getUser_name().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getUser_fullname().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getUser_email().'</td>';
    $out .= '<td scope="row" class="align-middle">'.$item->getUser_phone().'</td>';
    $out .= '<td class="align-middle">
    <a class="btn btn-primary btn-sm" href="/hostay/admin/user.php?id='.$item->getUser_id().'">
        <i class="bi bi-eye"></i>
    </a>
    </td>';
    $out .= '<td class="align-middle">
    <a class="btn btn-success btn-sm" href="/hostay/admin/user.php?id='.$item->getUser_id().'">
        <i class="bi bi-pencil-square"></i>
    </a>
    </td>';
    if(($_SESSION["user"]["id"] != $item->getUser_id())
        && ($_SESSION["user"]["permission"] >= $item->getUser_permission())) {
        $out .= '<td class="align-middle">
        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delUser'.$item->getUser_id().'">
            <i class="bi bi-trash"></i>
        </button>
        </td>';
    } else {
        $out .= '<td class="align-middle">
        <a class="btn btn-danger btn-sm disabled" href="#">
            <i class="bi bi-trash"></i>
        </a>
        </td>';
    }
    $out .= viewDel($item);
    $out .= '</tr>';
    return $out;
}
function viewDel($item) {
    $out = '<div class="modal fade" id="delUser'.$item->getUser_id().'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
    $out .= '<div class="modal-dialog">';
    $out .= '<div class="modal-content">';
    $out .= '<div class="modal-header">';
    $out .= '<h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa tài khoản</h1>';
    $out .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $out .= '</div><div class="modal-body">';
    $out .= 'Bạn có chắc chắn muốn xóa tài khoản: '.$item->getUser_name();
    $out .= '</div><div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="exitDel">Thoát</button>
                <a href="/hostay/actions/userdr.php?id='.$item->getUser_id().'" class="btn btn-danger">Xóa</a>
            </div></div></div></div>';
    return $out;
}
?>