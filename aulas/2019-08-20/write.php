<?php
 # ...
$fp = fopen('teste.txt', 'w'); // file pointer (handle)
for ($i = 0; $i < 10; $i++) {
    fwrite($fp, "linha $i" . PHP_EOL); // PHP_EOL = End Of Line (\n no unix, \r\n no windows)
}
fclose($fp);
# ...
?>