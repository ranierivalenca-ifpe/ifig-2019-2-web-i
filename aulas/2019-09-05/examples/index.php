<?php include 'header.html' ?>
<?php
require_once 'funcoes.php';
$data = get_data();
?>
<table>
    <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item[0] ?></td>
        </tr>
    <?php endforeach ?>
</table>
<?php include 'footer.html' ?>