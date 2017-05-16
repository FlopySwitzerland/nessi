<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Academicyear'), ['action' => 'edit', $academicyear->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Academicyear'), ['action' => 'delete', $academicyear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicyear->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Academicyears'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Academicyear'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="academicyears view large-9 medium-8 columns content">
    <h3><?= h($academicyear->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($academicyear->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($academicyear->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($academicyear->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($academicyear->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($academicyear->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Terms') ?></h4>
        <?php if (!empty($academicyear->terms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Academicyear Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modifed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($academicyear->terms as $terms): ?>
            <tr>
                <td><?= h($terms->id) ?></td>
                <td><?= h($terms->academicyear_id) ?></td>
                <td><?= h($terms->name) ?></td>
                <td><?= h($terms->start_date) ?></td>
                <td><?= h($terms->end_date) ?></td>
                <td><?= h($terms->created) ?></td>
                <td><?= h($terms->modifed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Terms', 'action' => 'view', $terms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Terms', 'action' => 'edit', $terms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terms', 'action' => 'delete', $terms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
