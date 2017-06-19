<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', __('Groups'));
?>

<div class="row">
    <div class="col s12 m12 l12">
        <div class="card invoices-card">
            <div class="card-content">
                <div class="card-options">
                    <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                </div>
                <span class="card-title">Groups List</span>
                <table class="responsive-table bordered">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($groups as $group): ?>
                        <tr>
                            <td><?= $this->Number->format($group->id) ?></td>
                            <td><?= h($group->name) ?></td>
                            <td><?= h($group->created) ?></td>
                            <td><?= h($group->modified) ?></td>
                            <td>
                                <a class="dropdown-button" href="#" data-activates="action_<?= $group->id ?>"><i class="material-icons">more_vert</i></a>
                                <ul id="action_<?= $group->id ?>" class="dropdown-content">
                                    <li><?= $this->Html->link(__('View'), ['action' => 'view', $group->id]) ?></li>
                                    <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?></li>
                                    <li class="divider"></li>
                                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?></li>
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
        </div>
    </div>
</div>