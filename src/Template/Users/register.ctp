<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('bodyClass', 'signup-page');
?>
<span class="card-title">Register</span>
<div class="row">
    <?= $this->Form->create($user, ['class' => 'col s12']) ?>
    <div class="input-field col s12">
        <?= $this->Form->control('firstname') ?>
    </div>
    <div class="input-field col s12">
        <?= $this->Form->control('lastname') ?>
    </div>
    <div class="input-field col s12">
        <?= $this->Form->control('email') ?>
    </div>
    <div class="input-field col s12">
        <?= $this->Form->control('password') ?>
    </div>
    <div class="input-field col s12">
        <?= $this->Form->control('confirmPassword', ['type' => 'password']) ?>
    </div>
    <div class="col s12 right-align m-t-sm">
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login', 'prefix' => false, 'plugin' => false]) ?>" class="waves-effect waves-grey btn-flat">Log in</a>
        <?= $this->Form->button(__('Sign up'), ['class' => 'waves-effect waves-light btn teal']); ?>
    </div>
    <?= $this->Form->end() ?>
</div>