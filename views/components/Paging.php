<?php
function Paging($url, $page, $total, $totalperpage) {
    $countPages = (int)($total / $totalperpage);
    if($total % $totalperpage != 0) {
        $countPages++;
    }

    if($page > $countPages || $page<=0) {
        $page = 1;
    }

    $out = '<div class="row">
            <div class="col-sm-12">
            <nav class="pagination-a">
            <ul class="pagination justify-content-end">';
    if($countPages > 1) {
        if($page == 1) {
            //Previous page
            $out .= '<li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <span class="bi bi-chevron-left"></span>
                        </a>
                    </li>';
            $out .= '<li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>';
            
        } else {
            //Previous page
            $out .= '<li class="page-item next">
                        <a class="page-link" href="'.$url.'page='.($page - 1).'" tabindex="-1">
                            <span class="bi bi-chevron-left"></span>
                        </a>
                    </li>';
            $out .= '<li class="page-item">
                        <a class="page-link" href="'.$url.'page=1">1</a>
                    </li>';
        }

        //Left current
        $leftCurrent = "";
        $count = 0;
        for($i = $page - 1; $i > 1; $i--) {
            $leftCurrent = '<li class="page-item">
                                <a class="page-link" href="'.$url.'page='.$i.'">'.$i.'</a>
                            </li>'.$leftCurrent;
            if(++$count >= 1) {
                break;
            }
        }
        if($page > 3) {
            $leftCurrent = '<li class="page-item">
                                <span class="page-link">...</span>
                            </li>'.$leftCurrent;
        }
        $out .= $leftCurrent;
        //End left current
        
        //Active page
        if($page > 1 && $page < $countPages) {
            $out .= '<li class="page-item active">
                        <a class="page-link" href="'.$url.'page='.$page.'">'.$page.'</a>
                    </li>';
        }

        //Right current
        $rightCurrent = "";
        $count = 0;
        for($i = $page + 1; $i < $countPages; $i++) {
            $rightCurrent .= '<li class="page-item">
                                <a class="page-link" href="'.$url.'page='.$i.'">'.$i.'</a>
                            </li>';
            if(++$count >= 1) {
                break;
            }
        }
        if($page < $countPages - 2) {
            $rightCurrent .= '<li class="page-item">
                                <span class="page-link">...</span>
                            </li>';
        }
        $out .= $rightCurrent;
        //End right current

        if($page == $countPages) {
            $out .= '<li class="page-item active">
                        <a class="page-link" href="#">'.$page.'</a>
                    </li>';
            //Next page
            $out .= '<li class="page-item disabled">
                        <a class="page-link" href="#">
                            <span class="bi bi-chevron-right"></span>
                        </a>
                    </li>';
        } else {
            $out .= '<li class="page-item">
                        <a class="page-link" href="'.$url.'page='.$countPages.'">'.$countPages.'</a>
                    </li>';
            //Next page
            $out .= '<li class="page-item next">
                        <a class="page-link" href="'.$url.'page='.($page + 1).'">
                            <span class="bi bi-chevron-right"></span>
                        </a>
                    </li>';
        }
    } else {
        //Previous page
        $out .= '<li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <span class="bi bi-chevron-left"></span>
                    </a>
                </li>';
        //Active page
        $out .= '<li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>';
                //Next page
        $out .= '<li class="page-item disabled">
                    <a class="page-link" href="#">
                        <span class="bi bi-chevron-right"></span>
                    </a>
                </li>';
    }
    
    $out .= '</ul></nav></div></div></div>';

    return $out;
}
?>