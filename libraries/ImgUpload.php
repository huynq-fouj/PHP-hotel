<?php
/**
 * Upload file ảnh và trả về true nếu lưu ảnh thành công hoặc 
 * trả về false nếu upload không thành công
 * ***
 * - Kiểu đuôi mở rộng: .gif, .jpg, .jpe, .jpeg, .png, .webp
 * ***
 * * Author: Nguyễn Quang Huy
 * * Cre_at: 05/11/2023
 * * Upd_at: 05/11/2023
 * ***
 * @param string $target_dir
 * Vị trí lưu file
 * @param mixed $img
 * Nhận giá trị là $_FILE["name của input nhận file"]
 * @param int $max_size
 * Kích thước tối đa của file (bytes)
 */
function ImgUpload($target_dir, $img, $max_size = 15728640) {
    $ext_type = array('gif','jpg','jpe','jpeg','png','webp');//Kiểu mở rộng của file

    if($target_dir[strlen($target_dir) - 1] != "/") {
        $target_dir .= "/";
    }

    $file_type = strtolower(pathinfo(basename($img['name']),PATHINFO_EXTENSION));
    $tmp_name = $img['tmp_name'];
    $target_file = $target_dir.time()."_".rand(10000,99999).".".$file_type;

    if(getimagesize($tmp_name) !== false
    && in_array($file_type, $ext_type)
    && $img['size'] < $max_size) {
        if(move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"].$target_file)) {
            return $target_file;
        }
    }
    return false;
}
?>
