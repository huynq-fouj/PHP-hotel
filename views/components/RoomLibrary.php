<?php
function RoomGrid($items) {
    $out = '<div class="row">';
    if(count($items) > 0) {
        foreach($items as $item) {
            $out .= RoomBox($item);
        }
    } else {
        $out .= '<div class="col-sm-12">Không tìm được dữ liệu!</div>';
    }
    $out .= '</div>';

    return $out;
}

function RoomBox(RoomObject $item) {
    $out = '<div class="col-md-4">';
    $out .= '<div class="card-box-a card-shadow">';
    $out .= '<div class="img-box-a">';
    $out .= '<img src="'.$item->getRoom_image().'" alt="" class="img-a img-fluid">';
    $out .= '</div>';
    $out .= '<div class="card-overlay">';
    $out .= '<div class="card-overlay-a-content">';
    $out .= '<div class="card-header-a">';
    $out .= '<h2 class="card-title-a">';
    $out .= '<a href="/hostay/views/room.php?id='.$item->getRoom_id().'">'.$item->getRoomtype_name().'</a>';
    $out .= '</h2>';
    $out .= '</div>';
    $out .= '<div class="card-body-a">';
    $out .= '<div class="price-box d-flex">';
    $out .= '<span class="price-a">Giá | $ '.$item->getRoom_price().'</span>';
    $out .= '</div>';
    $out .= '<a href="/hostay/views/room.php?id='.$item->getRoom_id().'" class="link-a">Click để xem';
    $out .= '<span class="bi bi-chevron-right"></span>';
    $out .= '</a>';
    $out .= '</div>';
    $out .= '<div class="card-footer-a">';
    $out .= '<ul class="card-info d-flex justify-content-around">';
    $out .= '<li>';
    $out .= '<h4 class="card-info-title">Area</h4>';
    $out .= '<span>'.$item->getRoom_area().'m<sup>2</sup></span>';
    $out .= '</li>';
    $out .= '<li>';
    $out .= '<h4 class="card-info-title">Beds</h4>';
    $out .= '<span>'.$item->getRoom_number_bed().'</span>';
    $out .= '</li>';
    $out .= '<li>';
    $out .= '<h4 class="card-info-title">People</h4>';
    $out .= '<span>'.$item->getRoom_number_people().'</span>';
    $out .= '</li>';
    $out .= '<li>';
    $out .= '<h4 class="card-info-title">Quality</h4>';
    $out .= '<span>'.$item->getRoom_quality().'<i class="bi bi-star-fill text-warning ms-1"></i></span>';
    $out .= '</li>';
    $out .= '</ul>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';

    return $out;
}
?>