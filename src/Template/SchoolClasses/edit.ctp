<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Modify Class') ?></span>
                <?= $this->Form->create($schoolClass) ?>
                <?php
                echo $this->Form->hidden('user_id');
                echo $this->Form->control('establishment_id', ['options' => $establishments]);
                echo $this->Form->control('name');
                ?>

                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
