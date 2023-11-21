<?php
function Paging($url, $page, $total, $totalperpage) {
    $countPages = (int)($total / $totalperpage);
    if($total % $totalperpage != 0) {
        $countPages++;
    }
    
    $out = '';

    return $out;
}
?>