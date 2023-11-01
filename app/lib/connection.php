<?php
function getConnection() : mysqli {
    $db_ini = parse_ini_file(__DIR__."/../../php.config.ini");
    $con = new mysqli($db_ini["db_host"],
                    $db_ini["db_user"],
                    $db_ini["db_pass"],
                    $db_ini["db_name"]);
    if($con->connect_error){
        die("Không thể kết nối cơ sở dữ liệu: " . $con->connect_error);
    }
    return $con;
}
?>