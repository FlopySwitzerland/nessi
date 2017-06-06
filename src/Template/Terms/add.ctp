<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script('scripts/terms/add.js', ['block' => 'script']);
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Modify Term') ?></span>
                <?= $this->Form->create($term) ?>
                <?php
                echo $this->Form->control('academicyear_id', ['options' => $academicyears]);
                echo $this->Form->control('name');
                echo $this->Form->control('start_date', ['empty' => true, 'class' => 'datepicker', 'type' => 'text']);
                echo $this->Form->control('end_date', ['empty' => true, 'class' => 'datepicker', 'type' => 'text']);
                echo $this->Form->control('avg_semester');
                echo $this->Form->control('subjects._ids', ['options' => $subjects]);
                ?>
                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
