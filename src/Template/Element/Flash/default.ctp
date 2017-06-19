<?php
$class = 'info';
if (!empty($params['class'])) {
    $class = $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="row">
    <div class="col s12">
        <div class="message <?= $class ?>"><?= $message ?></div>
    </div>
</div>

