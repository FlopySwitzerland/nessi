<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Edit User') ?></span>
                <?= $this->Form->create($user) ?>

                <?php

                echo $this->Form->hidden('id');
                echo $this->Form->control('group_id', ['options' => $groups]);
                echo $this->Form->control('firstname');
                echo $this->Form->control('lastname');
                echo $this->Form->control('email');
                echo $this->Form->control('password');
                ?>

                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']); ?>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
