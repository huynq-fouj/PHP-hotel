<?php
function checkValidPassWord(string $pass1, string $pass2) : bool {
    if($pass1 == null
        || $pass1 == ""
        || $pass2 == null
        || $pass2 == ""
        || $pass1 != $pass2
        || strlen($pass1) < 8) {
            return false;
        }
    return true;
}
function checkEmail($email) : bool {
    if($email != "" && str_contains($email, "@")) {
        $arr = explode("@", $email);
        if(strlen($arr[0]) >= 5 && str_contains($arr[1], ".")) {
            $arr1 = explode(".",$arr[1]);
            if(strlen($arr1[0]) >= 2 && strlen($arr1[1]) >= 2) {
                return true;
            }
        }
    }
    return false;
}

function checkValidDate($start, $end) {
    $cd = date("Ymd");
    if(($sd = date("Ymd", strtotime($start))) && ($ed = date("Ymd", strtotime($end)))) {
        if(($ed >= $sd) && ($ed >= $cd) && ($sd >= $cd)) {
            return true;
        }
    }
    return false;
}

function getDateDiff($start, $end) {
    try {
        $startD = date_create($start);
        $endD = date_create($end);
        $diff = date_diff($startD, $endD);
        return $diff->format("%a");
    } catch(Exception $e) {
        return 0;
    }
}

function headerRedirect($messageParam = null, $status = null, $endpoint = null, $url = "/hostay/admin/") {
    

    if (!empty($messageParam) && !empty($status)) {
        $url .= $endpoint . '.php?' . $status . '=' . urlencode($messageParam);
    }

    echo '
        <script>
            location.href = "' . $url . '";
        </script>';
    exit();
}

function headerRedirectViews($status = null, $messageParam = null, $url){

    if(empty($messageParam) && empty($status)){
        echo '
            <script>
                location.href = "' . $url . '";
            </script>';
    } else{
        echo '
            <script>
                location.href = "' . $url . $status . '=' . $messageParam .'";
            </script>';
    }

    
    exit();
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function debug($message){
    echo "<script type='text/javascript'>alert('$message');</script>";
}