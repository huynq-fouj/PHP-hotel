<?php
function getConnection() : mysqli {
    $db_ini = parse_ini_file($_SERVER["DOCUMENT_ROOT"]."/hostay/php.config.ini");
    $con = new mysqli($db_ini["db_host"],
                    $db_ini["db_user"],
                    $db_ini["db_pass"],
                    $db_ini["db_name"],
                    $db_ini["db_port"]);
    $con->set_charset("utf8");
    if($con->connect_error){
        die("Không thể kết nối cơ sở dữ liệu: " . $con->connect_error);
    }
    return $con;
}
