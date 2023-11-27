<?php
function DeleteFile($path) {
    $path = $_SERVER["DOCUMENT_ROOT"].$path;
    if(file_exists($path)) {
        return unlink($path);
    }
    return false;
}
?>