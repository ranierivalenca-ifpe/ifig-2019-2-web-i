<?php
function get_csv_data($filename) {
    if (!is_file($filename)) {
        return false;
    }
    $rows = file($filename);
    return array_map('str_getcsv', $rows);
}

function redirect($url = '/') {
    header('Location: ' . $url);
    exit();
}
?>