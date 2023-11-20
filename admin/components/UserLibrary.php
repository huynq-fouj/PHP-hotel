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
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewUser"'.$item->getUser_id().'">
        <i class="bi bi-eye"></i>
    </button>
    </td>';
    $out .= viewDetail($item);
    $out .= '<td class="align-middle">
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editUser"'.$item->getUser_id().'">
        <i class="bi bi-pencil-square"></i>
    </button>
    </td>';
    $out .= viewEdit($item);
    $out .= '<td class="align-middle">
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delUser"'.$item->getUser_id().'">
        <i class="bi bi-trash"></i>
    </button>
    </td>';
    $out .= viewDel($item);
    $out .= '</tr>';
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
    $out = '';

    return $out;
}
?>