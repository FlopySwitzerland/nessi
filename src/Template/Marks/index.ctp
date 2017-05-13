<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Filter') ?></span>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Marks') ?></span>
                <table class=" bordered">
                    <tbody>
                    <?php foreach ($subjects as $subject){ ?>
                        <tr>
                            <td><?= $this->Html->link($subject->name, ['controller' => 'Subjects', 'action' => 'view', $subject->id]) ?></td>
                            <?php foreach ($subject->marks as $mark){ ?>
                                <td><?= $this->Number->format($mark->value) ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class=""></div>
            </div>
        </div>
    </div>
</div>



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mark'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="marks index large-9 medium-8 columns content">
    <h3><?= __('Marks') ?></h3>
    <table class="responsive-table">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('value') ?></th>
            <th scope="col"><?= $this->Paginator->sort('coefficient') ?></th>
            <th scope="col"><?= $this->Paginator->sort('exam_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($marks as $mark): ?>
            <tr>
                <td><?= $this->Number->format($mark->id) ?></td>
                <td><?= $mark->has('subject') ? $this->Html->link($mark->subject->name, ['controller' => 'Subjects', 'action' => 'view', $mark->subject->id]) : '' ?></td>
                <td><?= $this->Number->format($mark->value) ?></td>
                <td><?= $this->Number->format($mark->coefficient) ?></td>
                <td><?= h($mark->exam_date) ?></td>
                <td><?= h($mark->created) ?></td>
                <td><?= h($mark->modified) ?></td>
                <td>
                    <a class="dropdown-button" href="#" data-activates="action_<?= $mark->id ?>"><i class="material-icons">more_vert</i></a>
                    <ul id="action_<?= $mark->id ?>" class="dropdown-content">
                        <li><?= $this->Html->link('<i class="material-icons">remove_red_eye</i>'.__('View'), ['action' => 'view', $mark->id], ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="material-icons">mode_edit</i>'.__('Edit'), ['action' => 'edit', $mark->id], ['escape' => false]) ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Form->postLink('<i class="material-icons">delete_forever</i>'.__('Delete'), ['action' => 'delete', $mark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mark->id), 'escape' => false]) ?></li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('<i class="material-icons">chevron_left</i>', ['escape' => false, 'class' => 'waves-effect']) ?>
            <?= $this->Paginator->numbers(['class' => 'waves-effect']) ?>
            <?= $this->Paginator->next('<i class="material-icons">chevron_right</i>', ['escape' => false, 'class' => 'waves-effect'])  ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
