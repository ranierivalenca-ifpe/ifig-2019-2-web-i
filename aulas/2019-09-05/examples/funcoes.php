<?php
define('FILENAME', 'data.csv');

function get_data($id = null) {
    $data = file(FILENAME);
    $data = array_map('str_getcsv', $data);
    if (is_null($id) || !isset($data[$id])) {
        return $data;
    }
    return $data[$id];
}
?>