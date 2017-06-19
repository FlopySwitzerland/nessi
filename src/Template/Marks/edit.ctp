<?php
/**
 * @var \App\View\AppView $this
 */

echo $this->Html->script('scripts/marks/index.js', ['block' => 'script']);
?>

<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Edit Mark') ?></span>
                <?= $this->Form->create($mark) ?>
                <?php
                echo $this->Form->hidden('id');
                echo $this->Form->hidden('subject_id');
                echo $this->Form->hidden('term_id', ['options' => []]);
                echo $this->Form->control('value');
                echo $this->Form->control('coefficient');
                echo $this->Form->control('exam_date', ['empty' => true, 'class' => 'datepicker', 'type' => 'text']);
                ?>
                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

