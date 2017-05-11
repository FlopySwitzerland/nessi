<?php
/**
 * @var \App\View\AppView $this
 */
?>
<span class="card-title">Forgot Password</span>
<div class="row">
    <?= $this->Form->create(null, ['class' => 'col s12']) ?>
    <div class="input-field col s12">
        <?= $this->Form->control('email') ?>
    </div>
    <div class="col s12 right-align m-t-sm">
        <a href="sign-up.html" class="waves-effect waves-grey btn-flat">I remember now</a>
        <?= $this->Form->button(__('Reset'), ['class' => 'waves-effect waves-light btn teal']); ?>
    </div>
    <?= $this->Form->end() ?>
</div>