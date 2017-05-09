<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mark'), ['action' => 'edit', $mark->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mark'), ['action' => 'delete', $mark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mark->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Marks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mark'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="marks view large-9 medium-8 columns content">
    <h3><?= h($mark->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $mark->has('subject') ? $this->Html->link($mark->subject->name, ['controller' => 'Subjects', 'action' => 'view', $mark->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mark->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($mark->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coefficient') ?></th>
            <td><?= $this->Number->format($mark->coefficient) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Date') ?></th>
            <td><?= h($mark->exam_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mark->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mark->modified) ?></td>
        </tr>
    </table>
</div>
