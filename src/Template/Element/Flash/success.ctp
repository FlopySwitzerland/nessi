<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="row">
    <div class="col s12">
        <div class="message success"><?= $message ?></div>
    </div>
</div>
