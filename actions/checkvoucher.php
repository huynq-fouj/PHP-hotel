<?php
require_once("../app/models/VoucherModel.php");

$voucherModel = new VoucherModel();

if($voucherModel->updateExpireDate()){
    echo "Updated vouchers status";
} else{
    echo "No vouchers expire";
}