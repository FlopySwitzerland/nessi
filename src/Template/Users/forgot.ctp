<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('bodyClass', 'signin-page');
?>
<span class="card-title">Forgot Password</span>
<div class="row">
    <?= $this->Form->create(null, ['class' => 'col s12']) ?>
    <div class="input-field col s12">
        <?= $this->Form->control('email') ?>
    </div>
    <div class="col s12 right-align m-t-sm">
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login', 'prefix' => false, 'plugin' => false]) ?>" class="waves-effect waves-grey btn-flat">I remember now</a>
        <?= $this->Form->button(__('Reset'), ['class' => 'waves-effect waves-light btn teal']); ?>
    </div>
    <?= $this->Form->end() ?>
</div>