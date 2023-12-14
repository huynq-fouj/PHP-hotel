<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/admin/login.php");
} else {
    if(!isset($_SESSION["user"]["permission"]) || $_SESSION["user"]["permission"] < 1) {
        header("location:/hostay/admin/login.php?err=permis");
    }
}
//
$_SESSION["pos"] = "dashboard";
$_SESSION["active"] = "";
//

require_once("layouts/header.php");
?>
<!--Start main page-->
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/hostay/admin/">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thống kê</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
		        <div class="row">
                    <!-- Customer Card -->
                    <div class="col-md-4">
                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Bộ lọc</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                    <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                    <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Người dùng <span>| Trong năm</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                            require_once("../app/models/UserModel.php");
                                            $um = new UserModel();
                                            $countCur = $um->countByTime(date("Y"), "YEAR");
                                            $countPre = $um->countByTime(date("Y") - 1, "YEAR");
                                            $__Utotal = $countCur - $countPre;
                                            $__Uper = 0;
                                            $__Ucolor = "success";
                                            $__Ustat = "Tăng";
                                            if($__Utotal < 0) {
                                                $__Ucolor = "danger";
                                                $__Ustat = "Giảm";
                                                $__Utotal = $__Utotal * (-1);
                                                $__Uper = $__Utotal * 100 / $countPre;
                                            } else {
                                                if($countPre == 0) {
                                                    if($countCur == 0) {
                                                        $__Uper = 0;
                                                    } else {
                                                        $__Uper = 100;
                                                    }
                                                } else {
                                                    $__Uper = $__Utotal * 100 / $countPre;
                                                }
                                            }
                                        ?>
                                        <h6><?=$countCur?></h6>
                                        <span class="text-muted small pt-2 ps-1"><?=$__Ustat?></span>
                                        <span class="text-<?=$__Ucolor?> small pt-1 fw-bold"><?=number_format($__Uper, 2)?>%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Customer Card -->

                    <!-- Sales Card -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Bộ lọc</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                    <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                    <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Đơn đặt phòng <span>| Trong tháng</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-receipt-cutoff"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                            require_once("../app/models/BillModel.php");
                                            $bm = new BillModel();
                                            $countBillCur = $bm->countByTime(date("m"), "MONTH");
                                            $countBillPre = $bm->countByTime(date("m") - 1, "MONTH");
                                            $__Btotal = $countBillCur - $countBillPre;
                                            $__Bper = 0;
                                            $__Bcolor = "success";
                                            $__Bstat = "Tăng";
                                            if($__Btotal < 0) {
                                                $__Bcolor = "danger";
                                                $__Bstat = "Giảm";
                                                $__Btotal = $__Btotal * (-1);
                                                $__Bper = $__Btotal * 100 / $countBillPre;
                                            } else {
                                                if($countBillPre == 0) {
                                                    if($countBillCur == 0) {
                                                        $__Bper = 0;
                                                    } else {
                                                        $__Bper = 100;
                                                    }
                                                } else {
                                                    $__Bper = $__Btotal * 100 / $countBillPre;
                                                }
                                            }
                                        ?>
                                        <h6><?=$countBillCur?></h6>
                                        <span class="text-muted small pt-2 ps-1"><?=$__Bstat?></span>
                                        <span class="text-<?=$__Bcolor?> small pt-1 fw-bold"><?=number_format($__Bper, 2)?>%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Bộ lọc</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Trong ngày</a></li>
                                    <li><a class="dropdown-item" href="#">Trong tháng</a></li>
                                    <li><a class="dropdown-item" href="#">Trong năm</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Lợi nhuận <span>| Trong tháng</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                            require_once("../app/models/RoomModel.php");
                                            require_once("../libraries/Utilities.php");
                                            $rm = new RoomModel();
                                            $listCur = $bm->getByTime(0,date("m"), date("Y"), "MONTH", true);
                                            $listPre = $bm->getByTime(0,date("m") - 1, date("Y"), "MONTH", true);
                                            $countCCur = 0;
                                            $countCPre = 0;
                                            foreach($listCur as $item) {
                                                $room = $rm->getRoom($item->getBill_room_id());
                                                $diff = getDateDiff($item->getBill_start_date(),$item->getBill_end_date());
                                                $countCCur += $room->getRoom_price() * $item->getBill_number_room() * $diff;
                                            }
                                            foreach($listPre as $item) {
                                                $room = $rm->getRoom($item->getBill_room_id());
                                                $diff = getDateDiff($item->getBill_start_date(),$item->getBill_end_date());
                                                $countCPre += $room->getRoom_price() * $item->getBill_number_room() * $diff;
                                            }
                                            $__Ctotal = $countCCur - $countCPre;
                                            $__Cper = 0;
                                            $__Ccolor = "success";
                                            $__Cstat = "Tăng";
                                            if($__Ctotal < 0) {
                                                $__Ccolor = "danger";
                                                $__Cstat = "Giảm";
                                                $__Ctotal = $__Ctotal * (-1);
                                                $__Cper = $__Ctotal * 100 / $countCPre;
                                            } else {
                                                if($countCPre == 0) {
                                                    if($countCCur == 0) {
                                                        $__Cper = 0;
                                                    } else {
                                                        $__Cper = 100;
                                                    }
                                                } else {
                                                    $__Cper = $__Ctotal * 100 / $countCPre;
                                                }
                                            }
                                        ?>
                                        <h6>$<?=number_format($countCCur, 2)?></h6>
                                        <span class="text-muted small pt-2 ps-1"><?=$__Cstat?></span>
                                        <span class="text-<?=$__Ccolor?> small pt-1 fw-bold"><?=number_format($__Cper, 2)?>%</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                </div>

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Biểu đồ <span>Trong năm <?=date("Y")?></span></h5>
                            <?php
                                $arrMon = array(0,0,0,0,0,0,0,0,0,0,0,0);
                                for($i = 1; $i <= 12; $i++) {
                                    $list = $bm->getByTime(0,$i, date("Y"), "MONTH", true);
                                    $cur = 0;
                                    foreach($list as $item) {
                                        $room = $rm->getRoom($item->getBill_room_id());
                                        $diff = getDateDiff($item->getBill_start_date(),$item->getBill_end_date());
                                        $cur += $room->getRoom_price() * $item->getBill_number_room() * $diff;
                                    }
                                    $arrMon[$i - 1] = $cur;
                                }
                                $strArrMon = implode(",", $arrMon);
                            ?>
                            <!-- Line Chart -->
                            <div id="reportsChart"></div>
                            <style>
                                .apexcharts-tooltip-marker {
                                    background-color: #e08e6d;
                                }
                            </style>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    let arrColors = ["#FF9B50", "#94A684", "#C63D2F", "#2E0249",
                                                    "#570A57", "#A91079", "#FF9494", "#AFC8AD",
                                                    "#A8DF8E", "#E08E6D", "#7E30E1","#35A29F",
                                                    "#A9B388", "#B0A695", "#FFAD84","#F4DFC8"];
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                                name: 'Lợi nhuận',
                                                data: [<?=$strArrMon?>],
                                        },],
                                        chart: {
                                            height: 350,
                                            type: 'bar',
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: [arrColors[Math.floor(Math.random() * arrColors.length)]],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                gradientToColors: [arrColors[Math.floor(Math.random() * arrColors.length)]],
                                                type: "vertical",
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        xaxis: {
                                            categories: [
                                                "Tháng 1",
                                                "Tháng 2",
                                                "Tháng 3",
                                                "Tháng 4",
                                                "Tháng 5",
                                                "Tháng 6",
                                                "Tháng 7",
                                                "Tháng 8",
                                                "Tháng 9",
                                                "Tháng 10",
                                                "Tháng 11",
                                                "Tháng 12"
                                            ]
                                        },
                                        yaxis: {
                                            title: {
                                                text: "Dollars",
                                            }
                                        },
                                        tooltip: {
                                            onDatasetHover: {
                                                highlightDataSeries: true,
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->

            </div>
        </div>
    </section>
</main>
<!--End main page-->
<?php
require_once("layouts/footer.php");
?>