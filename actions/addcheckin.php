<?php
session_start();

// require utils dependencies
require_once "../libraries/Utilities.php";

// authentication
if (!isset($_SESSION["user"])) {
    headerRedirectViews(null, null, "/hostay/views/login.php");
}
if (!isset($_SESSION["user"]["id"])) {
    headerRedirectViews("err", "login", "/hostay/views/login.php?");
}

if (isset($_POST["checkin"])) {

    // require dependencies
    require_once("../app/models/CheckinModel.php");
    require_once("../app/models/BillModel.php");
    require_once("../libraries/ImgUpload.php");
    require_once("../libraries/DeleteFile.php");

    // util variables
    $url = "/hostay/views/checkin.php?";
    $target_dir = "/hostay/admin/images/indentity_card";

    // get data from form
    $checkinCode = trim($_POST["txtCheckinCode"]);
    $checkinDate = $_POST["txtCheckinDate"];

    if(!empty($checkinCode) && !empty($checkinDate)){
        // check valid bill id
        $billModel = new BillModel();
        $billItem = $billModel->getBillByCheckinCode($checkinCode);
        $checkinModel = new CheckinModel();
        $checkinItem = new CheckinObject();
        
        if($checkinModel->isExists($checkinCode)){
            headerRedirectViews("err", "checkincode_exist", $url);
        }

        if($billItem == null){
            headerRedirectViews("err", "checkincode_err", $url);
        }

        if((int)$billItem->getBill_is_paid() == 0){
            headerRedirectViews("err", "not_paid", $url);
        }

        $billStartDate = $billItem->getBill_start_date();
        
        if($checkinDate > $billStartDate){
            headerRedirectViews("err", "checkin_date", $url);
        }

        $billCreatedAt = $billItem->getBill_created_at();

        if(getDateDiff($checkinDate, $billCreatedAt) > 0){
            headerRedirectViews("err", "checkin_date_af", $url);
        }


        if(isset($_FILES["firstImg"])
            && file_exists($_FILES["firstImg"]["tmp_name"])
            && is_uploaded_file($_FILES["firstImg"]["tmp_name"])
            && isset($_FILES["secondImg"])
            && file_exists($_FILES["secondImg"]["tmp_name"])
            && is_uploaded_file($_FILES["secondImg"]["tmp_name"])
        ) {
            
            $targetFirstFile = ImgUpload($target_dir, $_FILES["firstImg"]);
            $targetSecondFile = ImgUpload($target_dir, $_FILES["secondImg"]);

            if($targetFirstFile && $targetSecondFile){
                
                

                $checkinItem->setFirstIndentityCard($targetFirstFile);
                $checkinItem->setSecondIndentityCard($targetSecondFile);
                $checkinItem->setCheckinDate($checkinDate);
                $checkinItem->setCheckinUser($_SESSION["user"]["name"]);
                $checkinItem->setCheckinCode($checkinCode);
                $checkinItem->setBillId($billItem->getBill_id());

                if($checkinModel->addBill($checkinItem)){
                    $checkinCurrentItem = $checkinModel->getCheckinByCode($checkinCode);
                    $urlBillCheckin = "/hostay/views/billcheckin.php?id=" . $checkinCurrentItem->getCheckinId();
                    headerRedirectViews(null, null, $urlBillCheckin);
                } else{
                    headerRedirectViews("err", "checkin_err", $url);
                }

            } else{
                headerRedirectViews("err", "false_upl", $url);
            }

        } else{
            headerRedirectViews("err", "img_lack", $url);
        }


    } else{
        headerRedirectViews("err", "lack", $url);
    }
}