<?php
session_start();

// require dependencies
require_once("../libraries/Utilities.php");

if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    headerRedirect(null, null, null, "/hostay/views/");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn đăng ký đặt phòng</title>
    <link rel="shortcut icon" href="/hostay/public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/hostay/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/hostay/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hostay/assets/css/checkin.css">
    <style>
        
        
        .header, .section-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section-header {
            margin-top: 30px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .info-table th, .info-table td {
            border: 1px solid #dee2e6;
            padding: 10px;
        }
        .info-table th {
            width: 30%;
            background-color: #e9ecef;
        }
        .td-img{
            align-items: right;
        }
    </style>
</head>
<body>

<?php
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            header("location:/hostay/views/?err=value");
        }
        require_once("../app/models/BillModel.php");
        require_once("../app/models/UserModel.php");
        require_once("../app/models/CheckinModel.php");
        require_once("../libraries/Utilities.php");

        $checkinId = $_GET["id"];


        $checkinModel = new CheckinModel();
        $checkinItem = $checkinModel->getCheckinById($checkinId);

        if($checkinItem != null) {
            if($checkinItem->getCheckinUser() != $_SESSION["user"]["name"] && $_SESSION["user"]["permission"] == 0) {
                header("location:/hostay/views/");
            }
        } else {
            header("location:/hostay/views/?err=noexist");
        }


        $userModel = new UserModel();
        $billModel = new BillModel();
        $fullname = $userModel->getUserByUsername($checkinItem->getCheckinUser())->getUser_fullname();
        $billItem = $billModel->getBillById($checkinItem->getBillId());

        // Define the API URL
        $apiUrl = "https://quickchart.io/qr?text=" . $checkinItem->getCheckinCode();

        // Use file_get_contents to get the image from the API
        $imageData = file_get_contents($apiUrl);

        // Encode the image data into base64
        $base64Image = base64_encode($imageData);

    ?>
    
    <div class="container">
        <div class="row text-white my-3">
            <h1 align="center">PHIẾU CHECKIN</h1>
        </div>

        <div class="d-flex justify-content-center my-3">
            <button class="btn btn-primary mx-3 btn-goback"><i class="bi bi-reply"></i> Quay lại</button>
            <a href="/hostay/views/" class="btn btn-primary mx-3"><i class="bi bi-house"></i> Trang chủ</a>
            <button class="btn btn-primary mx-3 ticket-dowload"><i class="bi bi-download"></i> Tải ảnh xuống</button>
            <button class="btn btn-primary mx-3 ticket-pdf"><i class="bi bi-filetype-pdf"></i> Xuất PDF</button>
        </div>

        <div class="row mb-5">
        <div class="invoice-box" id="ticket">
			<table  cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img
										src="/hostay/public/HostayHotel.png"
										style="width: 100%; max-width: 180px"
									/>
								</td>

								<td style="text-align: right;">
                                <img class="qr-code" src="data:image/png;base64, <?php echo $base64Image; ?>" alt="QR Code"
                                    style="width: 100%; max-width: 70px"
                                >
								</td>
							</tr>
						</table>
					</td>
				</tr>

			
            </table>
            <h2 class="text-center"><strong>Hóa đơn check-in</strong></h2>
            <div class="section-header">Thông tin checkin</div>
            <table class="info-table" style="margin-top: 30px;">
                <tr>
                    <th>Họ tên:</th>
                    <td class="child-tr"><?= $fullname?></td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><?= $billItem->getBill_phone() ?></td>
                </tr>
                <tr>
                <th>Email:</th>
                <td><?= $billItem->getBill_email() ?></td>
                </tr>
                <tr>
                <th>Mã checkin:</th>
                <td><?= $billItem->getBillCheckinCode() ?></td>
                </tr>
                <tr>
                <th>Ngày checkin:</th>
                <td><?= date("d-m-Y", strtotime($checkinItem->getCheckinDate())) ?></td>
                </tr>
            </table>
            <div class="row my-5 d-flex justify-content-between">
                    <div class="col-5">
                        <div class="d-flex justify-content-center mb-2"><b></b></div>
                        <div class="d-flex justify-content-center"></div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex justify-content-center mb-2">Trân trọng</div>
                        <div class="d-flex justify-content-center mb-2"><b>Hostay</b></div>
                        <div class="d-flex justify-content-center"></div>
                    </div>
                </div>
		</div>
        </div>
    </div>
    <script src="/hostay/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/html2canvas/html2canvas.min.js"></script>
    <script src="../assets/vendor/html2pdf/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
    <script>
        document.querySelector(".ticket-dowload").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            html2canvas(target).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                let anchor = document.createElement("a");
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "Phieu_xac_nhan_dat_phong_<?=$checkinItem->getCheckinCode()?>.png");
                anchor.click();
                anchor.remove();
            });
        });

        document.querySelector(".ticket-pdf").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            var opt = {
                margin:       0.5,
                filename:     'Phieu_xac_nhan_dat_phong_<?=$checkinItem->getCheckinCode()?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 , width: 920 },
                jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
            };

            var worker = html2pdf().from(target).set(opt).toPdf().get("pdf").then((pdf) => { 
                window.open(pdf.output('bloburl'), '_blank');
            });
        });

        document.querySelector(".btn-goback").addEventListener("click", () => {
            window.history.back();
        });
    </script>
</body>
</html>