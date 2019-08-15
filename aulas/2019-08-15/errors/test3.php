<?php

$a = [1, 2, 3];

?>
<?php for($i = 0; $i < sizeof($a); $i++); ?>
<p><?= $a[$i] ?></p>
<?php endfor ?>