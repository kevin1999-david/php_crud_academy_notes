<?php
$msg = $_SESSION['msg_s'];
$color_msg = $_SESSION['msg_c'];
?>

<div class="alert alert-<?= $color_msg ?>" id="alerta">
    <?= $msg ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
        <span aria-hidden="true">&times;</span>
    </button>
</div>