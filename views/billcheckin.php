<?php
session_start();

// require dependencies
require_once("../libraries/Utilities.php");

if(!isset($_SESSION["user"]) || !isset($_SESSION["user"]["id"])) {
    headerRedirect(null, null, null, "/hostay/views/");
}

// Define the API URL
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example";

// Use file_get_contents to get the image from the API
$imageData = file_get_contents($apiUrl);

// Encode the image data into base64
$base64Image = base64_encode($imageData);

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

    ?>
    
    <div class="container">
        <div class="row text-white my-3">
            <h1 align="center">PHIẾU CHECKIN</h1>
        </div>

        <div class="d-flex justify-content-center my-3">
            <button class="btn btn-primary mx-3 btn-goback"><i class="bi bi-reply"></i> Quay lại</button>
            <a href="/hostay/views" class="btn btn-primary mx-3"><i class="bi bi-house"></i> Trang chủ</a>
            <button class="btn btn-primary mx-3 ticket-dowload"><i class="bi bi-download"></i> Tải ảnh xuống</button>
            <button class="btn btn-primary mx-3 ticket-pdf"><i class="bi bi-filetype-pdf"></i> Xuất PDF</button>
        </div>

        <div class="row mb-5">
        <div class="invoice-box" id="ticket">
			<table cellpadding="0" cellspacing="0">
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

								<td>
                                <img class="qr-code" src="data:image/png;base64, <?php echo $base64Image; ?>" alt="QR Code"
                                    style="width: 100%; max-width: 70px"
                                >
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									
								</td>

                                <td>
									
									52 Trieu Khuc<br />
									Ha Noi
								</td>


								
							</tr>
						</table>
					</td>
				</tr>

				

				<tr class="details">
					<td>Tên khách hàng</td>

					<td><b><?= $fullname ?></b></td>
				</tr>

                <tr class="details">
					<td>Thời gian bắt đầu</td>

					<td><b><?= date("Y-m-d", strtotime($billItem->getBill_start_date())) ?></b></td>
				</tr>

                <tr class="details">
					<td>Thời gian kết thúc</td>

					<td><b><?= date("Y-m-d", strtotime($billItem->getBill_end_date())) ?></b></td>
				</tr>

                <tr class="details">
					<td>Mã phòng</td>

					<td><b><?= $billItem->getBill_room_id() ?></b></td>
				</tr>

                <tr class="details">
					<td>Mã checkin</td>

					<td><b><?= $billItem->checkin_code() ?></b></td>
				</tr>

				
			</table>
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