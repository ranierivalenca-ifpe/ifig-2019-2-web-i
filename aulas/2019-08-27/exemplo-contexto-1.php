

<?php
function consumo() {
    global $km;
    if (!is_numeric($km) || !is_numeric($GLOBALS['litros'])) {
        return 0;
    }
    return floatval($km) / floatval($GLOBALS['litros']);
}

$km = 100;
$litros = 12;

echo consumo();
?>