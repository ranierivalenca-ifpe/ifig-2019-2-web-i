<?php
define('TITLE', 'Cadastro de Funcionários');
define('EOL', "\n");

function data_path($file) {
    $base_path = dirname(__FILE__);
    return $base_path . DIRECTORY_SEPARATOR . "data/$file";
}
define('FNC_FILENAME', data_path('fnc.csv'));
define('PAR_FILENAME', data_path('par.csv'));
define('DEP_FILENAME', data_path('dep.csv'));
?>