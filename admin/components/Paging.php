<?php
function Paging($url, $page, $total, $totalperpage) {
    $countPages = (int)($total / $totalperpage);
    if($total % $totalperpage != 0) {
        $countPages++;
    }

    if($page > $countPages || $page<=0) {
        $page = 1;
    }
    
    $out = '<nav aria-label="...">';
    $out .= '<ul class="pagination justify-content-center">';
    if($countPages > 1) {
        //Previous page
        if($page == 1) {
            $out .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"".$url."\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
            $out .= "<li class=\"page-item active\" aria-current=\"page\"><a class=\"page-link\" href=\"#\">".$page."</a></li>";
        }else {
            $out .= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."page=".($page - 1)."\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
            $out .= "<li class=\"page-item\" aria-current=\"page\"><a class=\"page-link\" href=\"".$url."page=1\">1</a></li>";
        }
        
        //Left current
        $leftCurrent = "";
        $count = 0;
        for($i = $page - 1; $i > 1; $i--) {
            $leftCurrent = "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."page=".$i."\">".$i."</a></li>".$leftCurrent;
            if(++$count >= 2) {
                break;
            }
        }
        if($page > 4) {
            $leftCurrent = "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">...</a></li>".$leftCurrent;
        }
        $out .= $leftCurrent;
        //End left current
        //Current
        if($page > 1 && $page < $countPages) {
            $out .= "<li class=\"page-item active\" aria-current=\"page\"><a class=\"page-link\" href=\"#\">".$page."</a></li>";
        }
        //Right current
        $rightCurrent = "";
        $count = 0;
        for($i = $page + 1; $i < $countPages; $i++) {
            $rightCurrent .= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."page=".$i."\">".$i."</a></li>";
            if(++$count >= 2) {
                break;
            }
        }
        if($page < $countPages - 3) {
            $rightCurrent .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">...</a></li>";
        }
        $out .= $rightCurrent;
        //End right current
        //Next page
        if($page == $countPages) {
            $out .= "<li class=\"page-item active\" aria-current=\"page\"><a class=\"page-link\" href=\"#\">".$page."</a></li>";
            $out .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"".$url."\" tabindex=\"-1\" aria-disabled=\"true\" ><span aria-hidden=\"true\">&raquo;</span></a></li>";
        }else {
            $out .= "<li class=\"page-item\" aria-current=\"page\"><a class=\"page-link\" href=\"".$url."page=".$countPages."\">".$countPages."</a></li>";
            $out .= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."page=".($page + 1)."\" tabindex=\"-1\" aria-disabled=\"true\" ><span aria-hidden=\"true\">&raquo;</span></a></li>";
        }
    }else {
        $out .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
        $out .= "<li class=\"page-item active\" aria-current=\"page\"><a class=\"page-link\" href=\"#\">".$page."</a></li>";
        $out .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\" ><span aria-hidden=\"true\">&raquo;</span></a></li>";
    }
    $out .= '</ul>';
    $out .= '</nav>';

    return $out;
}
?>