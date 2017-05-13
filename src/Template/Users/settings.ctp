<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 MOB
 */

$this->assign('title', __('Settings'));
echo $this->Html->script('scripts/users/settings.js', ['block' => 'script']);
$this->Form->setTemplates(['inputContainer' => '<div class="form-control">{{content}}</div>',]);
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Profile</span><br>
                <div class="row">
                    <?= $this->Form->create(null, ['class' => 'col s12']) ?>
                    <div class="input-field col s12">
                        <?= $this->Form->control('fistname', ['value' => $udata->fistname]) ?>
                    </div>
                    <div class="input-field col s12">
                        <?= $this->Form->control('lastname', ['value' => $udata->lastname]) ?>
                    </div>
                    <div class="input-field col s12">
                        <?= $this->Form->control('email', ['value' => $udata->email]) ?>
                    </div>
                    <div class="input-field col s12">
                        <?= $this->Form->control('gender', ['options' => [1 => 'Male', 2 => 'Female', 3 => 'Rather Not Say', 'label' => false, 'empty' => true]]) ?>
                    </div>
                    <div class="input-field col s12">
                        <?= $this->Form->control('birthdate', ['class' => 'datepicker', 'type' => 'text']) ?>
                    </div>

                    <div class="col s12 right-align m-t-sm">
                        <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Password</span><br>
                <div class="row">
                    <?= $this->Form->create(null, ['class' => 'col s12']) ?>
                    <div class="input-field col s12">
                        <?= $this->Form->control('password') ?>
                    </div>
                    <div class="input-field col s12">
                        <?= $this->Form->control('confirmPassword', ['type' => 'password']) ?>
                    </div>
                    <div class="col s12 right-align m-t-sm">
                        <?= $this->Form->button(__('Change Password'), ['class' => 'waves-effect waves-light btn teal']); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Two-step verification</span><br>
                <div class="row">
                    <div class="col s12">
                        <?php if(empty($udata->secret)){ ?>
                        <p>Your account is <b>not</b> protected with two-step verification.</p>
                        <br>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'enableTwoFactor', 'prefix' => false, 'plugin' => false]) ?>" class="waves-effect waves-grey btn teal">Enable Two-step verification</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">About</span><br>
                <div class="row">
                    <div class="col s12">
                        <p><b>Legal</b></p>
                        <p>Through continued use of Nessi you agree to our privacy policy and terms of service which can be found on our website.</p>
                        <br>
                        <p><b>Support + Feedback</b></p>
                        <p>If you have spotted a bug, found something that needs improving or would simply like to request a feature please get in touch.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

