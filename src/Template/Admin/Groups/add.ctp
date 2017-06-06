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
                <?= $this->Form->create($group) ?>
                <?php
                echo $this->Form->hidden('id');
                echo $this->Form->control('name');
                ?>
                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
