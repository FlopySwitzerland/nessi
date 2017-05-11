<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Establishment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Academicyears'), ['controller' => 'Academicyears', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Academicyear'), ['controller' => 'Academicyears', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="establishments index large-9 medium-8 columns content">
    <h3><?= __('Establishments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('academicyear_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gmapid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($establishments as $establishment): ?>
            <tr>
                <td><?= $this->Number->format($establishment->id) ?></td>
                <td><?= $establishment->has('academicyear') ? $this->Html->link($establishment->academicyear->id, ['controller' => 'Academicyears', 'action' => 'view', $establishment->academicyear->id]) : '' ?></td>
                <td><?= h($establishment->name) ?></td>
                <td><?= h($establishment->gmapid) ?></td>
                <td><?= h($establishment->created) ?></td>
                <td><?= h($establishment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $establishment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $establishment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $establishment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $establishment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
