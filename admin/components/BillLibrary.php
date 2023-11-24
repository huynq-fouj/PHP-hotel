<?php
function BillTable($items) {
    $out = '<table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Kiểu phòng</th>
                        <th scope="col">Khách sạn</th>
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

function BillRow($item) {
    $out = '';

    return $out;
}

function viewDetail($item) {
    $out = '';

    return $out;
}

function viewDel($item) {
    
}
?>