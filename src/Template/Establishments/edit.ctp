<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $establishment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $establishment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Establishments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Academicyears'), ['controller' => 'Academicyears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Academicyear'), ['controller' => 'Academicyears', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="establishments form large-9 medium-8 columns content">
    <?= $this->Form->create($establishment) ?>
    <fieldset>
        <legend><?= __('Edit Establishment') ?></legend>
        <?php
            echo $this->Form->control('academicyear_id', ['options' => $academicyears]);
            echo $this->Form->control('name');
            echo $this->Form->control('gmapid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
